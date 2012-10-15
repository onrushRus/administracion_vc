-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2012 a las 13:39:30
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dvd_club`
--

CREATE DATABASE IF NOT EXISTS `dvd_club`;
USE `dvd_club`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE IF NOT EXISTS `alquiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_alquiler` datetime NOT NULL,
  `fecha_devolucion` datetime DEFAULT NULL,
  `total_a_cobrar` decimal(10,0) NOT NULL,
  `socio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alquiler_socio1` (`socio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `tipo`) VALUES
(1, 'Terror'),
(2, 'Comedia'),
(3, 'Romantica'),
(4, 'Accion'),
(5, 'Animada'),
(6, 'Drama'),
(7, 'Ciencia Ficcion'),
(8, 'Para Mayores de 18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pelicula`
--

CREATE TABLE IF NOT EXISTS `estado_pelicula` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_pelicula`
--

INSERT INTO `estado_pelicula` (`id`, `estado`) VALUES
(1, 'Libre'),
(2, 'Reservada'),
(3, 'Alquilada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE IF NOT EXISTS `pelicula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `duracion` time NOT NULL,
  `fecha_estreno` date NOT NULL,
  `estreno` tinyint(1) NOT NULL,
  `actor1_nom` varchar(20) DEFAULT NULL,
  `actor1_apell` varchar(20) DEFAULT NULL,
  `actor2_nom` varchar(20) DEFAULT NULL,
  `actor2_apell` varchar(20) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pelicula_categoria1` (`categoria_id`),
  KEY `fk_pelicula_estado_pelicula1` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `duracion`, `fecha_estreno`, `estreno`, `actor1_nom`, `actor1_apell`, `actor2_nom`, `actor2_apell`, `categoria_id`, `estado`, `sinopsis`, `imagen`) VALUES
(2, 'Iron Man 2', '01:20:00', '2011-05-10', 1, 'Robert ', 'Downey Jr.', 'Scarlett', 'Johansson', 7, 1, 'El mundo ya sabe que el multimillonario Tony Stark (Robert Downey Jr.) es Iron Man, el superhéroe enmascarado. A pesar de las presiones del gobierno, la prensa y la opinión pública para que comparta su tecnología con el ejército, Tony es reacio a desvelar los secretos de la armadura de Iron Man, porque teme que esa información caiga en en manos de irresponsables. Con Pepper Potts (Gwyneth Paltrow) y James “Rhodey” Rhodes (Don Cheadle) a su lado, Tony forja alianzas nuevas y se enfrenta a nuevas y poderosas fuerzas.', 'ironman2.jpg'),
(3, 'Iron Man', '01:05:00', '2012-05-29', 0, 'Robert ', 'Downey Jr.', 'Gwyneth', 'Paltrow', 7, 1, 'Como consejero delegado de Industrias Stark, el mayor contratista de armamento del Gobierno estadounidense, Tony Stark se ha hecho célebre por proteger durante décadas los intereses norteamericanos en todo el mundo. El estilo de vida despreocupado de Tony cambia de manera radical cuando su convoy sufre un ataque, tras una prueba de armamento que supervisa personalmente, y se ve convertido en prisionero de un grupo de insurgentes. Herido por un fragmento de metralla, que se aloja cerca de su corazón ya debilitado y pone en peligro su vida, Tony se ve forzado a crear un arma devastadora para Raza, el misterioso cabecilla de los revolucionarios. Ignorando las exigencias de sus captores, utiliza su intelecto y su ingenio para crear una armadura que lo mantenga con vida y le permita escapar de su cautiverio. A su regreso a América, Tony debe afrontar la realidad de su pasado y decide emprender un nuevo rumbo con Industrias Stark. A pesar de la resistencia de Obadiah Stane, su mano derecha y ejecutivo principal de la compañía, que ha tomado las riendas del negocio en su ausencia, Tony se pasa día y noche en su taller, perfeccionando y puliendo una armadura que le otorgue fuerza sobrehumana y protección física. Con la ayuda de su asistente de toda la vida, Pepper Potts, y su enlace militar de confianza, James Rhodes, Tony descubre un siniestro complot con ramificaciones globales. Enfundándose su imponente armadura roja y dorada, Tony se compromete a proteger el mundo y corregir sus injusticias con su nuevo álter ego, Iron Man.', 'ironman1.jpg'),
(4, 'El exorcista', '02:03:00', '2012-05-06', 0, 'Ellen', 'Burstyn', 'Jason', 'Miller', 1, 1, 'Adaptación de la novela de William Peter Blatty. Inspirada en un exorcismo real ocurrido en Washington en 1949. Regan es una niña de 12 años víctima de fenómenos paranormales. Sufre extraños síntomas, incluyendo la levitación y una fuerza sobrehumana, lo que aterroriza a su madre quien, tras someter a su hija a múltiples análisis médicos sin resultado, acude a un sacerdote con estudios de psiquiatría. Éste se muestra convencido de que el mal ha rebasado lo físico y afecta a lo espiritual. Una vez seguros de que la niña está poseída, junto a otro sacerdote decidirá practicar un exorcismo... Seguramente la película de terror más popular de todos los tiempos, en el año 2000 fue reestrenado un "montaje del director" (director''s cut) apoyado de una gran campaña publicitaria, con el reclamo de la inclusión de algunas escenas cortadas en su estreno.', 'elexorcista.jpg'),
(5, 'El proyecto de la bruja de Blair', '01:25:00', '2006-05-23', 0, 'Heather ', 'Donahue', 'Joshua', 'Leonard', 1, 1, 'El 21 de octubre de 1994, Heather Donahue, Joshua Leonard y Michael Williams entraron en un bosque de Maryland para rodar un documental sobre una leyenda local, "La bruja de Blair". No se volvió a saber de ellos. Un año después, la cámara con la que rodaron fue encontrada, mostrando los terroríficos eventos que dieron lugar a su desaparición.', 'brujablair.jpg'),
(6, 'Norbit', '01:42:00', '2008-05-24', 1, 'Eddie ', 'Murphy', 'Thandie', 'Newton', 2, 1, 'Norbit (Eddie Murphy) no ha tenido una vida fácil. De pequeño fue abandonado ante la puerta de un restaurante chino, que hacía las veces de orfanato, donde le crió el Sr. Wong (Eddie Murphy). Las cosas se ponen aún peor cuando se ve obligado a casarse con Rasputia (Eddie Murphy), la malvada y tragona reina de la comida basura. Cuando Norbit ya no puede más y está a punto de rendirse, reaparece Kate (Thandie Newton), su gran amor de infancia.', 'norbit.jpg'),
(7, 'Scary movie', '01:28:00', '2009-08-17', 0, 'Jon', 'Abrahams', 'Carmen', 'Electra', 2, 1, 'Una bella estudiante muere asesinada. Un grupo de desorientados adolescentes descubren que existe un asesino entre ellos. La heroína Cyndi Campbell y su grupo de despistados amigos se verán aterrorizados por un singular psicópata enmascarado que pretende vengarse de ellos, después de que lo atropellaran por accidente el pasado Halloween.', 'scarymovie.jpg'),
(12, 'Posdata: te quiero', '02:06:00', '2011-03-14', 0, 'Hilary', 'Swank', 'Gerard', 'Butler', 3, 1, 'Holly Kennedy (Hilary Swank) es una bella e inteligente mujer casada con el amor de su vida –un apasionado, divertido e impetuoso irlandés llamado Gerry (Gerard Butler). Por todo ello, cuando una enfermedad acaba con la vida de Gerry también destroza la de Holly. El único que podía ayudarla se ha ido para siempre. Nadie conocía a Holly mejor que Gerry, así que él dejó ideado un plan de futuro para ella.\r\n\r\nAntes de morir, Gerry le escribió a Holly una serie de cartas que la guiarían, no sólo en su duelo sino también en un viaje de redescubrimiento de sí misma. El primer mensaje llega el día del 30º cumpleaños de Holly en forma de pastel y, para su asombro, una cinta grabada con un mensaje de voz de Gerry, quien le ordena que salga a la calle a “celebrarse a sí misma”. Durante las semanas y meses siguientes recibirá más cartas de Gerry por las vías más sorprendentes, cada una de ellas con una nueva aventura para Holly, y todas terminadas de la misma forma: Posdata: te quiero.\r\n\r\nLa madre de Holly (Kathy Bates) y sus mejores amigas, Denise (Lisa Kudrow) y Sharon (Gina Gershon), comienzan a preocuparse al ver que las cartas de Gerry mantienen a Holly anclada en el pasado. Sin embargo, lo que realmente hace cada misiva es empujarla a un nuevo futuro.\r\n\r\nCon las palabras de Gerry como guía, Holly se embarca en un sensible, excitante y a menudo hilarante viaje de redescubrimiento, en una historia sobre el matrimonio, la amistad y la fuerza que puede llegar a tener un amor, hasta el punto de convertir la finalidad de la muerte en el comienzo de una nueva vida.', 'posdatatequiero.jpg'),
(13, 'El diario de noa', '02:04:00', '1996-05-13', 0, 'Ryan', 'Gosling', 'Rachel', 'MacAdams', 3, 1, 'En una residencia de ancianos, un hombre (James Garner) lee a una mujer (Gena Rowlands) una historia de amor escrita en su viejo cuaderno de notas. Es la historia de Noah Calhoun (Ryan Gosling) y Allie Nelson (Rachel McAdams), dos jóvenes adolescentes de Carolina del Norte que, a pesar de vivir en dos ambientes sociales muy diferentes, se enamoraron profundamente y pasaron juntos un verano inolvidable, antes de ser separados, primero por sus padres, y más tarde por la guerra.', 'ElDiarioDeNoa.jpg'),
(14, 'El Transportador 2', '01:27:00', '1998-03-16', 0, 'Jason', 'Statham', 'Alessandro', 'Gassman', 4, 1, 'Frank Martin (Jason Statham) es el mejor en el negocio. Este antiguo miembro de las Fuer-zas Especiales se hace contratar como "transportista" mercenario para llevar mercan-cías (personas o cualquier otra cosa). Es muy simple, hace la entrega… sin hacer ninguna pregunta. Frank se ha trasladado del Mediterráneo francés a Miami, Florida, donde como favor hacia un amigo, está trabajando como conductor de la acau-dalada familia Billings. Hay muy pocas cosas que puedan sorpren-der al transportista, pero el niño Jack Billings (Hunter Clary) es eso precisamente, una de ellas; Frank ha hecho buenas migas con Jack, de seis años de edad, a quien lleva y trae del colegio. Pero cuando Jack es objeto de un secuestro, Frank debe emplear todas sus habilidades para el combate, demostradas sobradamente en acción, para recuperar al chico y desbaratar el plan de los secues-tradores de liberar un virus que matará a cualquiera que entre en contacto con el mismo.', 'eltransportador2.jpg'),
(15, 'The rock', '02:16:00', '2012-05-31', 0, 'Nicolas', 'Cage', 'Sean', 'Connery', 4, 1, 'El legendario héroe militar Francis Hummel y sus hombres toman al asalto la isla de Alcatraz, reteniendo a 81 civiles y amenazando con usar misiles cargados de un gas letal. Sólo un experto en armas químicas y el único convicto que ha logrado escapar se oponen a sus planes. Ambos llegan a la isla intentando organizar sus conocimientos. El antiguo preso es el único que conoce el túnel que llega al centro de la prisión.', 'therock.jpg'),
(16, '5 centimeters per second', '01:03:00', '2002-05-27', 0, 'Takaki', 'Tono', 'Akari', 'Shinohara', 5, 1, '¿Cuándo empecé a escribir mensajes que nunca envío? ¿A qué velocidad debo vivir para volverte a ver? Después de graduarse en escuela primaria, Takaki Tono y Akari Shinohara fueron por caminos separados a pesar de lo que sentían uno por el otro. Lo unico que pasó entre ellos fue el tiempo. Un día, en medio de una tormenta de nieve, Takaki finalmente fue a ver a Akari... La película consta de 3 historias que narran varias etapas desde distintos puntos de vista: "Extracto de Flor de Cerezo", "Cosmonauta" y "5 centímetros por segundo".', '5centimeterspersecond.jpg'),
(17, 'WALL-E', '01:38:00', '1997-05-12', 1, 'WALL-E', '', 'EVA', '', 5, 1, 'En el año 2700, en un planeta Tierra devastado y sin vida, tras cientos de solitarios años haciendo aquello para lo que fue construido -limpiar el planeta de basura- el pequeño robot WALL•E (acrónimo de Waste Allocation Load Lifter Earth-Class) descubre una nueva misión en su vida (además de recolectar cosas inservibles) cuando se encuentra con una moderna y lustrosa robot exploradora llamada EVE. Ambos viajarán a lo largo de la galaxia y vivirán una emocionante e inolvidable aventura..', 'wall-e.jpg'),
(18, 'Caballo de Guerra', '02:25:00', '2001-05-29', 0, 'Jeremy', 'Irvine', 'David', 'Thewlis', 6, 1, 'De Steven Spielberg, Caballo de guerra narra la historia acerca de un joven muchacho llamado Albert (Jeremy Irvine) y su adorado caballo, Joey, está ambientada durante el estallido de la Primera Guerra Mundial. Cuando el padre de Albert vende el animal a la caballería británica para que éste sea enviado a la línea de combate, Joey comienza un extraordinario viaje en el contexto de esa gran guerra. Pese a los obstáculos que enfrenta a cada paso de su travesía, él tocará y cambiará la vida de todos los que encuentre en su camino. En tanto, Albert, incapaz de olvidar a su gran amigo, también dejará su hogar y marchará a los campos de batalla en Francia para encontrar a su caballo y traerlo de vuelta a casa.', 'caballodeguerra.jpg'),
(19, 'Mil años de oracion', '01:27:00', '1996-05-12', 0, 'Faye', 'Yu', 'Vida', 'Ghahremani', 6, 1, 'El señor Shi es un viudo jubilado de Pekín. Cuando su única hija Yilan, que vive en Estados Unidos, se divorcia, va a visitarla a la pequeña ciudad en la que trabaja como bibliotecaria. Su intención es estar con ella hasta que se recupere y rehaga su vida, pero a Yilan no le interesa el plan de su padre para salvar su matrimonio, y cuando él insiste en conocer las causas del divorcio, su hija empieza a evitarlo.', 'milaniosdeoracion.jpg'),
(20, 'Un niño de otro mundo', '01:48:00', '2012-05-26', 1, 'John', 'Cusack', 'Bobby', 'Coleman', 6, 1, 'Un niño de otro mundo (Martian Child) es una película que gira en torno a un escritor (John Cusack) que perdió a su esposa unos meses atrás y ha entrado en una depresión al desvanecerse sus esperanzas de formar una familia, y verá cómo gracias a la intervención de su hermana (Joan Cusack) se pondrá en contacto con una asistenta social (Sophie Okonedo) que le ofrecerá adoptar a un niño de seis años con trastornos psiquiátricos porqué cree que es un habitante de Marte llegado a la Tierra. Amanda Peet interpreta a la que era la mejor amiga de su esposa; y Oliver Platt es su editor, preocupado porque su autor está poco interesado en escribir.', 'unniniodeotromundo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socio_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_reserva` time DEFAULT NULL,
  `expiro_reserva` tinyint(1) DEFAULT NULL,
  `alquilada` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservas_socio1` (`socio_id`),
  KEY `fk_reservas_pelicula1` (`pelicula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_socio`
--

CREATE TABLE IF NOT EXISTS `tipo_socio` (
  `id` int(11) NOT NULL,
  `tipo_socio` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_socio`
--

INSERT INTO `tipo_socio` (`id`, `tipo_socio`) VALUES
(1, 'Administrador-Duenio'),
(2, 'Empleado'),
(3, 'Socio Comun');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `tel_cel` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `tipo_socio_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_socio_tipo_socio1` (`tipo_socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `dni`, `nombre`, `apellido`, `direccion`, `tel_cel`, `fecha_nacimiento`, `usuario`, `password`, `email`, `tipo_socio_id`, `activo`) VALUES
(11, '31473916', 'Nicolas', 'Fernandez', 'R. Balbin 36', '154507019', '1985-02-18', 'nico', '990f1231beef96e676782e73d7ce8833', 'nico@hotmail.com', 1, 1),
(12, '34789563', 'master', 'of puppets', 'no se', '4568962', '1970-12-25', 'master', 'eb0a191797624dd3a48fa681d3061212', 'master@gmail.com', 1, 1),
(13, '44555666', 'Ruso', 'Limon', 'de Trelew', '154889966', '1960-04-13', 'ruso', '5ec38d2cc341d51dc6138e49b7c6c196', 'ruso@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_alquiler`
--

CREATE TABLE IF NOT EXISTS `socio_alquiler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alquiler_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_socio_alquiler_pelicula1` (`pelicula_id`),
  KEY `fk_socio_alquiler_alquiler1` (`alquiler_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='peliculas alquiladas por el socio' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
/*
ALTER TABLE `alquiler`
  ADD CONSTRAINT `fk_alquiler_socio1` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_pelicula_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_estado_pelicula1` FOREIGN KEY (`estado`) REFERENCES `estado_pelicula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reservas_pelicula1` FOREIGN KEY (`pelicula_id`) REFERENCES `pelicula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservas_socio1` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `fk_socio_tipo_socio1` FOREIGN KEY (`tipo_socio_id`) REFERENCES `tipo_socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `socio_alquiler`
--
ALTER TABLE `socio_alquiler`
  ADD CONSTRAINT `fk_socio_alquiler_alquiler1` FOREIGN KEY (`alquiler_id`) REFERENCES `alquiler` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_socio_alquiler_pelicula1` FOREIGN KEY (`pelicula_id`) REFERENCES `pelicula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
