<?php
session_start();
require 'Conexion.php';
// Lee el archivo JSON y decodifica los datos
$jsonData = file_get_contents('precios.json');
$precios = json_decode($jsonData, true);

function obtenerPrecio($id, $precios)
{
    foreach ($precios as $precio) {
        if ($precio['id'] == $id) {
            return $precio['precio'];
        }
    }
    return null;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Proyecto nuevo.ico">
    <title>CAPIBARA STORE - TIENDA</title>
    <link rel="stylesheet" href="styleGeneral.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="cover.jpg" class="imag">
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="btn-grow">Inicio</a></li>
                
                <li><a href="tienda.php" class="btn-grow">Tienda</a></li>
                
                <li><a href="#contact" class="btn-grow">Contacto</a></li>
                
                <?php
                // Verifica si la sesión 'Usuario' existe y si 'admin' está definido y es true
                if (isset($_SESSION['Usuario']) && isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                    // El usuario es administrador
                    echo '<li><a href="CerrarSesion.php" class="btn-grow">Cerrar Sesión</a></li>';
                } else {
                    // El usuario no es administrador o no ha iniciado sesión
                    if (isset($_SESSION['Usuario'])) {
                        // El usuario ha iniciado sesión pero no es administrador
                        echo '<li><a href="CerrarSesion.php" class="btn-grow">Cerrar Sesión</a></li>';
                    } else {
                        // El usuario no ha iniciado sesión
                        echo '<li><a href="iniciocapibara.php" class="btn-grow">Iniciar Sesión</a></li>';
                        echo '<li><a href="CrearCuenta.php" class="btn-grow">Registrarse</a></li>';
                    }
                }
                ?>
            </ul>
            <div class="container-icon">
                <div class="container-cart-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-cart">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <div class="count-products">
                        <span id="contador-productos">0</span>
                    </div>
                </div>
                <div class="container-cart-products hidden-cart">
                    <div class="row-product">
                        <div class="cart-product">
                            <div class="info-cart-product">
                                <span class="cantidad-carrito-producto"></span>
                                <p class="titulo-procuto-carrito"></p>
                                <span class="precio-producto-carrito"></span>
                            </div>
                            <img src="fotos tienda/borrar.jpg" alt="Eliminar producto" class="btn-remove-unit">
                        </div>
                        <div class="cart-total">
                            <h3>Total</h3>
                            <span class="total-pagar"></span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <h1>REMERAS</h1>
    <hr>
    <div class="container_items">
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera1.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XS</h2>
                <p class="precio" data-id="0.1">$<?php echo obtenerPrecio(0.1, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.1">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera1.jpg">Agregar al carrito</button>
            </div>
        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera2.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara S</h2>
                <p class="precio" data-id="0.2">$<?php echo obtenerPrecio(0.2, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.2">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera2.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera3.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara M</h2>
                <p class="precio" data-id="0.3">$<?php echo obtenerPrecio(0.3, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.3">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera3.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera4.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara L</h2>
                <p class="precio" data-id="0.4">$<?php echo obtenerPrecio(0.4, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.4">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera4.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera5.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XL</h2>
                <p class="precio" data-id="0.5">$<?php echo obtenerPrecio(0.5, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.5">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera5.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera6.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XL</h2>
                <p class="precio" data-id="0.6">$<?php echo obtenerPrecio(0.6, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.6">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera6.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera7.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XL</h2>
                <p class="precio" data-id="0.7">$<?php echo obtenerPrecio(0.7, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.7">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera7.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera8.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XL</h2>
                <p class="precio" data-id="0.8">$<?php echo obtenerPrecio(0.8, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.8">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera8.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen">
            <figure>
                <img src="fotos tienda/remera9.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Remera Capibara XL</h2>
                <p class="precio" data-id="0.9">$<?php echo obtenerPrecio(0.9, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="0.9">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/remera9.jpg">Agregar al carrito</button>
            </div>

        </div>
    </div>
    <!-- //////////////////////////////////////////////////////-->
    <hr>
    <h2>PANTALONES</h2>
    <hr>
    <!-- ///////////////////////////////////////////////////// -->
    <div class="container_items2">
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon1.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 34</h2>
                <p class="precio" data-id="1">$<?php echo obtenerPrecio(1, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="1">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon1.jpg">Agregar al carrito</button>
            </div>
        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon2.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 40</h2>
                <p class="precio" data-id="2">$<?php echo obtenerPrecio(2, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="2">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon2.jpg">Agregar al carrito</button>
            </div>
        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon3.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 54</h2>
                <p class="precio" data-id="3">$<?php echo obtenerPrecio(3, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="3">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon3.jpg">Agregar al carrito</button>
            </div>
        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon4.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 50</h2>
                <p class="precio" data-id="4">$<?php echo obtenerPrecio(4, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="4">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon4.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon5.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 38</h2>
                <p class="precio" data-id="5">$<?php echo obtenerPrecio(5, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="5">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon5.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon6.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 40</h2>
                <p class="precio" data-id="6">$<?php echo obtenerPrecio(6, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="6">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon6.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon7.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 48</h2>
                <p class="precio" data-id="7">$<?php echo obtenerPrecio(7, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="7">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon7.jpg">Agregar al carrito</button>
            </div>

        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon8.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 36</h2>
                <p class="precio" data-id="8">$<?php echo obtenerPrecio(8, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="8">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon8.jpg">Agregar al carrito</button>
            </div>
        </div>
        <div class="grid-imagen2">
            <figure>
                <img src="fotos tienda/pantalon9.jpg" alt="producto" />
            </figure>
            <div class="info_producto">
                <h2>Pantalon Capibara 36</h2>
                <p class="precio" data-id="9">$<?php echo obtenerPrecio(9, $precios); ?></p>
                <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                    <button class="btn-edit-price" data-id="9">Editar Precio</button>
                <?php endif; ?>
                <button class="btn-add-cart" data-img="fotos tienda/pantalon9.jpg">Agregar al carrito</button>
            </div>
        </div>
    </div>
    <!-- //////////////////////////////////////////////////////-->
    <footer>
        <div class="contenedor">
            <ul>
                <li><a href="https://www.instagram.com/capibara_store1/">&copy;CAPIBARA 2023</a></li>
            </ul>
            <div id="contact">

                <form action="save_message.php" method="post">
                    <label for="name">Nombre:</label>
                    <input type="text" id="name" name="name">
                    <label for="name">Contacto:</label>
                    <input type="text" id="contacto" name="contacto">
                    <label for="message">Mensaje:</label>
                    <textarea name="message" id="message" cols="30" rows="2"></textarea>
                    <input type="submit" class="enviarmensaje" value="Enviar mensaje">
                </form>
            </div>
        </div>

    </footer>
    <script src="tienda.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit-price');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const articuloId = this.getAttribute('data-id');
                    const precioElement = document.querySelector(`.precio[data-id="${articuloId}"]`);
                    const nuevoPrecio = prompt('Ingrese el nuevo precio:', precioElement.textContent.replace('$', ''));

                    if (nuevoPrecio !== null) {
                        precioElement.textContent = `$${nuevoPrecio}`;
                        actualizarPrecio(articuloId, nuevoPrecio);
                    }
                });
            });
        });
    </script>
</body>

</html>