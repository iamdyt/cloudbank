<!doctype html>
<html lang="en">

<head>
    <?php require_once "./include/style.php" ; ?>
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Verification
        </div>
        <div class="right"> </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section">
            <div class="splash-page mt-5 mb-5">

                <div class="transfer-verification">
                    <div class="transfer-amount">
                        <span class="caption">Amount</span>
                        <h2>N <?= $_GET['amount'] ?></h2>
                    </div>
                    <div class="from-to-block mb-5">
                        <div class="item text-start">
                            <img src="./assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w48">
                            <strong>FROM</strong>
                        </div>
                        <div class="item text-end">
                            <img src="assets/img/sample/avatar/avatar4.jpg" alt="avatar" class="imaged w48">
                            <strong>TO</strong>
                        </div>
                        <div class="arrow"></div>
                    </div>
                </div>
                <h2 class="mb-2 mt-2">Verify the Transaction</h2>
                <p>
                    You are sending <strong class="text-primary">N <?= $_GET['amount'] ?></strong> to <?= $_GET['recipient'] ?> <br>Are you sure?
                </p>
            </div>
        </div>

        <div class="fixed-bar">
            <div class="row">
                <div class="col-6">
                    <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-lg btn-outline-secondary btn-block">Cancel</a>
                </div>
                <div class="col-6">
                    <a href="./receipt.php?amount=<?= $_GET['amount'] ?>&recipient=<?= $_GET['recipient'] ?>&bank=<?= $_GET['bank'] ?>" class="btn btn-lg btn-primary btn-block">Confirm</a>
                </div>
            </div>
        </div>

    </div>
    <?php require_once "./include/script.php" ; ?>


</body>

</html>