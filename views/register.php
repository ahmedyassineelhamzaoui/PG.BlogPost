<?php
if (isset($_SESSION['id'])) {
    header('location:posts');
}
if (isset($_POST["signup"])) {
    $compte = new UsersController();
    $compte->register();
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
<main class="h-[calc(100vh-66px)]">
<div class="mt-16 flex flex-col items-center justify-center px-6 py-8 mx-auto h-full  lg:py-0">
    <div class="w-full  bg-white rounded-lg shadow hitgth-modal md:mt-0 sm:max-w-md xl:p-0 overflow-y-auto ">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8 ">
            <?php include('includes/alerts.php'); ?>
            <h1 class="text-xl font-bold text-center text-gray-900 md:text-2xl ">
                Create your account
            </h1>
            <form class="space-y-4 " action="#" method="post">
                <div>
                    <label for="name" class="block  text-sm font-medium text-gray-900">Your name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="name">
                    <p id="name-error" class="text-red-400 font-bold"></p>
                </div>
                <div>
                    <label for="email-login" class="block  text-sm font-medium text-gray-900">Your email</label>
                    <input type="email" name="email-signup" id="email-signup" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="exemple@gmail.com">
                    <p id="emailSignup-error" class="text-red-400 font-bold"></p>
                </div>
                <div>
                    <label for="password-singup" class="block  text-sm font-medium text-gray-900 ">Password</label>
                    <input type="password" name="password-singup" id="password-singup" placeholder="????????????????????????" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    <p id="passwordSignup-error" class="text-red-400 font-bold"></p>

                </div>
                <div>
                    <label for="password-singup-repeat" class="block text-sm font-medium text-gray-900 ">Confirm Password</label>
                    <input type="password" name="password-singup-repeat" id="password-singup-repeat" placeholder="????????????????????????" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                    <p id="rpeateSignup-error" class="text-red-400 font-bold"></p>
                </div>

                <button type="submit" id="signup" name="signup" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign up</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400 ">
                    <span class="font-bold">Already have an account?</span> <a href="login" class="font-medium text-cyan-500 hover:underline ">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</div>
</main>