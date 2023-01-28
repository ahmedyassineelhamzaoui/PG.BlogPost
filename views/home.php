<?php
$category = new CategoryController();
$numbersOfCategorys = $category->AllCategorys();

$mycategorys = $category->getAllCategorys();

$myoption = new PostsController();
// die(var_dump($mycategorys));
?>
<header class="fixed header-landingpage  ">
  <nav class="flex px-2 justify-between items-center nav-landingpage shadow-lg shadow-gray-700">
    <a class="text-fuchsia-800 nav-logo" href="home">BlogPost</a>
    <ul id="nav-page" class="flex my-auto nav-pages">
      <li><a class="ml-2 about-page" href="#">Home</a></li>
      <li><a class="ml-2 mr-2 news-page" href="#">posts</a></li>
      <li><a class="ml-2 mr-2 tearms-page" href="#">About</a></li>
      <li><a class="ml-2 mr-2 contact-page" href="#">Contact</a></li>
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

<main class="mt-20">
  <?php
  for ($i = 0; $i < $numbersOfCategorys; $i++) {
  ?>
    <h1 class="text-white font-bold mx-4"><?= $mycategorys[$i]['name'] ?> Category</h1>
    <?php
    $result = $myoption->getChaque($mycategorys[$i]['name']);
    ?>
    <section class="grid row  xl:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-6 mx-4 my-5">
    <?php 
    if($result==0){
    ?>
    <h1 class="mx-3 text-blue-200">there is no post with this category</h1>
    <?php
    }else{
    foreach($result as $mydata){ 
      ?>
      <div class="max-w-sm rounded overflow-hidden flex flex-col bg-gray-700 hover:scale-105 cursor-pointer ease-in duration-300 h-[430px] shadow-lg shadow-cyan-100/50 hover:shadow-cyan-600">
        <img class="w-full h-2/5" <?php echo 'src="./public/images/'.$mydata['picture'].'"'?> alt="Sunset in the mountains">
        <div class="px-6 py-4 h-2/5">
          <div class="font-bold text-md mb-2 text-center text-white font-mono"><?= substr($mydata['title'],0,20)?></div>
          <p class="text-white text-md font-sans"><?= strlen($mydata["content"])>180 ? substr($mydata["content"],0,180).'...' : $mydata["content"] ?> </p>
        </div>
        <div class="flex justify-center items-center h-1/5">
          <button class="hover:bg-white rounded-lg px-2 hover:text-blue-400 py-1 text-white bg-blue-600 ">view details</button>
        </div>
      </div>
    <?php
     }}
     ?>
    </section>
  <?php
   } 
  ?>
</main>
</body>

</html>