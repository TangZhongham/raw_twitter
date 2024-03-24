<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment2 - Twitter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="twitter.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="../logos/Fake Twitter_transparent.png" alt="Twitter Logo">
        </div>
        <div class="form-container">
            <h1>Happening now</h1>
            <h2>Join Today.</h2>

            <form action="insert_user.php" method="post" id="signupForm">
                <div class="account">
                    <button class="account1" type="button">Create account</button> 
                </div>

                <p>By signing up, you agree to the Terms of Service and Privacy<br>Policy, including Cookie Use.</p>
                <h3>Already have an account?</h3>

                <div class="center">
                    <button id="show-login">Sign In</button>
                </div>
                
                <!-- Signup fields -->
                <div class="popup-signup">
                    <div class="modal-signup">
                        <div class="close-btn-signup">&times;</div>
                        <div class="form-signup">
                            <h2>Create your Account</h2>            
                            <div class="form-element-signup">
                                <label for="name">Name</label>
                                <input type="name" id="name" name="name" placeholder="Name" required>
                                <p id="loginError" class="error" hidden>User name should be non-empty and within 30 characters long.</p>
                            </div>
                            <div class="form-element-signup">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-element-signup">
                                <label for="pass">Password</label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required>
                            </div>
                            <div class="form-element-signup">
                                <label for="pass2">Re-type Password</label>
                                <input type="password" name="pass2" id="pass2" placeholder="Password" required>
                            </div>
                            <div class="form-element-signup">
                                <label for="dob">Date of birth</label>
                                <div class="nextToEachother">
                                    <div class="mounth">
                                        <select id="mounth" name="mounth">
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                            <option value="june">June</option>
                                            <option value="july">July</option>
                                            <option value="august">August</option>
                                            <option value="september">September</option>
                                            <option value="october">October</option>
                                            <option value="novamber">Novamber</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>
                                    <div class="form-element-signup">
                                        <select id="day" name="day">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="form-element-signup">
                                        <select id="year" name="year">
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-element-signup">
                                <input type="submit" id="signUp" class="button" value="Sign Up">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="popup">
        <div class="modal-content">
            <div class="close-btn">&times;</div>
            <div class="form">
                <h2>Sign In to Fake Twitter</h2>
                <div class="form-element">
                    <label for="email">Email Address</label>
                    <input type="email1" id="email1" name="email1" placeholder="Email" required>
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-element">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="form-element" id="sign-up-button">
                    <button>Sign in</button>
                </div>
                <div class="form-element1">
                    <p>Don't have an account? <a href="#"> Sign up</a></p> 
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
