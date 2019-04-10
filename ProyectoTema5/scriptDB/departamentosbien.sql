CREATE TABLE `Departamento` (
  `CodDepartamento` varchar(3) NOT NULL,
  `DescDepartamento` varchar(100) NOT NULL,
  `FechaDeBaja` date NOT NULL DEFAULT '0001-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Departamento`
--

INSERT INTO `Departamento` (`CodDepartamento`, `DescDepartamento`, `FechaDeBaja`) VALUES
('DAL', 'Departamento de alumnos', '2019-04-08'),
('DCP', 'Departamento compras', '0001-01-01'),
('DOR', 'Departamento de Ordenadores', '0001-01-01'),
('DPF', 'Departamento de Profesores', '0001-01-01'),
('DVN', 'Departamento ventas', '0001-01-01');