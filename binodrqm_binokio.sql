-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2020 at 11:16 PM
-- Server version: 10.1.43-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binodrqm_binokio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `ProductID` varchar(200) NOT NULL,
  `Quantity` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `Subject` text NOT NULL,
  `ComplainBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`ID`, `Uniqid`, `Username`, `Password`) VALUES
(1, '12456789dddddd', 'utdude', '$2y$12$RiaUEDkeKNWmF6sH0BxeM.cV3ICx2juqy7XM368RBzFzBFj7DWeMq');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `ID` int(11) NOT NULL,
  `ProductID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`ID`, `ProductID`) VALUES
(2, '$2y$10$0YB9kNVD6bbwpf8Ng9bDjO50fr7raf6FlONS5KG35oKUGf3GwCcRq'),
(3, '$2y$10$VaPSR8d4aQUF.KG.NsU4YO8QJIDi8mQCX7C1n9ZKrP0TBkVS2kJny'),
(4, '$2y$10$/N38sDcZVymiDhhN3ITOBeFFU7LxJ9tUYMHdzBKyI8PI2bjtjW5Iu'),
(8, '$2y$10$rFbRoZ6JA9HbHi5y57DU7.uqKya.1LPvB/QFFA.2i8V2YccVyZa9a'),
(9, '$2y$10$2p39h5qrJ1HW8uD222UGleVvnMpTjYHg71xU3wWRZMbo1JnG/wYeS');

-- --------------------------------------------------------

--
-- Table structure for table `login-information`
--

CREATE TABLE `login-information` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Verification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login-information`
--

INSERT INTO `login-information` (`ID`, `Uniqid`, `Username`, `Password`, `Verification`) VALUES
(1, '4b9c363674ed35682118259744398d1e', 'binokiooriginals', '$2y$12$eQ83Tlyn06vCssSsy4RvNew72DdZ1zaJBBR57AuJ1WU2iBzPAe.rC', 'VERIFIED'),
(2, '8036e415a57bc15b29b560fafd0eb60f', 'welcomecollection', '$2y$12$4LN6lnq37IgKgJj7rFruseeFHEAvwZIWY4AlIme5/JWjAn4jA3MuO', 'VERIFIED'),
(4, '80c12f837ef9c0066aabfb320dcd0477', 'manjushreefashion', '$2y$12$8ryOJgc4uu1GR0EPirQmJeDS.89weG1BD/wcU/foNMGm8SWvLU6Ym', 'VERIFIED'),
(5, '28f5acf64529c6aa27b076500d57a9d1', 'itsprashantchaudhary', '$2y$12$64MbCR3kNke2z/uwkv62Zejyz0WkgI/9V5gcVuzLPlAnTvWSMr4V2', 'VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `MessageBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `Uniqid`, `MessageBody`) VALUES
(1, '32b971f324a0013bb95a368f1173620b', 'Hi Welcome To Binokio!'),
(2, '32b971f324a0013bb95a368f1173620b', 'you are doing good MR UTDUDE just do it like that\n'),
(3, '8036e415a57bc15b29b560fafd0eb60f', 'Dear Seller,\n\nMr. Ankit Jaiswal \n\nWelcome Collection\n\nThank you ! for registering to binokio and being a part of our seller community.\n\nCEO\nUtkarsh Rai\n'),
(4, '80c12f837ef9c0066aabfb320dcd0477', 'Thankyou for registering to binokio.You are now a Binokio Seller.');

-- --------------------------------------------------------

--
-- Table structure for table `myorders`
--

CREATE TABLE `myorders` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `ProductID` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Address` text NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `OrderID` varchar(200) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `Product_ID` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Seller_ID` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Address` text NOT NULL,
  `LandMark` text NOT NULL,
  `Pincode` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment-information`
--

CREATE TABLE `payment-information` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `PaytmNo` varchar(100) NOT NULL,
  `PaytmName` text NOT NULL,
  `BankName` text NOT NULL,
  `BankAccNo` varchar(100) NOT NULL,
  `IFSCCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment-information`
--

INSERT INTO `payment-information` (`ID`, `Uniqid`, `PaytmNo`, `PaytmName`, `BankName`, `BankAccNo`, `IFSCCode`) VALUES
(1, '4b9c363674ed35682118259744398d1e', '--', '--', '--', '--', '--'),
(2, '8036e415a57bc15b29b560fafd0eb60f', '8601263450', 'Ankit Jaiswal', 'Allahabad Bank', '50423587405', 'ALLAD250907'),
(4, '80c12f837ef9c0066aabfb320dcd0477', '9807008030', 'Manju agree fashion', 'State Bank of india', '36510018618', 'SBIN31495'),
(5, '28f5acf64529c6aa27b076500d57a9d1', '6306554015', '6306554015', '---', '----', '----');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `ProductID` varchar(100) NOT NULL,
  `ProductName` text NOT NULL,
  `ProductImage` text NOT NULL,
  `ProductCategory` varchar(100) NOT NULL,
  `ProductPrice` varchar(100) NOT NULL,
  `ProductWarrenty` varchar(100) NOT NULL,
  `ProductNo` varchar(100) NOT NULL,
  `tags` text NOT NULL,
  `Discription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Uniqid`, `ProductID`, `ProductName`, `ProductImage`, `ProductCategory`, `ProductPrice`, `ProductWarrenty`, `ProductNo`, `tags`, `Discription`) VALUES
