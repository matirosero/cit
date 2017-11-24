/*
 * Sidebar submenu slide down
 */

jQuery(document).ready(function($) {

  var clickable = $('#sidebar-menu .menu-item-has-children a'),
      submenuHeight = 0;


  clickable.on('click', function(event){
    submenuHeight = $(this).closest('.menu-item-has-children').find('.submenu li').height();
    console.log('submenu height = '+submenuHeight);
  });

});