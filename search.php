<?php
    //displaying the active tab
    $term = isset($_GET["term"]) ? $_GET["term"] : exit('You must enter a search term');
    $type = isset($_GET["type"]) ? $_GET["type"] : 'sites';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/btn.css">
    <title>Welcome to Poodle</title>
</head>
<body>

<header>
    <div class="section-search">
        <div class="logo-search">
            <a href="index.php">
                <img src="logo.png" alt="logo">
                <h1><span class="blue">P</span><span class="red">o</span><span class="yellow">o</span><span class="blue">d</span><span class="green">l</span><span class="red">e</span></h1>
            </a>
        </div>
        <div class="input-search">
            <div id="cover">
                <form method="GET" action="search.php">
                    <div class="td">
                        <input type="text" name="term">
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


</body>
</html>