SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO `person` (`firstname`, `lastname`, `user_id`) VALUES (`Zbyněk`, `Rybička`, 1);
INSERT INTO `user` (`username`, `password`, `person_id`) VALUES ('zbynek.rybicka@gmail.com', '$2y$12$q9NMu7Qnj/2uQWhFGJrz9.CBBNhJoyXUnasZKE7sBqwsibM/5BK3O', 1);

SET FOREIGN_KEY_CHECKS = 1;
