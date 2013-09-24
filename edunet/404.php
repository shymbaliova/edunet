<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Edunet
 * @since Edunet 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content row" role="main">

		<div class="col grid_12_of_12">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><i class="icon-thumbs-down icon-large"></i> <?php esc_html_e( 'Ой, такой страницы нет... Но есть другие!', 'edunet' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php esc_html_e( 'Кажется, мы не можем найти то, что вы ищете... Возможно поиск сможет помочь...', 'edunet' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- /.entry-content -->
			</article><!-- /#post -->

		</div> <!-- /.col.grid_12_of_12 -->

	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>
