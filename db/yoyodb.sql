-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 09:08 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yoyodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE `errors` (
  `code` int(3) NOT NULL,
  `message` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errors`
--

INSERT INTO `errors` (`code`, `message`, `description`) VALUES
(100, 'Continue', 'The server has received the request headers, and the client should proceed to send the request body'),
(101, 'Switching', 'Protocols	The requester has asked the server to switch protocols'),
(103, 'Checkpoint', 'Used in the resumable requests proposal to resume aborted PUT or POST requests'),
(200, 'OK', 'The request is OK (this is the standard response for successful HTTP requests)'),
(201, 'Created', 'The request has been fulfilled, and a new resource is created '),
(202, 'Accepted', 'The request has been accepted for processing, but the processing has not been completed'),
(203, 'Non-Authoritative', 'Information	The request has been successfully processed, but is returning information that may be from another source'),
(204, 'No Content', 'The request has been successfully processed, but is not returning any content'),
(205, 'Reset Content', 'The request has been successfully processed, but is not returning any content, and requires that the requester reset the document view'),
(206, 'Partial Content', 'The server is delivering only part of the resource due to a range header sent by the client300 Multiple Choices	A link list. The user can select a link and go to that location. Maximum five addresses  '),
(301, 'Moved Permanently', 'The requested page has moved to a new URL '),
(302, 'Found', 'The requested page has moved temporarily to a new URL '),
(303, 'See', 'Other	The requested page can be found under a different URL'),
(304, 'Not', 'Modified	Indicates the requested page has not been modified since last requested'),
(306, 'Switch', 'Proxy	No longer used'),
(307, 'Temporary Redirect', 'The requested page has moved temporarily to a new URL'),
(308, 'Resume Incomplete', 'Used in the resumable requests proposal to resume aborted PUT or POST requests400 Bad Request	The request cannot be fulfilled due to bad syntax'),
(401, 'Unauthorized', 'The request was a legal request, but the server is refusing to respond to it. For use when authentication is possible but has failed or not yet been provided'),
(402, 'Payment Required', 'Reserved for future use'),
(403, 'Forbidden', 'The request was a legal request, but the server is refusing to respond to it'),
(404, 'Not Found', 'The requested page could not be found but may be available again in the future'),
(405, 'Method Not Allowed', 'A request was made of a page using a request method not supported by that page'),
(406, 'Not Acceptable', 'The server can only generate a response that is not accepted by the client'),
(407, 'Proxy Authentication Required', 'The client must first authenticate itself with the proxy'),
(408, 'Request Timeout', 'The server timed out waiting for the request'),
(409, 'Conflict', 'The request could not be completed because of a conflict in the request'),
(410, 'Gone', 'The requested page is no longer available'),
(411, 'Length Required', 'The \"Content-Length\" is not defined. The server will not accept the request without it '),
(412, 'Precondition Failed', 'The precondition given in the request evaluated to false by the server'),
(413, 'Request Entity Too Large', 'The server will not accept the request, because the request entity is too large'),
(414, 'Request-URI Too Long', 'The server will not accept the request, because the URL is too long. Occurs when you convert a POST request to a GET request with a long query information '),
(415, 'Unsupported Media Type', 'The server will not accept the request, because the media type is not supported '),
(416, 'Requested Range Not Satisfiable', 'The client has asked for a portion of the file, but the server cannot supply that portion'),
(417, 'Expectation Failed', 'The server cannot meet the requirements of the Expect request-header field500 Internal Server Error	A generic error message, given when no more specific message is suitable'),
(501, 'Not Implemented', 'The server either does not recognize the request method, or it lacks the ability to fulfill the request'),
(502, 'Bad Gateway', 'The server was acting as a gateway or proxy and received an invalid response from the upstream server'),
(503, 'Service Unavailable', 'The server is currently unavailable (overloaded or down)'),
(504, 'Gateway Timeout', 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server'),
(505, 'HTTP Version Not Supported', 'The server does not support the HTTP protocol version used in the request'),
(511, 'Network Authentication Required', 'The client needs to authenticate to gain network access');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(10) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `categoryId` int(5) NOT NULL,
  `quantity` int(10) NOT NULL,
  `supplierId` int(4) NOT NULL,
  `unitPrice` float NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `categoryId`, `quantity`, `supplierId`, `unitPrice`, `description`) VALUES
(1, 'iwdowh', 1, 126, 1, 57, 'dljfkbsjdkbfkjsbf'),
(2, 'laskak', 3, 107, 1, 6.5, 'sdnksndklsndklsnldn');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `nicORbrn` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierId`, `name`, `Address`, `nicORbrn`) VALUES
(1, 'sjdjsdkl', 'ndsklsndlslk', 'slkndflksnflksn'),
(2, 'lfkjefjlkjl', 'lkjflkdjflkdfj', 'jljeofjpfje[f');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `tp` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `fName`, `lName`, `tp`, `password`, `status`, `type`) VALUES
(1, 'lakmalepp@gmail.com', 'Dimuthu', 'Lakmal', 2147483647, 'd32934b31349d77e70957e057b1bcd28', 1, 1),
(2, 'eapdimuthulakmal98@gmail.com', 'PRABODHA', 'Lakmal', 2147483647, 'a91d644884cefa574c66ca6116273eb6', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
