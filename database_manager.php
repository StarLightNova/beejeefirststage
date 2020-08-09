<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $content = $_POST['content'];
        
        if(empty($name) || empty($email) || empty(content)){
            echo "You missed fill or haven't filled yet, please fill all forms";
            echo "<br>";
            echo "<a href = 'http://beejeefirststage.zzz.com.ua/' >back</a>";
        }
        
        else{
            
            
            
        }
    }

?>  
