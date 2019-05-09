<?php

    include("config.php");
    include("classes/SitesResultsProvider.php");
    include("classes/ImageResultsProvider.php");


    //displaying the active tab
    $term = isset($_GET["term"]) ? $_GET["term"] : exit('You must enter a search term');
    $type = isset($_GET["type"]) ? $_GET["type"] : 'sites';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/btn.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <title>Welcome to Poodle</title>
</head>

<body>

    <header>
        <div class="section-search">
            <div class="logo-search">
                <a href="index.php">
                    <img src="logo.png" alt="logo">
                    <h1><span class="blue">P</span><span class="red">o</span><span class="yellow">o</span><span
                            class="blue">d</span><span class="green">l</span><span class="red">e</span></h1>
                </a>
            </div>
            <div class="input-search">
                <div id="cover">
                    <form method="GET" action="search.php">
                        <div class="td">
                            <input type="hidden" name="type" value="<?php echo $type; ?>">
                            <input type="text" name="term" value="<?php echo $term ?>">
                        </div>
                        <div class="td" id="s-cover">
                            <button type="submit">
                                <div id="s-circle"></div>
                                <span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tabs">
            <ul class="tab-list">
                <li class="<?php echo $type == 'sites' ? 'active' : '' ?>">
                    <a href='<?php echo "search.php?term=$term&type=sites"; ?>'>Sites</a>
                </li>
                <li class="<?php echo $type == 'images' ? 'active' : '' ?>">
                    <a href='<?php echo "search.php?term=$term&type=images"; ?>'>Images</a>
                </li>
            </ul>
        </div>
    </header>

    <div class="results">
        <?php
           if($type == "sites"){
            $resultsProvider = new SitesResultsProvider($con);
            $pageSize = 20;
          } else {
            $resultsProvider = new ImageResultsProvider($con);
            $pageSize = 30;
          }

            $numResults = $resultsProvider->getNumResults($term);

            echo "<p class='results-count'>$numResults results found</p>";

            echo $resultsProvider->getResultsHtml($page, $pageSize , $term);
        ?>
    </div>

    <div class="pagination">
        <div class="page-bnts">
            <div class="page-number"><span class='blue'>P</span></div>

            <?php
            $pagesToShow = 10;
            $numPages = ceil($numResults / $pageSize);
            $pagesLeft = min($pagesToShow, $numPages);
            $currentPage = $page - floor($pagesToShow / 2);

            if($currentPage < 1){
              $currentPage = 1;
            }

            if($currentPage + $pagesLeft > $numPages + 1){
              $currentPage = $numPages + 1 - $pagesLeft;
            }

            while($pagesLeft != 0 && $currentPage <= $numPages){
              if($currentPage == $page){
                echo "<div class='page-number'>
                        <span class='red'>o</span>
                        <span class='number'>$currentPage</span>
                    </div>";
              } else {
                echo "<div class='page-number'>
                        <a href='search.php?term=$term&type=$type&page=$currentPage'>
                            <span class='yellow'>o</span>
                            <span class='number'>$currentPage</span>
                        </a>
                    </div>";
              }
              $currentPage++;
              $pagesLeft--;
            }
          ?>

            <div class="page-number last">
                <span class='blue'>d</span><span class='green'>l</span><span class='red'>e</span>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

</body>

</html>