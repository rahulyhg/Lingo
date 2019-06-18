ALTER TABLE `email` ADD `user_id` INT UNSIGNED NOT NULL;
ALTER TABLE `email` ADD FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
