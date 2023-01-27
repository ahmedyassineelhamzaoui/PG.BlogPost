let iconLeft = document.querySelector(".icon-left")
let iconRight = document.querySelector(".icon-right")
let sideBar = document.querySelector(".side-bar")
let words = document.querySelectorAll(".words")
let mySection = document.querySelector(".my-section")
let navBar = document.querySelector(".nav-bar")
let BlogText = document.querySelector(".Blog-text")
words.forEach(word => {
    word.style.display = "none";
})
if (iconLeft) {
    iconLeft.onclick = () => {
        iconLeft.classList.add("hidden");
        iconRight.classList.remove("hidden")
        sideBar.style.width = "70px";
        words.forEach(word => {
            word.style.display = "none";
        })
        BlogText.style.display = "none"
    }
}
if (iconRight) {
    iconRight.onclick = () => {
        iconRight.classList.add("hidden")
        iconLeft.classList.remove("hidden")
        sideBar.style.width = "270px";
        words.forEach(word => {
            word.style.display = "block";
        })
        BlogText.style.display = "block"
    }
}

// button addpost
let addpost = document.querySelector("#add-post")
let postModal = document.querySelector("#post-Modal")
let closeAddPostModal = document.querySelector("#closeAddPost-modal")
let declineModal = document.querySelector('#decline-modal')
if (addpost) {
    addpost.onclick = () => {
        postModal.classList.remove('hidden')
    }
    closeAddPostModal.onclick = () => {
        postModal.classList.add('hidden')
    }
    declineModal.onclick = () => {
        postModal.classList.add('hidden')
    }
}
// category
let categoryModal = document.querySelector("#category-Modal")
let addCategory = document.querySelector("#add-category")
let declineCategoryModal = document.querySelector('#declineCategory-modal')
let closeAddCategoryModal = document.querySelector('#closeAddCategory-modal')
if (addCategory) {
    addCategory.onclick = () => {
        document.querySelector("#update-category").style.display = 'none';
        document.querySelector("#add").style.display = 'block';
        categoryModal.classList.remove('hidden')
        document.querySelector("#my-field").style.display = "block"
        document.querySelector('#drop-down').style.display = "none"
    }
    closeAddCategoryModal.onclick = () => {
        categoryModal.classList.add('hidden')
    }
    declineCategoryModal.onclick = () => {
        categoryModal.classList.add('hidden')
    }
}
// alert success
myAlert = document.querySelector("#my-alert")
closeAlert = document.querySelector("#close-alert")
if (closeAlert) {
    closeAlert.onclick = () => {
        myAlert.classList.add('hidden');
    }
}
//  alert danger
mydangerAlert = document.querySelector("#my-Dangeralert");
closeDangerAlert = document.querySelector("#close-Dangeralert");
if (closeDangerAlert) {
    closeDangerAlert.onclick = () => {
        mydangerAlert.classList.add('hidden');
    }
}
if (document.querySelector("#update-category")) {
    document.querySelector("#update-category").style.display = 'none';

}


