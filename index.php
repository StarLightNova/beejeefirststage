<html>

    <head>
        <title>Main Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
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
                               
                if (isset($_GET['pageno'])) {
                 $pageno = $_GET['pageno'];
                } 
                else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 3;
                $offset = ($pageno-1) * $no_of_records_per_page;
        
                $conn=mysqli_connect("rudy.zzz.com.ua","starlightnova","Admin123","starlightnova");
                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    die();
                }
        
                $total_pages_sql = "SELECT COUNT(*) FROM todos";
                $result = mysqli_query($conn,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
        
                $sql = "SELECT * FROM todos LIMIT $offset, $no_of_records_per_page";
                $res_data = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($res_data)){
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
                mysqli_close($conn);

            ?>
            
            <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
            
        </div>
        
    </body>

</html>	
