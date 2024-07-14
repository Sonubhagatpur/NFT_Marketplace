-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2024 at 09:43 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u880969210_nftiverse_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `about` text DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `create_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `verify`, `about`, `images`, `create_date`) VALUES
(4, 'Sonu', 'ss@gmail.com', '$2y$10$vOybVWtlwKFlODaupSmBhO8D10hhrVLeQzhwQvjdWl7WhRF4Rt8rG', 1, 'test mode', 'images/904255.png', '1720348034'),
(5, 'admin', 'admin@gmail.com', '$2y$10$ieUgdhq1ov5gGcUlcxBc0e6gAHetRHVffWPQ6h2cx1Q2YzpXXX6Hq', 1, 'This is a root user', 'images/679843.png', '1720348843');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_description`, `description`, `image`, `date`) VALUES
(2, 'How to create NFT item', 'The NFT can be associated with a particular digital or physical asset such as images, art, music, and sport highlights and may confer licensing rights.', 'The NFT can be associated with a particular digital or physical asset such as images, art, music, and sport highlights and may confer licensing rights....', 'images/250532.png', '1720628296'),
(3, 'How to sell NFT item', 'NFTs function like cryptographic tokens, but unlike cryptocurrencies such as Bitcoin or Ethereum, NFTs are not mutually interchangeable...', 'NFTs function like cryptographic tokens, but unlike cryptocurrencies such as Bitcoin or Ethereum, NFTs are not mutually interchangeable...', 'images/666793.png', '1720628344'),
(4, 'Where to sell NFT item', 'NFTs function like cryptographic tokens, but unlike cryptocurrencies such as Bitcoin or Ethereum, NFTs are not mutually interchangeable...', 'The ownership of an NFT as defined by the blockchain has no inherent legal meaning, and does not necessarily grant copyright, intellectual property...', 'images/521570.jpg', '1720628390');

-- --------------------------------------------------------

--
-- Table structure for table `contactUs`
--

CREATE TABLE `contactUs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` blob NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Nft_activity`
--

CREATE TABLE `Nft_activity` (
  `id` int(11) NOT NULL,
  `Nft_name` varchar(255) NOT NULL,
  `Nft_image` varchar(255) NOT NULL,
  `nft_type` varchar(125) NOT NULL,
  `Date` date NOT NULL,
  `Address` varchar(125) NOT NULL,
  `to_address` varchar(255) DEFAULT NULL,
  `Nft_id` varchar(255) NOT NULL,
  `Nft_price` varchar(255) NOT NULL,
  `NFT_owner` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `creator_address` varchar(125) DEFAULT NULL,
  `statusagainmulti` int(11) DEFAULT NULL,
  `NFT_payment` varchar(50) NOT NULL DEFAULT 'BCC',
  `Mintstatus` int(11) NOT NULL DEFAULT 0,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Nft_activity`
--

INSERT INTO `Nft_activity` (`id`, `Nft_name`, `Nft_image`, `nft_type`, `Date`, `Address`, `to_address`, `Nft_id`, `Nft_price`, `NFT_owner`, `quantity`, `creator_address`, `statusagainmulti`, `NFT_payment`, `Mintstatus`, `timestamp`) VALUES
(807, 'Team', 'uploads/517209.jpg', 'Minted', '2024-07-10', 'nulled', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '97552201', '0.02', NULL, 0, NULL, NULL, 'BCC', 1, '1720630666'),
(805, 'Books ', 'uploads/38011.jpg', 'Minted', '2024-07-07', 'nulled', '0x9d0893114A813f8418Cf9EfEf5D8E9DdAB78AA9e', '47205881', '0.01', NULL, 0, NULL, NULL, 'BCC', 1, '1720373501'),
(806, 'Testing', 'uploads/272562.jpg', 'Sold', '0000-00-00', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '0x89A78E1d637137558923E1D253943Dead97E8618', '76885697', '0.01', NULL, 0, NULL, NULL, 'BCC', 0, '1720459100'),
(802, 'Auction', 'uploads/134988.jpg', 'Minted', '2024-07-07', 'nulled', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '29121285', '0.002', NULL, 0, NULL, NULL, 'BCC', 1, '1720372620'),
(801, 'Testing', 'uploads/272562.jpg', 'Minted', '2024-07-07', 'nulled', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '76885697', '0.01', NULL, 0, NULL, NULL, 'BCC', 1, '1720357115');

-- --------------------------------------------------------

--
-- Table structure for table `NFT_buy`
--

