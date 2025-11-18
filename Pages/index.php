<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tech Orange</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../style.CSS" />
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

        <!-- contenedor de sugerencias -->
        <div id="sugerencias" class="sugerencias"></div>

        <div class="acciones">
          <a
            href="ver_carrito.php"
            class="btn-icono carrito"
            aria-label="Carrito"
          ></a>
        </div>
      </div>
    </header>

    <!-- Menú -->
    <nav class="menu">
        <div class="contenedor fila-menu">
            <a href="index.php" class="link-menu">Inicio</a>
            <a href="productos.php" class="link-menu">Productos</a>
            <a href="soporte.html" class="link-menu">Soporte</a>
        </div>
    </nav>

    <main>
        <!-- Banner -->
        <section class="contenedor hero">
            <div class="hero-caja">
                <div class="banner" aria-label="Banner"></div>
            </div>
        </section>

        <!-- Destacados -->
        <section class="contenedor destacados">
            <div class="cabecera-seccion">
                <h2 class="titulo">DESTACADOS</h2>
                <p class="subtitulo">
                    Compra los productos más vendidos de la página
                </p>
            </div>

            <div class="tarjetas">
                <?php include '../funciones/mostrar_destacados.php'; ?>
            </div>
        </section>

        <!-- Nosotros (texto) -->
        <section class="nosotros">
            <div class="contenedor">
                <div class="cabecera-seccion">
                    <h2 class="titulo">NOSOTROS</h2>
                    <p class="subtitulo">Conoce al Staff detrás de TechOrange</p>
                </div>
                <div class="texto-nosotros">
                    <p>
                        Somos cuatro webones de la EPET N°20 que nos juntamos con un
                        objetivo claro: crear este sitio web para aprobar la materia
                        Programación Web Dinámica.
                    </p>
                    <p>
                        No somos una gran empresa ni un equipo de desarrolladores con años
                        de experiencia: somos simplemente 4 webones con ganas de aprender,
                        meterle mano al código y demostrar que podemos llevar una idea a
                        la práctica.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <!-- Pie -->
    <footer class="pie">
        <div class="contenedor pie-grid">
            <div class="col">
                <h4>Secciones</h4>
                <ul class="lista">
                    <li><a href="../Pages/index.php">Inicio</a></li>
                    <li><a href="../Pages/productos.php">Productos</a></li>
                    <li><a href="../Pages/soporte.php">Soporte</a></li>
                </ul>
            </div>

            <div class="col">
                <h4>Contacto</h4>
                <ul class="contacto">
                    <li>2996286057</li>
                    <li>
                        <a href="mailto:laurang2018@gmail.com">laurang2018@gmail.com</a>
                    </li>
                    <li>
                        <a href="mailto:TechInformatica@gmail.com">TechInformatica@gmail.com</a>
                    </li>
                </ul>
                <div class="chips">
                    <a href="#" class="chip">Ayuda</a>
                    <a href="#" class="chip">Soporte técnico</a>
                </div>
            </div>

            <div class="col">
                <h4>Ubicación</h4>
                <p>Maria Curie 2375, Neuquén Capital Q8300 CP</p>
                <div class="mapa placeholder" aria-label="Mapa"></div>
            </div>
        </div>
    </footer>
    <!-- Script carrito -->
    <script>
        let carrito = [];

        // Mostrar/ocultar carrito al hacer clic
        document.getElementById("carrito-icon").addEventListener("click", () => {
            const c = document.getElementById("carrito-flotante");
            c.style.display = c.style.display === "none" || c.style.display === "" ? "block" : "none";
        });

        function agregarAlCarrito(id, nombre, precio, imagen) {
            carrito.push({
                id,
                nombre,
                precio,
                imagen
            });
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