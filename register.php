<!doctype html>
<html lang="en">

<head>
    <?php require_once "./include/style.php" ?>
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
            <a href="login" class="headerButton">
                Login
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account</h4>
        </div>
        <div class="section mb-5 p-2">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" required name="email" id="email1" placeholder="Your e-mail">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label">Full Name</label>
                                <input type="text" name="fullname" required class="form-control" iautocomplete="off"
                                    placeholder="Your Fullname">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" required name="password" id="password1" autocomplete="off"
                                    placeholder="Your password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                <div class="form-button-group transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->


    <?php require_once "./include/script.php" ?>
</body>

</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require_once "./services/database.php";
        $email = postData('email');
        $password = password_hash(postData('password'), null);
        $fullname = postData('fullname');
        $query = "INSERT INTO users(email, password, fullname) VALUES('$email','$password','$fullname')";
        $result =  ExecuteQuery($query);
        
        if($result){
            echo "<script> window.location.href='login.php'</script>";
        }
    }
?>