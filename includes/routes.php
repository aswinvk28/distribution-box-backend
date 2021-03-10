<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$routes = array(
    '/' => array(
        'callable' => 'page_get_home',
        'variables' => array(
            'page' => array('content' => array(), 'section_name' => '')
        )
    ),
    'distros/save-diagram' => array(
        'callable' => 'page_post_distros_save',
        'variables' => array(
            'page' => array('content' => array(), 'sidebar' => array(), 'message' => '')
        ),
        'method' => 'POST',
        'headers' => array(
            'Content-Type: application/json',
            'Access-Control-Allow-Origin: ' . $_SERVER['SERVER_NAME']
        )
    )
);