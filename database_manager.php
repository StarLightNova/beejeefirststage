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
            $servername   = "rudy.zzz.com.ua";
            $login        = "starlightnova";
            $password     = "Admin123";
            $db           = 'starlightnova';
            
            $conn = new mysqli($servername, $login, $password, $db);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully";
            
            $sql = "INSERT INTO todos (name, email, content) VALUES ( '$name', '$email', '$content')";
            //echo $sql;
            
            if($conn->query($sql) == true){
                echo "New record created successfully";
                header("Location: http://beejeefirststage.zzz.com.ua/");
                exit();
            }
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo "<a href = 'http://beejeefirststage.zzz.com.ua/' >back</a>";
            }
            
            $conn -> close();
        }
    }

?>  
