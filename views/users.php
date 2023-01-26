<?php
require_once('includes/dashboard.php');
$title="useres";

$users = new UsersController();
$connectedUser=$users->ConnectedUser();
if (isset($_POST['delete-user'])) {
    $users = new UsersController();
    $users->deleteUser();
}
$postNumber = new PostsController();
$resultPosts = $postNumber->AllPosts();

$categoryNumber = new CategoryController();
$resultCategory = $categoryNumber->AllCategorys();
if($categoryNumber->getBestCategory()==0){
    $bestCategory = "no category";
}else{
    $bestCategory = $categoryNumber->getBestCategory()['name'];
}
$resultUsers = $users->AllUsers();
if (isset($_POST['user-search'])) {
    $mydata = $users->UserSearch();
} else {
    $mydata = $users->getAllUsers();
}

if(isset($_POST['edit-profile'])){
    $users->UpdateProfile();
}
?>
<header class="dashboard-header">
    <nav class="nav-bar flex justify-between">
        <div class="search-bar w-80 ">
            <form method="post" >
                <label for="default-search " class="mb-2  text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute  inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" name="input-search" id="default-search" class="block  w-full p-4 pl-10 text-sm  border border-gray-300 rounded-lg  focus:ring-blue-500 focus:border-blue-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                    <button type="submit" name="user-search" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div class="menu-bar">
            <i class="w-6 h-6 fa-solid fa-bars"></i>
        </div>
    </nav>
</header>
<section class="my-section mt-20 flex justify-center">
    <div class="w-11/12">
        <div class=" mb-4  w-full grid row gap-4  xl:grid-cols-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
            <div class='bg-gray-600 shadow h-24 rounded flex justify-around items-center font-bold'>
                <div class="text-center">
                    <p class="text-yellow-500">Users</p>
                    <i class="text-yellow-500 fa-solid fa-users"></i>
                </div>
                <div>
                    <p class="text-white"><?= $resultUsers ?></p>
                </div>
            </div>
            <div class='bg-gray-600 shadow h-24  rounded flex justify-around font-bold  items-center'>
                <div class="text-center">
                    <p class="text-blue-500">Posts</p>
                    <i class="text-blue-500 fa-solid fa-blog"></i>
                </div>
                <div>
                    <p class="text-white"><?= $resultPosts ?></p>
                </div>
            </div>
            <div class='bg-gray-600 shadow h-24  rounded flex justify-around font-bold items-center  '>
                <div class="text-center">
                    <p class="text-pink-500">Categorys</p>
                    <i class="text-pink-500 fa-solid fa-braille"></i>
                </div>
                <div>
                    <p class="text-white"><?= $resultCategory ?></p>
                </div>
            </div>
            <div class='card bg-gray-600 shadow h-24  rounded flex justify-around font-bold items-center'>
                <div class="text-center">
                    <p class="text-green-500">Best Category</p>
                    <i class="text-green-500 fa-solid fa-fire"></i>
                </div>
                <div>
                    <p class="text-white">
                        <?= $bestCategory ?>
                    </p>
                </div>
            </div>
        </div>
        <?php include('includes/alerts.php') ?>
        <div class="mt-2 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
            <table class="w-full text-sm text-left text-gray-400">
                <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="text-bold px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            email
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            Password
                        </th>
                        <th scope="col" class="text-bold px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($mydata == 0) {
                    ?>
                        <tr class="border-b bg-gray-900 dark:border-gray-700">
                            <th colspan="4" class="text-center">
                                ther is no data to show
                            </th>
                        </tr>
                        <?php
                    } else {
                        foreach ($mydata as $user) { ?>
                            <tr class="bg-gray-900 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    <?= $user['name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $user['email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $user['password'] ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                        <div class="flex">
                                            <button onclick="deleteUser(<?= $user['id'] ?>,<?= $_SESSION['id'] ?>)" name="delete-user" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer text-red-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</main>

<div id="profile-Modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="pt-32 hidden  fixed flex justify-center items-center top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto bg-black bg-opacity-50 h-screen ">
    <div class="relative w-full lg:w-2/5 h-full max-w-2xl  md:h-auto">
        <!-- Modal content -->
        <div class="bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between p-4 border-b  dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Update Profile
                </h3>
                <button id="closeeditProfile-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="staticModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <form method="post" >
                    <input type="hidden" value="<?=$connectedUser->id?>" name="user-id" >
                <div class="mx-4 mb-2 pt-2">
                    <label for="user-name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Your Name</label>
                    <input value="<?=$connectedUser->name?>" id="user-name" type="text" name="user-name" class="title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" required>
                </div>
                <div class="mx-4 mb-2 pt-2">
                    <label for="user-email" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Your email</label>
                    <input value="<?=$connectedUser->email?>" id="user-email" type="email" name="user-email" class="title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="email" required>
                </div>
                <div class="mx-4 mb-2 pt-2">
                    <label for="user-password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Your Password</label>
                    <input value="<?=$connectedUser->password?>" id="user-name" type="password" name="user-password" class="title bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="password" required>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 mt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button name="edit-profile" type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update</button>
                    <button id="declineProfile-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="delet-user" class="fixed z-50 hidden top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,0.5);">
    <div class="relative rounded-lg p-6 bg-white">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-medium">Delete Confirmation</h3>
            <button class="text-gray-500 font-medium cursor-pointer" id="close-deletedUser"><i class="fa-solid text-lg fa-rectangle-xmark"></i></button>
        </div>
        <div class="mt-4">
            <p id="message-confirmation">Are you sure you want to delete this User?</p>
        </div>
        <div class="flex justify-end mt-4">
            <form method="post">
                <input type="hidden" name="deleted-user" id="deleted-user">
                <input type="hidden" name="connect-user" id="connect-user">
                <button type="button" class="px-4 py-2 rounded-md text-white bg-gray-600" id="cancel-deletedUser">Cancel</button>
                <button class="px-4 py-2 rounded-md text-white bg-red-600" type="submit" name="delete-user">Delete</button>
            </form>
        </div>
    </div>
</div>