<?php
// Incluye el archivo de conexión desde la carpeta modelos
require_once "../modelos/conexion.php";

// Obtenemos la conexión usando la clase Conexion de la carpeta modelos y el archivo conexion.php //
$conexion = Conexion::conectar();
//fin de la conexión

// Consulta para obtener categorías
$sqlCategorias = "SELECT id, categoria FROM categorias";
$stmtCategorias = $conexion->prepare($sqlCategorias);
$stmtCategorias->execute();
$categorias = $stmtCategorias->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener productos filtrados según selección del usuario
$sql = "SELECT p.*, c.categoria, m.marca, md.madela 
        FROM productos p 
        LEFT JOIN categorias c ON p.id_categoria = c.id 
        LEFT JOIN marcas m ON p.id_marca = m.id 
        LEFT JOIN madelas md ON p.id_madela = md.id 
        WHERE 1=1";

if (isset($_GET['categorias']) && !empty($_GET['categorias']) && !in_array('todas', $_GET['categorias'])) {
    $categoriasSeleccionadas = $_GET['categorias'];
    $placeholders = str_repeat('?,', count($categoriasSeleccionadas) - 1) . '?';
    $sql .= " AND p.id_categoria IN ($placeholders)";
}

if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $sql .= " AND p.descripcion LIKE ?";
}

$stmt = $conexion->prepare($sql);

$paramIndex = 1;
if (isset($_GET['categorias']) && !empty($_GET['categorias']) && !in_array('todas', $_GET['categorias'])) {
    foreach ($_GET['categorias'] as $categoriaId) {
        $stmt->bindValue($paramIndex++, $categoriaId, PDO::PARAM_INT);
    }
}

if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
    $buscarTermino = "%" . $_GET['buscar'] . "%";
    $stmt->bindValue($paramIndex, $buscarTermino, PDO::PARAM_STR);
}

