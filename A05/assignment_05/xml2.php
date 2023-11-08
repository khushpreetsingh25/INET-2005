<?php
$xml = simplexml_load_file('fav_movies.xml');

echo '<table>';
foreach ($xml->movie as $movie) {
    echo '<tr>';
    echo '<td><img src="' . $movie->Picture . '" width="100"></td>';
    echo '<td><h1>' . $movie->Title . ' (' . $movie->Year . ')</h1></td>';
    echo '<td>Director: ' . $movie->Director . '</td>';
    echo '<td>Main Actor/Actress: ' . $movie->MainActor . '</td>';
    echo '<td>Genre: ' . $movie->Genre . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
