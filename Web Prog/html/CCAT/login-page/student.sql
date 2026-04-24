

CREATE TABLE `students` (
  `id` int NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `registration_number` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `present_address` text,
  `permanent_address` text,
  `biography` text,
  `research_interests` text,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;



ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

