<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Productos - Tech Orange</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../carrito.css">
</head>

<body>
    <!-- Barra superior -->
    <header class="barra">
        <div class="contenedor fila-barra">
            <div class="logo">
                <span class="logo-fuerte">TECH</span>
                <span class="logo-naranja">ORANGE</span>
            </div>

            <div class="buscador" style="position: relative;">
                <input type="text" id="inputBuscar" placeholder="Buscar productos..." />
                <button class="btn-buscar" id="btnBuscar">Buscar</button>
                <div id="sugerencias" class="sugerencias"></div>
            </div>

            <!-- Ícono del carrito -->
            <img id="carrito-icon" src="../imagenes/carrito.png" alt="Carrito" class="carrito-icon">

            <!-- Carrito flotante -->
            <div id="carrito-flotante" class="carrito-flotante">
                <h4>Carrito</h4>
                <div id="carrito-items"></div>
                <p id="carrito-total">Total: $0</p>
            </div>

        </div>
    </header>

    <!-- Menú -->
    <nav class="menu">
        <div class="contenedor fila-menu">
            <a href="index.php">Inicio</a>
            <a href="productos.php">Productos</a>
            <a href="soporte.html">Soporte</a>
        </div>
    </nav>

    <main>
        <section class="contenedor destacados">
            <div class="cabecera-seccion">
                <h2 class="titulo">PRODUCTOS</h2>
                <p class="subtitulo">Elegí entre teclados, mouses y auriculares</p>

                <!-- Filtro -->
                <div class="filtro-categorias">
                    <a href="productos.php">Todos</a> |
                    <a href="productos.php?categoria=Teclado">Teclados</a> |
                    <a href="productos.php?categoria=Mouse">Mouses</a> |
                    <a href="productos.php?categoria=auricular">Auriculares</a>
                </div>
            </div>

            <div class="tarjetas">
                <?php include '../funciones/mostrar_productos.php'; ?>
            </div>
        </section>
    </main>

    <!-- Script carrito -->
    <script>
        let carrito = [];

        // Mostrar/ocultar carrito al hacer clic
        document.getElementById("carrito-icon").addEventListener("click", () => {
            const c = document.getElementById("carrito-flotante");
            c.style.display = c.style.display === "none" || c.style.display === "" ? "block" : "none";
        });

        function agregarAlCarrito(id, nombre, precio, imagen) {
            carrito.push({ id, nombre, precio, imagen });
            actualizarCarrito();
        }
        function eliminarDelCarrito(index) {
            carrito.splice(index, 1);
            actualizarCarrito();
        }

        function actualizarCarrito() {
            const cont = document.getElementById("carrito-items");
            const totalTexto = document.getElementById("carrito-total");

            cont.innerHTML = "";
            let total = 0;

            carrito.forEach((item, index) => {
                total += item.precio;

                cont.innerHTML += `
    <div class="carrito-item">
        <img src="../imagenes/${item.imagen}" class="carrito-img">
        <div>
            <p class="carrito-nombre">${item.nombre}</p>
            <p class="carrito-precio">$${item.precio}</p>
            <button class="btn-eliminar" onclick="eliminarDelCarrito(${index})">Eliminar</button>
        </div>
    </div>
    `;
            });


            totalTexto.innerText = "Total: $" + total;
        }
    </script>

    <script src="../JS/buscador.js"></script>

</body>

</html>