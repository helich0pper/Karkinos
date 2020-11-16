<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google" value="notranslate">
    <title>Karkinos</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<!-- NavBar -->
<nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg" id="mainNav">
    <div class="container"><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"
            value="Menu"><i class="fa fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link text-primary" href="../index.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="encode.php">Encode/Decode</a></li>
                <li class="nav-item"><a class="nav-link" href="encrypt.php">Encrypt/Decrypt</a></li>
                <li class="nav-item"><a class="nav-link current" href="reverse.php">Reverse Shell Handling</a></li>
                <li class="nav-item"><a class="nav-link" href="cracking.php">Crack Hashes</a></li>
            </ul>
        </div>
    </div>
</nav>
<body class="bg-dark text-white">
    <!-- Header -->
    <header>
        <div class="row p-5">
            <div class="col-md-5 col-sm-12 col-lg-5">
                <div class="container-fluid pb-3">
                    <h1 class="text-white">Reverse Shell Handling</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Main -->
    <main class="text-white">

    <div class="row justify-content-center">
        <div class="col-lg-3 mx-3">
            <h3><u>Steps to Launch Server</u></h3>
            <ol class="pl-3">
                <li><h5>Click Start Listener</h5></li>
                <li><h5>Go to the provided link</h5></li>
                <li><h5>Set up your listener</h5></li>
            </ol>
            <button type="submit" class="btn btn-outline-danger btn-block py-5" id="go">Start Listener</button>
            <button type="button" class="btn btn-outline-warning btn-block" id="shutdown">Shutdown Server</button>
            <p id="out" class="mt-4"></p>
        </div>
    </div>
    </main>

    <?php include "../includes/footer.php" ?>
<script type="text/javascript" src='../assets/js/reverse.js'></script>
</body>
</html>