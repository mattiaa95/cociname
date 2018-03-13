-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2018 a las 18:18:22
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cociname`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` int(11) NOT NULL,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `receta_descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `porcion` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `nombre`, `id_user`, `receta_descripcion`, `precio`, `porcion`, `id_tipo`, `img`) VALUES
(41, 'Pulpo a la gallega', 19, 'Lo mejor que hay!', 8, 200, 2, '192890570.jpeg'),
(42, 'MOUSSE DE LIMÓN', 19, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 40, 150, 1, '1914051190.jpeg'),
(43, 'Croquetas Romanas', 22, '¡Estaba deseando preparar esta receta! Desde que vinimos de Roma no hay día que no me acuerde de estoss deliciosos Supplì alla romana ¡Menudo descubrimiento! Así que he aprovechado el finde los preparé.\r\n\r\nPara los que no los conozcáis, los supplì son unos croquetones ¡Enormes! Que se preparan a partir de un rissoto. Una de las variantes mas conocidas es la que hacen en la ciudad de Roma. Se prepara con arroz, carne y además va rellena de mozzarella. ¡Imaginaos que rico! Otro nombre que reciben estas croquetas son supplì al teléfono ya que al partirlas recién fritas el queso forma un hilo.', 15, 1222, 1, '2211588937.jpeg'),
(44, 'Filete de Cordero', 22, 'Los filetes de cordero tienen un sabor más suave que los de res, lo que permite preparaciones más fuertes, más elaboradas o más arriesgadas. Cocinarlos en la sartén es un procedimiento simple y rápido incluso para que los cocineros novatos tengan éxito. La parte más difícil es cómo condimentar los filetes. Para obtener los mejores resultados, escoge filetes de cordero clasificados de \"supremos\" por el USDA, si no te importa gastar un poco más de dinero en la carne. El cordero es relativamente magro, lo que lo hace una opción saludable, pero también significa que la carne se vuelve menos agradable si se cocina en exceso.', 17, 133, 3, '2231782339.jpeg'),
(45, 'Papas con mojo', 22, 'Esto es lo que dice la Academia Canaria de la Lengua sobre una de las palabras más típicas de su habla. “Ponme un pizco y un enyesque”, se oye en los bares canarios, mientras los peninsulares presentes se miran extrañados. Pero a partir de ahora ya no quedaréis como turistas ramplones, porque aquí nos encargamos de ilustraros. Un pizco normalmente es una copa (aunque también puede ser una porción pequeña de alguna cosa) y un enyesque, un aperitivo o tapa.', 33, 1222222, 2, '2223367194.jpeg'),
(46, 'Croquetas canarias', 22, 'Estas Croquetas caseras de atún son una verdadera delicia, me encanta hacerlas porque es una forma diferente de darle pescado a los niños y no tan niños como yo que no me gusta casi nada por no decir nada el pescado.\r\n\r\nSon muy fáciles de hacer, lo que da lata es darle forma, si tienes niñ@s pueden ayudarte, pasar un rato divertido e incluso, le pueden dar la forma que a ell@s más le guste, no tienen por que estar perfectas y más si están hechas por es@s enan@s, que sus caritas de felicidad a la hora de comer lo que ell@s han hecho vale la pena, eso si, se pondrán y pondrán perdida la cocina jajaja.', 22, 2323, 2, '2222269745.jpeg'),
(47, 'Arroz a la cubana', 19, 'El arroz a la cubana, es una receta de cocina que consiste en un arroz blanco, acompañado de una salsa de tomate, un huevo frito y un plátano pochado en mantequilla. Es una receta muy común y muy facil de hacer y que gustará a los amantes del arroz. Además tiene pocos ingredientes y todos ellos son muy baratos. Existen varias maneras de cocinar el arroz a la cubana pero, aquí vamos a hacer una forma “estándar”. Una forma que, sin duda, cumplirá con las expectativas creadas. Aunque puedes añadirle otros ingredientes, al gusto, como ajo, perejil o albahaca.\r\n\r\n', 21, 12, 2, '1922172775.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo`) VALUES
(1, 'Postres'),
(2, 'Entrantes'),
(3, 'Carne'),
(4, 'Pescados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario`, `nombre`, `apellido`, `fecha_nacimiento`, `descripcion`, `password`, `email`, `imagen`) VALUES
(19, 'juanjo', 'Juan Jose', 'Portela', '1993-06-15', 'Primer usuario y buen cocinero', '1234', 'juanjo@hotmail.com', '1993-06-1549508.jpeg'),
(20, 'mariana', 'Mariana', 'Mariana', '2018-03-06', 'Segunda mariana de toda la web.', '1234', 'Mari@too.com', '2018-03-0638991.jpeg'),
(21, 'Susy', 'Suzzana', 'Cyca', '2018-03-07', 'La única rubia de toda la web.', '1234', 'suzy@hotmail.com', '2018-03-0727464.jpeg'),
(22, 'admin', 'Adosfo', 'Spinus', '2018-03-21', 'Soy el admin .', '1234', 'adsd@hotmail.com', '2018-03-2192331.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recetas_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipos` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
