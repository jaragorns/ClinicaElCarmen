CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Administrador', '19', NULL, 'N;'),
('Enfermeria', '20', NULL, 'N;'),
('GerenteEjecutivo', '18', NULL, 'N;'),
('Presidente', '17', NULL, 'N;'),
('Superadmin', '21', NULL, NULL),
('Vicepresidente', '16', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
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
('Enfermeria', 2, '', NULL, 'N;'),
('GerenteEjecutivo', 2, '', NULL, 'N;'),
('GestionComprobantes', 1, 'Acceso al mantenimiento a los comprobantes', 'NULL', 'N;'),
('GestionUsuarios', 1, 'Acceso al mantenimiento a los usuarios', 'NULL', 'N;'),
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

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Superadmin', 'Accionista'),
('Superadmin', 'Administrador'),
('Asis.Administrativo', 'CrearComprobante'),
('GestionComprobantes', 'CrearComprobante'),
('GestionUsuarios', 'CrearUsuario'),
('GestionComprobantes', 'EliminarComprobante'),
('GestionUsuarios', 'EliminarUsuario'),
('Superadmin', 'Enfermeria'),
('Administrador', 'GestionComprobantes'),
('Superadmin', 'Medico'),
('GestionComprobantes', 'ModificarComprobante'),
('GestionUsuarios', 'ModificarUsuario'),
('Superadmin', 'Presidente'),
('RequestAdmExpenses', 'RequestAdmExpensesMedina'),
('Vicepresidente', 'RequestAdmExpensesMedina'),
('Presidente', 'RequestAdmExpensesPrada'),
('RequestAdmExpenses', 'RequestAdmExpensesPrada'),
('Superadmin', 'Vicepresidente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `id_bancos` int(12) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `saldo` int(12) NOT NULL,
  `fecha_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bancos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_bancos`, `nombre`, `saldo`, `fecha_actualizacion`) VALUES
(13, 'Banco de Venezuela', 285102, '2014-11-02 00:51:29'),
(14, 'Banco Sofitasa', 200001, '2014-11-04 08:54:39'),
(15, 'Banco Mercantil', 120800, '2014-09-26 05:35:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE IF NOT EXISTS `comprobantes` (
  `id_comprobante` int(12) NOT NULL AUTO_INCREMENT,
  `num_comprobante` varchar(10) NOT NULL,
  `num_cheque` varchar(20) NOT NULL,
  `monto` int(12) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(80) NOT NULL,
  `estado_med` varchar(30) NOT NULL,
  `estado_pra` varchar(30) NOT NULL,
  `usuarios_username` varchar(64) NOT NULL,
  `bancos_id_bancos` int(12) NOT NULL,
  PRIMARY KEY (`id_comprobante`),
  KEY `FK_BANCO` (`bancos_id_bancos`),
  KEY `FK_USUARIOS` (`usuarios_username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`id_comprobante`, `num_comprobante`, `num_cheque`, `monto`, `fecha`, `detalle`, `estado_med`, `estado_pra`, `usuarios_username`, `bancos_id_bancos`) VALUES
(1, '4210', '55664422', 6000, '2014-10-14', 'Pago Honorarios Ing. Jonathan Silva', 'APROBADO', 'EN ESPERA', '19', 13),
(2, '4211', '33445922', 10000, '2014-10-14', 'Pago Honorarios Ing. Murillo', 'RECHAZADO', 'APROBADO', '19', 15),
(3, '4212', '184574424', 24000, '2015-03-30', 'Pago de Impresora HP Tinta Continua', 'APROBADO', 'EN ESPERA', '19', 13),
(4, '4213', '887763553', 20000, '2015-03-30', 'Cheque Pago Hosting', 'EN ESPERA', 'EN ESPERA', '19', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE IF NOT EXISTS `medicos` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(60) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `especialidad` varchar(40) NOT NULL,
  `rif` varchar(13) NOT NULL,
  `consulta` varchar(40) NOT NULL,
  PRIMARY KEY (`id_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(14, 'Enfermeria'),
(15, 'Medico');

-- -----------------------------------------------------
-- Table `proveedores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `rif` VARCHAR(10) NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_proveedor`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Proveedores de medicamentos a la Clinica el Carmen C.A';


-- -----------------------------------------------------
-- Table `facturas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `facturas` (
  `id_factura` INT NOT NULL AUTO_INCREMENT ,
  `num_factura` VARCHAR(20) NOT NULL ,
  `fecha` DATE NOT NULL ,
  `monto` INT NOT NULL ,
  `id_proveedor` INT NOT NULL ,
  PRIMARY KEY (`id_factura`) ,
  INDEX `fk_factura_proveedor` (`id_proveedor` ASC) ,
  CONSTRAINT `fk_factura_proveedor`
    FOREIGN KEY (`id_proveedor` )
    REFERENCES `proveedores` (`id_proveedor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci
COMMENT = 'Facturas que traen los proveedores';


-- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usuarios` (
  `id` INT NOT NULL ,
  `username` VARCHAR(64) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `cargo` VARCHAR(50) NULL ,
  `nombres` VARCHAR(100) NOT NULL ,
  `apellidos` VARCHAR(100) NOT NULL ,
  `telefono` VARCHAR(12) NOT NULL ,
  `email` VARCHAR(45) NULL ,
  `roles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Usuarios que tienen acceso al sistema';


-- -----------------------------------------------------
-- Table `medicamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `medicamentos` (
  `id_medicamento` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `componente` VARCHAR(45) NULL ,
  `unidad_medida` VARCHAR(20) NOT NULL ,
  `precio_contado` DECIMAL(4) NOT NULL ,
  `precio_seguro` VARCHAR(4) NOT NULL ,
  PRIMARY KEY (`id_medicamento`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `estaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `estaciones` (
  `id_estacion` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`id_estacion`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `inventario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `inventario` (
  `id_inventario` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` INT NOT NULL ,
  `precio_compra` DECIMAL(4) NOT NULL ,
  `id_factura` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `id_medicamento` INT NOT NULL ,
  `id_estacion` INT NOT NULL ,
  PRIMARY KEY (`id_inventario`) ,
  INDEX `fk_inventario_factura1` (`id_factura` ASC) ,
  INDEX `fk_inventario_usuario1` (`id_usuario` ASC) ,
  INDEX `fk_inventario_medicamento1` (`id_medicamento` ASC) ,
  INDEX `fk_inventario_estacion1` (`id_estacion` ASC) ,
  CONSTRAINT `fk_inventario_factura1`
    FOREIGN KEY (`id_factura` )
    REFERENCES `facturas` (`id_factura` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_medicamento1`
    FOREIGN KEY (`id_medicamento` )
    REFERENCES `medicamentos` (`id_medicamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inventario_estacion1`
    FOREIGN KEY (`id_estacion` )
    REFERENCES `estaciones` (`id_estacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vacaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `vacaciones` (
  `id_vacaciones` INT NOT NULL AUTO_INCREMENT ,
  `fecha_inicio` DATE NOT NULL ,
  `fecha_fin` DATE NOT NULL ,
  `id_usuario` INT NOT NULL ,
  PRIMARY KEY (`id_vacaciones`) ,
  INDEX `fk_vacaciones_usuario1` (`id_usuario` ASC) ,
  CONSTRAINT `fk_vacaciones_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `turnos` (
  `id_turno` INT NOT NULL AUTO_INCREMENT ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_turno`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'turnos de enfermeria';


-- -----------------------------------------------------
-- Table `guardias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `guardias` (
  `id_guardia` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `id_turno` INT NOT NULL ,
  `id_usuario` INT NOT NULL ,
  `id_estacion` INT NOT NULL ,
  PRIMARY KEY (`id_guardia`) ,
  INDEX `fk_guardia_turno1` (`id_turno` ASC) ,
  INDEX `fk_guardia_usuario1` (`id_usuario` ASC) ,
  INDEX `fk_guardia_estacion1` (`id_estacion` ASC) ,
  CONSTRAINT `fk_guardia_turno1`
    FOREIGN KEY (`id_turno` )
    REFERENCES `turnos` (`id_turno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_guardia_usuario1`
    FOREIGN KEY (`id_usuario` )
    REFERENCES `usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_guardia_estacion1`
    FOREIGN KEY (`id_estacion` )
    REFERENCES `estaciones` (`id_estacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Enfermeras que estan de guardia durante un turno en una estación dada. ';


-- -----------------------------------------------------
-- Table `stock`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `stock` (
  `id_stock` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` INT NOT NULL ,
  `id_estacion` INT NOT NULL ,
  `id_medicamento` INT NOT NULL ,
  PRIMARY KEY (`id_stock`) ,
  INDEX `fk_stock_medicamento1` (`id_medicamento` ASC) ,
  CONSTRAINT `fk_stock_estacion1`
    FOREIGN KEY (`id_estacion` )
    REFERENCES `estaciones` (`id_estacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_medicamento1`
    FOREIGN KEY (`id_medicamento` )
    REFERENCES `medicamentos` (`id_medicamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `bitacora_descargas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bitacora_descargas` (
  `id_bitacora` INT NOT NULL AUTO_INCREMENT ,
  `fecha_hora` DATETIME NOT NULL ,
  `cantidad` INT NOT NULL ,
  `estado` INT NOT NULL ,
  `id_stock` INT NOT NULL ,
  `id_guardia` INT NOT NULL ,
  PRIMARY KEY (`id_bitacora`) ,
  INDEX `fk_bitacora_descargas_stock1` (`id_stock` ASC) ,
  INDEX `fk_bitacora_descargas_guardias1` (`id_guardia` ASC) ,
  CONSTRAINT `fk_bitacora_descargas_stock1`
    FOREIGN KEY (`id_stock` )
    REFERENCES `stock` (`id_stock` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bitacora_descargas_guardias1`
    FOREIGN KEY (`id_guardia` )
    REFERENCES `guardias` (`id_guardia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tickets`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tickets` (
  `id_ticket` INT NOT NULL AUTO_INCREMENT ,
  `id_medicamento` INT NOT NULL ,
  `cantidad` INT NOT NULL ,
  `estado` INT NOT NULL ,
  `bitacora_descargas_id_bitacora` INT NOT NULL ,
  PRIMARY KEY (`id_ticket`) ,
  INDEX `fk_tickets_bitacora_descargas1` (`bitacora_descargas_id_bitacora` ASC) ,
  CONSTRAINT `fk_tickets_bitacora_descargas1`
    FOREIGN KEY (`bitacora_descargas_id_bitacora` )
    REFERENCES `bitacora_descargas` (`id_bitacora` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Tickets que se generan para la corrección de descargas erroneas de medicamentos. Equivocación de medicamente y/o cantidad';


-- -----------------------------------------------------
-- Table `solicitudes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `solicitudes` (
  `id_solicitud` INT NOT NULL AUTO_INCREMENT ,
  `estacion_id_estacion` INT NOT NULL ,
  `cantidad` INT NULL ,
  `usuarios` VARCHAR(45) NOT NULL ,
  `stock_id_stock` INT NOT NULL ,
  `guardias_id_guardia` INT NOT NULL ,
  PRIMARY KEY (`id_solicitud`) ,
  INDEX `fk_guardia_has_estacion_estacion1` (`estacion_id_estacion` ASC) ,
  INDEX `fk_solicitudes_stock1` (`stock_id_stock` ASC) ,
  INDEX `fk_solicitudes_guardias1` (`guardias_id_guardia` ASC) ,
  CONSTRAINT `fk_guardia_has_estacion_estacion1`
    FOREIGN KEY (`estacion_id_estacion` )
    REFERENCES `estaciones` (`id_estacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_stock1`
    FOREIGN KEY (`stock_id_stock` )
    REFERENCES `stock` (`id_stock` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_solicitudes_guardias1`
    FOREIGN KEY (`guardias_id_guardia` )
    REFERENCES `guardias` (`id_guardia` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



INSERT INTO `usuarios` (`id`, `username`, `password`, `cargo`, `nombres`, `apellidos`, `telefono`, `email`, `roles_id`) VALUES
(16, 'lormedp', '$1$da4.ig0.$Y6z/veju2NkpERC7r7foF0', 'Vicepresidente', 'Lorena', 'Medina', '04147202042', 'lormedp@gmail.com', 4),
(17, 'zulay.rprada', '$1$DP/.QV5.$4ZtnOS1GlLaUX0q5zfVoF1', 'Presidente', 'Zulay', 'Ramirez de Prada', '04145236699', 'zulay.rprada@hotmail.com', 6),
(18, 'carlosh.medina', '$1$tZ3.yO0.$ypzyZPL/bN4jkw30Jhmd41', 'Gerente Ejecutivo', 'Carlos Humberto', 'Medina Ramirez', '04141112233', 'carlosh.medinaramirez@gmail.com', 7),
(19, 'nora', '$1$TA/.gN2.$fGTgQchPX.6XDa./yw.57.', 'Administradora', 'Nora', 'Ramirezz', '04144445566', 'nora.nora@hotmail.com', 12),
(20, 'maria.perez', '$1$8e3.vX2.$BMClGQiJVfNmf2Zh2Grfm/', 'Enfermera', 'Maria', 'Perez', '04167412200', 'maria.perez@gmail.com', 14),
(21, 'jaragorns', 'admin', 'Supervisor IT', 'Jonathan', 'Silva Medina', '04247531823', 'jonathan.silvamed@gmail.com', 1);

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
-- Filtros para la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD CONSTRAINT `comprobantes_ibfk_1` FOREIGN KEY (`bancos_id_bancos`) REFERENCES `bancos` (`id_bancos`) ON DELETE CASCADE ON UPDATE CASCADE;
