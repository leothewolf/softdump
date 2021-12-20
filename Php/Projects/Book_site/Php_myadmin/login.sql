-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 04:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `username` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`username`, `id`) VALUES
('abc1234', 125);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(120) NOT NULL,
  `bookc` longtext NOT NULL,
  `createdate` varchar(255) NOT NULL,
  `editdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `username`, `title`, `description`, `bookc`, `createdate`, `editdate`) VALUES
(125, 'abc1234', 'test1', 'test1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga distinctio ad et, libero blanditiis numquam explicabo non rerum aliquid iure tempora totam in dolor suscipit vero quasi dolorum exercitationem vitae laudantium maiores voluptate deserunt voluptatibus. Laboriosam excepturi in et, ducimus maiores distinctio exercitationem? Voluptates nostrum modi dolorum mollitia, quidem incidunt molestias provident. Dolor, repudiandae repellat? Velit nisi quo unde quos impedit illo sed deserunt numquam. \r\n\r\nEaque quidem laudantium sit quas fugiat necessitatibus totam obcaecati. Adipisci iure quasi inventore amet dolorem libero necessitatibus animi ipsam ab sint modi pariatur doloremque asperiores commodi ipsum voluptatum eaque odit, possimus neque excepturi itaque voluptatem at iste. Saepe nostrum obcaecati distinctio quam, mollitia fuga, esse alias illum eius sint reprehenderit tempora dolorem porro quaerat, fugit adipisci labore architecto laborum quidem! Natus explicabo vel quis. Sed nam dolorem veniam molestias, laudantium qui. Libero laborum beatae soluta sunt, reiciendis, magnam molestiae ratione consequatur tempora quam deserunt temporibus laboriosam ducimus facere enim rem repudiandae illo nisi unde optio nemo sint asperiores earum. \r\n\r\nMaxime accusamus molestiae ipsam neque temporibus? Alias nemo consequuntur non dolores culpa sed perspiciatis corporis modi sunt eius! Possimus quas dignissimos voluptatem esse consectetur mollitia quam pariatur voluptatum odio animi voluptate placeat, porro maiores aliquam cumque perferendis facere eum commodi. Sequi eius nulla culpa repellendus, molestias quidem vero tempora ducimus distinctio voluptatibus cupiditate rerum quae eveniet id hic architecto iure! Dolorum omnis, nihil, accusantium in rem blanditiis amet aperiam unde porro, maiores accusamus? Provident ex unde quod nam. Veritatis nam quibusdam exercitationem dolorem dolore fugiat doloremque vitae laudantium? Vero ratione distinctio neque vel, dolores reiciendis delectus cupiditate consequuntur sunt quidem temporibus, accusamus, quae laboriosam nesciunt itaque tempora nisi est nemo dolorum nulla omnis. Veritatis exercitationem autem iste sapiente, animi quidem nihil distinctio similique libero repudiandae quam, nostrum at nemo aut veniam dolores provident nisi architecto voluptate earum porro delectus praesentium. Nobis modi totam laudantium voluptate id similique ducimus beatae at expedita commodi sequi, voluptates perspiciatis debitis numquam nam veritatis illum recusandae quo ad impedit suscipit, harum tempore explicabo. \r\n\r\nPerspiciatis alias, reiciendis optio vero consequatur eos nam voluptatibus! Labore saepe animi hic impedit, nam enim suscipit magni at commodi, et, neque tenetur est eius voluptatum eligendi odio. Ut amet quas ipsam natus repellat exercitationem eaque sed, recusandae ab sint facere, debitis tempore, laborum suscipit consectetur nulla sit fugiat? Perferendis deserunt ipsum voluptatem, expedita dicta magnam sunt atque, numquam similique quaerat minus illo consectetur soluta nam accusantium, id doloribus! Reiciendis minima nemo dolore tempora, ullam ducimus a odio tenetur minus aspernatur sunt culpa praesentium illo earum corporis voluptatibus aliquid consectetur illum aperiam id iste veniam. Pariatur, voluptate fuga neque nisi obcaecati, expedita soluta perferendis nam ex eveniet blanditiis vel at molestias aspernatur saepe. Sed, ab? Qui ipsa reiciendis, adipisci aperiam quasi quibusdam molestias nulla, laboriosam officia harum, atque aliquid dignissimos voluptas excepturi eligendi iure praesentium itaque officiis facilis natus possimus sapiente obcaecati repudiandae. Necessitatibus dicta sit itaque? Velit quasi vitae est fuga consequatur ipsa repellendus mollitia odit laborum maxime itaque veniam saepe eius commodi fugit inventore et optio beatae temporibus, excepturi porro dolore animi? Ullam quae qui vitae neque voluptatem voluptatibus quibusdam laudantium non quod? Sequi quaerat, fuga reiciendis praesentium voluptate accusamus laudantium neque corrupti veritatis voluptatibus facere, temporibus ea voluptatem, ipsum distinctio expedita placeat? Repellendus quam, sunt deleniti distinctio porro atque quos facere commodi quo illo libero, temporibus est! \r\n\r\nAliquam qui libero soluta a iure architecto error laboriosam eius suscipit numquam totam, omnis tempora perspiciatis tempore necessitatibus ea accusamus eveniet beatae vero. Facilis corporis iusto assumenda unde dolore corrupti rem id. Obcaecati eligendi consequatur quam debitis doloremque ex laudantium provident facilis aliquam in eveniet quas, perspiciatis pariatur voluptates minus explicabo! Sapiente dolores beatae ipsum! Temporibus, doloribus! Molestias nam corrupti voluptatibus pariatur debitis magni ducimus distinctio dolor et. Ratione quam laborum minima quod natus libero delectus fuga, saepe unde aspernatur id doloremque eos ea nam provident impedit iste quisquam nulla! Voluptatibus incidunt tenetur rerum quidem. \r\n\r\nObcaecati soluta sit ad, ratione eligendi neque veritatis esse repellat deserunt explicabo velit quod necessitatibus. At voluptatem repellat enim impedit aliquam corporis inventore porro perferendis. Vitae quas doloribus corrupti aliquam numquam cumque, enim voluptatem officia recusandae sequi velit, eius voluptatibus nesciunt ab odio quibusdam, libero provident quos impedit reprehenderit vero blanditiis suscipit! Quidem, quibusdam amet! Vel, perferendis ex alias reiciendis recusandae asperiores optio a debitis iusto deleniti voluptates in repudiandae laudantium minus quos commodi velit itaque, quis ratione dolores cupiditate, voluptatum non. Ipsa dolor veritatis necessitatibus nemo, illo modi. \r\n\r\n', '3/8/2021', ''),
(129, 'abc1234', 'Does Consistency Lead to Success? ', 'Does Consistency Lead to Success? ', 'I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work. ', '4/8/2021', ''),
(130, 'abc1234', 'Does Consistency Lead to Success? ', 'Does Consistency Lead to Success? ', 'I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work. ', '4/8/2021', ''),
(131, 'abc1234', 'test3', 'test3', 'test3', '4/8/2021', ''),
(132, 'abc1234', 'test5', 'test5', 'test5', '4/8/2021', ''),
(133, 'abc1234', 'test6', 'test6', 'test6', '4/8/2021', ''),
(134, 'abc1234', 'test', 'To access profile, click on the profile icon given in header. On click it will display a menu which can be used to navig', 'test\r\n', '4/8/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `r_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`r_id`, `username`, `date`, `content`) VALUES
(132, 'admin', '3/8/2021', 'Admin cleared all logs'),
(133, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: test <br/> Description: test <br/> Book Content: test <br/> Dated:4/8/2021'),
(134, 'abc1234', '4/8/2021', 'abc1234 deleted book with <br/> Title: test <br/> Description: test <br/> Book Content: Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga distinctio ad et, libero blanditiis numquam explicabo non rerum aliquid iure tempora totam in dolor suscipit vero quasi dolorum exercitationem vitae laudantium maiores voluptate deserunt voluptatibus. Laboriosam excepturi in et, ducimus maiores distinctio exercitationem? Voluptates nostrum modi dolorum mollitia, quidem incidunt molestias provident. Dolor, repudiandae repellat? Velit nisi quo unde quos impedit illo sed deserunt numquam. \r\n\r\nEaque quidem laudantium sit quas fugiat necessitatibus totam obcaecati. Adipisci iure quasi inventore amet dolorem libero necessitatibus animi ipsam ab sint modi pariatur doloremque asperiores commodi ipsum voluptatum eaque odit, possimus neque excepturi itaque voluptatem at iste. Saepe nostrum obcaecati distinctio quam, mollitia fuga, esse alias illum eius sint reprehenderit tempora dolorem porro quaerat, fugit adipisci labore architecto laborum quidem! Natus explicabo vel quis. Sed nam dolorem veniam molestias, laudantium qui. Libero laborum beatae soluta sunt, reiciendis, magnam molestiae ratione consequatur tempora quam deserunt temporibus laboriosam ducimus facere enim rem repudiandae illo nisi unde optio nemo sint asperiores earum. \r\n\r\nMaxime accusamus molestiae ipsam neque temporibus? Alias nemo consequuntur non dolores culpa sed perspiciatis corporis modi sunt eius! Possimus quas dignissimos voluptatem esse consectetur mollitia quam pariatur voluptatum odio animi voluptate placeat, porro maiores aliquam cumque perferendis facere eum commodi. Sequi eius nulla culpa repellendus, molestias quidem vero tempora ducimus distinctio voluptatibus cupiditate rerum quae eveniet id hic architecto iure! Dolorum omnis, nihil, accusantium in rem blanditiis amet aperiam unde porro, maiores accusamus? Provident ex unde quod nam. Veritatis nam quibusdam exercitationem dolorem dolore fugiat doloremque vitae laudantium? Vero ratione distinctio neque vel, dolores reiciendis delectus cupiditate consequuntur sunt quidem temporibus, accusamus, quae laboriosam nesciunt itaque tempora nisi est nemo dolorum nulla omnis. Veritatis exercitationem autem iste sapiente, animi quidem nihil distinctio similique libero repudiandae quam, nostrum at nemo aut veniam dolores provident nisi architecto voluptate earum porro delectus praesentium. Nobis modi totam laudantium voluptate id similique ducimus beatae at expedita commodi sequi, voluptates perspiciatis debitis numquam nam veritatis illum recusandae quo ad impedit suscipit, harum tempore explicabo. \r\n\r\nPerspiciatis alias, reiciendis optio vero consequatur eos nam voluptatibus! Labore saepe animi hic impedit, nam enim suscipit magni at commodi, et, neque tenetur est eius voluptatum eligendi odio. Ut amet quas ipsam natus repellat exercitationem eaque sed, recusandae ab sint facere, debitis tempore, laborum suscipit consectetur nulla sit fugiat? Perferendis deserunt ipsum voluptatem, expedita dicta magnam sunt atque, numquam similique quaerat minus illo consectetur soluta nam accusantium, id doloribus! Reiciendis minima nemo dolore tempora, ullam ducimus a odio tenetur minus aspernatur sunt culpa praesentium illo earum corporis voluptatibus aliquid consectetur illum aperiam id iste veniam. Pariatur, voluptate fuga neque nisi obcaecati, expedita soluta perferendis nam ex eveniet blanditiis vel at molestias aspernatur saepe. Sed, ab? Qui ipsa reiciendis, adipisci aperiam quasi quibusdam molestias nulla, laboriosam officia harum, atque aliquid dignissimos voluptas excepturi eligendi iure praesentium itaque officiis facilis natus possimus sapiente obcaecati repudiandae. Necessitatibus dicta sit itaque? Velit quasi vitae est fuga consequatur ipsa repellendus mollitia odit laborum maxime itaque veniam saepe eius commodi fugit inventore et optio beatae temporibus, excepturi porro dolore animi? Ullam quae qui vitae neque voluptatem voluptatibus quibusdam laudantium non quod? Sequi quaerat, fuga reiciendis praesentium voluptate accusamus laudantium neque corrupti veritatis voluptatibus facere, temporibus ea voluptatem, ipsum distinctio expedita placeat? Repellendus quam, sunt deleniti distinctio porro atque quos facere commodi quo illo libero, temporibus est! \r\n\r\nAliquam qui libero soluta a iure architecto error laboriosam eius suscipit numquam totam, omnis tempora perspiciatis tempore necessitatibus ea accusamus eveniet beatae vero. Facilis corporis iusto assumenda unde dolore corrupti rem id. Obcaecati eligendi consequatur quam debitis doloremque ex laudantium provident facilis aliquam in eveniet quas, perspiciatis pariatur voluptates minus explicabo! Sapiente dolores beatae ipsum! Temporibus, doloribus! Molestias nam corrupti voluptatibus pariatur debitis magni ducimus distinctio dolor et. Ratione quam laborum minima quod natus libero delectus fuga, saepe unde aspernatur id doloremque eos ea nam provident impedit iste quisquam nulla! Voluptatibus incidunt tenetur rerum quidem. \r\n\r\nObcaecati soluta sit ad, ratione eligendi neque veritatis esse repellat deserunt explicabo velit quod necessitatibus. At voluptatem repellat enim impedit aliquam corporis inventore porro perferendis. Vitae quas doloribus corrupti aliquam numquam cumque, enim voluptatem officia recusandae sequi velit, eius voluptatibus nesciunt ab odio quibusdam, libero provident quos impedit reprehenderit vero blanditiis suscipit! Quidem, quibusdam amet! Vel, perferendis ex alias reiciendis recusandae asperiores optio a debitis iusto deleniti voluptates in repudiandae laudantium minus quos commodi velit itaque, quis ratione dolores cupiditate, voluptatum non. Ipsa dolor veritatis necessitatibus nemo, illo modi. \r\n\r\n <br/> Dated:4/8/2021'),
(135, 'abc1234', '4/8/2021', 'abc1234 deleted book with <br/> Title: test <br/> Description: test <br/> Book Content: test <br/> Dated:4/8/2021'),
(136, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(137, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(138, 'abc1234', '4/8/2021', 'abc1234 deleted book with <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(139, 'abc1234', '4/8/2021', 'abc1234 deleted book with <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(140, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(141, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: Does Consistency Lead to Success?  <br/> Description: Does Consistency Lead to Success?  <br/> Book Content: I write frequently about how mastery requires consistency. That includes ideas like putting in your reps, improving your average speed, and falling in love with boredom. These ideas are critical, but The Helsinki Bus Station Theory helps to clarify and distinguish some important details that often get overlooked.\r\n\r\nDoes consistency lead to success?\r\n\r\nConsider a college student. They have likely spent more than 10,000 hours in a classroom by this point in their life. Are they an expert at learning every piece of information thrown at them? Not at all. Most of what we hear in class is forgotten shortly thereafter.\r\n\r\nConsider someone who works on a computer each day at work. If you\'ve been in your job for years, it is very likely that you have spent more than 10,000 hours writing and responding to emails. Given all of this writing, do you have the skills to write the next great novel? Probably not.\r\n\r\nConsider the average person who goes to the gym each week. Many folks have been doing this for years or even decades. Are they built like elite athletes? Do they possess elite level strength? Unlikely.\r\n\r\nThe key feature of The Helsinki Bus Station Theory is that it urges you to not simply do more work, but to do more re-work.  <br/> Dated:4/8/2021'),
(142, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: test3 <br/> Description: test3 <br/> Book Content: test3 <br/> Dated:4/8/2021'),
(143, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: test5 <br/> Description: test5 <br/> Book Content: test5 <br/> Dated:4/8/2021'),
(144, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: test6 <br/> Description: test6 <br/> Book Content: test6 <br/> Dated:4/8/2021'),
(145, 'abc1234', '4/8/2021', 'abc1234 submitted a book <br/> Title: test <br/> Description: To access profile, click on the profile icon given in header. On click it will display a menu which can be used to navig <br/> Book Content: test\r\n <br/> Dated:4/8/2021');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rusername` varchar(60) NOT NULL,
  `tusername` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `reason` varchar(10000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rusername`, `tusername`, `id`, `reason`, `date`) VALUES
('admin', 'abc1234', 63, '<strong>Report by admin:</strong> <br/> Reason: Spam <br/> Message: test <br/> Reported URL: <a href=\"books/abc1234_125.php\" target=\"_blank\">Click To Navigate</a> <br/> Dated: 4/8/2021', '4/8/2021'),
('admin', 'abc1234', 64, '<strong>Report by admin:</strong> <br/> Reason: Spam <br/> Message: test <br/> Reported URL: <a href=\"../books/abc1234_130.php\" target=\"_blank\">Click To Navigate</a> <br/> Dated: 5/8/2021', '5/8/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$MUbc.ZSU5dpnVOQYETt.5OVPoTTU60DfxTbGNaKKLqV0OcM9NAu36', 'admin@email.com'),
(3, 'abc1234', '$2y$10$bFTs7HkoBEqbBTP6daqalOiKq13K899Qu9Hh0XLIjfd3znGJcfQjS', 'abc1234@email.com'),
(4, 'abc1', '$2y$10$eZeuz1P3DmHgPwsnoy/lje2uRaLcix9Ytcrwn28nDxUhZfVeZtKjO', ''),
(17, 'abc2', '$2y$10$pmyJfMSdb8KDW.ECjHd3ne7OalC8ixFqhxLrBqVlYTVB1FFQFao.u', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
