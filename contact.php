<?php
include("./includes/connect.php");
include("./functions/common_functions.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos - FDEMZL</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <!-- upper-nav -->
    <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>¡Celebra la Magia de Diciembre! Arreglos Florales Navideños y Entrega Exprés Gratuita - ¡Descuentos de hasta el 50%! <a>Compra Ahora</a></span>
    </div>
    <!-- upper-nav -->

    <!-- Start NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="./index.php">
                <img src="./assets/images/logo.png" alt="Logo A1" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./contact.php">Contáctanos</a>
                    </li>
                    <!--<?php
                        if(isset($_SESSION['username'])){                            
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>Mi Cuenta</a>
                        </li>";
                        }
                        else{
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Registrar</a>
                        </li>";
                        }
                    ?>-->
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <!--<li class="nav-item">
                        <a class="nav-link" href="./cart.php"><svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 5H7L10 22H26" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <sup>
                                <?php
                                cart_item();
                                ?>
                            </sup>
                            <span class="d-none">
                                Precio Total es: 
                                <?php
                                total_cart_price();
                                ?>
                            </span>
                        </a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<span>
                                    ¡Bienvenido/a!
                                </span>";
                            }else{
                                    echo "<span>
                                    ¡Bienvenido/a! <!--".$_SESSION['username']. "</span>";
                                }
                            ?>
                        </a>
                    </li>
                    <!--<?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Iniciar sesión
                        </a>
                    </li>";
                }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Cerrar sesión
                        </a>
                    </li>";
                    }
                    ?>-->
                </ul>
            </div>
        </div>
    </nav>
    <!-- End NavBar -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Envíanos un mensaje</h3>
                <form action="process_contact.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Información de Contacto</h3>
                <ul class="list-unstyled">
                    <li><strong>Dirección:</strong> Calle 44 #23-107 Manizales, Caldas.</li>
                    <li><strong>Teléfono:</strong> +57 311-793-9103, +57 320-644-5322</li>
                    <li><strong>Email:</strong> admin@floresydetallesconestilomzl.com</li>
                    <li><strong>Horario de apertura:</strong> Lunes a Sabado: 9:00 AM a 8:00 PM</li>
                </ul>
                <div class="mt-3">
                    <h4>Encuéntranos en el mapa:</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1446.2789901307551!2d-75.50342538140319!3d5.06473247212777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e476f8b40f70f69%3A0xe62e9307928d6a6a!2sCl.%2044%20%2323-107%2C%20Manizales%2C%20Caldas!5e0!3m2!1ses!2sco!4v1715967427051!5m2!1ses!2sco" 
                        width="100%" height="300" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- divider  -->
    <div class="container">
        <div class="divider"></div>
    </div>
    <!-- divider  -->

    <!-- Start Footer -->
     <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Todo los derechos de autor&copy;2024 - Flores y Detalles con Estilo Manizales.</span>
    </div>
    <!-- End Footer -->

    <script src="./assets//js/bootstrap.bundle.js"></script>
</body>

</html>