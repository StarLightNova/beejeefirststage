<?php
    $myList = array();
?>
<html>

    <head>
        <title>Main Page</title>
        
        <style>
           #Main_Title{
                text-align: center;
           }

           
           .todo_author_info, #todo_author, #todo_author_email, #todo_status, #todo_id{
                display: flex;
           }
           
           
           #todo_author_text, .todo_container, #todo_author, #todo_author_email, #todo_status, #todo_id, input{
                padding: 10px;
                margin: 5px;
           }
           
           
        </style>

    </head>
    
    <body>  
    
        <!-- Main title box -->
        <div id = "Main_Title"> 
            <h1>Online TODO List</h1>
            <div id = "Description_After_Main_Title">
                <h5>In this webpage you can make online TODO list with other participants.<h5>
            </div>
        </div>
        
        <!-- box to add new todo -->
        
        <div class = "Main_adder"> 
            <form method='post' action='database_manager.php'>
                <input type="text" placeholder = "Enter your name" name = "name">
                <input type="email" placeholder= "email" name = "email">
                <input type="text" placeholder = "What do you want to do?" name = "content">
                <input type="submit" value = "add" name = 'submit'>
            </form>
        
        </div>
        
        <!-- In this boxes I save each todo list -->
        <div class = "Main_Container">
        
            <?php
            
                // Printing my database
                $servername   = "rudy.zzz.com.ua";
                $login        = "starlightnova";
                $password     = "Admin123";
                $db           = 'starlightnova';
                
                $conn = new mysqli($servername, $login, $password, $db);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT id, name, email, content FROM todos";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<div class = "todo_container" style="border: 0.5px solid grey;">';
                        echo '<div class = "todo_author_info">';
                            echo '<div id = "todo_author">' . $row['name'];
                            
                            echo '</div>';
                            echo '<div id = "todo_author_email">' . $row['email'];
                            echo '</div>';
                             echo '<div id = "todo_id">' . $row['id'];
                            echo '</div>';
                            echo '<div id = "todo_status">' . ' in progress';
                            echo '</div>';
                        echo '</div>';
                        
                        echo '<div id = "todo_author_text">' . $row['content'];
                            
                        echo '</div>';
                        
                    echo '</div>';
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();

            ?>
            
           <!-- 
           <div class = "todo_container">
                <div class = "todo_author_info">
                    <div id = "todo_author">
                        John
                    </div>
                    <div id = "todo_author_email">
                            email@test.com
                        </div> 
                    <div id = "todo_status">
                        status
                    </div>
                </div>
                
                <div id = "todo_author_text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed orci tortor, elementum eget lorem vel, pulvinar commodo nulla. Etiam varius, metus nec ullamcorper tincidunt, urna velit semper nibh, rutrum dignissim odio metus non tellus. Mauris ut dui augue. Nam justo ligula, auctor ac cursus sit amet, sollicitudin quis nulla. Aliquam porta metus justo, non fermentum tellus efficitur ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla at ex eget mi eleifend tempus at vel augue.
                </div>
            </div> 
            -->
            
        </div>
        
    </body>

</html>	
