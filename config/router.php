<?php

return array(
        array(
            'url' => 'shorten',
            'controller' => 'shorten',
            'action' => 'index',
            'params' => array(),
        ),
        array(
            'url' => '([0-9a-zA-Z]+)',
            'controller' => 'redirect',
            'action' => 'index',
            'params' => array('shortPath')
        )
    );

