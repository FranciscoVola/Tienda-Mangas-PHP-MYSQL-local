-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2025 at 06:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dw3_vola_francisco`
--

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `biografia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(7, 'Comedia'),
(5, 'Infantil'),
(4, 'Kodomo'),
(3, 'Seinen'),
(2, 'Shojo'),
(1, 'Shonen'),
(6, 'Suspenso');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_compra` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `id_usuario`, `fecha_compra`, `total`) VALUES
(7, 3, '2025-03-11 08:51:42', '25000.00'),
(8, 1, '2025-03-11 09:16:34', '23000.00'),
(9, 6, '2025-10-02 01:50:58', '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `detalles_manga`
--

CREATE TABLE `detalles_manga` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `formato` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id_detalle` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `detalle_compras`
--

INSERT INTO `detalle_compras` (`id_detalle`, `id_compra`, `id_producto`, `cantidad`, `precio_unitario`) VALUES
(7, 7, 9, 1, '25000.00'),
(8, 8, 10, 1, '23000.00'),
(9, 9, 8, 1, '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `mangas_categorias`
--

CREATE TABLE `mangas_categorias` (
  `manga_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `volumen` int(11) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `portada` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `volumen`, `fecha_publicacion`, `autor`, `portada`, `precio`, `descripcion`, `fecha_registro`, `id_categoria`) VALUES
(8, 'One Piece', 'Shonen', 105, '1997-06-22', 'Eiichiro Oda', 'one-piece.jpg', '20000.00', 'La historia de Monkey D. Luffy y su tripulación en busca del legendario tesoro One Piece.\r\n', '2025-03-11 07:04:43', 1),
(9, 'Naruto', 'Shonen', 72, '1991-09-21', 'Masashi Kishimoto', 'naruto.jpg', '25000.00', 'Naruto Uzumaki busca convertirse en el mejor ninja y Hokage de la aldea oculta.\r\n', '2025-03-11 07:09:20', 1),
(10, 'Death Note', 'Suspenso', 12, '2003-01-12', 'Tsugumi Ohba', 'death-note.jpg', '23000.00', 'Un estudiante obtiene un cuaderno mortal que puede matar a cualquiera cuyo nombre sea escrito en él.\r\n', '2025-03-11 07:31:39', 6),
(11, 'My Hero Academia (Boku no Hero Academia)', 'Shonen', 37, '2014-07-07', 'Kohei Horikoshi', 'academia.jpg', '29000.00', 'Un joven sin poderes intenta convertirse en el mejor héroe del mundo.', '2025-03-11 07:32:54', 1),
(12, 'Bleach', 'Shonen', 74, '1997-08-08', 'Tite Kubo', 'bleach.png', '28000.00', 'Ichigo Kurosaki se convierte en Shinigami y lucha para proteger a los vivos de los espíritus malignos conocidos como Hollow.\r\n', '2025-03-11 08:17:29', 1),
(13, 'Dragon Ball', 'Shonen', 42, '1984-03-12', 'Akira Toriyama', 'dragon-ball.jpg', '32000.00', 'Goku y sus amigos luchan contra poderosos enemigos mientras buscan las esferas del dragón que conceden deseos.\r\n', '2025-03-11 08:18:29', 1),
(14, 'Nana', 'Shojo', 21, '2000-05-26', 'Ai Yazawa', 'nana.jpg', '25000.00', 'Dos chicas con el mismo nombre, Nana, se conocen por casualidad y sus vidas se entrelazan en una historia de amor, música y amistad.\r\n', '2025-03-11 08:19:34', 2),
(15, 'Mahou Shoujo Site', 'Shojo', 16, '2013-07-19', 'Kentarou Satou', 'mahou-shoujo-site.jpg', '23000.00', 'Una estudiante acosada recibe poderes mágicos oscuros que la envuelven en una peligrosa lucha por la supervivencia.\r\n', '2025-03-11 08:20:32', 2),
(16, 'Pokémon ', 'Kodomo', 58, '1997-03-03', 'Hidenori Kusaka', 'pokemon.jpg', '26000.00', 'Un manga basado en el universo Pokémon que sigue las aventuras de Red y sus amigos en su búsqueda por completar la Pokédex.\r\n', '2025-03-11 08:22:14', 4),
(17, 'Hello Kitty', 'Kodomo', 10, '1974-01-11', 'Yuko Shimizu', 'kitty.jpg', '18000.00', 'Aventuras adorables protagonizadas por la icónica gata blanca Hello Kitty, ideales para todas las edades.\r\n', '2025-03-11 08:23:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` enum('admin','cliente','invitado') DEFAULT 'cliente',
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `contrasena`, `rol`, `fecha_registro`) VALUES
(1, 'fran', 'fran@gmail.com', '$2y$10$6h21t91phJku87Ra29sKieimGUivA4dtUtagEaWsVAOrzYLZYQose', 'admin', '2025-03-03 05:43:18'),
(3, 'Lucas', 'lucas@mail.com', '$2y$10$wqHjmmiXmAgQo5EF3HB9oOp1CNSxcpX3bLOe0gkeZGdzbdH.K4N.q', '', '2025-03-10 23:01:40'),
(5, 'roberto', 'roberto@gmail.com', '$2y$10$96Pv81PURPlUDI5oO/VLpegGwBJVGTrfih2EPHIoHromkBH5zsm5C', '', '2025-03-11 10:39:13'),
(6, 'Prueba', 'dosmil@mail.com', '$2y$10$MoK2M31yZPSAsg6tPlaG0OG4vrj8gTwkXToduCPub4c6DoW1MKlXK', '', '2025-10-02 04:49:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `detalles_manga`
--
ALTER TABLE `detalles_manga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `mangas_categorias`
--
ALTER TABLE `mangas_categorias`
  ADD PRIMARY KEY (`manga_id`,`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `detalles_manga`
--
ALTER TABLE `detalles_manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detalles_manga`
--
ALTER TABLE `detalles_manga`
  ADD CONSTRAINT `detalles_manga_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE,
  ADD CONSTRAINT `detalle_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mangas_categorias`
--
ALTER TABLE `mangas_categorias`
  ADD CONSTRAINT `mangas_categorias_ibfk_1` FOREIGN KEY (`manga_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mangas_categorias_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
