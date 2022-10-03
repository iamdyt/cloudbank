<?php 
    session_start(); 
    require_once "./services/database.php";
    isLoggedIn();
?>
<!doctype html>
<html lang="en">

<head>
    <?php require_once "./include/style.php" ; ?>
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
            <h1>Forgot password</h1>
            <h4>Type your e-mail to reset your password</h4>
        </div>
        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-warning"> <?=$_SESSION['message']?> </div>
        <?php } ?>

        <div class="section mb-5 p-2">
            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="card">
                    <div class="card-body pb-1">

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" name="email"  required class="form-control" id="email1" placeholder="Your e-mail">
                                <input type="password" name="password"  required class="form-control" id="email1" placeholder="New Password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Reset Password</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
    <?php require_once "./include/script.php" ; ?>


</body>

</html>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

       
        $email = postData('email');
        $encryptedPass = password_hash(postData('password'), null);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = ExecuteQuery($query);
        $result = $result->fetch_object();
    //    var_dump($result); exit;
        if(!@is_null($result->email)){
            $query = "UPDATE users SET password = '$encryptedPass' WHERE email = '$email'";
            ExecuteQuery($query);
            unset($_SESSION['message']);
            $_SESSION['message'] = 'Password Updated';
            exit;
        }
        unset($_SESSION['message']);
        $_SESSION['message'] = 'Invalid Credentials';

    }
?>