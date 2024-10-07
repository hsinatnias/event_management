<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to ci4-auth</title>
    <meta charset="UTF-8">
    <meta name="description" content="Example of simple auth in CodeIgniter 4 ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link href="<?= base_url('bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('jquery-ui-1.14.0/jquery-ui.css') ?>" rel="stylesheet">
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
    <script src="<?= base_url('jquery-ui-1.14.0/jquery-ui.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>" ></script>
    
    <?= $this->renderSection('head') ?>
</head>

<body>
    <div class="container">
       
    <?= $this->include('partials/header') ?>
    </div>



    <div class="container">

        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('js/app.js') ?>"></script>
    <?= $this->renderSection('javascript') ?>

</body>

</html>