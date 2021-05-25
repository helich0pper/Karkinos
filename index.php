<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Karkinos</title>
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body id="page-top">
    <div class="wrapper container">
    <header class="masthead" style="background-color:black;">
        <div class="intro-body">
            <div id="header" class="mt-5">
                <img src="assets/img/karkinos.png" width="30%"> 
                <div class="container">
                    <div class="row">
                        <div class="col-md mx-auto">
                            <h1 class="brand-heading" id="title">Karkinos</h1>
                            <p class="intro-text" id="sub-title">A swiss army knife</p>
			            </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="container-fluid mb-5">
                        <button id="scroller" class="btn btn-link btn-circle" role="button" href="#menu"><i class="fa fa-angle-double-down animated"></i></button>
                    </div>
                    <div class="col-md mx-auto pt-5" id="menu">
                            <a class="btn btn-primary btn-lg btn-default m-2 py-4 px-4" href="php/encode.php">Encode / Decode</span></a>
                            <a class="btn btn-primary btn-lg btn-default m-2 py-4 px-4" href="php/encrypt.php">Encrypt / Decrypt</span></a>
                            <a class="btn btn-primary btn-lg btn-default m-2 py-4 px-4" href="php/modules.php">Modules</span></a>
                            <a class="btn btn-primary btn-lg btn-default m-2 py-4 px-4" href="php/cracking.php">Crack / Generate Hashes</span></a>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-7 mx-auto pt-5">
                    <h1 class="letter-space">Stats</h1>
                    <hr style="background-color:white;" class="mb-5">
                        <canvas id="hashChart"></canvas>
                        <?php include "includes/chart.php" ?>
                        <h5 id="statMessage">No statistics to display yet.</h5>
                </div>
                <div class="col-lg-7 pt-3 mx-auto">
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" id="clear" data-target="#confirmModal">
                        Clear Stats
                    </button>
                </div>
            </div>
        </div>
    </header>

        <!-- Confirm Modal -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><b>All your stats will be reset and cannot be recovered.<b></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmReset">Yes</button>
                </div>
            </div>
        </div>
        </div>
    <footer>
        <?php include "includes/footer.php" ?>
    </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
</body>

</html>
