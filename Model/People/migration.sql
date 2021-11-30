SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `firstname` varchar(400) NOT NULL,
  `surname` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO people (id, firstname, surname, email)
  VALUES
    (1, 'David', 'Timonnet', 'DavidTimonnet@test.gmail'),
    (2, 'Jules', 'Alirral', 'JulesAlirral@test.gmail'),
    (3, 'isaac', 'Guilon', 'IsaacGuilon@test.gmail'),
    (4, 'Olivia', 'Simonon', 'OliviaSimonon@test.gmail'),
    (5, 'Coralie', 'Vernillard', 'CoralieVernillard@test.gmail');


ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;