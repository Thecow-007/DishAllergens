document.addEventListener('DOMContentLoaded', function () {
    var displaylogin = document.getElementById('login-account');
    var signIn = document.querySelector('.login-form');
    var closeLogin = document.getElementById('closeLogin');

    displaylogin.addEventListener('click', function () {
        signIn.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });

    closeLogin.addEventListener('click', function () {
        signIn.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
    });


    var displaySignup = document.getElementById('create-account');
    var signUp = document.querySelector('.signup-form');
    var closeSignUp = document.getElementById('closeSignUp');

    displaySignup.addEventListener('click', function () {
        signUp.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });

    closeSignUp.addEventListener('click', function () {
        signUp.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
        clearFields();
    });


        // Form Validation
        var emailInput = document.getElementById('email');
        emailInput.addEventListener('input', function () {
            clearErrors('email');
        });
    
        var nameInput = document.getElementById('username');
        nameInput.addEventListener('input', function () {
            clearErrors('username');
        });
    
        var passwordInput = document.getElementById('pass');
        passwordInput.addEventListener('input', function () {
            clearErrors('password');
        });
    
        var confirmPasswordInput = document.getElementById('pass2');
        confirmPasswordInput.addEventListener('input', function () {
            clearErrors('confirmPassword');
        });
    
        var signupForm = document.getElementById('signup');
        signupForm.addEventListener('submit', function (event) {
            if (!validate()) {
                event.preventDefault(); 
                return false;
            } 
        });
    });

    function clearFields() {
        var values = document.querySelectorAll('input[type="username"], input[type="email"], input[type="password"]');
        values.forEach(function(input) {
            input.value = ''; 
        });
    }
    // Function to validate the form
    function validate() {
        let email = document.getElementById('email');
        let username = document.getElementById('username');
        let password = document.getElementById('pass');
        let confirmPassword = document.getElementById('pass2');
        let terms = document.getElementById("terms").checked;

        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let usernameRegex = /^.{1,20}$/;
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

        const validations = [
            {
              check: !emailRegex.test(email),
              element: "email",
              error:
                "&#10006 Email address should be non-empty with the format xyx@xyz.xyz.",
            },
            {
              check: !usernameRegex.test(username),
              element: "username",
              error:
                "&#10006 User name should be non-empty, and within 20 characters long.",
            },
            {
              check: !passwordRegex.test(password),
              element: "password",
              error:
                "&#10006 Password should be at least 6 characters: 1 uppercase, 1 lowercase.",
            },
            {
              check: (password !== confirmPassword) | !passwordRegex.test(password),
              element: "confirmPassword",
              error: "&#10006 Please retype password.",
            },
            {
              check: !terms,
              element: "termserror",
              error: "&#10006 Please accept the terms and conditions.",
            },
          ];

        clearErrors();
        
        var validForm = true;
    
        validations.forEach((validation) => {
            if (validation.check) {
                var errorElement = document.createElement("div");
                errorElement.style.color = 'red';
                errorElement.style.fontSize = '10px';
                errorElement.style.border = "2px solid red";
                errorElement.className = "error-message";
                errorElement.textContent = validation.error;
                validation.element.parentNode.appendChild(errorElement);
                validForm = false;
          }});
    
        return validForm;
    }
    
                                                                                          
    function clearErrors() {
        var errorMessages = document.querySelectorAll(".error-message"); 
        errorMessages.forEach(function (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        }); 
    }
    