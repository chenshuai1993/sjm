<?php

// map homepage
$router->map( 'GET', '/', function() {
    echo 'hello world!';
});

// map user details page
$router->map( 'GET', '/user/[i:id]', function( $id ) {
    echo $id;
});

//// map user details page
//$router->map( 'GET', '/home/[a:action]', function( $action ) {
//    echo $action;
//});

$router->map('GET', '/home/showAll', 'Home@showAll');

$router->map('GET', '/home/show', 'Home@show');

$router->map('GET|POST', '/home/add', 'Home@add');

$router->map('GET|POST', '/home/submit', 'Home@submit');

$router->map('GET|POST', '/home/del', 'Home@delete');