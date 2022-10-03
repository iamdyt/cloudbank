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
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Transaction Detail
        </div>
        <div class="right">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#DialogBasic">
                <ion-icon name="trash-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- Dialog Basic -->
    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                </div>
                <div class="modal-body">
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">CANCEL</a>
                        <a href="#" class="btn btn-text-primary" data-bs-dismiss="modal">DELETE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Basic -->

    <!-- App Capsule -->
    <div id="appCapsule" class="full-height">

        <div class="section mt-2 mb-2">


            <div class="listed-detail mt-3">
                <div class="icon-wrapper">
                    <div class="iconbox">
                        <ion-icon name="arrow-forward-outline"></ion-icon>
                    </div>
                </div>
                <h3 class="text-center mt-2">Payment Sent</h3>
            </div>

            <ul class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status</strong>
                    <span class="text-success">Success</span>
                </li>
                <li>
                    <strong>To</strong>
                    <span><?= $_GET['recipient'] ?: 'N/A' ?></span>
                </li>
                <li>
                    <strong>Bank Name</strong>
                    <span><?= $_GET['bank'] ?: 'N/A' ?></span>
                </li>
     
                <li>
                    <strong>Receipt</strong>
                    <span>Yes</span>
                </li>
                <li>
                    <strong>Date</strong>
                    <span><?=date('Y-m-d H:i:s') ?></span>
                </li>
                <li>
                    <strong>Amount</strong>
                    <h3 class="m-0">N<?= $_GET['amount'] ?: 0 ?> </h3>
                </li>
            </ul>


        </div>

    </div>
    <!-- * App Capsule -->


    <?php require_once "./include/script.php" ; ?>


</body>

</html>