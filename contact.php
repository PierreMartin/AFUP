<?php
/*
 * Template Name: Ma page contact
 */

 $val_rand1 = rand(0, 10);
 $val_rand2 = rand(0, 10);

 if ( !empty($_POST) ) {

     $hasErrors = [];

     // on verifie que l'email existe :
     if ( !is_email($email) ) {
         $hasErrors['email'] = 'Email invalide';
     }

     // on verifie que le anti-bot est correct :
     if ( $_POST['anti_bot'] !== ($val_rand1 + $val_rand2) ) {
         $hasErrors['anti_bot'] = 'numbre invalide';
     }

     $email = sanitize_email($_POST['email']);
     $message = esc_textarea($_POST['message']);

     // ...

 }
?>


<!-- ************************* HTML ************************* -->
<?php get_header(); ?>

    <div id="main" role="main">
        <section id="post">

            <article class="news">
                <h2><a href="#" class="link-post">Laissez-nous un message</a></h2>
                <br>

                <form action="" method="post">
                    <label><i>(*)Champs obligatoires</i></label>

                    <p><label>* Email : </label><input type="email" name="email" placeholder="votre email"></p>
                    <p><label>Calculer la somme <?php echo $val_rand1; ?> + <?php echo $val_rand2; ?> : </label><input type="number" name="anti_bot" placeholder="résultat"></p>

                    <label>* Commentaires : </label><br>
                    <textarea name="message" placeholder="Votre messsage"></textarea><br><br>

                    <input type="submit" value="Valider">
                </form>
            </article>

        </section>

        <?php get_sidebar(); ?>

    </div>

<?php get_footer(); ?>
