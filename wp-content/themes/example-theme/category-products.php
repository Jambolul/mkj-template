<?php
global $wp_query;
get_header();
?>


    <section class="hero">
        <div class="hero-text">
			<?php

			?>
        </div>


    </section>
    <main>
        <section class="products">
			<?php
			// haetaan alikategoriat
			$subcategories = get_categories( [
				'child_of'   => get_queried_object_id(),
				'hide_empty' => true,
			] );

			// käydään läpi alikategoriat
			foreach ( $subcategories as $subcategory ):
				echo '<h2>' . $subcategory->name . '</h2>';

				$args = [
					'post_type'      => 'post',
					'cat'            => $subcategory->term_id,
					'posts_per_page' => 3,
				];

				$products = new WP_Query( $args );

				generate_article( $products );
				?>
                <article class="product all">
                    <a href="<?php echo get_category_link($subcategory->term_id); ?>">View all</a>
                </article>
			<?php
				wp_reset_postdata();
			endforeach;
			?>
        </section>
    </main>

<?php
get_footer();