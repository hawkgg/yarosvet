<?php
/**
 * Footer file
 *
 * @package marketing
 * @since 1.0
 */
?>

<?php get_template_part('templates/footer/default'); ?>
<?php wp_footer(); ?>
<script>
    //Isotope active js code:
    //************************
    // Active isotope with jQuery code:
    jQuery('.psgal').isotope({
        itemSelector: '.msnry_item',
    });
    // Isotope click function
    jQuery('.iso-nav ul li').click(function(){
        jQuery('.iso-nav ul li').removeClass('active');
        jQuery(this).addClass('active');

        var selector = jQuery(this).attr('data-filter');
        jQuery('.psgal').isotope({
            filter: selector
        });
        return false;
    });
</script>
</body>
</html>
