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
$phone = $_POST['phone']; 
$service = $_POST['service'];
$address = $_POST['address'];
$message = $_POST['message'];
$status = $_POST['status'];
$query = "INSERT INTO serviceform(name, email, phone, service, address, message,status) 
          VALUES ('$name', '$email', '$phone', '$service', '$address', '$message','$status')";

if (mysqli_query($con, $query)) {
    echo "<script>alert('Form submitted successfully!'); window.location.href='service.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>



