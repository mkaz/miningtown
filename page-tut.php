<?php
/**
 * Template Name: Tutorial Page
 *
 * @package Miningtown
 *
 */

$parent_id = ( $post->post_parent ) ? $post->post_parent : $post->ID;
$parent = get_post( $parent_id );
$parent_title = ( $parent && ($parent->ID != $post->ID) ) ? $parent->post_title . " - " : "";

// get previous / next pages

$pagelist = get_pages("child_of=".$parent_id."&sort_column=menu_order&sort_order=asc");
$prev = false;
$next = false;
$onemore = false;
foreach ($pagelist as $p) {
    if ( $onemore ) {
        $next = $p;
        break;
    }

    if ( $post->ID === $p->ID  ) {
        $onemore = true;
    } else {
        $prev = $p;
    }

}

// if this is the parent post, hardcode
if ( $post->ID === $parent_id ) {
    $prev = false;
    $next = $pagelist[0];
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<title><?php wp_title( '|', true, 'right' ); ?> <?php echo esc_html($parent_title); ?> mkaz.blog</title>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div class="container">
		<header>
			<div class="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php echo file_get_contents(get_template_directory_uri() . "/mkaz.blog.svg" ); ?>
				</a>
			</div>
			<h3>
				<a href="<?php echo esc_attr( get_permalink( $parent_id ) ); ?>">
					<?php echo esc_html( $parent->post_title ); ?>
				</a>
			</h3>
		</header>

        <aside id="sidebar">
			<nav>
				<h3>Contents</h3>
				<ul>
<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent_id,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

    <?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

            </ul>
			</nav>
        </aside>
    <main>

        <article>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
			<nav>
				<?php if ( $prev ) : ?><span class="prev">
					<a href="<?php echo esc_attr( get_permalink( $prev->ID ) ); ?>">
						&#171; <?php echo esc_html( $prev->post_title ); ?>
					</a>
				</span><?php endif; ?>
				<?php if ( $next ) : ?><span class="next">
					<a href="<?php echo esc_attr( get_permalink( $next->ID ) ); ?>">
						<?php echo esc_html( $next->post_title ); ?> &#187;
					</a>
				</span><?php endif; ?>
			</nav>
        </article>
    </main>
</div>

<?php
get_footer();

