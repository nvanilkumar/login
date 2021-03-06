<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class playlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->view_dir = strtolower(__CLASS__) . '/';
        $this->load->helper('movie_insert');
        $this->load->library('moviedetails');
    }

    public function index() {
        d(current_date_time);
        e('test');
    }

    public function insert_lists() {
//        $list_id = 'VnCEiQqNkQrbVPQau0Z9kKcX3ZyKym8u';
        $list_id = 'PLXBHKlMRm_yz539EDhiJro68WohNTCUnj';
        $ply_where = array('utm_playlist_details_youtube_id' => $list_id);
        $playlist_data = $this->admin_model->allRecords_where('utm_playlist_details', $ply_where);
        $json_string = 'https://gdata.youtube.com/feeds/api/playlists/' . $list_id . '?v=2&alt=json';
        $jsondata = file_get_contents($json_string);
        $obj = json_decode($jsondata, true);
        $playlistid = $obj['feed']['yt$playlistId']['$t'];
        $obj = $obj['feed']['entry'];
        $i = 0;
        $movies_info = array();
        if (count($playlist_data) == 0) {//New Playlist Youtube ID
            foreach ($obj as $movie) {
//d($movie);
                $movies_info[$i]['movie_name'] = get_movie_name($movie['title']['$t']);
                $movies_info[$i]['description'] = $movie['media$group']['media$description']['$t'];
                $movies_info[$i]['video_url'] = $movie['link'][0]['href'];

                $cast_details = $movie['media$group']['media$credit'];
                foreach ($cast_details as $cast) {
                    if (array_search('Director', $cast) == 'role') {
                        $movies_info[$i]['director'] = $cast['$t'];
                    } else if (array_search('Writer', $cast) == 'role') {
                        $movies_info[$i]['writer'] = $cast['$t'];
                    } else if (array_search('Producer', $cast) == 'role') {
                        $movies_info[$i]['producer'] = $cast['$t'];
                    }
                }

                //check in the wikipedia movie db with movie name
                $movie_where = array('utm_movie_title' => $movies_info[$i]['movie_name']);
                $wiki_movie_data = $this->admin_model->allRecords_where('utm_movie', $movie_where);
                if (count($wiki_movie_data) == 1) { //exact match in the db
                    $movies_info[$i]['release_date'] = $wiki_movie_data[0]->utm_movie_release_date;
                    $movies_info[$i]['year'] = $wiki_movie_data[0]->utm_movie_year;
                    $movies_info[$i]['description'] = $movies_info[$i]['description'] . ' -----' . $wiki_movie_data[0]->utm_movie_cast;
                    $movies_info[$i]['genre'] = $wiki_movie_data[0]->utm_movie_genre;
                    $movies_info[$i]['wiki_url'] = $wiki_movie_data[0]->utm_movie_url;
                    
                } else{//no match found && we need to handle this case more than 1 movie records are found
                    $movies_info[$i]['release_date'] = "";
                    $movies_info[$i]['year'] = "";
                    $movies_info[$i]['description'] = $movies_info[$i]['description'];
                    $movies_info[$i]['genre']  = "";
                    $movies_info[$i]['wiki_url']  = "";
                   echo '<br/> NO Match found in Wiki db or more than one record exist in db'.$movies_info[$i]['movie_name'];  
                }  
//               e($movies_info[$i]) ; 
                $this->moviedetails->insert_movie($movies_info[$i]);

               // d('end of one movie '. $movies_info[$i]['movie_name'].'<br/>');
                $i++;
            }//e($movies_info);
        } else {//Old Playlist Youtube ID
        }//endo of playlist loop    
    }

    public function check() {
        if ($this->input->post('submit')) {
            insert_movie();
            e();
        }
        $data = array();
        $data['content'] = $this->load->view($this->view_dir . 'test', $data, TRUE);
        $this->load->view('admin_template', $data);
    }

}
