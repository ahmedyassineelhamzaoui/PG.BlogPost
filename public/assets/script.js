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
    document.querySelector("#update-category").style.display = 'none';
    document.querySelector("#add").style.display = 'block';
    categoryModal.classList.remove('hidden')
    document.querySelector("#my-field").style.display="block"
    document.querySelector('#drop-down').style.display="none"
}
closeAddCategoryModal.onclick=()=>{
    categoryModal.classList.add('hidden')
}
declineCategoryModal.onclick=()=>{
    categoryModal.classList.add('hidden')
}
}
// alert
myAlert=document.querySelector("#my-alert")
closeAlert=document.querySelector("#close-alert")
if(closeAlert){
    closeAlert.onclick=()=>{
        myAlert.classList.add('hidden');
    }
}
if(document.querySelector("#update-category")){
    document.querySelector("#update-category").style.display = 'none';

}
if(document.querySelector('#drop-down')){
    document.querySelector('#drop-down').style.display="none"}
function editCategory(name,id){
    categoryModal.classList.remove('hidden');
    document.querySelector("#update-category").style.display = 'block';
    document.querySelector("#add").style.display = 'none';
    document.querySelector("#dorpDown-category").value = name;
    document.querySelector("#category-id").value=id
    document.querySelector("#my-field").style.display="none"
    document.querySelector('#drop-down').style.display="block"
    console.log(name,id)
}
function editPost(id,title,content,name,image){
    document.querySelector('#update-Modal').classList.remove("hidden");
    document.querySelector('#title').value=title
    document.querySelector('#posts-category').value=name;
    document.querySelector("#image-up").setAttribute('src','public/images/'+image);
    document.querySelector("#editor").value=content
    document.querySelector("#post-id").value=id
}
if(document.querySelector('#closeUpdatePost-modal')){
    document.querySelector('#closeUpdatePost-modal').onclick=()=>{
    document.querySelector('#update-Modal').classList.add("hidden");
    }
}
if(document.querySelector('#declineUpdate-modal')){
    document.querySelector('#declineUpdate-modal').onclick=()=>{
    document.querySelector('#update-Modal').classList.add("hidden");
    }
}