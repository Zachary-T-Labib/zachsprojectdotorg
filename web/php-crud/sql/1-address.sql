CREATE TABLE `task_book` (
`id` int(11) NOT NULL,
`task` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `task_book`
ADD PRIMARY KEY (`id`);

ALTER TABLE `task_book`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `task_book` (`id`, `task`) VALUES
(1, 'Work on web application');