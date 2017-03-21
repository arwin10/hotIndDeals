-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.11-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table hotinddeals_db.admin_master
CREATE TABLE IF NOT EXISTS `admin_master` (
  `AdminId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.admin_master: ~6 rows (approximately)
/*!40000 ALTER TABLE `admin_master` DISABLE KEYS */;
INSERT INTO `admin_master` (`AdminId`, `UserName`, `Password`) VALUES
	(1, 'admin', 'admin'),
	(2, 'admin3', 'newboys10'),
	(3, 'admin4', 'admin4'),
	(4, 'admin5', 'welcome'),
	(5, 'admin6', 'admin6'),
	(6, 'admin7', 'admin7');
/*!40000 ALTER TABLE `admin_master` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.category_master
CREATE TABLE IF NOT EXISTS `category_master` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(30) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `MainCategoryName` varchar(30) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.category_master: ~8 rows (approximately)
/*!40000 ALTER TABLE `category_master` DISABLE KEYS */;
INSERT INTO `category_master` (`CategoryId`, `CategoryName`, `Description`, `Image`, `MainCategoryName`) VALUES
	(1, 'Mobiles', 'A mobile phone is a telephone that can make and receive calls over a radio frequency carrier while the user is moving within a telephone service area', 'iphone5s.jpg', 'Electronics'),
	(2, 'Transistor', 'An electronic device that controls the flow of an electric current and is used as an amplifier or switch', 'transistor.jpg', 'Electronics Components'),
	(3, 'Resistor', 'The electrical resistance of an electrical conductor is a measure of the difficulty to pass an electric current through that conductor', 'resistor.jpg', 'Electronics Components'),
	(4, 'Capacitor', 'A capacitor (originally known as a condenser) is a passive two-terminal electrical component used to store electrical energy temporarily in an electric field.', 'Capacitors.jpg', 'Electronics Components'),
	(7, 'Inductor', 'An inductor, also called a coil or reactor, is a passive two-terminal electrical component which resists changes in electric current passing throughout it. ', 'inductors.jpg', 'Electronics Components'),
	(8, 'LED Board', 'LED Board', 'aamirkhan.jpg', 'Display Board'),
	(10, 'Electric Motor', 'An electric motor is an electrical machine that converts electrical energy into mechanical energy.', 'electric motor2.jpg', 'Electric Motor'),
	(11, 'Mosfet', 'fet', 'abdul.jpg', 'Mosfet');
/*!40000 ALTER TABLE `category_master` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.customer_registration
CREATE TABLE IF NOT EXISTS `customer_registration` (
  `CustomerId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `PinCode` int(10) DEFAULT NULL,
  `City` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BirthDate` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CustomerId`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.customer_registration: ~11 rows (approximately)
/*!40000 ALTER TABLE `customer_registration` DISABLE KEYS */;
INSERT INTO `customer_registration` (`CustomerId`, `CustomerName`, `Address`, `State`, `Country`, `PinCode`, `City`, `Email`, `Mobile`, `Gender`, `BirthDate`, `UserName`, `Password`, `UserType`) VALUES
	(2, 'Arindam', 'Chinappa Layout', NULL, NULL, NULL, 'Ahmedabad', 'arsoftech@gmail.com', 9903503510, 'Male', '1990-09-01', 'arinsark', 'arinsark', 'customer'),
	(3, 'Sampath', 'TCS Pioneer ITPB', NULL, NULL, NULL, 'Bangalore', 'guntkuma@oxsys.com', 9903523412, 'Male', '1994-03-02', 'guntkuma', 'welcome', 'customer'),
	(4, 'Hanumantha', 'tcs pioneer itpb', NULL, NULL, NULL, 'Bangalore', 'hanumanr@gmail.com', 8884244228, 'Male', '2002-04-02', 'hanumanr', 'welcome', 'admin'),
	(5, 'kishore', 'kr market', NULL, NULL, NULL, 'Bangalore', 'arsoftech1@gmail.com', 9903503510, 'Male', '1989-04-01', 'kcy', 'welcome', 'admin'),
	(7, 'ADSF', 'Address', '1', 'India', 234234, '3f', 'saf', 234235432, 'Male', '2-02-1993', 'saf', 'saf', 'customer'),
	(8, 'fdsgfdhg', 'gdfgfdhfdh', '1', 'India', 7687687, 'gdgfdgd', 'hfdhgfhfdh', 65876879, 'Male', '2-02-1993', 'hfhgfhgf', 'hfgh', 'customer'),
	(9, 'dgfdgfdsg', 'Address', '1', 'India', 868869867, 'fdsgfdg', 'gdsgdsg', 8080808776, 'Male', '2-02-1993', 'gdfsgfdsg', 'dfgdsgfdsg', 'customer'),
	(10, 'Mrits Biswas', 'kundanahalli gate', '1', 'India', 560066, 'Bangalore', 'mrisudbiswas@gmail.com', 9678905611, 'Male', '2-02-1991', 'mrits10', 'mrits1010', 'customer'),
	(11, 'Mrits Biswas', 'marathahalli', '1', 'India', 560087, 'Bangalore', 'mrisudbiswas@gmail.com', 9678905611, 'Male', '1-09-1992', 'mrits30', 'welcome', 'customer'),
	(13, 'AE', 'AE', 'AE', 'AE', 0, 'AE', 'AE', 9999999999, 'AE', 'AE', 'AE Customer8', 'welcome', 'customer'),
	(14, 'Hanu', 'q12324341234567', '1', 'India', 560037, '123456', 'harishdkt2@gmail.com', 1234567890, 'Male', '5-09-1991', 'Hanumantharao S', 'Hanu2016$', 'customer');
/*!40000 ALTER TABLE `customer_registration` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.feedback_master
CREATE TABLE IF NOT EXISTS `feedback_master` (
  `FeedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`FeedbackId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.feedback_master: ~5 rows (approximately)
/*!40000 ALTER TABLE `feedback_master` DISABLE KEYS */;
INSERT INTO `feedback_master` (`FeedbackId`, `CustomerId`, `Feedback`, `Date`) VALUES
	(2, 2, 'test feedback arinsark', '2016-03-31'),
	(3, 2, 'test feedback', '2016-03-31'),
	(4, 2, 'test feedback 1april2016', '2016-04-01'),
	(5, 2, 'arinsark feedback good job', '2016-04-07'),
	(6, 5, 'good site', '2016-04-09');
/*!40000 ALTER TABLE `feedback_master` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.item_master
CREATE TABLE IF NOT EXISTS `item_master` (
  `ItemId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `PrdDescFile` varchar(200) NOT NULL,
  `PostedBy` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Discount` float NOT NULL,
  `Total` float NOT NULL,
  `FeaturedPrd` varchar(20) DEFAULT NULL,
  `LatestPrd` varchar(20) DEFAULT NULL,
  `PromotedPrd` varchar(20) DEFAULT NULL,
  `ItemCondtion` varchar(30) DEFAULT NULL,
  `AvalibiltyStatus` varchar(20) DEFAULT NULL,
  `QuantityAvailable` int(11) DEFAULT NULL,
  `ItemsFullDescription` varchar(3000) DEFAULT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `ModelNo` varchar(30) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `ReleaseTime` time DEFAULT NULL,
  `PrdDimension` varchar(30) DEFAULT NULL,
  `DisplaySize` varchar(30) DEFAULT NULL,
  `PrdFeatures` varchar(3000) DEFAULT NULL,
  `PrdReviews` varchar(3000) DEFAULT NULL,
  `DealDescription` longtext,
  `DealLink` varchar(300) DEFAULT NULL,
  `DealWebsite` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ItemId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.item_master: ~23 rows (approximately)
/*!40000 ALTER TABLE `item_master` DISABLE KEYS */;
INSERT INTO `item_master` (`ItemId`, `CategoryId`, `ItemName`, `Description`, `Size`, `Image`, `PrdDescFile`, `PostedBy`, `Price`, `Discount`, `Total`, `FeaturedPrd`, `LatestPrd`, `PromotedPrd`, `ItemCondtion`, `AvalibiltyStatus`, `QuantityAvailable`, `ItemsFullDescription`, `Brand`, `ModelNo`, `ReleaseDate`, `ReleaseTime`, `PrdDimension`, `DisplaySize`, `PrdFeatures`, `PrdReviews`, `DealDescription`, `DealLink`, `DealWebsite`) VALUES
	(1, 1, 'Iphone 5s', 'Apple Iphone 5s', '32gb', 'iphone5s.jpg', '', 'arwin', 25000, 1000, 24000, 'Y', NULL, NULL, 'New', 'N', 150, 'Best offer from Amazon Cheapest Deal', 'Apple', NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, 'https://paytm.com/shop/p/apple-iphone-se-16-gb-...\r\nhttps://paytm.com/shop/p/apple-iphone-se-16-gb-...\r\nhttps://paytm.com/shop/p/apple-iphone-se-16-gb-...\r\nhttps://paytm.com/shop/p/apple-iphone-se-16-gb-...\r\n\r\nUse promocode – A3K\r\nA3K: Free Movie Ticket* and FLAT Rs 3000 cashback* on shopping order (Max Cashback Rs. 3000). Your unique movie ticket promo code will be sent to you via email. COD not applicable.\r\n\r\nseller – D Daily Need\r\n-——————————————————————————————————\r\n\r\nlast fpd@21488 https://www.desidime.com/forums/hot-deals-onlin...\r\n\r\nsee pc\r\n\r\n21499@ http://www.amazon.in/Apple-iPhone-SE-Gold-16GB/...?\r\n28980@ https://www.flipkart.com/apple-iphone-se-rose-g...?\r\n25999@ http://www.croma.com/apple-iphone-se-rose-gold-...?\r\n28490@ https://www.snapdeal.com/product/iphone-se-16gb...?', 'http://amzn.to/2mGYvpO', '@Amazon'),
	(2, 1, 'Galaxy S7', 'Samsung Galaxy S7', '64gb', 'galaxyS7.jpg', '', 'arwin', 34789, 600, 34189, 'Y', NULL, NULL, NULL, 'Y', 152, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 1, 'Iphone 6S', 'Apple Iphone 6s', '128gb', 'iphone6s.jpg', '', 'arwin', 65007, 450, 64557, 'Y', NULL, NULL, NULL, 'Y', 189, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 3, 'Resistor Network', '5P A102-1K', '1K', 'resistornetwork.jpg', '', 'arwin', 235, 15, 220, NULL, 'Y', NULL, NULL, 'Y', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 3, 'Resistor Network', '5P A103-10k', '10K', 'resistornetwork.jpg', '', 'arwin', 4, 0, 4, NULL, 'Y', NULL, NULL, 'Y', 110, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 2, 'NPN SWITCHING TR', 'BC 547', '1.00', 'transistor1.jpg', '', 'arwin', 1, 0, 1, NULL, 'Y', NULL, NULL, 'Y', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 4, 'test capacitor', 'test capacitor', '11', 'Capacitors.jpg', '', 'arwin', 23, 4, 19, NULL, 'Y', NULL, NULL, 'N', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 4, 'test capacitor 2', 'test capacitor', '12', 'Capacitors2.jpg', '', 'arwin', 12, 8, 4, 'N', '', NULL, NULL, 'N', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 7, 'Inductor high power', 'Inductor high power', '34', 'inductors.jpg', '', 'arwin', 56, 5, 51, '', 'Y', NULL, NULL, 'N', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 8, 'P10', '16x32', '2', 'aamirkhan.jpg', '', 'arwin', 230, 2, 228, '', 'Y', NULL, NULL, 'Y', 1, NULL, NULL, NULL, '2017-03-19', '02:05:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 8, 'P6', 'RGB', '12', 'iphone5s.jpg', '', 'arwin', 1200, 200, 1000, '', 'Y', NULL, NULL, 'Y', 1, NULL, NULL, NULL, '2017-03-19', '02:06:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 1, 'Galaxy S7 v2', 'Samsung Galaxy S7', '64gb', 'galaxyS7.jpg', '', 'arwin', 34789, 600, 34189, NULL, 'Y', NULL, NULL, 'Y', 1, NULL, NULL, NULL, '2017-03-19', '02:06:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 1, 'Galaxy S7 v1', 'Samsung Galaxy S7', '64gb', 'galaxyS7.jpg', '', 'arwin', 34789, 600, 34189, NULL, '', 'Y', NULL, 'N', 1, NULL, NULL, NULL, '2017-03-19', '02:06:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 1, 'Iphone 6S', 'Apple Iphone 6S', '64gb', 'iphone6s.jpg', '', 'arwin', 34789, 600, 34189, '', '', 'Y', NULL, 'Y', 255, '14 Megapixels. 18.0 x Optical Zoom. 3.0-inch LCD Screen. Full HD photos and 1280 x 720p HD movie capture. ISO sensitivity ISO6400 at reduced resolution. Tracking Auto Focus. Motion Panorama Mode. Face Detection technology with Blink detection and Smile and shoot mode. 4 x AA batteries not included. WxDxH 110.2 ×81.4x73.4mm. Weight 0.341kg (excluding battery and memory card). Weight 0.437kg (including battery and memory card). ', 'Apple', '6S', '2017-03-19', '02:06:10', '5.5"X2.5"X3.5"', '5.5"', 'iSight Camera, 1.22 µ Pixels, Live Photos, Auto Focus, Focus Pixels, True Tone Flash, Panorama (Upto 63 MP), Auto HDR for Photos, Exposure Control, Burst Mode, Timer Mode, f/2.2 Aperture, Five-element Lens, Hybrid IR Filter, Backside Illumination Sensor, Sapphire Crystal Lens Cover,', 'the best smartfone in the market and got at best price also on flipkart.. !!\r\npeople using 4 or 5 just go for it.. camera is best in its class.. !! its Apple so rest u can understand.. !!', NULL, NULL, NULL),
	(18, 10, 'DC Motor', 'Electrical motors are everywhere around us. Almost all the electro-mechanical movements we see around us are caused either by an A.C. or a DC motor. Here we will be exploring this kind of motors. This is a device that converts DC electrical energy to a mechanical energy.', '15ohm', 'electric motor2.jpg', '', 'arwin', 121, 10, 111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-19', '02:06:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 10, 'AC Electric motor', 'An induction or asynchronous motor is an AC electric motor in which the electric current in the rotor needed to produce torque is obtained by electromagnetic induction from the magnetic field of the stator winding.', '2000RPM', 'electric motorac.jpg', '', 'arwin', 3450, 256, 3194, 'N', 'Y', 'N', NULL, 'Y', 35, 'An induction or asynchronous motor is an AC electric motor in which the electric current in the rotor needed to produce torque is obtained by electromagnetic induction from the magnetic field of the stator winding.', 'Bosch', 'T-140', '2017-03-19', '02:06:10', '15 X 34 X 45 inch', 'NA', 'An induction or asynchronous motor is an AC electric motor in which the electric current in the rotor needed to produce torque is obtained by electromagnetic induction from the magnetic field of the stator winding.', 'An induction or asynchronous motor is an AC electric motor in which the electric current in the rotor needed to produce torque is obtained by electromagnetic induction from the magnetic field of the stator winding.', NULL, NULL, NULL),
	(20, 1, 'Microsoft lumia 640 xl', 'Microsoft lumia 640 xl', '8GB', 'lumia640xl.jpg', '', 'arwin', 12999, 1500, 11499, 'N', 'Y', 'N', NULL, 'Y', 11, 'Always be ready to capture your next great idea. From polishing off a presentation to perfecting your pictures, balancing work and play is easy when everything you need is on your phone.', 'Microsoft', '640XL', '2017-03-19', '02:06:10', '5.5X0.3X5.7 inch', '', '13 MP Primary Camera\r\nWi-Fi Enabled\r\n1.2 GHz Qualcomm Snapdragon 400 Quad Core Processor\r\nExpandable Storage Capacity of 128 GB\r\nWindows Phone 8.1 OS\r\nFM Radio\r\n5 MP Secondary Camera\r\n5.7 inch IPS LCD Capacitive Touchscreen\r\nDual Standby Sim (GSM + WCDMA)', 'Awesome phone..\r\nGuys I have never experienced this type of phone before in this price range . \r\n\r\nJust three words for LUMIA 640XL \r\n\r\n\r\nGO FOR IT ..', NULL, NULL, NULL),
	(26, 1, 'Iphone 4s', 'Apple iphone 4s(white, 16 GB)', '16GB', 'electricmotor.JPG', 'dilip_biswasTicketapr19.pdf', 'arwin', 15800, 788, 15012, 'N', 'Y', 'N', NULL, 'Y', 36, 'Key Features of Apple iphone 4s\r\nPrimary Camera: 8 megapixel\r\nSim Type: Single Sim', 'Apple', '4s', '2017-03-19', '02:06:10', '320*640 Pixels', '3.7 inch', 'OS	iOS vios5\r\nProcessor	1 GHz, Dual Core\r\n\r\nBATTERY\r\nType	1410 mAh', 'Samir:Very Good Product\r\nShipped on time, Product is very good as warranty is only three months apart from this super and genuine product.', NULL, NULL, NULL),
	(30, 1, 'Iphone 10s', 'test', '16GB', 'motg3.jpeg', 'apr16_HeatWave_Infographic.pdf', 'arwin', 18000, 345, 17655, 'N', 'Y', 'N', NULL, 'Y', 14, 'test', 'Apple', '4s', '2017-03-19', '02:06:10', '320*640 Pixels', '3.7 inch', 'test', 'test', NULL, NULL, NULL),
	(31, 1, 'Iphone 11s', 'test', '4gb', 'Philips_MASTER_LED.jpg', '_BESCOM23feb2016BillDesk Payment Gateway __.pdf', 'arwin', 14089, 234, 13855, 'N', 'Y', 'N', NULL, 'Y', 34, 'test', 'Apple', '4s', '2017-03-19', '02:06:10', '320*640 Pixels', '3.7 inch', 'test', 'test', NULL, NULL, NULL),
	(32, 8, 'test led boardjskjsfhjshdfjhsjkhfskjhdfhskjfhsjhfkjhsjfhsdkjhfhsdjfhdskjhfjkhdskjfhdskjhfhdsjfhdskjf', 'test hdjshfjhsdkjfhsjhdfj', 'jdshfshfjshkjfsjfhsj', 'abdul.jpg', 'abdul.jpg', 'arwin', 3456, 123, 3333, 'N', 'Y', 'N', NULL, 'Y', 500, 'test description hhghghjghjhjhjyhjghjghjhghhjhjghjghjhjghghjhjhjhjhjhjhjhjhjghjhhghjghjghjhghjghjhjhjhhghjhjhghjghjghjghjghjghjhjhjghjghjghgh', 'model accountjlkjljljljlkjlk', '4s', '2017-03-19', '02:06:10', 'ljljlklkjlkjl', 'gghghhjghjghjgj', 'kghjghghjghjghjhjghjghjghjghghghghjghjghghjhjhhghjghjhhjhhhhjhjghhh', 'bfbdbhjdgsfgkjshkskhgskjdhgsdkjhsjhgshkjhshgjshfdkjghsfdkjhgkjhfdskjghfdhkjf', NULL, NULL, NULL),
	(33, 3, 'test resistor', 'bajdjahjdahjd', 'slfdsljflkjsj', 'abdul.jpg', 'abdul.jpg', 'arwin', 400, 100, 300, 'N', 'Y', 'N', NULL, 'Y', 100, 'snfjnsjfnskjf', 'sdjlkfsjflk', 'sdnfjknskjf', '2017-03-19', '02:06:10', 'ldsjflkjslkdfjlks', 'sjflsjfslkfdlk', 'sknflksfdnlkndslkfn', 'fknsnfksf', NULL, NULL, NULL),
	(34, 3, 'gfdgfdh', 'hfdhgf', 'hgdhdhg', 'abdul.jpg', 'abdul.jpg', 'arwin', 15800, 123, -122, 'N', 'Y', 'N', NULL, 'Y', 123, 'fhfghgfh', 'hfghgfh', 'hfghgfh', '2017-03-19', '02:06:10', 'fghfgh', 'gfhfghfh', 'fhgfh', 'hfhfgh', NULL, NULL, NULL);
/*!40000 ALTER TABLE `item_master` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.offer_master
CREATE TABLE IF NOT EXISTS `offer_master` (
  `OfferId` int(11) NOT NULL AUTO_INCREMENT,
  `Offer` varchar(50) NOT NULL,
  `Detail` varchar(200) NOT NULL,
  `Valid` date NOT NULL,
  PRIMARY KEY (`OfferId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.offer_master: ~4 rows (approximately)
/*!40000 ALTER TABLE `offer_master` DISABLE KEYS */;
INSERT INTO `offer_master` (`OfferId`, `Offer`, `Detail`, `Valid`) VALUES
	(3, 'test offer', 'test offer details', '2017-03-30'),
	(4, 'test offer2', 'test offer', '2016-04-29'),
	(5, 'Buy one get one free', 'buy one get one free', '2016-04-30'),
	(6, 'test offer 25thapril2016', 'very good 50% off on all products', '2016-04-30');
/*!40000 ALTER TABLE `offer_master` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.shopping_cart
CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `ItemId` int(25) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Discount` float DEFAULT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  `OrderDate` date NOT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.shopping_cart: ~2 rows (approximately)
/*!40000 ALTER TABLE `shopping_cart` DISABLE KEYS */;
INSERT INTO `shopping_cart` (`CartId`, `CustomerId`, `ItemName`, `ItemId`, `Quantity`, `Discount`, `Price`, `Total`, `OrderDate`) VALUES
	(1, 2, 'Galaxy S7 v1', 16, 1, 600, 34789, 34189, '2016-05-12'),
	(2, 2, 'NPN SWITCHING TR', 6, 1, 0, 1, 1, '2016-05-12');
/*!40000 ALTER TABLE `shopping_cart` ENABLE KEYS */;


-- Dumping structure for table hotinddeals_db.shopping_cart_final
CREATE TABLE IF NOT EXISTS `shopping_cart_final` (
  `CartId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `ItemId` int(11) DEFAULT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  `OrderDate` date NOT NULL,
  `RecieverName` varchar(40) DEFAULT NULL,
  `ShippingAddress` varchar(150) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `Mobilenumber` varchar(20) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Pincode` varchar(10) DEFAULT NULL,
  `PaymentMode` varchar(20) DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL,
  `OrderId` varchar(50) DEFAULT NULL,
  `OrderTotal` float DEFAULT NULL,
  PRIMARY KEY (`CartId`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- Dumping data for table hotinddeals_db.shopping_cart_final: ~68 rows (approximately)
/*!40000 ALTER TABLE `shopping_cart_final` DISABLE KEYS */;
INSERT INTO `shopping_cart_final` (`CartId`, `CustomerId`, `ItemId`, `ItemName`, `Quantity`, `Price`, `Total`, `OrderDate`, `RecieverName`, `ShippingAddress`, `City`, `EmailId`, `Mobilenumber`, `Gender`, `Pincode`, `PaymentMode`, `PaymentStatus`, `OrderId`, `OrderTotal`) VALUES
	(1, 1, NULL, 'Denim Jeans', 2, 1100, 2200, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 1, NULL, 'Sport T-Shirts', 1, 500, 500, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 1, NULL, 'Cotton Shirts', 3, 650, 1950, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 1, NULL, 'Cotton Shirts', 4, 650, 2600, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 1, NULL, 'Denim Jeans', 1, 1100, 1100, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 1, NULL, 'Cotton Shirts', 1, 650, 650, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 1, NULL, 'Denim Jeans', 1, 1100, 1100, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 1, NULL, 'Cotton Shirts', 1, 650, 650, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 2, NULL, 'Cotton Shirts', 1, 650, 650, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 2, NULL, 'Iphone 5s', 2, 24000, 48000, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 2, NULL, 'Galaxy S7', 1, 34189, 34189, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 2, NULL, '"Arindam"', 2, 200, 200, '2016-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 2, NULL, 'Arindam', 2, 200, 200, '2016-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 2, NULL, 'Arindam', 2, 200, 200, '2016-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 2, NULL, 'Iphone 5s', 1, 24000, 24000, '2016-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 2, NULL, 'NPN SWITCHING TR', 1, 1, 1, '2016-04-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 2, NULL, 'NPN SWITCHING TR', 1, 1, 1, '2016-04-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 2, NULL, 'test capacitor', 1, 19, 19, '2016-04-06', 'Arindam', 'test', 'Banglore', 'arsoftech@gmail.com', '8884244228', 'Male', '560087', NULL, NULL, NULL, NULL),
	(22, 2, NULL, 'test capacitor', 1, 19, 19, '2016-04-06', 'Mritunjoy', 'chinappa layout', 'Bangalore', NULL, '8884244228', 'Male', '560087', NULL, NULL, NULL, NULL),
	(23, 2, NULL, 'test capacitor 2', 1, 4, 4, '2016-04-06', 'Mritunjoy', 'varthur police station', 'Bangalore', 'mrisudbiswas@gmail.com', '9535089760', '', '560066', NULL, NULL, NULL, NULL),
	(24, 2, NULL, 'test product', 1, 1100, 1100, '2016-04-06', 'sampath', 'cosmos kundanahalli', 'Bangalore', 'arinsark@gmail.com', '9784589014', 'Male', '560089', NULL, NULL, NULL, NULL),
	(25, 2, NULL, 'Resistor Network', 1, 4, 4, '2016-04-06', 'Mrits', 'kormangala', 'Bangalore', 'arinsark@gmail.com', '9535089760', 'Male', '560087', NULL, NULL, NULL, NULL),
	(26, 2, NULL, 'Galaxy S7', 1, 34189, 34189, '2016-04-06', 'kunal', 'jhanda bazar katni', 'Bangalore', 'arinsark@gmail.com', '8884567890', 'Male', '483501', NULL, NULL, NULL, NULL),
	(27, 2, NULL, 'test capacitor', 1, 19, 19, '2016-04-07', 'Hanumantha', 'HSR Layout', 'Bangalore', 'hanumanr@gmail.com', '9904567890', 'Male', '560088', NULL, NULL, NULL, NULL),
	(28, 2, NULL, 'Iphone 6S', 1, 64557, 64557, '2016-04-07', 'Arindam', 'itpb whitefiled', 'Bangalore', 'arsoftech@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(29, 2, NULL, 'test capacitor 2', 1, 4, 4, '2016-04-07', 'testuser', 'test address', 'Bangalore', 'arsoftech@gmail.com', '9903503510', 'Male', '560066', 'Online', NULL, NULL, NULL),
	(30, 2, NULL, 'test capacitor 2', 4, 4, 16, '2016-04-07', 'Testuser', 'test address', 'Bangalore', 'arsoftech@gmail.com', '9903503510', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(31, 5, NULL, 'Iphone 5s', 1, 24000, 24000, '2016-04-09', 'kishore', 'k r market', 'Bangalore', 'arinsark@gmail.com', '9903503510', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(32, 2, NULL, 'Galaxy S7', 1, 34189, 34189, '2016-04-19', 'Hanumantha', 'marathahalli', 'ban', 'hanumanr@gmail.com', '8842442286', 'Male', '560035', 'COD', NULL, NULL, NULL),
	(33, 2, NULL, 'Iphone 6S', 1, 34189, 34189, '2016-04-19', 'Hanumantha', 'marathahalli', 'ban', 'hanumanr@gmail.com', '8842442286', 'Male', '560035', 'COD', NULL, NULL, NULL),
	(34, 2, NULL, 'Galaxy S7', 1, 34189, 34189, '2016-04-20', 'Mrits Biswas', 'oxysys tech', 'Bangalore', 'mrits@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(35, 2, NULL, 'Iphone 6S', 1, 34189, 34189, '2016-04-20', 'Mrits Biswas', 'oxsys tech', 'bangalore', 'mrits@gmail.com', '8884244228', 'Male', '567890', 'COD', NULL, NULL, NULL),
	(36, 2, NULL, 'P6', 1, 1000, 1000, '2016-04-20', 'shankar roy', 'cosmos mall', 'Bangalore', 'mrits@gmail.com', '9903503510', 'Male', '560035', 'COD', NULL, NULL, NULL),
	(37, 3, NULL, 'Galaxy S7', 1, 34189, 34189, '2016-04-20', 'Sampath', 'near cosmos mall', 'Bangalore', 'test@mail.com', '9903503410', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(38, 3, NULL, 'test capacitor 2', 1, 4, 4, '2016-04-20', 'Sampath', 'near cosmos mall', 'Hydrebad', 'test@mail.com', '9903503410', 'Male', '560087', 'COD', NULL, NULL, NULL),
	(39, 2, NULL, 'P6', 1, 1000, 1000, '2016-04-21', 'test person', 'Test address', 'bangalore', 'arinsark@test.com', '5600890761', 'Male', '560066', 'COD', NULL, NULL, NULL),
	(40, 2, NULL, 'Galaxy S7 v1', 1, 34189, 34189, '2016-04-21', 'kukur', 'Usa kolkata65 varthur', 'Kerala', 'misdirected@gmal.com', '1095666356', 'Female', '888888', 'COD', NULL, NULL, NULL),
	(41, 2, 3, 'Iphone 6S', 1, 64557, 64557, '2016-04-25', 'Apurba Sarkar', 'katni mp jhanda ', 'Bangalore', 'apurba@cbi.com', '8884244228', 'Male', '560066', 'COD', NULL, NULL, NULL),
	(48, 2, 16, 'Galaxy S7 v1', 1, 34189, 34189, '2016-04-25', 'Rahul Kumar', 'test varthur whitefield', 'Bangalore', 'arinsark@qublu.com', '8884244228', 'Male', '560066', 'COD', NULL, NULL, NULL),
	(49, 2, 5, 'Resistor Network', 1, 4, 4, '2016-04-25', 'Rahul Kumar', 'vathur ITPB whitefiled', 'Bangalore', 'rahul@ibm.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160425132214528', NULL),
	(50, 2, 8, 'test capacitor', 1, 19, 19, '2016-04-25', 'Rahul Kumar', 'vathur ITPB whitefiled', 'Bangalore', 'rahul@ibm.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160425132214528', NULL),
	(51, 2, 19, 'AC Electric motor', 6, 3194, 19164, '2016-04-28', 'Subir Das', 'Usha Enterprise', 'kolkata', 'subir@gmail.com', '9535089760', 'Male', '700001', 'COD', NULL, 'ODR20160428102915967', NULL),
	(52, 2, 18, 'DC Motor', 1, 111, 111, '2016-04-28', 'Rahul Kumar', '3 No Mahadanga colony', 'Chandannagar', 'rahul@ibm.com', '9535089760', 'Male', '712136', 'COD', NULL, 'ODR20160428103534825', NULL),
	(53, 2, 9, 'test capacitor 2', 1, 4, 4, '2016-04-28', 'Rahul Kumar', '3 No Mahadanga colony', 'Chandannagar', 'rahul@ibm.com', '9535089760', 'Male', '712136', 'COD', NULL, 'ODR20160428103534825', NULL),
	(55, 2, 4, 'Resistor Network', 1, 220, 220, '2016-04-28', '...............', '..........', '........', '...@com', '0000000000', 'Male', '000000', 'COD', NULL, 'ODR20160428110659627', NULL),
	(56, 14, 16, 'Galaxy S7 v1', 1, 34189, 34189, '2016-04-28', '1234567890', '1efdfhghkhjlj', 'sfdxgfgjh', 'harishdkt2@gmail.com', '1234567889', 'Male', '244578', 'COD', NULL, 'ODR20160428112321506', NULL),
	(57, 14, 1, 'Iphone 5s', 1, 24000, 24000, '2016-04-28', 'hanu', 'wqrert2254565', 'w122432543657687', 'harishkdkt2@gmail.com', '0000000000', 'Male', '000000', 'COD', NULL, 'ODR20160428112450163', NULL),
	(58, 14, 1, 'Iphone 5s', 1, 24000, 24000, '2016-04-28', 'hanum', '123445657687980980-9-09', 'hgkjhgkjhkhjk', 'harishdkt2@gmail.com', '1020203030', 'Male', '000000', 'COD', NULL, 'ODR20160428123407306', NULL),
	(59, 2, 11, 'Inductor high power', 1, 51, 51, '2016-04-28', 'Arindam Sarkar', 'Varthur police station', 'Bangalore', 'test@mail.com', '8884244228', 'Female', '560087', 'COD', NULL, 'ODR20160428130909807', NULL),
	(60, 2, 13, 'P6', 1, 1000, 1000, '2016-04-28', 'Arindam Sarkar', 'Varthur police station', 'Bangalore', 'test@mail.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160428163507578', NULL),
	(61, 2, 11, 'Inductor high power', 1, 51, 51, '2016-04-28', 'Nonokh', 'USA, Chinnappa layout...............................................................................', 'Kokata', 'GUIII@gmail.com', '9999999999', 'Female', '560087', 'COD', NULL, 'ODR20160428194103453', NULL),
	(62, 2, 6, 'NPN SWITCHING TR', 1, 1, 1, '2016-04-30', 'Debanjan', 'Varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160430205046651', NULL),
	(63, 2, 4, 'Resistor Network', 1, 220, 220, '2016-04-30', 'Mrisud', 'Varthur police station', 'Bangalore', 'test@gmail.com', '9903503510', 'Male', '560087', 'COD', NULL, 'ODR20160430210329721', NULL),
	(64, 2, 9, 'test capacitor 2', 1, 4, 4, '2016-04-30', 'Mrisud', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160430214508293', NULL),
	(65, 2, 5, 'Resistor Network', 1, 4, 4, '2016-04-30', 'Mrisud', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR2016043022034771', NULL),
	(66, 2, 5, 'Resistor Network', 1, 4, 4, '2016-04-30', 'Mrisud', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160430220612295', NULL),
	(67, 2, 5, 'Resistor Network', 1, 4, 4, '2016-04-30', 'Arindam Sarkar', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160430221247686', NULL),
	(68, 2, 11, 'Inductor high power', 1, 51, 51, '2016-04-30', 'Rahul Bose', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160430221503930', NULL),
	(69, 10, 8, 'test capacitor', 1, 19, 19, '2016-04-30', 'Mrisud', 'varthur police station', 'Bangalore', 'arinsark@test.com', '9903503510', 'Male', '560066', 'COD', NULL, 'ODR20160430222348524', NULL),
	(70, 10, 1, 'Iphone 5s', 1, 24000, 24000, '2016-04-30', 'Mritunjoy Biswas', 'varthur police sation', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160430222920748', NULL),
	(71, 10, 19, 'AC Electric motor', 1, 3194, 3194, '2016-04-30', 'Mritunjoy Biswas', 'varthur police station', 'Bangalore', 'test@gmail.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160430223727125', NULL),
	(72, 2, 20, 'Microsoft lumia 640 xl', 2, 25998, 22998, '2016-05-01', 'Arindam Sarkar', 'varthur police station', 'Bangalore', 'arinsark@test.com', '9903503510', 'Male', '560087', 'COD', NULL, 'ODR20160501222135534', 23401),
	(73, 2, 11, 'Inductor high power', 3, 168, 153, '2016-05-01', 'Arindam Sarkar', 'varthur police station', 'Bangalore', 'arinsark@test.com', '9903503510', 'Male', '560087', 'COD', NULL, 'ODR20160501222135534', 23401),
	(74, 4, 20, 'Microsoft lumia 640 xl', 1, 12999, 11499, '2016-05-02', 'Rahul Bose', 'Kr Market Quasar Enterprise', 'Bellagum', 'test@gmail.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160502202438364', 12433),
	(75, 4, 12, 'P10', 3, 690, 684, '2016-05-02', 'Rahul Bose', 'Kr Market Quasar Enterprise', 'Bellagum', 'test@gmail.com', '8884244228', 'Male', '560066', 'COD', NULL, 'ODR20160502202438364', 12433),
	(76, 2, 11, 'Inductor high power', 1, 56, 51, '2016-05-03', 'Guntkuma samapth', 'cosmos mall ', 'Bangalore', 'test@gmail.com', '9535089760', 'Male', '560037', 'COD', NULL, 'ODR20160503111710162', 301),
	(77, 2, 11, 'Inductor high power', 1, 56, 51, '2016-05-07', 'kabir', '#109,S.p.road', 'Bangalore', 'kabir176@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160507130604382', 24301),
	(78, 2, 1, 'Iphone 5s', 1, 25000, 24000, '2016-05-07', 'kabir', '#109,S.p.road', 'Bangalore', 'kabir176@gmail.com', '8884244228', 'Male', '560087', 'COD', NULL, 'ODR20160507130604382', 24301);
/*!40000 ALTER TABLE `shopping_cart_final` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
