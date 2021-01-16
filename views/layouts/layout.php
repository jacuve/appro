<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $mainTitle;?></title>
        <link rel="stylesheet" href="/assets/styles.css">
    </head>
    <body>
        
        <header>
            <img src="/assets/images/logo.svg" alt="logo" />
        </header>
        
        <?= $this->section('content') ?>
        
        <footer>
            Copyright ...
            <?= $this->section('footerLinks'); ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <?= $this->section('footerJs'); ?>
        
    </body>
</html>