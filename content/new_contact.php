<!DOCTYPE html>
</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Contact</title>
</head>
<body>
<?php
$success='';
require_once './head.html';
require_once './left_side_bar.html';
?>

<?php

if (isset($_GET['submit'])){
    $name=strip_tags(trim($_GET['name']));
    $email=strip_tags(trim($_GET['email']));
    $contact=strip_tags(trim($_GET['contact']));
    echo $name.$email.$contact;
   if (valid()=='true'){

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacts";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO MyGuests (name, email, contact) VALUES($name, $email, $contact)";

if (mysqli_query($conn, $sql)) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

}
else{echo "Enter Valid Data";}

function valid($name,$email,$contact){
       if (!empty($name)&& !empty($email) && !empty($contact)){
           return true;
       }
       else{return false;}
}
}
?>

<!--Initializing contact list container-->
<div class="col-xs-8">


    <div class="container">
        <h2 class="display display-4">Add Contacts</h2>

        <form class="navbar-form navbar-left" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <table class="table table-striped form-group">
                <tr>
                    <td>
                        <label class=" badge  label label-default" style="padding: 8px">Enter Name</label>
                    </td>
                    <td width="200"><input name="name" class="form-control" type="text" class="form-control" placeholder="Imran Shad"></td>
                </tr>
                <tr>
                    <td>
                        <label class=" badge  label label-default" style="padding: 8px">Enter Email</label>
                    </td>
                    <td>
                        <input name="email" class="form-control" type="text" class="form-control" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td><label class=" badge  label label-default" style="padding: 8px">Contact No.</label></td>
                    <td><input name="contact" class="form-control" type="tel" class="form-control" placeholder="Contact"></td>
                    <td><button id="add" class="btn btn-light"><span class="glyphicon glyphicon-plus pull-right"></span></button></td>
                </tr>
            </table>
            <button name="submit" type="submit" class="btn btn-primary" style="margin-left: 300px; margin-top: 20px">Save Now</button><br>
        </form>
        <br>
        <h1 class="badge bg-danger"><?php if (isset($_SERVER['insert'])){ echo $_SERVER['insert'];}  ?></h1>
    </div>
</div>


</body>
</html>





