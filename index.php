<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flores y Detalles con Estilo Manizales</title>
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
                        <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contáctanos</a>
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

    <!-- Start Landing Section -->
    <div class="landing">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-md-block pt-md-4">
                    <div class="cover">
                        <span class="title">Flores y Detalles con Estilo Manizales<br/></span>
                        <span class="desc">Flores con estilo<br/>¡Sorprende a tus seres queridos!</span>
                        <a href="#">Cotizar ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Landing Section -->
    <!-- Start Category  -->
    <div class="category">
        <div class="container">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Categorías</span>
                </div>
                <h2>Buscar por Categoría</h2>
            </div>
            <div class="cards" style="display: flex; flex-wrap: wrap; gap: 16px; justify-content: center; align-items: center; height: 100%;">
                <div class="card">
                    <span>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_822_6335)">
                                <!-- Tallo -->
                                <line x1="28" y1="20" x2="28" y2="40" stroke="green" stroke-width="2" stroke-linecap="round" />
                                <!-- Pétalo superior -->
                                <circle cx="28" cy="15" r="5" fill="pink" />
                                <!-- Pétalo izquierdo -->
                                <circle cx="22" cy="20" r="5" fill="pink" />
                                <!-- Pétalo derecho -->
                                <circle cx="34" cy="20" r="5" fill="pink" />
                                <!-- Pétalo inferior -->
                                <circle cx="28" cy="25" r="5" fill="pink" />
                                <!-- Centro de la flor -->
                                <circle cx="28" cy="20" r="3" fill="yellow" />
                            </g>
                            <defs>
                                <clipPath id="clip0_822_6335">
                                    <rect width="56" height="56" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <a href="./products.php?category=9"><span>Ramos</span></a>
                </div>

                <div class="card">
                    <span>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_822_6335)">
                                <!-- Contorno de la caja -->
                                <rect x="14" y="14" width="28" height="28" fill="brown" stroke="black" stroke-width="2" />
                                <!-- Detalles de la tapa -->
                                <line x1="14" y1="14" x2="42" y2="14" stroke="black" stroke-width="2" />
                                <line x1="14" y1="18" x2="42" y2="18" stroke="darkred" stroke-width="2" />
                                <!-- Lazo decorativo -->
                                <line x1="28" y1="14" x2="28" y2="42" stroke="red" stroke-width="2" />
                                <line x1="14" y1="28" x2="42" y2="28" stroke="red" stroke-width="2" />
                                <!-- Flor sobre la caja -->
                                <!-- Tallo -->
                                <line x1="28" y1="20" x2="28" y2="32" stroke="green" stroke-width="2" stroke-linecap="round" />
                                <!-- Pétalo superior -->
                                <circle cx="28" cy="15" r="5" fill="pink" />
                                <!-- Pétalo izquierdo -->
                                <circle cx="23" cy="20" r="5" fill="pink" />
                                <!-- Pétalo derecho -->
                                <circle cx="33" cy="20" r="5" fill="pink" />
                                <!-- Pétalo inferior -->
                                <circle cx="28" cy="25" r="5" fill="pink" />
                                <!-- Centro de la flor -->
                                <circle cx="28" cy="20" r="3" fill="yellow" />
                            </g>
                            <defs>
                                <clipPath id="clip0_822_6335">
                                    <rect width="56" height="56" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <a href="./products.php?category=10"><span>Ramos en Caja</span></a>
                </div>

                <div class="card">
                    <span>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_822_6335)">
                                <!-- Base del bouquet -->
                                <ellipse cx="28" cy="38" rx="12" ry="6" fill="brown" />
                                <!-- Tallo del bouquet -->
                                <rect x="26" y="18" width="4" height="20" fill="green" />
                                <!-- Flor central -->
                                <!-- Tallo -->
                                <line x1="28" y1="18" x2="28" y2="26" stroke="green" stroke-width="2" stroke-linecap="round" />
                                <!-- Pétalo superior -->
                                <circle cx="28" cy="14" r="5" fill="pink" />
                                <!-- Pétalo izquierdo -->
                                <circle cx="23" cy="18" r="5" fill="pink" />
                                <!-- Pétalo derecho -->
                                <circle cx="33" cy="18" r="5" fill="pink" />
                                <!-- Pétalo inferior -->
                                <circle cx="28" cy="22" r="5" fill="pink" />
                                <!-- Centro de la flor -->
                                <circle cx="28" cy="18" r="3" fill="yellow" />
                                <!-- Flores laterales -->
                                <!-- Izquierda -->
                                <circle cx="20" cy="20" r="5" fill="red" />
                                <circle cx="18" cy="24" r="5" fill="orange" />
                                <!-- Derecha -->
                                <circle cx="36" cy="20" r="5" fill="red" />
                                <circle cx="38" cy="24" r="5" fill="orange" />
                            </g>
                            <defs>
                                <clipPath id="clip0_822_6335">
                                    <rect width="56" height="56" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <a href="./products.php?category=11"><span>Bouquet de Flores</span></a>
                </div>

                <div class="card">
                    <span>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_822_6335)">
                                <!-- Base del ramo (cinta) -->
                                <ellipse cx="28" cy="44" rx="12" ry="6" fill="brown" />
                                <!-- Tallo del ramo -->
                                <rect x="26" y="20" width="4" height="24" fill="green" />
                                <!-- Flores principales del ramo -->
                                <!-- Flor central -->
                                <circle cx="28" cy="16" r="5" fill="pink" stroke="black" stroke-width="1" />
                                <!-- Flor izquierda superior -->
                                <circle cx="22" cy="14" r="5" fill="red" stroke="black" stroke-width="1" />
                                <!-- Flor derecha superior -->
                                <circle cx="34" cy="14" r="5" fill="yellow" stroke="black" stroke-width="1" />
                                <!-- Flor izquierda inferior -->
                                <circle cx="24" cy="22" r="5" fill="orange" stroke="black" stroke-width="1" />
                                <!-- Flor derecha inferior -->
                                <circle cx="32" cy="22" r="5" fill="purple" stroke="black" stroke-width="1" />
                                <!-- Decoraciones del ramo -->
                                <line x1="28" y1="20" x2="24" y2="26" stroke="green" stroke-width="2" stroke-linecap="round" />
                                <line x1="28" y1="20" x2="32" y2="26" stroke="green" stroke-width="2" stroke-linecap="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_822_6335">
                                    <rect width="56" height="56" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <a href="./products.php?category=12"><span>Ramo con frutas</span><a>
                </div>

                <div class="card">
                    <span>
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_822_6335)">
                                <!-- Base del icono de eventos florales -->
                                <rect x="10" y="14" width="36" height="28" fill="lightgray" stroke="black" stroke-width="2" />
                                <!-- Cabecera del calendario -->
                                <rect x="10" y="14" width="36" height="6" fill="darkgray" />
                                <!-- Flor decorativa central -->
                                <circle cx="28" cy="28" r="6" fill="pink" stroke="black" stroke-width="1" />
                                <circle cx="28" cy="22" r="3" fill="yellow" stroke="black" stroke-width="1" />
                                <circle cx="24" cy="26" r="3" fill="yellow" stroke="black" stroke-width="1" />
                                <circle cx="32" cy="26" r="3" fill="yellow" stroke="black" stroke-width="1" />
                                <circle cx="24" cy="30" r="3" fill="yellow" stroke="black" stroke-width="1" />
                                <circle cx="32" cy="30" r="3" fill="yellow" stroke="black" stroke-width="1" />
                                <!-- Líneas horizontales de los días -->
                                <line x1="14" y1="22" x2="42" y2="22" stroke="black" stroke-width="1" />
                                <line x1="14" y1="30" x2="42" y2="30" stroke="black" stroke-width="1" />
                                <line x1="14" y1="38" x2="42" y2="38" stroke="black" stroke-width="1" />
                                <!-- Líneas verticales de los días -->
                                <line x1="18" y1="20" x2="18" y2="42" stroke="black" stroke-width="1" />
                                <line x1="26" y1="20" x2="26" y2="42" stroke="black" stroke-width="1" />
                                <line x1="34" y1="20" x2="34" y2="42" stroke="black" stroke-width="1" />
                            </g>
                            <defs>
                                <clipPath id="clip0_822_6335">
                                    <rect width="56" height="56" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <a href="./products.php?category=13"><span>Eventos</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Category  -->
    <!-- Start Advertise  -->
    <div class="adver">
        <div class="container">
            <div class="cover">
                <span class="title">Flores y Detalles con Estilo Manizales</span>
                <span class="desc">Eventos con estilo<br />Cotiza tu evento</span>

                <button onclick="location.href='#'">
                    Cotizar ahora!
                </button>
            </div>
        </div>
    </div>
    <!-- End Advertise  -->
    <!-- Start Products  -->
    <div class="products">
        <div class="container">
            <div class="categ-header">
                <div class="sub-title">
                    <span class="shape"></span>
                    <span class="title">Nuestros Productos</span>
                </div>
                <h2>Conozca nuestros productos</h2>
            </div>
            <div class="row mb-3">
                <?php
                getProduct(6);
                getIPAddress();
                ?>
            </div>
            <div class="view d-flex justify-content-center align-items-center">
                <button onclick="location.href='./products.php'">Ver Todos Los Productos</button>
            </div>
        </div>
    </div>
    <!-- End Products  -->


    <!-- divider  -->
    <div class="container">
        <div class="divider"></div>
    </div>
    <!-- divider  -->

    <!-- Start Footer -->
     <div class="upper-nav primary-bg p-2 px-3 text-center text-break">
        <span>Todo con derechos de autor&copy;2024 - Flores y Detalles con Estilo Manizales.</span>
    </div>
    <!-- End Footer -->

    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>

</html>