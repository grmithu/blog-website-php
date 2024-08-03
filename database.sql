-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 06:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssb275`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text DEFAULT NULL,
  `cat_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`) VALUES
(7, 'Business', 'Business Description', 1),
(8, 'Entertainment', '', 1),
(9, 'Bangladesh', '', 1),
(10, 'Tech', '', 1),
(11, 'Sports', '', 1),
(13, 'World', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `category_id`, `author_id`, `status`, `tags`, `post_date`) VALUES
(3, 'Biden says \'very concerned\' about Middle East tensions', 'US President Joe Biden said Thursday that he was concerned about soaring tensions in the Middle East and had urged Israeli Prime Minister Benjamin Netanyahu to quickly reach a Gaza ceasefire deal.\r\n\r\n\r\n\"I\'m very concerned about it,\" Biden told reporters as he met freed US prisoners returning from Russia, adding that the assassination of Hamas political chief Ismail Haniyeh in Iran had \"not helped\" the situation.', '1986281_biden_1.jpg', 13, 9, 1, 'us_biden', '2024-08-02'),
(4, 'Mushfiqur, Mominul to tour Pakistan with Bangladesh A', 'Experienced campaigners Mushfiqur Rahim and Mominul Haque will feature for Bangladesh A in the opening four-day match of the upcoming two-match series against their Pakistani counterparts.\r\n\r\nBangladesh Cricket Board on Tuesday announced separate squads for its forthcoming Pakistan tour, where they will also play three one-day matches against the same opposition following the four-day series.\r\n\r\nGoogle News LinkFor all latest news, follow The Daily Star\'s Google News channel.\r\nApart from the senior duo, Mahmudul Hasan Joy, Zakir Hasan, Hasan Mahmud, and Nayeem Hasan, who are expected to be part of Bangladesh\'s Test team for the two-match series against Pakistan in late August, are named in the opening four-day match squad.\r\n\r\nHowever, these six cricketers weren\'t named in the second match squad as they will join the remaining members of the national team in Pakistan, who will travel to Pakistan on August 17, after the first four-day game, scheduled for August 10-13.', '1429342_mominul-mushfiqur.jpg', 11, 9, 1, 'cricket', '2024-08-02'),
(5, 'Internet blackout: Freelancers in trouble', 'With the complete shutdown of internet services across Bangladesh for the past five days, life on the digital frontier had come to a grinding halt. Mobile internet access was restricted on July 16 amidst country-wide protests against quota reinstatement in government jobs. Following escalating street violence, a complete internet blackout was suddenly imposed on July 18, with no prior warning. Now, the country\'s freelancers, whose income depends heavily on internet access, are facing significant financial difficulties.\r\n\r\nTimely communication is paramount in online freelancing platforms like Fiverr and Upwork. Freelancers typically rely on the platforms\' embedded messaging systems to communicate with clients. Unfortunately, the internet shutdown rendered communication entirely impossible.\r\n\r\nThe global freelancing marketplace operates at a fast pace, with clients and workers adhering to strict deadlines for project orders and deliveries. Failure to deliver on time often results in negative client feedback, which can significantly impact a freelancer\'s earnings if enough negative ratings accumulate.', '4265596__mg_9060_copy.jpg', 10, 9, 1, 'freelancer', '2024-08-02'),
(6, 'Apple confirms using Google\'s chips to build AI tools', 'Apple used chips designed by Google instead of those from the industry leader Nvidia to develop two essential components of its artificial intelligence software infrastructure for its upcoming AI tools and features, as per a recent research paper by Apple. \r\n\r\nApple\'s decision to rely on Google\'s cloud infrastructure is notable because Nvidia produces the most sought-after AI processors. Including the chips made by Google, Amazon.com, and other cloud computing companies, Nvidia commands roughly 80% of the market.\r\n\r\nIn the research paper, Apple did not explicitly say that it used no Nvidia chips, but its description of the hardware and software infrastructure of its AI tools and features lacked any mention of Nvidia hardware.\r\n\r\nThe iPhone maker said that to train its AI models, it used two flavours of Google\'s tensor processing unit (TPU) that are organised in large clusters of chips. To build the AI model that will operate on iPhones and other devices, Apple used 2,048 of the TPUv5p chips. For its server AI model, Apple deployed 8,192 TPUv4 processors.\r\n\r\n', '626238_apple_store.jpg', 10, 9, 1, 'apple', '2024-08-02'),
(7, 'Mehazabien’s debut film selected for Toronto Int\'l Film Fest', 'Actress Mehazabien Chowdhury\'s first footfall into the silver screen space, \"Saba\", has officially been selected to be screened during the Discovery Program at the Toronto International Film Festival (TIFF). \r\n\r\n\r\nDirected by Maksud Hossain, \"Saba\" marks Mehazabien\'s transition from a 14-year television career to the big screen. On International Mother Language Day (February 21), she shared the film\'s official poster on social media, announcing her debut on the silver screen.\r\n\r\nBack then, Mehazabien expressed her hope, saying, \"With its story, characters, direction, talented co-stars, and skilled crew, \'Saba\' will always hold a special place in my heart.\"\r\n\r\n\r\nThe actress plays the titular role in \"Saba\", with Rokeya Prachy and Mostafa Monwar as additional cast members. The story and screenplay have been written by Trilora Khan and the director Maksud Hossain himself.', '339596_untitled_design_1_0.jpg', 8, 9, 1, 'film', '2024-08-02'),
(8, 'Bank of England cuts rate for first time since pandemic', 'The Bank of England on Thursday cut its main interest rate for the first time since the Covid pandemic broke out in 2020, as British inflation has retreated in recent months.\r\n\r\nIn a tight 5-4 vote, BoE policymakers agreed to reduce borrowing costs by a quarter-point to 5.0 percent, the central bank announced following a regular meeting.\r\n\r\nGovernor Andrew Bailey joined four other policymakers in bringing the rate down from a 16-year high, which will ease pressure on borrowers while denting interest earned by savers.\r\n\r\nRetail banks tend to mirror the direction of BoE policy when setting their own interest rates.\r\n\r\n\"Inflationary pressures have eased enough that we\'ve been able to cut interest rates,\" Bailey said in a short statement. \"But we need to make sure inflation stays low, and be careful not to cut interest rates too quickly or by too much.\"\r\n\r\n', '1857922_bank_of_england.avif', 7, 9, 1, 'bank', '2024-08-02'),
(9, 'Rail service to resume on limited scale from Thursday', 'Bangladesh Railway (BR) will resume operations of passenger trains on a limited scale from Thursday (August 1), around two weeks after the service was suspended.\r\n\r\nSome local, mail and commuter trains will be operated on the short distance routes during the break of the ongoing curfew, Railways Minister Zillul Hakim said today.\r\n\r\nHowever, no decision regarding the intercity train service was taken, he told reporters after a meeting with the officials of his ministry and railway in the capital\'s Rail Bhaban.\r\n\r\nEarlier on July 24, Railways Ministry Secretary Humayun Kabir told journalists that BR would resume operations on a limited scale from the following day. But later the BR backtracked from the decision.\r\n\r\nThe BR suspended operation of all train services from July 18 afternoon amid violence in different parts of the country centring the quota reform movement.', '750075_bangladesh-railway_0.avif', 9, 9, 1, 'reil', '2024-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `sub_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Admin, 2= Editor',
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '0 = In-Active, 1 = Active',
  `image` text DEFAULT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`, `phone`, `address`, `role`, `status`, `image`, `join_date`) VALUES
(9, 'Admin', 'admin@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '01907840170', '', 1, 1, '1978957_IMG_20240420_144931.jpg', '2024-08-02'),
(10, 'golam rahim', 'apu@gmail.com', 'apu', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 1, 1, NULL, '2024-08-02'),
(11, 'Golam Rabbani Mithu', 'mithu@gmail.com', 'mithu', '123456', '01907840170', NULL, 1, 1, NULL, '2024-08-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
