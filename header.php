<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>

<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<?php wp_head(); ?>
</head>



<body>

<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div id="object"></div>
</div>
</div>

</div>
<!--Navigation Menu-->

<div class="top-pad">
<nav class="navbar class-white text-effect">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
      </button>
      <a class="navbar-brands" href="<?php echo home_url(); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/img/matthews-logo.png" width="125" height="55" alt=""/></a>
      </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="black-background">
    <div class="navbar-collapse collapse" id="">
	
      <?php
                    $defaults = array(
                        'container' => 'ul',
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'nav navbar-nav navbar-right'
                    );
                    wp_nav_menu( $defaults );
                ?>
     
     
      <!--<ul class="nav navbar-nav navbar-right">
        <li class=""><a href="#">Home</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>-->
      
      
    </div>
	</div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
	</div>

<main class="cd-main-content">
	