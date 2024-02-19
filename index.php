<?php
session_start();

use Controller\AdminController;
use Controller\CartController;
use Controller\ProductController;

define('host', 'http://localhost/week13/ecommerce-mvc/');
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecommerce-mvc' . DIRECTORY_SEPARATOR);

require './vendor/autoload.php';

function debug($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

$class = isset($_GET['class']) ? $_GET['class'] : 'AdminController';
$method = isset($_GET['method']) ? $_GET['method'] . 'Action' : 'adminProductListAction';

switch ($class) {
    case 'AdminController':
        $c = new AdminController();
        break;
    case 'CartController':
        $c = new CartController();
        break;
    case 'ProductController':
        $c = new ProductController();
        break;
    default:
        $c = new AdminController();
        break;
}

$c->$method();
die;