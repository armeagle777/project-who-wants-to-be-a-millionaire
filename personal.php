
<?php
include_once 'inc/functions.php'; 
    if(isset($_SESSION['u_id'])){
       include_once 'inc/layouts/header.php'; 
        
        
        echo '
        <section id="personal_page">
            <div id="personal_card">
                <div id="profile_picture" style="background: url(photo/'.$_SESSION['image'].'.jpg);">
                    <div id="edit_button">
                        <input type="image" src="images/edit.png" id="hidden_edit_div" onclick="editor()">
                    </div>
                </div>
                <div id="profile_information">
                    <p>'.strtoupper($_SESSION["u_first"]).' '.strtoupper($_SESSION["u_last"]).'
                </div>
                <div id="edit_img">
                    <form name="edit_img" action="inc/functions.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="img">
                        <p><button type="submit" name="add_img">ADD</button></p>
                    </form>
                </div>
            </div>
    
        
        </section>';
        
        
       include_once 'inc/layouts/footer.php';  
        
    }else{
        header("Location: index.php");
        exit();
    }


    











?>

    
        
 