(4, '4b9c363674ed35682118259744398d1e', '$2y$10$2p39h5qrJ1HW8uD222UGleVvnMpTjYHg71xU3wWRZMbo1JnG/wYeS', 'Aashirvaad Atta ( 5KG )', '733166aashirvaad-atta-5-kg-500x500 copy.jpg', 'Grocery', '175', 'No Warenty', '10', 'grocery', 'Aashirvaad is a brand of staple food and kitchen ingredients owned by ITC Ltd. '),
(5, '4b9c363674ed35682118259744398d1e', '$2y$10$/N38sDcZVymiDhhN3ITOBeFFU7LxJ9tUYMHdzBKyI8PI2bjtjW5Iu', 'Rice ( 1KG ) ', '1917021 copy copy.jpg', 'Grocery', '45', 'No Warenty', '100', 'grocery', 'Good Quality Rice (Verified By BINOKIO)'),
(6, '4b9c363674ed35682118259744398d1e', '$2y$10$ScHXmSXb5jYXw1zDJvO1OuKAHBTwMaLz7foGToFUE8o/3R6KN/C8u', 'toor Daal (Arhar) ( 1 KG )', '66132567751221-indian-food-toor-dal-also-known-as-split-pigeon-pea-rich-in-proteins-in-a-glass-bowl- copy.jpg', 'Grocery', '103', 'No Warenty', '100', 'grocery', 'Good Quality Toor Dal Or Arhar Daal (Verified By BINOKIO)'),
(7, '4b9c363674ed35682118259744398d1e', '$2y$10$rFbRoZ6JA9HbHi5y57DU7.uqKya.1LPvB/QFFA.2i8V2YccVyZa9a', 'Sugar (5 KG)', '483398267915080_orig.jpg', 'Grocery', '195', 'No Warenty', '100', 'grocery', 'Good Quality Sugar (Verified By BINOKIO)'),
(8, '4b9c363674ed35682118259744398d1e', '$2y$10$m/1HKoeFZ2xeWSFIwua8RumP.0RmYJbuqJo8u0W9HXP5BCfTtNmgK', 'Pasta (2kg)', '626277pasta.jpg', 'Grocery', '105', 'No Warenty', '100', 'grocery', 'Good Quality Pasta (Verified By BINOKIO)'),
(9, '4b9c363674ed35682118259744398d1e', '$2y$10$2gteRKXq4u0DLmPdgfD3Q.gCEKmTEM/BMTP90CEFzo1pS0EaDHnn.', 'Macaroni (2kg)', '549471microni.jpg', 'Grocery', '105', 'No Warenty', '100', 'Grocery', 'Good Quality Macaroni (Verified By BINOKIO)'),
(10, '4b9c363674ed35682118259744398d1e', '$2y$10$jq2hFcrcLVv1X5HfGFR5zOPeeWJIk.c.PuRfjciu6ptm5k90Fu3d2', 'Wheat Atta (5kg) ', '230295atta.jpg', 'Grocery', '170', 'No Warenty', '100', 'Grocery', 'Good Quality Wheat Atta (Verified By BINOKIO)'),
(11, '4b9c363674ed35682118259744398d1e', '$2y$10$AQQ/HxlEeysvR.s3e5.gpu6i40.tK/k0evXC/6bqqlnFISn4rw7l2', 'Almond (Badam) (250g)', '635729badam.jpg', 'Grocery', '185', 'No Warenty', '100', 'Grocery', 'Good Quality Almonds (Verified By BINOKIO)'),
(12, '4b9c363674ed35682118259744398d1e', '$2y$10$3cgCYbdxZZ/zujSIjns.W.wOjlc0sN3SzEwwPY7mjGFgJ1GFGu9nO', 'Boost (750g)', '48891boost.jpg', 'Grocery', '220', 'No Warenty', '100', 'Grocery', 'Nourishing beverage that helps build stamina. Boost has nutrients which help in maintenance of optimal bone &amp; muscle strength. Boost is enriched with Envita Nutrients (Iron, Vitamin A, C, Folic Acid, B12 and B6) that help transport oxygen more effectively in the body.'),
(14, '4b9c363674ed35682118259744398d1e', '$2y$10$EmuIfxmaJCzPIinPI4L/yezN/zyp2x6BK7WvM0zfOgA266ueIUyC2', 'Chana Daal (Split chickpeas) (2kg)', '155666chana dal.jpg', 'Grocery', '35', 'No Warenty', '100', 'Grocery', 'Good Quality Chana Daal (Verified By BINOKIO)'),
(15, '4b9c363674ed35682118259744398d1e', '$2y$10$rrH6Ey6.qe9YM7P76HL3AOxX2V1oT2rqgCWXHmuGVIPP1ExBmWdlm', 'Poha (2kg)', '952479chura.jpg', 'Grocery', '105', 'No Warenty', '100', 'Grocery', 'Good Quality Poha (Verified By BINOKIO)'),
(16, '4b9c363674ed35682118259744398d1e', '$2y$10$oLQHWeWiCXck1wfRIEC3v.G4kyH9yMvY67CZiwU30jxCamfX9uWve', 'Colgate (200g)', '364586colgate.jpg', 'Grocery', '85', 'No Warenty', '100', 'Grocery', 'Colgate is an umbrella brand principally used for oral hygiene products such as toothpastes, toothbrushes, mouthwashes and dental floss. Manufactured by Colgate-Palmolive, Colgate oral hygiene products were first sold by the company in 1873, sixteen years after the death of the founder, William Colgate. '),
(17, '4b9c363674ed35682118259744398d1e', '$2y$10$NisvEtEWiL.1bnNpD86mGeBtZq2uNyGCxco/isBGjU/.7SCPFOxKK', 'Dettol Handwash (2+1)', '223855detol handash.jpg', 'Grocery', '95', 'No Warenty', '100', 'Grocery', 'Your Trusted Dettol offers a new and improved Dettol skincare liquid handwash. It is specially formulated to protect you from 100 illness causing germs. It gives 10 times better protection than any ordinary soap. ... Using Dettol handwash everyday protects from these germs and helps keep your hands clean and refreshed.'),
(18, '4b9c363674ed35682118259744398d1e', '$2y$10$1RsrMIn.GelMqj4o9NMD..mKnelgkGquG2BZrdk7Pi6UJ8cGdYj.W', 'Dove Shampoo (200ml)', '484715dove shampoo.jpg', 'Grocery', '105', 'No Warenty', '100', 'Grocery', 'Dove is a personal care brand owned by Unilever originating in the United Kingdom. Dove products are manufactured in Argentina, Australia, Brazil, Canada, China, Egypt, Germany, India, Indonesia,'),
(19, '4b9c363674ed35682118259744398d1e', '$2y$10$fUJMcDERw07FEFjO9qoKq.YCY2KFS4vt7i3YbfJCfB.gFfv32dNbS', 'Fortune Basmati (1kg)', '503315fortune basmati.jpg', 'Grocery', '140', 'No Warenty', '100', 'Grocery', 'Adding a charm to all your biryani dishes is our Fortune Biryani Special Basmati Rice. With the longest basmati grain, it\'s meant to make your biryani, be it Hyderabadi or Lucknowi look royal and taste exquisite. Grain Size: Full Grain Bags: 1 kg, 5 kgs, 10 kgs &amp; 25 kgs.'),
(20, '4b9c363674ed35682118259744398d1e', '$2y$10$4Qi03Srw8GVV/tCG3Bd0x.u3NTNqfYq9sLC4LylDJzmTA2/R5685u', 'Fortune Refined (1L)', '319904fortune refined.jpg', 'Grocery', '98', 'No Warenty', '100', 'Grocery', '--'),
(21, '4b9c363674ed35682118259744398d1e', '$2y$10$1wW0EUHnh3COhhdROm0jdeqL7ydMaKn8xcCQyRLeDaEBiGNyp5L8W', 'Fortune Atta (5kg)', '333831fortuneatta.jpg', 'Grocery', '165', 'No Warenty', '100', 'Grocery', 'Fortune Chakki Fresh Atta. Handpicked from India\'s finest wheat fields, Fortune Chakki Fresh Atta is made with 100% atta and 0% maida which complements your Ghar ka Khana perfectly.'),
(22, '4b9c363674ed35682118259744398d1e', '$2y$10$4aZYRaY1JG6Bsm/lqY9CtOz8/kbNyztcnsDnLsLVucXwS29.N/h2G', 'Desi Gud (Jaggery) (2kg)', '110262gud.jpg', 'Grocery', '105', 'No Warenty', '100', 'Grocery', 'Good Quality Gud (Verified By BINOKIO)'),
(23, '4b9c363674ed35682118259744398d1e', '$2y$10$i.dEL9JHLLIy5QmJycuUzuVcYsVD.4x3cUrF9zh8poeafeyomXDXu', '', '219506hing.jpg', '111111111111', '--', 'No Warenty', '100', 'Grocery', 'Good Quality Hing (Verified By BINOKIO)'),
(24, '4b9c363674ed35682118259744398d1e', '$2y$10$rcAy1ZYputeuIdBHWeAnQOkhmOt1HDZKDvTTmEllbCGWy/mguQwyC', 'Indiagate Basmati (1kg)', '809225indiagate basmati.jpg', 'Grocery', '120', 'No Warenty', '100', 'Grocery', 'Buy India-Gate Basmati Rice Online. ... For Instance India Gate basmati rice Dubar is a medium grain or half of the full basmati grain of the Pusa grains and are supremely tasty and aromatic. The India Gate basmati mogra rice, on the other hand, is the cheaper variety since it is broken basmati rice.'),
(26, '4b9c363674ed35682118259744398d1e', '$2y$10$Uxef6oODSdkgKu5TNwa5.OE8iLVz6Z9tIvEnM5LqMmtoayz.t.GoS', 'Kabuli Chana (chickpeas) (1kg)', '934635kabuli.jpg', 'Grocery', '75', 'No Warenty', '100', 'Grocery', 'Good Quality Kabuli Chana (Verifie By BINOKIO)'),
(27, '4b9c363674ed35682118259744398d1e', '$2y$10$RnwLb.3Xk/.75.P7WMD7v.dcBNyk.JgxZx7QFLAjqHIvxyf8mNZj.', 'Kaju (cashew) (250g)', '95723kaju.jpg', 'Grocery', '205', 'No Warenty', '100', 'Grocery', 'Good Quality Kaju (cashew) (Verifie By BINOKIO)'),
(28, '4b9c363674ed35682118259744398d1e', '$2y$10$28lBvU3U2JrP6aGv8knrl.00eba1H0iCqf9gvYvAqx6dqTbAxQnLy', 'Kishmish (Raisins) (250g)', '128069kishmis.jpg', 'Grocery', '85', 'No Warenty', '100', 'Grocery', 'Good Quality Kishmish (Raisins) (Verifie By BINOKIO)'),
(30, '4b9c363674ed35682118259744398d1e', '$2y$10$k/JUfFvbNuUyVXSAZZNT7OL7ZssAAtI.0LhxEgBLC/0ePrBCnBHcq', 'Maggi (6 pack)', '808407maggi.png', 'Grocery', '63', 'No Warenty', '100', 'Grocery', 'Maggi is an international brand of seasonings, instant soups, and noodles that originated in Switzerland in late 19th century. The Maggi company was acquired by NestlÃ© in 1947.'),
(31, '4b9c363674ed35682118259744398d1e', '$2y$10$8e/qoRjgzBUWBCM2qDWf/uKM8HMrvYes6CdHKuIUUgsRVPrIzTvjS', 'Masoor Daal (Red Lentil) (2kg)', '548035masur dal.jpeg', 'Grocery', '120', 'No Warenty', '100', 'Grocery', 'Good Quality Masoor Daal (Red Lentils) (Verified By BINOKIO) '),
(32, '4b9c363674ed35682118259744398d1e', '$2y$10$tcsU3F4fctL23qBXB2rc..Pxx83/w0AkIxolFL.phvrlGHzL8i5mG', 'Moong Daal (Split Green gram) (1kg)', '387257moong.jpg', 'Grocery', '115', 'No Warenty', '100', 'Grocery', 'Good Quality Moong Daal (Split Green gram)  (Verified By BINOKIO) '),
(33, '4b9c363674ed35682118259744398d1e', '$2y$10$LZGD7NZ7eLSaGUl.sArfb.QyiyXD6j1RcS/ppkb3.E2Zj38MNtd6i', 'NatureFresh Atta (5kg)', '130716nature fresh atta.jpg', 'Grocery', '165', 'No Warenty', '100', 'Grocery', '--'),
(34, '4b9c363674ed35682118259744398d1e', '$2y$10$PHLyeafakGlBKExMQONGCuiXq4KhyF8NpoxRsBjYi.N5hvHZwSLZC', 'Naya Chawal (New Rice) (5kg)', '991358naya chawal.jpg', 'Grocery', '150', 'No Warenty', '100', 'Grocery', 'Good Quality New Rice (Verified By BINOKIO)'),
(35, '4b9c363674ed35682118259744398d1e', '$2y$10$7kOdqsxM0qtF83z6.Ttg7.uCIvfjfcdDPUdJqCPh9bahjtHe3MU6C', 'Rajma (Kidney beans) (1kg)', '818387rajma.jpg', 'Grocery', '115', 'No Warenty', '100', 'Grocery', 'Good Quality Rajma (Kidney Beans)  (Verified By BINOKIO)'),
(36, '4b9c363674ed35682118259744398d1e', '$2y$10$Uh6leYshS0chctzzLywr/OvWqyAN5XM6YGM3MqqJ9MsbiHQJmwr9G', 'Red Label Tea (250g)', '94404red label.jpg', 'Grocery', '93', 'No Warenty', '100', 'Grocery', 'Brooke Bond Red Label is one of India\'s largest selling tea brands. When made with a touch of your love, it gives your family that irresistible great taste which brings them together. Every cup of Red Label Tea is brewed with the best chosen tea leaves.'),
(37, '4b9c363674ed35682118259744398d1e', '$2y$10$tTMA6SrEUSM84sCaT96qkeN2nJpAR1kcu0Vht9LbI0lBYuCaux2WW', 'Tajmahal Tea (250g)', '957447tajmeha chai.jpg', 'Grocery', '110', 'No Warenty', '100', 'Grocery', '--'),
(38, '4b9c363674ed35682118259744398d1e', '$2y$10$itLZxN.BlwKZmVTk1YdvQu9N1n9bXe.ZYe7MN9NrWSsiqYcyllogy', 'Urad daal (Split Black gram) (1kg)', '459182urad.jpg', 'Grocery', '115', 'No Warenty', '100', 'Grocery', 'Good Quality Urad Daal (Split Black gram) (Verified By BINOKIO)'),
(39, '4b9c363674ed35682118259744398d1e', '$2y$10$c.o5zhTj3RZpgdIiPkNC/ugbYlQKXd/lMDtVTRCedXYg4PhEo692y', 'Bournvita (500g)', '187579bornvita.jpg', 'Grocery', '205', 'No Warenty', '100', 'grocery', 'Bournvita is a brand of malted and chocolate malt drink mixes manufactured by Cadbury, a subsidiary of Mondelez International. It is sold in and North America, as well as India, Nepal, Bangladesh, Nigeria, Benin, and Togo. Bournvita was developed in England in the late 1920s and was marketed as a health food.'),
(43, '28f5acf64529c6aa27b076500d57a9d1', '$2y$10$0kVcIFbYoxyrVn6qML0Qb.DWJg2rvf.KvfRzbuLkDkTqNDhDrB0tm', '3 in 1 Smartphone stand holder, Stylus&amp; ball point pen ', '909387IMG_20200104_211014.jpg', 'Other', '36', 'No Warenty', '50', 'Pen', '--'),
(44, '4b9c363674ed35682118259744398d1e', '$2y$10$6hEM1Wp4yecFwwUxAw443OeaXfLnJ57CNGyRfOEdcNTpVpzTODWry', 'Armani Exchange Black Ripped Jeans ', '19823624c621b4-7068-44f6-95d6-23b6ebca67b0.jpg', 'Cloth', '770', 'No Warenty', '1', 'Jeans', 'Armani Exchange Black Ripped Jeans \r\nPure Cotton 100%'),
(46, '4b9c363674ed35682118259744398d1e', '$2y$10$NV4A27N6ZMIIYv0r.Pg4UO1.SgOAK7cg3AVwOmrvPri3BXaqFwqUi', 'Flu (Blue) faded jeans ', '286774IMG-20200105-WA0007-01.jpeg', 'Cloth', '650', 'No Warenty', '5', 'Jeans', '100% pure cotton blue faded jeans \r\nBest quality material.'),
(47, '4b9c363674ed35682118259744398d1e', '$2y$10$g1RFWqv8AxP9iJzxHsrGaOiOgjIvfmNdhS7wKEFQlgDRgGlHDi.dG', 'KILLER (BLACK) Dot printed cotton shirt ', '212085IMG-20200105-WA0010.jpg', 'Cloth', '500', 'No Warenty', '5', 'Shirt', 'Killer 100% cotton Dot printed black shirt.'),
(48, '4b9c363674ed35682118259744398d1e', '$2y$10$tshnrpxyseL6AnbqPV9IAu6Wg2sBoKADKPO/U1tLEOym4ussZMHU6', 'TOMMY HILFIGER (RED) Check shirt ', '431171IMG-20200105-WA0009.jpg', 'Cloth', '530', 'No Warenty', '1', 'Shirt', 'TOMMY HILFIGER (RED) Check shirt '),
(49, '4b9c363674ed35682118259744398d1e', '$2y$10$d7/qpB2BNAnoPE3BXWGcVeNresUiIWbZI1tVumxaUObBtOabcvz72', 'U.S. POLO ASSN. Check cotton shirt ', '222510IMG-20200105-WA0008.jpg', 'Cloth', '530', 'No Warenty', '1', 'Shirt', 'U.S. POLO ASSN. Check Cotton shirt 100% cotton.\r\n(COLOUR MAY VARY FROM IMAGE)'),
(50, '4b9c363674ed35682118259744398d1e', '$2y$10$ZWSzP1IM5lxLG6MwEPJ7pOBUr8jNVdPsINml45GqPyjyaTxKYu8OO', 'Pure cotton Ready-made Pants (Cream)(Waist-28)', '998223IMG-20200105-WA0006-04.jpeg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton pants 100% cotton.\r\nSize - WAIST - 28\r\n(COLOUR MAY VARY FROM IMAGE)'),
(51, '4b9c363674ed35682118259744398d1e', '$2y$10$v8bxWX9zh1jpSNWs/tQ9E.xrgUCdWqrgG35yoHYHCxE7TwZFR2IfG', 'Pure cotton Ready-made Pants (dark blue)(Waist-28)', '165548IMG-20200105-WA0006-03.jpeg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton pants 100% cotton.\r\nSize - WAIST - 28\r\n(COLOUR MAY VARY FROM IMAGE)'),
(52, '4b9c363674ed35682118259744398d1e', '$2y$10$35dXyfGDy4oz.A1BS4urDeLe5RQoCjKkw8Ke3S0foN7B/16qi19kK', 'Pure cotton Ready-made Pants (Waist-28)', '163131IMG-20200105-WA0006-07.jpeg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton pants 100% cotton.\r\nSize - WAIST - 28\r\n(COLOUR MAY VARY FROM IMAGE)\r\nWe will call for colour confirmation .'),
(53, '4b9c363674ed35682118259744398d1e', '$2y$10$w0nqVSHjQcqM.Q81/w6gUOdlASlfEMr03BrWyXVgMvRpY94NN5Xlq', 'Pure cotton Ready-made Pants (Waist-28)', '993285IMG-20200105-WA0006-05.jpeg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton pants 100% cotton.\r\nSize - WAIST - 28\r\n(COLOUR MAY VARY FROM IMAGE)\r\nWe will call for colour confirmation .'),
(54, '4b9c363674ed35682118259744398d1e', '$2y$10$Xb/H/c6sYZNobpuuLuMsZOnXrufjlWEhL8RN/NlCi5icS.5e.PXRu', 'Pure cotton Ready-made Pants (Waist-28)', '910959IMG-20200105-WA0006-08.jpeg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton pants 100% cotton.\r\nSize - WAIST - 28\r\n(COLOUR MAY VARY FROM IMAGE)\r\nWe will call for colour confirmation .'),
(55, '4b9c363674ed35682118259744398d1e', '$2y$10$bo03tluSIKsKSddRbFmwHORDqwthUnMUbScf8ld/hzmtavOcQHHTi', 'SPARKY Ready-made shirt (L)', '489300IMG-20200105-WA0004.jpg', 'Cloth', '520', 'No Warenty', '1', 'Shirt', 'Pure cotton SPARKY Shirt 100% cotton.\r\nSize - L\r\n(COLOUR MAY VARY FROM IMAGE)\r\nWe will call for colour Or Size confirmation .'),
(56, '4b9c363674ed35682118259744398d1e', '$2y$10$6shNPCcK0zXq0jU6UNUHnOLNE5Rn6nUtC.ElTs.pMwb1vZ0A8A/cO', 'BLUE Faded and Ripped Jeans ', '310936IMG-20200105-WA0005-01.jpeg', 'Cloth', '670', 'No Warenty', '1', 'jeans', 'COLOUR MAY VARY FROM IMAGE)\r\nWe will call for colour Or Size confirmation .'),
(57, '4b9c363674ed35682118259744398d1e', '$2y$10$BhenzjdXZf1IhgYEaixw9uf3kMioQCXsA5DqtO6y4gi8sGcw9CfAe', 'Besan(Gram Flour) (500gm) ', '382303images (1).jpeg', 'Grocery', '45', 'No Warenty', '100', 'Besan', 'Good quality besan ( Verified By BINOKIO)'),
(58, '4b9c363674ed35682118259744398d1e', '$2y$10$baguD0GEPiQ8HfuP5WVvsuUyT97HJwydRySFq5iYNuIDIVZ.NxiW2', 'Maida (Wheat Flour) (1kg) ', '461752images (2)-01.jpeg', 'Grocery', '45', 'No Warenty', '100', 'Maida', 'Good quality maida ( Verified By BINOKIO)'),
(59, '4b9c363674ed35682118259744398d1e', '$2y$10$BFTPGKzru29Jn7snr7VluO3FVsJq69MYBio2DOk2GJDIRXwW4wvIi', 'Sattu (500gm) ', '273351images (3)-01.jpeg', 'Grocery', '60', 'No Warenty', '100', 'Sattu', 'Good quality sattu( Verified By BINOKIO)'),
(60, '4b9c363674ed35682118259744398d1e', '$2y$10$Tp2I6hQlGteXeE8nHVyE4umIdxaLR5/h6sMJWdHigrWUFc3iFMrvO', 'Jira (Cumin Seeds) (500gm) ', '202122cumin-seed-jira-100-gm-01.jpeg', 'Grocery', '105', 'No Warenty', '100', 'Sattu', 'Good quality Jeera ( Verified By BINOKIO)'),
(61, '4b9c363674ed35682118259744398d1e', '$2y$10$ZJ2epI7asQBz2A7LDqJgS.5jMPGWVeAKDrkByRGtG8WbZhdLHz93a', 'Panch Foran  (500gm) ', '775316H540-panch-phoron-seed-spice-blend-seasoning-main-01.jpeg', 'Grocery', '85', 'No Warenty', '100', 'Panchforan', 'Good quality panch foran ( Verified By BINOKIO)'),
(62, '4b9c363674ed35682118259744398d1e', '$2y$10$pvK3Og0N7y2oSiLYscEg9uxnmN2j3BZj1nAQEHierlRo3F.dPqxIG', 'Badi Elaichi (Black Cardamoms) (250gm) ', '921073images (6)-01.jpeg', 'Grocery', '120', 'No Warenty', '100', 'Badi elaichi', 'Good quality Badi Elaichi ( Verified By BINOKIO)'),
(63, '4b9c363674ed35682118259744398d1e', '$2y$10$YnFJg.zLtP.sV2cECwMOkuTUl3S1iEko6zoKtGNJYml2e5up98SUy', 'Mangraila (250gm) ', '803147images (12)-01.jpeg', 'Grocery', '50', 'No Warenty', '100', 'Mangraila', 'Good quality mangraila( Verified By BINOKIO)'),
(64, '4b9c363674ed35682118259744398d1e', '$2y$10$IJWxFYN0XnR6Anom27zAeeKOYVihBhxF2pJLj7GrpG/ZHrqK4/cMG', 'Choti Elaichi (Cardamom) (250gm)', '179574images (5)-01.jpeg', 'Grocery', '60', 'No Warenty', '100', 'Choti elaichi', 'Good quality Choti Elaichi ( Verified By BINOKIO)'),
(65, '4b9c363674ed35682118259744398d1e', '$2y$10$TZLsYTaCwcf/zoc3yjtnSeB2RTNTan2Qpn3yhRkVXzAzdZSE63CiW', 'Ajwain (Trachyspermum ammi) (250gm)', '914689images (4)-01.jpeg', 'Grocery', '50', 'No Warenty', '100', 'Ajwain', 'Good quality Ajwain ( Verified By BINOKIO)'),
(66, '4b9c363674ed35682118259744398d1e', '$2y$10$Nrx00NfUYe.f.nVb1C3P2.BI3tV.7nI/0eCi0WijBs5hNXuzZH5sy', 'Everest Hing (25gm)', '447979images (11).jpeg', 'Grocery', '40', 'No Warenty', '30', 'Everest hing', '--'),
(67, '4b9c363674ed35682118259744398d1e', '$2y$10$999cWq7OnhCSNAnNePRnuuMnPmSk3kC9FM8FLjmTJGye9KJyOnfoy', 'Tata Tea Premium (250gm)', '305265images (10).jpeg', 'Grocery', '82', 'No Warenty', '30', 'Tata Tea Premium', '--'),
(68, '4b9c363674ed35682118259744398d1e', '$2y$10$cp80aOF/l4gxupknpMY9QuxZCM/CGSAmwCWHorJPhS9xXPxYbeYwi', 'Tata Tea Gold (250gm)', '275824images (9).jpeg', 'Grocery', '108', 'No Warenty', '30', 'Tata Tea Premium', '--'),
(69, '4b9c363674ed35682118259744398d1e', '$2y$10$NIZgYsYd4551feB/OJcAnOMvtFMJ5pH7FYyNpTVWty8lch6/jgh0e', 'Sunsilk Black Shampoo (200ml)', '802892images (8).jpeg', 'Grocery', '78', 'No Warenty', '30', 'Sunsilk', '--'),
(70, '4b9c363674ed35682118259744398d1e', '$2y$10$rRkeCVwd2znsupBVS3cBSOSUJ0FGJEUb5FjD1lvi4VRRhRhjOnTkK', 'Head &amp; shoulders Shampoo (200ml)', '438284images (7).jpeg', 'Grocery', '135', 'No Warenty', '30', 'Head and shoulders', '--'),
(71, '4b9c363674ed35682118259744398d1e', '$2y$10$QL4fnJXb7V7XCqn.SRKlHuxrNRIagchYexkRQ.nzdNKxXt218kvnq', 'Dettol Soap , 125g (PACK OF 4)', '35424661tIX-YbEvL._SY355_.jpg', 'Grocery', '145', 'No Warenty', '50', 'soap,dettol', 'Dettol original soap with classic Dettol fragrance provides Dettol\'s trusted germ protection from a wide range of unseen germs. It cleanses and protects your skin keeping you healthy every day. ... Reassuringly, Dettol protects from a wide range of illness causing germs and bacteria to help you stay healthy.'),
(72, '4b9c363674ed35682118259744398d1e', '$2y$10$cHAt1RjOO24k0QFLtSdCjuUEYpVJwN0O4Lqo7.PpohZw/3RlcFIoO', 'Park Avenue Beer Shampoo Shiny &amp; Bounce Variant ', '99535561tIX-YbEvL._SY355_.jpg', 'Grocery', '145', 'No Warenty', '50', 'soap,dettol', 'Dettol original soap with classic Dettol fragrance provides Dettol\'s trusted germ protection from a wide range of unseen germs. It cleanses and protects your skin keeping you healthy every day. ... Reassuringly, Dettol protects from a wide range of illness causing germs and bacteria to help you stay healthy.'),
(73, '4b9c363674ed35682118259744398d1e', '$2y$10$t1NaZNG0Z/BG/DghU9TxleTtzr/0fiEDXQ6qu5NcVRe8zUbZx5.5m', 'Park Avenue Beer Shampoo Shiny &amp; Bounce Variant (180 ml)', '989223park-avenue-beer-shampoo-2c-normal-2c-500x500.png', 'Grocery', '160', 'No Warenty', '15', 'shampoo,beer,beer shampoo,soap', 'Get gorgeously lustrous and nourished hair with this Park Avenue Beer Shampoo. It will gently cleanse your hair, leaving your hair soft and smooth throughout the day. Six Times Smoother Hair. The proteins and natural bio-actives of barley and hops will make your hair six times smoother and healthier.'),
(74, '4b9c363674ed35682118259744398d1e', '$2y$10$H6JExa1PJywmmfKCgLPvzuQGDO22y5dTcJZZAxX216MivaVb5DbBS', 'Lux Soft Touch Soap (Pack Of 3)', '549561Lux-Soap-Bar-Velvet-Touch-Jasmine-Almond-Oil-550x629.jpg', 'Grocery', '90', 'No Warenty', '15', 'shampoo,beer,beer shampoo,soap', 'LUX is a global brand developed by Unilever. The range of products includes beauty soaps, shower gels, bath additives, hair shampoos and conditioners. Lux started as &quot;Sunlight Flakes&quot; laundry soap in 1899.'),
(75, '4b9c363674ed35682118259744398d1e', '$2y$10$DnBPsDSy0h.MnxPVClADIelH7dNW4eCwKJWbN2F6oeKb5nZvgSvay', 'Dove Bathing Bar Soap - 100g (5 pack)', '2623197515222_2.jpg', 'Grocery', '186', 'No Warenty', '15', ' shampoo,soap,dove', 'Dove is a personal care brand owned by Unilever originating in the United Kingdom. Dove products are manufactured in Argentina, Australia, Brazil, Canada, China, Egypt, Germany, India, Indonesia, etc.'),
(76, '4b9c363674ed35682118259744398d1e', '$2y$10$VITULVIIJd49bVxRWfHquu0p4mW5.8G4tgmVytXml.n4c91L4lRuC', 'Lifebouy total 10 - 125g (pack of 4)', '78425images (1).jpeg', 'Grocery', '182', 'No Warenty', '15', 'Lifebouy,soap,shampoo,lifeboy', 'Lifebuoy is a brand of soap marketed by Unilever. Lifebuoy was originally, and for much of its history, a carbolic soap containing phenol. The soaps manufactured today under the Lifebuoy brand do not contain phenol. Currently there are many variants of Lifebuoy.'),
(77, '4b9c363674ed35682118259744398d1e', '$2y$10$.iWt1Y4NHvpziC8p791J0OVfTlfxg.SGBgLHPRyGH964903LYZ8xC', 'Lifebouy total 10 - 125g (pack of 4)', '670674images (1).jpeg', 'Grocery', '182', 'No Warenty', '15', 'Lifebouy,soap,shampoo,lifeboy', 'Lifebuoy is a brand of soap marketed by Unilever. Lifebuoy was originally, and for much of its history, a carbolic soap containing phenol. The soaps manufactured today under the Lifebuoy brand do not contain phenol. Currently there are many variants of Lifebuoy.');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `Subject` text NOT NULL,
  `QuestionBody` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `ID` int(11) NOT NULL,
  `OrderID` varchar(200) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `Problem` text NOT NULL,
  `PaytmName` varchar(100) NOT NULL,
  `PaytmNo` varchar(100) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `BankAccNo` varchar(200) NOT NULL,
  `IFSCCode` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller-details`
--

CREATE TABLE `seller-details` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SellerImage` text NOT NULL,
  `ShopName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `ShopAddress` text NOT NULL,
  `HomeAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller-details`
--

INSERT INTO `seller-details` (`ID`, `Uniqid`, `Name`, `SellerImage`, `ShopName`, `Email`, `Phone`, `ShopAddress`, `HomeAddress`) VALUES
(1, '4b9c363674ed35682118259744398d1e', 'BINOKIO', '../Uploads/138527pp.png', 'Original', 'binokioceo@gmail.com', '7275351999', 'WEB', 'tridev nagar colony, chandpur , varanasi\r\n'),
(2, '8036e415a57bc15b29b560fafd0eb60f', 'Ankit Jaiswal', '../Uploads/388151default.png', 'Welcome Collection', 'ankit20051997@gmail.com', '8601263450', 'Manduwadih Road, Near Manduwadih  Police Station, Varanasi', 'Manduwadih Road, Near Manduwadih  Police Station, Varanasi'),
(4, '80c12f837ef9c0066aabfb320dcd0477', 'Mukesh chaurasiya', '../Uploads/654701img_20191220_190513.jpg', 'Manju shree fashion', 'mukeshvnsindia3@gmail.com', '9807008030', 'Manduwadih,near police station,upward 2 shop katra.', 'Lahurabir'),
(5, '28f5acf64529c6aa27b076500d57a9d1', 'Prashant Chaudhary ', '../Uploads/851086fb_img_1577532688979.jpg', 'itsprashantchaudhary', 'prashantvns7799@gmail.com', '6306554015', 'Varanasi ', '221106 Varanasi ');

-- --------------------------------------------------------

--
-- Table structure for table `selling-details`
--

CREATE TABLE `selling-details` (
  `ID` int(11) NOT NULL,
  `Uniqid` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Earning` varchar(200) NOT NULL,
  `AadharNo` varchar(200) NOT NULL,
  `AadharName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selling-details`