if (document.querySelector('#drop-down')) {
    document.querySelector('#drop-down').style.display = "none"
}
function editCategory(name, id) {
    categoryModal.classList.remove('hidden');
    document.querySelector("#update-category").style.display = 'block';
    document.querySelector("#add").style.display = 'none';
    document.querySelector("#category_updated").value = name;
    document.querySelector("#category-id").value = id
    document.querySelector("#my-field").style.display = "none"
    document.querySelector('#drop-down').style.display = "block"
}
function deleteCategory(id) {
    document.querySelector('#delet-modal').classList.remove('hidden')
    document.querySelector("#deleted-idConfirm").value = id

}
if (document.querySelector("#close-deletedModal")) {
    document.querySelector("#close-deletedModal").onclick = () => {
        document.querySelector('#delet-modal').classList.add('hidden')
    }
}
if (document.querySelector("#cancel-deletedModal")) {
    document.querySelector("#cancel-deletedModal").onclick = () => {
        document.querySelector('#delet-modal').classList.add('hidden')
    }
}
function editPost(id, title, content, name, image) {
    document.querySelector('#update-Modal').classList.remove("hidden");
    document.querySelector('#title').value = title
    document.querySelector('#posts-category').value = name;
    document.querySelector("#image-up").setAttribute('src', 'public/images/' + image);
    document.querySelector("#editor").value = content
    document.querySelector("#post-id").value = id
}
if (document.querySelector('#closeUpdatePost-modal')) {
    document.querySelector('#closeUpdatePost-modal').onclick = () => {
        document.querySelector('#update-Modal').classList.add("hidden");
    }
}
if (document.querySelector('#declineUpdate-modal')) {
    document.querySelector('#declineUpdate-modal').onclick = () => {
        document.querySelector('#update-Modal').classList.add("hidden");
    }
}
let hideOverView = document.querySelector("#hide-overView")
let myOverView = document.querySelector("#my-overView")
let showOverView = document.querySelector("#show-overView")
if (hideOverView) {
    hideOverView.onclick = () => {
        myOverView.classList.add('hidden')
    }
}
function overview(title, content, name, image) {
    myOverView.classList.remove('hidden')
    document.querySelector("#Opost-title").textContent = title
    document.querySelector("#Opost-content").textContent = content
    document.querySelector("#Opost-image").setAttribute('src', 'public/images/' + image)
    document.querySelector("#Opsts-Category").textContent = name;
}
if (document.querySelector("#close-InfoAlert")) {
    document.querySelector("#close-InfoAlert").onclick = () => {
        document.querySelector("#my-InfoAlert").classList.add('hidden');
    }
}
let regexNum=/^([1-9]|10)$/
if (document.querySelector('#add-number')) {
    document.querySelector('#add-number').addEventListener('click', (e) => {
        if (!regexNum.test(document.querySelector("#number").value)) {
            document.querySelector("#number").style.border = "2px solid red"
            document.querySelector('#add-error').classList.remove('hidden');
            e.preventDefault();
        }
    })
    document.querySelector('#number').onclick = () => {
        document.querySelector("#number").style.border = ""
        document.querySelector('#add-error').classList.add('hidden');
    }
}
let addAllPosts = document.querySelector("#add-AllPosts")
var regex = /^[a-zA-Z0-9,._ éàè$£ùô]{50,}$/;
var Titleregex = /^[a-zA-Z0-9 ]{5,100}$/;
if (addAllPosts) {
    let postsTitle = document.querySelectorAll(".post-title")
    let postContent = document.querySelectorAll(".post-content")
    addAllPosts.addEventListener('click', (e) => {
        postsTitle.forEach(element => {
            if (element.value.trim() == '') {
                element.value = ""
                element.style.border = "2px solid red"
                element.setAttribute('placeholder', 'please fill this feild')
                element.classList.add("placeholder-red")
                e.preventDefault();
            }
            if (!Titleregex.test(element.value)) {
                element.value = ""
                element.style.border = "2px solid red"
                element.setAttribute('placeholder', 'please enter a valid title')
                element.classList.add("placeholder-red")
                e.preventDefault();
            }
        });
        postContent.forEach(element => {
            if (element.value.trim() == '') {
                element.value = ""
                element.style.border = "2px solid red"
                element.setAttribute('placeholder', 'please fill this field')
                element.classList.add("placeholder-red")
                e.preventDefault();
            }
            if (!regex.test(element.value)) {
                element.value = ""
                element.style.border = "2px solid red"
                element.setAttribute('placeholder', 'Invalid content')
                element.classList.add("placeholder-red")
                e.preventDefault();
            }

        });
    })
    postsTitle.forEach(element => {
        element.onclick = () => {
            if (element.value.trim() == '') {
                element.value = ""
                element.style.border = ""
                element.classList.remove("placeholder-red")
            }
        }
    });
    postContent.forEach(element => {
        element.onclick = () => {
            if (element.value.trim() == '') {
                element.value = ""
                element.style.border = ""
                element.classList.remove("placeholder-red")
            }
        }
    });
}

