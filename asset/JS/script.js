$('document').ready(function(){
		$('#form').validate({
			rules:{
				fname:{
					required:true,
					minlength:3,
					maxlength:20,
					lettersonly:true
				},
				lname:{
					required:true,
					minlength:1,
					maxlength:20,
					lettersonly:true
				},
				no:{  
					digits:true,
					required:true,
					minlength:10,
					maxlength:12
					
				},
				dob:{
					required:true
				},
				ano:{
					digits:true,
					required:true,
					minlength:16,
					maxlength:16,
					
				},
				pno:{
					required:true,
					minlength:10,
					maxlength:10
				},
				atype:{
					required:true
				},
				arel:{
					required:true
				},
				status:{
					required:true
				},
				city:{
					required:true,
					minlength:3,
					maxlength:20,
					lettersonly:true

				},
				pincode:{
					digits:true,
					required:true,
					minlength:6,
					maxlength:6
				},
				state:{
					lettersonly:true,
					required:true,
					minlength:3,
					maxlength:20,
					
				},
				select:{
					required:true,
				},
				bname:{
					required:true,
					minlength:3,
					maxlength:20,
					lettersonly:true
				},
				atm:{
					required:true
				},
				ib:{
					required:true
				},
				smscb:{
					required:true
				},
				emailcb:{
					required:true
				},
				agree:{
					required:true
				}
				
			},
			messages:{
				fname:{
					required:"Enter your first name",
					minlength:"Enter  your name",
					maxlength:"Enter your name",
					lettersonly:'please enter letters only'
				},
				lname:{
					required:"Enter your last name",
					letters0nly:'please enter letters only'
				},
				no:{  
					digits:"Numbers only",
					required:"Enter your mobile number",
					minlength:"Enter your 10 digit number",
					maxlength:"Enter your 10 digit number",

				},
				ano:{
					required:"Enter your aadhar number",
					minlength:"Enter your 16 digit aadhar number",
					maxlength:"Enter your 16 digit aadhar number"
				},
				pno:{
					required:"Enter your pan number",
					minlength:"Enter your exact pan number",
					maxlength:"Enter your exact pan number"
				},
				atype:{
					required:"Select account type"
				},
				arel:{
					required:"Select account relationship"
				},
				status:{
					required:"Select your status"
				},
				city:{
					required:"Enter your city"
				},
				pincode:{
					digits:"Enter your 6 digit pincode",
					required:"Enter your pincode",
					minlength:"Enter your 6 digit pincode",
					maxlength:"Enter your 6 digit pincode"
				},
				state:{
					required:"Select your state"
				},
				bname:{
					required:"Enter your nearest branch"
				},
				atm:{
					required:"Select atm type"
				},
				ib:{
					required:"Select the option"
				},
				smscb:{
					required:"Select the option"
				},
				emailcb:{
					required:"select the option"
				},
				agree:{
					required:"Accept the terms & conditions to register"
				},
				select:{
					required:"Select your country"
				}
			}
		});
		$.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 
	});