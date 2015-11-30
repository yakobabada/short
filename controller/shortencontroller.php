<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ShortenController {

    /*
     * Shorten url
     */
    public function indexAction() {
        $shortUrl = '';
        if ($_POST) {
            $shortenUrl = new ShortenModel();
            $shortUrl = $shortenUrl->create($_POST['longUrl']);

        }
        // $this->model->save(1);
        new View('shorten/index.php', array('shortUrl' => $shortUrl));
    }
}