<?php
$con = mysqli_connect('localhost','root','','library');
if($con==false)
{
echo"connection is not done";
}
else
{ 
echo"connection is ok";
} 
?>