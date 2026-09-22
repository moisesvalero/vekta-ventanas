<?php
/**
 * Main Index Fallback for Vekta Ventanas
 *
 * @package Vekta_Ventanas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="primary" class="content-area vk-container" style="padding: 4rem 1rem;">
	<main id="main" class="site-main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
		else :
			?>
			<p>No se encontraron contenidos.</p>
			<?php
		endif;
		?>
	</main>
</div>

<?php get_footer(); ?>
