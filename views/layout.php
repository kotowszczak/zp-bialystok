<!doctype html>
<html lang="en">
<?php
    defined('__DIR__') || define('__DIR__', dirname(__FILE__));
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Stron Zakładu Poprawczego w Białymstoku">
    <meta name="author" content="Zakład Poprawczy">

    <title>Zakład Poprawczy w Białymstoku</title>

    <?php include(__DIR__ . '/layout/favicon.php'); ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel='stylesheet'
        href='<?php asset('/css/bootstrap.min.css') ?>' media='all' />

    <link rel='stylesheet'
        href='<?php asset('/css/template.css') ?>' media='all' />

    <link rel='stylesheet'
        href='<?php asset('/css/wcag.css') ?>' media='all' />
  </head>

  <body class="home">
    <?php include(__DIR__ . '/layout/top-links.php'); ?>

    <?php include(__DIR__ . '/layout/wcag-controls.php'); ?>

    <?php include(__DIR__ . '/layout/header.php'); ?>

    <main id="main-container" role="main" class="container-fluid d-flex">
      <aside id="side-menu" class="left-sidebar">
        <?php
          zp_menu('main', array(
              'class' => 'flex-column'
          ));
        ?>
      </aside>

      <section class="page-contents">
        <?php include(__DIR__ . '/index.php'); ?>
      </section>
    </main><!-- /.container -->

    <?php include(__DIR__ . '/layout/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script type='text/javascript' src='<?php asset('/js/jquery-3.3.1.slim.min.js'); ?>'></script>
    <script type='text/javascript' src='<?php asset('/js/bootstrap.min.js'); ?>'></script>
	  <script type='text/javascript' src='<?php asset('/js/popper.min.js'); ?>'></script>
    <script type='text/javascript' src='<?php asset('/js/functions.js'); ?>'></script>
  </body>
</html>