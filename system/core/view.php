<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of template
 *
 * @author yabada
 */
class View {

	public function __construct($dir, $param) {
//		$content = include_once 'view/' . $dir;
		return require_once 'view/layout.php';
	}
}
