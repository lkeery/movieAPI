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
        // Update query so that returning data
        //$query = 'SELECT * FROM ' .$this->movie_table;

        $query = 'SELECT
        m.*,
        GROUP_CONCAT(g.genre_name) AS genre_name
    FROM
        ' . $this->movie_table . ' m
    LEFT JOIN ' . $this->movie_genre_linking_table . ' link ON
        link.movies_id = m.movies_id
    LEFT JOIN ' . $this->genre_table . ' g ON
        link.genre_id = g.genre_id
    GROUP BY
        m.movies_id';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
