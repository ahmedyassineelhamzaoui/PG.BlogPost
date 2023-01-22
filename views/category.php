<?php require_once('includes/dashboard.php');
$category = new CategoryController();
$mydata = $category->GetUniqueCategory();
if (isset($_POST['add'])) {
    $newCategorie = new CategoryController();
    $newCategorie->addCategory();
}
if (isset($_POST["delete-category"])) {
    $newCategorie = new CategoryController();
    $newCategorie->deleteCategory();
}
if (isset($_POST["update-category"])) {
    $newCategorie = new CategoryController();
    $newCategorie->updateCategory();
}
if(isset($_POST["search"])){
    $data = $category->SearchPosts();
}else{
    $data = $category->getAllCategorys();
}
$users=new UsersController();
$postNumber = new PostsController();
$resultPosts = $postNumber->AllPosts();
$resultCategory = $category->AllCategorys();
$bestCategory = $category->getBestCategory()['name'];
$resultUsers = $users->AllUsers();
?>
<header class="dashboard-header">
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
</header>
<section class="my-section mt-20 flex justify-center">
    <div class="w-4/5">
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
        <button id="add-category" type="button" data-modal-target="staticModal" data-modal-toggle="staticModal" class="flex  items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i class="fa-solid fa-plus mr-2"></i> <span>Add Category</span></button>
    </div>
    <?php include('includes/alerts.php'); ?>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="text-bold text-center px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="text-bold text-center px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="text-bold text-center px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($data==0){
                 ?>
                 <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td colspan="3" class="text-center font-bold px-6 py-4">
                            there is no data to show
                        </td>
                </tr>
                 <?php
                }else{ foreach ($data as $val) { ?>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <td class="text-center px-6 py-4">
                            <?php echo $val['id_category'] ?>
                        </td>
                        <td class="text-center px-6 py-4">
                            <?php echo $val['name'] ?>
                        </td>
                        <td class=" px-6 py-4 ">
                            <form method="post">
                                <input type="hidden" name="category-id" value="<?= $val["id_category"] ?>">
                                <div class="flex justify-center w-full">
                                    <button name="opencategorys" onclick="editCategory('<?= $val['name'] ?>',<?= $val['id_category'] ?>);" type="button" class="mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-green-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </button>
                                    <button type="submit" name="delete-category">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-red-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
    </div>
</section>
</main>

<!-- Main modal -->
<div id="category-Modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed flex justify-center items-center top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Category
                </h3>
                <button id="closeAddCategory-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post">
            <input id="category-id" type="hidden" name="category-id" >

            <div id="my-field" class="mx-4 mt-6">
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name of category</label>
                        <input type="text" name="category_name" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name of category">
                    </div>
                </div>
                <div id="drop-down" class="mx-4 mt-6">
                    <div>
                        <select name="categorySelect_name" id="dorpDown-category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($mydata as $val) { ?>
                                <option ><?= $val["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="flex justify-end items-center ">
                        <button id="update-category" name="update-category" type="submit" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l  hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Update</button>
                        <button id="add" name="add" type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Create</button>
                        <button id="declineCategory-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center  ">Decline</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>