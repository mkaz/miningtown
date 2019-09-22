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

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main responsive-max-width">

		<?php if ( have_posts() ) : ?>
		<?php $previous_year = 1970; ?>
	    <?php while ( have_posts() ) : the_post(); ?>
	        <?php
	        $current_year = get_the_date( 'Y' );
	        if ( $current_year != $previous_year ) {
	            // do we need to close previous year tag
	            if ( $previous_year != '1970' ) {
	                echo '</ul>';
	            }
	            echo '<h3 class="year">' . $current_year . '</h3>';
	            echo '<ul>';
	        }
	        ?>
	        <li class="hentry">
	            <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
	                <?php echo esc_html( get_the_date( 'M j' ) ); ?>
	            </time>
	            <span class="entry-title">
	                <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
	            </span>
	        </li>

	        <?php $previous_year = $current_year; ?>
	    <?php endwhile; ?>
		</ul>
	    <?php else : ?>
	    	<?php // If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );
			?>
		<?php endif; ?>

	</main>
</section>

<?php get_footer();
