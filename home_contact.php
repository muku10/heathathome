<?php 

$con = mysqli_connect('localhost','root');
if($con){
    // Connection successful
}
else {
    echo "No Connection";
    exit;
}

mysqli_select_db($con,'healthathome');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO contact(name, email, message) 
          VALUES ('$name', '$email', '$message')";

if (mysqli_query($con, $query)) {
    echo "<script>alert('Form submitted successfully!'); window.location.href='service.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>



