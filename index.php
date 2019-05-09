<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/btn.css">
    <title>Welcome to Poodle</title>
</head>

<body>

    <div class="section-main">
        <div class="logo-main">
            <img src="logo.png" alt="logo">
            <h1><span class="blue">P</span><span class="red">o</span><span class="yellow">o</span><span
                    class="blue">d</span><span class="green">l</span><span class="red">e</span></h1>
        </div>
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
</body>

</html>