<section id="sidebar">


    <h1>sponsors</h1>

    <!-- BOUCLE SERVANT A AFFICHER LES CUSTOM POST TYPE 'logo' -->
    <?php if ( have_posts() ) : ?>

        <?php $loop = new WP_Query( array( 'post_type' => 'logo', 'posts_per_page' => '10' ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

               <!-- Les images à la une : -->
               <?php if ( has_post_thumbnail() ) : ?>
                   <div class="thumbnail">
                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', ['class' => 'left']); ?></a>
                   </div>
                   <br>
               <?php endif; ?>

        <?php endwhile; wp_reset_query(); ?>

    <?php else : ?>
        <p>Il y a pas de sponsors</p>
    <?php endif; ?>

</section>
