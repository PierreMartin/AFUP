<?php get_header(); ?>

    <div id="main" role="main">
        <section id="post">

            <?php get_template_part('loop', 'pages'); ?>

        </section>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
