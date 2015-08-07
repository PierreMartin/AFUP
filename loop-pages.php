<h1>Conférences intéressantes autour du PHP</h1>

<?php if ( have_posts() ) : ?>

    <!-- ************** LA BOUCLE : ************** -->
    <?php while ( have_posts() ) : the_post(); ?>



        <article class="news">
            <!-- Les titres : -->
            <h2><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <!-- Les contents : -->
            <p><?php the_content(); ?></p>


        </article>



    <?php endwhile; ?>

<?php else : ?>
    <p>Il y a pas de poste</p>
<?php endif; ?>
