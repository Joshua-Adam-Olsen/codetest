<?php
// Custom template tags for the theme

if ( ! function_exists( 'code_test_posted_on' ) ) {
	// Prints HTML with meta information for the current post-date/time.
	function code_test_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
		echo '<span class="posted-on">';
		printf(
			esc_html__( 'Published %s', 'codetest' ),
			$time_string
		);
		echo '</span>';
	}
}

if ( ! function_exists( 'code_test_posted_by' ) ) {
	// Prints HTML with meta information about theme author.
	function code_test_posted_by() {
		if ( ! get_the_author_meta( 'description' ) && post_type_supports( get_post_type(), 'author' ) ) {
			echo '<span class="byline">';
			printf(
				esc_html__( ' By %s ', 'codetest' ),
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a>'
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'code_test_entry_meta_footer' ) ) {
	//Prints HTML with meta information for the categories, tags and comments.
	function code_test_entry_meta_footer() {

		// Early exit if not a post.
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Hide meta information on pages.
		if ( ! is_single() ) {

			if ( is_sticky() ) {
				echo '<p>' . esc_html_x( 'Featured post', 'Label for sticky posts', 'codetest' ) . '</p>';
			}

			$post_format = get_post_format();
			if ( 'aside' === $post_format || 'status' === $post_format ) {
				echo '<p><a href="' . esc_url( get_permalink() ) . '">' . code_test_continue_reading_text() . '</a></p>';
			}

			// Posted on.
			code_test_posted_on();

			// Edit post link.
			edit_post_link(
				sprintf(
					esc_html__( ' Edit %s', 'codetest' ),
					'<span class="sr-only">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span><br>'
			);

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				$categories_list = get_the_category_list( __( ', ', 'codetest' ) );
				if ( $categories_list ) {
					printf(
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'codetest' ) . ' </span><br>',
						$categories_list
					);
				}

				$tags_list = get_the_tag_list( '', __( ', ', 'codetest' ) );
				if ( $tags_list ) {
					printf(
						'<span class="tags-links">' . esc_html__( 'Tagged %s', 'codetest' ) . '</span>',
						$tags_list
					);
				}
				echo '</div>';
			}
		} else {

			echo '<div class="posted-by">';
			// Posted on.
			code_test_posted_on();
			// Posted by.
			code_test_posted_by();
			// Edit post link.
			edit_post_link(
				sprintf(
					esc_html__( 'Edit %s', 'codetest' ),
					'<span class="sr-only">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			echo '</div>';

			if ( has_category() || has_tag() ) {

				echo '<div class="post-taxonomies">';

				$categories_list = get_the_category_list( __( ', ', 'codetest' ) );
				if ( $categories_list ) {
					printf(
						'<span class="cat-links">' . esc_html__( 'Categorized as %s', 'codetest' ) . ' </span><br>',
						$categories_list
					);
				}

				$tags_list = get_the_tag_list( '', __( ', ', 'codetest' ) );
				if ( $tags_list ) {
					printf(
						'<span class="tags-links">' . esc_html__( 'Tagged %s', 'codetest' ) . '</span>',
						$tags_list
					);
				}
				echo '</div>';
			}
		}
	}
}

if ( ! function_exists( 'code_test_post_thumbnail' ) ) {
	//Displays an optional post thumbnail.
	function code_test_post_thumbnail() {
		if ( ! code_test_can_show_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php
				// Thumbnail is loaded eagerly because it's going to be in the viewport immediately.
				the_post_thumbnail( 'post-thumbnail', array( 'loading' => 'eager' ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( 'post-thumbnail' ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'code_test_the_posts_navigation' ) ) {
	// Print the next and previous posts navigation.
	function code_test_the_posts_navigation() {
		$post_type      = get_post_type_object( get_post_type() );
		$post_type_name = '';
		if (
			is_object( $post_type ) &&
			property_exists( $post_type, 'labels' ) &&
			is_object( $post_type->labels ) &&
			property_exists( $post_type->labels, 'name' )
		) {
			$post_type_name = $post_type->labels->name;
		}

		the_posts_pagination(
			array(
				'before_page_number' => esc_html__( 'Page ', 'codetest' ),
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					is_rtl() ? '&rarr;' : '&larr;',
					sprintf(
						esc_html__( 'Newer %s', 'codetest' ),
						'<span class="nav-short">' . esc_html( $post_type_name ) . '</span>'
					)
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					sprintf(
						esc_html__( 'Older %s', 'codetest' ),
						'<span class="nav-short">' . esc_html( $post_type_name ) . '</span>'
					),
					is_rtl() ? '&larr;' : '&rarr;'
				),
				'screen_reader_text' => ' ',
			)
		);
	}
}
