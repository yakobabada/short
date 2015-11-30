<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service
 *
 * @author yabada
 */
class Service {
    
    public function __construct() {
        
        $con = mysql_connect(LOCALHOST, USERNAME, PASSWORD);
        
        if (!$con) {
            die(mysql_error() + "error connection");
        }
        
        mysql_select_db(DB);
    }
}
