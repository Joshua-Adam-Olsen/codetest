<?php
// Displays the post header
$post_format = get_post_format(); // Don't show the title if the post-format is `aside` or `status`.
if ( 'aside' === $post_format || 'status' === $post_format ) {
	return;
}
?>

<header class="entry-header">
	<?php
	the_title( sprintf( '<h2 class="entry-title card-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
	?>
</header><!-- .entry-header -->
