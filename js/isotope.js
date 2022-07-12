jQuery(document).ready(function($){
    var $grid = $('.grid').isotope({
      // options
      itemSelector: '.grid-item',
      layoutMode: 'fitRows'
    });

    $grid.isotope({
      // filter element with numbers greater than 50
      filter: function() {
        // _this_ is the item element. Get text of element's .number
        var beer = $(this).find('.beer').text();
        // return true to show, false to hide
        return parseInt( beer, 10 ) > 50;
      }
    })
    
    // filter items on button click
    $('.filter-button-group').on( 'click', 'button', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });
    });
    