<?php
// $data = new PostsController();
// $employes = $data->getAllPosts();
// print_r($employes);
?>
<main id="dashboard-page">

<aside class="side-bar">
    <div class="sidebar-content">
        <ul class="relative top-2 left-2">
            <li class=" flex justify-start items-center "><img class="w-10 h-10 " src="./public/images/la-lettre-b.png" alt=""><span class="hidden Blog-text ml-2 font-bold text-md text-indigo-700">BlogPost</span></li>
        </ul>
        <i class="hidden  icon-left icon fa-solid fa-angles-left"></i>
        <i class="icon-right icon fa-solid fa-angles-right"></i>
        <div class="profile-image">
            <img src="./public/images/profile.png" alt="">
        </div >
        <div class="user-connect">
            <p>Admin<br>connect</p>
        </div>
        <ul class="list-content1 ">
            <li><a href="#"><i class="fa-solid fa-table-columns"></i><span class="words">Dashboard</span></a></li>
            <li><a href="posts"><i class="fa-solid fa-blog"></i><span  class="words">Posts</span></a></li>
            <li><a href="users"><i class="fa-solid fa-users"></i><span  class="words">Users</span></a></li>
            <li><a href="Profile"><i class="fa-solid fa-address-card"></i><span class="words">Profile</span></a></li>
            <li><a class="logout" href="logout"><i class="fa-solid fa-right-from-bracket"></i><span class="words">logout</span></a></li>
        </ul>
    </div>
</aside>
