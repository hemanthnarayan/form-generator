1.Created a class form(form.php) to create a validate form

2. form is generted in index.php file 
	a. Use the function generate to generate the input fields
		eg genrate("type","name","class","value")  having 4 parameters
			1. type 			: type of the input field (text,radio...etc)
			2. name 			: name of the input filed which you want to generate
			3. class 			: class(css) given to the field
			4. value(optional)	: value of the input field you want to generate 
3. used  jquery sorce files 
4. form submitted using jquery ajax method to a page check.php
5. form validated using validate function. passed the post data as parameter
6. validate function will validate the post data . Used swith case to traverse through the post data and will return the error and the corresponding error message .
7.The error message is shown in the form based on the ajax result ( set place holder value as error message and given a class errror to highlight error). 