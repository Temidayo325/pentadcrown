<template id="">
   <h1 class="font-bold text-purple-900 leading-9 tracking-wide text-center text-2xl rounded md:mt-8">Add questions to your aptitude test</h1>
   <h3 class="tracking-wide text-center my-2 text-purple-900">Candidates are able to attempt a specified number of tests following their sign up to the platform</h3>
   <div class="grid justify-center">
      <!--<p>Add question</p>
       <img src="" alt=""> -->
      <form class="w-10/12 border-2 border-zinc-200 py-2 my-2 shadow-xl mb-8" @submit.prevent="save" method="POST" enctype="multipart/form-data">
         <div class="flex justify-center items-center">
            <label for="addImage" class="text-center text-lg text-bold px-2 ">Click to add Image</label>
            <input type="checkbox" name="addImage" v-model="image" class="">
         </div>
         <div class="mx-4">
            <label for="question" class="block text-lg text-black">Question</label>
            <input type="file" name="question"  v-if="image"  @change="chooseFile($event)">
            <textarea name="question" class="w-11/12 h-44 border-purple-300" v-model="test.question" v-else></textarea>
         </div>
         <div class="grid grid-cols-2 gap-4 mx-3 my-5">
            <div class="">
               <label for="option1">Option 1</label>
               <input type="file" name="option1"  v-if="image"  @change="chooseFile1($event)">
               <input type="text" name="option1" v-model="test.option1" v-else>
            </div>
            <div class="">
               <label for="option2">Option 2</label>
               <input type="file" name="option2"  v-if="image"  @change="chooseFile2($event)">
               <input type="text" name="option2" v-model="test.option2" v-else>
            </div>
            <div class="">
               <label for="option3">Option 3</label>
               <input type="file" name="option3"  v-if="image"  @change="chooseFile3($event)">
               <input type="text" name="option3" v-model="test.option3" v-else>
            </div>
            <div class="">
               <label for="option4">Option 4</label>
               <input type="file" name="option4"  v-if="image"  @change="chooseFile4($event)">
               <input type="text" name="option4" v-model="test.option4" v-else>
            </div>
            <div class="">
               <label for="option1">Correct answer</label>
               <input type="file" name="answer"  v-if="image"  @change="chooseFile5($event)">
               <input type="text" name="answer" v-model="test.answer" v-else>
            </div>
         </div>
         <div class="flex justify-center my-2">
            <button type="submit" name="button" class="px-3 py-3 bg-purple-800 text-center text-white tracking-wider">Save Question</button>
         </div>
         <!-- <button type="submit" name="button" class="px-3 py-3 bg-black text-center text-white tracking-wider" v-if="image" @click="">Save Question</button> -->
      </form>
      <div class="">
         
      </div>
   </div>
</template>
<script>
   import { defineComponent } from 'vue'
   import { Head, Link } from '@inertiajs/inertia-vue3'
   import Toastify from 'toastify-js'
   import "toastify-js/src/toastify.css"

   export default defineComponent({
      components: {
      },
      data(){
         return {
            test: {
               question: null,
               option1: null,
               option2: null,
               option3: null,
               option4: null,
               answer: null
            },
            image: false
         }
      },
      methods: {
         chooseFile(event)
         {
           this.test.question = event.target.files[0];
        },
        chooseFile1(event)
        {
          this.test.option1 = event.target.files[0];
        },
       chooseFile2(event)
       {
         this.test.option2 = event.target.files[0];
       },
       chooseFile3(event)
       {
         this.test.option3 = event.target.files[0];
      },
      chooseFile4(event)
      {
        this.test.option4 = event.target.files[0];
      },
      chooseFile5(event)
      {
        this.test.answer = event.target.files[0];
      },
         save()
         {
            if (!this.image) {
               let form = this.validateForm();
               axios({
                     method: "post",
                     url: "/createTest",
                     data: {
                        question: this.test.question,
                        option1: this.test.option1,
                        option2: this.test.option2,
                        option3: this.test.option3,
                        option4: this.test.option4,
                        answer: this.test.answer,
                        imageExists: this.image
                     },
                     })
                  .then(response => {
                     console.log(response)
                     if (response.data.status == 0) {
                        // alert(response.data.message)
                        Toastify({
                          text: response.data.message,
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
                     }else{
                        // alert(response.data.message)
                        Toastify({
                          text: response.data.message,
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
                        this.resetForm()
                     }
                  })
                  .catch(error => {
                     // alert("Kasala ti box")
                     Toastify({
                       text: "Something seems broken",
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
                     console.log(error)
                  })
            }else{
               this.withImage()
            }
         },
         resetForm()
         {
               this.test.question = null
               this.test.option1 = null
               this.test.option2 = null
               this.test.option3 = null
               this.test.option4 = null
               this.test.answer = null
         },
         validateForm()
         {
            let form = new FormData();
            // console.log(typeof this.test)
            for (const [key, value]  of Object.entries(this.test)) {
               // console.log(value)
               if (value !== undefined && value.length > 1 && value !== null) {
                  Object.defineProperty(form, key, {
                    value: value,
                    writable: false
                  });
                  // form.append(key, value);
               }else{
                  alert(key + " is not properly formatted");
                  return false;
               }
            }
            Object.defineProperty(form, 'image', {
               value: this.image,
               writable: false
            });
            return form;
         },
         withImage()
         {
            let data = new FormData();
            data.append('question', this.test.question, this.test.question.name);
            data.append('option1', this.test.option1);
            data.append('option2', this.test.option2);
            data.append('option3', this.test.option3);
            data.append('option4', this.test.option4);
            data.append('answer', this.test.answer);
            data.append('imageExists', this.image);
            axios.post('/createTestWithImage', data)
            .then( (response) => {
               console.log(response)
               console.log(this.uploadPercentage)
            })
            .catch( (error) => {
               console.log(error)
            })
         },
         send(data)
         {
            // const form = this.validateForm();
            axios.post("/createTest", data).then(response => {
               console.log(response)
               if (response.data.status == 0) {
                  // alert(response.data.message)
                  Toastify({
                    text: response.data.message,
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
               }else{
                  alert(response.data.message)
                  this.resetForm()
               }
            }).catch(error => {
               // alert("Kasala ti box")
               Toastify({
                 text: "Something seems broken",
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
               console.log(error)
            })
         }
      },
      mounted(){

      }

   });
</script>
