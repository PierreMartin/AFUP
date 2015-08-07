<h1>Conférences intéressantes autour du PHP</h1>

<?php if ( have_posts() ) : ?>

    <!-- ************** LA BOUCLE : ************** -->
    <?php while ( have_posts() ) : the_post(); ?>



        <article class="news">
            <!-- Les titres : -->
            <h2><a class="link-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <!-- Les contents : -->
            <p><?php the_content(); ?></p>


            <!-- Les liens METABOX : Fonctionne pas ! -->
            <?php
                $meta_values = get_post_meta($postId,'_pm_meta_link', ['link' => $input_lien]);
                echo $meta_values;
            ?>


            <!-- Les tags : -->
            <p><?php the_tags('<div class="tag">Mots clefs: <span>', '</span><span>', '</span></div>'); ?></p>


            <!-- Les dates : CUSTOM TYPE POST + TAXOMONY -->
            <footer>
                <br>
                <h3 class="date">
                    <?php the_terms( $post->ID, 'pm_date_start', 'date de début : ', ', ' ); ?>
                    <?php the_terms( $post->ID, 'pm_date_end', 'date de fin : ', ', ' ); ?>
                </h3>

                <!-- CONDITION A DEBUGER : -->
                <?php
                    // if ( term_exists('pm_date_start') ) {
                    //     echo '<h3 class="date">';
                    //     the_terms( $post->ID, 'pm_date_start', 'date de début : ', ', ' );
                    //     the_terms( $post->ID, 'pm_date_end', 'date de fin : ', ', ' );
                    //     echo '</h3>';
                    // }
                ?>
            </footer>

        </article>



    <?php endwhile; ?>

<?php else : ?>
    <p>Il y a pas de poste</p>
<?php endif; ?>
