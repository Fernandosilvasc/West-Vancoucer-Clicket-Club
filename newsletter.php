<?php 
// connect to database again

include('./config/db_connect.php');

// whenever it's loaded it shows empty value
 $email ='';
 $success2 = '';
// if submit button pressed all array variable updated
$errors = array('email'=> '');

// global array variable
// ehenever the submit button is pressed, condition check
if(isset($_POST['submit'])){
// echo htmlspecialchars($_POST['email']);
// echo htmlspecialchars($_POST['title']);
// echo htmlspecialchars($_POST['content']);

// check email
if(empty($_POST['email'])){
   
    $errors['email']='An email is required <br>';
}else{
    $email = $_POST['email'];
    // builtin email validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // echo 'email must be a vaild email address';
        $errors['email']='An email must be a valid address'; 
    }
}


if(array_filter($errors)){
    // echo 'error is the form';
}else{
// import ino ou database
$email = mysqli_real_escape_string($conn, $_POST['email']);


// create sql
$sql = "INSERT INTO newsletter(email) VALUES ( '$email')";


// save to db and check
if(mysqli_query($conn, $sql)){
    // successful
    $success2 = 'Thank you for contacting';
}else{
    // error
    echo 'Query error' . mysqli_error($conn);
}
}
}
// XSS(Cross Site Scripting)
?>
