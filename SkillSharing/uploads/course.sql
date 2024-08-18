-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 09:06 AM
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
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `course_name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `description`, `price`, `image_url`) VALUES
(1, 'Web Development', 'Web Development involves creating and maintaining websites and web applications that run on web browsers. It encompasses everything from building static web pages to complex web-based applications. Web development can be broadly categorized into two main areas: front-end and back-end development.', 10000.00, 'img/fullstack.jpg'),
(2, 'Data Science', 'Data Science is an interdisciplinary field that combines statistical analysis, computer science, data visualization, and domain expertise to extract insights and knowledge from structured and unstructured data. Data scientists use various techniques, tools, and methodologies to analyze large datasets, build predictive models, and derive actionable insights to drive decision-making.', 8000.00, 'img/datascience1.jpg'),
(3, 'Python Programming', 'Python Programming is a versatile, high-level programming language known for its simplicity and readability. It supports multiple programming paradigms, including procedural, object-oriented, and functional programming. Python is widely used for various applications, including web development, data analysis, artificial intelligence, scientific computing, and automation.', 12000.00, 'img/python.jpg'),
(4, 'Cyber Security', 'Cybersecurity is the practice of protecting systems, networks, and data from digital attacks, unauthorized access, damage, or theft. It encompasses a wide range of practices, tools, and concepts aimed at ensuring the confidentiality, integrity, and availability of information in the digital world.', 7000.00, 'img/cybersecurity.jpg'),
(5, 'Digital Marketing', 'Digital Marketing is the use of digital channels, platforms, and technologies to promote products, services, or brands to a target audience. It encompasses a wide range of activities aimed at driving online engagement, generating leads, and increasing brand awareness. Digital marketing leverages various online mediums such as search engines, social media, email, and websites to reach consumers.', 6000.00, 'img/digital.jpg'),
(6, 'Blockchain', 'Blockchain is a decentralized and distributed digital ledger technology that records transactions across multiple computers in such a way that the registered transactions cannot be altered retroactively. This ensures the integrity and transparency of data, making it an innovative solution for various industries, including finance, supply chain, healthcare, and more.', 9000.00, 'img/blockchain.jpg'),
(7, 'Mobile App Development', 'Mobile App Development involves the process of creating software applications that run on mobile devices, such as smartphones and tablets. These applications can be designed for various operating systems (OS) like Android, iOS, and others. Mobile app development encompasses a range of activities from initial planning and design to coding, testing, and deployment.', 11000.00, 'img/mobile.jpg'),
(8, 'Artificial Intelligence and Machine Learning', 'Artificial Intelligence (AI) and Machine Learning (ML) are closely related fields within computer science, focusing on creating systems that can learn from data, make decisions, and perform tasks that typically require human intelligence. While AI is the broader concept of machines being able to carry out tasks in a way that we would consider \"smart,\" ML is a subset of AI that involves training algorithms to recognize patterns and make decisions based on data.', 15000.00, 'img/aiml.jpg'),
(9, 'JavaScript Programming', 'JavaScript Programming is a versatile, high-level scripting language primarily used for creating interactive and dynamic content on the web. It is a core technology of web development alongside HTML and CSS, enabling developers to build rich client-side applications and enhance user experiences.', 8000.00, 'img/javascript.jpg'),
(10, 'UI/UX Design', 'Create amazing user experiences', 699.99, 'uiuxdesign.jpg'),
(11, 'Java Programming', 'Master object-oriented programming with Java', 799.99, 'java.jpg'),
(12, 'SQL Database', 'Learn database management with SQL', 399.99, 'sql.jpg'),
(13, 'Cloud Computing', 'Learn about cloud platforms and services', 999.99, 'cloudcomputing.jpg'),
(14, 'Project Management', 'Manage projects effectively', 799.99, 'projectmanagement.jpg'),
(15, 'Business Analytics', 'Analyze data to make informed decisions', 999.99, 'businessanalytics.jpg'),
(16, 'Data Visualization', 'Create stunning data visualizations', 499.99, 'datavisualization.jpg'),
(17, 'Digital Photography', 'Master the art of photography', 699.99, 'digitalphotography.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
