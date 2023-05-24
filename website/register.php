<?php session_start();
?>
<!DOCTYPE html>
<html>
<main>
    <title>Movio</title>
    <style>
        #background {
            background-color: #100d28;
            background-image: url(Background.jpg);
            background-size: 1500px;
            font-family: Bahnschrift;
        }

        #background2 {
            background-color: #100d28;
            background-image: url(Background.jpg);
            background-size: 1500px;
        }

        #logo {
            margin-bottom: -120px;
            margin-left: 10px;
        }

        #nav {
            font-size: 20px;
            text-decoration: none;
            list-style-type: none;
            display: flex;
            flex-direction: row;
            text-align: center;
            grid-gap: 20px;
            margin-left: 240px;
            margin-top: 50px;
        }

        .navi {
            text-decoration: none;
            color: white;
            cursor: pointer;
            padding: 10px;
            padding-left: 30px;
            padding-right: 30px;
            transition: 0.5s;
        }

        .error {
            color: Red;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            margin-bottom: -20px;
        }

        .navi:hover {
            background-color: #6330af;
        }

        #acc {
            display: flex;
            flex-direction: row;
            margin-left: 1050px;
            margin-right: 40px;
            color: white;
            font-size: 20px;
            font-family: Bahnschrift;
            grid-gap: 15px;
            margin-top: -50px;
        }

        #log {
            text-decoration: none;
            color: white;
            font-size: 17px;
            border: white 2px solid;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            cursor: pointer;
            transition: 0.5s;
        }

        #log:hover {
            background-color: white;
            color: #100d28;
        }

        #reg {
            text-decoration: none;
            font-size: 20px;
            color: white;
            background-image: linear-gradient(to right, #6330af, #340081);
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            cursor: pointer;
            transition: 0.5s;

        }

        #reg:hover {
            color: black;
        }


        #register {
            background-color: white;
            width: 700px;
            height: 1040px;
            border: 3px solid #800080;
            font-family: Bahnschrift;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 100px;
        }

        #title {
            color: rgb(1, 1, 1);
            font-weight: bold;
            font-size: 40px;
            text-align: center;
        }

        #subtitle {
            color: #0a0a0a9e;
            font-size: 20px;
            text-align: center;
            color: rgb(64, 48, 62);
            margin-top: -20px;
            margin-bottom: 40px;
        }


        .region {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        #register_form {
            margin-top: 50px;
            margin: auto;
        }

        .region input {
            margin-bottom: 10px;
            width: 540px;
            margin-left: 70px;
            height: 40px;
            font-size: 15px;
            border: #800080 solid 1.7px;
            border: 2px solid #800080;
        }

        .region label {
            margin-left: 70px;
            font-size: 15px;
        }

        #region1 input {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            width: 240px;
            height: 40px;
            font-size: 15px;
            border: 2px solid #800080;
        }

        #region1 {
            display: flex;
            flex-direction: row;
            margin-left: 70px;

        }

        .name_sector {
            display: flex;
            flex-direction: column;
            width: 300px;
        }

        #gender_region {
            display: flex;
            flex-direction: column;
            font-size: 15px;
            margin-left: 70px;
        }

        #mark {
            display: flex;
            flex-direction: row;
            grid-gap: 70px;
            margin-bottom: 40px;
            font-weight: bold;
        }


        .checker input[type="radio"] {
            appearance: none;
            background-color: #fff;
            margin: 0;
            font: inherit;
            width: 15px;
            height: 15px;
            border: #000000 solid 1.5px;
            transition: 0.5s;
            border-radius: 50%;
            margin-left: 20px;
        }

        .checker input[type="radio"]:hover {
            background-color: #80008094;
        }

        .checker input[type="radio"]:checked {
            background-color: #d00571;
        }


        #submit_reg {
            width: 544px;
            background-color: #d00571;
            height: 50px;
            color: white;
            font-size: 19px;
            border: none;
            margin-left: 70px;
            cursor: pointer;
            transition: 0.5s;
            font-weight: bold;
        }

        #submit_reg:hover {
            background-color: #5d1bc1;
        }

        #signuplink {
            font-size: 15px;
            margin-top: 11px;
            width: 544px;
            text-align: center;
            align-content: center;
            margin-left: 70px;
            margin-bottom: 20px;
        }

        #signuplink a {
            text-decoration: none;
            color: rgb(159, 0, 154);

        }

        #terms {
            width: 544px;
            text-align: center;
            align-content: center;
            margin-left: 70px;
            font-size: 15px;
        }

        #terms a {
            text-decoration: none;
            color: rgb(159, 0, 154);
            font-weight: bold;
        }
    </style>
</main>

<body id=background>


    <!---UPPER REGION-->


    <div id=upper>
        <div id="logo">
            <img src="images/logo.png" width="200px" height="auto">
        </div>
        <ul id="nav">
            <li id="main"><a href="index.php" class="navi">HOME</a></li>
            <li id="about"><a href="contact_us.php" class="navi">CONTACT US</a></li>
        </ul>
        <div id="acc">
            <a href=login.php id=log>LOG IN</a>
            <a href=Register.php id=reg>REGISTER</a>
        </div>
    </div>


    <!---REGISTER REGION-->
    <div id="register">
        <br>
        <?php if (isset($_GET['error'])) { ?>
            <div class="error">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <h2 id="title">Registration Form</h2>
        <h3 id="subtitle">Kindly fill your information</h3>
        <form id="register_form" action="registerCode.php" method="POST">
            <div id="region1">
                <div id="firstname" class="name_sector">
                    <label class="label">First Name</label>
                    <input class="name" type="text" name="first_name">
                </div>
                <div class="name_sector">
                    <label class="label">Second Name</label>
                    <input class="name" type="text" name="second_name">
                </div>
            </div>
            <div class="region" id="region2">
                <label class="label">Email</label>
                <input class="name" type="text" name="email">
                <label class="label">Comfirm Email</label>
                <input class="name" type="text" name="comfirmEmail">
            </div>
            <div class="region" id="region3">
                <label class="label">Password</label>
                <input class="name" type="password" name="password">
                <label class="label">Comfirm Password</label>
                <input class="name" type="password" name="comfirmPassword">
            </div>
            <div class="region" id="region4">
                <label class="label">Phone Number</label>
                <input class="phone" type="number" name="phone">

                <label class="label">Age</label>
                <input class="birthday" type="number" name="age">
            </div>


            <div id="gender_region">
                <label class="label">Gender</label>
                <br>
                <div id="mark">
                    <label class="checker">Male
                        <input type="radio" checked="checked" name="gender">
                        <span class="checkmark"></span>
                    </label>

                    <label class="checker">Female
                        <input type="radio" name="gender">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>

            <input id="submit_reg" type="submit" value="CREATE AN ACCOUNT!">
            <br>

        </form>
        <div id="signuplink">Already have an account? <a href="login.php">Sign in!</a></div>
        <br></br>
        <div id="terms"> By Registering you're agreeing to Our <a href="https://policies.google.com/terms">Terms of
                Service</a>
            and <a href="https://policies.google.com/privacy">Privacy Policy</a> and that you are 18 years or older.
        </div>

    </div>
    <?php include "layouts/footer.php"; ?>