<?php
	include("form.php"); 
	$form 			= new form();
	$post_data		= $_POST;
	$validate		=$form->validate($_POST);
	print_r(json_encode($validate));
	die(); 
?>