CREATE TABLE `NFT_buy` (
  `Id` int(11) NOT NULL,
  `Username` text DEFAULT NULL,
  `Address` varchar(255) NOT NULL DEFAULT '0xA7F48731E0F1ab4D899C011e3676F688Ccaf92E4',
  `value` varchar(255) NOT NULL DEFAULT '0',
  `time` date NOT NULL,
  `image` blob NOT NULL,
  `NFT_image` blob NOT NULL,
  `NFT_name` blob NOT NULL,
  `NFT_id` int(10) NOT NULL,
  `collection` varchar(50) NOT NULL,
  `currency` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `NFT_buy`
--

INSERT INTO `NFT_buy` (`Id`, `Username`, `Address`, `value`, `time`, `image`, `NFT_image`, `NFT_name`, `NFT_id`, `collection`, `currency`) VALUES
(5, 'SSY', '0x89A78E1d637137558923E1D253943Dead97E8618', '0.01', '0000-00-00', 0x696d616765732f3930333630365f656d6f757365722e6a706567, 0x75706c6f6164732f3237323536322e6a7067, 0x54657374696e67, 76885697, 'NFTVERSE', 'BCC');

-- --------------------------------------------------------

--
-- Table structure for table `nft_category`
--

CREATE TABLE `nft_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(125) DEFAULT NULL,
  `category_image` varchar(125) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nft_category`
--

INSERT INTO `nft_category` (`id`, `category_name`, `category_image`, `status`) VALUES
(1, 'Art', './uploads/TypesofArt.jpg', 0),
(4, 'Virtual Worlds', '/collections/638755.jpg', 0),
(6, 'Photographys', '/collections/878373.png', 0),
(7, 'Avatar', '/collections/959775.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nft_collections`
--

CREATE TABLE `nft_collections` (
  `id` int(10) NOT NULL,
  `collection_image` varchar(255) DEFAULT NULL,
  `Address` varchar(125) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `collection_logo` varchar(255) NOT NULL,
  `collection_status` int(11) NOT NULL DEFAULT 0,
  `collection_time` datetime NOT NULL DEFAULT current_timestamp(),
  `collection_description` blob NOT NULL,
  `title` text NOT NULL,
  `blockchain_network` varchar(25) NOT NULL DEFAULT 'Blokista',
  `url` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nft_collections`
--

INSERT INTO `nft_collections` (`id`, `collection_image`, `Address`, `collection_name`, `collection_logo`, `collection_status`, `collection_time`, `collection_description`, `title`, `blockchain_network`, `url`, `category`) VALUES
(67, 'collections/459391slider-1.png', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 'NFTVERSE', 'collections/607719portfolio-07.jpg', 0, '2024-07-06 17:25:32', 0x4e46545645525345, 'NFTVERSE', 'Blokista', 'https://', 'ART'),
(68, 'collections/412569uae-image.jpg', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 'Testing', 'collections/247246hw-img-2.jpg', 0, '2024-07-06 17:26:50', 0x436f6c6c656374696f6e204465736372697074696f6e, 'Collection Title ', 'Blokista', 'Custom URL', 'Flikmart'),
(64, 'collections/412569uae-image.jpg', '0x240b99b47bBEE9d1B3425a35170D78e98b216248', 'Collection Name ', 'collections/247246hw-img-2.jpg', 0, '2024-06-30 17:40:05', 0x437573746f6d2055524c0d0a437573746f6d2055524c0d0a437573746f6d2055524c0d0a, 'Collection Title ', 'Blokista', 'Custom URL', 'Sandalwood'),
(69, 'collections/705704.jpg', NULL, 'AAA', 'collections/285280.png', 0, '0000-00-00 00:00:00', 0x42424242, '1', 'Blokista', '', ''),
(66, 'collections/688415uae-flag.png', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 'My Collection', 'collections/287740uae-flag.png', 0, '2024-07-03 19:15:51', 0x436f6c6c656374696f6e204465736372697074696f6e0d0a, 'Collection Title ', 'Blokista', 'https://', 'ART');

-- --------------------------------------------------------

--
-- Table structure for table `NFT_info`
--

CREATE TABLE `NFT_info` (
  `id` int(11) NOT NULL,
  `NFT_name` varchar(255) NOT NULL,
  `NFT_likes` int(10) NOT NULL DEFAULT 0,
  `NFT_price` float NOT NULL DEFAULT 0,
  `NFT_royalties` int(10) NOT NULL,
  `NFT_resell` varchar(10) NOT NULL DEFAULT 'on',
  `NFT_owner_address` varchar(255) NOT NULL,
  `NFT_creator_add` varchar(255) NOT NULL,
  `NFT_discription` blob NOT NULL,
  `NFT_category` varchar(255) DEFAULT NULL,
  `NFT_type` int(11) NOT NULL DEFAULT 0,
  `NFT_id` varchar(125) NOT NULL,
  `NFT_image` varchar(255) NOT NULL,
  `NFT_time` varchar(255) NOT NULL,
  `NFT_collection` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `bid_start_date` varchar(255) DEFAULT NULL,
  `bid_expiration_date` text DEFAULT NULL,
  `Mintstatus` int(11) NOT NULL DEFAULT 0,
  `approved` int(1) NOT NULL DEFAULT 0,
  `NFT_highest_bidder` varchar(100) DEFAULT NULL,
  `NFT_highest_bid` varchar(100) NOT NULL DEFAULT '0',
  `block` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `NFT_info`
--

INSERT INTO `NFT_info` (`id`, `NFT_name`, `NFT_likes`, `NFT_price`, `NFT_royalties`, `NFT_resell`, `NFT_owner_address`, `NFT_creator_add`, `NFT_discription`, `NFT_category`, `NFT_type`, `NFT_id`, `NFT_image`, `NFT_time`, `NFT_collection`, `title`, `bid_start_date`, `bid_expiration_date`, `Mintstatus`, `approved`, `NFT_highest_bidder`, `NFT_highest_bid`, `block`) VALUES
(40, 'Testing', 1, 1, 5, '1', '0x89A78E1d637137558923E1D253943Dead97E8618', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 0x4465736372697074696f6e204465736372697074696f6e, 'Art', 1, '76885697', 'uploads/272562.jpg', '2024-07-07 06:28:35', 'NFTVERSE', 'title Description title Description title Description', '2024-07-09', '2024-07-11', 1, 0, NULL, '0', 0),
(41, 'Auction', 1, 0.002, 5, '1', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 0x4465736372697074696f6e, 'Art', 1, '29121285', 'uploads/134988.jpg', '2024-07-07 10:47:00', 'NFTVERSE', 'title', '2024-07-08', '2024-07-08', 1, 1, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1.2', 0),
(44, 'Books ', 1, 0.01, 5, '1', '0x9d0893114A813f8418Cf9EfEf5D8E9DdAB78AA9e', '0x9d0893114A813f8418Cf9EfEf5D8E9DdAB78AA9e', 0x54686973204e465420666f722074657374696e6720, 'Art', 1, '47205881', 'uploads/38011.jpg', '2024-07-07 11:01:41', 'NFTVERSE', 'Read My books ', '2024-07-07', '2024-07-24', 1, 1, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '20', 0),
(45, 'Team', 0, 0.02, 5, '1', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', 0x64657363, 'Metaverse', 0, '97552201', 'uploads/517209.jpg', '2024-07-10 10:27:46', 'Testing', 'Title', '', '', 1, 1, NULL, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `NFT_like`
--

CREATE TABLE `NFT_like` (
  `id` int(10) NOT NULL,
  `NFT_id` int(10) NOT NULL,
  `User_address` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `NFT_like`
--

INSERT INTO `NFT_like` (`id`, `NFT_id`, `User_address`, `time`) VALUES
(40, 50973988, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '2024-07-03 18:54:29'),
(41, 8021, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '2024-07-06 10:39:48'),
(44, 47205881, '0x9d0893114A813f8418Cf9EfEf5D8E9DdAB78AA9e', '2024-07-07 18:01:16'),
(47, 76885697, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '2024-07-07 18:08:24'),
(49, 29121285, '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '2024-07-08 16:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `NFT_onlybid`
--

CREATE TABLE `NFT_onlybid` (
  `id` int(11) NOT NULL,
  `NFT_id` varchar(100) NOT NULL,
  `owner_address` varchar(100) NOT NULL,
  `NFT_bid_amount` varchar(100) NOT NULL,
  `NFT_bidder_address` varchar(100) NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `NFT_onlybid`
--

INSERT INTO `NFT_onlybid` (`id`, `NFT_id`, `owner_address`, `NFT_bid_amount`, `NFT_bidder_address`, `timestamp`) VALUES
(1, '46474042', '', '20', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720271106'),
(2, '47205881', '', '20', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720373904'),
(3, '29121285', '', '1', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720457904'),
(4, '29121285', '', '1.1', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720458220'),
(5, '29121285', '', '1.2', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720458270'),
(6, '29121285', '', '0.01', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '1720458698');

-- --------------------------------------------------------

--
-- Table structure for table `Nft_sell`
--

CREATE TABLE `Nft_sell` (
  `id` int(11) NOT NULL,
  `nft_id` int(255) DEFAULT NULL,
  `Nft_image` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `value` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Time` date NOT NULL,
  `NFT_name` varchar(255) NOT NULL,
  `collection` varchar(50) NOT NULL,
  `currency` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Nft_sell`
--

INSERT INTO `Nft_sell` (`id`, `nft_id`, `Nft_image`, `Username`, `image`, `value`, `Address`, `Time`, `NFT_name`, `collection`, `currency`) VALUES
(4, 76885697, 'uploads/272562.jpg', 'SSY', 0x696d616765732f3930333630365f656d6f757365722e6a706567, '0.01', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869', '0000-00-00', 'Testing', 'NFTVERSE', 'BCC');

-- --------------------------------------------------------

--
-- Table structure for table `nft_user`
--

CREATE TABLE `nft_user` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL DEFAULT 'Testname 1',
  `Useraddress` varchar(255) NOT NULL,
  `Userimage` varchar(255) NOT NULL DEFAULT 'images/demouser.jpeg',
  `verify` tinyint(11) NOT NULL DEFAULT 0,
  `Useremail` varchar(255) DEFAULT NULL,
  `Usertwitname` varchar(255) DEFAULT NULL,
  `Userinstaname` varchar(255) DEFAULT NULL,
  `Userfacebookname` varchar(255) DEFAULT NULL,
  `Userportfolio` varchar(255) DEFAULT NULL,
  `Userbio` varchar(255) DEFAULT 'this is my bio ',
  `user_priority` int(10) NOT NULL DEFAULT 0,
  `coverphoto` varchar(255) NOT NULL DEFAULT 'images/demouser.jpeg	',
  `url` varchar(255) DEFAULT NULL,
  `block` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nft_user`
--

INSERT INTO `nft_user` (`Id`, `Username`, `Useraddress`, `Userimage`, `verify`, `Useremail`, `Usertwitname`, `Userinstaname`, `Userfacebookname`, `Userportfolio`, `Userbio`, `user_priority`, `coverphoto`, `url`, `block`) VALUES
(174, 'SSS', '0x240b99b47bBEE9d1B3425a35170D78e98b216248 ', 'images/209206_team-1.jpg', 0, 'ss@gmail.com', NULL, NULL, NULL, 'remix.org', 'this is my bio', 0, 'images/897179_uae-image.jpg', 'https://', 0),
(175, 'SSY', '0x89A78E1d637137558923E1D253943Dead97E8618 ', 'images/903606_emouser.jpeg', 0, 'ss@gmail.com', NULL, NULL, NULL, 'remix.org', 'this is my bio ', 0, 'images/716449_morocco.png', 'https://', 0),
(176, 'Testname 1', '0xb1d9F459Be66f6C481870c72F545D161ae3fA4b6 ', 'images/demouser.jpeg', 0, NULL, NULL, NULL, NULL, NULL, 'this is my bio ', 0, 'images/demouser.jpeg	', NULL, 0),
(177, 'Testname 1', '0x1Fb0C631dF78c4Bb723e293D04d687bc0cEfc869 ', 'images/demouser.jpeg', 0, '', NULL, NULL, NULL, '', 'this is my bio ', 0, 'images/demouser.jpeg	', '', 0),
(178, 'Testname 1', '0xC18a7B1E291E886b58193e365510eA26Af260153 ', 'images/demouser.jpeg', 0, NULL, NULL, NULL, NULL, NULL, 'this is my bio ', 0, 'images/demouser.jpeg	', NULL, 0),
(179, 'Manami', '0x9d0893114A813f8418Cf9EfEf5D8E9DdAB78AA9e ', 'images/615429_good.png', 0, 'manami.singh5221@gmail.com', NULL, NULL, NULL, 'manamisingh.com', 'This is my bio', 0, 'images/589432_s5.jpeg', 'manamisingh.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `Email` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `Email`) VALUES
(1, 'example@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `pay_amt` double NOT NULL,
  `rate` double NOT NULL,
  `tokens` double NOT NULL,
  `pay_code` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `pay_time` varchar(255) NOT NULL,
  `transaction_hash` varchar(255) DEFAULT NULL,
  `transaction_time` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactUs`
--
ALTER TABLE `contactUs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Nft_activity`
--
ALTER TABLE `Nft_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NFT_buy`
--
ALTER TABLE `NFT_buy`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `nft_category`
--
ALTER TABLE `nft_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nft_collections`
--
ALTER TABLE `nft_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NFT_info`
--
ALTER TABLE `NFT_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NFT_like`
--
ALTER TABLE `NFT_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `NFT_onlybid`
--
ALTER TABLE `NFT_onlybid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Nft_sell`
--
ALTER TABLE `Nft_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nft_user`
--
ALTER TABLE `nft_user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactUs`
--
ALTER TABLE `contactUs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Nft_activity`
--
ALTER TABLE `Nft_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=808;

--
-- AUTO_INCREMENT for table `NFT_buy`
--
ALTER TABLE `NFT_buy`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nft_category`
--
ALTER TABLE `nft_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nft_collections`
--
ALTER TABLE `nft_collections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `NFT_info`
--
ALTER TABLE `NFT_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `NFT_like`
--
ALTER TABLE `NFT_like`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `NFT_onlybid`
--
ALTER TABLE `NFT_onlybid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Nft_sell`
--
ALTER TABLE `Nft_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nft_user`
--
ALTER TABLE `nft_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
