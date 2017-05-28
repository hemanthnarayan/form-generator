<!DOCTYPE html>
<html>
	<head>
		<link  rel='stylesheet' type='text/css' href='style.css' >
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>    
  <script src="ajax.js"> </script>
	</head>
	<body>

	<form class='contact-form' id="contact-form" method="post" >
		<h1>Contact Form
    </h1>
    <span id="succ_msg"> </span>
   <?php 
   	include("form.php"); 
		$form = new form();

 		echo $form->generate('text','name','form-text');
 		echo $form->generate('text','email','form-text');
 		echo $form->generate('password','password','form-text');
 		echo $form->generate('select','country','form-select',array("1"=>"India","2"=>"Australia"));
 		echo $form->generate('hidden','sec_id','form-text',"1233333");
 		echo $form->generate('number','age','form-text');
 		echo $form->generate('textarea','address','form-textarea');
 		echo $form->generate('radio','gender','',array("1"=>"Male","2"=>"female"));
 		echo $form->generate('checkbox','agree','form-checkbox');
 		echo $form->generate('submit','save','button','save');





   ?>
  
	</form>


	</body>
</html>
