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
// external js: isotope.pkgd.js

// filter functions
var filterFns = {
  // show if number is greater than 50
  // numberGreaterThan50: function() {
  //   var number = $(this).find('.number').text();
  //   return parseInt( number, 10 ) > 50;
  // }
};

function getHashFilter() {
  // get filter=filterName
  var matches = location.hash.match( /filter=([^&]+)/i );
  var hashFilter = matches && matches[1];
  return hashFilter && decodeURIComponent( hashFilter );
}

// bind filter button click
var jQueryfilterButtonGroup = jQuery('.iso-nav');
jQueryfilterButtonGroup.on( 'click', 'button', function() {
  var filterAttr = jQuery( this ).attr('data-filter');
  // set filter in hash

  if (filterAttr[0] != '*') filterAttr = filterAttr.slice(1);

  location.hash = 'filter=' + encodeURIComponent( filterAttr );
});

var isIsotopeInit = false;

function onHashchange() {
  var hashFilter = getHashFilter();
  if ( !hashFilter && isIsotopeInit ) {
    return;
  }
  isIsotopeInit = true;

  if (hashFilter && hashFilter[0] != '*') hashFilter = '.' + hashFilter;

  // filter isotope
  jQuery('.psgal').isotope({
    itemSelector: '.msnry_item',
    // use filterFns
    filter: filterFns[ hashFilter ] ||  hashFilter
  });
  // set selected class on button
  if ( hashFilter ) {
    jQueryfilterButtonGroup.find('.is-checked').removeClass('is-checked');
    jQueryfilterButtonGroup.find('[data-filter="' + hashFilter + '"]').addClass('is-checked');
  }
}

jQuery(window).on( 'hashchange', onHashchange );

// trigger event handler to init Isotope
onHashchange();


</script>
</body>
</html>
