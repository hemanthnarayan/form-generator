$(document).ready(function(){

  $(".contact-form").submit(function(){
  	 var postData = $(this).serializeArray();
  	$.ajax(
    {
        url : "check.php",
        type: "POST",
        data : postData,
        dataType:"json",
        success:function(data) 
        {
        	if(data){
        		if(data.errors==1){
        			$("#succ_msg").removeClass("success").html("");

        			if(data.name){
        				$("#name").addClass("error");
        				$("#name").attr("placeholder", data.name);
        			}else{
        				$("#name").removeClass("error");
        				$("#name").attr("placeholder", "");
        			}
        			if(data.email){
        				$("#email").addClass("error");
        				$("#email").attr("placeholder", data.email);
        			}else{
        				$("#email").removeClass("error");
        				$("#email").attr("placeholder", "");
        			}
        			if(data.country){
        				$("#country").addClass("error");
        				$("#country").attr("placeholder", data.country);
        			}else{
        				$("#country").removeClass("error");
        				$("#country").attr("placeholder", "");
        			}
        			if(data.age){
        				$("#age").addClass("error");
        				$("#age").attr("placeholder", data.age);
        			}else{
        				$("#age").removeClass("error");
        				$("#age").attr("placeholder", "");
        			}
        			if(data.address){
        				$("#address").addClass("error");
        				$("#address").attr("placeholder", data.address);
        			}else{
        				$("#address").removeClass("error");
        				$("#address").attr("placeholder", "");
        			}
        		}else{
        			$(".form-text").removeClass("error");
        			$(".form-textarea").removeClass("error");
        			$(".form-select").removeClass('error');
        			$("#succ_msg").addClass("success").html("Form is valid");
        		}
        	}
        }
    });

    return false;
  });
});
   


