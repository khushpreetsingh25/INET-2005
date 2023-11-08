<?php
class Movie {
    private $title;
    private $picture;
    private $director;
    private $mainActor;
    private $year;
    private $genre;

    public function __construct($title, $picture, $director, $mainActor, $year, $genre) {
        $this->title = $title;
        $this->picture = $picture;
        $this->director = $director;
        $this->mainActor = $mainActor;
        $this->year = $year;
        $this->genre = $genre;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getMainActor() {
        return $this->mainActor;
    }

    public function getYear() {
        return $this->year;
    }

    public function getGenre() {
        return $this->genre;
    }
}

$movies = [];
$xml = simplexml_load_file('fav_movies.xml');

foreach ($xml->movie as $movie) {
    $title = (string)$movie->Title;
    $picture = (string)$movie->Picture;
    $director = (string)$movie->Director;
    $mainActor = (string)$movie->MainActor;
    $year = (string)$movie->Year;
    $genre = (string)$movie->Genre;

    $movies[] = new Movie($title, $picture, $director, $mainActor, $year, $genre);
}

// Display the movie data in an HTML table with rows of 3 elements
echo '<table>';
for ($i = 0; $i < count($movies); $i++) {
    if ($i % 3 == 0) {
        echo '<tr>';
    }

    echo '<td>';
    echo '<img src="' . $movies[$i]->getPicture() . '" width="100"><br>';
    echo '<h1>' . $movies[$i]->getTitle() . ' (' . $movies[$i]->getYear() . ')</h1><br>';
    echo 'Director: ' . $movies[$i]->getDirector() . '<br>';
    echo 'Main Actor/Actress: ' . $movies[$i]->getMainActor() . '<br>';
    echo 'Genre: ' . $movies[$i]->getGenre() . '<br>';
    echo '</td>';

    if (($i + 1) % 3 == 0 || $i == count($movies) - 1) {
        echo '</tr>';
    }
}
echo '</table>';
?>
