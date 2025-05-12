<aside class="main-sidebar ">

    <section class="sidebar">

        <ul class="sidebar-menu">

            <?php

            if ($_SESSION["perfil"] == "Administrador") {

                echo '<li class="active">

                <a href="inicio">

                    <i class="fa fa-dashboard"></i> <!-- Cambiado a dashboard -->
                    <span>Inicio</span>

                </a>

            </li>

            <li>

                <a href="usuarios">

                    <i class="fa fa-users"></i> <!-- Cambiado a users -->

                    <span>Usuarios</span>

                </a>

            </li>';
            }


            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {

                echo '<li>

                <a href="categorias">

                    <i class="fa fa-tags"></i> <!-- Cambiado a tags -->
                    <span>Categorías</span>

                </a>

            </li>

            <li>

                <a href="marcas">

                    <i class="fa fa-tags"></i> <!-- Cambiado a tags -->
                    <span>Marcas</span>

                </a>

            </li>
            <li>

                <a href="madelas">

                    <i class="fa fa-tags"></i> <!-- Cambiado a tags -->
                    <span>Tipo de procuctos</span>
                     </a>

                 </li>

            

            <li>

                <a href="productos">

                    <i class="fa fa-cube"></i> <!-- Cambiado a cube -->
                    <span>Productos</span>

                </a>

            </li>';
            }

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

                echo '<li>

                <a href="clientes">
                <i class="fa fa-address-book"></i> <!-- Cambiado a address-book -->
                <span>Clientes</span>
                </a>

            </li>';
            }

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

                echo '<li class="treeview">

                <a href="#">

                <i class="fa fa-shopping-cart"></i> <!-- Cambiado a shopping-cart -->
                    <span>Ventas</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

                <ul class="treeview-menu">
                    
                    <li>

                        <a href="ventas">
                            
                            <i class="fa fa-list-alt"></i> <!-- Cambiado a list-alt -->
                            <span>Administrar ventas</span>

                        </a>

                    </li>

                    <li>

                        <a href="crear-venta">
                            
                            <i class="fa fa-plus-circle"></i> <!-- Cambiado a plus-circle -->
                            <span>Crear venta</span>

                        </a>

                    </li>';

                if ($_SESSION["perfil"] == "Administrador") {

                    echo '<li>

                        <a href="reportes">
                            
                            <i class="fa fa-file-text"></i> <!-- Cambiado a file-text -->
                            <span>Reporte de ventas</span>

                        </a>

                    </li>';
                }

                echo '</ul>

            </li>';
            }

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

                echo '<li class="treeview">

                <a href="#">

                <i class="fa fa-cart-plus"></i> <!-- Cambiado a cart-plus -->
                    <span>Compras</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

                <ul class="treeview-menu">
                    
                    <li>

                        <a href="compras">
                            
                            <i class="fa fa-list-ul"></i> <!-- Cambiado a list-ul -->
                            <span>Administrar compras</span>

                        </a>

                    </li>

                    <li>

                        <a href="crear-compra">
                            
                            <i class="fa fa-plus-square"></i> <!-- Cambiado a plus-square -->
                            <span>Crear compra</span>

                        </a>

                    </li>';

                if ($_SESSION["perfil"] == "Administrador") {

                    echo '<li>

                        <a href="reporte-compra">
                            
                            <i class="fa fa-file"></i> <!-- Cambiado a file -->
                            <span>Reporte de compras</span>

                        </a>

                    </li>';
                }

                echo '</ul>

            </li>';
            }

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {

                echo '<li>

                <a href="proveedor">

                    <i class="fa fa-truck"></i>
                    <span>Proveedor</span>

                </a>

            </li>';
            }

            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

                echo '<li class="treeview">

                <a href="#">

                    <i class="fa fa-file-archive-o"></i> <!-- Cambiado a file-archive-o -->
                    <span>Reportes</span>
                    
                    <span class="pull-right-container">
                    
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>

                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="reporte-venta">
                            <i class="fa fa-calendar"></i> <!-- Cambiado a calendar -->
                            <span>Rpt. Rango Vtas</span>
                        </a>
                    </li>
                    <li>
                        <a href="reporte-top-clientes-ventas">
                            <i class="fa fa-star"></i> <!-- Cambiado a star -->
                            <span>Clientes.Con más Vtas</span>
                        </a>
                    </li>
                    <li>
                        <a href="reporte-categoria">
                            <i class="fa fa-folder"></i> <!-- Cambiado a folder -->
                            <span>Rpt. Categorías</span>
                        </a>
                    </li>
                    <li>
                        <a href="ver-productos-faltantes">
                            <i class="fa fa-exclamation-triangle"></i> <!-- Cambiado a exclamation-triangle -->
                            <span>Rpt. Product Faltante</span>
                        </a>
                    </li>

                    <li>

                        <a href="reporte-top-productos">
                            
                            <i class="fa fa-trophy"></i> <!-- Cambiado a trophy -->
                            <span>Prod. más vendido</span>

                        </a>

                    </li>';

                if ($_SESSION["perfil"] == "Administrador") {

                    echo '<li>

                        <a href="ganancias-ventas">

                            <i class="fa fa-line-chart"></i> <!-- Cambiado a line-chart -->

                            <span>Rpt. de Ganancias</span>
                        </a>

                    </li>';
                }

                echo '</ul>

            </li>';
            }

            ?>

        </ul>

    </section>

</aside>