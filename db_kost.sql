-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table db_kost.kost: ~50 rows (approximately)
INSERT INTO `kost` (`id`, `nama_kost`, `image`, `alamat`, `deskripsi`, `harga`, `latitude`, `longitude`, `updated_at`, `created_at`) VALUES
	(1, 'Kost Bersama', '82af6e0675a47afb3f7430687e93fd4e', 'Jl Tamanlanrea Lorong 1', 'Kost Kost Bersama, murah, aman dan terjangkau dengan fasilitas lengkap', 281876, '-5.144887416785544', '119.49852462855065', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(2, 'Kost Gembira', '7da699a977311a41df3fb85e421b7815', 'Jl Tamanlanrea Lorong 2', 'Kost Kost Gembira, murah, aman dan terjangkau dengan fasilitas lengkap', 143009, '-5.143805254498666', '119.49928039000415', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(3, 'Kost Harmoni', '219122e697eb9c4cca937be51e39b4b5', 'Jl Tamanlanrea Lorong 3', 'Kost Kost Harmoni, murah, aman dan terjangkau dengan fasilitas lengkap', 295300, '-5.141668125110468', '119.49438629622563', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(4, 'Kost Inspirasi', 'e29fc806f5a896598bdbdf4da95a1b4f', 'Jl Tamanlanrea Lorong 4', 'Kost Kost Inspirasi, murah, aman dan terjangkau dengan fasilitas lengkap', 487704, '-5.137069383536727', '119.50614067055464', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(5, 'Kost Jelita', '7213d840913a67d326baee46dea078dc', 'Jl Tamanlanrea Lorong 5', 'Kost Kost Jelita, murah, aman dan terjangkau dengan fasilitas lengkap', 188359, '-5.134021028326626', '119.50468965154884', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(6, 'Kost Karya', 'a2cfb3e1ee1aafa326f198c5979566bc', 'Jl Tamanlanrea Lorong 6', 'Kost Kost Karya, murah, aman dan terjangkau dengan fasilitas lengkap', 301468, '-5.137036358436231', '119.50829582591197', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(7, 'Kost Lestari', '2e59e3c6c4686ad1dbfc9ba44533d332', 'Jl Tamanlanrea Lorong 7', 'Kost Kost Lestari, murah, aman dan terjangkau dengan fasilitas lengkap', 484749, '-5.1444405619146485', '119.49030716091978', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(8, 'Kost Mewah', '43f3e61e1572c06b2be985c473bc7e5c', 'Jl Tamanlanrea Lorong 8', 'Kost Kost Mewah, murah, aman dan terjangkau dengan fasilitas lengkap', 399116, '-5.132365698733577', '119.5000531416534', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(9, 'Kost Nagari', '464ae0ff86c6b5539af5dfb70e965127', 'Jl Tamanlanrea Lorong 9', 'Kost Kost Nagari, murah, aman dan terjangkau dengan fasilitas lengkap', 183455, '-5.144815531525983', '119.4957600769354', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(10, 'Kost One', '328d48fd03fdfce828675a68116db7df', 'Jl Tamanlanrea Lorong 10', 'Kost Kost One, murah, aman dan terjangkau dengan fasilitas lengkap', 375343, '-5.131899409622138', '119.49833591576619', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(11, 'Kost Permata', '8bcfc8596025fdd7678d94be86a1373f', 'Jl Tamanlanrea Lorong 11', 'Kost Kost Permata, murah, aman dan terjangkau dengan fasilitas lengkap', 269809, '-5.132381242219861', '119.50056830941955', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(12, 'Kost Qlassic', 'c8e5d199171dc5ea2709c37ed969bc92', 'Jl Tamanlanrea Lorong 12', 'Kost Kost Qlassic, murah, aman dan terjangkau dengan fasilitas lengkap', 355832, '-5.1322879839053375', '119.48957806374146', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(13, 'Kost Rasa', '510cc940dc1c277e628bc1cb24a79f1f', 'Jl Tamanlanrea Lorong 13', 'Kost Kost Rasa, murah, aman dan terjangkau dengan fasilitas lengkap', 242064, '-5.145159411959656', '119.49204655594771', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(14, 'Kost Sentosa', '04449b7ab281802c097b904031732da6', 'Jl Tamanlanrea Lorong 14', 'Kost Kost Sentosa, murah, aman dan terjangkau dengan fasilitas lengkap', 252283, '-5.136513724709767', '119.49201661291258', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(15, 'Kost Terang', 'c36e5a0a1257946db38e339186999ebf', 'Jl Tamanlanrea Lorong 15', 'Kost Kost Terang, murah, aman dan terjangkau dengan fasilitas lengkap', 345237, '-5.1432534867009565', '119.49533077046358', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(16, 'Kost Unik', 'ef9596f1719954bd1f6aae4e75b21cd0', 'Jl Tamanlanrea Lorong 16', 'Kost Kost Unik, murah, aman dan terjangkau dengan fasilitas lengkap', 119313, '-5.143465248049867', '119.42513287132269', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(17, 'Kost Vista', '849e643a5f04fdd71a62620db92dcffd', 'Jl Tamanlanrea Lorong 17', 'Kost Kost Vista, murah, aman dan terjangkau dengan fasilitas lengkap', 128266, '-5.137867902240261', '119.47875954065209', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(18, 'Kost Warna', '17697620c232d3f299d8cdf2fcc36a67', 'Jl Tamanlanrea Lorong 18', 'Kost Kost Warna, murah, aman dan terjangkau dengan fasilitas lengkap', 434082, '-5.133585824730693', '119.48502741514037', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(19, 'Kost Xtra', '4f9ebcfb663ec852c3ce0c90db2f7962', 'Jl Tamanlanrea Lorong 19', 'Kost Kost Xtra, murah, aman dan terjangkau dengan fasilitas lengkap', 283847, '-5.1355053813540765', '119.48236571501522', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(20, 'Kost Yasmin', 'b33fab17842a1f9090ec8a0bd72e8bf4', 'Jl Tamanlanrea Lorong 20', 'Kost Kost Yasmin, murah, aman dan terjangkau dengan fasilitas lengkap', 142285, '-5.144753361400743', '119.49172459610045', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(21, 'Kost Zest', 'fb17363b08231b216f7c4a5f11f893a2', 'Jl Tamanlanrea Lorong 21', 'Kost Kost Zest, murah, aman dan terjangkau dengan fasilitas lengkap', 250009, '-5.1153381034225935', '119.44973842315844', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(22, 'Kost Aman', '63d0aff1360482207992c01b5a4135c5', 'Jl Tamanlanrea Lorong 22', 'Kost Kost Aman, murah, aman dan terjangkau dengan fasilitas lengkap', 159617, '-5.132365698733577', '119.490179092802', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(23, 'Kost Bagus', '6117906a22dffd54dadfb68bb12d6b62', 'Jl Tamanlanrea Lorong 23', 'Kost Kost Bagus, murah, aman dan terjangkau dengan fasilitas lengkap', 267560, '-5.131897466032689', '119.50609737549351', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(24, 'Kost Ceria', 'f22758048f747ba0ece7cae4eb599216', 'Jl Tamanlanrea Lorong 24', 'Kost Kost Ceria, murah, aman dan terjangkau dengan fasilitas lengkap', 112307, '-5.13243564441886', '119.48820428303172', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(25, 'Kost Damai', 'ce5b47a0862164bc7c592a8bb600e3c8', 'Jl Tamanlanrea Lorong 25', 'Kost Kost Damai, murah, aman dan terjangkau dengan fasilitas lengkap', 411384, '-5.1343163459082', '119.48648705714452', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(26, 'Kost Elegant', '69c2f6416b48fcaf66d48327b0a27244', 'Jl Tamanlanrea Lorong 26', 'Kost Kost Elegant, murah, aman dan terjangkau dengan fasilitas lengkap', 266571, '-5.137145156817573', '119.48236571501522', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(27, 'Kost Fenomena', '33767fdf7d7e1f79ec7b1df1a4443816', 'Jl Tamanlanrea Lorong 27', 'Kost Kost Fenomena, murah, aman dan terjangkau dengan fasilitas lengkap', 319485, '-5.138969501817606', '119.48308673224031', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(28, 'Kost Gardenia', 'c88d8d6bb3938f2af720e83ef27703e2', 'Jl Tamanlanrea Lorong 28', 'Kost Kost Gardenia, murah, aman dan terjangkau dengan fasilitas lengkap', 344788, '-5.131580777620213', '119.50357345472216', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(29, 'Kost Harmoni', '1b71587724e6435b25760cb0ee9fd2f4', 'Jl Tamanlanrea Lorong 29', 'Kost Kost Harmoni, murah, aman dan terjangkau dengan fasilitas lengkap', 384847, '-5.133904455078843', '119.49910866741544', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(30, 'Kost Iris', '0f182ccd5899add95573476157f49014', 'Jl Tamanlanrea Lorong 30', 'Kost Kost Iris, murah, aman dan terjangkau dengan fasilitas lengkap', 115221, '-5.13233461436872', '119.49799247058877', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(31, 'Kost Jaz', '27cee1d8e067fc2098de7b50b2c5e83c', 'Jl Tamanlanrea Lorong 31', 'Kost Kost Jaz, murah, aman dan terjangkau dengan fasilitas lengkap', 414541, '-5.133329365469493', '119.50099761589138', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(32, 'Kost Kita', '6d3f30bb42753e1cdd758a5c8a599a54', 'Jl Tamanlanrea Lorong 32', 'Kost Kost Kita, murah, aman dan terjangkau dengan fasilitas lengkap', 185016, '-5.13233461436872', '119.50039658683085', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(33, 'Kost Luminosa', '87534e03452a6242109348d01b763f01', 'Jl Tamanlanrea Lorong 33', 'Kost Kost Luminosa, murah, aman dan terjangkau dengan fasilitas lengkap', 460428, '-5.132179182086363', '119.4817646859547', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(34, 'Kost Mascot', 'dfac97efd94aedbbdb227208c9fef642', 'Jl Tamanlanrea Lorong 34', 'Kost Kost Mascot, murah, aman dan terjangkau dengan fasilitas lengkap', 353254, '-5.1410230997285415', '119.47455233722845', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(35, 'Kost Nusa', '0d373caff1a2d4bc50bad143997a2886', 'Jl Tamanlanrea Lorong 35', 'Kost Kost Nusa, murah, aman dan terjangkau dengan fasilitas lengkap', 395190, '-5.14463679011685', '119.48571430549528', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(36, 'Kost Optima', '142f6c466e2a9a13cbeb304381a6dc62', 'Jl Tamanlanrea Lorong 36', 'Kost Kost Optima, murah, aman dan terjangkau dengan fasilitas lengkap', 322071, '-5.143704226903393', '119.49223976386664', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(37, 'Kost Pandawa', '5785adeabfee70e6f68b6dcc6f2157ee', 'Jl Tamanlanrea Lorong 37', 'Kost Kost Pandawa, murah, aman dan terjangkau dengan fasilitas lengkap', 217290, '-5.138680989534829', '119.47350025556088', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(38, 'Kost Qris', 'a9165679a08bfe0ea46290dba0e6fca2', 'Jl Tamanlanrea Lorong 38', 'Kost Kost Qris, murah, aman dan terjangkau dengan fasilitas lengkap', 383624, '-5.136111555791908', '119.47360786299053', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(39, 'Kost Rasa', 'dab2cef3dcf6e01366093252c5fca167', 'Jl Tamanlanrea Lorong 39', 'Kost Kost Rasa, murah, aman dan terjangkau dengan fasilitas lengkap', 491017, '-5.137479330705417', '119.48983564762452', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(40, 'Kost Sukses', '409774e8f1cd34ffed7f6663cb424b6b', 'Jl Tamanlanrea Lorong 40', 'Kost Kost Sukses, murah, aman dan terjangkau dengan fasilitas lengkap', 157652, '-5.141326183742641', '119.48614361196707', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(41, 'Kost Terang', '72b09d26d055fab17442be0715e074fe', 'Jl Tamanlanrea Lorong 41', 'Kost Kost Terang, murah, aman dan terjangkau dengan fasilitas lengkap', 259680, '-5.148508855472025', '119.4957030997342', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(42, 'Kost Ubud', '03f7cc6b1a210dd42e067a5e7eafcefc', 'Jl Tamanlanrea Lorong 42', 'Kost Kost Ubud, murah, aman dan terjangkau dengan fasilitas lengkap', 211218, '-5.126350526349187', '119.49129528962867', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(43, 'Kost Vibrant', '75581ff2044e79e80ed7a076304791d9', 'Jl Tamanlanrea Lorong 43', 'Kost Kost Vibrant, murah, aman dan terjangkau dengan fasilitas lengkap', 188612, '-5.130127501890401', '119.49000737021329', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(44, 'Kost Wiranta', '1c46901110359944a583215560f5c364', 'Jl Tamanlanrea Lorong 44', 'Kost Kost Wiranta, murah, aman dan terjangkau dengan fasilitas lengkap', 496917, '-5.138038873875326', '119.47360786299053', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(45, 'Kost Xenia', '922f642d2dce89c2937fe950a724490d', 'Jl Tamanlanrea Lorong 45', 'Kost Kost Xenia, murah, aman dan terjangkau dengan fasilitas lengkap', 311035, '-5.13424640042917', '119.4946438801087', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(46, 'Kost Yasmin', '269c0aa4a2706f28a4599e1f66f2738b', 'Jl Tamanlanrea Lorong 46', 'Kost Kost Yasmin, murah, aman dan terjangkau dengan fasilitas lengkap', 443467, '-5.134697147004127', '119.48777497655992', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(47, 'Kost Zamrud', '2b34106ed4aaff9bb4af028bf419f1f5', 'Jl Tamanlanrea Lorong 47', 'Kost Kost Zamrud, murah, aman dan terjangkau dengan fasilitas lengkap', 254794, '-5.140898757426846', '119.4828808827814', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(48, 'Kost Edelweis', 'a569983b79db8558b7c63d649db1d899', 'Jl Tamanlanrea Lorong 48', 'Kost Kost Edelweis, murah, aman dan terjangkau dengan fasilitas lengkap', 404486, '-5.142950402952115', '119.49498261198009', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(49, 'Kost Puspa', '99c756a8b43aa4f88d6f47eb0d822eb1', 'Jl Tamanlanrea Lorong 49', 'Kost Kost Puspa, murah, aman dan terjangkau dengan fasilitas lengkap', 125085, '-5.133826740438092', '119.4817646859547', '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(50, 'Kost Elite 51', '95c3f012cc7d0e87a9a546c3a0ed57da', 'Jl Tamanlanrea Lorong 50', 'Kost Kost Elite 51, murah, aman dan terjangkau dengan fasilitas lengkap', 223664, '-5.094980749597222', '119.45758406478693', '2024-02-19 17:31:32', '2024-02-19 17:31:32');

-- Dumping data for table db_kost.phinxlog: ~0 rows (approximately)
INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
	(20240218031127, 'Kost', '2024-02-19 04:07:31', '2024-02-19 04:07:31', 0),
	(20240218032025, 'Users', '2024-02-19 04:07:31', '2024-02-19 04:07:31', 0);

-- Dumping data for table db_kost.recomendations: ~7 rows (approximately)

-- Dumping data for table db_kost.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `avatar`, `updated_at`, `created_at`) VALUES
	(1, 'Muhammad Bintang', 'BintangKun', 'muhbintang65@gmail.com', '$2y$10$f.3mpJ1LjI05ay1SiKP9heVP8dn1SZOZMhGHJZejVRQjssMq0KKc6', NULL, '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(2, 'Fery Fadul', 'FeryAdmin', 'fery@gmail.com', '$2y$10$Mtvl7JAGxSGGaT870mHLeOv2z9FodHTmSzqtTCSUIySXq7JTgNHOS', NULL, '2024-02-19 17:31:32', '2024-02-19 17:31:32'),
	(3, 'Hamka', 'HamkaAdmin', 'hamkairsal@gmail.com', '$2y$10$5YiaG4t0KVjbubG6fdY9/ua5X9Ron2wMvUUQ3EHGy2ve7iq0K0IUW', NULL, '2024-02-19 17:31:32', '2024-02-19 17:31:32');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
