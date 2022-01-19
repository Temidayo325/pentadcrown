<div class="h-full w-screen bg-slate-400 fixed z-10 pl-16 animate__animated animate__slideInRight">
    <div class="h-full w-96 backdrop-blur-sm bg-slate/30 bg-slate-200 drop-shadow-xl">
      <div class="flex end py-4 px-3" v-on:click="closeNavigation()">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 drop-shadow-lg" viewBox="0 0 20 20" fill="currentColor">
           <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
         </svg>
      </div>
       <nav>
          <ul class="px-3 py-5">
             <h2 class="flex justify-start items-center mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 drop-shadow-xl" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span class="text-md px-3 py-2">Home</span>
             </h2>
            <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
               <li>
                  <a href="/welcome" class="leading-8 text-black py-1 px-2 text-md">Home</a>
               </li>
               <li>
                  <a href="/contact" class="leading-8 text-black py-1 px-2 text-md">Reach out to us</a>
               </li>
               <li>
                  <a href="/about" class="leading-8 text-black py-1 px-2 text-md">Who we are</a>
               </li>
               <!-- <li>
                  <a href="" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
               </li> -->
            </div>
               <h2 class="flex justify-start items-center mt-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg>
                  <span class="text-md px-3 py-2">Forms</span>
               </h2>
              <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
                 <li>
                    <a href="" class="leading-8 text-black py-1 px-2 text-md">Create account</a>
                 </li>
                 <li>
                    <a href="" class="leading-8 text-black py-1 px-2 text-md">Sign in</a>
                 </li>
                 <li>
                    <a href="/contact" class="leading-8 text-black py-1 px-2 text-md">Contact us</a>
                 </li>
                 <!-- <li>
                    <a href="/faq" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
                 </li> -->
              </div>
              <h2 class="flex justify-start items-center mt-5">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
                 <span class="text-md px-3 py-2">Others</span>
              </h2>
             <div class="border-l-2 border-slate-400 pl-6 ml-4 mt-2">
                <li>
                   <a href="" class="leading-8 text-black py-1 px-2 text-md">Blog</a>
                </li>
                <li>
                   <a href="/faq" class="leading-8 text-black py-1 px-2 text-md">Frequently Asked Questions</a>
                </li>
             </div>
          </ul>
       </nav>
    </div>
</div>
