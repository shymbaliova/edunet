<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edunet
 * @since Edunet 1.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'Edunet' ); ?></h1>
	</header><!-- /.entry-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'edit_posts' ) ) { ?>

			<p><?php printf( wp_kses( __( 'Готовы опубликовать свой первый пост? <a href="%1$s">Get started here</a>.', 'edunet' ), array( 
				'a' => array( 
					'href' => array() )
				) ), admin_url( 'post-new.php' ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php esc_html_e( 'Извините, но по вашему запросу ничего не найдено... Попробуйте ввести другие клчевые слова.', 'edunet' ); ?></p>
			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php esc_html_e( 'Кажется мы не смогли ничего найти... Может поиск поможет...', 'edunet' ); ?></p>
			<?php get_search_form(); ?>

		<?php } ?>
	</div><!-- /.entry-content -->
</article><!-- /#post-0.post.no-results.not-found -->
