<?php
require_once('includes/dashboard.php');
$users = new UsersController();
if (isset($_POST['delete-user'])) {
    $users = new UsersController();
    $users->deleteUser();
}
$postNumber = new PostsController();
$resultPosts = $postNumber->AllPosts();

$categoryNumber = new CategoryController();
$resultCategory = $categoryNumber->AllCategorys();
$bestCategory = $categoryNumber->getBestCategory()['name'];
$resultUsers = $users->AllUsers();
if (isset($_POST['user-search'])) {
    $mydata = $users->UserSearch();
} else {
    $mydata = $users->getAllUsers();
}
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
        <?php include('includes/alerts.php') ?>
        <div class="mt-2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th colspan="4" class="text-center">
                                ther is no data to show
                            </th>
                        </tr>
                        <?php
                    } else {
                        foreach ($mydata as $user) { ?>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
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
                                    <form method="post">
                                        <input type="hidden" name="user-id" value="<?= $user['id'] ?>">
                                        <div class="flex">
                                            <button name="delete-user" type="submit">
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
    </div>
</section>
</main>