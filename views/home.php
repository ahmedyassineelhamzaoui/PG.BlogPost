<?php
$category = new CategoryController();
$numbersOfCategorys = $category->AllCategorys();

$mycategorys = $category->getAllCategorys();

$myoption = new PostsController();
?>
<header class="header-landingpage ">
  <nav class="fixed flex px-2 justify-between items-center nav-landingpage shadow-lg shadow-gray-700">
    <a class="text-fuchsia-800 nav-logo text-purple-500" href="home">Blog<span class="text-blue-400">Post</span></a>
    <ul id="nav-page" class="flex my-auto nav-pages">
      <li><a class="ml-2 about-page" href="home">Home</a></li>
      <li><a class="ml-2 mr-2 news-page" href="#post">posts</a></li>
      <li><a class="ml-2 mr-2 tearms-page" href="#about">About</a></li>
      <li><a class="ml-2 mr-2 contact-page" href="#contact">Contact</a></li>
    </ul>
    <ul id="nav-compt" class="flex  my-auto nav-compte">

      <li><a href="<?= isset($_SESSION["id"]) ? 'users' : 'login' ?>" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white hover:text-white font-bold dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
            <?= isset($_SESSION["id"]) ? 'mon compte' : 'login' ?>
          </span>
        </a>
      </li>
      <li><a href="<?= isset($_SESSION["id"]) ? 'logout' : 'register' ?>" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
          <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 font-bold hover:text-white rounded-md group-hover:bg-opacity-0">
            <?= isset($_SESSION["id"]) ? 'logout' : 'Sign up' ?>
          </span>
        </a></li>
    </ul>
    <div class="header-menu">
      <span class="ligne"></span>
      <span class="ligne"></span>
      <span class="ligne"></span>
    </div>
  </nav>
  <div class="home flex justify-center items-center">
    <div class="headerTitle">
      <pre class="text-purple-500 text-4xl font-bold font-sans">Blog Post</pre>
      <pre class="text-blue-500 text-4xl font-bold font-sans">         The best Blog</pre>
      <pre class="text-pink-400 text-4xl font-bold font-sans ">                      For developers</pre>
    </div>
  </div>
</header>

