<?php 
    include_once 'inc/layouts/header.php'; 
    include_once 'inc/functions.php'; 

?>
<div class="registration-wrapper">
    <div class="regform_signup" id='hidden_two'>
        <form action="inc/functions.php" name="signup_form" method="POST">
            <input name="first" type="text" placeholder="First Name" class="input">
            <input name="last" type="text" placeholder="Last Name" class="input">
            <input  name="email" type="text" placeholder="Email address" class="input">
            <input  name="uid" type="text" placeholder="Username" class="input">
            <input name="pwd" type="password" placeholder="Password" class="input">
            <input name="conf_pwd" type="password" placeholder="Confirm Password" class="input">
            <br>
            <button  name="signup" type="submit" class="buton">Sign Up</button>
        </form>
    

</div>
</div>


<?php include_once 'inc/layouts/footer.php'; ?>