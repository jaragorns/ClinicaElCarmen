-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 01:49:41
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrador', '19', NULL, 'N;'),
('Enfermera', '20', NULL, NULL),
('GerenteEjecutivo', '18', NULL, NULL),
('Presidente', '17', NULL, NULL),
('Superadmin', '18716856', NULL, NULL),
('Vicepresidente', '16', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Accionista', 2, '', NULL, 'N;'),
('Administrador', 2, '', NULL, 'N;'),
('Administrativo', 2, '', NULL, 'N;'),
('Asis.Administrativo', 2, '', NULL, 'N;'),
('CrearComprobante', 0, 'Crear comprobantes (Con los Datos del comprobante original)', NULL, 'N;'),
('CrearUsuario', 0, 'Crear un nuevo usuario', NULL, 'N;'),
('EliminarComprobante', 0, 'Eliminar comprobante (En caso necesario)', NULL, 'N;'),
('EliminarUsuario', 0, 'Modificar los datos de un usuario', NULL, 'N;'),
('Enfermera', 2, '', NULL, 'N;'),
('Farmaceuta', 2, 'Personal encargado del manejo de inventarios de la farmacia', NULL, NULL),
('GerenteEjecutivo', 2, '', NULL, 'N;'),
('GestionComprobantes', 1, 'Acceso al mantenimiento a los comprobantes', 'NULL', 'N;'),
('GestionUsuarios', 1, 'Acceso al mantenimiento a los usuarios', 'NULL', 'N;'),
('Jefe de Enfermeras', 2, 'Jefe de Enfermeras', NULL, NULL),
('Medico', 2, '', NULL, 'N;'),
('ModificarComprobante', 0, 'Modificar comprobante (En caso de necesitar una modificación)', NULL, 'N;'),
('ModificarUsuario', 0, 'Modificar los datos de un usuario', NULL, 'N;'),
('Presidente', 2, '', NULL, 'N;'),
('RequestAdmExpenses', 1, 'Aprobacion o Rechazo de Gatos Administrativos', 'NULL', 'N;'),
('RequestAdmExpensesMedina', 0, 'Gestión de Gastos Administrativos por parte del Grupo Medina', NULL, 'N;'),
('RequestAdmExpensesPrada', 0, 'Gestión de Gastos Administrativos por parte del Grupo Prada', NULL, 'N;'),
('Superadmin', 3, '', NULL, 'N;'),
('Vicepresidente', 2, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Administrador', 'GestionComprobantes'),
('Asis.Administrativo', 'CrearComprobante'),
('GestionComprobantes', 'CrearComprobante'),
('GestionComprobantes', 'EliminarComprobante'),
('GestionComprobantes', 'ModificarComprobante'),
('GestionUsuarios', 'CrearUsuario'),
('GestionUsuarios', 'EliminarUsuario'),
('GestionUsuarios', 'ModificarUsuario'),
('Presidente', 'RequestAdmExpensesPrada'),
('RequestAdmExpenses', 'RequestAdmExpensesMedina'),
('RequestAdmExpenses', 'RequestAdmExpensesPrada'),
('Superadmin', 'Accionista'),
('Superadmin', 'Administrador'),
('Superadmin', 'Enfermeria'),
('Superadmin', 'Medico'),
('Superadmin', 'Presidente'),
('Superadmin', 'Vicepresidente'),
('Vicepresidente', 'RequestAdmExpensesMedina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id_bancos` int(12) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `saldo` int(12) NOT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_bancos`, `nombre`, `saldo`, `fecha_actualizacion`) VALUES
(13, 'Banco de Venezuela', 285102, '2014-11-02 04:51:29'),
(14, 'Banco Sofitasa', 200001, '2014-11-04 12:54:39'),
(15, 'Banco Mercantil', 120800, '2014-09-26 09:35:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_descargas`
--

CREATE TABLE `bitacora_descargas` (
  `id_bitacora` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_guardia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `id_comprobante` int(12) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `num_cheque` varchar(20) NOT NULL,
  `monto` int(12) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(80) NOT NULL,
  `estado_med` varchar(30) NOT NULL,
  `estado_pra` varchar(30) NOT NULL,
  `usuarios_username` varchar(64) NOT NULL,
  `bancos_id_bancos` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`id_comprobante`, `num_comprobante`, `num_cheque`, `monto`, `fecha`, `detalle`, `estado_med`, `estado_pra`, `usuarios_username`, `bancos_id_bancos`) VALUES
(1, '4210', '55664422', 6000, '2014-10-14', 'Pago Honorarios Ing. Jonathan Silva', 'APROBADO', 'EN ESPERA', '19', 13),
(2, '4211', '33445922', 10000, '2014-10-14', 'Pago Honorarios Ing. Murillo', 'RECHAZADO', 'APROBADO', '19', 15),
(3, '4212', '184574424', 24000, '2015-03-30', 'Pago de Impresora HP Tinta Continua', 'APROBADO', 'EN ESPERA', '19', 13),
(4, '4213', '887763553', 20000, '2015-03-30', 'Cheque Pago Hosting', 'EN ESPERA', 'EN ESPERA', '19', 15),
(5, '1', '1', 111, '2018-05-28', 'honorarios de desarrollo', 'EN ESPERA', 'EN ESPERA', '18716856', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE `estaciones` (
  `id_estacion` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`id_estacion`, `nombre`) VALUES
(1, 'Hospitalización 1'),
(2, 'Farmacia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL,
  `num_factura` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `monto` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `control_factura` varchar(50) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `total` int(50) NOT NULL,
  `retencion` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Facturas que traen los proveedores';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardias`
--

CREATE TABLE `guardias` (
  `id_guardia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_turno` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_estacion` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL,
  `dia_1` int(2) DEFAULT NULL,
  `dia_2` int(2) DEFAULT NULL,
  `dia_3` int(2) DEFAULT NULL,
  `dia_4` int(2) DEFAULT NULL,
  `dia_5` int(2) DEFAULT NULL,
  `dia_6` int(2) DEFAULT NULL,
  `dia_7` int(2) DEFAULT NULL,
  `dia_8` int(2) DEFAULT NULL,
  `dia_9` int(2) DEFAULT NULL,
  `dia_10` int(2) DEFAULT NULL,
  `dia_11` int(2) DEFAULT NULL,
  `dia_12` int(2) DEFAULT NULL,
  `dia_13` int(2) DEFAULT NULL,
  `dia_14` int(2) DEFAULT NULL,
  `dia_15` int(2) DEFAULT NULL,
  `dia_16` int(2) DEFAULT NULL,
  `dia_17` int(2) DEFAULT NULL,
  `dia_18` int(2) DEFAULT NULL,
  `dia_19` int(2) DEFAULT NULL,
  `dia_20` int(2) DEFAULT NULL,
  `dia_21` int(2) DEFAULT NULL,
  `dia_22` int(2) DEFAULT NULL,
  `dia_23` int(2) DEFAULT NULL,
  `dia_24` int(2) DEFAULT NULL,
  `dia_25` int(2) DEFAULT NULL,
  `dia_26` int(2) DEFAULT NULL,
  `dia_27` int(2) DEFAULT NULL,
  `dia_28` int(2) DEFAULT NULL,
  `dia_29` int(2) DEFAULT NULL,
  `dia_30` int(2) DEFAULT NULL,
  `dia_31` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Enfermeras que estan de guardia durante un turno en una estación dada. ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(4,0) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `id_estacion` int(11) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id_medicamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `componente` varchar(45) DEFAULT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `precio_contado` decimal(4,0) NOT NULL,
  `precio_seguro` varchar(4) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `iva` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id_medico` int(11) NOT NULL,
  `nombre_completo` varchar(60) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `especialidad` varchar(40) NOT NULL,
  `rif` varchar(13) NOT NULL,
  `consulta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id_medico`, `nombre_completo`, `cedula`, `especialidad`, `rif`, `consulta`) VALUES
(1, 'Dr. José Orlando Hernández', '3.004.009', 'Pediatra', 'V-03004009-7', 'Lunes - Miercoles - Viernes'),
(2, 'Dra. Elcida Corredor', '2.553.051', 'Pediatra-Neonatologo', 'V-02553051-5', 'Miércoles - Jueves'),
(3, 'Dr. Otto Rangel', 'ACTUALIZAR', 'Pediatra', 'ACTUALIZAR', 'Lunes - Miercoles'),
(4, 'Dra. Rocio Laguado', '8.303.587', 'Ecografista Integral', 'V-08030587-3', 'Lunes - Miercoles'),
(5, 'Dr. Asdrúbal Lucena', '7.352.216', 'Gineco-Obstetra', 'V-07352216-8', 'Jueves - Viernes'),
(6, 'Dra. Sonia Ramírez', '9.226.098', 'Gineco-Obstetra', 'V-09226098-0', 'Martes - Jueves'),
(7, 'Dr. Luis Quintero León', '3.035.058', 'Gineco-Obstetra', 'V-03035058-8', 'Martes - Miercoles'),
(8, 'Dr. Alirio Castellanos', '3.622.695', 'Cirujano General', 'V-03622695-8', 'Lunes - Jueves'),
(9, 'Dr. Manuel R. Prada', '9.094.771', 'Cirujano General', 'V-08094771-9', 'Martes - Miercoles'),
(10, 'Dr. Rusbeth Gutiérrez', '8.009.485', 'Cirujano General', 'V-08009485-6', 'Martes - Jueves'),
(11, 'Dr. José Luis Casique Ramírez', '8.097.437', 'Cirujano General', 'V-08097437-6', 'Miércoles - Jueves'),
(12, 'Dr. Francisco Serrano', '3.194.013', 'Internista', 'V-03194013-0', 'Lunes - Miércoles - Jueves - Viernes'),
(13, 'Dra. Alcira Rueda', '8.095.389', 'Internista', 'V-08095389-1', 'Martes - Miércoles - Jueves'),
(14, 'Dr. Haydee Pérez B.', 'ACTUALIZAR', 'Internista', 'ACTUALIZAR', 'Lunes - Martes - Viernes'),
(15, 'Dr. Miguel Rosales', '2.554.550', 'Anestesiólogo', 'V-02554550-4', 'N/A - POR CITA'),
(16, 'Dra. Iría Olivares de Vielma', '2.283.790', 'Anestesiólogo', 'V-02283790-3', 'N/A - POR CITA'),
(17, 'Dra. Julieta Riggi', '5.033.611', 'Cirujano Pediatra', 'V-05033611-1', 'Lunes - Martes - Viernes'),
(18, 'Dr. Oscar Briceño', '5.804.513', 'Médico Residente', 'V-05804513-2', 'Martes - Miércoles - Jueves'),
(19, 'Dra. Lisanca Radesca Sánchez', '9.190.025', 'Médico Residente', 'V-09190025-0', 'Jueves - Viernes'),
(20, 'Dr. Julio Quiroz Moreno', '8.092.859', 'Médico Cirujano', 'V-08092859-5', 'Lunes - Miércoles'),
(21, 'Dr. Gerardo Guerrero Buenaño', '9.185.381', 'Gastroenterólogo', 'V-09185381-3', 'Martes - Jueves'),
(22, 'Dr. Carlos M. Cremonini M.', '8.103.706', 'Cardiólogo', 'V-08103706-6', 'Martes - Jueves - Viernes'),
(23, 'Dr, Oscar Rosales', '4.112.534', 'Otorrino', 'V-04112534-5', 'Lunes - Miércoles - Jueves'),
(24, 'Dr. José Rafael Molina', '678.812', 'Dermatólogo', 'V-00678812-9', 'Lunes - Martes - Viernes'),
(25, 'Dr. Jonás Enrique Pérez Contreras', '3.882.796', 'Dermatólogo', 'V-03882796-7', 'Miércoles - Jueves - Viernes'),
(26, 'Dra. Liris C. Paredes A.', '8.009.521', 'Urólogo', 'V-08009521-6', 'Martes - Jueves'),
(27, 'Dr. Marcos A. Rivas Torres', '2.107.489', 'Traumatólogo - Ortopedista', 'V-02107489-2', 'Lunes - Martes - Jueves'),
(28, 'Dr. Rolando R. Santibáñez E.', '8.905.388', 'Traumatólogo - Ortopedista', 'V-08095388-3', 'Martes - Jueves - Viernes'),
(29, 'Dra. Carmen Estrada de Rangel', '664.848', 'Médico Radiólogo', 'V-00664848-5', 'Lunes - Miércoles - Jueves - Viernes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `rif` varchar(10) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Proveedores de medicamentos a la Clinica el Carmen C.A';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `description` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `description`) VALUES
(1, 'Superadmin'),
(2, 'Administrativo'),
(3, 'Accionista'),
(4, 'Presidente'),
(6, 'Vicepresidente'),
(7, 'Gerente Ejecutivo'),
(12, 'Administrador'),
(13, 'Asis.Administrativo'),
(14, 'Enfermera'),
(15, 'Medico'),
(16, 'Farmaceuta'),
(17, 'Jefe de Enfermeras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `estacion_id_estacion` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `usuarios` varchar(45) NOT NULL,
  `stock_id_stock` int(11) NOT NULL,
  `guardias_id_guardia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_estacion` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `bitacora_descargas_id_bitacora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tickets que se generan para la corrección de descargas erroneas de medicamentos. Equivocación de medicamente y/o cantidad';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `abreviatura` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='turnos de enfermeria';

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `descripcion`, `abreviatura`) VALUES
(3, '7pm a 7am', '7/7'),
(4, '1pm a 7pm', '1/7'),
(5, '7am a 1pm', '7/1'),
(7, 'Vacaciones', 'V'),
(8, 'Libre', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuarios que tienen acceso al sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `cargo`, `nombres`, `apellidos`, `telefono`, `email`, `roles_id`) VALUES
(16, 'lormedp', '!QvLU4w9ZxFBU', 'Vicepresidente', 'Lorena', 'Medina', '04147202042', 'lormedp@gmail.com', 6),
(17, 'zulay.rprada', 'casa', 'Presidente', 'Zulay', 'Ramirez de Prada', '04145236699', 'zulay.rprada@hotmail.com', 4),
(18, 'carlosh.medina', 'casa', 'Gerente Ejecutivo', 'Carlos Humberto', 'Medina Ramirez', '04141112233', 'carlosh.medinaramirez@gmail.com', 7),
(19, 'nora', '!QvLU4w9ZxFBU', 'Administrador', 'Nora', 'Ramirez', '04144445566', 'nora.nora@hotmail.com', 12),
(20, 'maria.perez', 'casa', 'Enfermera', 'Maria', 'Perez', '04167412200', 'maria.perez@gmail.com', 14),
(18716856, 'jaragorns', 'admin', 'Superadmin', 'Jonathan', 'Silva Medina', '04247531823', 'jonathan.silvamed@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacaciones`
--

CREATE TABLE `vacaciones` (
  `id_vacaciones` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indices de la tabla `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_bancos`);

--
-- Indices de la tabla `bitacora_descargas`
--
ALTER TABLE `bitacora_descargas`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `fk_bitacora_descargas_stock1` (`id_stock`),
  ADD KEY `fk_bitacora_descargas_guardias1` (`id_guardia`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`id_comprobante`),
  ADD KEY `FK_BANCO` (`bancos_id_bancos`),
  ADD KEY `FK_USUARIOS` (`usuarios_username`);

--
-- Indices de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  ADD PRIMARY KEY (`id_estacion`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_factura_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `guardias`
--
ALTER TABLE `guardias`
  ADD PRIMARY KEY (`id_guardia`),
  ADD KEY `fk_guardia_turno1` (`id_turno`),
  ADD KEY `fk_guardia_usuario1` (`id_usuario`),
  ADD KEY `fk_guardia_estacion1` (`id_estacion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fk_inventario_factura1` (`id_factura`),
  ADD KEY `fk_inventario_usuario1` (`id_usuario`),
  ADD KEY `fk_inventario_medicamento1` (`id_medicamento`),
  ADD KEY `fk_inventario_estacion1` (`id_estacion`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_guardia_has_estacion_estacion1` (`estacion_id_estacion`),
  ADD KEY `fk_solicitudes_stock1` (`stock_id_stock`),
  ADD KEY `fk_solicitudes_guardias1` (`guardias_id_guardia`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `fk_stock_medicamento1` (`id_medicamento`),
  ADD KEY `fk_stock_estacion1` (`id_estacion`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `fk_tickets_bitacora_descargas1` (`bitacora_descargas_id_bitacora`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD PRIMARY KEY (`id_vacaciones`),
  ADD KEY `fk_vacaciones_usuario1` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_bancos` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `bitacora_descargas`
--
ALTER TABLE `bitacora_descargas`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `id_comprobante` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estaciones`
--
ALTER TABLE `estaciones`
  MODIFY `id_estacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guardias`
--
ALTER TABLE `guardias`
  MODIFY `id_guardia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  MODIFY `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bitacora_descargas`
--
ALTER TABLE `bitacora_descargas`
  ADD CONSTRAINT `fk_bitacora_descargas_guardias1` FOREIGN KEY (`id_guardia`) REFERENCES `guardias` (`id_guardia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bitacora_descargas_stock1` FOREIGN KEY (`id_stock`) REFERENCES `stock` (`id_stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD CONSTRAINT `comprobantes_ibfk_1` FOREIGN KEY (`bancos_id_bancos`) REFERENCES `bancos` (`id_bancos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_factura_proveedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `guardias`
--
ALTER TABLE `guardias`
  ADD CONSTRAINT `fk_guardia_estacion1` FOREIGN KEY (`id_estacion`) REFERENCES `estaciones` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guardia_turno1` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guardia_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_estacion1` FOREIGN KEY (`id_estacion`) REFERENCES `estaciones` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventario_factura1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventario_medicamento1` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventario_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fk_guardia_has_estacion_estacion1` FOREIGN KEY (`estacion_id_estacion`) REFERENCES `estaciones` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitudes_guardias1` FOREIGN KEY (`guardias_id_guardia`) REFERENCES `guardias` (`id_guardia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitudes_stock1` FOREIGN KEY (`stock_id_stock`) REFERENCES `stock` (`id_stock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_estacion1` FOREIGN KEY (`id_estacion`) REFERENCES `estaciones` (`id_estacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_medicamento1` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamentos` (`id_medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_bitacora_descargas1` FOREIGN KEY (`bitacora_descargas_id_bitacora`) REFERENCES `bitacora_descargas` (`id_bitacora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacaciones`
--
ALTER TABLE `vacaciones`
  ADD CONSTRAINT `fk_vacaciones_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
