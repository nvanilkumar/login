<?php

//To get the movie name form the given string 
function get_movie_name($movie_name) {
    //$text = explode(' ', $movie_name);
    $text = explode(' Telugu Full Movie', $movie_name);
    return $text[0];
}
