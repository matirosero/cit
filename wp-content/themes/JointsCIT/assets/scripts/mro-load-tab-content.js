/*
 * Load content in tabs/accordion
 */

jQuery(document).ready(function($) {

  var clickable = $('.load-content-trigger'),
      requestMarker,
      requestedContent;


  clickable.on('click', function(event){
    requestMarker = $(this).data('load-content');
    console.log('click! Load: '+requestMarker);

    var findThis = '#'+requestMarker;

    console.log(findThis);

    requestedContent = $('#load-presentation').children('.load-content').html();

    console.log(requestedContent);

    $('#tab-presentation').html(requestedContent);
  });

});