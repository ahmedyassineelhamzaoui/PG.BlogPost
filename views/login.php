<?php
if(isset($_POST['login'])){
$compte=new UsersController();
$compte->login();
}
?>

<section class="login-page">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
      <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <?php include('includes/alerts.php'); ?>
              <h1 class="text-xl font-bold text-center text-gray-900 md:text-2xl ">
                  Sign in to your account
              </h1>
              <form class="space-y-4 md:space-y-6" action="#" method="post">
                  <div>
                      <label for="email-login" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                      <input type="email" name="email-login" id="email-login" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="exemple@gmail.com" required="">
                  </div>
                  <div>
                      <label for="password-login" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password-login" id="password-login" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 " required="">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500">Remember me</label>
                          </div>
                      </div>
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                  </div>
                  <button type="submit" name="login" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                  <p class="text-sm font-light text-gray-500 ">
                     <span class="font-bold">Don’t have an account yet?</span>  <a href="register" class="font-medium text-cyan-500 hover:underline ">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>