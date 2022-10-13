

INSERT INTO `type_changes` (`id`, `titulo`, `valor`, `created_at`, `updated_at`) VALUES
(13, 'General', '20', '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(14, 'Xcaret', '21', '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(15, 'Capitan Hook', '22', '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(16, 'Jolly Roger', '21', '2022-08-18 21:18:23', '2022-08-18 21:18:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `type_changes`
--
ALTER TABLE `type_changes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `type_changes`
--
ALTER TABLE `type_changes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
