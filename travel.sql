SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `bookings` (`id`, `user_id`, `tour_id`, `booking_date`) VALUES
(10, 3, 10, '2023-05-19 19:31:55'),
(11, 3, 7, '2023-05-19 19:42:04');


CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `tours` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tours` (`id`, `name`, `description`, `price`, `duration`, `location`, `created_at`, `updated_at`) VALUES
(5, 'Rishikesh', 'NAGPUR - MATHURA - NEW DELHI - HARIDWAR - RISHIKESH - DELHI - AGRA - NAGPUR', '12999.00', 5, 'Rishikesh , Uttarakhand', '2023-05-19 19:25:13', '2023-05-19 19:25:13'),
(6, 'Leh Ladakh', 'DELHI - KARNAL - KULLU MANALI - KEYLONG - LEH LADHAKH - RUPNAGAR - KARNAL - DELHI', '22999.00', 6, 'Leh Ladakh , Jammu & Kashmir', '2023-05-19 19:26:04', '2023-05-19 19:26:04'),
(7, 'Kerala', 'DELHI - KARNAL - KULLU MANALI - KEYLONG - LEH LADHAKH - RUPNAGAR - KARNAL - DELHI', '9999.00', 5, 'Kerala', '2023-05-19 19:28:58', '2023-05-19 19:28:58'),
(8, 'Kedarnath', 'HARIDWAR - DEVPRAYAG - SRINAGAR - KEDARNATH - RUDRAPRAYAG - HARIDWAR', '11999.00', 5, 'Kedarnath , Uttarakhand', '2023-05-19 19:29:28', '2023-05-19 19:29:28'),
(9, 'Vrindavan', 'NAGPUR - JHASI - AGRA - VRINDAVAN - BHOPAL - NAGPUR', '10999.00', 5, 'Vrindavan , Uttar Pradesh', '2023-05-19 19:30:11', '2023-05-19 19:30:11'),
(10, '4 Dham Yatra', 'NAGPUR - JHASI - AGRA - VRINDAVAN - BHOPAL - NAGPUR', '14999.00', 9, '4 Dham ', '2023-05-19 19:30:36', '2023-05-19 19:30:36'),
(11, 'Chopta Tungnath', 'HARIDWAR - DEVPRAYAG - RUDRAPRAYAG - CHOPTA TUNGNATH - SRINAGAR - HARIDWAR\r\n\r\n', '6000.00', 5, 'Chopta Tungnath , Uttarakhand', '2023-05-19 19:31:01', '2023-05-19 19:31:01'),
(12, 'Tirupati Balaji', 'Chopta Tungnath , Uttarakhand\r\n\r\n', '6000.00', 5, 'Tirupati Balaji', '2023-05-19 19:31:34', '2023-05-19 19:31:34');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'pass', '2023-05-19 19:13:50', '2023-05-19 19:13:50'),
(3, 'user', 'pass', '2023-05-19 19:26:15', '2023-05-19 19:26:15');


ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);


ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`);
COMMIT;

