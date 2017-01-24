$(document).ready(function() {


	$("#account-creation").validate({
		rules: {
			fullname: "required",
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength:5
			}
		},
		messages: {
			fullname: "Please enter your name",
			email: "Please enter a valid email",
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			}
		},
		errorClass: "invalid",

		submitHandler: function() {
			$("#form-step-1").removeClass("animate-in");
			$("#form-step-1").addClass("animate-out");
			
			$("#step1").removeClass("selected");
			$("#step2").addClass("selected");

			$("#form-step-2").addClass("animate-in");
			$("#form-step-2").removeAttr("style");

		}
	});


	$("#account-creation-details").validate({
		rules: {
			zip: {
				number: true,
				minlength: 5
			}
		},
		messages: {
			zip: {
				minlength: "Please enter at least 5 numbers",
				number: "Please only enter numbers"
			}
		},
		errorClass: "invalid",

		submitHandler: function() {
			$("#form-step-2").removeClass("animate-in");
			$("#form-step-2").addClass("animate-out");
			
			$("#step2").removeClass("selected");
			$("#step3").addClass("selected");

			$("#form-step-3").addClass("animate-in");
			$("#form-step-3").removeAttr("style");
		}

	});

		$("#prev-step1").on( "click", function() {
			$("#form-step-2").removeClass("animate-in");
			$("#form-step-1").removeClass("animate-out");

			$("#form-step-2").addClass("animate-out");
			$("#form-step-1").addClass("animate-in");

			$("#step2").removeClass("selected");
  			$("#step1").addClass("selected");
		});

});