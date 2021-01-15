<?php
// Por donde voy 1:23:44

//$loader = require '../vendor/autoload.php';
//$loader->addPsr4('App\\', 'src');
require '../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Controllers\FrontController;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

$router = new AltoRouter();

$router->map('GET', '/', 'FrontController#home', 'home');
$router->map('GET', '/otra/carpeta', 'FrontController#otraCarpeta');
$router->map('GET', '/producto/[i:id]', 'FrontController#producto');
$router->map('GET', '/manuales/[*:slug]/editar', 'ManualController#edit');
$router->map('POST', '/manuales/[*:slug]/editar', 'ManualController#edit');
$router->map('GET', '/manuales/[*:slug]', 'ManualController#single');
$router->map('POST', '/manuales/buscar', 'ManualController#search');


$match = $router->match();

if($match === false){
    // TODO . Implementar esta funcion
    //open404Error();
} else {
    // TODO . Implementar esta funcion
    //callController($match);
}

function open404Error()
{
    header($_SERVER['SERVER_PROTOCOL'], ' 404 Not Found');
    $controllerObject = new App\Controllers\FrontController();
    $controllerObject->error404();
}

function callController($match)
{
    list( $controller, $action ) = explode( '#', $match['target'] );
    $controller = 'App\\Controllers\\' . $controller;
    if ( method_exists($controller, $action)){
        $controllerObject = new $controller;
        call_user_func_array(array($controllerObject, $action), $match['params']);
    } else {
        open404Error();
    }
}

?>
<p>
    Estamos en modo : <?php echo $_ENV["MODE"]; ?>
<?php 
$fc = new FrontController();

?>
</p>