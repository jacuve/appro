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
$router->map('GET', '/manuales/[i:slug]', 'FrontController#single');

$match = $router->match();

if($match === false){
    // TODO . Implementar esta funcion
    //open404Error();
} else {
    // TODO . Implementar esta funcion
    //callController($match);
}
?>
<p>
    Estamos en modo : <?php echo $_ENV["MODE"]; ?>
<?php 
$fc = new FrontController();

?>
</p>