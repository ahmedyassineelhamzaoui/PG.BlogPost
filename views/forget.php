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
                  Email verification
              </h1>
              <form class="space-y-4 md:space-y-6"  method="post">
                  <div>
                      <label for="email-login" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                      <input  type="email" name="email-login" id="email-login" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5 " placeholder="exemple@gmail.com" required="">
                  </div>
                  <button type="submit" name="" class="w-full text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Send email verfication</button>
              </form>
          </div>
      </div>
  </div>
</section>