CREATE TABLE IF NOT EXISTS `auth` (
`user` varchar(30) NOT NULL,
`session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE IF NOT EXISTS `chat` (
`time` varchar(30) NOT NULL,
`user` varchar(30) NOT NULL,
`text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

