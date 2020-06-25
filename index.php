<!Doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>Sandbox | CodeBlock</title>
    <meta name="description" content="Create pagination with filters using PHP, JQuery and Ajax">
    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css.css" type="text/css" media="all">
    
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="assets/js.js"  type=" text/javascript"></script>
    
    
    
</head>

<body>
     <header class="header"> 
        <div class="header-before"></div>
        <div class="header-cont">
            <div class="header-left"></div>
            <div class="logo">
                <img src="https://codeblock.co.za/wp-content/uploads/2019/11/logo_00f900501_170@2x.png" alt="CodeBlock" />
            </div>
            <div class="header-right"></div>
        </div>
    </header>
     
     <main class="container">

        <div class="row page-title">
            <div class="col-md-12">
                <h1 style="">Infinite Scroll & "Load More" With JQuery and PHP</h1>
            </div>
        </div>

        <div class="filters row">
            <div class="col-md-12">
                <form id="filter-form" class="form-inline" action='' method="GET">
                    <div class="form-row">
                        
                        <div class="col-lg-auto col-md-12 col-sm-6 px-2">
                            <span>Filter Products</span>
                            
                            <select name="cats" class="form-control form-control-sm">
                                <option value="">Filter by Category</option>
                                <option value="Caps">Caps</options>
                                <option value="Jackets">Jackets</options>
                                <option value="Pants">Pants</options>
                                <option value="Shirts">Shirts</options>
                            </select>
                            <input type="text" name="search" placeholder="Search" class="form-control form-control-sm" title="Search by product name or SKU" />
                        </div>
                        
                        <div class="col-lg-auto col-md-12 col-sm-6  px-2">
                            <span> Sort By </span>
                            <select name="sort-by" class="form-control form-control-sm">
                                <option value="title">Title</option>
                                <option value="price">Price</option>
                            </select>
                            
                            <select name="sort-order" class="form-control form-control-sm">
                                <option value="ASC">ASC</option>
                                <option value="DESC">DESC</option>
                            </select>
                        </div>
                        
                        <div class="col-lg-auto col-md-12 col-sm-12  px-2">
                            <input type="submit" value="Filter" class="btn btn-sm btn-secondary btn-block"/>
                        </div>
                        
                    </div>
                </form>
                <input type="hidden" id="current-query" value="" />
            </div>
        </div>

        <div id="all-products" class="row all-products"></div>
     </main>
     
     <footer class="footer">
        <div class="container">
        <div class="row">
        <div class="copyright col-md-6"><a href="https:/codeblock.co.za/">CodeBlock</a></div>
        <div class="privacy col-md-6 text-right"><a href="https://codeblock.co.za/privacy-policy/"></a></div>
        </div>
        </div>
    </footer>
</body>

</html>