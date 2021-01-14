<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createInmutable('../');
$dotenv->load();
?>
<p>
    Estamos en <?php $_ENV["MODE"]; ?>
</p>
