<?php
$category = new CategoryController();
$mydata = $category->GetUniqueCategory();
if (isset($_POST["number_posts"])) {
    $_SESSION["post_number"] = $_POST["number_posts"];
}
if (isset($_POST["add-post"])) {
    $post = new PostsController();
    $post->addPost();
}
require_once('includes/dashboard.php')
?>
<header class="dashboard-header">
    <nav class="nav-bar flex justify-between">
        <div class="search-bar w-80">
            <form>
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                    <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

        </div>
        <div class="menu-bar">
            <i class="w-6 h-6 fa-solid fa-bars"></i>
        </div>
    </nav>
</header>
<section class="my-section flex justify-center mt-20">
    <div class="w-4/5">
        <form class="w-full" method="post" enctype="multipart/form-data">
            <?php for ($i = 0; $i < $_SESSION["post_number"]; $i++) { ?>
                <div class="w-full px-4 border border-gray-200 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l rounded-lg mb-2">
                    <div class="mb-6 pt-2">
                        <label for="title" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="post-title[]" class="post-title title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="title">
                        <p class="title-error hidden text-red-600 font-bold">you must fill this field</p>
                    </div>
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <label for="editor" class="sr-only">Publish post</label>
                        <textarea id="editor<?= $i ?>" name="post-content[]" rows="8" class="post-content px-2 block w-full pt-1 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..."></textarea>
                    </div>
                    <p class="content-error hidden text-red-600 font-bold">you must fill this field</p>

                    <div class="mb-6">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="post-category[]" id="dorpDown-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($mydata as $val) { ?>
                                <option value="<?= $val["id_category"] ?>"><?= $val["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="picture" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Picture</label>
                        <input type="file" name="post-picture[]" class="picture bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="image.png">
                    </div>
                </div>
            <?php } ?>
            <div class="flex items-center justify-end">
                <button id="add-AllPosts" name="add-post" type="submit" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add <?php echo $_SESSION["post_number"] > 1 ? 'Posts' :  'Post' ?></button>
                <a href="posts" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">back</a>
            </div>
        </form>

    </div>

</section>
</main>