<?php
    include 'config/database.php';
    $name=$email=$message='';

    if(isset($_POST['button']))
    {
        if(empty($_POST['name']))
        {
            
        }
        else
        {
            $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
            if(empty($_POST['email']))
            {
                
            }
            else
            {
                $email= filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
                if(empty($_POST['message']))
                {
                    
                }
                else
                {
                    $message= filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);

                    $sql="INSERT INTO contact(NAME,EMAIL,MESSAGE) VALUES('$name','$email','$message')";

                        if(mysqli_query($conn,$sql))
                        {
                            $select="SELECT * FROM contact WHERE NAME='$name'";
                            $result = mysqli_query($conn,$select);
                            if(mysqli_num_rows($result)>0)
                            {
                                echo 'connected';
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
    <link rel="stylesheet" href="contact.css">

</head>
<body>
    <div class="contact">
        <header id="header">
    		<a href="#" class="logo">CaR</a>
		    <div class="toggle"></div>
		    <ul class="navigation">
			    <li><a href="intro.html">Home</a></li>
			    <li><a href="#sec">Explore</a></li>
			    <li><a href="#" class="active">Contact Us</a></li>
		    </ul>
	    </header>
        <div class="content">
            <h2>Contact Us</h2>
            <p>Want to get in touch? We'd love to here from you. Here's how you can reach us...</p>
        </div>
        <div class="container">
            <div class="contact-info">
                <div class="box">
                    <div class="icons">
                    <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>KEC,<br>Perundurat,<br>Erode-638052</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                    <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="text">
                        <h3>E-mail</h3>
                        <p>jithink.21it@kongu.edu,<br>aravindhs.21it@kongu.edu</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icons">
                    <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>8667252654</p>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2>Send Message</h2>
                    <div class="input-box">
                        <input type="text" name="name" required>
                        <span>Name</span>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" required>
                        <span>E-mail</span>
                    </div>
                    <div class="input-box">
                        <textarea name="message" rows="5" required></textarea>
                        <span>Typer your message here...</span>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="button" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>