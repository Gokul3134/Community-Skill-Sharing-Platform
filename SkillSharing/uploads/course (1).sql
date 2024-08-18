-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 06:58 PM
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
  `faculty` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `faculty`, `description`, `price`, `image_url`) VALUES
(1, 'Web Development', 'Gokul Sarkar from UEM', 'Web Development involves creating and maintaining websites and web applications that run on web browsers. It encompasses everything from building static web pages to complex web-based applications. Web development can be broadly categorized into two main areas: front-end and back-end development.', 10000.00, 'img/fullstack.jpg'),
(2, 'Data Science', 'Sanjoy Dutta from UEM', 'Data Science is an interdisciplinary field that combines statistical analysis, computer science, data visualization, and domain expertise to extract insights and knowledge from structured and unstructured data. Data scientists use various techniques, tools, and methodologies to analyze large datasets, build predictive models, and derive actionable insights to drive decision-making.', 8000.00, 'img/datascience1.jpg'),
(3, 'Python Programming', 'Palash Kundu from UEM', 'Python Programming is a versatile, high-level programming language known for its simplicity and readability. It supports multiple programming paradigms, including procedural, object-oriented, and functional programming. Python is widely used for various applications, including web development, data analysis, artificial intelligence, scientific computing, and automation.', 12000.00, 'img/python.jpg'),
(4, 'Cyber Security', 'Ritwik Sharma from IEM', 'Cybersecurity is the practice of protecting systems, networks, and data from digital attacks, unauthorized access, damage, or theft. It encompasses a wide range of practices, tools, and concepts aimed at ensuring the confidentiality, integrity, and availability of information in the digital world.', 7000.00, 'img/cybersecurity.jpg'),
(5, 'Digital Marketing', 'Priya Rajak from SNU', 'Digital Marketing is the use of digital channels, platforms, and technologies to promote products, services, or brands to a target audience. It encompasses a wide range of activities aimed at driving online engagement, generating leads, and increasing brand awareness. Digital marketing leverages various online mediums such as search engines, social media, email, and websites to reach consumers.', 6000.00, 'img/digital.jpg'),
(6, 'Blockchain', 'Rahul Sarkar from IEM', 'Blockchain is a decentralized and distributed digital ledger technology that records transactions across multiple computers in such a way that the registered transactions cannot be altered retroactively. This ensures the integrity and transparency of data, making it an innovative solution for various industries, including finance, supply chain, healthcare, and more.', 9000.00, 'img/blockchain.jpg'),
(7, 'Mobile App Development', 'Payal Mondal from SNU', 'Mobile App Development involves the process of creating software applications that run on mobile devices, such as smartphones and tablets. These applications can be designed for various operating systems (OS) like Android, iOS, and others. Mobile app development encompasses a range of activities from initial planning and design to coding, testing, and deployment.', 11000.00, 'img/mobile.jpg'),
(8, 'Artificial Intelligence and Machine Learning', 'Sharmi Khan from UEM', 'Artificial Intelligence (AI) and Machine Learning (ML) are closely related fields within computer science, focusing on creating systems that can learn from data, make decisions, and perform tasks that typically require human intelligence. While AI is the broader concept of machines being able to carry out tasks in a way that we would consider \"smart,\" ML is a subset of AI that involves training algorithms to recognize patterns and make decisions based on data.', 15000.00, 'img/aiml.jpg'),
(9, 'JavaScript Programming', 'Piya Khan from UEM', 'JavaScript Programming is a versatile, high-level scripting language primarily used for creating interactive and dynamic content on the web. It is a core technology of web development alongside HTML and CSS, enabling developers to build rich client-side applications and enhance user experiences.', 8000.00, 'img/javascript.jpg'),
(10, 'UI/UX Design', 'Arnav Ghosh form SNU', 'UI/UX Design involves creating and optimizing the user interface (UI) and user experience (UX) of digital products like websites and apps. UI Design focuses on the visual aspects, such as layout, colors, and interactive elements, ensuring a pleasing appearance. UX Design centers on the overall user journey, emphasizing ease of use, efficiency, and satisfaction. Together, UI/UX Design ensures that digital products are not only visually appealing but also intuitive and enjoyable to interact with.', 699.99, 'uiuxdesign.jpg'),
(11, 'Java Programming', 'Papia Bhowmik from UEM', 'Java is a widely-used, object-oriented programming language known for its platform independence, meaning code written in Java can run on any device with a Java Virtual Machine (JVM). It\'s used to develop a range of applications, from web and mobile apps to enterprise software and large systems. Java\'s syntax is similar to C++, making it accessible to developers with a C background. Its robust libraries, frameworks, and community support make it a popular choice for developers worldwide.', 799.99, 'java.jpg'),
(12, 'SQL Database', 'Subhojit Samanta from UEM', 'Java SQL Database refers to the use of Java programming language to interact with relational databases using SQL (Structured Query Language). Java provides the JDBC (Java Database Connectivity) API, which allows developers to connect to a SQL database, execute SQL queries, and retrieve or manipulate data. This integration enables Java applications to perform tasks like data insertion, retrieval, updating, and deletion in databases, making it essential for building data-driven applications such as web apps, enterprise systems, and desktop applications.', 399.99, 'sql.jpg'),
(13, 'Cloud Computing', 'Ram Kumar from SNU', 'Cloud Computing delivers computing services, including storage, processing, databases, and software, over the internet, allowing businesses to access resources on-demand from providers like AWS, Microsoft Azure, or Google Cloud. It eliminates the need for physical hardware, offering scalability, flexibility, and cost-efficiency. Organizations can quickly deploy applications, manage large datasets, and scale IT resources as needed, making cloud computing a key technology for modern, agile business operations.', 999.99, 'cloudcomputing.jpg'),
(14, 'Project Management', 'Soumik Sarkar from SNU', 'Project Management involves planning, executing, and overseeing projects to meet specific goals within a set timeline and budget. It includes coordinating resources, managing teams, setting objectives, and ensuring tasks are completed effectively. Key elements are defining scope, scheduling, risk management, and communication. Project managers use methodologies like Agile or Waterfall to guide projects from start to finish, ensuring they meet stakeholder expectations and achieve the desired results.', 799.99, 'projectmanagement.jpg'),
(15, 'Business Analytics', 'Pankaj Saha from IEM', 'Business Analytics involves using data analysis and statistical methods to understand and improve business performance. It includes gathering and examining data to identify trends, make forecasts, and support decision-making. By leveraging tools and techniques like data mining, predictive analytics, and data visualization, businesses can uncover insights, optimize operations, and drive strategic decisions. Business Analytics helps organizations make informed choices, enhance efficiency, and gain a competitive edge in the market.', 999.99, 'businessanalytics.jpg'),
(16, 'Data Visualization', 'Arindam Das from IEM', 'Data Visualization is the practice of representing data in graphical formats, such as charts, graphs, and maps, to make complex information more accessible and understandable. It transforms raw data into visual insights, helping users quickly identify patterns, trends, and anomalies. Effective data visualization aids in decision-making by presenting data clearly and intuitively, enabling stakeholders to grasp key insights and make informed choices based on visual representations of data.', 499.99, 'datavisualization.jpg'),
(17, 'Digital Photography', 'Bakul Sarkar from SNU', 'Digital Photography involves capturing images using electronic sensors rather than film. It relies on digital technology to record, store, and manipulate photographs. With digital cameras or smartphones, users can instantly view and edit photos, apply filters, and share them online. Digital photography offers advantages like flexibility, ease of use, and the ability to store large volumes of images. It has revolutionized both professional and amateur photography, making it more accessible and versatile.', 699.99, 'digitalphotography.jpg');

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