let emailRegex = /(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/
let passwordRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/
let nameRegex = /^[a-zA-Z ]{2,100}$/

let Signupname = document.querySelector("#name");
let emailSignup = document.querySelector("#email-signup");
let passwordSingup = document.querySelector("#password-singup");
let passwordSingupRepeat = document.querySelector("#password-singup-repeat");

let nameError = document.querySelector("#name-error")
let emailSignupError = document.querySelector("#emailSignup-error")
let passwordSignupError = document.querySelector("#passwordSignup-error")
let rpeateSignupError = document.querySelector("#rpeateSignup-error")

if (document.querySelector("#signup")) {
    document.querySelector("#signup").addEventListener('click', (e) => {
        if (Signupname.value.trim() == "") {
            Signupname.style.border = "2px solid red"
            nameError.textContent = "please fill this field"
            e.preventDefault();
        } else if (!nameRegex.test(Signupname.value)) {
            Signupname.style.border = "2px solid red"
            nameError.textContent = "invalid name"
            e.preventDefault();
        }
        Signupname.onclick = () => {
            Signupname.style.border = ""
            nameError.textContent = ""
        }
        if (emailSignup.value.trim() == "") {
            emailSignup.style.border = "2px solid red"
            emailSignupError.textContent = "please fill this field"
            e.preventDefault();

        } else
            if (!emailRegex.test(emailSignup.value)) {
                emailSignup.style.border = "2px solid red"
                emailSignupError.textContent = "please eneter a valid mail"
                e.preventDefault();

            }
        emailSignup.onclick = () => {
            emailSignup.style.border = ""
            emailSignupError.textContent = ""
        }
        if (passwordSingup.value.trim() == "") {
            passwordSingup.style.border = "2px solid red"
            passwordSignupError.textContent = "please fill this field"
            e.preventDefault();

        } else
            if (!passwordRegex.test(passwordSingup.value)) {
                passwordSingup.style.border = "2px solid red"
                passwordSignupError.textContent = "Password must contains capital,lower,number and a special characters"
                e.preventDefault();

            }
        passwordSingup.onclick = () => {
            passwordSingup.style.border = ""
            passwordSignupError.textContent = ""
        }
        if (passwordSingupRepeat.value.trim() == "") {
            passwordSingupRepeat.style.border = "2px solid red"
            rpeateSignupError.textContent = "please fill this field"
            e.preventDefault();
        }
        if (passwordRegex.test(passwordSingup.value)) {
            if (passwordSingupRepeat.value != passwordSingup.value) {
                passwordSingupRepeat.style.border = "2px solid red"
                rpeateSignupError.textContent = "this password dosn't match the first password"
                e.preventDefault();
            }
        }
        passwordSingupRepeat.onclick = () => {
            passwordSingupRepeat.style.border = ""
            rpeateSignupError.textContent = ""
        }
    })
}


if (document.querySelector('#login-form')) {
    let emailLogin = document.querySelector("#email-login")
    let passwordLogin = document.querySelector("#password-login")
    let errorSigninMail = document.querySelector("#error-SigninMail")
    let errorSigninpassword = document.querySelector("#error-Signinpassword")

    document.querySelector("#login-form").addEventListener('click', (e) => {
        if (emailLogin.value == "") {
            emailLogin.style.border = "2px solid red"
            errorSigninMail.textContent = "you must fill this field"
            e.preventDefault()
        } else
            if (!emailRegex.test(emailLogin.value)) {
                emailLogin.style.border = "2px solid red"
                errorSigninMail.textContent = "invalid mail"
                e.preventDefault()
            }
        emailLogin.onclick = () => {
            emailLogin.style.border = ""
            errorSigninMail.textContent = ""
        }
        if (passwordLogin.value == "") {
            passwordLogin.style.border = "2px solid red"
            errorSigninpassword.textContent = "you must fill this field"
            e.preventDefault()
        } else
            if (!passwordRegex.test(passwordLogin.value)) {
                passwordLogin.style.border = "2px solid red"
                errorSigninpassword.textContent = "invalid password"
                e.preventDefault()
            }
        passwordLogin.onclick = () => {
            passwordLogin.style.border = ""
            errorSigninpassword.textContent = ""
        }
    })
}

if (document.querySelector("#declineProfile-modal")) {
    document.querySelector("#declineProfile-modal").onclick = () => {
        document.querySelector('#profile-Modal').classList.add("hidden");
    }
}
if (document.querySelector("#closeeditProfile-modal")) {
    document.querySelector("#closeeditProfile-modal").onclick = () => {
        document.querySelector('#profile-Modal').classList.add("hidden");
    }
}
var ProfileModal=document.querySelector('#profile-Modal')
var editProfile=document.querySelector("#edit-profile")
if (ProfileModal) {
    editProfile.onclick = () => {
        ProfileModal.classList.remove("hidden");
    }
}
function show(){
    ProfileModal.classList.remove("hidden");
}

if (document.querySelector("#update-category")) {
    document.querySelector("#update-category").addEventListener('click', (e) => {
        if (document.querySelector("#category_updated").value == "") {
            document.querySelector("#error-UpdateInput").textContent = "please fill this feild";
            document.querySelector("#category_updated").style.border = "2px solid red";
            e.preventDefault()
        } else
            if (!nameRegex.test(document.querySelector("#category_updated").value)) {
                document.querySelector("#error-UpdateInput").textContent = "please enter a valid name";
                document.querySelector("#category_updated").style.border = "2px solid red";
                e.preventDefault()
            }
        document.querySelector("#category_updated").onclick = () => {
            document.querySelector("#error-UpdateInput").textContent = "";
            document.querySelector("#category_updated").style.border = "";
        }
    })
}
if (document.querySelector("#add")) {
    document.querySelector('#add').addEventListener('click', (e) => {
        if (document.querySelector("#category").value == "") {
            document.querySelector("#error-addInput").textContent = "please fill this field"
            document.querySelector("#category").style.border = "2px solid red"
            e.preventDefault()
        } else
            if (!nameRegex.test(document.querySelector("#category").value)) {
                document.querySelector("#error-addInput").textContent = "please enter a valid name"
                document.querySelector("#category").style.border = "2px solid red"
                e.preventDefault()
            }
        document.querySelector("#category").onclick = () => {
            document.querySelector("#error-addInput").textContent = ""
            document.querySelector("#category").style.border = ""
        }
    })
}

function deletePost(id){
    document.querySelector("#post-idConfirm").value=id;
    document.querySelector("#delet-post").classList.remove("hidden")
}
if(document.querySelector("#close-deletedPost")){
    document.querySelector("#close-deletedPost").onclick=()=>{
    document.querySelector("#delet-post").classList.add("hidden")
    }
}
if(document.querySelector("#cancel-deletedPost")){
    document.querySelector("#cancel-deletedPost").onclick=()=>{
    document.querySelector("#delet-post").classList.add("hidden")
    }
}
if(document.querySelector("#update-post")){
    document.querySelector("#update-post").addEventListener('click',(e)=>{
      
       if(document.querySelector('#editor').value==''){
        document.querySelector('#editor').style.border="2px solid red"
        document.querySelector("#error-textContent").textContent='please fill this fild'
        e.preventDefault()
       }else
       if(!regex.test(document.querySelector('#editor').value)){
        document.querySelector("#error-textContent").textContent='invalid content'
        document.querySelector('#editor').style.border="2px solid red"
        e.preventDefault()
       }
       document.querySelector('#editor').onclick=()=>{
        document.querySelector('#editor').style.border=""
        document.querySelector("#error-textContent").textContent=''
       }
       if(document.querySelector('#title').value==''){
        document.querySelector('#title').style.border="2px solid red"
        document.querySelector("#error-titleContent").textContent='please fill this fild'
        e.preventDefault()
       }else
       if(!Titleregex.test(document.querySelector('#title').value)){
        document.querySelector("#error-titleContent").textContent='Invalid title'
        document.querySelector('#title').style.border="2px solid red"
        e.preventDefault()
       }
       document.querySelector('#title').onclick=()=>{
        document.querySelector('#title').style.border=""
        document.querySelector("#error-titleContent").textContent=''
       }
    })
}
function deleteUser(id,idC){
  document.querySelector("#deleted-user").value=id
  document.querySelector("#connect-user").value=idC
  if(id==idC){
    document.querySelector("#message-confirmation").innerHTML="Are you sure you want to delete your account?"
  }else{
    document.querySelector("#message-confirmation").innerHTML="Are you sure you want to delete this User?"
  }
  document.querySelector("#delet-user").classList.remove('hidden')
}
if(document.querySelector("#close-deletedUser")){
    document.querySelector("#close-deletedUser").onclick=()=>{
  document.querySelector("#delet-user").classList.add('hidden')
    }
}
if(document.querySelector("#cancel-deletedUser")){
    document.querySelector("#cancel-deletedUser").onclick=()=>{
  document.querySelector("#delet-user").classList.add('hidden')
    }
}