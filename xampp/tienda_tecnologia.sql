-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2025 a las 03:13:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_tecnologia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `agregado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `categoria` enum('mouse','teclado','auricular') NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `categoria`, `precio`, `stock`, `descripcion`, `imagen`, `creado_en`) VALUES
(1, 'Mouse Gamer X1', 'mouse', 25.99, 10, 'Mouse ergonómico con DPI ajustable', 'mouse1.jpg', '2025-11-17 16:11:52'),
(2, 'Mouse Gamer X2', 'mouse', 30.50, 15, 'Mouse inalámbrico con luz RGB', 'mouse2.jpg', '2025-11-17 16:11:52'),
(3, 'Mouse Office M1', 'mouse', 15.00, 20, 'Mouse básico para oficina', 'mouse3.jpg', '2025-11-17 16:11:52'),
(4, 'Mouse Ergonomico E1', 'mouse', 28.00, 12, 'Diseño ergonómico para largas jornadas', 'mouse4.jpg', '2025-11-17 16:11:52'),
(5, 'Mouse Inalambrico W1', 'mouse', 22.50, 18, 'Mouse inalámbrico con batería larga duración', 'mouse5.jpg', '2025-11-17 16:11:52'),
(6, 'Mouse Gamer X3', 'mouse', 35.00, 8, 'Mouse profesional con 6 botones programables', 'mouse6.jpg', '2025-11-17 16:11:52'),
(7, 'Mouse Compacto C1', 'mouse', 18.00, 25, 'Mouse pequeño y portátil', 'mouse7.jpg', '2025-11-17 16:11:52'),
(8, 'Teclado Mecánico T1', 'teclado', 50.00, 10, 'Teclado mecánico con retroiluminación', 'teclado1.jpg', '2025-11-17 16:11:52'),
(9, 'Teclado Membrana M1', 'teclado', 20.00, 20, 'Teclado de membrana silencioso', 'teclado2.jpg', '2025-11-17 16:11:52'),
(10, 'Teclado Inalambrico W1', 'teclado', 35.00, 15, 'Teclado inalámbrico compacto', 'teclado3.jpg', '2025-11-17 16:11:52'),
(11, 'Teclado Gamer G1', 'teclado', 60.00, 8, 'Teclado gamer con macros programables', 'teclado4.jpg', '2025-11-17 16:11:52'),
(12, 'Teclado Slim S1', 'teclado', 25.00, 18, 'Teclado delgado y elegante', 'teclado5.jpg', '2025-11-17 16:11:52'),
(13, 'Teclado RGB R1', 'teclado', 55.00, 12, 'Teclado con iluminación RGB completa', 'teclado6.jpg', '2025-11-17 16:11:52'),
(14, 'Teclado Basic B1', 'teclado', 15.00, 30, 'Teclado básico para uso diario', 'teclado7.jpg', '2025-11-17 16:11:52'),
(15, 'Auriculares Gamer A1', 'auricular', 40.00, 10, 'Auriculares con sonido envolvente 7.1', 'auricular1.jpg', '2025-11-17 16:11:53'),
(16, 'Auriculares Inalambricos W1', 'auricular', 35.00, 15, 'Auriculares inalámbricos con batería larga', 'auricular2.jpg', '2025-11-17 16:11:53'),
(17, 'Auriculares Office O1', 'auricular', 20.00, 20, 'Auriculares cómodos para oficina', 'auricular3.jpg', '2025-11-17 16:11:53'),
(18, 'Auriculares Bass B1', 'auricular', 45.00, 12, 'Auriculares con graves potentes', 'auricular4.jpg', '2025-11-17 16:11:53'),
(19, 'Auriculares Compact C1', 'auricular', 25.00, 18, 'Auriculares plegables y portátiles', 'auricular5.jpg', '2025-11-17 16:11:53'),
(20, 'Auriculares Gamer G2', 'auricular', 50.00, 8, 'Auriculares con micrófono y RGB', 'auricular6.jpg', '2025-11-17 16:11:53'),
(21, 'Auriculares Basic B1', 'auricular', 15.00, 30, 'Auriculares económicos para uso diario', 'auricular7.jpg', '2025-11-17 16:11:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `search_logs`
--

CREATE TABLE `search_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `termino` varchar(150) NOT NULL,
  `buscado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `email`, `password_hash`, `role`, `creado_en`) VALUES
(1, 'Administrador', 'admin@tienda.com', 'admin123', 'admin', '2025-11-17 15:41:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `search_logs`
--
ALTER TABLE `search_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `search_logs`
--
ALTER TABLE `search_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `search_logs`
--
ALTER TABLE `search_logs`
  ADD CONSTRAINT `search_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
