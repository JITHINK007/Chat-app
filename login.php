<?php
    include 'config/database.php';
    session_start();
    $name=$password='';
    $errorl[]='';

    if(isset($_POST['button']))
    {
        if(empty($_POST['username']))
        {
            $nameer='Username is required';
        }
        else
        {
            $name = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($_POST['password']))
            {
                $passworder='Password is required';
            }
            else
            {
                $password = $_POST['password'];
                $select = " SELECT * FROM login WHERE USERNAME = '$name' && PASSWORD = '$password' ";
                $result = mysqli_query($conn,$select);
                if(mysqli_num_rows($result)>0)
                {
                    $row=mysqli_fetch_array($result);
                    $_SESSION['UNIQUE_ID']=$row['UNIQUE_ID'];
                    $update=mysqli_query($conn,"UPDATE login SET STATUS='Online' WHERE UNIQUE_ID = {$row['UNIQUE_ID']}");
                    header('Location: users.php');
                }
                else
                {
                    $errorl[] = 'Incorrect username or password!'; 
                }
            }
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Chat(a)Rena</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="form-container">
        <h1>CHAT(a)RENA</h1>
        <form id="form" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <h3>Login</h3>
            <span id="error" class="error">
            <?php 
                if(isset($errorl))
                {
                    foreach($errorl as $error)
                    {
                        echo $error;
                    }
                }
            ?>
            </span>
            <i class="fas fa-user"></i>
            <input type="text" class="input" name="username" placeholder="Username" required><br>

            <i class="fas fa-lock"></i>
            <input type="password" class="input" name="password" placeholder="Password" required>

            <p>Don't have an account? <a href="signup.php">Signup here</a></p>
            <input type="submit" class="button" name="button" value="Login"> 
        </form>
    </div>

    <script src="script.js"></script>
    <script src="login.js"></script>

</body>
</html>