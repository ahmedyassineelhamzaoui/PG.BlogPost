<?php
if(isset($_SESSION['id'])){
    header('location:posts');
}
if(isset($_POST['login'])){
$compte=new UsersController();
$compte->login();
}

?>
<header class="fixed header-landingpage  ">
  <nav class="flex px-2 justify-between items-center nav-landingpage shadow-lg shadow-gray-700">
    <a class="text-fuchsia-800 nav-logo text-purple-500" href="home">Blog<span class="text-blue-400">Post</span></a>
    <ul id="nav-page" class="flex my-auto nav-pages">
      <li><a class="ml-2 about-page" href="home">Home</a></li>
      <li><a class="ml-2 mr-2 news-page" href="posts">posts</a></li>
      <li><a class="ml-2 mr-2 tearms-page" href="about">About</a></li>
      <li><a class="ml-2 mr-2 contact-page" href="contact">Contact</a></li>
    </ul>
    <ul id="nav-compt" class="flex  my-auto nav-compte">
      <li><a href="login" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white hover:text-white font-bold dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            Sign in
          </span>
        </a>
      </li>
      <li><a href="register" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 font-bold hover:text-white rounded-md group-hover:bg-opacity-0">
            Sign up
          </span>
        </a></li>
    </ul>
    <div class="header-menu">
      <span class="ligne"></span>
      <span class="ligne"></span>
      <span class="ligne"></span>
    </div>
  </nav>
</header>
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
                      <input value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>" type="email" name="email-login" id="email-login" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="exemple@gmail.com" required="">
                      <p id="error-SigninMail" class="text-red-400 font-bold "></p>
                    </div>
                  <div>
                      <label for="password-login" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['email'];?>" type="password" name="password-login" id="password-login" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
                      <p id="error-Signinpassword"  class="text-red-400 font-bold "></p>
                 
                    </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" name="remembre" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 " >
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500">Remember me</label>
                          </div>
                      </div>
                      <a href="forget" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                  </div>
                  <button type="submit" name="login" id="login-form" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                  <p class="text-sm font-light text-gray-500 ">
                     <span class="font-bold">Don’t have an account yet?</span>  <a href="register" class="font-medium text-cyan-500 hover:underline ">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
