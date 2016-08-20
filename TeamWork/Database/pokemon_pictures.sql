-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 авг 2016 в 13:17
-- Версия на сървъра: 10.1.8-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamwork`
--

-- --------------------------------------------------------

--
-- Структура на таблица `pokemon_pictures`
--

CREATE TABLE `pokemon_pictures` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `pokemon_pictures`
--

INSERT INTO `pokemon_pictures` (`id`, `name`, `link`) VALUES
(1, 'bulbasaur', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/001.png'),
(2, 'ivysaur', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/002.png'),
(3, 'venusaur', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/003.png'),
(4, 'charmander', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/004.png'),
(5, 'charmeleon', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/005.png'),
(6, 'charizard', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/006.png'),
(7, 'squirtle', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/007.png'),
(8, 'wartortle', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/008.png'),
(9, 'blastoise', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/009.png'),
(10, 'caterpie', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/010.png'),
(11, 'metapod', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/011.png'),
(12, 'butterfree', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/012.png'),
(13, 'weedle', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/013.png'),
(14, 'kakuna', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/014.png'),
(15, 'beedrill', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/015.png'),
(16, 'pidgey', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/016.png'),
(17, 'pidgeotto', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/017.png'),
(18, 'pidgeot', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/018.png'),
(19, 'rattata', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/019.png'),
(20, 'raticate', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/020.png'),
(21, 'spearow', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/021.png'),
(22, 'fearow', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/022.png'),
(23, 'ekans', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/023.png'),
(24, 'arbok', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/024.png'),
(25, 'pikachu', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/025.png'),
(26, 'raichu', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/026.png'),
(27, 'sandshrew', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/027.png'),
(28, 'sandslash', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/028.png'),
(29, 'nidoran ♀', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/029.png'),
(30, 'nidoking', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/030.png'),
(31, 'nidoqueen', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/031.png'),
(32, 'nidoran ♂', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/032.png'),
(33, 'nidorino', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/033.png'),
(34, 'nidoking', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/034.png'),
(35, 'clefairy', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/035.png'),
(36, 'clefable', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/036.png'),
(37, 'vulpix', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/037.png'),
(38, 'ninetales', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/038.png'),
(39, 'jigglypuff', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/039.png'),
(40, 'wigglytuff', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/040.png'),
(41, 'zubat', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/041.png'),
(42, 'golbat', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/042.png'),
(43, 'oddish', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/043.png'),
(44, 'gloom', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/044.png'),
(45, 'vileplume', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/045.png'),
(46, 'paras', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/046.png'),
(47, 'parasect', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/047.png'),
(48, 'venonat', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/048.png'),
(49, 'venomoth', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/049.png'),
(50, 'diglett', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/050.png'),
(51, 'dugtrio', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/051.png'),
(52, 'meowth', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/052.png'),
(53, 'persian', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/053.png'),
(54, 'psyduck', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/054.png'),
(55, 'golduck', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/055.png'),
(56, 'mankey', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/056.png'),
(57, 'primeape', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/057.png'),
(58, 'growlithe', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/058.png'),
(59, 'arcanine', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/059.png'),
(60, 'poliwag', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/060.png'),
(61, 'poliwhirl', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/061.png'),
(62, 'poliwrath', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/062.png'),
(63, 'abra', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/063.png'),
(64, 'kadabra', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/064.png'),
(65, 'alakazam', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/065.png'),
(66, 'machop', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/066.png'),
(67, 'machoke', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/067.png'),
(68, 'machamp', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/068.png'),
(69, 'bellsprout', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/069.png'),
(70, 'weepinbell', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/070.png'),
(71, 'victreebel', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/071.png'),
(72, 'tentacool', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/072.png'),
(73, 'tentacruel', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/073.png'),
(74, 'geodude', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/074.png'),
(75, 'graveler', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/075.png'),
(76, 'golem', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/076.png'),
(77, 'ponyta', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/077.png'),
(78, 'rapidash', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/078.png'),
(79, 'slowpoke', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/079.png'),
(80, 'slowbro', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/080.png'),
(81, 'magnemite', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/081.png'),
(82, 'magneton', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/082.png'),
(83, 'farfetchd', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/083.png'),
(84, 'doduo', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/084.png'),
(85, 'dodrio', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/085.png'),
(86, 'seel', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/086.png'),
(87, 'dewgong', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/087.png'),
(88, 'grimer', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/088.png'),
(89, 'muk', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/089.png'),
(90, 'shellder', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/090.png'),
(91, 'cloyster', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/091.png'),
(92, 'gastly', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/092.png'),
(93, 'haunter', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/093.png'),
(94, 'gengar', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/094.png'),
(95, 'onix', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/095.png'),
(96, 'drowzee', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/096.png'),
(97, 'hypno', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/097.png'),
(98, 'krabby', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/098.png'),
(99, 'kingler', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/099.png'),
(100, 'voltorb', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/100.png'),
(101, 'electrode', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/101.png'),
(102, 'exeggcute', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/102.png'),
(103, 'exeggutor', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/103.png'),
(104, 'cubone', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/104.png'),
(105, 'marowak', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/105.png'),
(106, 'hitmonlee', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/106.png'),
(107, 'hitmonchan', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/107.png'),
(108, 'lickitung', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/108.png'),
(109, 'koffing', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/109.png'),
(110, 'weezing', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/110.png'),
(111, 'rhyhorn', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/111.png'),
(112, 'rhydon', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/112.png'),
(113, 'chansey', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/113.png'),
(114, 'tangela', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/114.png'),
(115, 'kangashkan', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/115.png'),
(116, 'horsea', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/116.png'),
(117, 'seadra', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/117.png'),
(118, 'goldeen', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/118.png'),
(119, 'seaking', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/119.png'),
(120, 'staryu', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/120.png'),
(121, 'starmie', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/121.png'),
(122, 'mr-mime', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/122.png'),
(123, 'scyther', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/123.png'),
(124, 'jynx', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/124.png'),
(125, 'electabuzz', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/125.png'),
(126, 'magmar', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/126.png'),
(127, 'pinsir', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/127.png'),
(128, 'tauros', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/128.png'),
(129, 'magikarp', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/129.png'),
(130, 'gyarados', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/130.png'),
(131, 'lapras', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/131.png'),
(132, 'ditto', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/132.png'),
(133, 'eevee', 'http://assets.pokemon.com/assets/cms2/img/pokedex/detail/133.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon_pictures`
--
ALTER TABLE `pokemon_pictures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon_pictures`
--
ALTER TABLE `pokemon_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
