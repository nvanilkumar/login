<?php

//To get the movie name form the given string 
function get_movie_name($movie_name) {
    //$text = explode(' ', $movie_name);
    //check the compare string for each youtube playlist id
    $text = explode(' Telugu Full', $movie_name);
//    d($text);
    return $text[0];
}
