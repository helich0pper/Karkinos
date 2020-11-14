<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
                <li class="nav-item"><a class="nav-link" href="reverse.php">Reverse Shell Handling</a></li>
                <li class="nav-item"><a class="nav-link current" href="cracking.php">Crack Hashes</a></li>
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
                    <h1 class="text-white">Crack Hashes</h1>
                </div>
                <div class="container-fluid">
                    <button class="btn btn-outline-success mr-2" id="crackButton">Crack Hash</button>
                    <button class="btn btn-outline-success mr-2" id="hashButton">Convert to Hash</button>
                </div>
            </div>
        </div>
    </header>
    <!-- Main -->
    <main class="text-white">
    <div class="container-fluid">
    <div class="row p-2">
        <!-- Crack -->
        <div class="col-md-9 col-lg-9 ml-5" id="crackForm">
            <form onsubmit="return false">
                <div class="form-group">
                    <p class="text-white">Suported hashes: <span class="text-info">MD5 | SHA1 | SHA256 | SHA512</span></p>
                    <p class="text-white">Paste hashes seperated by a <span class="text-warning">comma</span>:</p>
                    <textarea class="terminal form-control" rows="10" id="crackHashes" name="crackHashes" placeholder="Crack hashes"></textarea>
                </div>
                <div class="form-check pb-3">
                    <input type="checkbox" class="form-check-input" id="merge" name="merge">
                    <label class="form-check-label" for="merge" id="mergeLabel">Merge duplicate hashes</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block" id="crack">Crack</button>
                    <button type="reset" class="btn btn-warning btn-block">Clear</button>
                    <p id="loading"></p>
                </div>
            </form>
            <table class="table table-dark" id="out"> 
                <thead>
                    <tr>
                        <th scope="col" >Hash</th>
                        <th scope="col">Type</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- Convert -->
        <div class="col-md-9 col-lg-9 ml-5 d-none" id="hashForm">
            <div class="form-group">
                        <p class="text-white">Paste values seperated by a <span class="text-warning">space</span>:</p>
                        <textarea class="terminal form-control" rows="10" id="hashHashes" name="hashHashes" placeholder="Hash strings"></textarea>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hashMethod" id="md5" value="md5" checked="checked">
                        <label class="form-check-label" for="md5">MD5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hashMethod" id="sha1" value="sha1">
                        <label class="form-check-label" for="sha1">SHA1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hashMethod" id="sha256" value="sha256">
                        <label class="form-check-label" for="sha256">SHA256</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="hashMethod" id="sha512" value="sha512">
                        <label class="form-check-label" for="sha512">SHA512</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" id="hash">Convert</button>
                        <button type="reset" class="btn btn-warning btn-block">Clear</button>
                        <p id="loading"></p>
                    </div>
                    <table class="table table-dark" id="outHashes"> 
                        <thead>
                            <tr>
                                <th scope="col" >String</th>
                                <th scope="col">Type</th>
                                <th scope="col">Hash</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
    </div>
    </div>
    </main>

    <?php include "../includes/footer.php" ?>
<script type="text/javascript" charset="UTF-8" src='../assets/js/cracking.js'></script>
</body>
</html>