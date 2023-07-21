<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable
//Assign these values to 2 new local variables $email and $password
$email=($_POST['l_email']);
$password=($_POST['l_password']);
if(empty($email) or empty($password)){
    echo "<p><b>Login Failed.</b></p>";
    echo "<p>Enter both Email and Password</p>";
    echo "<p>Go back to <a href=login.php>login</a></p>";
}
else{
    $SQL="SELECT * FROM Users WHERE userEmail = '".$email."'";
    $exeSQL = mysqli_query($conn,$SQL) or die(mysqli_error($conn));
    $nbrecs = mysqli_num_rows($exeSQL);

    if ($nbrecs == 0){
        echo "<p><b>Login failed!</b>"; //display login error
	    echo "<br>Email not recognised</p>";
		echo "<br><p> Go back to <a href=login.php>login</a></p>";
    }
    else{
        $arrayuser = mysqli_fetch_array($exeSQL);

        if ($arrayuser['userPassword'] <> $password){
            echo "<p><b>Login Failed.</b></p>";
            echo "<p>Password is Incorrect</p>";
            echo "<p>Go back to <a href=login.php>login</a></p>";
        }
        else{
            echo "<p><b>Login success</b></p>"; //display login success
			 $_SESSION['userid'] = $arrayuser['userId']; //create session variable to store the user id
			 $_SESSION['fname'] = $arrayuser['userFName']; //create session variable to store the user first name
			 $_SESSION['sname'] = $arrayuser['userSName']; //create session variable to store the user surname
			 $_SESSION['usertype'] = $arrayuser['userType']; //create session variable to store the user type
			 echo "<p>Welcome, ". $_SESSION['fname']." ".$_SESSION['sname']."</p>"; //display welcome greeting
        }

        if ($_SESSION['usertype']=='C') //if user type is C, they are a customer
		 {
		 echo "<p>User Type: homteq Customer</p>";
		 }
		 if ($_SESSION['usertype']=='A') //if user type is A, they are an admin
		 {
		 echo "<p>User type: homteq Administrator</p>";
		 }

		 echo "<br><p>Continue shopping for <a href=index.php>Home Tech</a>";
		 echo "<br>View your <a href=basket.php>Smart Basket</a></p>";
    }

}
echo "</body>";
?>
