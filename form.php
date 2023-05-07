<?php
require_once('config.php');
 if(isset($_POST['Email']) && isset($_POST['Password']))
 {
    $email=$_POST['Email'];
    $PASSWRD=$_POST['Password'];
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $phoneno=$_POST['pnum'];
    $age=$_POST['age'];
    if($_POST['gender']==1)
    {
        $gender="Male";
    }
    else if($_POST['gender']==2)
    {
        $gender="Female";
    }
    else
    {
        $gender="Others";
    }
  if($_POST['lang']=="E")
  {
    $knownlanguage="English";
  }
  else if ($_POST['lang']=="H")
  {
    $knownlanguage="Hindi";
  }
  else{
    $knownlanguage="Bengali";
  }
    $sql_quary="insert into register(firstname,lastname,email,PASSWRD,phonenumber,age,gender,knownlanguage) values ('$firstname','$lastname','$email','$PASSWRD','$phoneno','$age','$gender','$knownlanguage')";
    if(mysqli_query($conn,$sql_quary))
    {
        header('location:login.html');

    }
    else{
        echo "Error:". $sql_quary ."". mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Registration Form</title> 
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    *{
    margin: 0;
    padding: 0;
    color:#33FFCC
}
body{
    background: url("pic.jpg");
    background-repeat: no-repeat;
    background-size: cover ;
    height: 100%;
}
h2{
    text-align: center;
    padding: 20px;
    font-family: 'Times New Roman', Times, serif;

}
div.Register{
    background-color: rgba(0,0,0,0.5);
    width: 100%;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    color:#33FFCC
}
form#Register{
    margin: 40px;

}
lable{
    font-family: 'Times New Roman', Times, serif;
    font-size: 18px;
   font-style: italic;
}
input#name{
    
    border: 1px solid #ddd;
    border-radius:3px ;
    outline: 0;
    padding: 2px;
    box-shadow: inset 1px 1px 5px rgba(0,0,0,0.3);
}
input#Submit{
    width: 200px;
    padding: 5px;
    font-family: 'Times New Roman', Times, serif;
    font-style: italic;
    font-size:  18px;
    border-radius: 3px;
    border: none;
    background-color: coral;
    cursor: pointer;
    border: 1px solid rgba(255,255,255,0.3);
    box-shadow: 1px 1px 5px rg;
    color: black;

}
.login{
    font-size: .9em;
    color: #33FFCC;
    text-align: center;
    margin: 25px 0 10px;
}
@media only screen and (max-device-width:480px){
    body{
        background-color: url("pic.jpg");
        /* width: 500rem;
        height: 500rem; */
    }
}
  </style>

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
         <a class="navbar-brand" href="#" style="color: red;">Parralox</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li class="dropdown"><a href="contact.html">Contact us</a>
    
        </div>
      </nav>
<div class="main">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <div class="Register">
        <h2> REGISTRATION FORM</h2>
        <br>
        <br>
       <center> <form action="form.php" method="post">
            <label> First Name :  </label>
            <input type="Text" name="fname" id="name" placeholder="Enter Your First Name">
            <br><br><br>
            <label> Last Name :  </label>
            <input type="text" name ="lname" id="name" placeholder="Enter Your Last Name">
            <br><br><br>
            <lable> Email ID :  </lable>
            <input type="email" name="Email" id="name" placeholder="Enter Your Valid Email Id ">
            <br><br><br>
            <lable> Phone Number :  </lable>
            <input type="text" name="pnum" id="name" placeholder="Enter Your Phone Number ">
            <br><br><br>
            <lable> Your Age :  </lable>
            <input type="number" name="age" id="email" placeholder="Enter Your Age ">
            <br><br><br>
            <lable> Password  :  </lable>
            <input type="text" name="Password" id="password" placeholder="Enter The Password ">
            <br><br><br>
            <lable> Gender :  </lable>
            <br>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" id="Male" value="1">
            &nbsp;
            <span id="Male"> Male</span>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" id="Female" value="2">
            &nbsp;
            <span id="Female"> Female </span>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="gender" id="Others" value="3">
            &nbsp;
            <span id="Others"> Others</span>
            <br>
            <br>
            <br>
            <label> known language : </label>
            <br>
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="lang" id="eng" value="E">
            &nbsp;
            <span id="eng"> English</span>
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="lang" id="Hin" value="H">
            &nbsp;
            <span id="Hin"> Hindi</span>
            &nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="lang" id="Bng" value="B">
            &nbsp;
            <span id="Bng"> Bengali </span>
            <br><br><br>
            <input type="Submit" value="Submit" name="Submit" id="Submit">
            <div class="login">
                <p>Do you  have a account <a href="login.html">LOG IN</a></p>
            </div>





        </form></center>
    </div>
    </div>
    <div class="col-sm-4"></div>
</div>
    
</body>
</html>