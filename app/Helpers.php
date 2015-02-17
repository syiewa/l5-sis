<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of helpers
 *
 * @author Syiewa
 */
function setActive($route, $class = 'active') {
    $exp = explode('.', $route);
    $array = array_splice($exp, 0, 2);
    $expRoute = explode('.', Route::currentRouteName());
    $arrayRoute = array_splice($expRoute, 0, 2);
    $diff = array_diff($array, $arrayRoute);
    return (count($diff) == 0) ? $class : '';
}

function formatDate($array) {
    $string = date('Y-m-d', strtotime($array));
    return $string;
}
