<?php
if(isset($_POST["signup"])){
$compte = new UsersController();
$compte->register();
}
?>

<section class="login-page">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen  lg:py-0">
      <div class="w-full bg-white rounded-lg shadow hitgth-modal  md:mt-0 sm:max-w-md xl:p-0 overflow-y-auto ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8 ">
              <h1 class="text-xl font-bold text-center text-gray-900 md:text-2xl ">
                   Create your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#" method="post">
                  <div>
                      <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Your name</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="name" required="">
                      <p id="name-error" class="text-red-400 font-bold"></p>
                    </div>
                  <div>
                      <label for="email-login" class="block mb-1 text-sm font-medium text-gray-900">Your email</label>
                      <input type="email" name="email-signup" id="email-signup" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="exemple@gmail.com" required="">
                      <p id="emailSignup-error" class="text-red-400 font-bold"></p>
                    </div>
                  <div>
                      <label for="password-singup" class="block mb-1 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password-singup" id="password-singup" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
                      <p id="passwordSignup-error" class="text-red-400 font-bold"></p>
                      
                    </div>
                  <div>
                      <label for="password-singup-repeat" class="block mb-1 text-sm font-medium text-gray-900 ">Confirm Password</label>
                      <input type="password" name="password-singup-repeat" id="password-singup-repeat" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
                      <p id="rpeateSignup-error" class="text-red-400 font-bold"></p>
                    </div>
                 
                  <button type="submit" id="signup" name="signup" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign up</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      <span class="font-bold">Already have an account?</span>  <a href="login" class="font-medium text-cyan-500 hover:underline ">Sign in</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>