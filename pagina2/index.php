<?php
// Incluye el archivo de conexión desde la carpeta modelos
require_once "../modelos/conexion.php";

// Obtenemos la conexión usando la clase Conexion de la carpeta modelos y el archivo conexion.php //
$conexion = Conexion::conectar();
//fin de la conexión
// Consulta para obtener productos destacados para la sección de categorías
$sql = "SELECT p.*, c.categoria, m.marca, md.madela 
        FROM productos p 
        LEFT JOIN categorias c ON p.id_categoria = c.id 
        LEFT JOIN marcas m ON p.id_marca = m.id 
        LEFT JOIN madelas md ON p.id_madela = md.id 
        LIMIT 10";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$productosDestacados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener categorías
$sqlCategorias = "SELECT id, categoria AS nombre FROM categorias";
$stmtCategorias = $conexion->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener marcas
$sqlMarcas = "SELECT id, marca AS nombre FROM marcas";
$stmtMarcas = $conexion->prepare($sqlMarcas);
$stmtMarcas->execute();
$marcas = $stmtMarcas->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="modinatheme">
    <meta name="description" content="Foodking - Fast Food Restaurant Html">
    <!-- ======== Page title ============ -->
    <title>FERROEXPRESS</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="assets/img/hero/logomini.png">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--<< Font Awesome.css >>-->
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--<< Style.css >>-->

    <style>
        .brand-image img {
            max-width: 80px;
            /* Ajusta el ancho máximo */
            max-height: 50px;
            /* Ajusta la altura máxima */
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }

        .testimonial-image-slider {
            display: none !important;
        }

        .pollos-rossy-titulo {
            font-family: 'Bangers', Impact, Arial, sans-serif;
            font-size: 48px;
            color: #fff200 !important;
            text-shadow:
                4px 4px 0 #000,
                8px 8px 15px #ff3300;
            letter-spacing: 2px;
            font-weight: bold;
            padding: 5px 0;
            display: inline-block;
        }

        .product-details {
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            margin: 10px 0;
        }

        .product-details p {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .product-details strong {
            color: #333;
            font-weight: 600;
        }

        .catagory-product-card-2 {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .catagory-product-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .catagory-product-image img {
            max-height: 200px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!-- cragando -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span class="letters-loading">
                    S
                </span>
                <span class="letters-loading">
                    I
                </span>
                <span class="letters-loading">
                    S
                </span>
                <span class="letters-loading">
                    T
                </span>
                <span class=" letters-loading">
                    E
                </span>
                <span class="letters-loading">
                    T
                </span>
                <span class="letters-loading">
                    E
                </span>
                <span class="letters-loading">
                    M
                </span>
                <span class="letters-loading">
                    A
                </span>
                <span class="letters-loading">
                    S
                </span>

            </div>
            <p class="text-center">Cargando..</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- boton derecho -->
    <div class="fix-area">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="index.html">
                                <img src="assets/img/hero/logomini.png" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-lg-block">
                        Los Mejores Pollo de la Ciudad
                    </p>

                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">


                        <div class="header-button mt-4">
                            <a href="https://wa.me/59178164099?text=HOLA QUIERO%20HACER%20UNA%20CONSULTA DE UNAS HERRAMIENTAS"
                                target="BLANK" class="theme-btn" data-wow-delay=".5s">
                                <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                    <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                    <span class="button-text">Consulta ahora</span>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- MENU PRINCIPAL -->
    <header class="section-bg">

        <div id="header-sticky" class="header-1">
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="logo">
                            <a href="index.html"
                                class=" pollos-rossy-titulo navbar-brand text-success logo h1 align-self-center">
                                FERROEXPRESS</a>
                        </div>
                        <div class="header-left">
                            <div class="mean__menu-wrapper d-none d-lg-block">
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="active" style="padding-left: -20px;">
                                                <a href="index.php">
                                                    INICIO
                                                </a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="shop.php">
                                                    Catalogo
                                                </a>
                                            </li>
                                            <li>
                                                <a href="about.html">
                                                    Nosostros
                                                </a>

                                            </li>
                                            <li>
                                                <a href="testimonial.html">
                                                    Testimonios
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contactanos</a>
                                            </li>

                                            <li>
                                                    <a href="../login">Login</a>
                                         </li>
                                        </ul>
                                    </nav>
                                    <!-- for wp -->
                                </div>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">

                            <div class="header-button">

                              <a href="https://wa.me/59178164099?text=HOLA QUIERO%20HACER%20UNA%20CONSULTA DE UNAS HERRAMIENTAS"
                                    target="BLANK" class="theme-btn bg-red-2" data-wow-delay=".5s">Pide aquí</a>

                            </div>

                            <div class="header__hamburger d-xl-block my-auto">
                                <div class="sidebar__toggle">
                                    <div class="header-bar">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- FIN DEL MENU PRINCIPAL -->
    <!-- Hero Section Start -->
    <section class="hero-section">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-1 bg-cover" style="background-image: url('assets/img/hero/hero-bg.webp');">
                        <!-- <div class="chilii-shape" data-animation="fadeInUp" data-delay="2.1s">
                                <img src="assets/img/hero/chilli-shape.webp" alt="shape-img">
                            </div>
                            <div class="fire-shape" data-animation="fadeInUp" data-delay="2.4s">
                                <img src="assets/img/hero/fire-shape.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-2" data-animation="fadeInUp" data-delay="2.7s">
                                <img src="assets/img/hero/chilli-shape-2.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-3" data-animation="fadeInUp" data-delay="3s">
                                <img src="assets/img/hero/chilli-shape-3.webp" alt="shape-img">
                            </div>
                            <div class="offer-shape"  data-animation="fadeInUp" data-delay="2.1s">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/hammer.png" alt="hammer"/>
                            </div> -->
                        <h2 class="hero-back-title" data-animation="fadeInRight" data-delay="2.5s">FerroExpress</h2>
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-lg-7">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp"></p>
                                        <h1 data-animation="fadeInUp" data-delay="0.5s">
                                            <span>Un solo uso de calidad</span>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-5 mt-5 mt-lg-0">
                                    <div class="chiken-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="assets/img/hero/logomini.png" alt="chiken-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="hero-1 bg-cover" style="background-image: url('assets/img/hero/hero-bg.webp');">
                        <!-- <div class="chilii-shape" data-animation="fadeInUp" data-delay="2.1s">
                                <img src="assets/img/hero/chilli-shape.webp" alt="shape-img">
                            </div>
                            <div class="fire-shape" data-animation="fadeInUp" data-delay="2.4s">
                                <img src="assets/img/hero/fire-shape.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-2" data-animation="fadeInUp" data-delay="2.7s">
                                <img src="assets/img/hero/chilli-shape-2.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-3" data-animation="fadeInUp" data-delay="3s">
                                <img src="assets/img/hero/chilli-shape-3.webp" alt="shape-img">
                            </div>
                            <div class="offer-shape"  data-animation="fadeInUp" data-delay="2.1s">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/hammer.png" alt="hammer"/>
                            </div> -->
                        <h2 class="hero-back-title" data-animation="fadeInRight" data-delay="2.5s">FerroExpress</h2>
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-lg-7">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp"></p>
                                        <h1 data-animation="fadeInUp" data-delay="0.5s">
                                            <span>Un solo uso de calidad</span>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-5 mt-5 mt-lg-0">
                                    <div class="chiken-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="assets/img/p1.png" alt="chiken-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="hero-1 bg-cover" style="background-image: url('assets/img/hero/hero-bg.webp');">
                        <!-- <div class="chilii-shape" data-animation="fadeInUp" data-delay="2.1s">
                                <img src="assets/img/hero/chilli-shape.webp" alt="shape-img">
                            </div>
                            <div class="fire-shape" data-animation="fadeInUp" data-delay="2.4s">
                                <img src="assets/img/hero/fire-shape.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-2" data-animation="fadeInUp" data-delay="2.7s">
                                <img src="assets/img/hero/chilli-shape-2.webp" alt="shape-img">
                            </div>
                            <div class="chilii-shape-3" data-animation="fadeInUp" data-delay="3s">
                                <img src="assets/img/hero/chilli-shape-3.webp" alt="shape-img">
                            </div>
                            <div class="offer-shape"  data-animation="fadeInUp" data-delay="2.1s">
                                <img width="50" height="50" src="https://img.icons8.com/ios/50/hammer.png" alt="hammer"/>
                            </div> -->
                        <h2 class="hero-back-title" data-animation="fadeInRight" data-delay="2.5s">FerroExpress</h2>
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-lg-7">
                                    <div class="hero-content">
                                        <p data-animation="fadeInUp"></p>
                                        <h1 data-animation="fadeInUp" data-delay="0.5s">
                                            <span>Un solo uso de calidad</span>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-5 mt-5 mt-lg-0">
                                    <div class="chiken-image" data-animation="fadeInUp" data-delay="1.4s">
                                        <img src="assets/img/hero/img1.jpg" alt="chiken-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-dot text-center pt-5">
                <div class="dot"></div>
            </div>
        </div>
    </section>
    <!-- NUESTROS PRODUCTOS -->
    <section class="food-category-section fix section-padding section-bg">
       <!--  <div class="tomato-shape">
            <img src="assets/img/shape/tomato-shape-2.webp" alt="shape-img">
        </div>
        <div class="burger-shape-2">
            <img src="assets/img/shape/fry-shape-2.webp" alt="shape-img">
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-9">
                    <div class="section-title">
                        <span class="wow fadeInUp">Conoce</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Nuestros Productos</h2>
                    </div>
                </div>
                <div class="col-md-5 ps-0 col-3 text-end wow fadeInUp" data-wow-delay=".5s">
                    <div class="array-button">
                        <button class="array-prev"><i class="far fa-long-arrow-left"></i></button>
                        <button class="array-next"><i class="far fa-long-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="swiper food-catagory-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($productosDestacados as $producto): ?>
                        <div class="swiper-slide">
                            <div class="catagory-product-card-2 shadow-style text-center">
                                <div class="icon">
                                    <a href="https://wa.me/59178164099?text=Hola FerroExpress%20Quiero%20comprar%20este%20producto:%0A%0A*Descripción:*%20<?= urlencode(htmlspecialchars($producto['descripcion'])) ?>%0A*Categoría:*%20<?= urlencode(htmlspecialchars($producto['categoria'])) ?>%0A*Marca:*%20<?= urlencode(htmlspecialchars($producto['marca'])) ?>%0A*Tipo:*%20<?= urlencode(htmlspecialchars($producto['madela'])) ?>%0A*Unidad-Capacidad:*%20<?= urlencode(htmlspecialchars($producto['medida'])) ?>%0A*Precio:*%20<?= urlencode(number_format($producto['precio_venta'], 2)) ?>%20Bs" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                                <div class="catagory-product-image">
                                    <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['descripcion']) ?>" class="img-fluid">
                                </div>
                                <div class="catagory-product-content">
                                    <div class="catagory-button">
                                        <a href="https://wa.me/59178164099?text=Hola FerroExpress%20Quiero%20comprar%20este%20producto:%0A%0A*Descripción:*%20<?= urlencode(htmlspecialchars($producto['descripcion'])) ?>%0A*Categoría:*%20<?= urlencode(htmlspecialchars($producto['categoria'])) ?>%0A*Marca:*%20<?= urlencode(htmlspecialchars($producto['marca'])) ?>%0A*Tipo:*%20<?= urlencode(htmlspecialchars($producto['madela'])) ?>%0A*Unidad-Capacidad:*%20<?= urlencode(htmlspecialchars($producto['medida'])) ?>%0A*Precio:*%20<?= urlencode(number_format($producto['precio_venta'], 2)) ?>%20Bs"
                                            target="_blank"
                                            class="theme-btn-2">
                                            <i class="fab fa-whatsapp"></i> Pedir
                                        </a>
                                    </div>
                                    <div class="info-price d-flex align-items-center justify-content-center">
                                        <h6><?= number_format($producto['precio_venta'], 2) ?> Bs</h6>
                                    </div>
                                    <h4>
                                        <a href="shop.php"><?= htmlspecialchars($producto['descripcion']) ?></a>
                                    </h4>
                                    <div class="product-details">
                                        <p class="mb-2">
                                            <span class="badge bg-primary"><?= htmlspecialchars($producto['categoria']) ?></span>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Marca:</strong> <?= htmlspecialchars($producto['marca']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Tipo:</strong> <?= htmlspecialchars($producto['madela']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Unidad-Capacidad:</strong> <?= htmlspecialchars($producto['medida']) ?>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Stock:</strong> <?= isset($producto['stock']) ? htmlspecialchars($producto['stock']) : 'N/D' ?>
                                        </p>
                                    </div>
                                    <div class="star">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN NUESTROS PRODUCTOS -->


    <!-- NUESTROS PROVEEDORES -->
    <section class="brand-shape section-padding fix section-bg pt-0">
        <div class="container">
            <div class="brand-wrapper">
                <div class="brand-title">
                    <h4>
                        Conoce<span> Nuestros</span> Proveedores
                    </h4>
                </div>
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/monopol.png" alt="brand-img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/tramontina.png" alt="brand-img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/sinteplast.png" alt="brand-img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/ribepar.png" alt="brand-img">
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/plamat.png" alt="brand-img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/norton.png" alt="brand-img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/monterrey.png" alt="brand-img">
                            </div>
                        </div>
                        s
                        <div class="swiper-slide">
                            <div class="brand-image">
                                <img src="assets/img/brand/irwin.png" alt="brand-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN PROVEEDORES -->



    <!-- SECCION 4  -->
    <section class="grilled-banner fix section-padding bg-cover"
        style="background-image: url('assets/img/banner/main-bg.webp');">
        <!-- <div class="patato-shape">
                <img src="assets/img/hero/logomini.png" alt="shape-img">
            </div> -->
        <!-- <div class="tomato-shape">
            <img src="assets/img/shape/tomato-shape-2.webp" alt="shape-img">
        </div> -->
        <div class="container">
            <div class="grilled-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="grilled-content">
                            <h4 class="wow fadeInUp">
                                COMPRUEBA
                            </h4>
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">
                                Las<span>Mejores</span> Herramientas
                            </h2>
                            <h3 class="wow fadeInUp" data-wow-delay=".5s">
                                <a href="shop.html">
                                    de alta calidad
                                </a>

                            </h3>

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 mt-2 mt-lg-0 wow fadeInUp" data-wow-delay=".4s">
                        <div class="grilled-image">
                            <img src="assets/img/hero/logomini.png" alt="grilled-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN DE SECCION 4  -->

    <!-- TESTIMONIO DE CLIENTES -->
    <section class="testimonial-section fix section-padding section-bg">
        <div class="burger-shape">
            <img src="assets/img/h13.png" alt="burger-shape">
        </div>

        <div class="pizza-shape">
            <img src="assets/img/h12.png" alt="burger-shape">
        </div>
        <div class="container">
            <div class="testimonial-wrapper style-responsive">
                <div class="testimonial-items text-center">
                    <div class="swiper testimonial-content-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="client-info">
                                        <h4>Piter quenallata</h4>
                                        <h5>Cliente</h5>
                                    </div>
                                    <h3>
                                        "Las mejores herramientas en Santa Cruz. Con diseños bien acabado y
                                        presentables. ¡Volveria sin dudar!"
                                    </h3>
                                    <div class="star">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="client-info">
                                        <h4>Davian perez</h4>
                                        <h5>Cliente</h5>
                                    </div>
                                    <h3>
                                        "Siempre compro es esta fere3teria por su gran amabilidad en la atencion al
                                        cliente y su herramientas de calidad."
                                    </h3>
                                    <div class="star">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="client-info">
                                        <h4>Ariana Gutierrez</h4>
                                        <h5>Cliente</h5>
                                    </div>
                                    <h3>
                                        Se los recomiendo la ferreteria ferroexpress simpre esats las herramientas que
                                        necesitas
                                    </h3>
                                    <div class="star">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="testimonial-content">
                                    <div class="client-info">
                                        <h4>naomi quinteros</h4>
                                        <h5>Cliente</h5>
                                    </div>
                                    <h3>
                                        Pedí para llevar y me gustó que todo vino bien empacado. El pollo estaba rico
                                    </h3>
                                    <div class="star">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper testimonial-image-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">

                            </div>
                            <div class="swiper-slide">

                            </div>
                            <div class="swiper-slide">

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- FIN TESTIMONIO DE CLIENTES -->


    <!--Yango -->
    <section class="main-cta-banner-2 section-padding bg-cover"
        style="background-image: url('assets/img/banner/main-cta-bg-2.webp');">
        <!-- <div class="tomato-shape-left float-bob-y">
            <img src="assets/img/h11.png" alt="shape-img">
        </div>
        <div class="chili-shape-right float-bob-y">
            <img src="assets/img/h12.png" alt="shape-img">
        </div> -->
        <div class="container">
            <div class="main-cta-banner-wrapper-2 d-flex align-items-center justify-content-between">
                <div class="section-title mb-0">
                    <span class="theme-color-3 wow fadeInUp">Seguro y confiable</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                        20 Minutos rápido <br>
                        <span class="theme-color-3">delivery</span>
                    </h2>
                </div>
              <a href="https://wa.me/59178164099?text=HOLA QUIERO%20HACER%20UNA%20CONSULTA DE UNAS HERRAMIENTAS" target="BLANK"
                    class="theme-btn bg-white wow fadeInUp" data-wow-delay=".5s">
                    <span class="button-content-wrapper d-flex align-items-center">
                        <span class="button-icon"><i class="flaticon-delivery"></i></span>
                        <span class="button-text">Ordenar Ahora</span>
                    </span>
                </a>




                <div class="delivery-man">
                    <img src="assets/img/lol.webp" alt="img">
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-section fix">

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wrapper d-flex align-items-center justify-content-between">
                    <p class="wow fadeInLeft" data-wow-delay=".3s">
                        © Copyright <span class="theme-color-3">2025</span> <a href="index.html">SistemaPos</a>.Todos
                        los derechos reservados.
                        los derechos reservados.
                    </p>
                    <div class="card-image wow fadeInRight" data-wow-delay=".5s">
                        <img src="assets/img/card.webp" alt="card-img">
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back To Top Start -->
    <div class="scroll-up">
        <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!--<< All JS Plugins >>-->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="assets/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="assets/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!--<< CountDown Js >>-->
    <script src="assets/js/countdowncustom.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< GSAP Animation Js >>-->
    <script src="assets/js/animation.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>
</body>

</html>