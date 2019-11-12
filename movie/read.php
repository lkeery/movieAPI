<?php

// Required headers
header("Acess-Control-Allow-Origin: *");
header("Content-Type: Application/json, charset=UTF-8");

// Include database and object files
include_once '../config/database.php';
include_once '../objects/movie.php';

// Instantiate database and movie objects
$database = new Database();
$db = $database->getConnection();
$movie = new Movie($db);

$stmt = $movie->getMovies();

$num = $stmt->rowCount();

if ($num > 0) {
    $results = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $single_movie = $row;
        $results[] = $single_movie;
    }

    echo json_encode($results, JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array(
            'message' => 'No Movies Found',
        )
    );
}

?>
