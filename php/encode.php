<html>
<!-- Head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
                <li class="nav-item"><a class="nav-link current" href="#">Encode/Decode</a></li>
                <li class="nav-item"><a class="nav-link" href="encrypt.php">Encrypt/Decrypt</a></li>
                <li class="nav-item"><a class="nav-link" href="modules.php">Modules</a></li>
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
                    <h1 class="text-white">Encode / Decode</h1>
                </div>
                <div class="container-fluid">
                    <a class="btn btn-outline-success mr-2" href="#base64" role="button">Base64</a>
                    <a class="btn btn-outline-success mr-2" href="#hex" role="button">Hex</a>
                    <a class="btn btn-outline-success mr-2" href="#uri" role="button">URI</a>
                    <a class="btn btn-outline-success mr-2" href="#rot13" role="button">ROT13</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <main>
        <?php 
            $types = array("Base64", "URI", "Hex", "ROT13");
            foreach($types as $i){
                $id = strtolower($i);
                $encodeId = $id . "-encode";
                $decodeId = $id . "-decode";
                $outputId = $id . "-output";
                $inputId = $id . "-input";
        ?>
        <div class="row p-5 bg-dark view text-white" id="<?= $id ?>">
            <!-- Column Main -->
                <div class="col-md-2 col-sm-10 col-lg-2">
                    <h1><?= $i ?></h1>
                    <button type="button" class="btn btn-outline-success btn-block" onclick="encodeDisplay(this)">Encode</button>
                    <button type="button" class="btn btn-outline-danger btn-block" onclick="decodeDisplay(this)">Decode</button><br>
                    <a href="#" class="btn btn-outline-primary btn-block">Top</a>
                </div>  
            <!-- Column Encode -->
                <div class="col-md-4 col-sm-11 col-lg-4 flex-d"  id="<?= $encodeId ?>">
                    <div class="container-fluid d-flex flex-column">
                        <form onsubmit="encode(this);return false;">
                            <div class="form-group">
                            <label for="encode-value" class="font-weight-bold">
                                    Value to <span class="text-success">encode</span>:
                                </label>
                                <textarea class="form-control terminal pb-6" placeholder="Enter value" id="<?= $inputId."-encode" ?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success px-5">GO</button>
                                <button type="reset" class="btn btn-outline-warning">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Column Decode -->
                <div class="col-md-4 col-sm-11 col-lg-4 flex-d hidden" id="<?= $decodeId ?>">
                    <div class="container-fluid d-flex flex-column">
                        <form onsubmit="decode(this);return false;">
                            <div class="form-group">
                                <label for="encode-value" class="font-weight-bold">
                                    Value to <span class="text-danger">decode</span>:
                                </label>
                                <textarea class="form-control terminal pb-6" placeholder="Enter value" id="<?= $inputId."-decode" ?>" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger px-5">GO</button>
                                <button type="reset" class="btn btn-outline-warning">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>  
                <!-- Column Output -->
                <div class="col-md-4 col-sm-11 col-lg-4 flex-d">
                        <div class="container-fluid d-flex flex-column">
                            <form onsubmit="copy(this);return false;">
                                <div class="form-group">
                                    <label for="encode-value" class="font-weight-bold">Output</label>
                                    <textarea class="form-control terminal pb-6" placeholder="Output will display here" id="<?= $outputId ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-light btn-block">Copy to Clipboard</button>
                                </div>
                            </form>
                        </div>
                    </div>  
        </div>
            <?php }?>
    <!-- Footer -->
    <?php include "../includes/footer.php" ?>
    <script type="text/javascript" charset="UTF-8" src='../assets/js/encode.js'></script>
</body>

</html>
