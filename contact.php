<?php 
// connect to database again

include('./config/db_connect.php');

// whenever it's loaded it shows empty value
$title = $email =$content ='';
$success = '';
// if submit button pressed all array variable updated
$errors = array('email'=> '', 'title'=>'', 'content'=>'');

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
// check title
if(empty($_POST['title'])){
    // echo 'An title is required <br>';
    $errors['title']='An title is required <br>';
}else{
    $title = $_POST['title'];
//    Regular Expression:Regex
    if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        echo 'Title must be letters and space only ';
        $errors['title']='Title must be letters and spaces only';
    }
}

// check content
if(empty($_POST['content'])){
    // echo 'An content is required <br>';
    $errors['content']='An content is required <br>';
}else{
    $content = $_POST['content'];
//    Regular Expression:Regex
    if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $content)){
        // echo 'Content must be comma separated ';
        $errors['content']='Content must be comma separated';
    }
}
if(array_filter($errors)){
    // echo 'error is the form';
}else{
// import ino ou database
$email = mysqli_real_escape_string($conn, $_POST['email']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);

// create sql
$sql = "INSERT INTO users(title, email, content) VALUES ('$title', '$email', '$content')";


// save to db and check
if(mysqli_query($conn, $sql)){
    // successful
   
   $success = 'Thank you for your message!';
}else{
    // error
    echo 'Query error' . mysqli_error($conn);
}
}
}
// XSS(Cross Site Scripting)



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".css/contact.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    
<section class="contact">
    
    <div class="contact-wrapper">
        <div class="contact-container">

    
    

            <div class="contactform-container1">
                <div class="container-left">
                    <h1 class="contact-h1">Get in touch!</h1>
                    <div class="container_contact">
                      
                        <div class="form">
                        <?php isset($_POST['submit']); ?>
                            <form method="POST" action="contact.php" class="form-color">
                            
                                <br><input type="text" name="title" size="15" maxlength="30" placeholder="Enter your Name" class="form-color">
                                <div class="contact-error"><?php echo $errors{'title'}; ?></div>
                                <br>
                                <br><input  type="email" name="email" placeholder="Enter a valid email address" class="form-color">
                                <div class="contact-error"><?php echo $errors{'email'}; ?></div>
                                <br>
                                <br><textarea  type="text"  name="content"  placeholder="Enter your message" cols="40" rows="8" class="form-color"></textarea> 
                                <div class="contact-error"><?php echo $errors{'content'}; ?></div> 
                            
                                <br><input type="submit" name="submit" class="btn-contact" value="submit" class="form-color">  
                               

                                 
                                
                            </form>
                            <div class="contact-success"><?php echo $success ;?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contactform-container2">

                <div class="contact-information">
                    
                    <div class="contact-information1">

                        <div class="contact-icon1">
                            <i class="fas fa-user-circle" style="color: #DB545A; font-size: 30px; margin:0 1rem;"></i>
                        </div>

                        <div class="contact-person-wrapper">
                            <div class="each-information">
                                <p class="name-text-contact">PRESIDENT: Alex Turko</p>
                                <p class="text-contact">Telephone: 778-229-7858</p>
                                <p class="text-contact">Email: president@westvancouvercricketclub.ca</p>
                            </div>
                            <div class="each-information">
                                <p class="name-text-contact">CLUB SECRETARY: Ali Haq</p>
                                <p class="text-contact">Telephone: 604-818-6613</p>
                                <p class="text-contact">Email: secretary@westvancouvercricketclub.ca</p>
                            </div>
                        </div>
                        

                    </div>
                    
                    <div class="contact-information2">
                        <div class="contact-icon2">
                            <i class="fas fa-map-marker-alt" style="color: #DB545A; font-size: 30px; margin:0 1rem;"></i>
                        </div>
                        <div class="contact-map-wrapper">
                            <div class="each-information">
                                <p class="name-text-contact">West Vancouver Cricket Club</p>
                                <p class="text-contact">West Vancouver Cricket ClubHugo Ray Park1290 <br>Third Street West Vancouver, BCV7S 2Y2</p>
                                <p class="text-contact">Telephone: 604-818-6613</p>
                                <p class="text-contact">Email: secretary@westvancouvercricketclub.ca</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-information3">
                        <div class="contact-icon2">
                            <i class="fas fa-clock" style="color: #DB545A; font-size: 28px; margin: 0 1rem;"></i>
                        </div>
                        <div class="contact-map-wrapper">
                            <div class="each-information">
                                <p class="name-text-contact">Mon – Fri … 10 am – 8 pm 
                                    Sat, Sun … Closed</p>
                            </div>
                        </div>
                    </div>


                </div>

                




                <div class="g-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2599.909039651303!2d-123.12435708434514!3d49.33494087498754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54866e2c6a957833%3A0x7f71737d27239411!2sWest%20Vancouver%20Cricket%20Club!5e0!3m2!1sen!2sca!4v1588944114051!5m2!1sen!2sca"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>


            </div>

        </div>

    </div>


</section>
<section class="newsletter">

    <div class="newsletter-wrapper">

        <div class="newsletter-header-container">
            <h1 class="newsletter-head">Subscribe to Our Newsletter</h1>
        </div>

        <div class="newsletter-container">
            <form method="POST" action="newsletter.php" class="form-newsletter"  >
                <input  required="required"　class="mail" type="email" name="news" placeholder="Enter a valid email address" class="newsletter-form" style = width:300px;>
                <input type="submit" class="btn-newsletter" style = width:100px; type="submit" name="submit" value="submit"> 
            </form>
            <?php echo $errors{'news'}; ?>  
            <div class="contact-success"><?php echo $success2 ;?></div>
        </div>




    </div>
   




</section>
</body>
</html>