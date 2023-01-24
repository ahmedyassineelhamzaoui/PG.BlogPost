<?php
class PostsController{

	public function getAllPosts($param){
		$post = Post::getAll($param);
		return $post;
	}
	public function addPost(){
		if(isset($_POST["add-post"])){
			$filename=$_FILES["post-picture"]["name"];
			$image=$_FILES["post-picture"]["tmp_name"];
			$title=$_POST["post-title"];
			$content=$_POST["post-content"];
			$category=$_POST['post-category'];
            foreach($title as $index=>$titles){
				$regex = "/^.{1,100}$/";
				$regexContent = "/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9 ,.-]{50,}$/";

				if (!preg_match($regex, $titles)){
					Session::set('info','title is not valid');
					header('location:posts');
				}
				if (!preg_match($regexContent, $content[$index])){
					Session::set('info','content must conatin at least 50 charcters');
					header('location:posts');
				}
				else{
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
			$data=array($_POST["id_post"]);
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
			$data=array($_POST["title"],$_POST["update-content"],$filename,$_POST["post-category"],$_POST['post-id']);
			$result=Post::update($data);
			if($result==='ok'){
				move_uploaded_file($image,'./public/images/'.$filename);
				Session::set('success','Post has been updated succefully');

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