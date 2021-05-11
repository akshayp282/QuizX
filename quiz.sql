-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 08:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`qid`, `ansid`) VALUES
('60994007a7af2', '60994007ce209'),
('6099400850329', '609940085ce7b'),
('60994102ce897', '60994102efbac'),
('6099410351a04', '609941035a593'),
('609941039383a', '60994103b5e71'),
('60995fb72a571', '60995fb7440c8'),
('60995fb7cb158', '60995fb7d3d24'),
('60995fb80b4f3', '60995fb8114f0'),
('60995fb848fbf', '60995fb859d44'),
('60996f2bdc3b3', '60996f2c05db0'),
('60996f2c4d729', '60996f2c5df86');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(8) NOT NULL,
  `cname` text NOT NULL,
  `qcount` int(8) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `qcount`, `date`) VALUES
(1, 'Data Structures', 0, '2021-05-09 10:49:26'),
(4, 'Database', 0, '2021-05-09 11:27:44'),
(5, 'Operating System', 0, '2021-05-09 11:53:28'),
(6, 'Computer Networks', 0, '2021-05-09 11:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `correct`, `wrong`, `date`) VALUES
('achu@gmail.com', '609940b959235', -3, 3, 1, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 1, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 1, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 0, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 0, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 0, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '609940b959235', -3, 3, 0, 3, '2021-05-10 22:57:14'),
('achu@gmail.com', '60996f09df55b', 4, 2, 1, 1, '2021-05-10 23:24:19'),
('achu@gmail.com', '60996f09df55b', 4, 2, 1, 1, '2021-05-10 23:24:19'),
('achu@gmail.com', '60996f09df55b', 4, 2, 1, 1, '2021-05-10 23:24:19'),
('achu@gmail.com', '60996f09df55b', 4, 2, 1, 1, '2021-05-10 23:24:19'),
('achu@gmail.com', '60996f09df55b', 4, 2, 1, 1, '2021-05-10 23:24:19'),
('himanshu.davasn@gmail.com', '609940b959235', 15, 3, 3, 0, '2021-05-10 23:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(100) NOT NULL,
  `option` varchar(255) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('60994102ce897', 'A', '60994102efb97'),
('60994102ce897', 'Correct', '60994102efbac'),
('60994102ce897', 'C', '60994102efbaf'),
('60994102ce897', 'D', '60994102efbb2'),
('6099410351a04', 'Correct', '609941035a593'),
('6099410351a04', 'B', '609941035a5a1'),
('6099410351a04', 'C', '609941035a5a3'),
('6099410351a04', 'D', '609941035a5a6'),
('609941039383a', 'A', '60994103b5e60'),
('609941039383a', 'B', '60994103b5e6d'),
('609941039383a', 'Correct', '60994103b5e71'),
('609941039383a', 'D', '60994103b5e74'),
('60996f2bdc3b3', 'A', '60996f2c05da5'),
('60996f2bdc3b3', 'Correct', '60996f2c05db0'),
('60996f2bdc3b3', 'C', '60996f2c05db2'),
('60996f2bdc3b3', 'D', '60996f2c05db3'),
('60996f2c4d729', 'A', '60996f2c5df86'),
('60996f2c4d729', 'B', '60996f2c5df8f'),
('60996f2c4d729', 'C', '60996f2c5df91'),
('60996f2c4d729', 'D', '60996f2c5df92');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `ques` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `ques`, `choice`, `sno`) VALUES
('609940b959235', '60994102ce897', 'What is DSA?', 4, 1),
('609940b959235', '6099410351a04', 'What is Heap?', 4, 2),
('609940b959235', '609941039383a', 'What is queue?', 4, 3),
('60996f09df55b', '60996f2bdc3b3', 'q 1?', 4, 1),
('60996f09df55b', '60996f2c4d729', 'q 2?', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `cid` text NOT NULL,
  `eid` varchar(100) NOT NULL,
  `qname` text NOT NULL,
  `qright` int(8) NOT NULL,
  `qwrong` int(8) NOT NULL,
  `qtotal` int(8) NOT NULL,
  `qpassing` int(8) NOT NULL,
  `qdate` datetime NOT NULL DEFAULT current_timestamp(),
  `qtime` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`cid`, `eid`, `qname`, `qright`, `qwrong`, `qtotal`, `qpassing`, `qdate`, `qtime`) VALUES
('1', '609940b959235', 'DS', 5, 1, 3, 10, '2021-05-10 19:48:33', 0),
('1', '60996f09df55b', 'Check', 5, 1, 2, 1, '2021-05-10 23:06:09', 20);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `eid` text NOT NULL,
  `pname` text NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`eid`, `pname`, `score`, `time`) VALUES
('609940b959235', 'Achu', -3, '2021-05-10 17:27:14'),
('60996f09df55b', 'Achu', 4, '2021-05-10 17:54:20'),
('609940b959235', 'Himanshu Kumar', 15, '2021-05-10 18:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(8) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Akshay', 'imapv@outlook.com', 'imapv'),
(2, 'Akash', 'akash@outlook.com', '$2y$10$9DbGDONWVUKEMlIpbUNj0eNdEPbXRsXk1MKrJPXvS.GIXFldWS3aa'),
(3, 'Achu', 'achu@gmail.com', '$2y$10$Y05wU6uF7lViybkp/mAV3.yPJv9qnhv3vaa1eX42uWlPdr.8QSB0u'),
(4, 'Himanshu Kumar', 'himanshu.davasn@gmail.com', '$2y$10$Dq7j9Xu95ICjv7neZqtDHuii2r8f6MB1RQ.fzoyG3DoA6yYXvLEqu'),
(5, 'Akash Pradeep', 'akashp@outlook.com', '$2y$10$Q7InghE0SNVPkaLsdP4aJelbLZley2ylqNXcF.6oioFMyXFFU56uG');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(8) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Pradeep Kumar', 'pradeep@gmail.com', '$2y$10$M9.tVXhXTf17k.AjPHVgmuXseanEe5Ug6SnI9D07d4mgAy3LLRcGe'),
(2, 'Deepa Pradeep', 'deepa@gmail.com', '$2y$10$m6dixsifmogPayfj.oE1cenizKIdbJp77XO4hZHFo6k/WqkvS3Gdm'),
(3, 'Atul Patel', 'atul@gmail.com', '$2y$10$MvGKOhH71CKgwcPirLRqP.y8MDzKJ4SBnQ5qK9SK5xUys6PhksXqm'),
(4, 'Manpreet Baby', 'manpreet@gmail.com', '$2y$10$Kt5TaQP3tQg8hLkiB5whFeLWeOJ1wTkA5Go8U.XsrEPQXlGPQ3p9C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
