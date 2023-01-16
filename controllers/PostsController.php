<?php
class PostsController{

	public function getAllPosts(){
		$post = Post::getAll();
		return $post;
	}
}

?>