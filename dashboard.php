<?php 
    session_start();
    require_once "./services/weather.php";
    require_once "./services/database.php";
    checkSession();
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
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <p class="lead text-center text-light">Cloudbank</p>
        </div>
        <div class="right">
            <a href="#" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a>
            <!-- <a href="app-settings.html" class="headerButton">
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged w32">
                <span class="badge badge-danger">6</span>
            </a> -->
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <?php if(intval(date('H')) < 12) {  ?>
                            <p class="">Good Morning, <?=$_SESSION['email'] ?></p>
                        <?php } elseif(intval(date('H')) < 16) {  ?> 
                            <p class="">Good Afternoon, <?=$_SESSION['email'] ?></p>
                        <?php } else {?>
                            <p class="">Good Evening, <?=$_SESSION['email'] ?></p>
                        <?php } ?>
  
                        <span class="title">Total Balance</span>
                        <h1 class="total">N2,562.50</h1>
                    </div>
                    <div class="right">
                        <a href="./logout.php" class="button">
                            <ion-icon name="power-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
                <!-- Wallet Footer -->
                <div class="wallet-footer">
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawActionSheet">
                            <div class="icon-wrapper bg-danger">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            <strong>Intra-Bank Transfer</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#sendActionSheet">
                            <div class="icon-wrapper">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            <strong>Inter-Bank Transfer</strong>
                        </a>
                    </div>
                    <div class="item">
                        <a href="app-cards.html">
                            <div class="icon-wrapper bg-success">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            <strong>Cards</strong>
                        </a>
                    </div>
                </div>
                <!-- * Wallet Footer -->
            </div>
        </div>
        <!-- Wallet Card -->

        <!-- Deposit Action Sheet -->
        <!-- <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Savings (*** 5019)</option>
                                            <option value="1">Investment (*** 6212)</option>
                                            <option value="2">Mortgage (*** 5021)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addona1">$</span>
                                        <input type="text" class="form-control" placeholder="Enter an amount"
                                            value="100">
                                    </div>
                                </div>


                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- * Deposit Action Sheet -->

        <!-- Withdraw Action Sheet -->
        <div class="modal fade action-sheet" id="withdrawActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Intra-Bank Transfer</h5>
                        <small class="text-secondary text-center">CLOUD BANK TO CLOUDBANK TRANSFER (FREE TRANSFER)</small>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form method="GET" action="./transfer_details.php">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11d">To</label>
                                        <input type="number" name="recipient" required inputmode="numeric" class="form-control" id="text11d" placeholder="Recipient account number ">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11">To</label>
                                        <input type="text" class="form-control" id="text11"
                                            placeholder="Validated recipient name" readonly>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addonb1">NGN</span>
                                        <input type="text" class="form-control" name=amount placeholder="Enter an amount"
                                            value="100">
                                    </div>
                                </div>
                                <input type="hidden" name="bank" value="CloudBank">
                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Withdraw Action Sheet -->

        <!-- Send Action Sheet -->
        <div class="modal fade action-sheet" id="sendActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Inter-Bank Transfer </h5>
                        <small class="text-secondary">CLOUDBANK - OTHER BANK TRANSFER (N50 TRANSFER FEE)</small>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="./transfer_details.php" method="GET">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11">To</label>
                                        <input type="number" name="recipient" minlength="9" maxlength="10"  inputmode="numeric" class="form-control" id="text11"
                                            placeholder="Recipient account number">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account2">Select Bank</label>
                                        <select required class="form-control custom-select" name="bank" id="account2">
                                            <option value="">Choose your bank</option>
                                            <option value="GTB">Guaranty Trust Bank (GTB)</option>
                                            <option value="FBN">First Bank of Nigeria (FBN)</option>
                                            <option value="UBA">United Bank of Africa (UBA)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="text11">To</label>
                                        <input type="text" class="form-control" id="text11"
                                            placeholder="Validated recipient name" readonly>
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text" id="basic-addon1">N</span>
                                        <input type="text" name="amount" class="form-control" placeholder="Enter an amount"
                                            value="100">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"
                                        data-bs-dismiss="modal">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Send Action Sheet -->

 
        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Inflow</div>
                        <div class="value text-success">N552.95</div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Total Outflow</div>
                        <div class="value text-danger">N86.45</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->

        <!-- weather update -->
        <div class="section my-4">
            <div class="section-heading">
                <h2 class="title">Weather Update</h2>
            </div>
            <div class="row mt-2 stat-box">
                <div class="col-3">
                    <div class="">
                        <div class="title">Region</div>
                        <div class=" text-success"> <?=$weather->region?></div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="">
                        <div class="title">Time</div>
                        <div class=" text-danger"><?=$weather->currentConditions->dayhour?></div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="">
                        <div class="title">Temp</div>
                        <div class=" text-primary"><?=$weather->currentConditions->temp->c?> <sup>0</sup>C | <?=$weather->currentConditions->temp->f?> F | <?=$weather->currentConditions->humidity?></div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="">
                        <div class="title">Comment</div>
                        <div class=" text-secondary"><?=$weather->currentConditions->comment?>  </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Transactions -->
        <div class="section my-4">
            <div class="section-heading">
                <h2 class="title">Transactions</h2>
                <a href="#" class="link">View All</a>
            </div>
            <div class="transactions">
                <!-- item -->
                <a href="#" class="item">
                    <div class="detail">
                        
                        <div>
                            <strong>Jumia</strong>
                            <p>Shopping</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger"> - N150</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="#" class="item">
                    <div class="detail">
                     
                        <div>
                            <strong> Seyi Makinde</strong>
                            <p>Transfer</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger">- N29,500</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="#" class="item">
                    <div class="detail">
                        
                        <div>
                            <strong>Lanre Olanlokun</strong>
                            <p>Transfer</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-success">+ N1,000</div>
                    </div>
                </a>
                <!-- * item -->
                <!-- item -->
                <a href="#" class="item">
                    <div class="detail">
                  
                        <div>
                            <strong>MTN (SME) 5GB</strong>
                            <p>Utility</p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="price text-danger">- N2,000</div>
                    </div>
                </a>
                <!-- * item -->
            </div>
        </div>
        <!-- * Transactions -->


        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Copyright © CloudWare Tech. 2002. All Rights Reserved.
            </div>
            
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <!-- <a href="index.html" class="item active">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Overview</strong>
            </div>
        </a>
        <a href="app-pages.html" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Pages</strong>
            </div>
        </a>
        <a href="app-components.html" class="item">
            <div class="col">
                <ion-icon name="apps-outline"></ion-icon>
                <strong>Components</strong>
            </div>
        </a>
        <a href="app-cards.html" class="item">
            <div class="col">
                <ion-icon name="card-outline"></ion-icon>
                <strong>My Cards</strong>
            </div>
        </a>
        <a href="app-settings.html" class="item">
            <div class="col">
                <ion-icon name="settings-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a> -->
    </div>
    <!-- * App Bottom Menu -->


    <!-- iOS Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1"><img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your iPhone's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * iOS Add to Home Action Sheet -->


    <!-- Android Add to Home Action Sheet -->
    <div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" tabindex="-1"
        role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add to Home Screen</h5>
                    <a href="#" class="close-button" data-bs-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="action-sheet-content text-center">
                        <div class="mb-1">
                            <img src="assets/img/icon/192x192.png" alt="image" class="imaged w64 mb-2">
                        </div>
                        <div>
                            Install <strong>Finapp</strong> on your Android's home screen.
                        </div>
                        <div>
                            Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "./include/script.php" ?>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>