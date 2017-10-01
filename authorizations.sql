-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 12:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authorizations`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(9) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'Abkhazia'),
(2, 'Australia'),
(3, 'Austria'),
(4, 'Azerbaijan'),
(5, 'Aland Islands'),
(6, 'Albania'),
(7, 'Algeria'),
(8, 'Anguilla'),
(9, 'Angola'),
(10, 'Andorra'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Afghanistan'),
(15, 'Bahamas'),
(16, 'Bangladesh'),
(17, 'Barbados'),
(18, 'Bahrain'),
(19, 'Belarus'),
(20, 'Belize'),
(21, 'Belgium'),
(22, 'Benin'),
(23, 'Bulgaria'),
(24, 'Bolivia'),
(25, 'Bosnia & Herzegovina'),
(26, 'Botswana'),
(27, 'Brazil'),
(28, 'Brunei Darussalam'),
(29, 'Burundi'),
(30, 'Bhutan'),
(31, 'Vatican City'),
(32, 'United Kingdom'),
(33, 'Hungary'),
(34, 'Venezuela'),
(35, 'Timor, East'),
(36, 'Viet Nam'),
(37, 'Gabon'),
(38, 'Haiti'),
(39, 'Gambia'),
(40, 'Ghana'),
(41, 'Guadeloupe'),
(42, 'Guatemala'),
(43, 'Guinea'),
(44, 'Guinea-Bissau'),
(45, 'Germany'),
(46, 'Gibraltar'),
(47, 'Hong Kong'),
(48, 'Honduras'),
(49, 'Grenada'),
(50, 'Greenland'),
(51, 'Greece'),
(52, 'Georgia'),
(53, 'Guam'),
(54, 'Denmark'),
(55, 'Dominica'),
(56, 'Dominican Republic'),
(57, 'Egypt'),
(58, 'Zambia'),
(59, 'Western Sahara'),
(60, 'Zimbabwe'),
(61, 'Israel'),
(62, 'India'),
(63, 'Indonesia'),
(64, 'Jordan'),
(65, 'Iraq'),
(66, 'Iran'),
(67, 'Ireland'),
(68, 'Iceland'),
(69, 'Spain'),
(70, 'Italy'),
(71, 'Yemen'),
(72, 'Kazakhstan'),
(73, 'Cambodia'),
(74, 'Cameroon'),
(75, 'Canada'),
(76, 'Qatar'),
(77, 'Kenya'),
(78, 'Cyprus'),
(79, 'Kyrgyzstan'),
(80, 'Kiribati'),
(81, 'China'),
(82, 'Colombia'),
(83, 'Korea, D.P.R.'),
(84, 'Korea'),
(85, 'Costa Rica'),
(86, 'Cote d\'Ivoire'),
(87, 'Cuba'),
(88, 'Kuwait'),
(89, 'Lao P.D.R.'),
(90, 'Latvia'),
(91, 'Lesotho'),
(92, 'Liberia'),
(93, 'Lebanon'),
(94, 'Libyan Arab Jamahiriya'),
(95, 'Lithuania'),
(96, 'Liechtenstein'),
(97, 'Luxembourg'),
(98, 'Mauritius'),
(99, 'Mauritania'),
(100, 'Madagascar'),
(101, 'Macedonia'),
(102, 'Malawi'),
(103, 'Malaysia'),
(104, 'Mali'),
(105, 'Maldives'),
(106, 'Malta'),
(107, 'Morocco'),
(108, 'Mexico'),
(109, 'Mozambique'),
(110, 'Moldova'),
(111, 'Monaco'),
(112, 'Mongolia'),
(113, 'Namibia'),
(114, 'Nepal'),
(115, 'Niger'),
(116, 'Nigeria'),
(117, 'Netherlands'),
(118, 'Nicaragua'),
(119, 'New Zealand'),
(120, 'Norway'),
(121, 'United Arab Emirates'),
(122, 'Oman'),
(123, 'Pakistan'),
(124, 'Panama'),
(125, 'Paraguay'),
(126, 'Peru'),
(127, 'Poland'),
(128, 'Portugal'),
(129, 'Russia'),
(130, 'Romania'),
(131, 'San Marino'),
(132, 'Saudi Arabia'),
(133, 'Senegal'),
(134, 'Serbia'),
(135, 'Singapore'),
(136, 'Syrian Arab Republic'),
(137, 'Slovakia'),
(138, 'Slovenia'),
(139, 'Somalia'),
(140, 'Sudan'),
(141, 'USA'),
(142, 'Tajikistan'),
(143, 'Thailand'),
(144, 'Tanzania'),
(145, 'Togo'),
(146, 'Tunisia'),
(147, 'Turkmenistan'),
(148, 'Turkey'),
(149, 'Uganda'),
(150, 'Uzbekistan'),
(151, 'Ukraine'),
(152, 'Uruguay'),
(153, 'Micronesia'),
(154, 'Fiji'),
(155, 'Philippines'),
(156, 'Finland'),
(157, 'France'),
(158, 'Croatia'),
(159, 'Chad'),
(160, 'Montenegro'),
(161, 'Czech Republic'),
(162, 'Chile'),
(163, 'Switzerland'),
(164, 'Sweden'),
(165, 'Sri Lanka'),
(166, 'Ecuador'),
(167, 'Eritrea'),
(168, 'Estonia'),
(169, 'Ethiopia'),
(170, 'South Africa'),
(171, 'Jamaica'),
(172, 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(9) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `id_country` int(9) NOT NULL,
  `birth_date` date NOT NULL,
  `timestamp` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_country` (`id_country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
