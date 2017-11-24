/*
 * Sidebar submenu slide down
 */

jQuery(document).ready(function($) {

  var clickable = $('#sidebar-menu .menu-item-has-children a'),
      submenuHeight = 0,
      submenuElements,
      parentHeight,
      parentHeightNew,
      submenu;


  clickable.on('click', function(event){
    parentHeight = $(this).height();
    console.log('parent height = '+parentHeight);

    submenuHeight = 0;
    submenu = $(this).closest('.menu-item-has-children').find('.submenu');
    submenuElements = $(this).closest('.menu-item-has-children').find('.submenu li');
    console.log(submenuElements.length);
    console.log('submenu height = '+submenuHeight);

    submenuElements.each(function() {

      console.log($(this).height());
      submenuHeight = submenuHeight + $(this).height();
      // console.log('submenu height = '+submenuHeight);

    });

    console.log('submenu height = '+submenuHeight);

    if ( submenu.hasClass('is-active')) {
      console.log('submenu is open');
    } else {
      console.log('submenu is closed');
    }

    // console.log('submenu height = '+submenuHeight);
  });

});