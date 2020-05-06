-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2016 at 07:19 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_tos`
--

CREATE TABLE IF NOT EXISTS `approved_tos` (
  `approved_tos_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`approved_tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `approved_tos`
--


-- --------------------------------------------------------

--
-- Table structure for table `approved_tq`
--

CREATE TABLE IF NOT EXISTS `approved_tq` (
  `approved_tq_id` int(40) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`approved_tq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `approved_tq`
--


-- --------------------------------------------------------

--
-- Table structure for table `cognitive_level`
--

CREATE TABLE IF NOT EXISTS `cognitive_level` (
  `cognitive_level_id` int(40) NOT NULL AUTO_INCREMENT,
  `knowledge` varchar(50) DEFAULT NULL,
  `comprehension` varchar(50) DEFAULT NULL,
  `application` varchar(50) DEFAULT NULL,
  `analysis` varchar(50) DEFAULT NULL,
  `evaluation` varchar(50) DEFAULT NULL,
  `synthesis` varchar(50) DEFAULT NULL,
  `tos_id` int(11) NOT NULL,
  PRIMARY KEY (`cognitive_level_id`),
  KEY `tos_cognitive_level` (`tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cognitive_level`
--


-- --------------------------------------------------------

--
-- Table structure for table `course_learning_outcomes`
--

CREATE TABLE IF NOT EXISTS `course_learning_outcomes` (
  `CLO_id` int(40) NOT NULL AUTO_INCREMENT,
  `ILO_ID` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`CLO_id`),
  KEY `ILO_course_learning_outcomes` (`ILO_ID`),
  KEY `syllabus_course_learning_outcomes` (`syllabus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course_learning_outcomes`
--

INSERT INTO `course_learning_outcomes` (`CLO_id`, `ILO_ID`, `syllabus_id`) VALUES
(5, 11, 12),
(6, 12, 12),
(7, 22, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cur_subject`
--

CREATE TABLE IF NOT EXISTS `cur_subject` (
  `cs_id` int(11) NOT NULL,
  `eff_id` int(11) NOT NULL,
  `y_id` int(11) NOT NULL,
  PRIMARY KEY (`cs_id`),
  KEY `effectivity_cur_subject` (`eff_id`),
  KEY `year_cur_subject` (`y_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cur_subject`
--

INSERT INTO `cur_subject` (`cs_id`, `eff_id`, `y_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(40) DEFAULT NULL,
  `department_status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_status`) VALUES
(1, 'ITE ', 'Active'),
(2, 'CS', 'Active'),
(3, 'BA', 'Active'),
(4, 'CSNT', 'Inactive'),
(5, 'CSDP', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `effectivity`
--

CREATE TABLE IF NOT EXISTS `effectivity` (
  `eff_id` int(11) NOT NULL,
  `eff_sy` varchar(40) DEFAULT NULL,
  `eff_sem` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`eff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `effectivity`
--

INSERT INTO `effectivity` (`eff_id`, `eff_sy`, `eff_sem`) VALUES
(1, '2016-2017', '1st Semister'),
(2, '2016-2017', '2st Semister'),
(3, '2017-2018', '1nd Semister'),
(4, '2017-2018', '2nd Semister');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_fname` varchar(50) DEFAULT NULL,
  `employee_mname` varchar(50) DEFAULT NULL,
  `employee_lname` varchar(50) DEFAULT NULL,
  `employee_ext` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12009 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_fname`, `employee_mname`, `employee_lname`, `employee_ext`) VALUES
(12000, 'CJ', 'Falgar', 'Falcon', NULL),
(12001, 'Kristi', 'Allen', 'Revelia', NULL),
(12002, 'Joseph', 'Bitangcor', 'Sanjo', 'Jr.'),
(12003, 'Bea', 'Englante', 'Alonzo', NULL),
(12004, 'Mark', 'Aquino', 'Lopes', NULL),
(12005, 'Jenny', 'Ortiz', 'Gadon', NULL),
(12006, 'Marvin', 'Timbol', 'Ervi', NULL),
(12007, 'Ann', 'Acosta', 'Neiri', NULL),
(12008, 'Marco', 'Antonio', 'Gonzales', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE IF NOT EXISTS `employment` (
  `employment_id` int(11) NOT NULL,
  `employment_status` varchar(50) DEFAULT NULL,
  `employment_job_title` varchar(50) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`employment_id`),
  KEY `employees_employment` (`employee_id`),
  KEY `department_employment` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`employment_id`, `employment_status`, `employment_job_title`, `employee_id`, `department_id`) VALUES
(111, 'Active', 'Dean', 12000, 1),
(222, 'Active', 'Program Head', 12001, 1),
(333, 'Active', 'Program Head', 12002, 2),
(444, 'Active', 'Dean', 12003, 3),
(555, 'Active', 'Program Head', 12004, 3),
(666, 'Active', 'Instructor', 12005, 1),
(777, 'Active', 'Instructor', 12006, 2),
(888, 'Active', 'Instructor', 12007, 3),
(999, 'Active', 'Instructor', 12008, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE IF NOT EXISTS `exam_schedule` (
  `exam_schedule_id` int(11) NOT NULL,
  `exam_schedule` date DEFAULT NULL,
  `exam_id` int(40) NOT NULL,
  PRIMARY KEY (`exam_schedule_id`),
  KEY `major_exams_exam_schedule` (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_schedule`
--


-- --------------------------------------------------------

--
-- Table structure for table `ilo`
--

CREATE TABLE IF NOT EXISTS `ilo` (
  `ILO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ILO_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ILO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ilo`
--

INSERT INTO `ilo` (`ILO_ID`, `ILO_description`) VALUES
(11, 'ilo1'),
(12, 'ilo2'),
(13, 'ilo1'),
(14, 'ilo1'),
(15, 'ilo1'),
(16, 'ilo1'),
(17, 'ilo1'),
(18, 'ilo1'),
(19, 'ilo1'),
(20, 'ilo1'),
(21, 'ilo1'),
(22, 'dsf');

-- --------------------------------------------------------

--
-- Table structure for table `major_exams`
--

CREATE TABLE IF NOT EXISTS `major_exams` (
  `exam_id` int(40) NOT NULL AUTO_INCREMENT,
  `exam_period` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `major_exams`
--

INSERT INTO `major_exams` (`exam_id`, `exam_period`) VALUES
(1, 'prelim'),
(2, 'midterm'),
(3, 'prefinal'),
(4, 'final');

-- --------------------------------------------------------

--
-- Table structure for table `pending_tos`
--

CREATE TABLE IF NOT EXISTS `pending_tos` (
  `pending_tos_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pending_tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pending_tos`
--


-- --------------------------------------------------------

--
-- Table structure for table `pending_tq`
--

CREATE TABLE IF NOT EXISTS `pending_tq` (
  `pending_tq_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pending_tq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pending_tq`
--


-- --------------------------------------------------------

--
-- Table structure for table `program_graduate_outcomes`
--

CREATE TABLE IF NOT EXISTS `program_graduate_outcomes` (
  `pgo_id` int(11) NOT NULL AUTO_INCREMENT,
  `graduate_attributes` varchar(100) DEFAULT NULL,
  `graduate_outcome_code` varchar(40) DEFAULT NULL,
  `graduate_outcome_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`pgo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `program_graduate_outcomes`
--

INSERT INTO `program_graduate_outcomes` (`pgo_id`, `graduate_attributes`, `graduate_outcome_code`, `graduate_outcome_description`) VALUES
(1, 'pgo1', 'pgo1', 'pgo1'),
(2, 'pgo2', 'pgo2', 'pgo2');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE IF NOT EXISTS `question_type` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`question_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `question_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `queue_id` int(40) NOT NULL,
  `submission_schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`queue_id`),
  KEY `submission_schedule_queue` (`submission_schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--


-- --------------------------------------------------------

--
-- Table structure for table `revised_tos`
--

CREATE TABLE IF NOT EXISTS `revised_tos` (
  `revised_tos_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`revised_tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `revised_tos`
--


-- --------------------------------------------------------

--
-- Table structure for table `revised_tq`
--

CREATE TABLE IF NOT EXISTS `revised_tq` (
  `revised_tq_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`revised_tq_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `revised_tq`
--


-- --------------------------------------------------------

--
-- Table structure for table `sched_subj`
--

CREATE TABLE IF NOT EXISTS `sched_subj` (
  `ss_id` int(40) NOT NULL AUTO_INCREMENT,
  `employment_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `sem_id` int(40) NOT NULL,
  `sy_id` int(11) NOT NULL,
  PRIMARY KEY (`ss_id`),
  KEY `subject_sched_subj` (`subj_id`),
  KEY `employment_sched_subj` (`employment_id`),
  KEY `semister_sched_subj` (`sem_id`),
  KEY `school_year_sched_subj` (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sched_subj`
--

INSERT INTO `sched_subj` (`ss_id`, `employment_id`, `subj_id`, `sem_id`, `sy_id`) VALUES
(1, 111, 5, 1, 1),
(2, 222, 4, 1, 1),
(3, 333, 6, 1, 1),
(4, 444, 1, 1, 1),
(5, 555, 1, 1, 1),
(6, 666, 5, 1, 1),
(7, 666, 4, 1, 1),
(8, 777, 6, 1, 1),
(9, 777, 4, 1, 1),
(10, 888, 2, 1, 1),
(11, 888, 3, 1, 1),
(12, 999, 2, 1, 1),
(13, 999, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`sy_id`, `sy`) VALUES
(1, '2016-2017'),
(2, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `semister`
--

CREATE TABLE IF NOT EXISTS `semister` (
  `sem_id` int(40) NOT NULL AUTO_INCREMENT,
  `semister` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semister`
--

INSERT INTO `semister` (`sem_id`, `semister`) VALUES
(1, '1st Semister'),
(2, '2nd Semister');

-- --------------------------------------------------------

--
-- Table structure for table `status_report`
--

CREATE TABLE IF NOT EXISTS `status_report` (
  `status_report_id` int(40) NOT NULL,
  `queue_id` int(40) NOT NULL,
  `approved_tq_id` int(40) NOT NULL,
  `approved_tos_id` int(11) NOT NULL,
  `revised_tq_id` int(11) NOT NULL,
  `revised_tos_id` int(11) NOT NULL,
  `pending_tq_id` int(11) NOT NULL,
  `pending_tos_id` int(11) NOT NULL,
  PRIMARY KEY (`status_report_id`),
  KEY `queue_status_report` (`queue_id`),
  KEY `approved_tq_status_report` (`approved_tq_id`),
  KEY `approved_tos_status_report` (`approved_tos_id`),
  KEY `revised_tq_status_report` (`revised_tq_id`),
  KEY `revised_tos_status_report` (`revised_tos_id`),
  KEY `pending_tq_status_report` (`pending_tq_id`),
  KEY `pending_tos_status_report` (`pending_tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_report`
--


-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subj_id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_code` varchar(40) DEFAULT NULL,
  `subj_name` varchar(40) DEFAULT NULL,
  `subj_desc` varchar(40) DEFAULT NULL,
  `cs_id` int(11) NOT NULL,
  PRIMARY KEY (`subj_id`),
  KEY `cur_subject_subject` (`cs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subj_code`, `subj_name`, `subj_desc`, `cs_id`) VALUES
(1, 'cab2', 'Algebra', 'Math', 1),
(2, 'c2b2', 'Physical Education 3', 'Sports', 2),
(3, 'cb2a', 'Communication Skill 1', 'Language', 1),
(4, 'csa1', 'Computer Fundamentals', 'Basic Computer Knowledge', 1),
(5, 'cs4b', 'Internet Technology', 'HMTL', 2),
(6, 'Itea', 'Free Elective 3', 'HP Tester', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE IF NOT EXISTS `subject_info` (
  `subject_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(40) DEFAULT NULL,
  `subject_code` varchar(40) DEFAULT NULL,
  `subject_unit` varchar(40) DEFAULT NULL,
  `pre_requisites` varchar(40) DEFAULT NULL,
  `subject_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`subject_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`subject_info_id`, `subject_name`, `subject_code`, `subject_unit`, `pre_requisites`, `subject_description`) VALUES
(6, 'Physical Education 3', 'c2b2', '3', 'sdfsdf', 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `submission_schedule`
--

CREATE TABLE IF NOT EXISTS `submission_schedule` (
  `submission_schedule_id` int(11) NOT NULL,
  `submission_date` date DEFAULT NULL,
  `remarks` varchar(40) DEFAULT NULL,
  `exam_schedule_id` int(11) NOT NULL,
  `tos_id` int(11) NOT NULL,
  `TQ_id` int(11) NOT NULL,
  PRIMARY KEY (`submission_schedule_id`),
  KEY `exam_schedule_submission_schedule` (`exam_schedule_id`),
  KEY `tos_submission_schedule` (`tos_id`),
  KEY `TestQuestionnaire_submission_schedule` (`TQ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission_schedule`
--


-- --------------------------------------------------------

--
-- Table structure for table `subtopic`
--

CREATE TABLE IF NOT EXISTS `subtopic` (
  `subtopic_id` int(40) NOT NULL AUTO_INCREMENT,
  `subtopic_description` varchar(100) DEFAULT NULL,
  `topics_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subtopic_id`),
  KEY `topics_subtopic` (`topics_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subtopic`
--

INSERT INTO `subtopic` (`subtopic_id`, `subtopic_description`, `topics_id`) VALUES
(8, 'sub1', 6),
(9, 'sub1', 5),
(10, 'sub1', 5),
(11, 'sub1', 5),
(12, 'sub1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE IF NOT EXISTS `super_user` (
  `id` int(40) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`id`, `username`, `password`, `position`) VALUES
(1, 'admin', '1234', 'ADMIN'),
(2, 'print', '1234', 'Printing Incharge');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE IF NOT EXISTS `syllabus` (
  `syllabus_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_info_id` int(11) NOT NULL,
  `ss_id` int(40) NOT NULL,
  PRIMARY KEY (`syllabus_id`),
  KEY `subject_info_syllabus` (`course_info_id`),
  KEY `sched_subj_syllabus` (`ss_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_id`, `course_info_id`, `ss_id`) VALUES
(12, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_pgo`
--

CREATE TABLE IF NOT EXISTS `syllabus_pgo` (
  `spgo_id` int(40) NOT NULL AUTO_INCREMENT,
  `pgo_id` int(11) NOT NULL,
  `syllabus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`spgo_id`),
  KEY `program_graduate_outcomes_syllabus_pgo` (`pgo_id`),
  KEY `syllabus_syllabus_pgo` (`syllabus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `syllabus_pgo`
--

INSERT INTO `syllabus_pgo` (`spgo_id`, `pgo_id`, `syllabus_id`) VALUES
(2, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `testquestionnaire`
--

CREATE TABLE IF NOT EXISTS `testquestionnaire` (
  `TQ_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_description` varchar(100) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `test_number` varchar(40) DEFAULT NULL,
  `date_submitted` date DEFAULT NULL,
  `topics_id` int(11) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `tos_id` int(11) NOT NULL,
  PRIMARY KEY (`TQ_id`),
  KEY `topics_TestQuestionnaire` (`topics_id`),
  KEY `question_type_TestQuestionnaire` (`question_type_id`),
  KEY `tos_TestQuestionnaire` (`tos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `testquestionnaire`
--


-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topics_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_description` varchar(40) NOT NULL,
  `week` varchar(40) DEFAULT NULL,
  `tla` varchar(255) DEFAULT NULL,
  `resources` varchar(255) DEFAULT NULL,
  `oba` varchar(255) DEFAULT NULL,
  `ILO_ID` int(11) NOT NULL,
  `syllabus_id` int(11) NOT NULL,
  `exam_id` int(40) NOT NULL,
  PRIMARY KEY (`topics_id`),
  KEY `ILO_topics` (`ILO_ID`),
  KEY `syllabus_topics` (`syllabus_id`),
  KEY `major_exams_topics` (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topics_id`, `topic_description`, `week`, `tla`, `resources`, `oba`, `ILO_ID`, `syllabus_id`, `exam_id`) VALUES
(5, 'topic2', '1', 'sdf', 'sdf', 'sdf', 11, 12, 1),
(6, 'topic1', '2', 'tla1', 'res1', 'oba1', 12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tos`
--

CREATE TABLE IF NOT EXISTS `tos` (
  `tos_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_submitted` date DEFAULT NULL,
  `semester` varchar(40) DEFAULT NULL,
  `sy` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `total_enrolled_students` int(11) DEFAULT NULL,
  `subject_info_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  PRIMARY KEY (`tos_id`),
  KEY `subject_info_tos` (`subject_info_id`),
  KEY `topics_tos` (`topics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tos`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit_lab`
--

CREATE TABLE IF NOT EXISTS `unit_lab` (
  `ulab_id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_id` int(11) NOT NULL,
  PRIMARY KEY (`ulab_id`),
  KEY `subject_unit_lab` (`subj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `unit_lab`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit_lecture`
--

CREATE TABLE IF NOT EXISTS `unit_lecture` (
  `ulec_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(40) DEFAULT NULL,
  `subj_id` int(11) NOT NULL,
  PRIMARY KEY (`ulec_id`),
  KEY `subject_unit_lecture` (`subj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `unit_lecture`
--

INSERT INTO `unit_lecture` (`ulec_id`, `unit`, `subj_id`) VALUES
(1, '3', 1),
(2, '3', 2),
(3, '3', 3),
(4, '3', 4),
(5, '3', 5),
(6, '3', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `user_id1` int(11) DEFAULT NULL,
  `syllabus` varchar(40) DEFAULT NULL,
  `tq` varchar(40) DEFAULT NULL,
  `notification` varchar(40) DEFAULT NULL,
  `queue` varchar(40) DEFAULT NULL,
  `reports` varchar(40) DEFAULT NULL,
  `setdate` varchar(40) DEFAULT NULL,
  `employment_id` int(11) NOT NULL,
  `id` int(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `employment_user_access` (`employment_id`),
  KEY `super_user_user_access` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`user_id`, `username`, `password`, `position`, `user_id1`, `syllabus`, `tq`, `notification`, `queue`, `reports`, `setdate`, `employment_id`, `id`) VALUES
(6, 'jyde', '1234', 'Instructor', NULL, 'checked', 'checked', '', '', '', '', 888, 1);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `y_id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`y_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`y_id`, `year`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cognitive_level`
--
ALTER TABLE `cognitive_level`
  ADD CONSTRAINT `tos_cognitive_level` FOREIGN KEY (`tos_id`) REFERENCES `tos` (`tos_id`);

--
-- Constraints for table `course_learning_outcomes`
--
ALTER TABLE `course_learning_outcomes`
  ADD CONSTRAINT `ILO_course_learning_outcomes` FOREIGN KEY (`ILO_ID`) REFERENCES `ilo` (`ILO_ID`),
  ADD CONSTRAINT `syllabus_course_learning_outcomes` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

--
-- Constraints for table `cur_subject`
--
ALTER TABLE `cur_subject`
  ADD CONSTRAINT `year_cur_subject` FOREIGN KEY (`y_id`) REFERENCES `year` (`y_id`),
  ADD CONSTRAINT `effectivity_cur_subject` FOREIGN KEY (`eff_id`) REFERENCES `effectivity` (`eff_id`);

--
-- Constraints for table `employment`
--
ALTER TABLE `employment`
  ADD CONSTRAINT `department_employment` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `employees_employment` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD CONSTRAINT `major_exams_exam_schedule` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`);

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `submission_schedule_queue` FOREIGN KEY (`submission_schedule_id`) REFERENCES `submission_schedule` (`submission_schedule_id`);

--
-- Constraints for table `sched_subj`
--
ALTER TABLE `sched_subj`
  ADD CONSTRAINT `school_year_sched_subj` FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`),
  ADD CONSTRAINT `employment_sched_subj` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`),
  ADD CONSTRAINT `semister_sched_subj` FOREIGN KEY (`sem_id`) REFERENCES `semister` (`sem_id`),
  ADD CONSTRAINT `subject_sched_subj` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

--
-- Constraints for table `status_report`
--
ALTER TABLE `status_report`
  ADD CONSTRAINT `pending_tos_status_report` FOREIGN KEY (`pending_tos_id`) REFERENCES `pending_tos` (`pending_tos_id`),
  ADD CONSTRAINT `approved_tos_status_report` FOREIGN KEY (`approved_tos_id`) REFERENCES `approved_tos` (`approved_tos_id`),
  ADD CONSTRAINT `approved_tq_status_report` FOREIGN KEY (`approved_tq_id`) REFERENCES `approved_tq` (`approved_tq_id`),
  ADD CONSTRAINT `pending_tq_status_report` FOREIGN KEY (`pending_tq_id`) REFERENCES `pending_tq` (`pending_tq_id`),
  ADD CONSTRAINT `queue_status_report` FOREIGN KEY (`queue_id`) REFERENCES `queue` (`queue_id`),
  ADD CONSTRAINT `revised_tos_status_report` FOREIGN KEY (`revised_tos_id`) REFERENCES `revised_tos` (`revised_tos_id`),
  ADD CONSTRAINT `revised_tq_status_report` FOREIGN KEY (`revised_tq_id`) REFERENCES `revised_tq` (`revised_tq_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `cur_subject_subject` FOREIGN KEY (`cs_id`) REFERENCES `cur_subject` (`cs_id`);

--
-- Constraints for table `submission_schedule`
--
ALTER TABLE `submission_schedule`
  ADD CONSTRAINT `TestQuestionnaire_submission_schedule` FOREIGN KEY (`TQ_id`) REFERENCES `testquestionnaire` (`TQ_id`),
  ADD CONSTRAINT `exam_schedule_submission_schedule` FOREIGN KEY (`exam_schedule_id`) REFERENCES `exam_schedule` (`exam_schedule_id`),
  ADD CONSTRAINT `tos_submission_schedule` FOREIGN KEY (`tos_id`) REFERENCES `tos` (`tos_id`);

--
-- Constraints for table `subtopic`
--
ALTER TABLE `subtopic`
  ADD CONSTRAINT `topics_subtopic` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `sched_subj_syllabus` FOREIGN KEY (`ss_id`) REFERENCES `sched_subj` (`ss_id`),
  ADD CONSTRAINT `subject_info_syllabus` FOREIGN KEY (`course_info_id`) REFERENCES `subject_info` (`subject_info_id`);

--
-- Constraints for table `syllabus_pgo`
--
ALTER TABLE `syllabus_pgo`
  ADD CONSTRAINT `program_graduate_outcomes_syllabus_pgo` FOREIGN KEY (`pgo_id`) REFERENCES `program_graduate_outcomes` (`pgo_id`),
  ADD CONSTRAINT `syllabus_syllabus_pgo` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

--
-- Constraints for table `testquestionnaire`
--
ALTER TABLE `testquestionnaire`
  ADD CONSTRAINT `tos_TestQuestionnaire` FOREIGN KEY (`tos_id`) REFERENCES `tos` (`tos_id`),
  ADD CONSTRAINT `question_type_TestQuestionnaire` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`question_type_id`),
  ADD CONSTRAINT `topics_TestQuestionnaire` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `major_exams_topics` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`),
  ADD CONSTRAINT `ILO_topics` FOREIGN KEY (`ILO_ID`) REFERENCES `ilo` (`ILO_ID`),
  ADD CONSTRAINT `syllabus_topics` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

--
-- Constraints for table `tos`
--
ALTER TABLE `tos`
  ADD CONSTRAINT `topics_tos` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`),
  ADD CONSTRAINT `subject_info_tos` FOREIGN KEY (`subject_info_id`) REFERENCES `subject_info` (`subject_info_id`);

--
-- Constraints for table `unit_lab`
--
ALTER TABLE `unit_lab`
  ADD CONSTRAINT `subject_unit_lab` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

--
-- Constraints for table `unit_lecture`
--
ALTER TABLE `unit_lecture`
  ADD CONSTRAINT `subject_unit_lecture` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

--
-- Constraints for table `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `super_user_user_access` FOREIGN KEY (`id`) REFERENCES `super_user` (`id`),
  ADD CONSTRAINT `employment_user_access` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`);
