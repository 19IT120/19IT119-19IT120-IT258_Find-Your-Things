<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Find Your Things</title>
    <link rel="stylesheet" href="stylei.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header-logo">Find</div>
        <div class="header-list">

            <ul>
                <input type="text" name="box" placeholder="search">

                <li>
                    <a href="http://localhost/code/logout.php" id="button">LOGOUT</a>
                </li>
                <li>
                    <a href="#" id="about">ABOUT</a>
                </li>
                <li>
                    <a href="#" id="contact">CONTACT</a>
                </li>
                <li>
                    <div class="name">

                        <h2>Welcome, <?php echo $fetch_info['name'] ?></h2>
                
                    </div>
                    
                   
                </li>
                </ul>

</div>


</header>
          <!-- <div class="container">
                <div class="select-box">
                    <div class="options-container">

                        <div class="option">
                            <input type="radio" class="radio" id="science" name="category" />
                            <a href="login.html">SELL</a>

                        </div>

                        <div class="option">
                            <input type="radio" class="radio" id="art" name="category" />
                            <a href="login.html">RENT</a>
                        </div>


                    </div>

                    <div class="selected">
                        Select Category
                    </div>
                </div>
            </div>

<script src="main.js"></script> -->



</body>

</html>
