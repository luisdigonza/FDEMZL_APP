<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php');
    session_start();
    if(isset($_SESSION['admin_username'])){
        $admin_name = $_SESSION['admin_username'];
        $get_admin_data = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
        $get_admin_result = mysqli_query($con,$get_admin_data);
        $row_fetch_admin_data = mysqli_fetch_array($get_admin_result);
        $admin_name = $row_fetch_admin_data['admin_name'];
        $admin_image = $row_fetch_admin_data['admin_image'];
    }else{
        echo "<script>window.open('./admin_login.php','_self');</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administrativo - FDEMZL</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body>
    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="../assets/images/logo.png" alt="Logo A1" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentad" aria-controls="navbarSupportedContentad" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContentad">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Bienvenido <?php echo $admin_name;?></a>
                    </li>
                    <li class="nav-item">
                    <button class="btn btn-primary p-0 px-1">
                            <a href="./admin_logout.php" class="nav-link text-light">Cerrar sesión</a>
                        </button>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
    <!-- End NavBar -->
    <!-- Start Control Buttons -->
    <div class="control">
        <div class="container pt-4 pb-0">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Panel administrativo - Flores y Detalles con Estilo Manizales</span>
                </div>
                <h2>Gestionar detalles de la tienda</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="admin-image">
                        <a href="./index.php"><img src="./admin_images/<?php echo $admin_image;?>" class="img-thumbnail" alt="Admin Photo"></a>
                        <p><?php echo $admin_name;?></p>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="buttons">
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_product" class="nav-link">Añadir Productos</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_products" class="nav-link">Ver Productos</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_category" class="nav-link">Añadir Categorias</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_categories" class="nav-link">Ver Categorias</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?insert_brand" class="nav-link">Añadir Etiquetas</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?view_brands" class="nav-link">Ver Etiquetas</a>
                        </button>
                        <!--<button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_orders" class="nav-link">Ver todas las ordenes</a>
                        </button>
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_payments" class="nav-link">Ver todos los pagos</a>
                        </button>-->
                        <button class="btn btn-outline-primary m-2">
                            <a href="index.php?list_users" class="nav-link">Lista Usuarios Administradores</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Control Buttons -->
        <!-- divider  -->
    <div class="container">
        <div class="divider"></div>
    </div>
    <!-- divider  -->
    <!-- Start Changed Page  -->
    <div class="change-page">
        <div class="container">
            <?php
            if(isset($_GET['insert_category'])){
                include('./insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('./insert_brands.php');
            }
            if(isset($_GET['insert_product'])){
                include('./insert_product.php');
            }
            if(isset($_GET['view_products'])){
                include('./view_products.php');
            }
            if(isset($_GET['edit_product'])){
                include('./edit_product.php');
            }
            if(isset($_GET['delete_product'])){
                include('./delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('./view_categories.php');
            }
            if(isset($_GET['edit_category'])){
                include('./edit_category.php');
            }
            if(isset($_GET['delete_category'])){
                include('./delete_category.php');
            }
            if(isset($_GET['view_brands'])){
                include('./view_brands.php');
            }
            if(isset($_GET['edit_brand'])){
                include('./edit_brand.php');
            }
            if(isset($_GET['delete_brand'])){
                include('./delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('./list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('./delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('./list_payments.php');
            }
            if(isset($_GET['delete_user'])){
                include('./delete_user.php');
            }
            if(isset($_GET['list_users'])){
                include('./list_users.php');
            }

            ?>
        </div>
    </div>
    <!-- End Changed Page  -->

    <!-- Start Footer -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>All CopyRight &copy;2024 - Flores y Detalles con Estilo Manizales.</span>
    </div>
    <!-- End Footer -->

    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>