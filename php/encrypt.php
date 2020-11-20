<html>
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Karkinos</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
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
                <li class="nav-item"><a class="nav-link current" href="#">Encrypt/Decrypt</a></li>
                <li class="nav-item"><a class="nav-link" href="reverse.php">Reverse Shell Handling</a></li>
                <li class="nav-item"><a class="nav-link" href="cracking.php">Crack Hashes</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Body -->
<body class="bg-dark">
    <!-- Header -->
    <header>
        <div class="row p-5">
            <div class="col-md-5 col-sm-12 col-lg-5">
                <div class="container-fluid pb-3">
                    <h1 class="text-white">AES Encrypt / Decrypt</h1>
                </div>
                <div class="container-fluid">
                    <button class="btn btn-outline-success mr-2" id="encryptButton">Encrypt</button>
                    <button class="btn btn-outline-success mr-2" id="decryptButton">Decrypt</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
    <?php
        include "../includes/crypto.php";
        set_error_handler("warning_handler", E_WARNING);
    ?>
        <div class="container-fluid">
            <div class="container-fluid">
                <p id="errors" class="text-danger"></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-5">
                    <form onsubmit="return false" id="encrypt" class="text-white">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="data" class="font-weight-bold">Text to <span class="text-success">Encrypt</span></label>
                                <textarea class="form-control terminal pb-7" name="encryptData" id="encryptData" placeholder="Enter plain text"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="text" class="form-control terminal" name="encryptPassword" id="encryptPassword" placeholder="Key used to encrypt">
                            </div>
                            <div class="form-group">
                                <label for="iv" class="font-weight-bold">IV (optional)</label>
                                <input type="text" class="form-control terminal" name="encryptIv" id="encryptIv" placeholder="Initialization vector">
                            </div>
                        </div>
                        <input type="file" name="encryptUploadFile" id="encryptUploadFile" class="btn btn-primary btn-block">
                        <button type="reset" class="btn btn-warning mt-2 mr-2 p-2 px-3">Clear</button>
                        <button type="submit" class="btn btn-success mt-2 mr-2 p-2" name="encryptSubmit" id="encryptSubmit">Encrypt</button>
                    </form>
                    <form onsubmit="return false" id="decrypt" class="text-white d-none">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="data" class="font-weight-bold">Text to <span class="text-danger">Decrypt</span></label>
                                <textarea class="form-control terminal pb-7" name="decryptData" id="decryptData" placeholder="Enter plain text"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="text" class="form-control terminal" name="decryptPassword" id="decryptPassword" placeholder="Key to decrypt with">
                            </div>
                            <div class="form-group">
                                <label for="iv" class="font-weight-bold">IV (optional)</label>
                                <input type="text" class="form-control terminal" name="decryptIv" id="decryptIv" placeholder="Initialization vector">
                            </div>
                        </div>
                        <input type="file" name="decryptUploadFile" id="decryptUploadFile" class="btn btn-primary btn-block mt-2">
                        <button type="reset" class="btn btn-warning mt-2 mr-2 p-2 px-3">Clear</button>
                        <button type="submit" class="btn btn-danger mt-2 mr-2 p-2" name="decryptSubmit" id="decryptSubmit">Decrypt</button>
                    </form>
                </div>
                <div class="col-md-5 col-lg-5">
                    <form class="text-white">
                        <div class="form-group">
                            <label for="out" class="font-weight-bold">Output</label>
                            <textarea class="form-control terminal pb-7" name="out" id="out" placeholder="Output will display here"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-light btn-block" onclick="copy()">Copy to clipboard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
        
    <!-- Footer -->
    <?php include "../includes/footer.php" ?>
    <script type="text/javascript" charset="UTF-8" src='../assets/js/encrypt.js'></script>
</body>

</html>
