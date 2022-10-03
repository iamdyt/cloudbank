<!doctype html>
<html lang="en">

<head>
    <?php 
        session_start();
        require_once "./include/style.php";
        $errorMsg = "";
    ?>
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
            <h4 class="text-danger"><?=$_GET['error'] ?: '' ?></h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" required class="form-control"name="email" placeholder="Your e-mail">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" required class="form-control" name="password" autocomplete="off"
                                    placeholder="Your password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="./register.php">Register Now</a>
                    </div>
                    <div><a href="./password_reset.php" class="text-muted">Forgot Password?</a></div>
                </div>

                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    



    <head>
    <?php require_once "./include/script.php" ?>
    </head>

</body>

</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require_once "./services/database.php";
        $email = postData('email');
        $password = postData('password');
    
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result =  ExecuteQuery($query);
        $cred = $result->fetch_object();
        if($cred){
            if(password_verify($password, $cred->password)){
            
                $_SESSION['fullname'] = $cred->fullname;
                $_SESSION['email'] = $cred->email;
    
                echo "<script>window.location.href='dashboard.php'</script>";
            }
            echo "<script>window.location.href='/login.php?error=Invalid Credentials'</script>";
        }

        echo "<script>window.location.href='/login.php?error=Invalid Credentials'</script>";

        
    }
?>