<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content="conférence PHP" name="description">
    <meta content="Antoine AFUP" name="author">
    <meta content="Paris, France" name="geo.placename">

	<?php wp_head(); ?> <!-- affiche la toolbar wp en haut -->
</head>
<body >
    <header id="banner" role="banner">
        <div id="avatar"></div>
        <h1 id="afup"><a class="link-home" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <p id="conf">Prochaines conférences 2014</p>

        <nav role="navigation" id="navigation">
			<?php
	            wp_nav_menu([
	                'theme_location'    => 'main',
					'container'         => '',
	                'walker'            => new pm_Walker_nav_menu
	            ]);
	         ?>
        </nav>

    </header>
