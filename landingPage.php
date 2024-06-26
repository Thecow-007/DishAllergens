<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/fullSite.css">
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./CSS/index.css">
</head>

<body>
    <div class="container">
        <div class="flex-container">
            <img src="./pic/126409998-delicious-food-cartoon-vector-illustration-graphic-design.jpg"
                alt="Food Cartoon Picture" id="backgroundPic">
            <!--background pic-->
        </div>
        <div class="flex-form">
            <h1>Know Your Allergens, Dine with Confidence!</h1>
            <h2>Unlock Flavor, Sign Up for More!</h2>
            <button id="create-account">Sign Up Now</button>
            <h3>Already have an account?</h3>
            <button id="login-account">Login Now</button>


            <form action="./Elements/signup.php" method="post" id="signup">
                <!-- Signup form -->
                <div class="signup-form">
                    <div class="showsup">
                        <div class="close-button" id="closeSignUp">&times;</div>
                        <h2>Create your Account</h2>
                        <div>
                            <label for="username">User Name</label>
                            <input type="text" id="username" name="username" placeholder="User Name" required>
                        </div>
                        <div>
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div>
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required>
                        </div>
                        <div>
                            <label for="pass2">Please type Password Again</label>
                            <input type="password" name="pass2" id="pass2" placeholder="Password" required>
                        </div>
                        <div>
                            <input type="submit" id="signUp" class="button" name="signup" value="Sign Up">
                        </div>
                        <div>
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the terms and conditions</label>

                        </div>
                    </div>
                </div>
            </form>

            <!-- SignIn form -->
            <form action="./Elements/login.php" method="POST" id="signin">
                <div class="login-form">
                    <div class="showsup">
                        <div class="close-button" id="closeLogin">&times;</div>
                        <h2>Sign In Your Account</h2>
                        <div>
                            <label for="login-username">User Name</label>
                            <input type="username" id="login-username" name="login-username" placeholder="User Name" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div>
                            <button id="button" type="submit" name="signin">Sign In</button>
                        </div>
                        <div>
                            <!--redirect user to sign up page if they don't have an account-->
                            <div>Don't have an account? <span id="signup-redirect">Sign up</span></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>