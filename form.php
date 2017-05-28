<?php
	/*
		Class   		: Form
		Description		: Used to generate and validate form elements
		Author			: Hemanth Narayan (narayanhemanth@gmail.com)
	*/
		class form{
				public function generate($field,$name,$class="",$values=null){
					$form_field			= "";
					$text_name			= ucwords($name);

					switch ($field) {
						case 'text':
							$form_field = '
								<label>	
									<span>'.$text_name.'</span>
									<input type="text" id="'.$name.'" name="'.$name.'" placeholder="'.$text_name.'" class="'.$class.'">
								</label>';
							break;
						case 'password':
							$form_field = '
								<label>	
									<span>'.$text_name.'</span>
									<input type="password" id="'.$name.'" name="'.$name.'" placeholder="'.$text_name.'" class="'.$class.'">
								</label>';
							break;
						case 'select':
							$form_field = '
								<label>	
									<span>'.$text_name.'</span>
									<select name="'.$name.'" class="'.$class.'" id="'.$name.'">
										<option value=""> Select</option>
								';
							if($values!="" && is_array($values)){
								foreach ($values as $key => $value) {
									$form_field.='<option value="'.$key.'">'.$value.'</option>';
								}
							}
							$form_field.='</select></label>';
						break;
						case 'hidden':
								$form_field = '
									<input type="hidden" name="'.$name.'" placeholder="'.$text_name.'" class="'.$class.'" value="'.$values.'">
								';
						break;
						case 'number':
							$form_field = '
								<label>	
									<span>'.$text_name.'</span>
									<input type="number" name="'.$name.'" id="'.$name.'" placeholder="'.$text_name.'" class="'.$class.'">
								</label>';
						break;
						case 'textarea':
							$form_field = '
								<label>	
									<span>'.$text_name.'</span>
									<textarea name="'.$name.'" placeholder="'.$text_name.'" class="'.$class.'" id="'.$name.'"> </textarea>
								</label>';
						break;
						case 'radio':
							$form_field = '
									<label>	
										<span>'.$text_name.'</span>'
							;
							if($values!=""&& is_array($values)){
								foreach ($values as $key => $value) {
									$form_field.='<input type="radio" name="'.$name.'[]"  class="'.$class.'" value="'.$key.'">'.$value."&nbsp;";
								}
							}else{

								$form_field.= '
										<input type="radio" name="'.$name.'"  class="'.$class.'" value="'.$values.'">
								'.$values;
							}
							$form_field.="</label>";
						break;
						case 'checkbox':
							$form_field = '
								<label for="'.$name.'">	
									<span>'.$text_name.'</span>
									<input type="checkbox" name="'.$name.'" id="'.$name.'" class="'.$class.'" id="'.$name.'">
								</label>';
						break;
						case 'submit':
							$form_field = '
								<input type="submit" name="'.$name.'"  class="'.$class.'" value="'.$values.'">';
						break;
						default:
							# code...
							break;
					}
					return $form_field;

				}
				public function validate($data){
					$return_data 			= array();
					$return_data['errors']	= 0;       
					foreach ($data as $key => $value) {
						switch($key){
							case "country":
							case "name"  :
								if($value==""){
									$return_data['errors']=1;
									$return_data[$key]=$key." is required";
								}
							break;
							case "email"  :
							 if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
							 	$return_data['errors']=1;
								$return_data[$key]="Email is not valid";
							}
							break;
							case "url" :
								if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$value)) {
									$return_data['errors']=1;
									$return_data[$key]="Url is not valid";
								}
							break;
							case "address" :
								$minimum 	= 5;
								$maximun 	= 100;
								$str_length	= strlen($value);
								if($str_length<$minimum){
									$return_data['errors']	= 1;
									$return_data[$key]		= " should have a minimum length (".$minimum.")";
								}else if($str_length>$maximun){
									$return_data['errors']	= 1;
									$return_data[$key]		= "Maximum length exceeded (".$maximun.")";

								}
							break;
							case "age" :
								$minimum = 18;
								$maximun = 30;
								$value   =intval($value);
								if($value<18){
									$return_data['errors']	= 1;
									$return_data[$key]		= " should be greater than minimum value (".$minimum.")";
								} else if($value>30){
									$return_data['errors']	= 1;
									$return_data[$key]		= " should be less than minimum value (".$maximun.")";
								}
								
							
							break;

							
						}
					}
					return $return_data;
				}

		}
?>