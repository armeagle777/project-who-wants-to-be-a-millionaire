
<section class="content">
        <section class="left_content">
            <div class="bg_gif">
                <img src="images/bg.gif">
            </div>
        </section>


<?php
  if(!isset($_SESSION['u_id'])){
      echo '<div id="regform_div">
                        
            <div class="regform_content"  id="hidden_one">
                
                <form class="reglogin" name="registration" action="inc/functions.php" method="POST">
                   
                    <a id="button"style="background-color:blue" href="inc/game.php">play without registration </a>
                </form>
            </div>                            
                        
     </div>';
  }  else{
      echo '<div id="enter"><form action="inc/functions.php" method="post"><button name="enter" type="submit">Enter as '.$_SESSION['u_first'].'</button></form></div>';
  }
?>
    

</section>




<!-- include in form class=reglogin <input name="uid" type="text" placeholder="Username or Email address" class="input"> -->
                    <!-- <input name="pwd" type="password" placeholder="Password" class="input">
                    <br>
                    <button class="buton" name="login">Sign In</button>
                    <a id="button" href="?page=signup">Not registred? </a> -->