--

INSERT INTO `selling-details` (`ID`, `Uniqid`, `Category`, `Earning`, `AadharNo`, `AadharName`) VALUES
(1, '4b9c363674ed35682118259744398d1e', 'Clothing', '--', '--', 'BINOKIO'),
(2, '8036e415a57bc15b29b560fafd0eb60f', 'Clothing', '500000', '833296149433', 'Ankit Jaiswal'),
(4, '80c12f837ef9c0066aabfb320dcd0477', 'Clothing', '--', '297945582095', 'Mukesh Kumar chaurasiya'),
(5, '28f5acf64529c6aa27b076500d57a9d1', 'Kids', '--', '331154449501', 'Prashant Patel');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `ID` int(11) NOT NULL,
  `ProductID` varchar(200) NOT NULL,
  `Tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `Tax` varchar(100) NOT NULL,
  `DeliveryCharge` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`Tax`, `DeliveryCharge`) VALUES
('0', '20'),
('0', '20');

-- --------------------------------------------------------

--
-- Table structure for table `user-details`
--

CREATE TABLE `user-details` (
  `id` int(11) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `LandMark` text NOT NULL,
  `Pincode` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-details`
--

INSERT INTO `user-details` (`id`, `Uniqid`, `Name`, `Email`, `PhoneNumber`, `Address`, `LandMark`, `Pincode`, `Phone`) VALUES
(1, 'cf9941af99d518aa4bcacc25e7de9f8d', 'poras shrivas', 'shrivasporas@gmail.com', '1234567890', '', '', '', ''),
(2, '7e6d675c568335f7a7135a5741483789', 'Utkarsh rai', 'utkarshdude1@gmail.com', '7275351999', '', '', '', ''),
(3, 'af1a4a0612c9cfe50418254d63edc25a', 'Mohit', 'mohitkundwani.mk@gmail.com', '8224884283', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user-login-information`
--

CREATE TABLE `user-login-information` (
  `id` int(11) NOT NULL,
  `Uniqid` varchar(200) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Recovery` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user-login-information`
--

INSERT INTO `user-login-information` (`id`, `Uniqid`, `Username`, `Email`, `Password`, `Recovery`) VALUES
(1, 'cf9941af99d518aa4bcacc25e7de9f8d', 'poras121', 'shrivasporas@gmail.com', '$2y$12$03zOqUJOJIGARWOxbXhF/uln3LnwhjTsCw6jdeR76tPSR8hSP3nCu', ''),
(2, '7e6d675c568335f7a7135a5741483789', 'Utdude', 'utkarshdude1@gmail.com', '$2y$12$c8HeqWrhGVNXu7ZCUJ4kWu3reWGGdilwOoZ/SPfI12dVYE8XEPaYi', ''),
(3, 'af1a4a0612c9cfe50418254d63edc25a', 'Mohit0506', 'mohitkundwani.mk@gmail.com', '$2y$12$Y1ByYvIuebrSFfkFthGFje.z1EU7ruUHRE2lg8StdOt8NO7nZQhfy', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login-information`
--
ALTER TABLE `login-information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `myorders`
--
ALTER TABLE `myorders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment-information`
--
ALTER TABLE `payment-information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seller-details`
--
ALTER TABLE `seller-details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `selling-details`
--
ALTER TABLE `selling-details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user-details`
--
ALTER TABLE `user-details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user-login-information`
--
ALTER TABLE `user-login-information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login-information`
--
ALTER TABLE `login-information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myorders`
--
ALTER TABLE `myorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment-information`
--
ALTER TABLE `payment-information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller-details`
--
ALTER TABLE `seller-details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `selling-details`
--
ALTER TABLE `selling-details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user-details`
--
ALTER TABLE `user-details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user-login-information`
--
ALTER TABLE `user-login-information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
