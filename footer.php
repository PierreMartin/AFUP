        <footer id="footer">
            <nav>
                <?php
    	            wp_nav_menu([
    	                'theme_location'    => 'footer',
                        'container'         => '',
                        'walker'            => new pm_Walker_nav_menu
    	            ]);
    	         ?>
            </nav>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
