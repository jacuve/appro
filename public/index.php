<?php
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
    open404Error();
} else {
    callController($match);
}
?>
<p>
    Estamos en modo : <?php echo $_ENV["MODE"]; ?>
<?php 
$fc = new FrontController();

?>
</p>