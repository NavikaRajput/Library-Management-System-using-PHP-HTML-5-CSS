<html>
<head>
<title>STUDENT SIGNUP...</title>
    <style>
        #n1
        {
            background-color: white;
            
  display: inline-block;
        }
        #n2
        {
  display: inline-block;
            background-color: white;
        }
        </style>
    <link rel="stylesheet" href="stylesignup.css"/>
	<script src="jquery.js"></script>
    <script src="validate.min.js"></script>
    
	<script>
	// Wait for the DOM to be ready
$(function() {
    $("form[name='registration']").validate(
    {
    rules: {
      name: "required",
      branch: "required",
        mob:
        {
           required:true,
           minlength: 10
        },
        address: "required",
        city: "required",
        pincode: "required",
        dob: "required",
        date: "required",
            
      email: "required",
      password: {
        required: true,
        minlength: 5
      }
    },
    messages: {
      name: "Please enter your name",
        branch: "Please enter your name",
        mob: {required : "Please enter your mobile number",
          minlength : "some digits are missing"
          },
        address: "Please enter your address",
        city: "Please enter your city",
        pincode: "Please enter your pincode",
          dob: "Please enter your dob",
          date: "Please enter your date",
          
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter Sapid"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
	</script>
</head>

    <body class="forimagesignup">
        <div class="menu">
            <div class="left"> <h2>UPES LIBRARY</h2> </div>
        <div class="right"> 
            <ul> 
                <li id="first">HOME</li>
                <li><a href=#>ABOUT US</a></li>
                <li><a href="studentlogin.php">STUDENT LOGIN</a></li>
                <li><a href="studentsignup.php">STUDENT SIGNUP</a></li>
                <li><a href="adminlogin.php">ADMIN LOGIN</a></li>
                <li>CONTACT US</li> 
            </ul>
        </div>
        </div>
        <marquee id="n1" width="20%" direction="up" onmouseover="stop()" onmouseout="start()"> Scam campaign camouflages as John Wick movie-based ebooks on Kindle store.
								<img src="ccc.jpg" alt="news 1" width=200px height=200px>
							<br>
							A new spam campaign has apparently targeted John Wick fans on Amazon’s Kindle store. Miscreants have created fake ebooks in the store that resembles the third installment of the movie. When users click on these links after buying them, they will be taken to a series of third-party websites which ask for payments to view the movie.</marquee>
<div class="container">
    
<form action="studentsignup.php" method="post" name="registration" enctype="multipart/form-data">
    <label for="name">ENTER NAME:</label><input type="text" placeholder="full name" name="name">

    <label for="branch">ENTER BRANCH:</label><input type="text" placeholder="branch" name="branch">

  <label for="mob">ENTER MOBILE NUMBER:</label><input type="number" placeholder="mobile number" name="mob">

    <label for="address">ENETR ADDRESS:</label><input type="text" placeholder="address" name="address">

    <label for="city">ENTER CITY:</label><input type="text" placeholder="city name" name="city">

    <label for="pincode">ENTER PINCODE:</label><input type="number" placeholder="area code" name="pincode">

    <label for="dob">ENTER DATE OF BIRTH:</label><input type="date" placeholder="date" name="dob">

    <label for="gender">SELECT GENDER:</label><select name="gender">
  <option value="male">MALE</option>
  <option value="female">FEMALE</option>
    </select>
     
    <label for="email">ENTER SAPID:</label><input type="email" placeholder="email" name="email">

    <label for="password">ENTER PASSWORD:</label><input type="password" placeholder="password" name="password">
    
    <label for="image">UPLOAD IMAGE:</label><input type="file" name="image">

     <label for="date">ENTER DATE:</label><input type="date" placeholder="current date" name="date">

     <input id="register" type="submit" value="REGISTER" name="submit">
    
</form>
    </div>
        <marquee id="n2" width="20%" direction="up" onmouseover="stop()" onmouseout="start()"> Scam campaign camouflages as John Wick movie-based ebooks on Kindle store.
								<img src="ccc.jpg" alt="news 1" width=200px height=200px>
							<br>
							A new spam campaign has apparently targeted John Wick fans on Amazon’s Kindle store. Miscreants have created fake ebooks in the store that resembles the third installment of the movie. When users click on these links after buying them, they will be taken to a series of third-party websites which ask for payments to view the movie.</marquee>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
	 include('dbcon.php');
	 $name = $_POST['name'];
	 $branch = $_POST['branch'];
	 $mobile = $_POST['mob'];
	 $address = $_POST['address'];
	 $city = $_POST['city'];
	 $pin = $_POST['pincode'];
	 $dob = $_POST['dob'];
	 $gender = $_POST['gender'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $date = $_POST['date'];
     
if($_FILES["image"]["error"]>0)
{
echo"There is an error".$_FILES["image"]["error"]."<br>";
}
else
{
echo "<Font face='comic sans ms' color='red'>UPLOADED:".$_FILES["image"]["name"]."<br>";
echo "Type:".$_FILES["image"]["type"]."<br>";
//echo "Size : ". $_FILES["image"]["size"]/1024 ." Kb<br>";
echo "Stored In:".$_FILES["image"]["tmp_name"]."<br>";
}
if(file_exists("upload/".$_FILES["image"]["name"]))
{
echo $_FILES["image"]["name"]."Already Exist";
}
else
{
move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);
echo "stored in :"."upload/".$_FILES["image"]["name"];
}
//    move_uploaded_file($tempname,"../dataimg/$imagename");
//     $file = addslashes(file_get_contents($_FILE["image"]["temp_name"]));
	 $qry="INSERT INTO students(student_name, branch_name, mobile, address, city, pincode, dob, gender, email, password, entrydate) VALUES ('$name','$branch','$mobile','$address','$city','$pin','$dob','$gender','$email','$password','$date')";
	 $run = mysqli_query($con,$qry);
	 if($run==true)
	 {
		 ?>
		 <script>
		 alert('YOUR ACCOUNT HAS BEEN REGISTERED SUCCESSFULLY !!');
		 </script>
		 <?php
	 }
}
?>
