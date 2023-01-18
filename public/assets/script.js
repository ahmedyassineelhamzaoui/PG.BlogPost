let iconLeft=document.querySelector(".icon-left")
let iconRight=document.querySelector(".icon-right")
let sideBar=document.querySelector(".side-bar")
let words=document.querySelectorAll(".words")
let mySection=document.querySelector(".my-section")
let navBar=document.querySelector(".nav-bar")
let BlogText=document.querySelector(".Blog-text")
words.forEach(word=>{
    word.style.display="none";
})
iconLeft.onclick=()=>{
    iconLeft.classList.add("hidden");
    iconRight.classList.remove("hidden")
    sideBar.style.width="70px";
    words.forEach(word=>{
        word.style.display="none";
    })
    BlogText.style.display="none"
}
iconRight.onclick=()=>{
    iconRight.classList.add("hidden")
    iconLeft.classList.remove("hidden")
    sideBar.style.width="270px";
    words.forEach(word=>{
        word.style.display="block";
    })
    BlogText.style.display="block"
}
// button addpost
let addpost = document.querySelector("#add-post")
let postModal = document.querySelector("#post-Modal")
let closeAddPostModal=document.querySelector("#closeAddPost-modal")
let declineModal = document.querySelector('#decline-modal')
if(addpost){
addpost.onclick=()=>{
    postModal.classList.remove('hidden')
}
closeAddPostModal.onclick=()=>{
    postModal.classList.add('hidden')
}
declineModal.onclick=()=>{
    postModal.classList.add('hidden')
}
}
// category
let categoryModal=document.querySelector("#category-Modal")
let addCategory=document.querySelector("#add-category")
let declineCategoryModal=document.querySelector('#declineCategory-modal')
let closeAddCategoryModal=document.querySelector('#closeAddCategory-modal')
if(addCategory){
addCategory.onclick=()=>{
    categoryModal.classList.remove('hidden')
}
closeAddCategoryModal.onclick=()=>{
    categoryModal.classList.add('hidden')
}
declineCategoryModal.onclick=()=>{
    categoryModal.classList.add('hidden')
}
}