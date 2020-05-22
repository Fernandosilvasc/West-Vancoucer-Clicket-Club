<?php 
// connect to database again

include('./config/db_connect.php');

// whenever it's loaded it shows empty value
 $news ='';
 $success2 = '';
// if submit button pressed all array variable updated
$errors = array('news'=> '');

// global array variable
// ehenever the submit button is pressed, condition check
if(isset($_POST['submit'])){
// echo htmlspecialchars($_POST['email']);
// echo htmlspecialchars($_POST['title']);
// echo htmlspecialchars($_POST['content']);

// check email
if(empty($_POST['news'])){
   
    $errors['news']='An email is required <br>';
}else{
    $news = $_POST['news'];
    // builtin email validation
    if(!filter_var($news, FILTER_VALIDATE_EMAIL)){
        // echo 'email must be a vaild email address';
        $errors['news']='An email must be a valid address'; 
    }
}


if(array_filter($errors)){
    // echo 'error is the form';
}else{
// import ino ou database
$news = mysqli_real_escape_string($conn, $_POST['news']);


// create sql
$sql = "INSERT INTO newsletter(news) VALUES ( '$news')";


// save to db and check
if(mysqli_query($conn, $sql)){
    // successful
    $success2 = 'Thank you for subscription';
}else{
    // error
    echo 'Query error' . mysqli_error($conn);
}
}
}
// XSS(Cross Site Scripting)
?>



<?php echo $errors{'news'}; ?>  
<div class="contact-success"><?php echo $success2 ;?></div>


