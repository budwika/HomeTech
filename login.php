<?php
session_start();
$pagename="Login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file 
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "<form method=post action=login_process.php>";
echo "<table style= 'border: 0px'>";
echo "<tr><td style= 'border: 0px'> Email </td>";
echo "<td style= 'border: 0px'><input type=text name=l_email size=40></td></tr>";
echo "<tr><td style= 'border: 0px'>Password</td>";
echo "<td style= 'border: 0px'><input type=password name=l_password size=40></td></tr>";
echo "<tr><td style= 'border: 0px'><input type=submit Value='Login' name='submitbtn' id=submitbtn></td>";
echo "<td style= 'border: 0px'><input type=reset Value='Clear Form' name='submitbtn' id=submitbtn></td></tr>";
echo "</table>";
echo "</form>";
include("footfile.html"); //include head layout
echo "</body>";
?>
