/*
 * WordPress plugin Simple Scroll to Top Button by Space X-Chimp ( https://www.spacexchimp.com ).
 *
 * @package     Simple Scroll to Top Button
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2016-2018 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Set variables
    var duration = parseInt( spacexchimp_p008_scriptParams["scroll_duration"] );

    // Hide button by default
    $('#ssttbutton').hide();

    $(window).scroll(function() {
        if ($(this).scrollTop() < 200) {
            $('#ssttbutton') .fadeOut();
        } else {
    		$('#ssttbutton') .fadeIn();
        }
    });

    // Click on button
  	$('#ssttbutton').on('click', function() {
        $('html, body').animate({scrollTop:0}, duration);
        return false;
    });

});
