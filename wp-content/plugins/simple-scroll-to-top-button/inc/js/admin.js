/*
 * Plugin JavaScript and jQuery code for the admin pages of website
 *
 * @package     Simple Scroll to Top Button
 * @author      Arthur Gareginyan
 * @link        https://www.spacexchimp.com
 * @copyright   Copyright (c) 2016-2018 Space X-Chimp. All Rights Reserved.
 */


jQuery(document).ready(function($) {

    "use strict";

    // Remove the 'successful' message after 3 seconds
    if ('.updated') {
        setTimeout(function() {
            $('.updated').fadeOut();
        }, 3000);
    }

    // Add dynamic content to page tabs. Needed for having an up to date content.
    $('.include-tab-store').load('https://www.spacexchimp.com/assets/dynamic-content/plugins.html #include-tab-store');

    // Add questions and answers into spoilers and color them in different colors
    $('.panel-group .panel').each(function(i) {
         $('.question-' + (i+1) ).appendTo( $('h4', this) );
         $('.answer-' + (i+1) ).appendTo( $('.panel-body', this) );

         if ( $(this).find('h4 div').hasClass('question-red') ) {
             $(this).addClass('panel-danger');
         } else {
             $(this).addClass('panel-info');
         }
    });

    // Enable color picker
    $('.control-color').wpColorPicker();

    // Enable switches
    $('.control-switch').checkboxpicker();

    // Enable number fields
    $('.control-number .btn-danger').on('click', function(){
        var input = $(this).parent().siblings('input');
        var value = parseInt(input.val());
        input.val(value - 1);
        input.change();
    });
    $('.control-number .btn-success').on('click', function(){
        var input = $(this).parent().siblings('input');
        var value = parseInt(input.val());
        input.val(value + 1);
        input.change();
    });

    // Live preview
    $('.background_button').on('change', function() {
        var val = $('input[type=radio]:checked', '.background_button').val() || 'fa-circle';
        val = 'ssttbutton-background fa ' + val + ' fa-stack-2x';
        $('#preview .ssttbutton-background').attr('class', val);
    });
    $('.background-color').wpColorPicker({
        change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();
            $('#preview  .ssttbutton-background').css('color',color);
        },
        clear: function (event) {
            var element = $(event.target).siblings('.wp-color-picker')[0];
            var color = '';
            if (element) {
              $('#preview  .ssttbutton-background').css('color',color);
            }
        }
    });
    $('.image_button').on('change', function() {
        var val = $('input[type=radio]:checked', '.image_button').val() || 'fa-hand-o-up';
        val = 'ssttbutton-symbol fa ' + val + ' fa-stack-1x';
        $('#preview .ssttbutton-symbol').attr('class', val);
    });
    $('.symbol-color').wpColorPicker({
        change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();
            $('#preview .ssttbutton-symbol').css('color',color);
        },
        clear: function (event) {
            var element = $(event.target).siblings('.wp-color-picker')[0];
            var color = '';
            if (element) {
                $('#preview .ssttbutton-symbol').css('color',color);
            }
        }
    });
    $('.transparency_button').on('change', function() {
        var val = $(this).val();
        var position = $(this).next().children().hasClass('btn-success');
        if (position === true) {
            $('#preview #ssttbutton').addClass('ssttbutton-transparent');
        } else {
            $('#preview #ssttbutton').removeClass('ssttbutton-transparent');
        }
    });
    $('.size_button input').change(function() {
        var val = $(this).val() || '32';
        //$('#preview #ssttbutton').css('font-size',val);
        $('#preview #ssttbutton').attr('style', 'font-size:' + val + 'px !important;');

    });

});
