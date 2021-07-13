<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>News App</title>
    <link rel="stylesheet" href="light.css" id="theme-css" type="text/css">
</head>
<body>
    <?php
        if (isset($_POST["search"])){
            $country_code = $_POST["search"];
        } else {
            $country_code = "in";
        }
    ?>
    <?php
        $url = "https://newsapi.org/v2/top-headlines?country=$country_code&apiKey=8cc69174df324365af88c355c935404d";
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
    ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <h1>News App</h1>
            </div>
            <div class="col-md-9">
                <div data-mode="white" class="icm" id="white"><div class="t">fr</div></div>
                <div data-mode="black" class="icm" id="black"><div class="t">fr</div></div>
            </div>
        </div>

    </div>
    <br>
    <form action="" method="POST" id="form">
        <input type="text" name="search" id="search" class="form-control" placeholder="Type The Country Code To Search">
        <input type="submit" value="Search" class="btn btn-primary" id="sub">
    </form>
    <div class="container-fluid" id="main">
        <?php
            foreach ($NewsData->articles as $News) {

        ?>
                <div class="row NewsGrid">
                    <div class="col-md-3">
                        <img src="<?php echo $News->urlToImage; ?>" class="rounded" alt="">
                    </div>
                    <div class="col-md-9">
                        <h2>Title: <a href="<?php echo $News->url ?>"><?php echo $News->title ?></a></h2>
                        <h5>Description: <?php echo $News->description ?> </h5>
                        <p>Content: <?php echo $News->content ?></p>
                        <h6>Author: <?php echo $News->author ?></h6>
                        <h6>Published: <?php echo $News->publishedAt ?></h6>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <script src="index.js" type="text/javascript"></script>
</body>
</html>