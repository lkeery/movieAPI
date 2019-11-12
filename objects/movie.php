<?php
class Movie
{
    private $conn;

    public $movie_table = 'tbl_movies';
    public $genre_table = 'tbl_genre';
    public $movie_genre_linking_table = 'tbl_mov_genre';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getMovies()
    {
        $query = 'SELECT * FROM ' .$this->movie_table;
        
        

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
