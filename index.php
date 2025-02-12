<?php

    include("form.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <ul>
            <li><a href="#"> <i class="fa-regular fa-star"></i>kol form pack</a></li>
            <li>stay connected <i class="fa-brands fa-instagram"></i> <i class="fa-brands fa-twitter"></i> <i
                    class="fa-brands fa-whatsapp"></i></li>
            <li><button value="notif me">Notif me</button></li>
        </ul>
    </header>
    <section>
        <video width="100%" autoplay muted loop>
            <source src="video.mp4" type="video/mp4">
        </video>
    </section>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="for">
            <h1>contact form</h1>
            <div class="name">
                <input type="text" placeholder="Full Name" id="full_name" name="full_name">
                <input type="email" placeholder="Email address" required id="email" name="email">
            </div>
            <div class="text">
                <textarea placeholder="message" id="message" name="message"></textarea><br>
            </div>
            <div class="button">
                <button type="submit" value="send message">send message</button>
            </div>
        </div>
    </form>
    
</body>

</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_SPECIAL_CHARS);
        $message = filter_input(INPUT_POST,"message", FILTER_SANITIZE_SPECIAL_CHARS);
        $full_name = filter_input (INPUT_POST,"full_name", FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($email)){
            echo "please enter the email";
        }
        elseif (empty($message)){
            echo "please enter the message";
        }
        elseif (empty($full_name)){
            echo "please enter the  full_name";
        }else{
            try{
                $sql = "insert into user (email , message ,full_name)
                values('$email' , '$message' ,'$full_name')";
                mysqli_query($conn, $sql);
                echo"you are now regester!";
            }
            catch(mysqli_sql_exception){
                echo "invalid!";
           
            }
        }

    }
    mysqli_close($conn);
?>
