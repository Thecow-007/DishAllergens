document.addEventListener('DOMContentLoaded', function () {
    var displayLogin = document.getElementById('login-account');
    var signIn = document.querySelector('.login-form');
    var closeLogin = document.getElementById('closeLogin');

    var displaySignup = document.getElementById('create-account');
    var signUp = document.querySelector('.signup-form');
    var closeSignUp = document.getElementById('closeSignUp');

    displayLogin.addEventListener('click', function () {
        signIn.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });

    closeLogin.addEventListener('click', function () {
        signIn.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
    });

    displaySignup.addEventListener('click', function () {
        signUp.classList.add('clicked');
        document.body.classList.add('after-clicked');
    });

    closeSignUp.addEventListener('click', function () {
        signUp.classList.remove('clicked');
        document.body.classList.remove('after-clicked');
        clearFields();
    });
    var signupRedirect = document.getElementById('signup-redirect');
    signupRedirect.addEventListener('click', function () {
        signUp.classList.add('clicked');
        signIn.classList.remove('clicked');
    });

    var signupForm = document.getElementById('signup');
    signupForm.addEventListener('submit', function (event) {
        if (!validate()) {
            event.preventDefault(); 
        }
    });

    function clearFields() {
        var values = document.querySelectorAll('#username, #email, #pass, #pass2');
        values.forEach(function (input) {
            input.value = '';
        });
    }

    function validate() {
        var email = document.getElementById('email').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('pass').value;
        var confirmPassword = document.getElementById('pass2').value;
        var terms = document.getElementById("terms").checked;

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var usernameRegex = /^.{1,20}$/;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z]).{6,}$/;

        var validations = [
            {
                check: !emailRegex.test(email),
                element: "email",
                error: "Email address should be non-empty with the format xyz@xyz.xyz."
            },
            {
                check: !usernameRegex.test(username),
                element: "username",
                error: "User name should be non-empty, and within 20 characters long."
            },
            {
                check: !passwordRegex.test(password),
                element: "pass",
                error: "Password should be at least 6 characters with 1 uppercase and 1 lowercase."
            },
            {
                check: password !== confirmPassword,
                element: "pass2",
                error: "Please retype password."
            },
            {
                check: !terms,
                element: "terms",
                error: "Please accept the terms and conditions."
            }
        ];

        clearErrors(); 

        var validForm = true;

        validations.forEach(function (validation) {
            if (validation.check) {
                var errorElement = document.createElement("div");
                errorElement.classList.add("error-message");
                errorElement.textContent = validation.error;
                errorElement.style.color = 'red';
                errorElement.style.fontSize = '10px';
                errorElement.style.border = "2px solid red";
                document.getElementById(validation.element).parentNode.appendChild(errorElement);

                validForm = false; 
            }
        });

        return validForm; 
    }

    function clearErrors() {
        var errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function (errorMessage) {
            errorMessage.parentNode.removeChild(errorMessage);
        });
    }
});