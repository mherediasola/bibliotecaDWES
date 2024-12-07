START TRANSACTION;
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- ----------------TABLA SALA-------------------
CREATE TABLE `sala` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `sala`
  ADD CONSTRAINT `sala_id_pk` PRIMARY KEY (`id`);

ALTER TABLE `sala`
	MODIFY `id` INT(10) AUTO_INCREMENT;  

-- ----------------TABLA MESA-------------------
CREATE TABLE `mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sala` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `mesa`
  ADD CONSTRAINT `mesa_id_pk` PRIMARY KEY (`id`),
  ADD CONSTRAINT `mesa_sala_fk` FOREIGN KEY(`id_sala`) REFERENCES `sala`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `mesa`
	MODIFY `id` INT(10) AUTO_INCREMENT;
    

-- ----------------TABLA ROL-------------------- 
CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `rol`
	ADD CONSTRAINT `rol_id_pk` PRIMARY KEY(`id`);
    
ALTER TABLE `rol`
	MODIFY `id` INT(10) AUTO_INCREMENT;


-- ----------------TABLA USUARIO-----------------
CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rol` int(10),
  `usuario` varchar(100) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_id_pk` PRIMARY KEY(`id`),
  ADD CONSTRAINT `usuario_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE ON DELETE SET NULL;
  
ALTER TABLE `usuario`
	MODIFY `id` INT(10) AUTO_INCREMENT;

-- ----------------TABLA RESERVA-----------------
CREATE TABLE `reserva` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10),
  `id_mesa` int(10),
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_id_pk` PRIMARY KEY(`id`),
  ADD CONSTRAINT `reserva_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_mesa_fk` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `reserva`
	MODIFY `id` INT(10) AUTO_INCREMENT;

-- -----------------TABLA EJEMPLAR-----------------
CREATE TABLE `ejemplar` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `tipo` ENUM('libro', 'artículo', 'cd', 'dvd')NOT NULL,
  `autor` varchar(100),
  `idioma` varchar(100),
  `editorial` varchar(150)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `ejemplar`
  ADD CONSTRAINT `ejemplar_id_pk` PRIMARY KEY(`id`);

ALTER TABLE `ejemplar`
	MODIFY `id` INT(10) AUTO_INCREMENT;  

-- -----------------TABLA PRÉSTAMO-----------------  
CREATE TABLE `prestamo`(
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10),
  `id_ejemplar` int(10),
  `fecha` date NOT NULL,
  `fecha_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_id_pk` PRIMARY KEY(`id`),
  ADD CONSTRAINT `prestamo_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ejemplar_fk` FOREIGN KEY (`id_ejemplar`) REFERENCES `ejemplar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `prestamo`
	MODIFY `id` INT(10) AUTO_INCREMENT;

-- INFORMACIÓN INSERTADA EN LAS TABLAS
INSERT INTO `rol` (`tipo`) VALUES
	("administrador"),
  ("bibliotecario"),
  ("usuario");
  
INSERT INTO `sala`(`nombre`) VALUES
	("Colombine"),
  ("Zambrano"),
  ("Vives"),
  ("García Lorca"),
  ("Cernuda");

INSERT INTO `mesa`(`id_sala`) VALUES
  (1),
  (1),
  (1),
  (1),
  (2),
  (2),
  (2),
  (2),
  (3),
  (3),
  (3),
  (3),
  (4),
  (5);

INSERT INTO `usuario`(`id_rol`, `usuario`, `clave`, `nombre`, `apellidos`, `email`) VALUES
	(2,"anamolrus", "ana123", "Ana", "Moldovan Rus", "anamolrus@gmail.com"),
  (3, "finioshav", "fini123", "Fineas", "Iosif Havram", "finioshav@gmail.com"),
  (3, "migherher", "miguel123", "Miguel", "Hernández Heredia", "migherher@gmail.com"),
  (1, "marhersol", "marga123", "Margarita", "Heredia Sola", "marhersol@gmail.com"),
  (3, "nergomrui", "nerea123", "Nerea", "Gómez Ruiz", "nergomrui@gmail.com"),
  (2, "vanjimlop", "vanesa123", "Vanesa", "Jiménez López", "vanjimlop@gmail.com"),
  (3, "lucgarpeñ", "lucas123", "Lucas", "García Peña", "nergomrui@gmail.com"),
  (3, "marocaber", "marcos123", "Marcos", "Ocampo Bermejo", "marocaber@gmail.com"),
  (2, "abdafeelf", "abde123", "Abde", "Afendi El Fadoudi", "abdafeelf@gmail.com"),
  (3, "dieblasaa", "diego123", "Diego", "Blanque Saavedra", "dieblasaa@gmail.com");
    
INSERT INTO `reserva` (`id_usuario`, `id_mesa`, `fecha`, `hora_inicio`, `hora_final`) VALUES
	(2, 1, "2024-11-01", "17:00:00", "19:30:00"),
  (3, 1, "2024-11-01", "15:00:00", "16:45:00"),
  (5, 5, "2024-10-28", "16:00:00", "18:00:00"),
  (8, 7, "2024-11-04", "16:30:00", "18:30:00");

INSERT INTO `ejemplar` (`nombre`, `tipo`, `autor`, `idioma`, `editorial`) VALUES
  ("Los libros de Terramar", "libro", "Ursula K. Le Guin", "Español", "Minotauro"),
  ("En busca del tiempo perdido", "libro", "Proust", "Español", "Alianza"),
  ("Videoreseñas de booktubers como espacios de mediación literaria", "artículo", "Lenin Paladines-Paredes, Cristina Aliagas", "Español", "Revista Ocnos Vol. 20 Núm. 1"),
  ("Self-efficacy as a mediator of neuroticism and perceived stress: Neural perspectives on healthy aging", "articulo", "Lulu Liua, Runyu Huanga, Yu-Jung Shanga, et. al", "Inglés", "Revista International Journal of Clinical and Health Psychology Vol. 24, Núm.4"),
  ("El Quijote", "libro", "Miguel de Cervantes", "Español", "RAE"),
  ("The way of kings", "libro", "Brandon Sanderson", "Inglés", "Tor Books");

INSERT INTO `prestamo` (`id_usuario`, `id_ejemplar`, `fecha`, `fecha_final`) VALUES
  (2, 3, "2024-11-26", "2024-12-03"),
  (5, 1, "2024-11-15", "2024-11-22"),
  (7, 6, "2024-11-20", "2024-11-27"),
  (8, 4, "2024-11-26", "2024-12-03");

COMMIT;


