<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<?php wp_head(); ?>

        <script type="text/javascript" data-main="<?php echo get_template_directory_uri()?>/public/js/main.js"
                src="<?php echo get_template_directory_uri(); ?>/public/js/require.js"></script>
    </head>
    <body <?php body_class(); ?>>


    <div id="header-wrapper">

        <!--header-holder-->
        <header class="app-bar">
            <div class="container">
                <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1 class="navbar-brand">
                    <a href="<?php echo site_url() ?>">
                        <?php echo bloginfo('name'); ?>
                    </a>
                </h1>
            </div>
        </header>

        <nav class="navdrawer-container promote-layer">
            <div class="container">
                <?php bootstrap_nav_menu(); ?>
            </div>
        </nav>

    </div>

    <main>
