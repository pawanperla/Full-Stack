<html>
    <head>
        <title>
            Assignment 7
        </title>
        <link rel="stylesheet" href="21bce9164.css">
    </head>
    <?php
    $error1=$error2=$error3=$error4=$error5=$error6=$error7="";
    $validate = True;
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $un = $_POST["un"];
        $pwd = $_POST["pwd"];
        $cpwd = $_POST["cpwd"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
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
        if($pwd != $cpwd) {
            $error6="Pwd and CPwd does not match";
            $validate=False;
        }
        if ($validate == true) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "db_vit_21bce9164";
            $conn = mysqli_connect($servername, $username, $password, $database);
            if (!$conn) {
                die("Sorry we failed to connect: " . mysqli_connect_error());
            }
            if ($conn) {
                $dup = mysqli_query($conn, "SELECT uname FROM 21bce9164_users WHERE uname = '$un'");
                if (mysqli_num_rows($dup) != 0) {
                    echo "CHOOSE A DIFFERENT USER NAME!<BR><BR>";
                } else {
                    $sql = "INSERT INTO `21bce9164_users` 
                            VALUES ('$un', '$pwd', '$email' , '$dob')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //     <strong>Success!</strong> Your entry has been submitted successfully!
                        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                        //     <span aria-hidden="true">×</span>
                        //     </button>
                        // </div>';
                        header("Location:21bce9164_success.php");
                    } else {
                        echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvenience caused!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="fun()">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                    }
                }
            }
        }
    }
?>
    <body>
    <div id="formcon">
            <form action="" method="post">
                <label for="un">User Name</label>
                <input type="text" id="un" name="un">
                <span class="x">*</span>
                <span><?php echo $error1; ?></span>
                <br>
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="pwd">
                <span class="x">*</span>
                <span><?php echo $error2; ?></span>
                <br>
                <label for="cpwd">Confirm Password</label>
                <input type="password" id="cpwd" name="cpwd">
                <span class="x">*</span>
                <span><?php echo $error3; ?></span>
                <span><?php echo $error6; ?></span>
                <br>
                <label for="email">Email Id</label>
                <input type="text" id="email" name="email">
                <span class="x">*</span>
                <span><?php echo $error4; ?></span>
                <br>
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
                <span class="x">*</span>
                <span><?php echo $error5; ?></span>
                <br>
                <label for=""></label>
                <input type="submit" value="Sign-Up">
                <br>
                <br>
            </form>
    </body>
</html>