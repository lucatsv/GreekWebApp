<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="utf-8">
    <title>Loukianos Taverna - Greek Restaurante - ADMIN</title>
    <meta name="description" content="Loukianos Taverna - Greek Restaurant">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/menuControl.js"></script>
    <script src="js/login.js"></script> 
    <script src="js/formValidation.js"></script>
    <script src="js/nutritionguide.js"></script>
    
</head>
</head>
<body>
    <div id="home">
      <div class="container-fluid">
        <div class="jumbotron white text-center">
            <h1>Meet our specialities</h1>
            <?php
                require 'php/specialities.php';
                specialities('dinner'); 
            ?> 
        </div>
      </div>
    </div>
    
    
    <div id="nutrition-guide"></div>
</body>
</html>