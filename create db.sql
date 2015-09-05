CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `posttime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
CREATE TABLE `sub` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `subname` varchar(45) DEFAULT NULL,
  `creationdate` date NOT NULL,
  `slug` varchar(45) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  `lastupdate` datetime NOT NULL,
  `messageamount` int(11) DEFAULT '0',
  `subname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rights` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


