$(document).ready(function() {
$("#career_form").validate({
	rules: {
		postname:{
			required:true,
		},
		name:{
			required:true,
		},
		email:{
			required:true,
			email:true
		},		
		phone:{
			required:true,
			number:true
		},
		resume:{
			required:true,
		}

	},
	messages: {
		postname:{
			required:"Please select position "
		},
		name:{
			required:"Please enter name "
		},
		email:{
			required:"Please enter your email",
			email:"Email Not Valid"
		},
		phone:{
			required:"Please enter phone no.",
			number:"Only Number allow"
		},
		resume:{
			required:"Please attach file "
		},

	}
});
 
 });
 
$("#career_form").on('submit',function(e) {
	 
	var form = this;
	e.preventDefault();
	e.stopPropagation();	
	if (!$("#career_form").valid()) {
		return false;
	}	
	 
	form.submitted = true;	
	$("#mesg").html("");		
	$("#mesg").css("display","");		
	$(".loader").css("display","");		
	$(this).attr("disabled","disabled");	
	$("#btn_submit").attr("disabled","disabled");	
	var form_data=new FormData(this);
console.log(form_data)	
	 $.ajax({
		cache:false,
		url: 'career.php',
		type: "POST",
		data: form_data,
		contentType: false,
		processData:false,
		success: function(response)
		{	
			console.log(response);
			 
			$("#btn_submit").attr("disabled",false);
			if(response.trim() == '1') {
				$('#career_form').trigger('reset');	
				 $(".loader").css("display","none");	
				 alert('Your Inquiry successfully submited. Thank you.');
			 }
			else if(response.trim() == '0')
			{	
				
				location.href="http://www.cplvetnova.co.in/career.html";
			}
			
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
	
});
	$('#resume').on('change',function(){
       // output raw value of file input
       $('#uploadFile').val($(this).val().replace(/.*(\/|\\)/, '')); 

        // or, manipulate it further with regex etc.
        var filename = $(this).val().replace(/.*(\/|\\)/, '');
        // .. do your magic

        $('#uploadFile').val(filename);
    });