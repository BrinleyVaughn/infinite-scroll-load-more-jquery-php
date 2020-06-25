var limit = 3;
var offset = 0;
var noMoreProducts = false;
var loadingInProgress = false;

$(document).on('submit', '#filter-form', function(e){
    e.preventDefault();
    
    let form = $(this);
    
    $.get('resources/products.php', $(form).serialize(), function(data){
        
        $('#all-products').html(data);
        
        let formQueries = {};

        $.each($('#filter-form').serializeArray(), function(_, input) {
          formQueries[input.name] = input.value;
        });
            
        $('#current-query').val(JSON.stringify(formQueries));
        
        // make offset limit because when the form loads, the first batch of products will already be there, then it must be offset to the next batch
        offset = limit;
        noMoreProducts = false;
        
    });
});

function loadProducts( extraQueries = {}) {
    
    if (noMoreProducts) return;
    
    let queries = {
        'offset' : offset,
        'limit' : limit
    };
    
    // Additional Queries
    if( ! jQuery.isEmptyObject(extraQueries) ) {
        $.each(extraQueries, function(param, value){
          queries[param] = value;
        });
    }
    
    if (!loadingInProgress) {
        
        loadingInProgress = true;
        
        $.get('resources/products.php', queries, function(data) {
            
            if(!data) {
                noMoreProducts = true;
                $('#load-more').remove();
            }
            else {
                offset += limit;
                
                $('#load-more').remove();
                
                $('#all-products').append(data);
                
            }
            
            loadingInProgress = false;
            
        });
    }
    
}

/************************************************
 * Adds Load More Button Functionality
 * Exclude this if only infinite scroll is needed
*************************************************/
$(document).on('click', '#load-more', function() {
    
    let currentQuery = {};
    
    $('#load-more').html('Loading...').prop('disabled', true);
    
    if($('#current-query').val().length) {
        currentQuery = JSON.parse($('#current-query').val());
    }
    loadProducts( currentQuery );
    
    
});

/************************************************
 * Adds Infinite Scroll Functionality
 * Exclude this if only load more button is needed
*************************************************/

$(window).scroll(function() {
    
    if( ( $(window).scrollTop() + $(window).height() ) >= $(document).height() ) {
        
        let currentQuery = {};
    
        if( $('#current-query').val().length) {
            currentQuery = JSON.parse($('#current-query').val());
        }

        $('#load-more').html('Loading...').prop('disabled', true);
        
        loadProducts(currentQuery);
        
    }
});

$(document).ready(function() {
    loadProducts();
})
