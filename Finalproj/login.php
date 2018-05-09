
<?php
    session_start();
    session_destroy();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login</title>
        <script>
        
            function validateForm() {
                
                return false;
           
            }
            
        </script>
        <script>
                $(document).ready(function(){
               // var errors = false;
                $("#username").change( function(){ 
                    
                    $.ajax({
                        type: "GET",
                        url: "usernameAPI.php",
                        dataType: "json",
                        data: { "username": $("#username").val() },
                        success: function(data,status) {
                             //alert(data);
                             
                             if (!data) {  //data == false
                                $("#usererror").html("Username does not exist");
                                
                             } else {
                                 $("#usererror").html("");
                                 
                             }
                        }
                    });//ajax
                });
            });
        </script>
        
    </head>
    
    <style>
        /*@import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");*/
        @import url("css/styles.css");
    </style>
    <body>
        
        <h1> CSUMB - Admin Login</h1>
        
        <form method = "POST" action = "loginProcess.php">
            <fieldset>
            Username: <input type = "text" name="username" id="username"><span style="color:red" id="usererror"></span> <br />
            Password: <input type="password" name="password"/> <br />
            
            <br>
            <input type="submit" name="submitForm" value="Login!">
            </fieldset>
        </form>
         <?php
            if(isset($_SESSION['wrong']))
            {
                echo $_SESSION['wrong'];
            }
        ?>

        <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>