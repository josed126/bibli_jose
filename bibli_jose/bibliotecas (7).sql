-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2021 a las 22:14:32
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliotecas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `isbn` char(13) NOT NULL,
  `title` varchar(80) NOT NULL,
  `author` varchar(80) NOT NULL,
  `category` varchar(80) NOT NULL,
  `price` int(4) UNSIGNED NOT NULL,
  `copies` int(10) UNSIGNED NOT NULL,
  `des` varchar(80) DEFAULT 'fotos/sin.png',
  `descripcion` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`isbn`, `title`, `author`, `category`, `price`, `copies`, `des`, `descripcion`) VALUES
('0000545010225', 'Harry Potter y las Reliquias de la Muerte', 'J. K. Rowling', 'Ficción', 2, 501, 'fotos/foto1.jpg', 'Harry Potter y las reliquias de la muerte es el séptimo y último volumen de la ya clásica serie fantástica de la autora británica J.K. Rowling.\n«Entregadme a Harry Potter -dijo la voz de Voldemort- y nadie sufrirá ningún daño. Entregadme a Harry Potter y dejaré el colegio intacto. Entregadme a Harry Potter y seréis recompensados.»'),
('0000553103547', 'Juego de Tronos', 'George R. R. Martin', 'Ficción', 2, 14, 'fotos/foto2.jpg', 'La épica historia oficial, avalada por HBO, de cómo se hizo la exitosa serie de televisión Juego de tronos.\n.«Todo está aquí: cómo comenzó, cómo terminó, dragones y lobos huargos, lo que pasó delante de las cámaras y entre bambalinas, los triunfos y tropiezos, las decisiones difíciles, las encrucijadas, los porqués.'),
('0000553106635', 'Una tormenta de espadas', 'George R. R. Martin', 'Ficción', 2, 15, 'fotos/foto3.jpeg', 'Canción de hielo y fuego: Libro tercero.La novela río más espectacular jamás escrita Las huestes de los fugaces reyes de Poniente, descompuestas en hordas, asuelan y esquilman una tierra castigada por la guerra e indefensa ante un invierno que se anuncia inusitadamente crudo.'),
('0000439023528', 'Los juegos del hambre', 'Suzanne Collins', 'Ficción', 3, 10, 'fotos/foto4.jpg', 'Es la mañana de la cosecha que dará comienzo a los décimos Juegos del Hambre. En el Capitolio, Coriolanus Snow, de dieciocho años, se prepara para una oportunidad única: alcanzar la gloria como mentor de los Juegos. La casa de los Snow, antes tan influyente, atraviesa tiempos difíciles, y su destino depende de que Coriolanus consiga superar a sus compañeros en ingenio, estrategia y encanto como mentor del tributo que le sea adjudicado'),
('6256545010225', 'Las aventuras de Tom Sawyer', 'Mark Twain', 'Aventuras', 2, 690, 'fotos/foto5.jpeg', 'Alguien ha dicho que Las aventuras de Tom Sawyer es, ante todo, un libro de memorias. Y, en efecto, el relato de las cosas que le suceden a Tom Sawyer en esa pequeña ciudad a orillas del Mississippi bien puede ser una rememoración de la niñez de Mark Twain. A través de los ojos de sus personajes, el autor nos ofrece la visión de una doble realidad: la del mundo infantil, primitivo, que el lector adulto ya ha perdido.'),
('4256553103547', 'Real Madrid. La Décima', ' Enrique Ortego', 'Deportes', 2, 13, 'fotos/foto6.jpg', 'París. Madrid. Bruselas. Stuttgart. Glasgow. Otra vez Bruselas. Ámsterdam. Otra vez París. Glasgow de nuevo… y Lisboa. La Primera. La Segunda. La Tercera. La Cuarta. La Quinta. La Sexta. La Séptima. La Octava. La Novena.... Y la Décima. Siete ciudades y 58 años para diez Copas de Europa. No hay ningún otro club europeo que pueda presentar esta tarjeta de visita. El Real Madrid es el club con más «orejonas», como llama Alfredo di Stéfano a la Copa de las orejas grandes y con más finales, 13, aunque no lograra conquistar las de 1962 (Benfica), 1964 (Inter) y 1981 (Liverpool). También es el club con más presencias en semifinales, nada menos que 25. Los Reyes de Europa mantienen su hegemonía en el siglo XXI. La Décima ya es una realidad. Desde Estambul a Lisboa, una trayectoria imparable.'),
('4256553106635', 'Mentalidad mamba: Los secretos de mi éxito ', 'Kobe Bryant', 'Deportes', 2, 15, 'fotos/foto7.jpg', 'Cuando oigo a la gente decir que se han sentido inspirados por la mentalidad mamba, pienso que todo mi trabajo, todo mi esfuerzo y todo el sudor, ha merecido la pena. Por eso he escrito este libro. Todas las páginas contienen enseñanzas, no sólo sobre el baloncesto, sino también sobre la mentalidad mamba. Es decir, sobre la vida.'),
('9780439023528', 'Reina roja', 'Juan Gómez-Jurado', 'Drama', 3, 10, 'fotos/foto8.jpg', 'El fenómeno que ha enganchado a más de 1.200.000 lectores.\nAntonia Scott es especial. Muy especial.\nNo es policía ni criminalista. Nunca ha empuñado un arma ni llevado una placa, y, sin embargo, ha resuelto decenas de crímenes.\nPero hace un tiempo que Antonia no sale de su ático de Lavapiés. Las cosas que ha perdido le importan mucho más que las que esperan ahí fuera.\nTampoco recibe visitas. Por eso no le gusta nada, nada, cuando escucha unos pasos desconocidos subiendo las escaleras hasta el último piso.'),
('4265439023528', 'Creer: El desafío de superarse siempre (Hobbies)', '	Diego Simeone', 'Deportes', 1, 3, 'fotos/foto10.jpg', 'El Cholo desmitifica y confiesa, sin vacilaciones. Transmite con alta intensidad cómo vive el fútbol y la vida. Porque cree que su motor es la superación permanente, que las dificultades son la mejor escuela, que se le debe dar al día a día el valor extraordinario que tiene y que todas las luchas empiezan en el primer minuto.'),
('6256545015695', '¡Resuelve el misterio! ', 'Lauren Magaziner ', 'Aventuras', 4, 29, 'fotos/foto11.jpg', 'Alguien quiere hacerse con el tesoro escondido de una excéntrica millonaria. Pero la búsqueda del culpable se ve complicada por todo tipo de acertijos, enigmas, oscuros secretos y un montón de decisiones imposibles.\nPor si fuese poco, Carlos es el encargado de investigar lo ocurrido y no ha resuelto un misterio en su vida, así que va a necesitar tu ayuda para resolver su primer caso.'),
('6256545015987', 'CIUDAD NEGRA: En busca de la ciudad perdida ', 'Fernando Gamboa ', 'Aventuras', 2, 290, 'fotos/foto12.jpg', 'CIUDAD NEGRA es la esperada continuación del best seller internacional LA ÚLTIMA CRIPTA. La novela más vendida en la historia de Amazon España, y que ya suma más de 250.000 lectores en todo el mundo. El relato de Ciudad Negra comienza varios meses después del regreso a casa de Ulises, Cassandra, y el profesor Castillo, tras la aventura narrada en La última criptaCitados con urgencia por este último, les explica angustiado que su hija Valeria ha desaparecido misteriosamente en el territorio más remoto y peligroso de la Tierra.'),
('9780439024587', 'Casa del caracol', 'Sandra garcia nieto ', 'Drama', 2, 100, 'fotos/foto13.jpg', 'La casa del caracol es la novela más intensa y emotiva de los últimos tiempos, un magnífico texto que recoge una historia de amor que se transforma en thriller. También es un viaje iniciático del protagonista, un encuentro con sus temores personales en una remota villa andaluza.'),
('9780439078456', 'El drama de Varsovia: (1939-1944)', 'Casimiro Granzow de la Cerda', 'Drama', 3, 50, 'fotos/foto14.jpg', 'Casimiro Granzow de la Cerda, Cassio, vivió en Varsovia durante la II Guerra Mundial y fue testigo directo de los importantes sucesos que tuvieron lugar: desde la invasión nazi en septiembre de 1939 a la creación del gueto, las deportaciones y la insurrección de la ciudad en 1944 ante la cercanía de las tropas soviéticas, con la vana esperanza de que contarían con su apoyo, hasta que los nazis asolaron completamente la ciudad.'),
('0000553101111', 'El viaje de ELROD', 'A.J. GASCÓN ', 'Ficción', 3, 40, 'fotos/foto15.jpeg', 'El viaje de Elrod va a empezar, adéntrate en esta apasionante historia llena de magia, acción, aventuras, drama y entretenimiento. Donde la amistad y el compañerismo son la clave para que este chico huérfano desate sus poderes mágicos, desvele la identidad de sus padres y descubra el motivo por el cual le abandonaron en La Ciudadela Ghorm.'),
('0000553122222', 'El jardín de las brujas ', 'A.J. GASCÓN ', 'Ficción', 3, 40, 'fotos/foto16.jpeg', 'En la familia de Clara existe una leyenda: una maldición acecha la vida de todos sus miembros. Cuando decide indagar sobre el origen desconocido de esta oscura herencia, se embarca en una búsqueda que le llevará hasta el siglo XVIII y la historia de su antepasada, la IX Duquesa de Osuna.'),
('4256553658974', 'Momentos estelares de la NFL', ' Victor Hasbani Kermanchahi', 'Deportes', 5, 13, 'fotos/foto17.jpg', 'Si bien el béisbol está considerado el pasatiempo favorito de los estadounidenses y la NBA vive años gloriosos, el fútbol americano es indiscutiblemente el deporte rey en la tierra del Tío Sam. La historia de la NFL, rica en anécdotas, dinastías, personajes carismáticos, remontadas improbables y recepciones cruciales, es una fuente inagotable de instantes inolvidables. '),
('4256553614589', 'Nada es imposible', 'Kilian Jornet ', 'Deportes', 2, 20, 'fotos/foto18.jpg', 'En su brillante trayectoria, Kilian Jornet ha llevado a su cuerpo hasta el límite, ha sufrido múltiples lesiones, se ha expuesto a grandes riesgos y ha obtenido records que han maravillado al mundo. Con aparente sencillez, ha conseguido lo que parece imposible. Este libro nos muestra la parte más íntima de un deportista de élite; la exigencia extrema, los temores profundos, la rutina de una expedición a la cima del mundo... Una lección enormemente valiosa que nos alienta a hacer realidad nuestros sueños.'),
('9780222024587', 'Cómo no ser una drama mamá', 'Amaya Ascunce ', 'Drama', 3, 10, 'fotos/foto19.jpg', 'Este libro es para todos los que oyeron frases inolvidables como éstas: «Tómate el zumo rápido que se le van las vitaminas», «Te voy a lavar la boca con jabón», o «¿Te crees que soy la dueña del Banco de España?» Es para los niños con coderas y chándal de táctel que sabían que los cromos que regalaban en la puerta del cole llevaban droga y que hay hacer dos horas de digestión para meterse en el agua.'),
('9780439056565', 'CAPITÁN RILEY', 'Fernado Gamboa', 'Aventura', 3, 10, 'fotos/sin.png', 'Capitán Riley es una espectacular novela de aventuras y espionaje, ambientada en el norte de África y la Europa de mediados de la Segunda Guerra Mundial.El protagonista de la historia, Alejandro M. Riley, es un veterano de la guerra civil española con problemas de bebida, que al mando de un pequeño buque de cabotaje y una fiel tripulación de prófugos de tierra firme, navega por el Mediterráneo dedicándose al peligroso negocio del contrabando en tiempos de guerra'),
('0056545010225', 'El perro del hortelano', '1212', 'Aventura', 1, 50, 'fotos/sin.png', 'un perro muy bonito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book_issue_log`
--

CREATE TABLE `book_issue_log` (
  `issue_id` int(11) NOT NULL,
  `member` varchar(20) NOT NULL,
  `book_isbn` varchar(13) NOT NULL,
  `due_date` date NOT NULL,
  `last_reminded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `book_issue_log`

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `librarian`
--

CREATE TABLE `librarian` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `librarian`
--

INSERT INTO `librarian` (`id`, `username`, `password`) VALUES
(1, 'jose', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `balance` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `name`, `email`, `balance`) VALUES
(10, 'jose2', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose', 'clavellino1993@gmail.com', 80),
(11, 'jose3', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose david', 'clavellino1953@gmail.com', 499968),
(12, 'jose5', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose david', 'clavellino1963@gmail.com', 500006),
(13, 'jose6', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose david', 'x@gmail.com', 50821),
(14, 'marixa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose', 'y@gmail.com', 6),
(15, 'paqui', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose', 'lo@gmail.com', 6),
(16, 'pepe', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'pepe', 'cla@hotmail.com', 38),
(17, 'manoloto', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'jose', 'cla@hotmail.c', 100);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pending_book_requests`
--

CREATE TABLE `pending_book_requests` (
  `request_id` int(11) NOT NULL,
  `member` varchar(20) NOT NULL,
  `book_isbn` varchar(13) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pending_book_requests`
--

INSERT INTO `pending_book_requests` (`request_id`, `member`, `book_isbn`, `time`) VALUES
(23, 'jose2', '0000545010225', '2021-03-07 18:12:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pending_registrations`
--

CREATE TABLE `pending_registrations` (
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `balance` int(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book_issue_log`
--
ALTER TABLE `book_issue_log`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indices de la tabla `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `pending_book_requests`
--
ALTER TABLE `pending_book_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indices de la tabla `pending_registrations`
--
ALTER TABLE `pending_registrations`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book_issue_log`
--
ALTER TABLE `book_issue_log`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pending_book_requests`
--
ALTER TABLE `pending_book_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
