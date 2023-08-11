<html>
    <head>
        <style>
            body {
                background-color: #2980b9;
            }
            #formcon {
                background-color: rgb(228, 125, 142);
                height: auto;
                margin-top: 140px;
                /* text-align: center; */
                align-items: center;
            }
            label {
                display: inline-block;
                width: 200px;
                margin-left: 440px;
            }
            input[type=text],input[type=password],input[type=date],input[type=file] {
                padding: 8px;
                height: 40px;
                margin-top: 10px;
                width: 400px;
            }
            input[type=submit] {
                padding: 5px;
                margin-top: 10px;
                /* margin-left: 650px; */
                height: 40px;
                width: 100px;
            }
            h4 {
                text-align: center;
                font-family:Georgia, 'Times New Roman', Times, serif;
            }
            a {
                text-decoration: none;
                color: black;
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
            #footer {
                margin-top: 9vh;
                background-color: black;
                height: 100px;
                width: 1425px;
                color: white;
                text-align: center;
            }
            h3 {
                font-weight: normal;
            }
        </style>
    </head>
    <?php
    $error1=$error2=$error3=$error4=$error5=$error6=$error7=$error8="";
    $validate = True;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $un = $_POST["un"];
        $pwd = $_POST["pwd"];
        $cpwd = $_POST["cpwd"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $pp = $_POST["pp"];
        if(empty($un)) {
            $error1="Mandatory-1";
            $validate=False;
        }
        if(empty($pwd)) {
            $error2="Mandatory-2";
            $validate=False;
        }
        if(empty($cpwd)) {
            $error3="Mandatory-3";
            $validate=False;
        }
        if(empty($email)) {
            $error4="Mandatory-4";
            $validate=False;
        }
        if(empty($dob)) {
            $error5="Mandatory-5";
            $validate=False;
        }
        if(empty($pp)) {
            $error6="Mandatory-6";
            $validate=False;
        }
        if($pwd != $cpwd) {
            $error7="Pwd and CPwd does not match";
            $validate=False;
        }
        if($validate == True) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "vitap_db";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn){
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else{ 
                $sql = "INSERT INTO `registration` 
                        VALUES ('$un', '$pwd', '$cpwd', '$email' , '$dob' , '$pp')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
                else{
                    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
            }
        }
    }
?>
    <body>
        <div id="header">
            <br>
            <span id="name">|| Pawan ||</span>
            <a class="x" href="">HOME</a>
            <a class="x" href="login.php">Login</a>
            <a class="x" href="registration.php">Sign Up</a>
        </div>
        <div id="formcon">
            <form action="" method="post">
                <label for="un">User Name</label>
                <input type="text" id="un" name="un">
                <span><?php echo $error1; ?></span>
                <br>
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd">
                <span><?php echo $error2; ?></span>
                <br>
                <label for="cpwd">Confirm Password</label>
                <input type="password" id="cpwd" name="cpwd">
                <span><?php echo $error3; ?></span>
                <span><?php echo $error7; ?></span>
                <br>
                <label for="email">Email Id</label>
                <input type="text" id="email" name="email">
                <span><?php echo $error4; ?></span>
                <br>
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
                <span><?php echo $error5; ?></span>
                <br>
                <label for="pp">Profile Picture</label>
                <input type="file" id="pp" name="pp">
                <span><?php echo $error6; ?></span>
                <br>
                <label for=""></label>
                <input type="submit" value="Sign-Up">
                <br>
                <br>
            </form>
        </div>
        <h4>Registered User? Click here to <a href="login.php">Sign In</a></h4>
        <div id="footer">
            <br>
            <h3>Develeoped By Pawan</h3>
        </div>
    </body>
</html>