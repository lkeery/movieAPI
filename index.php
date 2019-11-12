<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies API</title>
</head>
<body>
    <h1>Movies API</h1>
    <p>An API for movies.</p>

    <?php 
    include('./config/database.php');

    $database = new Database();
    $db = $database->getConnection();

    var_dump($db);
    ?>
    
</body>
</html>