<?php get_header(); ?>

    <div id="main" role="main">
        <section id="post">
            <p>archives des logos : </p>
            <?php get_template_part('loop', 'extrait'); ?>

        </section>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
