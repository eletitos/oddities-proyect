<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package oddities
 */

if ( ! function_exists( 'oddities__posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function oddities__posted_on() {
		$time_string = '<time datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date('d.m.Y') )
		);


		echo $time_string;
	}
endif;

if ( ! function_exists( 'oddities__posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function oddities__posted_by() {
		printf(
			/* translators: 1: posted by label, only visible to screen readers. 2: author link. 3: post author. */
			'<span class="sr-only">%1$s</span><span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span>',
			esc_html__( 'Posted by', 'oddities' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;



if ( ! function_exists( 'oddities__entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function oddities__entry_meta() {

		?>
		<div class="font-display text-[13px]">
		<a href="<?php echo get_post_type_archive_link( 'post' ); ?>" title="Back to blog" >
			<img class="inline-block rotate-180 mr-5" width="30px" height="30px" src="<?php echo get_template_directory_uri(); ?>/icons/arrow-blue.svg" alt="">
			<span><?php echo __('BACK', 'oddities'); ?></span>
		</a>
		<span class="px-2">|</span>
		<?php

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			// Posted on.
			oddities__posted_on();


		}

		?>
		</div>

		<?php

		// Edit post link.
	}
endif;


if ( ! function_exists( 'oddities__entry_footer' ) ) :

	function oddities__entry_footer() {


	}
endif;


if ( ! function_exists( 'oddities__post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views
	 */
	function oddities__post_thumbnail($has_hover_effect = false) {
		if ( ! oddities__can_show_post_thumbnail() ) {
			return;
		}

		if ( $has_hover_effect ) :
			?>

			<figure class="absolute -inset-px overflow-hidden">
					<?php the_post_thumbnail( 'large', array( 'class' => 'min-w-full min-h-full w-full object-cover md:group-hover:scale-110 ease-in-out duration-300' ) ); ?>
			</figure>



			<?php
		else :
			?>

			<figure class="absolute -inset-px">
				<?php the_post_thumbnail('large', array( 'class' => 'min-w-full min-h-full w-full object-cover')); ?>
			</figure><!-- .post-thumbnail -->


			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'oddities__comment_avatar' ) ) :
	/**
	 * Returns the HTML markup to generate a user avatar.
	 *
	 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
	 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
	 */
	function oddities__get_user_avatar_markup( $id_or_email = null ) {

		if ( ! isset( $id_or_email ) ) {
			$id_or_email = get_current_user_id();
		}

		return sprintf( '<div class="vcard">%s</div>', get_avatar( $id_or_email, oddities__get_avatar_size() ) );
	}
endif;

if ( ! function_exists( 'oddities__discussion_avatars_list' ) ) :
	/**
	 * Displays a list of avatars involved in a discussion for a given post.
	 *
	 * @param array $comment_authors Comment authors to list as avatars.
	 */
	function oddities__discussion_avatars_list( $comment_authors ) {
		if ( empty( $comment_authors ) ) {
			return;
		}
		echo '<ol>', "\n";
		foreach ( $comment_authors as $id_or_email ) {
			printf(
				"<li>%s</li>\n",
				oddities__get_user_avatar_markup( $id_or_email ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			);
		}
		echo '</ol>', "\n";
	}
endif;

if ( ! function_exists( 'oddities__the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function oddities__the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => '<img class="inline-block mr-5 rotate-180" width="30px" height="30px" src="'. get_template_directory_uri() . '/icons/arrow-blue.svg" alt="">',
				'next_text' => '<img class="inline-block ml-5" width="30px" height="30px" src="'. get_template_directory_uri() . '/icons/arrow-blue.svg" alt="">',
			)
		);
	}
endif;




function oddities_the_related_posts(){

	$post_id = get_the_ID();
	$categories = wp_get_post_categories($post_id);
	$query_args = array(
		'category__in' => $categories,
		'post__not_in' => array($post_id),
		'post_per_page' => 6,
	);

	$related_posts = new WP_Query( $query_args );

	if($related_posts->have_posts()){

		?>
			<div class="entry-content">
			<ul class="flex flex-wrap">
		<?php
		while ( $related_posts->have_posts() ) {
			$related_posts->the_post();
			get_template_part( 'template-parts/content/content', 'postgrid' );
		}

		wp_reset_postdata();
		?>
			</ul>
			</div>

		<?php
	}

}

function oddities_recent_posts(){

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$recent_posts = new WP_Query( $args );

	if($recent_posts->have_posts()){

		?>
			<div class="entry-content">
			<ul class="flex flex-wrap">
		<?php
		while ( $recent_posts->have_posts() ) {
			$recent_posts->the_post();
			get_template_part( 'template-parts/content/content', 'postgrid' );
		}

		wp_reset_postdata();
		?>
			</ul>
			</div>

		<?php
	}

}
