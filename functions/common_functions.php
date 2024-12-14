<?php
// include connect file from DB
// include('./includes/connect.php');
// getting products
function getProduct($numToDisplay = '')
{
    global $con;
    // condition to check isset or not 
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            empty($numToDisplay) ? $select_product_query = "SELECT * FROM `products` ORDER BY rand()" : $select_product_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,$numToDisplay";
            // $select_product_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0,10";
            $select_product_result = mysqli_query($con, $select_product_query);
            while ($row = mysqli_fetch_assoc($select_product_result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image_one = $row['product_image_one'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "
        <div class='col-md-4 mb-2'>
            <div class='one-card'>
                <div class='photo'>
                    <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                    <button class='cotizarBtn btn btn-primary text-light' data-product=$product_title'>Cotizar ahora</button>
                    <button>
                        <a class='text-light' href='product_details.php?product_id=$product_id'>Ver mas</a>
                    </button>
                </div>
                <div class='content'>
                    <span class='title fw-bold'>$product_title</span>
                    <div class='desc'>
                        <span>\$$product_price</span>
                    </div>
                </div>
            </div>
        </div>
        ";
            }
        }
    }
}
// display unique product with category
function filterCategoryProduct()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_product_query = "SELECT * FROM `products` WHERE category_id = $category_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No hay existencias para esta categoría</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
        <div class='col-md-4 mb-2'>
        <div class='one-card'>
            <div class='photo'>
                <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                <button class='cotizarBtn btn btn-primary text-light' data-product=$product_title'>Cotizar ahora</button>
            <button>
                <a class='text-light' href='product_details.php?product_id=$product_id'>Ver mas</a>
            </button>
            </div>
            <div class='content'>
                <span class='title fw-bold'>$product_title</span>
                <div class='desc'>
                    <span>\$$product_price</span>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    }
}
// display unique product with brand 
function filterBrandProduct()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_product_query = "SELECT * FROM `products` WHERE brand_id = $brand_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        $num_of_rows = mysqli_num_rows($select_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No hay existencias para esta etiqueta</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($select_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
        <div class='col-md-4 mb-2'>
        <div class='one-card'>
            <div class='photo'>
                <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                <button class='cotizarBtn btn btn-primary text-light' data-product=$product_title'>Cotizar ahora</button>
            <button>
                <a class='text-light' href='product_details.php?product_id=$product_id'>Ver mas</a>
            </button>
            </div>
            <div class='content'>
                <span class='title fw-bold'>$product_title</span>
                <div class='desc'>
                    <span>\$$product_price</span>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    }
}


// display brands in sidenav 
function getBrands()
{
    global $con;
    $select_brands_query = "SELECT * FROM `brands`";
    $select_brands_result = mysqli_query($con, $select_brands_query);
    while ($brands_row_data = mysqli_fetch_assoc($select_brands_result)) {
        $brand_title = $brands_row_data['brand_title'];
        $brand_id = $brands_row_data['brand_id'];
        echo "
        <li class='nav-item'>
            <a href='products.php?brand=$brand_id' class='nav-link'>
                $brand_title
            </a>
        </li>
    ";
    }
}

// display categories in sidenav 
function getCategories()
{
    global $con;
    $select_category_query = "SELECT * FROM `categories`";
    $select_category_result = mysqli_query($con, $select_category_query);
    while ($categories_row_data = mysqli_fetch_assoc($select_category_result)) {
        $category_title = $categories_row_data['category_title'];
        $category_id = $categories_row_data['category_id'];
        echo "
        <li class='nav-item'>
        <a href='products.php?category=$category_id' class='nav-link'>
            $category_title
        </a>
    </li>
        ";
    }
}

