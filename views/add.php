<?php
$category = new CategoryController();
$mydata = $category->GetUniqueCategory();
if (isset($_POST["number_posts"])) {
    if(empty($_POST["number_posts"])){
        Session::set('info','you must enter a number between 1 and 10');
        header('location:posts');
    }else{
        $_SESSION["post_number"] = $_POST["number_posts"];
    }
}
$users = new UsersController();
$connectedUser=$users->ConnectedUser();
if(isset($_POST['edit-profile'])){
    $users->UpdateProfile();
}
if (isset($_POST["add-post"])) {
    $post = new PostsController();
    $post->addPost();
}
require_once('includes/dashboard.php')
?>

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
                    <div class="pt-2">
                        <label for="editor" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Content</label>
                        <textarea   name="post-content[]" rows="8" class="post-content w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600" placeholder="Write an article..."></textarea>
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