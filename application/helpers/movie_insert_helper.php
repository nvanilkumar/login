<?php

// first chek if funciton is already exists or not
if (!function_exists('insert_movie')) {

    //  Check the movie name speratior for each playlist
    //
	function insert_movie($movies_info = NULL) {
        e($movies_info);
        if ($this->input->post('submit') == 'submit') {//for post the data
        } else {// from utube programe
            //check the movie in the database
            $film_where = array('utm_film_title' => $movies_info['movie_name']);
            $film_count = $this->admin_model->allRecords_where('utm_film', $film_where);
            if (count($film_count) == 0) {//film not found in our db
                $film_data = array('utm_film_title' => $movies_info['movie_name'],
                    'utm_film_wiki_url' => $movies_info['wiki_url'],
                    'utm_film_description' => $movies_info['description'],
                    'utm_film_release_year' => $movies_info['year'],
                    'utm_film_release_date' => $movies_info['release_date'],
                    'utm_film_awards_info' => '',
                    'utm_film_language' => 'Telugu',
                    'utm_film_created_by' => 'MAK',
                    'utm_film_created_date' => current_date_time,
                    'utm_film_updated_by' => 'MAK');
                $film_id = $this->admin_model->insert('utm_film', $film_data);

                //Insert Genres Information
                insert_genre_information($movies_info['genre'], $film_id);

                //Film Cast & crew Info
                insert_cast_crew($movies_info['director'], 'director', $film_id);
                insert_cast_crew($movies_info['writer'], 'writer', $film_id);
                insert_cast_crew($movies_info['producer'], 'producer', $film_id);

                //video information
                insert_video_information($movies_info['video_url'], $film_id);
            } else { //film already exist in our db
            }
        }


        //e($movies_info);
    }

}

//To Insert the video url details realted to film

function insert_video_information() {
    $video_data = array('utm_film_title' => $movies_info['movie_name'],
        'utm_film_wiki_url' => $movies_info['wiki_url'],
        'utm_film_description' => $movies_info['description'],
        'utm_film_release_year' => $movies_info['year'],
        'utm_film_release_date' => $movies_info['release_date'],
        'utm_film_awards_info' => '',
        'utm_film_language' => 'Telugu',
        'utm_film_created_by' => 'MAK',
        'utm_film_created_date' => current_date_time,
        'utm_film_updated_by' => 'MAK');
    $film_id = $this->admin_model->insert('utm_video', $video_data);
}

//To Insert the cast & crew information
//p,f_c,f_P,
function insert_cast_crew($person_name, $role_name, $film_id) {
    //check the person exist
    $person_where = array('utm_person_name' => $person_name);
    $person_count = $this->admin_model->singleRecord_where('utm_person', $person_where);
    if (count($person_count) == 0) {//person not found in our db
        $person_data = array('utm_person_name' => $person_name,
            'utm_person_dob' => current_date_time,
            'utm_person_created_by' => 'MAK',
            'utm_person_created_date' => current_date_time,
            'utm_person_updated_by' => 'MAK');
        $person_id = $this->admin_model->insert('utm_person', $person_data);
    } else {
        $person_id = $person_count['utm_person_id'];
    }
    //Role details
    $role_where = array('utm_person_name' => $role_name);
    $role_details = $this->admin_model->singleRecord_where('utm_person', $role_where);
    if (count($role_details) == 1) {// Role is found in our db
        $role_id = $role_details['utm_role_id'];

        // Film - person
        $film_person_data = array('utm_film_person_id' => $person_id,
            'utm_film_person_film_id' => $film_id,
            'utm_film_person_created_by' => 'MAK',
            'utm_film_person_created_date' => current_date_time,
            'utm_film_person_updated_by' => 'MAK');
        $this->admin_model->insert('utm_film_person', $film_person_data);

        //Film  - Cast (persion, role film
        $film_cast_data = array('utm_film_cast_role_id' => $role_id,
            'utm_film_cast_people_d' => $person_id,
            'utm_film_cast_film_id' => $film_id,
            'utm_film_cast_created_by' => 'MAK',
            'utm_film_cast_created_date' => current_date_time,
            'utm_film_cast_updated_by' => 'MAK');
        $this->admin_model->insert('utm_film_cast', $film_cast_data);
    }
}

//To Insert Geners information 
function insert_genre_information($gen_data, $film_id) {
    if (str_len($gen_data) > 0) {
        $gen_key_data = explode(' / ', $gen_data); //check the genere seperation text for diff playlist ids
        $gen_ids = array();
        foreach ($gen_key_data as $name) {
            $gen_data = array('utm_genre_name' => $name);
            $gen_result = $this->admin_model->singleRecord_where('utm_genre', $gen_data);
            $gen_ids[] = $gen_result->utm_genre_id;
        }
        //insert all geners
        foreach ($gen_ids as $gen_id) {
            $film_gen_data = array('utm_film_x_genre_id' => $gen_id,
                'utm_film_x_genre_film_id' => $film_id,
                'utm_film_x_genre_created_by' => 'MAK',
                'utm_film_x_genre_created_date' => current_date_time,
                'utm_film_x_genre_updated_by' => 'MAK');
            $this->admin_model->insert('utm_film_x_genre', $film_gen_data);
        }
    }
}

//To get the movie name form the given string 
function get_movie_name($movie_name) {
    $text = explode(' ', $movie_name);
    return $text[0];
}
