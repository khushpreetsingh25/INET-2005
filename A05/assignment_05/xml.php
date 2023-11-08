<?php
$movies = [
    [
        'Title' => 'The Conjuring',
        'Picture' => '1.jpg',
        'Director' => 'James',
        'MainActor' => 'Lili Taylor',
        'IMDB' => 'https://www.imdb.com/title/tt1457767/',
        'Year' => '2013',
        'Genre' => 'Horror',
    ],
    [
        'Title' => 'The Conjuring 2',
        'Picture' => '2.jpg',
        'Director' => 'James Wan',
        'MainActor' => 'Madison Wolfe',
        'IMDB' => 'https://www.imdb.com/title/tt3065204/?ref_=tt_sims_tt_i_1',
        'Year' => '2016',
        'Genre' => 'Horror, Mystery, Thriller',
    ], [
        'Title' => 'Annabelle Creations',
        'Picture' => '3.jpg',
        'Director' => 'David F. Sandberg',
        'MainActor' => 'Marrinda Otto',
        'IMDB' => 'https://www.imdb.com/title/tt5140878/?ref_=tt_sims_tt_i_3',
        'Year' => '2017',
        'Genre' => 'Horror, Thriller',
    ], [
        'Title' => 'Annabelle',
        'Picture' => '4.jpg',
        'Director' => 'John R. Leonetti',
        'MainActor' => 'Ward Horton',
        'IMDB' => 'https://www.imdb.com/title/tt3322940/?ref_=tt_sims_tt_i_4',
        'Year' => '2014',
        'Genre' => 'Horror, Thriller',
    ], [
        'Title' => 'The Nun',
        'Picture' => '5.jpg',
        'Director' => 'Corin Hardy',
        'MainActor' => 'Demian Bichir',
        'IMDB' => 'https://www.imdb.com/title/tt5814060/?ref_=fn_al_tt_1',
        'Year' => '2018',
        'Genre' => 'Mystery, Horror, Thriller',
    ], [
        'Title' => 'LA MONJA',
        'Picture' => '6.jpg',
        'Director' => 'Luis de la Madrid',
        'MainActor' => 'Anita Briem',
        'IMDB' => 'https://www.imdb.com/title/tt0371853/?ref_=fn_al_tt_5',
        'Year' => '2005',
        'Genre' => 'Adventure, Drama, Horror',
    ], [
        'Title' => 'Gen V',
        'Picture' => '7.jpg',
        'Director' => 'Evan Goldberg, Erick Kripke, Craig Rosenberg',
        'MainActor' => 'Jaz Sinclair',
        'IMDB' => 'https://www.imdb.com/title/tt13159924/?ref_=adv_li_tt',
        'Year' => '2023',
        'Genre' => 'Action, Adventure, Comedy',
    ], [
        'Title' => 'The Boys',
        'Picture' => '8.jpg',
        'Director' => 'Erick Kripke',
        'MainActor' => 'Karl Urban',
        'IMDB' => 'https://www.imdb.com/title/tt1190634/?ref_=tt_sims_tt_i_1',
        'Year' => '2019',
        'Genre' => 'Action, Comedy, Crime',
    ], [
        'Title' => 'Stranger Things',
        'Picture' => '9.jpg',
        'Director' => 'Shawn Levy',
        'MainActor' => 'Millie Bobby Brown',
        'IMDB' => 'https://www.imdb.com/title/tt4574334/?ref_=tt_sims_tt_i_1',
        'Year' => '2016- 2025',
        'Genre' => 'Drama, Fantasy, Horror',
    ], [
        'Title' => 'Breaking Bad',
        'Picture' => '10.jpg',
        'Director' => 'Vince Gilligan',
        'MainActor' => 'Bryan Cranston',
        'IMDB' => 'https://www.imdb.com/title/tt0903747/?ref_=tt_sims_tt_i_1',
        'Year' => '2008-2013',
        'Genre' => 'Crime, Drama, Thriller',
    ],
];

$xml = new SimpleXMLElement('<movies/>');

foreach ($movies as $movie) {
    $movieElement = $xml->addChild('movie');
    foreach ($movie as $key => $value) {
        $movieElement->addChild($key, $value);
    }
}

// Save the XML to fav_movies.xml
$xml->asXML('fav_movies.xml');
?>
