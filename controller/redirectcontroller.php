<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class RedirectController {

    /*
     * redirect url
     */
    public function indexAction() {
        
        $shortPath = $_GET['shortPath'];
        
        if (!empty($shortPath)) {
            $longUrlModel = new LongurlModel();
            $longUrl = $longUrlModel->getLongUrl($shortPath);
            
            if (!empty($longUrl)) {
                header("location:$longUrl");
            }
        }

        new View('redirect/index.php', array());
    }
}