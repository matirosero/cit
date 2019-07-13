/*
 * Restart foundation equlizer after window load for page header
 * Because BLAH
 */

jQuery(document).ready(function($) {
  $(window).load(function() {
    new Foundation.Equalizer($(".page-header")).applyHeight();
  });
});