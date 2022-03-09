<template>
   <Head title="Pentad Crown Test"/>
    <div class="bg-slate-300 min-h-screen w-full py-3 px-3">
      <div class="md:mx-auto md:my-12 md:w-7/12 " v-if="testIsOngoing">
         <!-- <div class="">
            <h1>Quiz details </h1>
         </div> -->
         <div class="flex justify-end md:w-11/12">
            <p class="text-lg font-bold text-red-600"> <span>{{currentMin}}</span> <span>{{currentSec}}</span> </p>
         </div>
         <form class="" action="index.html" method="post">
            <div class="w-11/12 mx-2 md:w-11/12 md:border-b-4 md:border-slate-400" v-for="question in questions"  :key="question.question.length" :class="{'hidden': question.hidden}">
               <p class="font-bold text-2xl tracking-wide leading-9 my-3 ">{{question.question}}</p>
               <div class="grid justify-start items-center">
                  <label for="option1" class="my-3 text-lg">
                     <input type="radio" name="option1" :value="question.option1" v-model="question.chosen_option">
                     {{question.option1}}
                  </label>
                  <label for="option2" class="my-3 text-lg">
                     <input type="radio" name="option2" :value="question.option2" v-model="question.chosen_option">
                     {{question.option2}}
                  </label>
                  <label for="option3" class="my-3 text-lg">
                     <input type="radio" name="option3" :value="question.option3" v-model="question.chosen_option">
                     {{question.option3}}
                  </label>
                  <label for="option4" class="my-3 text-lg">
                     <input type="radio" name="option4" :value="question.option4" v-model="question.chosen_option">
                     {{question.option4}}
                  </label>
               </div>
            </div>

         </form>
         <div class="mt-10 md:mx-auto">
            <button type="button" name="button" v-for="question in questions"  :key="question.question.length" class="px-4 py-2 bg-purple-800 text-white text-center mx-2 rounded" :class="{'bg-slate-800': !question.hidden, 'bg-green-800': question.chosen_option !== null}" @click="goToSlide(questions.indexOf(question))">{{questions.indexOf(question) + 1}}</button>
         </div>
         <div class="my-6 md:mx-auto">
            <button type="button" name="button" class="bg-purple-800 text-center px-4 py-3 text-lg text-center tracking-wide leading-8" @click="previousSlide()" v-if="currentNumber > 0">Previous</button>
            <button type="button" name="button" class="bg-red-700 text-center px-4 py-3 text-lg text-center tracking-wide leading-8 mx-3" @click="submit()">Submit</button>
            <button type="button" name="button" class="bg-purple-800 text-center px-4 py-3 text-lg text-center tracking-wide leading-8" @click="nextSlide()">Next</button>
         </div>
      </div>
      <div class="md:mx-auto md:my-12 md:w-7/12 my-12" v-else>
         <img src="image/congrats.svg" alt="Congratuations on your test" class="w-72 h-52 my-10 mx-auto md:my-0 md:w-96 md:h-52">
         <h1 class="text-center text-lg tracking-wide leading-8">Congratulations, you have succesfully taken the Pentad Crown test. You will be redirected to your dashboard in a bit</h1>
      </div>
    </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"

   export default defineComponent({
      props: ['user', 'questions','time'],
      components: {
         Head, Link
      },
      data(){
         return {
            currentNumber: 0,
            currentTime: this.time * 60,
            minutes: null,
            seconds: null,
            testIsOngoing: true
         }
      },
      computed: {
         currentMin()
         {
            return this.minutes
         },
         currentSec()
         {
            return this.seconds
         },

      },
      methods: {
         timer()
         {
            this.minutes = Math.floor(this.currentTime / 60)
            this.seconds  = (this.currentTime % 60)
            this.currentTime =  this.currentTime - 1
            if (this.minutes < 10) {
               this.minutes = "0"+ this.minutes
            }
            if (this.seconds < 10) {
               this.seconds = "0"+ this.seconds
            }
            if (this.currentTime > 0) {
               this.currentTime = this.currentTime - 1
            }else{
               clearInterval()
               this.submit()
            }
         },
         goToSlide(numb)
         {
            this.questions[this.currentNumber].hidden = true
            this.currentNumber = numb
            this.questions[numb].hidden = false
         },
         nextSlide()
         {
            if (this.currentNumber > this.questions.length - 2 ) {
               this.questions[this.currentNumber].hidden = true
               this.currentNumber = 0
               this.questions[this.currentNumber].hidden = false
            }else{
               this.questions[this.currentNumber].hidden = true
               this.currentNumber++
               this.questions[this.currentNumber].hidden = false
            }
         },
         displaySlide(number)
         {
            this.questions[this.currentNumber].hidden = true
            this.questions[number].hidden = false
         },
         previousSlide()
         {
            if (this.currentNumber >= 0 ) {
               this.questions[this.currentNumber].hidden = true
               this.currentNumber--
               this.questions[this.currentNumber].hidden = false
            }
         },
         submit()
         {
            axios.post("/getTestResult", {data: JSON.stringify(this.questions), email: this.user.email})
            .then(res => {
               console.log(res)
               if (res.data.status == 0) {
                  Toastify({
                    text: res.data.message,
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "orange",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
               }else if (res.data.status == 1) {
                  Toastify({
                    text: res.data.message,
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "green",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
                  this.testIsOngoing = false
                  setTimeout(() => {
                     window.close();
                  },4000)
               }else{
                  Toastify({
                    text: "An error occured",
                    duration: 5000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                      background: "red",
                   },
                    onClick: function(){} // Callback after click
                  }).showToast();
               }
            }).catch(err => {
               console.log(err)
            })
         }
      },
      mounted(){
         this.displaySlide(this.currentNumber)
         // console.log(typeof parseInt(this.test))
         let currentTime = setInterval(() => {
            this.timer()
        }, 1000)
        document.addEventListener("visibilitychange", () => {
           if (document.visibilityState !== 'visible') {
             alert("Your test would be submited")
             this.submit()
           }
         });
      }

   })
</script>
