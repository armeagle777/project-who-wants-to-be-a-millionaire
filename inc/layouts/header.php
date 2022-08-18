<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css?v=2">
        <link rel="icon" type="image-icon" href="../images/icon.png">
        <script src="js/main.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body id="bod">
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logopng.png">
                </a>
            </div>
            <div class="header_bg"></div>
            <?php
                  if(isset($_SESSION['u_id'])){
                        echo '<div id="logout_button">
                                <form action = "inc/functions.php" method="POST">
                                    <button name="logout" type="submit" id="logout">Logout</button>
                                </form>
                            </div>';
                  } else{
                      echo 'hi';
                  }         
            ?>
            
          

                    

        </header>
