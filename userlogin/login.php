<html>
    <head>
        <style>
            body {
                background-color: #2980b9;
            }
            #formcon {
                margin-top: 150px;
                background-color: rgb(228, 125, 142);
                align-items: center;
                /* text-align: center; */
                height: 220px;
            }
            label {
                display: inline-block;
                width: 200px;
                margin-left: 400px;
            }
            input[type=text],input[type=password] {
                padding: 8px;
                height: 40px;
                margin-top: 10px;
                width: 400px;
            }
            input[type=submit] {
                padding: 5px;
                margin-top: 10px;
                margin-left: 610px;
                height: 40px;
                width: 100px;
            }
            span {
                color: red;
            }
            h4 {
                text-align: center;
                font-family:Georgia, 'Times New Roman', Times, serif;
            }
            a {
                text-decoration: none;
                color: black;
            }
            h1 {
                margin-top: 20px;
                text-align: center;
                font-size: 25px;
                font-weight: normal;
                background-color: rgba(74, 27, 227, 0.968);
            }
            #footer {
                margin-top: 20vh;
                background-color: black;
                height: 100px;
                width: 1425px;
                color: white;
                text-align: center;
            }
            h3 {
                font-weight: normal;
            }
            #header {
                height: 80px;
                width: 1425px;
                color: white;
                background-color: black;
                font-size: 20px;
            }
            #name {
                color : white;
                margin-left: 10px;
            }
            .x {
                color: white;
                margin-left: 20px;
            }
        </style>
    </head>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $un = $_POST["un"];
        $pwd = $_POST["pwd"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "vitap_db";
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else {
            $sql = "SELECT * FROM registration WHERE UserName = '$un' AND Password = '$pwd' ";
            $result = mysqli_query($conn,$sql);
            $check = mysqli_fetch_array($result);
            if(isset($check)){
                header("Location:sample.html");
            }
            else{
                echo 'failure';
            }
        }
    }
?>
    <body>
        <div id="header">
            <br>
            <span id="name">|| Pawan ||</span>
            <a class="x" href="">HOME</a>
            <a class="x" href="">Login</a>
            <a class="x" href="registration.php">Sign Up</a>
        </div>
        <div id="formcon">
            <form action="" method="post">
            <label for="un">User Name</label>
            <input type="text" id="un" name="un">
            <span>*</span>
            <br>
            <label for="pwd">Password</label>
            <input type="password" id="pwd" name="pwd">
            <span>*</span>
            <br>
            <label for="captcha">Enter Captcha</label>
            <input type="text" id="cap" name="cap">
            <span>*</span>
            <br>
            <input type="submit" value="Sign In">
            </form>
        </div>
        <h4>New User? Click here to <a href="registration.php">Sign Up</a></h4>
        <h1>Forgot Password? Click here to <a href="Reset.php">Reset</a></h1>
        <div id="footer">
            <br>
            <h3>Develeoped By Pawan</h3>
        </div>
    </body>
</html>