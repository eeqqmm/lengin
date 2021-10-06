<?php
get_header();
?>

    <div class="container">
        <h1>ГОРОДА</h1>

        <nav id="site-navigation" class="main-navigation">

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
        <?php get_template_part( 'templates/input' );?>
    </div>
</main>




<?php get_footer();