// search product function 
function search_product()
{
    global $con;
    if (isset($_GET['search_data_btn'])) {
        $search_data_value = $_GET['search_data'];
        $search_product_query = "SELECT * FROM `products` WHERE product_title LIKE '%$search_data_value%' OR product_keywords LIKE '%$search_data_value%'";
        $search_product_result = mysqli_query($con, $search_product_query);
        $num_of_rows = mysqli_num_rows($search_product_result);
        if ($num_of_rows == 0) {
            echo "
                <h2 class='text-center'>No results match. No product found!</h2>
                ";
        }
        while ($row = mysqli_fetch_assoc($search_product_result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image_one = $row['product_image_one'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
        <div class='col-md-4 mb-2'>
        <div class='one-card'>
            <div class='photo'>
                <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                <button>
                <a class='text-light' href='products.php?add_to_cart=$product_id'>Add To Cart</a>
            </button>
            <button>
                <a class='text-light' href='product_details.php?product_id=$product_id'>View More</a>
            </button>
            </div>
            <div class='content'>
                <span class='title fw-bold'>$product_title</span>
                <div class='desc'>
                    <span>\$$product_price</span>
                    <span>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>
                        <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                        </svg>

                    </span>
                    <span>(35)</span>
                </div>
            </div>
        </div>
    </div>
        ";
        }
    }
}

// view details function 
function viewDetails()
{
    global $con;
    // condition to check isset or not 
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];
                $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
                $select_product_result = mysqli_query($con, $select_product_query);
                while ($row = mysqli_fetch_assoc($select_product_result)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_desc = $row['product_description'];
                    $product_image_one = $row['product_image_one'];
                    $product_image_two = $row['product_image_two'];
                    $product_image_three = $row['product_image_three'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "
                    <div class='row mx-0 justify-content-md-center gap-3 gap-md-0'>
                    <div class='col-md-2'>
                        <div class='prod-imgs'>
                            <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                            <img src='./admin/product_images/$product_image_two' alt='$product_title'>
                            <img src='./admin/product_images/$product_image_three' alt='$product_title'>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='main-img'>
                            <img src='./admin/product_images/$product_image_one' alt='$product_title'>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class='info d-flex flex-column gap-2'>
                            <h4 class='fw-bold'>$product_title</h4>
                            <div class='rates d-flex gap-2 flex-wrap'>
                                <!--<span>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='#FFAD33' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                                    </svg>
                                    <svg width='16' height='15' viewBox='0 0 16 15' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                        <path opacity='0.25' d='M14.673 7.17173C15.7437 6.36184 15.1709 4.65517 13.8284 4.65517H11.3992C10.7853 4.65517 10.243 4.25521 10.0617 3.66868L9.33754 1.32637C8.9309 0.0110567 7.0691 0.0110564 6.66246 1.32637L5.93832 3.66868C5.75699 4.25521 5.21469 4.65517 4.60078 4.65517H2.12961C0.791419 4.65517 0.215919 6.35274 1.27822 7.16654L3.39469 8.78792C3.85885 9.1435 4.05314 9.75008 3.88196 10.3092L3.11296 12.8207C2.71416 14.1232 4.22167 15.1704 5.30301 14.342L7.14861 12.9281C7.65097 12.5432 8.34903 12.5432 8.85139 12.9281L10.6807 14.3295C11.7636 15.159 13.2725 14.1079 12.8696 12.8046L12.09 10.2827C11.9159 9.71975 12.113 9.10809 12.5829 8.75263L14.673 7.17173Z' fill='black' />
                                    </svg>

                                </span>
                                <span>
                                    (150 Reviews)
                                </span>
                                <span>|</span>
                                <span class='in-stack fw-bold'>
                                    In Stock
                                </span>-->
                            </div>
                            <h4>
                                \$$product_price
                            </h4>
                            <p>
                                $product_desc
                            </p>
                            <div class='divider'>
                            </div>
                            <button class='cotizarBtn btn btn-primary' data-product=$product_title'>Cotizar ahora</button>
                            <div class='delivery d-flex flex-column my-4 gap-3'>
                                <div class='d-flex gap-2 align-items-center'>
                                    <span>
                                        <svg width='40' height='40' viewBox='0 0 40 40' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                            <g clip-path='url(#clip0_261_4843)'>
                                                <path d='M11.6673 31.6667C13.5083 31.6667 15.0007 30.1743 15.0007 28.3333C15.0007 26.4924 13.5083 25 11.6673 25C9.82637 25 8.33398 26.4924 8.33398 28.3333C8.33398 30.1743 9.82637 31.6667 11.6673 31.6667Z' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M28.3333 31.6667C30.1743 31.6667 31.6667 30.1743 31.6667 28.3333C31.6667 26.4924 30.1743 25 28.3333 25C26.4924 25 25 26.4924 25 28.3333C25 30.1743 26.4924 31.6667 28.3333 31.6667Z' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M8.33398 28.3335H7.00065C5.89608 28.3335 5.00065 27.4381 5.00065 26.3335V21.6668M3.33398 8.3335H19.6673C20.7719 8.3335 21.6673 9.22893 21.6673 10.3335V28.3335M15.0007 28.3335H25.0007M31.6673 28.3335H33.0007C34.1052 28.3335 35.0007 27.4381 35.0007 26.3335V18.3335M35.0007 18.3335H21.6673M35.0007 18.3335L30.5833 10.9712C30.2218 10.3688 29.5708 10.0002 28.8683 10.0002H21.6673' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M8 28H6.66667C5.5621 28 4.66667 27.1046 4.66667 26V21.3333M3 8H19.3333C20.4379 8 21.3333 8.89543 21.3333 10V28M15 28H24.6667M32 28H32.6667C33.7712 28 34.6667 27.1046 34.6667 26V18M34.6667 18H21.3333M34.6667 18L30.2493 10.6377C29.8878 10.0353 29.2368 9.66667 28.5343 9.66667H21.3333' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M5 11.8182H11.6667' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M1.81836 15.4545H8.48503' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                                <path d='M5 19.0909H11.6667' stroke='black' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' />
                                            </g>
                                            <defs>
                                                <clipPath id='clip0_261_4843'>
                                                    <rect width='40' height='40' fill='white' />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                    <div class='d-flex flex-column gap-2'>
                                        <h6>Si estas en Manizales los domicilios son gratis</h6>
                                    </div>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
                    ";
                }
            }
        }
    }
}

