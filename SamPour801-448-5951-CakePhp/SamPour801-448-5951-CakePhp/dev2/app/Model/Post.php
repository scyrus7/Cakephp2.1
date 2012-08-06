<?php
class Post extends AppModel {
	var $name = 'Post';
	var $hasMany = array('Comment'=>array('className'=>'Comment'));
	var $hasAndBelongsToMany = array('Tag'=>array('className'=>'Tag'));
}
?>