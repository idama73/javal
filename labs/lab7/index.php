<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login</title>
    </head>
    
    <style>
        @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
        @import url("css/styles.css");
    </style>
    <body>
        
        <h1> OtterMart - Admin Login</h1>
        
        <form method = "POST" action = "loginProcess.php">
            
            Username: <input type = "text" name="username"/> <br />
            Password: <input type="password" name="password"/> <br />
            
            <br>
            <input type="submit" name="submitForm" value="Login!">
        </form>

        <script src="https://ajax.googleapis.com./ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.css"></script>
    </body>
</html>