<?php

function __autoload($className) {

    if (file_exists('../controller/' . strtolower($className) . '.php')) {
        require_once('../controller/' . strtolower($className) . '.php');
    } elseif (file_exists('../system/core/' . strtolower($className) . '.php')) {
        require_once('../system/core/' . strtolower($className) . '.php');
    } elseif (file_exists('../model/' . strtolower($className) . '.php')) {
        require_once('../model/' . strtolower($className) . '.php');
    } elseif (file_exists('../service/' . strtolower($className) . '.php')) {
        require_once('../service/' . strtolower($className) . '.php');
    } elseif(file_exists('../library/' . strtolower($className) . '.php')) {
        require_once('../library/' . strtolower($className) . '.php');
    }
}