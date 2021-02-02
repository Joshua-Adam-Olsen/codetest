<!doctype html>
<html <?php language_attributes(); ?> <?php codetest_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="sr-only sr-only-focusable" href="#content">Skip to content</a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content" class="container">
		<div id="primary" class="row">
			<main id="main" class="col-12" role="main">
