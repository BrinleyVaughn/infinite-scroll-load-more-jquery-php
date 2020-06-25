<?php 

// Bring in the products
require('./products-array.php');

// Filters
$cat_filter = isset($_GET['cats']) ? $_GET['cats'] : '';
$search_filter = isset($_GET['search']) ? $_GET['search'] : '';

// Default limit
$limit = isset($_GET['limit']) ? $_GET['limit'] : 3;

// Default offset
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;


// filter products array based on query
if(!empty($cat_filter) || !empty($search_filter)) {
    $filtered_products = array();
    foreach($products as $product) {
        if( !empty($cat_filter) && !empty($search_filter) ) {
            
            if( ( stripos($product['title'], $search_filter) !== false || $product['sku'] == $search_filter ) && $product['category'] == $cat_filter ) {
                $filtered_products[] = $product;
            }

        }
        else if(!empty($cat_filter) && $product['category'] == $cat_filter) {

            $filtered_products[] = $product;
        }
        else if(!empty($search_filter) && ( stripos($product['title'], $search_filter) !== false || $product['sku'] == $search_filter) ) {
            
            $filtered_products[] = $product;
        }
        
    }
    
    $products = $filtered_products;
}

// Sorting
function sortByQuery($a, $b) {
    $sort_by = isset($_GET['sort-by']) ? $_GET['sort-by'] : 'title';
    $sort_order = isset($_GET['sort-order']) ? $_GET['sort-order'] : 'ASC';
    
    if ($sort_order == 'DESC') {
        return $a[$sort_by] < $b[$sort_by];
    }
    else {
        return $a[$sort_by] > $b[$sort_by];
    }
}
usort($products, 'sortByQuery');


$queried_products = array_slice($products, $offset, $limit);

$total_products = count($products);

// Get the total rows rounded up the nearest whole number
$total_rows = (int)ceil( $total_products / $limit );

$current_row = !$offset ? 1 : ( $offset / $limit ) + 1;


if (count($queried_products)) {
    foreach ($queried_products as $product) { ?>
       
       <div class="col-md-4 product-wrapper">
           <div class="product">
               <div class="product-image">
                   <img src="<?php echo $product['image']; ?>" />
                </div>
                <div class="product-title">
                    <h3><?php echo $product['title']; ?></h3>
                </div>
                <div class="product-info">
                    <p class="product-sku"><?php echo $product['sku']; ?></p>
                    <p class="product-price">R <?php echo $product['price']; ?></p>
                    <p class="product-category">Listed in <?php echo $product['category']; ?></p>
                </div>
           </div>
           
       </div>
           
     <?php }
}

else {
    return false;
}

if ( $current_row < $total_rows ) { ?>
    
    <div class="col-md-12 text-center">
        <button id="load-more" class="btn btn-primary mx-auto" >Load more</button>
    </div>
    
<?php }
else {

    return false;
}

 