<main class="mt-10 ">
  <section id="about" class="text-center w-full mt-10">
    <h1 id="about" class="font-bold text-xl text-white ">About Us</h1>
    <p class="text-white text-md font-sans">
      A blog post creation website is a platform that allows users to create, publish, and manage blog posts online. These websites often provide a simple and user-friendly interface, making it easy for users to create and publish content, even without technical knowledge. They typically offer a variety of customization options, such as templates, themes, and multimedia support. Additionally, some blog post creation websites may also provide features such as SEO optimization, analytics, and the ability to monetize content through advertising or sponsorships. Overall, these websites offer a convenient and accessible way for users to start a blog and share their ideas, thoughts, and experiences with a wider audience.
    </p>
  </section>
  <div id="post" class="mt-10 flex justify-center w-full ">
    <h1 class="font-bold text-xl text-white">All Categorys </h1>
  </div>
  <?php
  for ($i = 0; $i < $numbersOfCategorys; $i++) {
  ?>

    <h1 class="text-white font-bold mx-4"><?= $mycategorys[$i]['name'] ?> Category</h1>
    <?php
    $result = $myoption->getChaque($mycategorys[$i]['name']);
    ?>
    <section class=" grid row xl:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 mx-4 my-5 ">
      <?php
      if ($result == 0) {
      ?>
        <h1 class="mx-3 text-blue-200">there is no post with this category</h1>
        <?php
      } else {
        foreach ($result as $mydata) {
        ?>
          <div class="max-w-sm rounded overflow-hidden flex flex-col bg-gray-800 hover:scale-105 cursor-pointer ease-in duration-300 h-[430px] shadow-lg shadow-cyan-100/50 hover:shadow-cyan-600">
            <img class="w-full h-2/5" <?php echo 'src="./public/images/' . $mydata['picture'] . '"' ?> alt="Sunset in the mountains">
            <div class="px-6 py-4 h-2/5">
              <div class="font-bold text-md mb-2 text-center text-white font-mono"><?= substr($mydata['title'], 0, 20) ?></div>
              <p class="text-white text-md font-sans"><?= strlen($mydata["content"]) > 180 ? substr($mydata["content"], 0, 180) . '...' : $mydata["content"] ?> </p>
            </div>
            <div class="flex justify-center items-center h-1/5">
              <button onclick="viewDetails('<?= $mydata['title'] ?>','<?= $mydata['picture'] ?>','<?= $mydata['content'] ?>','<?= $mydata['name'] ?>');" class="hover:bg-white rounded-lg px-2 hover:text-blue-400 py-1 text-white bg-blue-600 ">view details</button>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </section>
  <?php
  }
  ?>
  <section id="contact" class="mt-32 w-full bg-white h-[200px] mt-10 grid row xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4 px-4">
    <div class=" h-full flex justify-center items-center">
      <div class="">
        <h1 class="font-bold text-lg text-center text-purple-500">Blog<span class="text-blue-400">Post</span></h1>
        <p class="text-gray-600">
        </p>
        <p class="font-sans">copyright &copy Ahmed Yassin All right reserved 2023 </p>
      </div>
    </div>
    <div class=" flex items-center justify-center">
      <div class="">
        <div class="my-1 flex items-center  font-sans"><i class="fa-solid fa-location-dot text-blue-500 bg-gray-300 rounded-full flex justify-center items-center w-7 h-7"></i>
          <p class="mx-2 flex flex-col"><span>Morroco</span>Meknes<span></span></p>
        </div>
        <div class="my-2 flex items-center  font-sans"><i class="fa-solid fa-phone text-green-500 bg-gray-300 rounded-full flex justify-center items-center w-7 h-7"></i>
          <p class="mx-2">+212 631800923</p>
        </div>
        <div class="my-1 flex items-center justify-center font-sans"><i class="fa-solid fa-envelope text-yellow-500 bg-gray-300 rounded-full flex justify-center items-center w-7 h-7"></i>
          <p class="mx-2">ahmed.yassin.elhamzaoui2019@gmail.com</p>
        </div>
      </div>
    </div>
    <div class="flex items-center justify-center">
      <div class="w-full">
        <div class="mx-auto w-4/5 h-9  rounded-lg mb-4 border-l-2 border-t-2 border-b-2 border-blue-400">
          <input type="search" class="w-4/5 h-full outline-0 pl-1 rounded-l-lg " placeholder="search"><input class="px-2 rounded-r-lg bg-blue-600 text-white hover:bg-blue-700 w-1/5 h-full cursor-pointer font-sans" value="search" type="submit">
        </div>
        <div class="mx-auto flex items-center justify-center mt-4">
          <a href=""><i class="fa-brands fa-facebook-f  text-blue-600 bg-gray-400 flex items-center justify-center rounded-full  h-10 w-10 mx-1 hover:text-blue-600 hover:bg-black ease-in duration-900"></i></a>
          <a href=""><i class="fa-brands fa-twitter text-blue-600 bg-gray-400 flex items-center justify-center rounded-full  h-10 w-10 mx-1 hover:text-blue-600 hover:bg-black"></i></a>
          <a href=""><i class="fa-brands fa-linkedin-in text-blue-600 w-10 h-10 bg-gray-400 rounded-lg flex items-center justify-center mx-1 hover:text-blue-600 hover:bg-black"></i></a>
          <a href=""><i class="fa-brands fa-github bg-gray-400 flex items-center justify-center rounded-full  h-10 w-10 hover:text-white hover:bg-black"></i></a>
        </div>
      </div>
    </div>
  </section>
</main>




<div id="my-overView" class="fixed hidden flex justify-center items-center top-0 left-0 right-0 bg-black h-screen bg-opacity-50 z-20">
  <div class="relative mx-4 w-8/12 h-4/5 bg-gray-700 border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
    <img id="home-image" class="rounded-t-lg h-2/5 w-full">
    <div class="p-5">
      <h5 id='home-title' class="mb-2 text-2xl font-bold tracking-tight text-black dark:text-white"></h5>
      <p id="home-content" class="mb-3 font-normal text-blue-500 dark:text-gray-400"></p>
      <b class="text-white" id="home-Category"></b>
    </div>
    <div class="absolute bottom-0 flex justify-end right-1">
      <button id="hide-overView" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Decline</button>
    </div>
  </div>
</div>