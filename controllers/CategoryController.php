<?php
class CategoryController{
    
    public $id_category;
	public $name;


	public function getAllCategorys(){
		$category = Category::getAll();
		return $category;
	}
	public function addCategory(){
		if(isset($_POST['add'])){
			$name=$_POST["category_name"];
			$data=array($name);
			$result=Category::insert($data);
			if($result=='this category already exists'){
				Session::set('info',$result);
				header('location:category');
			}else{
				if($result==='ok'){
					Session::set('success','Category added succesdfuly');
					header('location:category');
				}else{
					echo $result;
				}
			}
          
		}
	}
	public function deleteCategory(){
		if(isset($_POST['delete-category'])){
			$data=array($_POST["deleted-idConfirm"]);
			$result=Category::delete($data);
            if($result==='ok'){
				Session::set('success','Category deleted succesdfuly');
				header('location:category');
			}else{
				echo $result;
			}
		}
	}
	public function updateCategory(){
		if(isset($_POST['update-category'])){
			$id_category=$_POST["category-id"];
			$data=array($_POST["category_updated"],$id_category);
			$result=Category::update($data);
			if($result==='ok'){
				Session::set('success','Category has been updated succesdfuly');
				header('location:category');
			}else{
				echo $result;
			}
		}
	}
	public function GetUniqueCategory(){
	    $result = Category::getUnique();
		return $result;
	}
	public function AllCategorys(){
		$result= Category::getAllCategory();
		return $result;
	}
	public function getBestCategory(){
		$result=Category::BestCategory();
		return $result;
	}
    public function SearchPosts(){
		if(isset($_POST['search'])){
			$data=array('%'.$_POST['input-search'].'%','%'.$_POST['input-search'].'%');
			$result=Category::GetSearchCategory($data);
			return $result;
		}
	}
}

?>