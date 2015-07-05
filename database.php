<?php 
$database =("

CREATE TABLE IF NOT EXISTS `game_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `box` tinyint(1) NOT NULL,
  `manual` tinyint(1) NOT NULL,
  `console` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `region` varchar(10) NOT NULL,
  `releaseDate` date NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `wikipedia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `game_collection`
--

INSERT INTO `game_collection` (`id`, `cover`, `title`, `box`, `manual`, `console`, `genre`, `region`, `releaseDate`, `description`, `wikipedia`) VALUES
(1, 'assets/img/games/ps2/kingdom_hearts.jpg', 'Kingdom Hearts', 1, 1, 'PS2', 'RPG', 'PAL', '2002-03-28', 'Kingdom Hearts (キングダム ハーツ Kingudamu Hātsu?) is a series of crossover action role-playing games developed and published by Square Enix (originally by Square). It is a collaboration between Square Enix and Disney Interactive Studios, and is under the direction of Tetsuya Nomura, a longtime Square Enix character designer. Kingdom Hearts is a crossover of various Disney settings based in a universe made specifically for the series. The series centers on the main character Sora and his search for his friends and encounters with Disney, Final Fantasy, and The World Ends With You characters on their worlds.', NULL),
(2, 'assets/img/games/ps2/kingdom_hearts2.jpg', 'Kingdom Hearts 2', 1, 1, 'PS2', 'RPG', 'PAL', '2006-09-29', 'Kingdom Hearts II  is an action role-playing game developed and published by Square Enix in 2005 for the PlayStation 2 video game console. The game is a sequel to the 2002 Disney Interactive and Square collaboration, Kingdom Hearts, which combined Disney and Square elements into an action role-playing game, though it is somewhat darker in tone than its predecessor. The game''s popularity has resulted in a novel and manga series based upon it and an international version called Kingdom Hearts II Final Mix, released in March 2007.</p>\r\n\r\n<p>Kingdom Hearts II is the third game in the Kingdom Hearts series. It picks up one year after the events of Kingdom Hearts: Chain of Memories. Sora, the protagonist of the first two games, returns to search for his lost friends. Like the previous games, Kingdom Hearts II features a large cast of characters from Disney films and Final Fantasy games. Organization XIII, a group introduced in Chain of Memories, also reappears to impede Sora''s progress.', 'http://en.wikipedia.org/wiki/Kingdom_Hearts_II'),
(13, 'assets/img/games/PS1/rapid_reload.jpg', 'Rapid Reload', 0, 0, 'PS1', 'Shooter', 'PAL', '2006-02-15', 'Rapid Reload, known in Japan as Gunners Heaven, is a run and gun video game developed by Media.Vision and published by Sony Computer Entertainment for the PlayStation in both Japan and Europe in 1995. The game was re-released on the PlayStation Network in Japan in 2007 and in Asia in 2010. The gameplay of Rapid Reload is often compared to the Treasure game Gunstar Heroes.\r\n\r\nUpon hearing the legend of the treasure known as the Valkiry, treasure hunters Axel Sonics and Ruka Hetfield embark on an adventurous quest to find the legendary stone. However, unknown to Axel and Ruka at the start, there is also a terrorist organization known as the Pumpkin Heads searching for the Valkiry, determined to use the stone for World Domination.', 'http://en.wikipedia.org/wiki/Rapid_Reload'),
(14, 'assets/img/games/atari2600/galaxian.jpg', 'Galaxian', 0, 0, 'Atari 2600', 'Space Shooter', 'PAL', '1974-06-13', 'Galaxian expanded on the formula pioneered by Space Invaders. As in the earlier game, Galaxian features a horde of attacking aliens that exchanged shots with the player.', NULL),
(15, 'assets/img/games/PS1/ffvii.jpg', 'Final Fantasy VII', 1, 1, 'PS1', 'RPG', 'PAL', '1997-11-17', 'Final Fantasy VII, is a role-playing video game developed by Square (now Square Enix) as the seventh installment in the Final Fantasy series. It was released in 1997 for the Sony PlayStation, in 1998 for Microsoft Windows-based personal computers, in 2009 on the PlayStation Network, in 2012 on PC Digital Download, and in 2013 on Steam. The game is the first in the series to use 3D computer graphics, featuring fully rendered characters on pre-rendered backgrounds, and was the first game in the main series to be released in Europe.\r\n\r\nFinal Fantasy VII follows protagonist Cloud Strife, a mercenary who initially joins the eco-terrorist rebel organization AVALANCHE to stop the world-controlling megacorporation Shinra from draining the life of the planet for use as an energy source. As the story progresses, Cloud and his allies become involved in a larger world-threatening conflict, facing off against Sephiroth, the game''s main antagonist.', 'http://en.wikipedia.org/wiki/Final_Fantasy_VII'),
(16, 'assets/img/games/xbox360/brutal_legend.jpg', 'Brutal Legend', 0, 0, 'Xbox 360', 'Platform', 'PAL', '2010-08-11', 'This is about ... Eddie the roadie.', NULL),
(18, 'assets/img/games/PS1/command_conquer.jpg', 'Command & Conquer: Retaliation', 1, 1, 'PS1', 'RTS', 'PAL', '1997-11-01', 'Command & Conquer: Red Alert is a real-time strategy computer game of the Command & Conquer franchise, produced by Westwood Studios and released by Virgin Interactive in 1996. The second game to bear the \"C&C\" title, Red Alert is the prequel to the origin', 'http://en.wikipedia.org/wiki/Command_%26_Conquer:_Red_Alert#Retaliation_.281998.29'),
(19, 'assets/img/games/nes/final_fantasy.jpg', 'Final Fantasy', 0, 0, 'NES', 'RPG', 'NTSC', '1990-07-12', 'Final Fantasy is a fantasy role-playing video game created by Hironobu Sakaguchi, developed and first published in Japan by Square (now Square Enix) in 1987. It is the first game in Square''s Final Fantasy series. Originally released for the Family Computer/NES, Final Fantasy was remade for several video game consoles and is frequently packaged with Final Fantasy II in video game collections.\r\n\r\nThe story follows four youths called the Light Warriors, who each carry one of their world''s four elemental orbs which have been darkened by the four Elemental Fiends. Together, they quest to defeat these evil forces, restore light to the orbs, and save their world.\r\n\r\nThe game received generally positive reviews, and it is regarded as one of the most influential and successful role-playing games on the Nintendo Entertainment System, playing a major role in popularizing the genre. Critical praise focused on the game''s graphics, while criticism targeted the time spent wandering in search of random battle encounters to raise the player''s experience level. By March 2003, all versions of Final Fantasy have sold a combined total of two million copies worldwide.', 'http://en.wikipedia.org/wiki/Final_Fantasy_(video_game)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Menno', 'makeda', 'Holylord87');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

");

$resetDatabase = $db->prepare($database);
$resetDatabase->execute();