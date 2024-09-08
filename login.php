<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['uname'] == "atesma" && $_POST['passwrd'] == "web") {
        $page = 'admindashboard'; 
        header("Location: index.php?page=$page");
        exit(); 
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
    
<main class="account-main">
    <form action="" method="post">
        <div class="container">
            <h1>Login</h1>
            
            <div>
                <label for="">Email:</label>
                <input type="text" name="uname"  id="" required>
            </div>
            <div>
                <label for="">Password:</label>
                <input type="password" name="passwrd" id="" required>
            </div>
            
            <button class="login" type="submit" >Login</button>
        </div>
    </form>    
    </main>
    
</body>
</html>