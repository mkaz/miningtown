<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package miningtown
 *
 * @since 1.0.0
 */


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$filter = get_query_var( 'filter' );

$args = array(
  'posts_per_page' => 50,
  'paged' => $paged
);

if ( $filter ) {
	$args['category_name'] = $filter;
}

$the_query = new WP_Query( $args );

get_header(); ?>

<main id="main" class="site-main">


	<?php if ( have_posts() ) : ?>

		<h5 class="page-title"> Articles </h5>
		
		<div class="filter-list">
			Filter: 
			<?php 
			$categories = get_categories();
			foreach ( $categories as $category ) : 
				if ( $filter && $category->name === $filter ) : ?>
					<span class="selected"><?php echo esc_html($category->name);?></span>
				<?php else : ?>
					<span><a href="/?filter=<?php echo esc_attr($category->name);?>"><?php echo esc_html($category->name);?></a></span>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<ul class="post-list">
		<?php
		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			get_template_part( 'template-parts/content/content', 'home' );
		endwhile;

		// pagination fix
		$tmp_query = $wp_query;
		$wp_query  = NULL;
		$wp_query  = $the_query;

		miningtown_the_posts_navigation();

		$wp_query = NULL;
		$wp_query = $tmp_query;

		// If no content, include the "No posts found" template.
	else :
		get_template_part( 'template-parts/content/content', 'none' );

	endif;
	?>
	</ul>
</main>

<?php get_footer();
