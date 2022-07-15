$(document).ready(function(){

	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "credential.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "index.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
})