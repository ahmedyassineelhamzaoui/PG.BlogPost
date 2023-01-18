<?php
class CategoryController{

	public function getAllCategorys(){
		$category = Category::getAll();
		return $category;
	}
	public function insertCategory($query,$params=[]){
	   Category::insert($query,$params);
	}
}

?>