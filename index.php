<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Karkinos</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
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
                        <div class="col-lg-8 mx-auto">
                            <h1 class="brand-heading" id="title">Karkinos</h1>
                            <p class="intro-text" id="sub-title">A swiss army knife</p></div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="container-fluid mb-5">
                        <a class="btn btn-link btn-circle" role="button" href="#menu"><i class="fa fa-angle-double-down animated"></i></a>
                    </div>
                    <div class="col-lg-12 col-md-12 mx-auto pt-5" id="menu">
                            <a class="btn btn-primary btn-lg btn-default mx-2 py-4 px-4" href="php/encode.php">Encode/Decode</span></a>
                            <a class="btn btn-primary btn-lg btn-default mx-2 py-4 px-4" href="php/encrypt.php">Encrypt/Decrypt</span></a>
                            <a class="btn btn-primary btn-lg btn-default mx-2 py-4 px-4" href="php/reverse.php">Reverse Shell Handling</span></a>
                            <a class="btn btn-primary btn-lg btn-default mx-2 py-4 px-4" href="php/cracking.php">Crack Hashes</span></a>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-7 mx-auto">
                    <h1 class="pb-4 letter-space">Stats</h1>
                    <hr style="background-color:white;" class="mb-5">
                        <canvas id="hashChart"></canvas>
                        <?php include "includes/chart.php" ?>
                        <h5 id="statMessage">No statistics to display yet.</h5>
                </div>
            </div>
        </div>
    </header>
    <footer>
        <?php include "includes/footer.php" ?>
    </footer>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
</body>

</html>