$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            max-height: 50px;
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
                                <img src="#" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-lg-block">
                        Los Mejores herramientas de la Ciudad
                    </p>

                    <div class="mobile-menu fix mb-3"></div>
                    <div class="offcanvas__contact">
                        <div class="header-button mt-4">
                            <a href="https://wa.me/59175620296?text=QUIERO%20HACER%20UN%20PEDIDO EN POLLOS ROSSY"
                                target="BLANK" class="theme-btn" data-wow-delay=".5s">
                                <span class="button-content-wrapper d-flex align-items-center justify-content-center">
                                    <span class="button-icon"><i class="flaticon-delivery"></i></span>
                                    <span class="button-text">ordenar ahora</span>
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
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul>
                        <li><span>100%</span> Entrega responsable, rápida y segura</li>
                        <li><i class="fas fa-truck"></i>Pide ahora</li>
                    </ul>
                    <div class="top-right">
                    </div>
                </div>
            </div>
        </div>

        <div id="header-sticky" class="header-1">
            <div class="container">
                <div class="mega-menu-wrapper">
                    <div class="header-main">
                        <div class="logo">
                            <a href="index.php"
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
                                                <a href="login.php">Login</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="header-right d-flex justify-content-end align-items-center">
                            <div class="header-button">
                                <a href="https://wa.me/59175620296?text=QUIERO%20HACER%20UN%20CONSULTA DE HERRAMIENTA"
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

    <!-- Food Catagory Section Start -->
    <section class="food-category-section fix section-padding">
        <div class="container">
            <div class="row">
                <!-- Filtros de Categoría y Búsqueda -->
                <div class="col-lg-3">
                    <div class="woocommerce-notices-wrapper">
                        <form method="GET" action="shop.php" class="mt-4">
                            <!-- Categoría -->
                            <h4 class="mb-3" style="cursor: pointer;">Categorías</h4>
                            <div id="filter-categorias" style="display: block;">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="categorias[]" 
                                           value="todas" 
                                           id="cat_todas"
                                           <?= (!isset($_GET['categorias']) || empty($_GET['categorias']) || in_array('todas', $_GET['categorias'])) ? 'checked' : '' ?>
                                           onchange="toggleAllCategories(this)">
                                    <label class="form-check-label" for="cat_todas">
                                        Todas las categorías
                                    </label>
                                </div>
                                <?php foreach ($categorias as $categoria): ?>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input categoria-checkbox" type="checkbox" name="categorias[]" 
                                               value="<?= $categoria['id'] ?>" 
                                               id="cat_<?= $categoria['id'] ?>"
                                               <?= (isset($_GET['categorias']) && !empty($_GET['categorias']) && in_array($categoria['id'], $_GET['categorias'])) ? 'checked' : '' ?>
                                               onchange="updateTodasCategorias()">
                                        <label class="form-check-label" for="cat_<?= $categoria['id'] ?>">
                                            <?= htmlspecialchars($categoria['categoria']) ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Categorías seleccionadas -->
                            <div id="categorias-seleccionadas" class="mt-3 mb-3">
                                <h5>Categorías seleccionadas:</h5>
                                <div id="lista-categorias" class="small">
                                    <?php
                                    if (isset($_GET['categorias'])) {
                                        foreach ($_GET['categorias'] as $catId) {
                                            if ($catId == 'todas') {
                                                echo '<span class="badge bg-primary me-1">Todas las categorías</span>';
                                            } else {
                                                foreach ($categorias as $cat) {
                                                    if ($cat['id'] == $catId) {
                                                        echo '<span class="badge bg-primary me-1">' . htmlspecialchars($cat['categoria']) . '</span>';
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        echo '<span class="badge bg-primary me-1">Todas las categorías</span>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Buscar por Descripción -->
                            <h4 class="mt-4 mb-3">Buscar</h4>
                            <input type="text" name="buscar" class="form-control mb-3" 
                                   placeholder="Buscar producto..." 
                                   value="<?= isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">

                            <!-- Botón de Filtrar -->
                            <button type="submit" class="theme-btn-2 w-100">Aplicar</button>
                        </form>
                    </div>
                </div>

                <!-- Catálogo de Productos -->
                <div class="col-lg-9">
                    <div class="woocommerce-notices-wrapper">
                        <div class="product-showing mb-4">
                            <h5>Mostrando <span><?= count($productos) ?></span> productos</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php if (count($productos) > 0): ?>
                            <?php foreach ($productos as $producto): ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="catagory-product-card-2 shadow-style text-center">
                                        <div class="icon">
                                            <a href="https://wa.me/59178069757?text=Hola FerroExpress%20Quiero%20comprar%20este%20producto:%0A%0A*Descripción:*%20<?=urlencode(htmlspecialchars($producto['descripcion']))?>%0A*Categoría:*%20<?=urlencode(htmlspecialchars($producto['categoria']))?>%0A*Marca:*%20<?=urlencode(htmlspecialchars($producto['marca']))?>%0A*Tipo:*%20<?=urlencode(htmlspecialchars($producto['madela']))?>%0A*Unidad-Capacidad:*%20<?=urlencode(htmlspecialchars($producto['medida']))?>%0A*Precio:*%20<?=urlencode(number_format($producto['precio_venta'],2))?>%20Bs" target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                        <div class="catagory-product-image">
                                            <img src="../<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['descripcion']) ?>" class="img-fluid">
                                        </div>
                                        <div class="catagory-product-content">
                                            <div class="catagory-button">
                                                <a href="https://wa.me/59178069757?text=Hola FerroExpress%20Quiero%20comprar%20este%20producto:%0A%0A*Descripción:*%20<?=urlencode(htmlspecialchars($producto['descripcion']))?>%0A*Categoría:*%20<?=urlencode(htmlspecialchars($producto['categoria']))?>%0A*Marca:*%20<?=urlencode(htmlspecialchars($producto['marca']))?>%0A*Tipo:*%20<?=urlencode(htmlspecialchars($producto['madela']))?>%0A*Unidad-Capacidad:*%20<?=urlencode(htmlspecialchars($producto['medida']))?>%0A*Precio:*%20<?=urlencode(number_format($producto['precio_venta'],2))?>%20Bs" 
                                                   target="_blank" 
                                                   class="theme-btn-2">
                                                    <i class="fab fa-whatsapp"></i> Pedir
                                                </a>
                                            </div>
                                            <div class="info-price d-flex align-items-center justify-content-center">
                                                <h6><?= number_format($producto['precio_venta'], 2) ?> Bs</h6>
                                            </div>
                                            <h4>
                                                <a href="#"><?= htmlspecialchars($producto['descripcion']) ?></a>
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
                        <?php else: ?>
                            <div class="col-12 text-center">
                                <h3>No se encontraron productos</h3>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Yango -->
    <section class="main-cta-banner-2 section-padding bg-cover"
        style="background-image: url('assets/img/banner/main-cta-bg-2.webp');">
        <div class="tomato-shape-left float-bob-y">
            <img src="assets/img/h11.png" alt="shape-img">
        </div>
        <div class="chili-shape-right float-bob-y">
            <img src="assets/img/h12.png" alt="shape-img">
        </div>
        <div class="container">
            <div class="main-cta-banner-wrapper-2 d-flex align-items-center justify-content-between">
                <div class="section-title mb-0">
                    <span class="theme-color-3 wow fadeInUp">Seguro y confiable</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">
                        20 Minutos rápido <br>
                        <span class="theme-color-3">delivery</span>
                    </h2>
                </div>
                <a href="https://wa.me/59175620296?text=QUIERO%20HACER%20UN%20PEDIDO EN POLLOS ROSSY" target="BLANK"
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
    <!--<< Magnific Popup Js >>-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!--<< GSAP Animation Js >>-->
    <script src="assets/js/animation.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="assets/js/wow.min.js"></script>
    <!--<< Main.js >>-->
    <script src="assets/js/main.js"></script>

    <script>
    // Función para reiniciar las selecciones al cargar la página
    window.onload = function() {
        // Desmarcar todos los checkboxes
        const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
        categoriaCheckboxes.forEach(cat => {
            cat.checked = false;
        });
        
        // Marcar solo "Todas las categorías"
        const todasCheckbox = document.getElementById('cat_todas');
        todasCheckbox.checked = true;
        
        // Actualizar la lista de categorías seleccionadas
        updateCategoriasSeleccionadas();
    };

    function toggleAllCategories(checkbox) {
        const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
        categoriaCheckboxes.forEach(cat => {
            cat.checked = checkbox.checked;
            cat.disabled = checkbox.checked;
        });
        updateCategoriasSeleccionadas();
    }

    function updateTodasCategorias() {
        const todasCheckbox = document.getElementById('cat_todas');
        const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
        const todasSeleccionadas = Array.from(categoriaCheckboxes).every(cat => cat.checked);
        todasCheckbox.checked = todasSeleccionadas;
        updateCategoriasSeleccionadas();
    }

    function updateCategoriasSeleccionadas() {
        const todasCheckbox = document.getElementById('cat_todas');
        const categoriaCheckboxes = document.querySelectorAll('.categoria-checkbox');
        const listaCategorias = document.getElementById('lista-categorias');
        listaCategorias.innerHTML = '';

        if (todasCheckbox.checked) {
            listaCategorias.innerHTML = '<span class="badge bg-primary me-1">Todas las categorías</span>';
        } else {
            categoriaCheckboxes.forEach(cat => {
                if (cat.checked) {
                    const label = cat.nextElementSibling.textContent.trim();
                    listaCategorias.innerHTML += `<span class="badge bg-primary me-1">${label}</span>`;
                }
            });
        }
    }
    </script>
</body>

</html>