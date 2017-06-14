<?php if ( ! defined('DIR')) exit; ?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo CSS?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo CSS?>font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>nprogress.css" rel="stylesheet">
    <link href="<?php echo CSS?>bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>jqvmap.min.css" rel="stylesheet"/>
    <link href="<?php echo CSS?>daterangepicker.css" rel="stylesheet">
    <link href="<?php echo CSS?>custom.css" rel="stylesheet">
    <link href="<?php echo CSS?>switchery.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>green.css" rel="stylesheet">
    <link href="<?php echo CSS?>select2.min.css" rel="stylesheet">

    <link href="<?php echo CSS?>dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo CSS?>responsive.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo PLUGIN?>jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">

    <script type="text/javascript">
        var urlSite = '<?=URL?>';
    </script>
    <script src="<?php echo JS?>jquery.min.js"></script>
    <script src="<?php echo JS?>bootstrap.min.js"></script>
    <script src="<?php echo JS?>bootstrap-notify.js"></script>
    <script src="<?php echo JS?>bootstrap-notify.min.js"></script>

    <title><?php echo $this->title; ?></title>
</head>

<body class="nav-md">
    <div class="container body">
	    <div class="main_container">
			
			<?php
			require DIR . '/views/_includes/menu.php';
			?>
			
<?php //--------------divs fecham no footer------------------?>