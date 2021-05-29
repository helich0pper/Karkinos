<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google" value="notranslate">
    <title>Karkinos</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
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
                <li class="nav-item"><a class="nav-link current" href="#">Modules</a></li>
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
                    <h1 class="text-white">Modules</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Main -->
    <main class="text-white">

    <div class="row justify-content-center">
        <div class="col-lg-3 mx-3">
            <h3><u>Available Modules</u></h3>
            <div class="mb-5">
                <button type="submit" class="btn btn-outline-primary btn-block py-3" id="reverse">Reverse Shell Handling</button>
                <button type="submit" class="btn btn-outline-primary btn-block py-3" id="busting">Directory and File Busting</button>
                <button type="submit" class="btn btn-outline-primary btn-block py-3" id="port">Port Scanning</button>
                <button type="submit" class="btn btn-outline-light btn-block py-3"><i class="fas fa-hourglass-half"></i> More soon...</button>
            </div>
        </div>
    </div>
    </main>

    <?php include "../includes/footer.php" ?>
<script type="text/javascript" src='../assets/js/modules.js'></script>
</body>
</html>
