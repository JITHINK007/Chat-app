<?php 
    include 'config/database.php';
    session_start();
    $nameer='';
    if(!isset($_SESSION['UNIQUE_ID']))
    {
        header("Location: intro.html");
    }
    else
    {
        if(isset($_POST['button']))
        {
            if(empty($_POST['message']))
            {
                $nameer='Username is required';
            }
            else
            {
                $outgoing_id = $_SESSION['UNIQUE_ID'];
                $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
                $message = mysqli_real_escape_string($conn, $_POST['message']);
                $sql1 = mysqli_query($conn, "INSERT INTO messages(incoming_msg_id, outgoing_msg_id, msg) 
                                            VALUES({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
                // if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
                // {
                //     echo "Uploaded";
                // }
                // else{
                //     echo "error";
                // }
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
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="user.css">
    <title>Chat(a)Rena</title>
</head>
<body>


<div class="container">
<div class="wrapper1">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            include_once "config/database.php";
            $sql = mysqli_query($conn, "SELECT * FROM login WHERE UNIQUE_ID = {$_SESSION['UNIQUE_ID']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <!-- <img src="php/images/
          <?php 
          // echo $row['img']; 
          ?>
          " alt=""> -->
          <div class="details">
            <span><?php echo $row['USERNAME']; ?></span>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['UNIQUE_ID']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
</div>

  <script src="users.js"></script>


    <div class="wrapper">
        <section class="chat-page">
            <header>
                <?php 
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql="SELECT * FROM login WHERE UNIQUE_ID = {$user_id}";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0)
                    {
                        $row=mysqli_fetch_assoc($result);
                    }
                    else{
                        header("location: users.php");
                    }
                    echo $nameer;
                ?>
                    <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="img/profile.avif" alt="">
                    
                    <div class="details">
                        <span><?php echo $row['USERNAME']; ?></span>
                        <p><?php echo $row['STATUS']; ?></p>
                    </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="typing-area"  method="POST" enctype="multipart/form-data">
            <!-- <label class="custom-file-upload">
                <input type="file" name="image">
                <i class="fa-solid fa-paperclip"></i>
            </label> -->
                <!-- <input type="file" class="file" name="file"> -->
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                <input class="input-field" name="message" type="text" placeholder="Type a message...">
                <button type="submit" class="button" name="button"><i class="fab fa-telegram-plane"></i></button>
                <!-- <input type="submit" name="button" class="button" value="." required> -->
            </form>
        </section>        
    </div>
    
    <script src="chat.js"></script>

    </div>
    <footer>
	<div class="footer_socials">
		<a href="https://www.youtube.com/" target="blank"><i class="uil uil-youtube"></i></a>
		<a href="https://github.com/Aravindhs005" target="blank"><i class="uil uil-github"></i></a>
		<a href="https://en.wikipedia.org/wiki/Facebook" target="blank"><i class="uil uil-facebook-f"></i></a>
		<a href="https://twitter.com/login?lang=en" target="blank"><i class="uil uil-twitter"></i></a>
		<a href="https://www.linkedin.com/" target="blank"><i class="uil uil-linkedin"></i></a>
	</div>
	<div class="container footer_container">
		<article>
			<h4>Categories</h4>
			<ul>
				<li><a href="" class="category_button">Art</a></li>
				<li><a href="" class="category_button">Science</a></li>
				<li><a href="" class="category_button">Class</a></li>
				<li><a href="" class="category_button">S&H</a></li>
				<li><a href="" class="category_button">Event</a></li>
				<li><a href="" class="category_button">CC</a></li>
			</ul>	
		</article>
		<article>
			<h4>Support</h4>
			<ul>
				<li><a href="" class="category_button">Online</a></li>
				<li><a href="" class="category_button">Numbers</a></li>
				<li><a href="" class="category_button">Email</a></li>
				<li><a href="" class="category_button">Social media</a></li>
				<li><a href="" class="category_button">Location</a></li>
			</ul>	
		</article>
		<article>
			<h4>Blog</h4>
			<ul>
				<li><a href="" class="category_button">Recent</a></li>
				<li><a href="" class="category_button">Featured</a></li>
				<li><a href="" class="category_button">Popular</a></li>
				<li><a href="" class="category_button">Home</a></li>
			</ul>	
		</article>
		<article>
			<h4>Links</h4>
			<ul>
				<li><a href="" class="category_button">Blog</a></li>
				<li><a href="" class="category_button">About</a></li>
				<li><a href="" class="category_button">Services</a></li>
				<li><a href="" class="category_button">Contact</a></li>
				<li><a href="" class="category_button">Sigin</a></li>
			</ul>	
		</article>
	</div>
	<div class="footer_copyright">
		<small>Copyright &copy; KEC BLOGS</small>
	</div>
</footer>
    
</body>
</html>