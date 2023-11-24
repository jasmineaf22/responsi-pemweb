-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 01:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `responsi-pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id_cast` int(11) NOT NULL,
  `id_movie` int(11) NOT NULL,
  `nama_cast` varchar(255) NOT NULL,
  `nama_tokoh` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`id_cast`, `id_movie`, `nama_cast`, `nama_tokoh`, `foto`) VALUES
(1, 1, 'Lupita Nyong\'o', 'Adelaide Wilson', '1.jpg'),
(10, 1, 'Winston Duke', 'Gabe Wilson', '2.jpg'),
(11, 1, 'Elisabeth Moss', 'Kitty Tyler', '3.jpg'),
(12, 1, 'Tim Heidecker', 'Josh Tyler', '4.jpg'),
(13, 1, 'Noelle Sheldon', 'Lindsey Tyler', '5.jpg'),
(16, 2, 'Taissa Farmiga', 'Sister Irene', '6.jpg'),
(17, 2, 'Anna Popplewell', 'Kate', '7.jpg'),
(18, 2, 'Bonnie Aarons', 'Demon nun', '8.jpg'),
(19, 2, 'Storm Reid', 'Debra', '9.jpeg'),
(20, 2, 'Jonas Bloquet', 'Maurice', '10.jpeg'),
(21, 3, 'Patrick Wilson', 'Ed Werren', '11.jpeg'),
(22, 3, 'Vera Farmiga', 'Lorraine Warren', '12.jpeg'),
(23, 3, 'Sarah Catherine Hook', 'Debbie Glatzel', '13.jpeg'),
(24, 3, 'Ruairi O Connor', 'Kestner', '14.jpeg'),
(25, 3, 'Julian Hilliard', 'David Glatzel', '15.jpeg'),
(26, 4, 'Ty Simpskin', 'Dalton Lambert', '16.jpeg'),
(27, 4, 'Patrick Wilson', 'Josh Lambert', '17.jpeg'),
(28, 4, 'Rose Byrne', 'Renai Lambert', '18.jpeg'),
(29, 4, 'Lin Shaye', 'Elise', '19.jpeg'),
(30, 4, 'Sinclair Daniel', 'Chris Winslow', '20.jpeg'),
(31, 5, 'Mckenna Grace', 'Judy Warren', '21.jpeg'),
(32, 5, 'Patrick Wilson', 'Ed Warren', '22.jpeg'),
(33, 5, 'Madison Iseman', 'Marry Ellen', '23.jpeg'),
(34, 5, 'Katie Sarife', 'Daniela Rios', '24.jpeg'),
(35, 5, 'Vera Farmiga', 'Lorraine Warren', '25.jpeg'),
(36, 6, 'Fionna Dourif', 'Nica Pierce', '26.jpeg'),
(37, 6, 'Jennifer Tilly', 'Tiffany', '27.jpeg'),
(38, 6, 'Alex Vincent', 'Andy Barclay', '28.jpeg'),
(39, 6, 'Michael Thierry', 'Dr. Foley', '29.jpeg'),
(40, 6, 'Christine Elise', 'Kyle', '30.jpeg'),
(41, 20, 'Ellen Burstyn', 'Chris Macneil', '31.jpeg'),
(42, 20, 'Linda Blair', 'Regan Macneil', '32.jpeg'),
(43, 20, 'Olivia O Neill', 'Katherine', '33.jpeg'),
(44, 20, 'Lidya Jewett', 'Angela Fielding', '34.jpeg'),
(45, 20, 'Leslie Odom', 'Victor Fielding', '35.jpeg'),
(46, 21, 'Bill Skarsgard', 'Pennywise', '36.jpeg'),
(47, 21, 'Jaeden Martell', 'Bill Denbrough', '37.jpeg'),
(48, 21, 'Finn Wolfhard', 'Richie Tozier', '38.jpeg'),
(49, 21, 'Jack Dylan', 'Eddie Kaspbrak', '39.jpeg'),
(50, 21, 'Jeremy Ray', 'Ben Hanscom', '40.jpeg'),
(51, 7, 'Ratu Felisha', 'Tari', '41.jpeg'),
(52, 7, 'Tara Basro', 'Rini', '42.jpeg'),
(53, 7, 'Bront Palarae', 'Bahri', '43.jpeg'),
(54, 7, 'Endy Arfian', 'Tony', '44.jpeg'),
(55, 7, 'Asmara Abigail', 'Darminah', '45.jpeg'),
(56, 8, 'Iwa K', 'Walisidi', '46.jpeg'),
(57, 8, 'Deva Mahenra', 'Andi', '47.jpeg'),
(58, 8, 'Della Dartyan', 'Rida', '48.jpeg'),
(59, 8, 'Nayla D Purnama', 'Sari', '49.jpeg'),
(60, 8, 'Muhammad Abe', 'Mr Saman', '50.jpeg'),
(61, 9, 'Aghniy Haque', 'Ayu', '51.jpeg'),
(62, 9, 'Aulia Sarah', 'Badarawuhi', '52.jpeg'),
(63, 9, 'Achmad Megantara', 'Bima', '53.jpeg'),
(64, 9, 'Tissa Biani', 'Nur', '54.jpeg'),
(65, 9, 'Adinda Thomas', 'Widya', '55.jpeg'),
(66, 10, 'Dayinta Melira', 'Sengarturih', '56.jpeg'),
(67, 10, 'Gisellma Firmansyah', 'Dela', '57.jpeg'),
(68, 10, 'Mikha Tambayong', 'Sri', '58.jpeg'),
(69, 10, 'Givina Lukita', 'Erna', '59.jpeg'),
(70, 10, 'Karina Suwardadi', 'Karsa Atmojo', '60.jpeg'),
(71, 11, 'Shareefa Daanish', 'Asih', '61.jpeg'),
(72, 11, 'Ario Bayu', 'Razan', '62.jpeg'),
(73, 11, 'Citra Kirana', 'Puspita', '63.jpeg'),
(74, 11, 'Marsha Timothy', 'Sylvia', '64.jpeg'),
(75, 11, 'Darius', 'Andi', '65.jpeg'),
(76, 12, 'Titi Kamal', 'Rini', '66.jpeg'),
(77, 12, 'Samuel Rizal', 'Alif', '67.jpeg'),
(78, 12, 'Marcella Zalianty', 'Aisyah', '68.jpeg'),
(79, 12, 'Dea Panendra', 'Lastri', '69.jpeg'),
(80, 12, 'Ence Bagus', 'Dika', '70.jpeg'),
(81, 22, 'Shawn Adrian', 'Angki', '71.jpeg'),
(82, 22, 'Prilly Latuconsina', 'Risa', '72.jpeg'),
(83, 22, 'Sandrinna Michelle', 'Riri', '73.jpeg'),
(84, 22, 'Sophia Latjuba', 'Tina', '74.jpeg'),
(85, 22, 'Bucek Depp', 'Ahmad', '75.jpeg'),
(86, 23, 'Jessica Milla', 'Tara', '76.jpeg'),
(87, 23, 'Sara Wijayanto', 'Laras', '77.jpeg'),
(88, 23, 'Winky Wiryawan', 'Aryan', '78.jpeg'),
(89, 23, 'Masayu', 'Rere', '79.jpeg'),
(90, 23, 'Jeremy Thomas', 'Raynard', '80.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id_movie` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `submovie` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `year` char(4) NOT NULL,
  `duration` int(255) NOT NULL,
  `star` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id_movie`, `name`, `image`, `submovie`, `synopsis`, `year`, `duration`, `star`) VALUES
(1, 'Us', '1.jpg', 'west', 'Coba bayangkan, kamu keluar dari kereta. Kamu harus turun melalui jalan bawah tanah. Tidak ada orang lain di sana, hanya kota Amerika yang gelap ini. Dan kemudian melihat seseorang yang mirip dengan dirimu sendiri', '2019', 76, 5),
(2, 'The Nun II', '2.jpg', 'west', 'In 1956 France, a priest is violently murdered, and Sister Irene begins to investigate. &#039;She once again comes face-to-face with a powerful evil.\r\n', '2023', 110, 5),
(3, 'The Conjuring: The Devil Made Me Do It', '3.jpg', 'west', 'Kisah mengerikan tentang teror, pembunuhan, dan kejahatan tak diketahui sebelumnya kisah yang mengejutkan bahkan dialami oleh keluarga Ed dan Lorraine Warren. Salah satu kasus paling sensasional dari arsip penyelidikan mereka, dimulai dengan pertarungan untuk jiwa seorang anak laki-laki, kemudian membawa mereka kepada seuatu yang belum pernah mereka lihat dan alami sebelumnya', '2021', 112, 5),
(4, 'Insidious: The Red Door', '4.jpg', 'west', 'Berlatar 10 tahun setelah film keempat, seri kelima akan berkisah tentang usaha keluarga Lambert, Josh (Patrick Wilson), Renai (Rose Byrne) dan anaknya yang sudah dewasa, Dalton (Ty Simpkins) mencari tahu kenapa keluarga mereka kembali dianggu oleh sosok arwah.', '2023', 107, 4),
(5, 'Annabelle 3', '5.jpg', 'west', 'Pasangan suami istri Ed Warren (Patrick Wilson)&#039; dan Lorraine Warren (Vera Farmiga) sepakat untuk meletakkan boneka Annabelle di ruang khusus mereka. Dibalik lemari kaca suci dan mendapat berkat dari seorang pendeta. Namun malapetaka datang saat Annabelle membangunkan roh-roh jahat yang ada di ruangan itu. Putri pasangan ini, Judy Warren (Mckenna Grace) dan temannya menjadi target teror baru Annabelle dan iblis jahat lainnya.', '2019', 106, 4),
(6, 'Cult of Chucky', '6.jpg', 'west', 'Cult of Chucky adalah film Amerika Serikat produksi tahun 2017 bergenre supernatural yang disutradarai oleh Don Mancini, sekaligus sebagai penulis skenarionya dan pencipta dari Child\'s Play franchise. Film ini merupakan sequel waralaba ke-tujuh.', '2017', 91, 4),
(7, 'Pengabdi Setan 2: Communion', '1.jpg', 'indo', 'Beberapa tahun setelah berhasil menyelamatkan diri dari kejadian mengerikan yang membuat mereka kehilangan ibu dan si bungsu Ian, Rini dan adik-adiknya, Toni dan Bondi, serta Bapak tinggal di rumah susun karena percaya tinggal di rumah susun aman jika terjadi sesuatu karena ada banyak orang.', '2022', 119, 5),
(8, 'Kisah Tanah Jawa', '2.jpg', 'indo', 'Hao yang mempunyai kemampuan retrokognisi sebuah kemampuan yang bisa melihat kejadian di masa lalu. Melalui kemampuannya tersebut, Hao membantu Sari seorang siswi SMK yang ternyata hilang di culik sosok pocong berkepala gundul. Bersama sahabatnya yang bernama Rida akhirnya dia berhasil menyelamatkan Sari dari Pocong gundul tersebut. Namun tanpa disadari ternyata membuat makhluk tersebut murka dan mulai memberi teror yang mengancam keselamatan Hao.', '2023', 107, 4),
(9, 'KKN di Desa Penari\r\n', '3.jpg', 'indo', 'When some students visit a village for community service, they run into a dancer\'s wrathful spirit that unleashes a cascade of horrors upon them.', '2022', 121, 5),
(10, 'Sewu Dino', '4.jpg', 'indo', 'Sri is instructed to perform a cleansing ritual for Dela Atmojo, an unconscious girl. The terror begins when her friend fails to complete the ritual.', '2023', 121, 4),
(11, 'Asih 2', '5.jpg', 'indo', 'After adopting Ana, Sylvia realizes that she did not only bring Ana home, but also Asih, the ghost who has been Ana\'s foster mother.', '2020', 104, 4),
(12, 'Makmum 2', '6.jpg', 'indo', 'Baru saja suaminya meninggal,Rini (diperankan oleh Titi Kamal) mendapat kabar bahwa bude Yanti yang merawatnya sejak kecil meninggal dunia. Bersama Hafiz (diperankan oleh Jason Doulez Beunaya Bangun), putranya, ia lantas pulang ke kampung halamannya, desa Suayan. Karena sesepuh desa yang biasa dipanggil pak ustadz (diperankan oleh Pritt Timothy) ingin agar warganya fokus beribadah, ia menolak segala bentuk kemajuan jaman. Alhasil, hingga sekarang desa tersebut sama sekali tidak terjamah oleh listrik.', '2021', 91, 4),
(20, 'The Exorcist: Believer', '7.jpg', 'west', 'When his daughter, Angela, and her friend Katherine, show signs of demonic possession, it unleashes a chain of events that forces single father Victor Fielding to confront the nadir of evil. Terrified and desperate, he seeks out Chris MacNeil, the only person alive whos witnessed anything like it before.\r\n', '2023', 111, 4),
(21, 'IT', '8.jpg', 'west', 'Seven helpless and bullied children are forced to face their worst nightmares when Pennywise, a shape-shifting clown, reappears. The clown, an ancient evil torments children before feeding on them.\r\n', '2017', 135, 5),
(22, 'Danur 2: Maddah', '7.jpg', 'indo', 'Setahun setelah kejadian di film pertama, Risa, seorang gadis indigo, tinggal bersama adiknya, Riri, dan tiga teman hantunya: Peter, William, dan Janshen, di Bandung. Karena ibu Risa dan Riri, Elly, sedang ikut ayah mereka dinas ke luar negeri, mereka sering mengunjungi kediaman bibi mereka, Tina, yang juga terletak di Bandung. Tina tinggal bersama dengan suaminya, Ahmad, dan putra mereka, Angki. Riri saat ini sedang belajar balet dan menjadi kesal ketika Risa mempermalukannya pada suatu latihan dengan menjerit setelah dia dikejutkan oleh arwah penari yang mendiami teater balet. Sementara itu, Risa mengetahui bahwa Peter, William, dan Janshen berteman dengan dua hantu Indo baru, Hendrick dan Hans, tanpa sepengetahuannya.', '2018', 90, 5),
(23, 'The Doll 3', '8.jpg', 'indo', 'Following the death of their parents, Tara and her brother Gian struggle to deal with the trauma. After Gian passes away, Tara tries to put his spirit in the body of a doll. However, a wicked energy takes control of the doll.\r\n', '2022', 115, 5);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `id_movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_user`, `review`, `timestamp`, `id_movie`) VALUES
(4, 1, 'asikkkkkkkkkk', '2023-11-23 20:37:31', 3),
(20, 1, 'anjayy', '2023-11-24 16:27:10', 1),
(22, 2, '1111111', '2023-11-24 16:28:24', 6),
(23, 1, 'kerenn', '2023-11-24 18:29:30', 2),
(24, 1, 'seru bgtt', '2023-11-24 18:35:35', 3),
(25, 1, 'serem bgt', '2023-11-24 18:39:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `isAdmin`) VALUES
(1, 'Jasmine', 'jasmineaf04@gmail.com', '$2y$10$dKQsGwpNQoH0alHoQNi12uTJBe5T8FrjZgabB8CBkKyDRsVR3HlUO', 1),
(2, 'test', 'qwe@qwe.qwe', '$2y$10$3fNA1A8kTg.g.yMklEZDWeeNwKVhYZFBNafmbUEuDGqVikXCqzQza', 0),
(3, 'hi', '123@123.123', '$2y$10$0dTlOfMcy03omYqg0C60OOKP5UquTaNF1XFOsAHTyuxOxjwfFGY/e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id_cast`),
  ADD KEY `id_movie` (`id_movie`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `fk_movie` (`id_movie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id_cast` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast`
--
ALTER TABLE `cast`
  ADD CONSTRAINT `id_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_movie` FOREIGN KEY (`id_movie`) REFERENCES `movie` (`id_movie`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
