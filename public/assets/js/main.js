const container = document.querySelector(".container"),
	psShowHide = document.querySelectorAll(".showHidePw"),
	pwFields = document.querySelectorAll(".password, .confirmpassword");
	// pwFieldsrg = document.querySelectorAll(".confirmpassword"),
	// pwFields = document.querySelectorAll(".password"),


	// JS Code to show/hide password and change icon
	psShowHide.forEach(eyeIcon => {
		eyeIcon.addEventListener("click", ()=>{
			pwFields.forEach(pwField =>{
				if (pwField.type ==="password") {
					pwField.type = "text";

					psShowHide.forEach(icon =>{
						icon.classList.replace("uil-eye-slash", "uil-eye");
					})
				}else{
					pwField.type = "password";

					psShowHide.forEach(icon =>{
						icon.classList.replace("uil-eye", "uil-eye-slash");
					})
				}
			})
		})
	})




