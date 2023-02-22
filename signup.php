<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php
    include 'config/database.php';
    //session_start();
    $uniqueid=$name=$password=$email=$status='';
    $nameer=$passworder=$emailer=$userer='';
    $error[]='';

    if(isset($_POST['button']))
    {
        if(empty($_POST['username']))
        {
            $nameer='Username is required';
        }
        else
        {
            $name = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($_POST['email']))
            {
                $emailer='E-mail is required';
            }
            else
            {
                $email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
                if(empty($_POST['password']))
                {
                    $passworder='Password is required';
                }
                else
                {
                    $password = $_POST['password'];
                    $select = " SELECT * FROM login WHERE USERNAME = '$name' || EMAIL = '$email' ";
                    $result = mysqli_query($conn,$select);
                    if(mysqli_num_rows($result)>0)
                    {
                        $error[]='User already exist!';
                    }
                    else
                    {
                        $status='Online';
                        $uniqueid=rand(time(),1000000000);

                        $sql1="INSERT INTO login(UNIQUE_ID,USERNAME,EMAIL,PASSWORD,STATUS) VALUES('$uniqueid','$name','$email','$password','$status')";

                        if(mysqli_query($conn,$sql1))
                        {
                            $select1="SELECT * FROM login WHERE USERNAME='$name'";
                            $result1 = mysqli_query($conn,$select1);
                            if(mysqli_num_rows($result1)>0)
                            {
                                $row1=mysqli_fetch_array($result1);
                                $_SESSION['UNIQUE_ID']=$row1['UNIQUE_ID'];
                                header('Location: users.php');
                            }
                        }
                        else
                        {
                            echo 'Error: '.mysqli_error($conn);
                        }
                    }
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
        <form id="form" class="signup-form" action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
            <h3>Signup</h3>
            <span id="error" class="error">
            <?php 
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        echo $error;
                    }
                }
            ?>
            </span>
            <i class="fas fa-user"></i>
            <input type="text" class="input" name="username" placeholder="Username" required><br>


            <i class="fa-solid fa-envelope"></i>
            <input type="email" class="input" name="email" placeholder="E-mail" required><br>


            <i class="fas fa-lock"></i>
            <input type="password" class="input" name="password" placeholder="Password" required>
            <!-- <i class="fa-solid fa-eye"></i> -->

            
            <p>Already have an account? <a href="login.php">Login here</a></p>
            <input type="submit" class="button" name="button" value="Signup"> 
        </form>
    </div>

    <script src="script.js"></script>
    <script src="signup.js"></script>

</body>
</html>
