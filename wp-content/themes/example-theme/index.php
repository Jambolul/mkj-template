<?php
get_header();
?>

<?php if (!is_page('tietoa-meista')) : ?>
    <section class="hero">
        <div class="hero-text">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    the_title('<h1>', '</h1>');
                    the_content();
                endwhile;
            else :
                _e( 'Sorry, no posts matched your criteria.', 'esimerkki' );
            endif;
            ?>
        </div>
        <?php the_custom_header_markup(); ?>
    </section>
<?php endif; ?>

    <main>
        <?php if (!is_page('tietoa-meista')) : ?>
            <section class="search">
                <?php get_search_form(); ?>
            </section>
        <?php else : ?>
            <!-- Contact Details Section for About Us Page -->
            <section class="contact-details">
                <h2>Contact Us</h2>
                <p>Feel free to reach out if you have any questions or need assistance!</p>
                <ul>
                    <li>Phone: (123) 456-7890</li>
                    <li>Email: <a href="mailto:contact@trainology.com">contact@trainology.com</a></li>
                    <li>Address: 123 Fitness Blvd, Workout City, 90120</li>
                </ul>
            </section>
        <?php endif; ?>
    </main>

<?php
get_sidebar();
get_footer();
?>