INSERT INTO `destinations` (`id`, `nombre`, `name`, `status`, `fecha_modificacion`, `created_at`, `updated_at`) VALUES
(1, 'Cancún', 'Cancún', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(2, 'Isla Mujeres', 'Isla Mujeres', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(3, 'Puerto Morelos', 'Puerto Morelos', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(4, 'Cozumel', 'Cozumel', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(5, 'Playa del Carmen', 'Playa del Carmen', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(6, 'Tulum', 'Tulum', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23'),
(7, 'Bacalar', 'Bacalar', 'Activado', NULL, '2022-08-18 21:18:23', '2022-08-18 21:18:23');

ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;
