<?php
class PostsController{
    
     public $id;
	 public $title;
	 public $picture;
	 public $content;
	 public $post_category;


	public function getAllPosts(){
		$post = Post::getAll();
		return $post;
	}
	public function addPost(){
		if(isset($_POST["add-post"])){
			$filename=$_FILES["post-picture"]["name"];
			$image=$_FILES["post-picture"]["tmp_name"];
			$title=$_POST["post-title"];
			$content=$_POST["post-content"];
			$category=$_POST['post-category'];
			$regex = "/.{1,100}/";
			$regexContent = "/^[a-zA-Z0-9,._ éàè£ùô]{50,}$/";;
            foreach($title as $index=>$titles){
				if (!preg_match($regex, $titles)){
					Session::set('info','title is not valid');
					header('location:posts');
				}
				if (!preg_match($regexContent, $content[$index])){
					Session::set('info','Invalid content');
					header('location:posts');
				}
				else{
					if($filename[$index]==''){
						$filename[$index]='empty.jpg';
					}
					$data=array($titles,$content[$index],$filename[$index],$category[$index]);
					$result=Post::insert($data);
	                
					if($result==='ok'){
						move_uploaded_file($image[$index],'./public/images/'.$filename[$index]);
						Session::set('success','Post added succesdfuly');
						header('location:posts');
					}else{
						echo $result;
					}
				}
				
			}
		}
	}
	public function deletePosts(){
		if(isset($_POST["delete-post"])){
			$data=array($_POST["post-idConfirm"]);
            $result=Post::delete($data);
			if($result==='ok'){
				Session::set('success','Post has been deleted succefully');
				header('location:posts');
			}else{
				echo $result;
			}
		}
	}
	public function updatePosts(){
		if(isset($_POST["update-post"])){
			$filename=$_FILES["picture"]['name'];
			$image=$_FILES["picture"]['tmp_name'];
			if(empty($filename)){
				$param=0;
				$data=array($_POST["title"],$_POST["update-content"],$_POST["post-category"],$_POST['post-id']);
			}else{
				$param=1;
				$data=array($_POST["title"],$_POST["update-content"],$filename,$_POST["post-category"],$_POST['post-id']);
			}
			$result=Post::update($data,$param);

			move_uploaded_file($image,'./public/images/'.$filename);
			if($result==='ok'){
				Session::set('success','Post has been Updated succefully');
				header('location:posts');
			}else{
				echo $result;
			}
		}
	}
	public function AllPosts(){
	  $result=Post::GetNumberRow();
      return $result;
	}
	public function searchPosts(){
		if(isset($_POST['search'])){
			$data=array('%'.$_POST['input-search'].'%','%'.$_POST['input-search'].'%','%'.$_POST['input-search'].'%');
			$result=Post::GetSearchPost($data);
			return $result;
		}
	}
}

?>