CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL auto_increment,
  `evento` varchar(200) NOT NULL,
  `dtevento` varchar(10) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `hora` varchar(5) NOT NULL,
  `conteudo` text NOT NULL,
  `local` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;