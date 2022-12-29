/**
 * @file
 * Global utilities.
 *
 */
 (function ($, Drupal) {
    'use strict';
    Drupal.behaviors.custom_libraray = {
      attach: function (context, settings) {
  
        $(document).ready(function(){
            console.log('Custom Library Installed');
        });

            
      }
    };
  })(jQuery, Drupal);