// get Ip Address Function
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// cart function
function cart($num_of_items = 1)
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $getIpAddress = getIPAddress();
        $getProductId = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress' AND product_id=$getProductId";
        $select_result = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($select_result);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in Cart');</script>";
            echo "<script>window.open('products.php','_self');</script>";
            // header("Location:products.php");
        } else {
            $insert_query = "INSERT INTO `card_details` (product_id,ip_address,quantity) VALUES ($getProductId,'$getIpAddress',1)";
            $insert_result = mysqli_query($con, $insert_query);
            echo "<script>alert('This item added to Cart');</script>";
            echo "<script>window.open('products.php','_self');</script>";
        }
    }
}

// get cart item numbers function 
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $getIpAddress = getIPAddress();
        $select_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress' ";
        $select_result = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($select_result);
    } else {
        global $con;
        $getIpAddress = getIPAddress();
        $select_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress' ";
        $select_result = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($select_result);
    }
    echo $count_cart_items;
}

// total price function 
function total_cart_price()
{
    global $con;
    $getIpAddress = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `card_details` WHERE ip_address='$getIpAddress'";
    $cart_result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($cart_result)) {
        $product_id = $row['product_id'];
        $select_product_query = "SELECT * FROM `products` WHERE product_id=$product_id";
        $select_product_result = mysqli_query($con, $select_product_query);
        while ($row_product_price = mysqli_fetch_array($select_product_result)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }
    }
    echo $total_price;
}

// get user order details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details_query = "SELECT * FROM `user_table` WHERE username = '$username'";
    $get_details_result = mysqli_query($con, $get_details_query);
    while ($row_query = mysqli_fetch_array($get_details_result)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders_query = "SELECT * FROM `user_orders` WHERE user_id='$user_id' AND order_status='pending'";
                    $get_orders_result = mysqli_query($con,$get_orders_query);
                    $row_orders_count = mysqli_num_rows($get_orders_result);
                    if($row_orders_count > 0){
                        echo "<h3 class='text-center mb-3'>You have <span class='text-2'>$row_orders_count</span> pending orders</h3>
                            <a href='profile.php?my_orders' class='text-center text-decoration-underline fs-5'>Order details</a>
                        ";
                    }else{
                        echo "<h3 class='text-center mb-3'>You have <span class='text-success'>0</span> pending orders</h3>
                            <a href='../index.php' class='text-center text-decoration-underline fs-5'>Explore products</a>
                        ";
                    }
                }
            }
        }
    }
}
