<?php
require_once('includes/dashboard.php');

$post = new PostsController();
$category = new CategoryController();
$mydata = $category->GetUniqueCategory();

if (isset($_POST["delete-post"])) {
    $post = new PostsController();
    $post->deletePosts();
}
if (isset($_POST['update-post'])) {
    $post = new PostsController();
    $post->updatePosts();
}
if (isset($_POST['search'])) {
    $data = $post->searchPosts();
} else
    if(isset($_GET['mypage'])){
       $param=$_GET['mypage']*4;
       $data = $post->getAllPosts($param);

    }else{
        $param=0;
        $data = $post->getAllPosts($param);
    }

$users = new UsersController();
$resultPosts = $post->AllPosts();
$resultCategory = $category->AllCategorys();
$bestCategory = $category->getBestCategory()['name'];
$resultUsers = $users->AllUsers();
?>
<!-- <header class="dashboard-header z-10">
    <nav class="nav-bar flex justify-between">
        <div class="search-bar w-80">
            <form method="post">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" name="input-search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                    <button type="submit" name="search" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div class="menu-bar">
            <i class="w-6 h-6 fa-solid fa-bars"></i>
        </div>
    </nav>
</header> -->
<section class="my-section mt-20 flex justify-center">
    <div class="w-11/12">
        <div class=" mb-4  w-full grid row gap-4  xl:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
            <div class='bg-white shadow h-24 rounded flex justify-around items-center font-bold'>
                <div class="text-center">
                    <p>Users</p>
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <p><?= $resultUsers ?></p>
                </div>
            </div>
            <div class='bg-white shadow h-24  rounded flex justify-around font-bold  items-center'>
                <div class="text-center">
                    <p>Posts</p>
                    <i class=" fa-solid fa-blog"></i>
                </div>
                <div>
                    <p><?= $resultPosts ?></p>
                </div>
            </div>
            <div class='bg-white shadow h-24  rounded flex justify-around font-bold items-center  '>
                <div class="text-center">
                    <p>Categorys</p>
                    <i class="fa-solid fa-braille"></i>
                </div>
                <div>
                    <p><?= $resultCategory ?></p>
                </div>
            </div>
            <div class='card bg-white shadow h-24  rounded flex justify-around font-bold items-center'>
                <div class="text-center">
                    <p>Best Category</p>
                    <i class="fa-solid fa-fire"></i>
                </div>
                <div>
                    <p>
                        <?= $bestCategory ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button id="add-post" type="button" data-modal-target="staticModal" data-modal-toggle="staticModal" class="flex  items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa-solid fa-plus mr-2"></i> <span>Add Post</span></button>
        </div>
        <?php include('includes/alerts.php'); ?>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="text-bold px-6 py-3">
                            Tilte
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            Picture
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            Overview
                        </th>
                        <th scope="col" class="text-bold text-center px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($data == 0) {
                    ?>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td colspan="6" class="font-bold text-center px-6 py-4">
                                there is no data to show
                            </td>
                        </tr>
                        <?php
                    } else {
                        foreach ($data as $post) { ?>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <?php echo $post['title'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $post['content'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo '<img style="width:100px;height:80px" src="./public/images/' . $post['picture'] . '" alt="">' ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $post['name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <button  onclick="overview('<?= $post['title'] ?>','<?= $post['content'] ?>','<?= $post['name'] ?>','<?= $post['picture'] ?>')" type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 shadow-lg shadow-pink-500/50 dark:shadow-lg dark:shadow-pink-80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">overview</button>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <form method="post">
                                        <div class="flex">
                                            <input type="hidden" name="id_post" value="<?= $post["id"] ?>">
                                            <button onclick="editPost(<?= $post['id'] ?>,'<?= $post['title'] ?>','<?= $post['content'] ?>','<?= $post['post_category'] ?>','<?= $post['picture'] ?>')" type="button" class="mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-green-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                            <button name="delete-post" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-red-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
        <?php
        $numberOfButtons =ceil($resultPosts / 4);
        ?>
        <div class="flex justify-end mb-3">
            <div>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 font-bold text-white hover:bg-blue-700"><i class="fa-solid fa-caret-left"></i></button>

                <?php
                for ($i = 1; $i <=$numberOfButtons; $i++) {
                ?>
                    <a href='?mypage="<?= $i ?>"' class="px-4 py-2 rounded bg-blue-600 font-bold text-white hover:bg-blue-700"><?= $i ?></a>
                <?php
                }
                ?>
                <button type="submit" class="px-4 py-2 rounded bg-blue-600 font-bold text-white hover:bg-blue-700"><i class="fa-sharp fa-solid fa-caret-right"></i></button>
            </div>
        </div>
    </div>
</section>
</main>


<!-- Main modal -->
<div id="post-Modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed flex justify-center items-center top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Post
                </h3>
                <button id="closeAddPost-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="add" method="post">
                <div class="mx-4 mt-6">
                    <div>
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of posts you want to add</label>
                        <input type="number" name="number_posts"  id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Number of posts" required>
                        <p id="add-error" class="text-red-400 hidden font-bold">please fill this feild</p>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button id="add-number" type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create</button>
                    <button id="decline-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="my-overView" class="hidden  fixed flex justify-center items-center top-0 left-0 right-0 bg-black h-screen bg-opacity-50 z-20">
    <div class="relative mx-4 max-w-lg w-3/5 h-4/5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 overflow-x-auto">
        <img id="Opost-image" class="rounded-t-lg h-2/5 w-full">
        <div class="p-5">
            <h5 id='Opost-title' class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"></h5>
            <p id="Opost-content" class="mb-3 font-normal text-gray-700 dark:text-gray-400"></p>
            <b id="Opsts-Category"></b>
        </div>
        <div class="absolute bottom-0 flex justify-end right-1">
            <button id="hide-overView" type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Decline</button>
        </div>
    </div>
</div>
<!-- update modal -->
<div id="update-Modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="pt-32 hidden fixed flex justify-center items-center top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full h-full max-w-2xl  md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Update Post
                </h3>
                <button id="closeUpdatePost-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="post-id" id="post-id">
                <div class="mx-4 mb-2 pt-2">
                    <label for="title" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Title</label>
                    <input id="title" type="text" name="title" class="title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="title" required>
                </div>
                <div class="mx-4 mt-6">
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                            <label for="editor" class="sr-only">Publish post</label>
                            <textarea id="editor" name="update-content" rows="8" class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write an article..." required></textarea>
                    </div>
                </div>
                <div class="mx-4 mb-2 flex justify-around">
                    <div>
                        <label for="picture" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Picture</label>
                        <input type="file" name="picture" class="picture bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="image.png" required>
                    </div>
                    <img style="width:100px;height:100px" id="image-up" alt="">
                </div>
                <div class="mx-4 mb-2">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="post-category" id="posts-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php foreach ($mydata as $val) { ?>
                            <option value="<?= $val["id_category"] ?>"><?= $val["name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button name="update-post" type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update</button>
                    <button id="declineUpdate-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>