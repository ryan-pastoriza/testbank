/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : testbank

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-07-15 14:44:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for access_log
-- ----------------------------
DROP TABLE IF EXISTS `access_log`;
CREATE TABLE `access_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_desc` varchar(50) DEFAULT NULL,
  `employment_id` int(11) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `employment_access_log` (`employment_id`),
  CONSTRAINT `employment_access_log` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of access_log
-- ----------------------------

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `cols` int(11) DEFAULT NULL,
  `answer_desc` text,
  `answer_attach` varchar(100) DEFAULT NULL,
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `TestQuestions_answer` (`q_id`),
  CONSTRAINT `TestQuestions_answer` FOREIGN KEY (`q_id`) REFERENCES `testquestions` (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('1', null, 'dfgdfg', '', '244');
INSERT INTO `answer` VALUES ('2', null, 'dfgdfg', '', '245');
INSERT INTO `answer` VALUES ('3', null, 'sdfgdfg', '', '246');
INSERT INTO `answer` VALUES ('4', null, 'dfgdfgdfg', '', '247');
INSERT INTO `answer` VALUES ('5', null, 'sfgdfgdf', '', '248');
INSERT INTO `answer` VALUES ('6', null, 'gfhgfhfgh', '', '249');

-- ----------------------------
-- Table structure for answer_choices
-- ----------------------------
DROP TABLE IF EXISTS `answer_choices`;
CREATE TABLE `answer_choices` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_choice_desc` varchar(255) DEFAULT NULL,
  `choice_attach` varchar(255) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ac_id`),
  KEY `TestQuestions_answer_choices` (`q_id`),
  CONSTRAINT `TestQuestions_answer_choices` FOREIGN KEY (`q_id`) REFERENCES `testquestions` (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of answer_choices
-- ----------------------------

-- ----------------------------
-- Table structure for author
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `syllabus_id` int(11) DEFAULT NULL,
  `main_author` varchar(40) DEFAULT NULL,
  `co_author` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`author_id`),
  KEY `syllabus_author` (`syllabus_id`),
  CONSTRAINT `syllabus_author` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of author
-- ----------------------------

-- ----------------------------
-- Table structure for clo_ilo
-- ----------------------------
DROP TABLE IF EXISTS `clo_ilo`;
CREATE TABLE `clo_ilo` (
  `clo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cloc` text,
  `clod` text,
  `clo_datetime` datetime DEFAULT NULL,
  `revise` varchar(40) DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`clo_id`),
  KEY `syllabus_clo_ilo` (`syllabus_id`),
  CONSTRAINT `syllabus_clo_ilo` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clo_ilo
-- ----------------------------
INSERT INTO `clo_ilo` VALUES ('64', 'none', 'CLO1', '2019-04-29 11:17:18', '0', '101');

-- ----------------------------
-- Table structure for cognitive_level
-- ----------------------------
DROP TABLE IF EXISTS `cognitive_level`;
CREATE TABLE `cognitive_level` (
  `cognitive_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `cognitive_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cognitive_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cognitive_level
-- ----------------------------
INSERT INTO `cognitive_level` VALUES ('1', 'Knowledge');
INSERT INTO `cognitive_level` VALUES ('2', 'Comprehension');
INSERT INTO `cognitive_level` VALUES ('3', 'Application');
INSERT INTO `cognitive_level` VALUES ('4', 'Analysis');
INSERT INTO `cognitive_level` VALUES ('5', 'Evaluation');
INSERT INTO `cognitive_level` VALUES ('6', 'Synthesis');

-- ----------------------------
-- Table structure for conversation
-- ----------------------------
DROP TABLE IF EXISTS `conversation`;
CREATE TABLE `conversation` (
  `conver_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_two` int(11) DEFAULT NULL,
  PRIMARY KEY (`conver_id`),
  KEY `user_access_conversation` (`user_id`),
  CONSTRAINT `user_access_conversation` FOREIGN KEY (`user_id`) REFERENCES `user_access` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of conversation
-- ----------------------------
INSERT INTO `conversation` VALUES ('52', '62', '58');

-- ----------------------------
-- Table structure for course_req
-- ----------------------------
DROP TABLE IF EXISTS `course_req`;
CREATE TABLE `course_req` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_output` varchar(40) DEFAULT NULL,
  `cr_desc` text,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `syllabus_course_req` (`syllabus_id`),
  CONSTRAINT `syllabus_course_req` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of course_req
-- ----------------------------
INSERT INTO `course_req` VALUES ('42', 'dd', 'dd', '101');
INSERT INTO `course_req` VALUES ('43', 'ss', 'ss', '101');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(40) DEFAULT NULL,
  `department_status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('13', 'ITE', 'active');
INSERT INTO `department` VALUES ('14', 'Human Resources ', 'active');
INSERT INTO `department` VALUES ('15', 'Business Development - Engtech', 'active');
INSERT INTO `department` VALUES ('16', 'Finance and Accounting', 'active');
INSERT INTO `department` VALUES ('17', 'Information Technology', 'active');
INSERT INTO `department` VALUES ('18', 'Non Teaching - OSAS', 'active');
INSERT INTO `department` VALUES ('19', 'Non Teaching - Registrar', 'active');
INSERT INTO `department` VALUES ('20', 'Non Teaching - Library', 'active');
INSERT INTO `department` VALUES ('21', 'BA', 'active');
INSERT INTO `department` VALUES ('22', 'SHS', 'active');
INSERT INTO `department` VALUES ('23', 'School Director\'s Office', 'active');
INSERT INTO `department` VALUES ('24', 'Research and Development Office', 'active');
INSERT INTO `department` VALUES ('25', 'Quality Management System Office', 'active');
INSERT INTO `department` VALUES ('26', 'Marketing Department', 'active');
INSERT INTO `department` VALUES ('27', 'School Administrator\'s Office', 'active');
INSERT INTO `department` VALUES ('28', 'M.D office', 'active');
INSERT INTO `department` VALUES ('29', 'TVET Department', 'active');
INSERT INTO `department` VALUES ('30', 'Property and Assets', 'active');
INSERT INTO `department` VALUES ('31', 'GEN', 'active');

-- ----------------------------
-- Table structure for doc_info
-- ----------------------------
DROP TABLE IF EXISTS `doc_info`;
CREATE TABLE `doc_info` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `revision` varchar(40) DEFAULT NULL,
  `effectivity` varchar(40) DEFAULT NULL,
  `version` varchar(40) DEFAULT NULL,
  `qms` varchar(40) DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  `curriculum` varchar(50) DEFAULT NULL,
  `revision_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`doc_id`),
  KEY `syllabus_doc_info` (`syllabus_id`),
  CONSTRAINT `syllabus_doc_info` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doc_info
-- ----------------------------
INSERT INTO `doc_info` VALUES ('52', null, null, null, null, '101', 'ddd', 'ddd');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `employee_id` varchar(150) NOT NULL,
  `employee_fname` varchar(50) DEFAULT NULL,
  `employee_mname` varchar(50) DEFAULT NULL,
  `employee_lname` varchar(50) DEFAULT NULL,
  `employee_ext` varchar(40) DEFAULT NULL,
  `employee_mobile` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('BNT-2016-0362', 'Noreen ', 'Bilaoen', 'Fuentes', '', '09209644559');
INSERT INTO `employees` VALUES ('BTN -2017-384', 'Kim', 'Hofilena', 'Telarma', '', '09328710639');
INSERT INTO `employees` VALUES ('BTN- 2010-0128', 'Jovanni', 'Gaite', 'Bayawa', '', '9285595074');
INSERT INTO `employees` VALUES ('BTN- 2012-0175', 'Michelle', 'Tigas', 'Yamit', '', '09472302221');
INSERT INTO `employees` VALUES ('BTN- 2016-0347', 'Neca ', 'Cabredas ', 'Dandanon ', '', '');
INSERT INTO `employees` VALUES ('BTN-1997-0001', 'Daniel', 'Defensor', 'Sanchez', '', '');
INSERT INTO `employees` VALUES ('BTN-1997-0002', 'Eldie', 'Dela Torrie', 'Encarnado ', '', '09487965173');
INSERT INTO `employees` VALUES ('BTN-1998-0004', 'Alan', 'Leopoldo', 'Atega', '', '');
INSERT INTO `employees` VALUES ('BTN-1998-0005', 'Jennifer', 'Porras', 'Calucin', '', '09206664964');
INSERT INTO `employees` VALUES ('BTN-1999-0008', 'Jonathan', 'Bucao', 'Torotoro', '', '9195678957');
INSERT INTO `employees` VALUES ('BTN-2003-0010', 'Jinky', 'De Gracia ', 'Rizaldo', '', '');
INSERT INTO `employees` VALUES ('BTN-2005-0013', 'Leojandro', 'Acosta', 'Estenzo', '', '9995956247');
INSERT INTO `employees` VALUES ('BTN-2006-0019', 'Giovanni', 'Caruzca', 'Mamogay', '', '9293242249');
INSERT INTO `employees` VALUES ('BTN-2007-0038', 'Rolando', 'Morgadez', 'Precioso', '', '9484771563');
INSERT INTO `employees` VALUES ('BTN-2008-0058', 'Antonio', 'Gamele', 'Valcorza', 'Jr.', '9187156754');
INSERT INTO `employees` VALUES ('BTN-2009-0061', 'Maria Consuelo', 'Bequibel', 'Sandigan', '', '');
INSERT INTO `employees` VALUES ('BTN-2009-0071', 'Aljon', 'Pabia', 'Ampo', '', '09082138405');
INSERT INTO `employees` VALUES ('BTN-2010-0142', 'Zelmar', 'Carriedo', 'Obediente', '', '9089800697');
INSERT INTO `employees` VALUES ('BTN-2010-0148', 'Jose Roberto', 'Sanchez', 'Lastimoso', '', '9285246283');
INSERT INTO `employees` VALUES ('BTN-2011-0160', 'Mia Jilla', 'Clarin', 'Lastimoso', '', '9177433364');
INSERT INTO `employees` VALUES ('BTN-2011-0162', 'Ryan', 'Horcajo', 'Pastoriza', '', '9098757676');
INSERT INTO `employees` VALUES ('BTN-2011-0163', 'Keen Albelou', 'Bernandez', 'Garrido', '', '9173119344');
INSERT INTO `employees` VALUES ('BTN-2011-0171', 'Elizabeth', 'Imbo', 'Rañada', '', '9485784139');
INSERT INTO `employees` VALUES ('BTN-2011-0172', 'Richard', 'Nojapa', 'Monin', '', '9498162073');
INSERT INTO `employees` VALUES ('BTN-2012-0173', 'Jovannie', 'Payac', 'Ecleo', '', '09189429320');
INSERT INTO `employees` VALUES ('BTN-2012-0184', 'Junel', 'Orias', 'Deligero', '', '9208620074');
INSERT INTO `employees` VALUES ('BTN-2012-0189', 'Adeline', 'Amorado', 'Constante', '', '');
INSERT INTO `employees` VALUES ('BTN-2012-0190', 'Celito', 'Sanchez', 'Jorban', '', '09127055689');
INSERT INTO `employees` VALUES ('BTN-2012-0194', 'Presiosa', 'Serrano', 'Plaza', '', '9479236192');
INSERT INTO `employees` VALUES ('BTN-2012-0212', 'Karen Kate ', 'Buendia', 'Seronay', '', '9351782557');
INSERT INTO `employees` VALUES ('BTN-2012-0213', 'Ian Jay', 'Castorico', 'Broñola', '', '09361085963');
INSERT INTO `employees` VALUES ('BTN-2013-0215', 'Jane Francis', 'Acevedo', 'Jaictin', '', '9309240914');
INSERT INTO `employees` VALUES ('BTN-2013-0216', 'Gina', 'Llegado', 'Sanchez', '', '9262599634');
INSERT INTO `employees` VALUES ('BTN-2013-0235', 'John Edward', 'Golez', 'Malazarte', '', '9994407363');
INSERT INTO `employees` VALUES ('BTN-2013-0239', 'Vie', 'Plaza', 'Pujadas', '', '9483103112');
INSERT INTO `employees` VALUES ('BTN-2013-0241', 'April Jane', 'Maderal', 'Torralba', '', '9185450869');
INSERT INTO `employees` VALUES ('BTN-2013-0249', 'Rex', 'Tuyak', 'Jamen', '', '9302378723');
INSERT INTO `employees` VALUES ('BTN-2013-0250', 'Jocelyn', 'Dispo', 'Ramos', '', '9491464250');
INSERT INTO `employees` VALUES ('BTN-2013-0255', 'Niño', 'Burias', 'Jabagat', '', '9306068627');
INSERT INTO `employees` VALUES ('BTN-2013-0257', 'Joel', 'Loayon', 'Bernadez', '', '9083851402');
INSERT INTO `employees` VALUES ('BTN-2014-0259', 'Lampel', 'Baclaan', 'Berol', '', '9079395581');
INSERT INTO `employees` VALUES ('BTN-2014-0268', 'James Brian', 'Morales', 'Sanchez', '', '9178247345');
INSERT INTO `employees` VALUES ('BTN-2014-0271', 'Cristopher', 'Cagadas', 'Abalorio', '', '091013999964');
INSERT INTO `employees` VALUES ('BTN-2014-0278', 'Marilyn Rose', 'Dispo', 'Azura', '', '9199911994');
INSERT INTO `employees` VALUES ('BTN-2014-0284', 'Kevin', 'Plaza', 'Fajardo', '', '9497092177');
INSERT INTO `employees` VALUES ('BTN-2014-147', 'Daisyrelle', 'Palarca', 'Cuñado', '', '9399344014');
INSERT INTO `employees` VALUES ('BTN-2015- 0314', 'Zuseth', 'Pableo', 'Allen', '', '9175721022');
INSERT INTO `employees` VALUES ('BTN-2015-0285', 'Daryll', 'Alingasa', 'Cabagay', '', '946382604');
INSERT INTO `employees` VALUES ('BTN-2015-0298', 'Roda Jean ', 'Durango', 'Patiño', '', '9122706070');
INSERT INTO `employees` VALUES ('BTN-2015-0302', 'Eden', 'Obguia', 'Perez', '', '9092125821');
INSERT INTO `employees` VALUES ('BTN-2015-0306', 'Princess Rubelyn', 'Apat', 'Obina', '', '9489309888');
INSERT INTO `employees` VALUES ('BTN-2015-0312', 'Gabriel Adolfo', 'Canon', 'Malbas', '', '9468148882');
INSERT INTO `employees` VALUES ('BTN-2015-0313', 'Sheryl', 'Cardines', 'Bullanday', '', '9355948117');
INSERT INTO `employees` VALUES ('BTN-2015-0315', 'Divine Grace ', 'Ano-os', 'Romaguera', '', '9308021071');
INSERT INTO `employees` VALUES ('BTN-2015-0903', 'Jackilyn', 'Antiga', 'Quiño', '', '9092037773');
INSERT INTO `employees` VALUES ('BTN-2016-0315', 'Junell', 'Tejero', 'Bojocan', '', '9062459106');
INSERT INTO `employees` VALUES ('BTN-2016-0316', 'Reggie', 'Jamisola', 'Consigna', '', '09097960306');
INSERT INTO `employees` VALUES ('BTN-2016-0317', 'Margeve', 'Delen', 'Agravante', '', '9187409159');
INSERT INTO `employees` VALUES ('BTN-2016-0318', 'Lubertmay', 'Bernandez', 'Garrido', '', '9306548628');
INSERT INTO `employees` VALUES ('BTN-2016-0319', 'Don', 'Botoy', 'Del Rosario', '', '9488880943');
INSERT INTO `employees` VALUES ('BTN-2016-0320', 'Chris', 'Fordan', 'Olivo', '', '9465274935');
INSERT INTO `employees` VALUES ('BTN-2016-0321', 'Robert', 'Lara', 'Castro', '', '9778136587');
INSERT INTO `employees` VALUES ('BTN-2016-0322', 'Suzzette', 'Moreno', 'Sodijana', '', '9207455910');
INSERT INTO `employees` VALUES ('BTN-2016-0323', 'Mariel', 'Denoyo', 'Banosan', '', '09480181925');
INSERT INTO `employees` VALUES ('BTN-2016-0324', 'Rei Psalm', 'Malazarte', 'Susana', '', '9983225290');
INSERT INTO `employees` VALUES ('BTN-2016-0325', 'Catherine', 'Redoble', 'Largo', '', '9466400505');
INSERT INTO `employees` VALUES ('BTN-2016-0326', 'Brian', 'Villacampa', 'Moral', '', '9126324779');
INSERT INTO `employees` VALUES ('BTN-2016-0327', 'Zusmitha Jean', 'Gorne', 'Maturan', '', '912532468');
INSERT INTO `employees` VALUES ('BTN-2016-0328', 'Mario', 'Bersabal', 'Caday', '', '9501886860');
INSERT INTO `employees` VALUES ('BTN-2016-0329', 'Zessa Mee', '.', 'Neñiza', '', '9305082985');
INSERT INTO `employees` VALUES ('BTN-2016-0330', 'Archel', 'Bonotan', 'Cabañas', '', '');
INSERT INTO `employees` VALUES ('BTN-2016-0331', 'Jenalyn', 'Lara', 'Castro', '', '9289670615');
INSERT INTO `employees` VALUES ('BTN-2016-0332', 'Zenette', 'Tabilon', 'Abeira', '', '9071476860');
INSERT INTO `employees` VALUES ('BTN-2016-0333', 'Dwight', 'Bilaven', 'Fuentes', '', '09157991341');
INSERT INTO `employees` VALUES ('BTN-2016-0334 ', 'Rhea Jean ', 'Gamutan', 'Belsondra', '', '09076709100');
INSERT INTO `employees` VALUES ('BTN-2016-0335', 'Norme Fe', 'Belisario', 'Relos', '', '09501472987');
INSERT INTO `employees` VALUES ('BTN-2016-0336', 'Jessirie Ann ', 'Papa', 'Potente', '', '');
INSERT INTO `employees` VALUES ('BTN-2016-0337', 'Gladys Gay ', 'Rulite', 'Alcuizar', '', '09489886175');
INSERT INTO `employees` VALUES ('BTN-2016-0338', 'Mark Clinton', 'Gavino', 'Chavez', '', '09091048790');
INSERT INTO `employees` VALUES ('BTN-2016-0339', 'Junmark', 'Ascares', 'Facundo', '', '09463072072');
INSERT INTO `employees` VALUES ('BTN-2016-0340', 'Jessamy ', 'Jimenea', 'Ruales', '', '09153478495');
INSERT INTO `employees` VALUES ('BTN-2016-0341', 'James Cloyd', 'Madrid', 'Bustillo', '', '09166163326');
INSERT INTO `employees` VALUES ('BTN-2016-0342', 'Jessa Mae', 'Barrientos', 'Faunillan', '', '09109755010');
INSERT INTO `employees` VALUES ('BTN-2016-0343', 'Jackelou', 'Mapa', 'Madlos', '', '09257992780');
INSERT INTO `employees` VALUES ('BTN-2016-0344', 'January Lynn', 'Abao', 'De Benito', '', '09758730386');
INSERT INTO `employees` VALUES ('BTN-2016-0345', 'Richmond', 'Cultura', 'Jabla', '', '09094035834');
INSERT INTO `employees` VALUES ('BTN-2016-0346', 'Rhenie', 'Pelubeda', 'Tagoloan', '', '09287225770');
INSERT INTO `employees` VALUES ('BTN-2016-0348', 'Carla Marie ', 'Francisco ', 'Campana ', '', '0977651853');
INSERT INTO `employees` VALUES ('BTN-2016-0349', 'Rolando Santiago', '.', 'Ferrer', '', '09');
INSERT INTO `employees` VALUES ('BTN-2016-0350', 'Jerry', 'Lelis', 'Bual', '', '9187709774');
INSERT INTO `employees` VALUES ('BTN-2016-0351', 'Adonis', 'Pamploma', 'Umipig', '', '09073966830');
INSERT INTO `employees` VALUES ('BTN-2016-0352', 'Sandra', 'Magno', 'Dispo', '', '09203185838');
INSERT INTO `employees` VALUES ('BTN-2016-0353', 'Leonardo', 'Libay', 'Empuesto', '', '09096174614');
INSERT INTO `employees` VALUES ('BTN-2016-0354', 'Ian Dale', 'Paradiang', 'Blanco', '', '09486161146');
INSERT INTO `employees` VALUES ('BTn-2016-0355', 'Karl Irvin', 'Angao', 'Monteadora', '', '09461103499');
INSERT INTO `employees` VALUES ('BTN-2016-0356', 'Kim Joshua ', '.', 'Macuno', '', '09101048820');
INSERT INTO `employees` VALUES ('BTN-2016-0357', 'Ariel', 'Laganao', 'Vertudes', '', '');
INSERT INTO `employees` VALUES ('BTN-2016-0358', 'Arnel', 'Mandabon', 'Cortez', '', '');
INSERT INTO `employees` VALUES ('BTN-2016-0359', 'Crescil Joy', 'Ranoco', 'Dogmoc', '', '09487340063');
INSERT INTO `employees` VALUES ('BTN-2016-0360', 'Brenda Czarizza Joy ', 'Toral', 'Torres', '', '091248213665');
INSERT INTO `employees` VALUES ('BTN-2016-0361', ' Joven ', 'Rodriguez', 'Lanes', '', '09074981248');
INSERT INTO `employees` VALUES ('BTN-2016-0363', 'Jimms', 'Conde', 'Manlapaz', '', '09984042424');
INSERT INTO `employees` VALUES ('BTN-2016-0364', 'Erlyn', 'Centro', 'Bacoy', '', '09099155876');
INSERT INTO `employees` VALUES ('BTN-2016-1360', 'Katherine Mae ', 'Magno', 'Avila ', '', '09277870165');
INSERT INTO `employees` VALUES ('BTN-2016-1365', 'Ijean', '.', 'Codaste', '.', '0909');
INSERT INTO `employees` VALUES ('BTN-2017-0366', 'Jayson', 'Pangalay ', 'Amper', '', '09465723463');
INSERT INTO `employees` VALUES ('BTN-2017-0367', 'Crystal Lyn ', 'Limbaga', 'Apat', '', '09094033343');
INSERT INTO `employees` VALUES ('BTN-2017-0368', 'Isaiah', 'Escorpeso', 'Napone ', '', '09505998056');
INSERT INTO `employees` VALUES ('BTN-2017-0369', 'Christian Mar', 'Libando', 'Goyo', '', '09094220222');
INSERT INTO `employees` VALUES ('BTN-2017-0370', 'Jay ', 'Unanon', 'Dela Calzada', '', '09482967180');
INSERT INTO `employees` VALUES ('BTN-2017-0371', 'Joanna Marie ', 'Abastillas ', 'Lomanta ', '', '09470549410');
INSERT INTO `employees` VALUES ('BTN-2017-0372', 'Quine Jean ', 'Dulhao', 'Silao', '', '09464630502');
INSERT INTO `employees` VALUES ('BTN-2017-0373', 'Honey Grace ', 'Sagetarios', 'Regala', '', '09502185675');
INSERT INTO `employees` VALUES ('BTN-2017-0374', 'Roselyn', 'Manseguiao', 'Galinato', '', '09753018850');
INSERT INTO `employees` VALUES ('BTN-2017-0376', 'Wendelyn', 'Pedroso', 'Credo', '', '09270244542');
INSERT INTO `employees` VALUES ('BTN-2017-0377', 'Christian', 'Pesao', 'Tong-alan', '', '09123861609');
INSERT INTO `employees` VALUES ('BTN-2017-0378', 'Jeanefer', 'Acosta', 'Domingo', '', '09210349486');
INSERT INTO `employees` VALUES ('BTN-2017-0379', 'Delia', 'Gonzaga', 'Monterde', '', '09302419721');
INSERT INTO `employees` VALUES ('BTN-2017-0381', 'Jyde', 'Kapunan', 'Lacuesta', '', '09951291190');
INSERT INTO `employees` VALUES ('BTN-2017-0385', 'Emildan', 'Macawile', 'Gastardo', '', '09391901622');
INSERT INTO `employees` VALUES ('BTN-2017-0386', 'Medralyn ', 'Betanghol ', 'Milloria ', '', '09219226016');
INSERT INTO `employees` VALUES ('BTN-2017-0387', 'Bryan Jecie ', 'Taboada', 'Bahala', '', '09104045563');
INSERT INTO `employees` VALUES ('BTN-2017-0388', 'SHIELA ', 'EDER', 'PAJUYO', '', '09468815934');
INSERT INTO `employees` VALUES ('BTN-2017-0397', 'Jojean Marie', 'Dela Cruz', 'Pondang ', '', '');
INSERT INTO `employees` VALUES ('BTN-2017-1371', 'Catty Joy ', 'Lusica', 'Varona', '', '09092743027');
INSERT INTO `employees` VALUES ('BTN-2017-382', 'Michelle', 'Comillas', 'Elape', '', '09108070683');
INSERT INTO `employees` VALUES ('BTN-2017-383', 'Jabez Ian Chris', 'Delfin', 'Peñalver', '', '09469006448');
INSERT INTO `employees` VALUES ('BTN-2017-389', 'Juris Danielle', 'Ajero', 'Telen', '', '09487074504');
INSERT INTO `employees` VALUES ('BTN-2017-390', 'Richardson', 'Egagamao', 'Tantoy', '', '09486280404');
INSERT INTO `employees` VALUES ('BTN-2017-391', 'Louise Lou', 'Adem', 'Uayan', '', '09357723708');
INSERT INTO `employees` VALUES ('BTN-2017-392', 'Francis Louie', 'Claro', 'Rebleza', '', '09302375034');
INSERT INTO `employees` VALUES ('BTN-2017-393', 'Ricky', '', 'Mendeja', '', '');
INSERT INTO `employees` VALUES ('BTN-2017-394', 'Marven', '', 'Visitacion', '', '');
INSERT INTO `employees` VALUES ('BTN-2017-395', 'Reymundo', '', 'Bernales', '', '');
INSERT INTO `employees` VALUES ('BTN-2017-396', 'Randy', '', 'Pielago', '', '');
INSERT INTO `employees` VALUES ('BTN-2017-6703', 'Normia', 'Cabugatan ', 'Ampaso', '', '09093382583');
INSERT INTO `employees` VALUES ('BTN-2018-03100', 'Jessa', 'Barriga', 'Mellosa', '', '09154961434');
INSERT INTO `employees` VALUES ('BTN-2018-03101', 'Joel', 'Chaves', 'Trillo', '', '09483653065');
INSERT INTO `employees` VALUES ('BTN-2018-03102', 'Cliff Rochie ', 'Sering', 'Miranda', '', '09382106831');
INSERT INTO `employees` VALUES ('BTN-2018-03103', 'Crecensio', 'Cata-ag', 'Cabuga', 'Jr', '09092055777');
INSERT INTO `employees` VALUES ('BTN-2018-03104', 'Mary Jane ', 'Rodriguez', 'Papa', '', '09187173532');
INSERT INTO `employees` VALUES ('BTN-2018-03105', 'Knoe Jhen', 'Ami', 'Autor', '', '09309063548');
INSERT INTO `employees` VALUES ('BTN-2018-03106', 'Rey', 'Duyog', 'Bongato', '', '09109021395');
INSERT INTO `employees` VALUES ('BTN-2018-03107', 'Josephine', 'Urmandel', 'Acha', '', '09106186236');
INSERT INTO `employees` VALUES ('BTN-2018-03109', 'Hazel', 'Alfanoso', 'Conje', '', '');
INSERT INTO `employees` VALUES ('BTN-2018-03110', 'Gladys Faith', 'Tan', 'Cupay', '', '09473721745');
INSERT INTO `employees` VALUES ('BTN-2018-03111', 'Aldrin', 'Burato', 'Lopez', '', '09464192776');
INSERT INTO `employees` VALUES ('BTN-2018-03113', 'Rodrigo', 'Paguya', 'Cordero', 'Jr.', '');
INSERT INTO `employees` VALUES ('BTN-2018-03114', 'Diva Bliss', 'Galdo', 'Polo', '', '09354065122');
INSERT INTO `employees` VALUES ('BTN-2018-03115', 'Rieza Mariel', '', 'Cabataña', '', '09128335888');
INSERT INTO `employees` VALUES ('BTN-2018-03116', 'Neprissa', 'Escol', 'Cuarteron', '', '09559629285');
INSERT INTO `employees` VALUES ('BTN-2018-03117', 'Claire', 'Quipet', 'Osigan', '', '09161278113');
INSERT INTO `employees` VALUES ('BTN-2018-03118', 'Michelle', '', 'Embuscado', '', '09309662223');
INSERT INTO `employees` VALUES ('BTN-2018-03121', 'Jeanilyn', 'Rafisura', 'Abuzo', '', '09957292598');
INSERT INTO `employees` VALUES ('BTN-2018-03122', 'Vivian', 'Pagulong', 'Vasquez', '', '09507623608');
INSERT INTO `employees` VALUES ('BTN-2018-0396', 'Mindamora', 'Ordedor', 'Plaza', '', '09295800528');
INSERT INTO `employees` VALUES ('BTN-2018-0398', 'Bryan Jade', 'Maxilom', 'Mapalo', '', '0910017684');
INSERT INTO `employees` VALUES ('BTN-2018-0399', 'Julito', 'Garvas', 'Sarco', '', '09124813982');
INSERT INTO `employees` VALUES ('BTN-2105-0310', 'Joenamer', 'Polestico', 'Oñez', '', '9093261240');
INSERT INTO `employees` VALUES ('`BTN-2015-0286', 'Cyril', 'Eway', 'Allen', '', '9262044375');

-- ----------------------------
-- Table structure for employment
-- ----------------------------
DROP TABLE IF EXISTS `employment`;
CREATE TABLE `employment` (
  `employment_id` int(11) NOT NULL AUTO_INCREMENT,
  `employment_status` varchar(50) DEFAULT NULL,
  `employment_job_title` varchar(50) DEFAULT NULL,
  `employee_id` varchar(150) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`employment_id`),
  KEY `employees_employment` (`employee_id`),
  KEY `department_employment` (`department_id`),
  CONSTRAINT `department_employment` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  CONSTRAINT `employees_employment` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employment
-- ----------------------------
INSERT INTO `employment` VALUES ('43', 'active', 'HR Associate', 'BTN-2014-147', '14');
INSERT INTO `employment` VALUES ('44', 'active', 'Program Head', 'BTN-2014-0271', '13');
INSERT INTO `employment` VALUES ('45', 'active', 'Alumni/Scholarship Coordinator ', 'BTN-2016-0317', '18');
INSERT INTO `employment` VALUES ('46', 'inactive', 'Instructor', '`BTN-2015-0286', '13');
INSERT INTO `employment` VALUES ('47', 'active', 'Instructor', 'BTN-2015- 0314', '31');
INSERT INTO `employment` VALUES ('48', 'active', 'School Director', 'BTN-1998-0004', '23');
INSERT INTO `employment` VALUES ('49', 'inactive', 'Instructor', 'BTN-2014-0278', '13');
INSERT INTO `employment` VALUES ('50', 'inactive', 'Academic Research Coordinator', 'BTN-2014-0259', '13');
INSERT INTO `employment` VALUES ('51', 'inactive', 'Electric Technician', 'BTN-2013-0257', '30');
INSERT INTO `employment` VALUES ('52', 'active', 'Dean', 'BTN-2016-0315', '13');
INSERT INTO `employment` VALUES ('53', 'inactive', 'Instructor', 'BTN-2015-0313', '21');
INSERT INTO `employment` VALUES ('54', 'active', 'Program Head', 'BTN-2015-0285', '13');
INSERT INTO `employment` VALUES ('55', 'active', 'HR Stafff', 'BTN-2016-0329', '14');
INSERT INTO `employment` VALUES ('56', 'inactive', 'Dean', 'BTN-2005-0013', '18');
INSERT INTO `employment` VALUES ('57', 'active', 'Instructor', 'BTN-2014-0284', '13');
INSERT INTO `employment` VALUES ('58', 'active', 'QMS Assistant', 'BTN-2016-0318', '25');
INSERT INTO `employment` VALUES ('59', 'active', 'HR Head', 'BTN-2011-0160', '14');
INSERT INTO `employment` VALUES ('60', 'active', 'School Administrator', 'BTN-2010-0148', '27');
INSERT INTO `employment` VALUES ('61', 'active', 'Instructor', 'BTN-2015-0312', '22');
INSERT INTO `employment` VALUES ('62', 'active', 'Library Staff', 'BTN-2015-0306', '20');
INSERT INTO `employment` VALUES ('63', 'active', 'Program Head', 'BTN-2105-0310', '31');
INSERT INTO `employment` VALUES ('64', 'active', 'Instructor', 'BTN-2015-0298', '21');
INSERT INTO `employment` VALUES ('65', 'active', 'Instructor', 'BTN-2015-0302', '22');
INSERT INTO `employment` VALUES ('66', 'inactive', 'Registrar', 'BTN-2007-0038', '19');
INSERT INTO `employment` VALUES ('67', 'inactive', 'Instructor', 'BTN-2015-0903', '21');
INSERT INTO `employment` VALUES ('68', 'inactive', 'Instructor', 'BTN-2015-0315', '13');
INSERT INTO `employment` VALUES ('69', 'active', 'TESDA Registrar', 'BTN-2009-0061', '19');
INSERT INTO `employment` VALUES ('70', 'inactive', 'Marketing Consultant', 'BTN-2014-0268', '26');
INSERT INTO `employment` VALUES ('71', 'inactive', 'Instructor', 'BTN-2016-0332', '22');
INSERT INTO `employment` VALUES ('72', 'inactive', 'Application Architect', 'BTN-2009-0071', '15');
INSERT INTO `employment` VALUES ('73', 'active', 'Instructor', 'BTN- 2010-0128', '13');
INSERT INTO `employment` VALUES ('74', 'active', 'Application Architect', 'BTN-2012-0213', '15');
INSERT INTO `employment` VALUES ('75', 'inactive', 'Computer Programmer ', 'BTN-2016-0319', '15');
INSERT INTO `employment` VALUES ('76', 'active', 'Application Architect', 'BTN-2013-0255', '15');
INSERT INTO `employment` VALUES ('77', 'inactive', 'Application Architect', 'BTN-2012-0212', '15');
INSERT INTO `employment` VALUES ('78', 'active', 'Auxiliary Services ', 'BTN-2008-0058', '30');
INSERT INTO `employment` VALUES ('79', 'active', 'HR Generalist', 'BTN- 2012-0175', '14');
INSERT INTO `employment` VALUES ('80', 'active', 'Hardware Maintenance', 'BTN-1999-0008', '17');
INSERT INTO `employment` VALUES ('81', 'active', 'Treasury Clerk', 'BTN-2013-0241', '16');
INSERT INTO `employment` VALUES ('82', 'active', 'School Librarian', 'BTN-2016-0322', '20');
INSERT INTO `employment` VALUES ('83', 'active', 'Janitor', 'BTN-2013-0216', '30');
INSERT INTO `employment` VALUES ('84', 'inactive', 'Management Consultant ', 'BTN-1997-0001', '28');
INSERT INTO `employment` VALUES ('85', 'inactive', 'Dean', 'BTN-2013-0250', '21');
INSERT INTO `employment` VALUES ('86', 'active', 'Janitor', 'BTN-2011-0171', '30');
INSERT INTO `employment` VALUES ('87', 'active', 'Librarian Staff', 'BTN-2003-0010', '20');
INSERT INTO `employment` VALUES ('88', 'active', 'Computer Programmer ', 'BTN-2016-0320', '15');
INSERT INTO `employment` VALUES ('89', 'active', 'Application Architect', 'BTN-2011-0162', '15');
INSERT INTO `employment` VALUES ('90', 'active', 'Guidance Councelor ', 'BTN-2012-0194', '18');
INSERT INTO `employment` VALUES ('91', 'active', 'Assets and Inventory Coordinator', 'BTN-2013-0239', '30');
INSERT INTO `employment` VALUES ('92', 'active', 'Janitor', 'BTN-2011-0172', '30');
INSERT INTO `employment` VALUES ('93', 'inactive', 'Instructor', 'BTN-2016-0327', '13');
INSERT INTO `employment` VALUES ('94', 'active', 'Instructor', 'BTN-2016-0326', '22');
INSERT INTO `employment` VALUES ('95', 'active', 'Computer Technician', 'BTN-2010-0142', '17');
INSERT INTO `employment` VALUES ('96', 'active', 'Dean', 'BTN-2013-0235', '21');
INSERT INTO `employment` VALUES ('97', 'active', 'carpenter', 'BTN-2012-0190', '30');
INSERT INTO `employment` VALUES ('98', 'active', 'Program Head', 'BTN-2016-0325', '22');
INSERT INTO `employment` VALUES ('99', 'active', 'TVET Focal Person', 'BTN-2006-0019', '29');
INSERT INTO `employment` VALUES ('100', 'inactive', 'Instructor', 'BTN-2013-0215', '21');
INSERT INTO `employment` VALUES ('101', 'active', 'Computer Laboratory Assistant ', 'BTN-2013-0249', '17');
INSERT INTO `employment` VALUES ('102', 'inactive', 'QSM officer & Internal Audit', 'BTN-2011-0163', '25');
INSERT INTO `employment` VALUES ('103', 'inactive', 'Instructor', 'BTN-2016-0330', '13');
INSERT INTO `employment` VALUES ('104', 'active', 'Instructor', 'BTN-2016-0328', '13');
INSERT INTO `employment` VALUES ('105', 'active', 'Research & Dev\'t Coordinator', 'BTN-2012-0189', '24');
INSERT INTO `employment` VALUES ('106', 'inactive', 'Instructor', 'BTN-2016-0331', '31');
INSERT INTO `employment` VALUES ('107', 'active', 'Dean', 'BTN-2016-0321', '22');
INSERT INTO `employment` VALUES ('108', 'active', 'Liaison Staff ', 'BTN-2012-0173', '16');
INSERT INTO `employment` VALUES ('109', 'active', 'Accounting Specialist ', 'BTN-1997-0002', '16');
INSERT INTO `employment` VALUES ('110', 'active', 'Treasury Specialist ', 'BTN-1998-0005', '16');
INSERT INTO `employment` VALUES ('111', 'inactive', 'Instructor', 'BTN-2016-0324', '13');
INSERT INTO `employment` VALUES ('112', 'active', 'OIC Head ', 'BTN-2012-0184', '16');
INSERT INTO `employment` VALUES ('113', 'inactive', 'Instructor', 'BTN-2016-0350', '22');
INSERT INTO `employment` VALUES ('114', 'active', 'Instructor', 'BTN-2016-0344', '21');
INSERT INTO `employment` VALUES ('115', 'inactive', 'Instructor', 'BTN-2016-0337', '31');
INSERT INTO `employment` VALUES ('116', 'inactive', 'CAD Trainer', 'BTN-2016-0351', '29');
INSERT INTO `employment` VALUES ('117', 'active', 'Instructor', 'BTN-2016-0340', '22');
INSERT INTO `employment` VALUES ('118', 'active', 'CHED Registrar ', 'BTN-2016-0335', '19');
INSERT INTO `employment` VALUES ('119', 'inactive', 'Instructor', 'BTN-2016-0336', '21');
INSERT INTO `employment` VALUES ('120', 'inactive', 'Instructor', 'BTN-2016-0352', '31');
INSERT INTO `employment` VALUES ('121', 'inactive', 'Assistant Professor 1', 'BTN-2016-0343', '13');
INSERT INTO `employment` VALUES ('122', 'inactive', 'Instructor', 'BTN-2016-0345', '22');
INSERT INTO `employment` VALUES ('123', 'inactive', 'Instructor', 'BTN-2016-0342', '21');
INSERT INTO `employment` VALUES ('124', 'active', 'Instructor', 'BTN-2016-0339', '31');
INSERT INTO `employment` VALUES ('125', 'inactive', 'Instructor', 'BTN-2016-0338', '21');
INSERT INTO `employment` VALUES ('126', 'active', 'Instructor', 'BTN-2016-0341', '13');
INSERT INTO `employment` VALUES ('127', 'inactive', 'Program Head', 'BTN-2016-0334 ', '13');
INSERT INTO `employment` VALUES ('128', 'inactive', 'Instructor', 'BTN-2016-0323', '21');
INSERT INTO `employment` VALUES ('129', 'inactive', 'Instructor', 'BTN-2016-0348', '22');
INSERT INTO `employment` VALUES ('130', 'active', 'OSAS Clerk', 'BTN-2016-0359', '18');
INSERT INTO `employment` VALUES ('131', 'active', 'Instructor', 'BTN-2016-0333', '13');
INSERT INTO `employment` VALUES ('132', 'active', 'Admission Officer ', 'BTN-2016-0356', '26');
INSERT INTO `employment` VALUES ('133', 'active', 'Programmer', 'BTN-2016-0353', '15');
INSERT INTO `employment` VALUES ('134', 'active', 'Computer Programmer ', 'BTN-2016-0354', '15');
INSERT INTO `employment` VALUES ('135', 'active', 'Computer Programmer ', 'BTn-2016-0355', '15');
INSERT INTO `employment` VALUES ('136', 'inactive', 'Instructor', 'BTN-2016-0358', '21');
INSERT INTO `employment` VALUES ('137', 'inactive', 'Instructor', 'BTN-2016-0346', '21');
INSERT INTO `employment` VALUES ('138', 'active', 'Marketing Associate', 'BTN-2016-0316', '26');
INSERT INTO `employment` VALUES ('139', 'inactive', 'Programmer', 'BTN-2016-0357', '15');
INSERT INTO `employment` VALUES ('140', 'inactive', 'Instructor', 'BTN- 2016-0347', '22');
INSERT INTO `employment` VALUES ('141', 'active', 'Instructor', 'BTN-2017-0378', '21');
INSERT INTO `employment` VALUES ('142', 'active', 'Instructor', 'BTN-2017-0379', '21');
INSERT INTO `employment` VALUES ('143', 'active', 'Junior Programmer', 'BTN-2017-0381', '15');
INSERT INTO `employment` VALUES ('144', 'active', 'Instructor', 'BTN-2017-0376', '31');
INSERT INTO `employment` VALUES ('145', 'active', 'Dean', 'BTN-2017-0371', '18');
INSERT INTO `employment` VALUES ('146', 'active', 'Instructor', 'BTN-2017-0377', '31');
INSERT INTO `employment` VALUES ('147', 'inactive', 'Instructor', 'BTN-2017-0369', '22');
INSERT INTO `employment` VALUES ('148', 'inactive', 'Instructor', 'BTN-2017-0374', '22');
INSERT INTO `employment` VALUES ('149', 'inactive', 'Instructor', 'BTN-2017-0373', '22');
INSERT INTO `employment` VALUES ('150', 'active', 'ICT Staff ', 'BTN-2017-0368', '22');
INSERT INTO `employment` VALUES ('151', 'active', 'School Electrician ', 'BTN-2017-0366', '30');
INSERT INTO `employment` VALUES ('152', 'inactive', 'Instructor', 'BTN-2017-0372', '22');
INSERT INTO `employment` VALUES ('153', 'inactive', 'Instructor', 'BTN-2017-0370', '22');
INSERT INTO `employment` VALUES ('154', 'active', 'Instructor', 'BTN-2017-6703', '22');
INSERT INTO `employment` VALUES ('155', 'active', 'School Nurse ', 'BTN-2017-0367', '18');
INSERT INTO `employment` VALUES ('156', 'inactive', 'Instructor', 'BTN-2016-0364', '21');
INSERT INTO `employment` VALUES ('157', 'active', 'Instructor', 'BTN-2016-0360', '31');
INSERT INTO `employment` VALUES ('158', 'inactive', 'Instructor', 'BTN-2016-1360', '31');
INSERT INTO `employment` VALUES ('159', 'active', 'Instructor', 'BTN-2016-0361', '31');
INSERT INTO `employment` VALUES ('160', 'inactive', 'Instructor', 'BTN -2017-384', '21');
INSERT INTO `employment` VALUES ('161', 'active', 'Instructor', 'BTN-2017-382', '13');
INSERT INTO `employment` VALUES ('162', 'active', 'Instructor', 'BTN-2017-383', '13');
INSERT INTO `employment` VALUES ('163', 'inactive', 'Instructor', 'BTN-2016-0349', '13');
INSERT INTO `employment` VALUES ('164', 'inactive', 'Instructor', 'BTN-2016-1365', '21');
INSERT INTO `employment` VALUES ('165', 'inactive', 'Instructor', 'BTN-2017-0385', '21');
INSERT INTO `employment` VALUES ('166', 'active', 'Instructor', 'BTN-2017-1371', '31');
INSERT INTO `employment` VALUES ('167', 'active', 'Instructor', 'BTN-2016-0363', '21');
INSERT INTO `employment` VALUES ('168', 'active', 'Instructor', 'BNT-2016-0362', '31');
INSERT INTO `employment` VALUES ('169', 'active', 'Instructor', 'BTN-2017-0386', '22');
INSERT INTO `employment` VALUES ('170', 'active', 'Developer', 'BTN-2017-0387', '15');
INSERT INTO `employment` VALUES ('171', 'active', 'School Librarian', 'BTN-2017-0388', '20');
INSERT INTO `employment` VALUES ('172', 'inactive', 'Instructor', 'BTN-2017-391', '21');
INSERT INTO `employment` VALUES ('173', 'active', 'Instructor', 'BTN-2017-390', '21');
INSERT INTO `employment` VALUES ('174', 'inactive', 'Instructor', 'BTN-2017-389', '21');
INSERT INTO `employment` VALUES ('175', 'active', 'ICT Staff', 'BTN-2017-392', '22');
INSERT INTO `employment` VALUES ('176', 'active', 'Security Guard', 'BTN-2017-393', '30');
INSERT INTO `employment` VALUES ('177', 'inactive', '', 'BTN-2017-394', '30');
INSERT INTO `employment` VALUES ('178', 'inactive', 'Security Guard', 'BTN-2017-395', '30');
INSERT INTO `employment` VALUES ('179', 'active', 'Security Guard', 'BTN-2017-396', '30');
INSERT INTO `employment` VALUES ('180', 'active', 'Assistant Professor II', 'BTN-2018-0396', '31');
INSERT INTO `employment` VALUES ('181', 'active', 'Instructor', 'BTN-2017-0397', '31');
INSERT INTO `employment` VALUES ('182', 'active', 'Instructor', 'BTN-2018-03101', '13');
INSERT INTO `employment` VALUES ('183', 'active', 'Instructor', 'BTN-2018-03102', '13');
INSERT INTO `employment` VALUES ('184', 'active', 'Instructor', 'BTN-2018-0399', '21');
INSERT INTO `employment` VALUES ('185', 'active', 'CHED Registrar ', 'BTN-2018-0398', '19');
INSERT INTO `employment` VALUES ('186', 'active', 'Instructor', 'BTN-2018-03103', '22');
INSERT INTO `employment` VALUES ('187', 'active', 'Instructor', 'BTN-2018-03100', '21');
INSERT INTO `employment` VALUES ('188', 'active', 'Director, RIED ', 'BTN-2018-03107', '24');
INSERT INTO `employment` VALUES ('189', 'active', 'Driver', 'BTN-2018-03106', '30');
INSERT INTO `employment` VALUES ('190', 'active', 'Executive Secretary', 'BTN-2018-03104', '23');
INSERT INTO `employment` VALUES ('191', 'active', 'NSTP- Coordinator', 'BTN-2018-03105', '18');
INSERT INTO `employment` VALUES ('192', 'active', 'Instructor', 'BTN-2018-03111', '31');
INSERT INTO `employment` VALUES ('193', 'active', 'Instructor', 'BTN-2018-03110', '31');
INSERT INTO `employment` VALUES ('194', 'active', 'Instructor', 'BTN-2018-03109', '22');
INSERT INTO `employment` VALUES ('195', 'active', 'Instructor', 'BTN-2018-03116', '22');
INSERT INTO `employment` VALUES ('196', 'active', 'Instructor', 'BTN-2018-03115', '22');
INSERT INTO `employment` VALUES ('197', 'active', 'Instructor', 'BTN-2018-03117', '22');
INSERT INTO `employment` VALUES ('198', 'active', 'Instructor', 'BTN-2018-03114', '31');
INSERT INTO `employment` VALUES ('199', 'active', 'Instructor', 'BTN-2018-03118', '31');
INSERT INTO `employment` VALUES ('200', 'active', 'Instructor', 'BTN-2018-03113', '31');
INSERT INTO `employment` VALUES ('201', 'active', 'Instructor', 'BTN-2018-03122', '21');
INSERT INTO `employment` VALUES ('202', 'active', 'Instructor', 'BTN-2018-03121', '21');

-- ----------------------------
-- Table structure for exam_schedule
-- ----------------------------
DROP TABLE IF EXISTS `exam_schedule`;
CREATE TABLE `exam_schedule` (
  `exam_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `start` date DEFAULT NULL,
  `end` varchar(40) DEFAULT NULL,
  `exam_id` int(40) NOT NULL,
  `dep` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`exam_schedule_id`),
  KEY `major_exams_exam_schedule` (`exam_id`),
  CONSTRAINT `major_exams_exam_schedule` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of exam_schedule
-- ----------------------------
INSERT INTO `exam_schedule` VALUES ('7', '2019-05-06', '2019-05-10', '9', 'SHS');
INSERT INTO `exam_schedule` VALUES ('8', '2019-05-06', '2019-05-10', '1', 'GENED');
INSERT INTO `exam_schedule` VALUES ('9', '2019-05-06', '2019-05-10', '1', 'SHS');

-- ----------------------------
-- Table structure for igo
-- ----------------------------
DROP TABLE IF EXISTS `igo`;
CREATE TABLE `igo` (
  `igo_id` int(11) NOT NULL AUTO_INCREMENT,
  `iga` varchar(255) DEFAULT NULL,
  `igc` varchar(255) DEFAULT NULL,
  `igo` varchar(255) DEFAULT NULL,
  `igo_datetime` datetime DEFAULT NULL,
  `revise` int(11) DEFAULT NULL,
  `id` int(40) NOT NULL,
  PRIMARY KEY (`igo_id`),
  KEY `super_user_igo` (`id`),
  CONSTRAINT `super_user_igo` FOREIGN KEY (`id`) REFERENCES `super_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of igo
-- ----------------------------
INSERT INTO `igo` VALUES ('1', 'Logical Thinking', 'IGO01', 'Critically analyze and evaluate the application of fundamental knowledge for objective decision-making using the disciplinal principles in their respective expertise for results-oriented endeavors.', '2018-08-20 11:38:57', '0', '1');
INSERT INTO `igo` VALUES ('2', 'Ingenuity', 'IGO02', 'Respond to global trends for a continuous development of graduatesâ€™ professional entities; demonstrate skills and competencies that adapt ideas from global thinkers for innovation and competitiveness.', '2018-08-20 11:39:31', '0', '1');
INSERT INTO `igo` VALUES ('3', 'Genuine Leadership', 'IGO03', 'Responsive to commitments and endeavors for a sustainable development on outcomes and determined to reach out other communities for partnerships and linkages. Exhibits proactive attributes for genuine services in a diverse society.', '2018-08-20 11:40:10', '0', '1');
INSERT INTO `igo` VALUES ('4', 'Effective Communication', 'IGO04', 'Express proficiency and professionalism in verbal and non-verbal communication which efficiently and effectively uses language that conforms to the norms of civility to interact with confidence and enthusiasm to make their visions and goals attainable. ', '2018-08-20 11:40:46', '0', '1');
INSERT INTO `igo` VALUES ('5', 'Moral Uprightness', 'IGO05', 'Manifests global ethical standards to reflect quality of work and convenient working environment. Upholds social accountability and commitment to responsibilities that produces commendable outputs for sustainability and development.', '2018-08-20 14:21:05', '1', '1');

-- ----------------------------
-- Table structure for igo_pgo
-- ----------------------------
DROP TABLE IF EXISTS `igo_pgo`;
CREATE TABLE `igo_pgo` (
  `igo_pgo_id` int(11) NOT NULL AUTO_INCREMENT,
  `igo_id` int(11) NOT NULL,
  `pgo_id` int(11) NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`igo_pgo_id`),
  KEY `igo_igo_pgo` (`igo_id`),
  KEY `pgo_igo_pgo` (`pgo_id`),
  CONSTRAINT `igo_igo_pgo` FOREIGN KEY (`igo_id`) REFERENCES `igo` (`igo_id`),
  CONSTRAINT `pgo_igo_pgo` FOREIGN KEY (`pgo_id`) REFERENCES `pgo` (`pgo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of igo_pgo
-- ----------------------------
INSERT INTO `igo_pgo` VALUES ('1', '1', '1', 'checked');
INSERT INTO `igo_pgo` VALUES ('2', '2', '1', 'checked');
INSERT INTO `igo_pgo` VALUES ('3', '3', '1', 'checked');
INSERT INTO `igo_pgo` VALUES ('4', '4', '1', 'checked');
INSERT INTO `igo_pgo` VALUES ('5', '5', '1', 'checked');
INSERT INTO `igo_pgo` VALUES ('6', '1', '2', 'checked');
INSERT INTO `igo_pgo` VALUES ('7', '2', '2', 'checked');
INSERT INTO `igo_pgo` VALUES ('8', '3', '2', 'checked');
INSERT INTO `igo_pgo` VALUES ('9', '4', '2', 'checked');
INSERT INTO `igo_pgo` VALUES ('10', '5', '2', 'checked');

-- ----------------------------
-- Table structure for ii
-- ----------------------------
DROP TABLE IF EXISTS `ii`;
CREATE TABLE `ii` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `iv` varchar(255) DEFAULT NULL,
  `im` varchar(255) DEFAULT NULL,
  `qps` varchar(255) DEFAULT NULL,
  `ig` varchar(255) DEFAULT NULL,
  `icv` varchar(255) DEFAULT NULL,
  `id` int(40) NOT NULL,
  PRIMARY KEY (`iid`),
  KEY `super_user_ii` (`id`),
  CONSTRAINT `super_user_ii` FOREIGN KEY (`id`) REFERENCES `super_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ii
-- ----------------------------
INSERT INTO `ii` VALUES ('1', 'â€œEntrepreneurship through business and information technologyâ€. ACB envisions to be the premier technopreneurship school leading in sustainable innovations in business and information technology education in Caraga and the Mindanaoâ€™s East Coast, and', 'ACB aspires to create sustainable value for students, faculty, employees, partners, stockholders and the public by providing innovative, relevant and high quality business, information technology and entrepreneurship education for the people of Caraga and', 'ACLC COLLEGE OF BUTUAN is committed to produce globally competitive and well-rounded graduates and technopreneurs in their respective fields of endeavor; assuring total customer satisfaction, continual improvement and compliance to all required government', 'Innovation, Faculty, Infrastructure and Facilities, Graduates, Happy Employees, Technopreneurs, Sustainability, Partnership', 'Accountability and Responsibility, Creativity, Leadership, Commitment to Excellence, Sustainability', '1');

-- ----------------------------
-- Table structure for major_exams
-- ----------------------------
DROP TABLE IF EXISTS `major_exams`;
CREATE TABLE `major_exams` (
  `exam_id` int(40) NOT NULL AUTO_INCREMENT,
  `exam_period` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of major_exams
-- ----------------------------
INSERT INTO `major_exams` VALUES ('1', 'PRELIM');
INSERT INTO `major_exams` VALUES ('2', 'MIDTERM');
INSERT INTO `major_exams` VALUES ('3', 'PRE-FINAL');
INSERT INTO `major_exams` VALUES ('4', 'FINAL');
INSERT INTO `major_exams` VALUES ('5', 'PRELIM EXAM');
INSERT INTO `major_exams` VALUES ('6', 'MIDTERM EXAM');
INSERT INTO `major_exams` VALUES ('7', 'PRE-FINAL EXAM');
INSERT INTO `major_exams` VALUES ('8', 'FINAL EXAM');
INSERT INTO `major_exams` VALUES ('9', 'FIRST QUARTER');
INSERT INTO `major_exams` VALUES ('10', 'SECOND QUARTER');
INSERT INTO `major_exams` VALUES ('11', 'THIRD QUARTER');
INSERT INTO `major_exams` VALUES ('12', 'FOURTH QUARTER');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `conver_id` int(11) DEFAULT NULL,
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `message` text,
  `message_status` varchar(255) DEFAULT NULL,
  `message_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `conversation_messages` (`conver_id`),
  CONSTRAINT `conversation_messages` FOREIGN KEY (`conver_id`) REFERENCES `conversation` (`conver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for pgo
-- ----------------------------
DROP TABLE IF EXISTS `pgo`;
CREATE TABLE `pgo` (
  `pgo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pga` varchar(40) DEFAULT NULL,
  `pgc` varchar(40) DEFAULT NULL,
  `pgo` text,
  `course` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `pgo_datetime` datetime DEFAULT NULL,
  `revise` varchar(40) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`pgo_id`),
  KEY `user_access_pgo` (`user_id`),
  CONSTRAINT `user_access_pgo` FOREIGN KEY (`user_id`) REFERENCES `user_access` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pgo
-- ----------------------------
INSERT INTO `pgo` VALUES ('1', 'PGO1', 'PGO1', 'PGO1', 'SHS', '2018-2019', '2019-04-29 10:30:15', '0', '63');
INSERT INTO `pgo` VALUES ('2', 'PGO2', 'PGO2', 'PGO2', 'SHS', '2018-2019', '2019-04-29 10:30:41', '1', '63');

-- ----------------------------
-- Table structure for pgo_clo
-- ----------------------------
DROP TABLE IF EXISTS `pgo_clo`;
CREATE TABLE `pgo_clo` (
  `pgoclo_id` int(11) NOT NULL AUTO_INCREMENT,
  `pgo_id` int(11) NOT NULL,
  `clo_id` int(11) NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`pgoclo_id`),
  KEY `pgo_pgo_clo` (`pgo_id`),
  KEY `clo_ilo_pgo_clo` (`clo_id`),
  CONSTRAINT `clo_ilo_pgo_clo` FOREIGN KEY (`clo_id`) REFERENCES `clo_ilo` (`clo_id`),
  CONSTRAINT `pgo_pgo_clo` FOREIGN KEY (`pgo_id`) REFERENCES `pgo` (`pgo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pgo_clo
-- ----------------------------
INSERT INTO `pgo_clo` VALUES ('1', '1', '64', 'checked');
INSERT INTO `pgo_clo` VALUES ('2', '2', '64', '');

-- ----------------------------
-- Table structure for policies
-- ----------------------------
DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `late_tardiness` text,
  `absence` text,
  `miss_quiz` text,
  `permits` text,
  `cheating` text,
  `class_misbehavior` text,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`policy_id`),
  KEY `syllabus_policies` (`syllabus_id`),
  CONSTRAINT `syllabus_policies` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of policies
-- ----------------------------
INSERT INTO `policies` VALUES ('54', 'ddd', 'ddd', 'dd', 'dd', 'dd', 'ddd', '101');

-- ----------------------------
-- Table structure for program_information
-- ----------------------------
DROP TABLE IF EXISTS `program_information`;
CREATE TABLE `program_information` (
  `p_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_vision` text,
  `prog_mission` text,
  `prog_desc` text,
  `course` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`p_i_id`),
  KEY `user_access_program_information` (`user_id`),
  CONSTRAINT `user_access_program_information` FOREIGN KEY (`user_id`) REFERENCES `user_access` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of program_information
-- ----------------------------

-- ----------------------------
-- Table structure for prog_ed_objectives
-- ----------------------------
DROP TABLE IF EXISTS `prog_ed_objectives`;
CREATE TABLE `prog_ed_objectives` (
  `ob_id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) DEFAULT NULL,
  `ob_desc` text,
  `p_i_id` int(11) NOT NULL,
  PRIMARY KEY (`ob_id`),
  KEY `program_information_prog_ed_objectives` (`p_i_id`),
  CONSTRAINT `program_information_prog_ed_objectives` FOREIGN KEY (`p_i_id`) REFERENCES `program_information` (`p_i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prog_ed_objectives
-- ----------------------------

-- ----------------------------
-- Table structure for question_status
-- ----------------------------
DROP TABLE IF EXISTS `question_status`;
CREATE TABLE `question_status` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(40) DEFAULT NULL,
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `TestQuestions_question_status` (`q_id`),
  CONSTRAINT `TestQuestions_question_status` FOREIGN KEY (`q_id`) REFERENCES `testquestions` (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question_status
-- ----------------------------
INSERT INTO `question_status` VALUES ('244', 'checked', '244');
INSERT INTO `question_status` VALUES ('245', 'checked', '245');
INSERT INTO `question_status` VALUES ('246', 'checked', '246');
INSERT INTO `question_status` VALUES ('247', 'checked', '247');
INSERT INTO `question_status` VALUES ('248', 'checked', '248');
INSERT INTO `question_status` VALUES ('249', 'checked', '249');

-- ----------------------------
-- Table structure for question_type
-- ----------------------------
DROP TABLE IF EXISTS `question_type`;
CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_type_name` varchar(100) DEFAULT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`question_type_id`),
  KEY `test_number_question_type` (`test_id`),
  CONSTRAINT `test_number_question_type` FOREIGN KEY (`test_id`) REFERENCES `test_number` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question_type
-- ----------------------------
INSERT INTO `question_type` VALUES ('75', 'Identification', '75');

-- ----------------------------
-- Table structure for quiz
-- ----------------------------
DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_name` varchar(200) DEFAULT NULL,
  `q_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  PRIMARY KEY (`quiz_id`),
  KEY `user_access_quiz` (`user_id`),
  KEY `subject_quiz` (`subj_id`),
  CONSTRAINT `subject_quiz` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`),
  CONSTRAINT `user_access_quiz` FOREIGN KEY (`user_id`) REFERENCES `user_access` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quiz
-- ----------------------------

-- ----------------------------
-- Table structure for quiz_q
-- ----------------------------
DROP TABLE IF EXISTS `quiz_q`;
CREATE TABLE `quiz_q` (
  `qq_id` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_num` varchar(40) DEFAULT NULL,
  `q_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`qq_id`),
  KEY `TestQuestions_quiz_q` (`q_id`),
  KEY `quiz_quiz_q` (`quiz_id`),
  CONSTRAINT `TestQuestions_quiz_q` FOREIGN KEY (`q_id`) REFERENCES `testquestions` (`q_id`),
  CONSTRAINT `quiz_quiz_q` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of quiz_q
-- ----------------------------

-- ----------------------------
-- Table structure for reference
-- ----------------------------
DROP TABLE IF EXISTS `reference`;
CREATE TABLE `reference` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_desc` text,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`ref_id`),
  KEY `syllabus_reference` (`syllabus_id`),
  CONSTRAINT `syllabus_reference` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reference
-- ----------------------------
INSERT INTO `reference` VALUES ('78', 'ddd', '101');

-- ----------------------------
-- Table structure for remarks
-- ----------------------------
DROP TABLE IF EXISTS `remarks`;
CREATE TABLE `remarks` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `remark_desc` text,
  `date_time` datetime DEFAULT NULL,
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`remark_id`),
  KEY `TestQuestions_remarks` (`q_id`),
  CONSTRAINT `TestQuestions_remarks` FOREIGN KEY (`q_id`) REFERENCES `testquestions` (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of remarks
-- ----------------------------

-- ----------------------------
-- Table structure for revision
-- ----------------------------
DROP TABLE IF EXISTS `revision`;
CREATE TABLE `revision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rev_no` varchar(11) DEFAULT NULL,
  `issued_date` varchar(255) DEFAULT NULL,
  `preparedby` varchar(255) DEFAULT NULL,
  `reviewedby` varchar(255) DEFAULT NULL,
  `verifiedby` varchar(255) DEFAULT NULL,
  `approvedby` varchar(255) DEFAULT NULL,
  `effectivity_date` varchar(255) DEFAULT NULL,
  `syllabus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of revision
-- ----------------------------
INSERT INTO `revision` VALUES ('1', '1', '2019-04-27', 'dd', 'dd', 'dd', 'dd', '2019-04-20', '101');

-- ----------------------------
-- Table structure for sched_subj
-- ----------------------------
DROP TABLE IF EXISTS `sched_subj`;
CREATE TABLE `sched_subj` (
  `ss_id` int(40) NOT NULL AUTO_INCREMENT,
  `department` varchar(225) DEFAULT NULL,
  `employment_id` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `sem_id` int(40) NOT NULL,
  `sy_id` int(11) NOT NULL,
  PRIMARY KEY (`ss_id`),
  KEY `subject_sched_subj` (`subj_id`),
  KEY `employment_sched_subj` (`employment_id`),
  KEY `semester_sched_subj` (`sem_id`),
  KEY `school_year_sched_subj` (`sy_id`),
  CONSTRAINT `employment_sched_subj` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`),
  CONSTRAINT `school_year_sched_subj` FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`),
  CONSTRAINT `semester_sched_subj` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  CONSTRAINT `subject_sched_subj` FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sched_subj
-- ----------------------------
INSERT INTO `sched_subj` VALUES ('101', 'GEN', '63', '724', '1', '1');
INSERT INTO `sched_subj` VALUES ('103', 'BA', '63', '186', '1', '1');
INSERT INTO `sched_subj` VALUES ('104', 'ITE', '63', '821', '1', '1');

-- ----------------------------
-- Table structure for school_year
-- ----------------------------
DROP TABLE IF EXISTS `school_year`;
CREATE TABLE `school_year` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of school_year
-- ----------------------------
INSERT INTO `school_year` VALUES ('1', '2018-2019');
INSERT INTO `school_year` VALUES ('2', '');

-- ----------------------------
-- Table structure for semester
-- ----------------------------
DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `sem_id` int(40) NOT NULL AUTO_INCREMENT,
  `semester` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of semester
-- ----------------------------
INSERT INTO `semester` VALUES ('1', '1st');
INSERT INTO `semester` VALUES ('2', '2nd');

-- ----------------------------
-- Table structure for shs_answer
-- ----------------------------
DROP TABLE IF EXISTS `shs_answer`;
CREATE TABLE `shs_answer` (
  `shs_answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_cols` int(11) DEFAULT NULL,
  `shs_answer_desc` text,
  `shs_answer_attach` varchar(100) DEFAULT NULL,
  `shs_q_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_answer_id`),
  KEY `shs_TestQuestions_shs_answer` (`shs_q_id`),
  CONSTRAINT `shs_TestQuestions_shs_answer` FOREIGN KEY (`shs_q_id`) REFERENCES `shs_testquestions` (`shs_q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_answer
-- ----------------------------
INSERT INTO `shs_answer` VALUES ('1', null, '2', '', '1');
INSERT INTO `shs_answer` VALUES ('2', null, 'sdfsdf', '', '2');
INSERT INTO `shs_answer` VALUES ('3', null, 'dfgdfg', '', '3');
INSERT INTO `shs_answer` VALUES ('4', null, 'ghjghjgj', '', '4');
INSERT INTO `shs_answer` VALUES ('5', null, 'gfhfgh', '', '5');
INSERT INTO `shs_answer` VALUES ('6', null, 'ghfghfgh', '', '6');

-- ----------------------------
-- Table structure for shs_answer_choices
-- ----------------------------
DROP TABLE IF EXISTS `shs_answer_choices`;
CREATE TABLE `shs_answer_choices` (
  `shs_ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_answer_choice_desc` varchar(255) DEFAULT NULL,
  `shs_choice_attach` varchar(255) DEFAULT NULL,
  `shs_q_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`shs_ac_id`),
  KEY `shs_TestQuestions_shs_answer_choices` (`shs_q_id`),
  CONSTRAINT `shs_TestQuestions_shs_answer_choices` FOREIGN KEY (`shs_q_id`) REFERENCES `shs_testquestions` (`shs_q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_answer_choices
-- ----------------------------

-- ----------------------------
-- Table structure for shs_question_status
-- ----------------------------
DROP TABLE IF EXISTS `shs_question_status`;
CREATE TABLE `shs_question_status` (
  `shs_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_status` varchar(40) DEFAULT NULL,
  `shs_q_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_question_id`),
  KEY `shs_TestQuestions_shs_question_status` (`shs_q_id`),
  CONSTRAINT `shs_TestQuestions_shs_question_status` FOREIGN KEY (`shs_q_id`) REFERENCES `shs_testquestions` (`shs_q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_question_status
-- ----------------------------
INSERT INTO `shs_question_status` VALUES ('1', 'checked', '1');
INSERT INTO `shs_question_status` VALUES ('2', 'checked', '2');
INSERT INTO `shs_question_status` VALUES ('3', 'checked', '3');
INSERT INTO `shs_question_status` VALUES ('4', 'checked', '4');
INSERT INTO `shs_question_status` VALUES ('5', 'checked', '5');
INSERT INTO `shs_question_status` VALUES ('6', 'checked', '6');

-- ----------------------------
-- Table structure for shs_question_type
-- ----------------------------
DROP TABLE IF EXISTS `shs_question_type`;
CREATE TABLE `shs_question_type` (
  `shs_question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_question_type_name` varchar(100) DEFAULT NULL,
  `shs_test_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_question_type_id`),
  KEY `shs_test_number_shs_question_type` (`shs_test_id`),
  CONSTRAINT `shs_test_number_shs_question_type` FOREIGN KEY (`shs_test_id`) REFERENCES `shs_test_number` (`shs_test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_question_type
-- ----------------------------
INSERT INTO `shs_question_type` VALUES ('1', 'Identification', '1');

-- ----------------------------
-- Table structure for shs_quiz
-- ----------------------------
DROP TABLE IF EXISTS `shs_quiz`;
CREATE TABLE `shs_quiz` (
  `shs_quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_quiz_name` varchar(200) DEFAULT NULL,
  `shs_q_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `shs_subj_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_quiz_id`),
  KEY `user_access_shs_quiz` (`user_id`),
  KEY `shs_subject_shs_quiz` (`shs_subj_id`),
  CONSTRAINT `shs_subject_shs_quiz` FOREIGN KEY (`shs_subj_id`) REFERENCES `shs_subject` (`shs_subj_id`),
  CONSTRAINT `user_access_shs_quiz` FOREIGN KEY (`user_id`) REFERENCES `user_access` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_quiz
-- ----------------------------

-- ----------------------------
-- Table structure for shs_quiz_q
-- ----------------------------
DROP TABLE IF EXISTS `shs_quiz_q`;
CREATE TABLE `shs_quiz_q` (
  `shs_qq_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_quiz_num` varchar(40) DEFAULT NULL,
  `shs_q_id` int(11) NOT NULL,
  `shs_quiz_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_qq_id`),
  KEY `shs_quiz_shs_quiz_q` (`shs_quiz_id`),
  KEY `shs_TestQuestions_shs_quiz_q` (`shs_q_id`),
  CONSTRAINT `shs_TestQuestions_shs_quiz_q` FOREIGN KEY (`shs_q_id`) REFERENCES `shs_testquestions` (`shs_q_id`),
  CONSTRAINT `shs_quiz_shs_quiz_q` FOREIGN KEY (`shs_quiz_id`) REFERENCES `shs_quiz` (`shs_quiz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_quiz_q
-- ----------------------------

-- ----------------------------
-- Table structure for shs_remarks
-- ----------------------------
DROP TABLE IF EXISTS `shs_remarks`;
CREATE TABLE `shs_remarks` (
  `shs_remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_remark_desc` text,
  `shs_date_time` datetime DEFAULT NULL,
  `shs_q_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_remark_id`),
  KEY `shs_TestQuestions_shs_remarks` (`shs_q_id`),
  CONSTRAINT `shs_TestQuestions_shs_remarks` FOREIGN KEY (`shs_q_id`) REFERENCES `shs_testquestions` (`shs_q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_remarks
-- ----------------------------

-- ----------------------------
-- Table structure for shs_subject
-- ----------------------------
DROP TABLE IF EXISTS `shs_subject`;
CREATE TABLE `shs_subject` (
  `shs_subj_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_subj_code` varchar(40) DEFAULT NULL,
  `shs_subj_name` varchar(100) DEFAULT NULL,
  `shs_subj_desc` varchar(100) DEFAULT NULL,
  `shs_lec_unit` int(11) DEFAULT NULL,
  `shs_lab_unit` int(11) DEFAULT NULL,
  `shs_pre_requisite` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`shs_subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=894 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_subject
-- ----------------------------
INSERT INTO `shs_subject` VALUES ('538', 'STAT112', 'Statistics  and Probability', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('539', 'ENG111', 'Oral Communication in  Context', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('544', 'PEDH111', 'Physical Education and Health', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('548', 'PDEV111', 'Personal Development/Pansariling Kaunlaran', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('550', 'ELSC111', 'Earth and Life Science ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('551', 'PHIL121', 'Introduction to the Philosophy of the Human Person/Pambungad sa Pilosopiya ng Tao', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('552', 'EAPP111', 'English for Academic and Professional Purposes', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('554', 'RSCH110', 'Practical Research 1/ Research in Daily Life ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('555', 'HUMSS111', 'Introduction to World Religions and Beliefs', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('556', 'GMAT111', 'General Mathematics', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('557', 'FILI111', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('558', 'ICT112', 'Empowerment Technologies (E-Tech): ICT for Professional Tracks', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('561', 'PROG111', 'Programming(Java) Part 1', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('563', 'FILI112', 'Pagbasa at Pagsusuri ng Iba\'t Ibang Teksto Tungo sa Pananaliksik', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('564', 'UCSP111', 'Understanding Culture, Society and Politics', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('565', 'RSCH121', 'Practical Research 2/ Research in Daily Life 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('567', 'PREC111', 'Pre-Calculus', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('568', 'ESCI111', 'Earth Science', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('569', 'PEDH112', 'Physical Education   and   Health   ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('570', 'ICT126', 'Animation(NC II) Part I', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('571', 'FILI121', 'Pagsulat sa Filipino sa Piling Larangan (Akademik)', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('572', 'MEIL122', 'Media and Information Literacy', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('573', 'DIRR112', 'Disaster Readiness and Risk Reduction', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('574', 'CPAR122', 'Contemporary Philippine Arts from the Regions', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('575', 'ENTR122', 'Entrepreneurship', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('577', 'PHYS112', 'Physical  Science ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('578', 'BMAT112', 'Business Math', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('580', 'OAM112', 'Organization and Management', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('581', 'PEDH122', 'Physical Education and Health 4', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('582', 'RSCH111', 'Practical  Research 1 - Research in Daily Life 1', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('583', 'FABM112', 'Fundamentals of Accounting, Business and Management 1', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('584', 'CSS122', 'Work Immersion/ Research/Career Advocacy/Culminating Activity', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('585', 'BUSC112', 'Basic Calculus', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('586', 'IMMR123', 'Inquiries, Investigation and Immersion', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('589', 'PROG112', 'Programming(Java) Part II', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('590', 'RSCH122', 'Research Project', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('592', 'PEDH121', 'Physical    Education and Health', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('593', 'FABM121', 'Fundamentals of Accounting, Business and Management 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('594', 'CSS112', 'Computer Systems Servicing NCII Part 1/ Part II/ Part III/ Part IV ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('596', 'PHYC122', 'General Physics 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('597', 'IMMR121', 'Inquiries, Investigation and Immersion ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('598', 'PHYC121', 'General Physics 1', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('599', 'CHEM122', 'General Chemistry 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('600', 'CHEM112', 'General Chemistry 1', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('603', 'PRIM121', 'Principles of Marketing ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('604', 'ECON122', 'Applied Economics', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('605', 'GBIO122', 'General Biology 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('607', 'BFIN121', 'Business Finance', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('608', 'RSCH112', 'Practical Research 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('609', 'GAS120', 'Work  Immersion/Research/Career Advocacy/Culminating Activity  ', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('611', 'BESR122', 'Business Ethics and Social Responsibility', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('612', 'ICT127', 'Animation(NC II) Part II', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('613', 'STEM123', 'Work Immersion/Research/Career Advocacy/Culminating Activity', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('614', 'GBIO121', 'General Biology 1 / General Biology 2', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('615', 'BENS122', 'Business Enterprise Simulation (Work Immersion/Research/Career Advocacy/Culminating Activity)', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('616', 'ENGL121', '21st Century Literature from the Philippines and the World', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('617', 'IMMR122', 'Inquiry, Investigation and Immersion', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('618', 'USCP111', 'Understanding     Culture, Society and Politics', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('619', 'PROG113', 'Programming(Java) Part III', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('620', 'ICT128', 'Animation(NC II) Part III', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('621', 'ENGL112', 'Reading and Writing Skills', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('622', 'RSH123', 'Work Immersion /Research/Career Advocacy/Culminating Activity', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('623', 'RSCH123', 'Research/Capstone Project', '', '0', '0', '');
INSERT INTO `shs_subject` VALUES ('888', 'SHSENG01', 'English for Academic and Professional Purposes', null, '4', '0', ' ');
INSERT INTO `shs_subject` VALUES ('889', 'SHS-TECH01', 'Empowerment Technologies', null, '4', '0', ' ');
INSERT INTO `shs_subject` VALUES ('890', 'CSS', 'Computer Systems Servicing Part I', null, '0', '8', ' ');
INSERT INTO `shs_subject` VALUES ('891', 'CSS', 'Computer Systems Servicing Part III', null, '0', '8', ' ');
INSERT INTO `shs_subject` VALUES ('893', 'TNCTCC1', 'Trends, Networks, and Critical Thinking in the 21st Century', null, '4', '0', null);

-- ----------------------------
-- Table structure for shs_syll
-- ----------------------------
DROP TABLE IF EXISTS `shs_syll`;
CREATE TABLE `shs_syll` (
  `shs_syll_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(40) DEFAULT NULL,
  `shs_subj_id` int(11) NOT NULL,
  `sem_id` int(40) NOT NULL,
  `sy_id` int(11) NOT NULL,
  `employment_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_syll_id`),
  KEY `shs_subject_shs_syll` (`shs_subj_id`),
  KEY `semester_shs_syll` (`sem_id`),
  KEY `school_year_shs_syll` (`sy_id`),
  KEY `employment_shs_syll` (`employment_id`),
  CONSTRAINT `employment_shs_syll` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`),
  CONSTRAINT `school_year_shs_syll` FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`),
  CONSTRAINT `semester_shs_syll` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  CONSTRAINT `shs_subject_shs_syll` FOREIGN KEY (`shs_subj_id`) REFERENCES `shs_subject` (`shs_subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_syll
-- ----------------------------
INSERT INTO `shs_syll` VALUES ('19', 'pending', '616', '1', '1', '63');

-- ----------------------------
-- Table structure for shs_testquestions
-- ----------------------------
DROP TABLE IF EXISTS `shs_testquestions`;
CREATE TABLE `shs_testquestions` (
  `shs_q_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_number` int(10) DEFAULT NULL,
  `shs_question_desc` varchar(255) DEFAULT NULL,
  `shs_points` int(10) DEFAULT NULL,
  `shs_attachment` varchar(100) DEFAULT NULL,
  `shs_test_id` int(11) NOT NULL,
  `shs_topics_id` int(11) NOT NULL,
  `cognitive_level_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_q_id`),
  KEY `shs_test_number_shs_TestQuestions` (`shs_test_id`),
  KEY `shs_topics_shs_TestQuestions` (`shs_topics_id`),
  KEY `cognitive_level_shs_TestQuestions` (`cognitive_level_id`),
  CONSTRAINT `cognitive_level_shs_TestQuestions` FOREIGN KEY (`cognitive_level_id`) REFERENCES `cognitive_level` (`cognitive_level_id`),
  CONSTRAINT `shs_test_number_shs_TestQuestions` FOREIGN KEY (`shs_test_id`) REFERENCES `shs_test_number` (`shs_test_id`),
  CONSTRAINT `shs_topics_shs_TestQuestions` FOREIGN KEY (`shs_topics_id`) REFERENCES `shs_topics` (`shs_topics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_testquestions
-- ----------------------------
INSERT INTO `shs_testquestions` VALUES ('1', '1', 'It is a symbol or a letter used to represent numbers.', '2', '', '1', '178', '1');
INSERT INTO `shs_testquestions` VALUES ('2', '2', 'It is the highest exponent of the variable in the polynomial.', '2', '', '1', '178', '2');
INSERT INTO `shs_testquestions` VALUES ('3', '3', 'It is a polynomial which consists of only one term.', '1', '', '1', '178', '3');
INSERT INTO `shs_testquestions` VALUES ('4', '4', 'It is a polynomial which consists of two terms.', '1', '', '1', '179', '4');
INSERT INTO `shs_testquestions` VALUES ('5', '5', 'It is an algebraic expression which contains more than two terms.', '2', '', '1', '179', '5');
INSERT INTO `shs_testquestions` VALUES ('6', '6', 'It is a short-cut procedure of dividing a polynomial by a binomial divisor of the form x-r.', '2', '', '1', '179', '6');

-- ----------------------------
-- Table structure for shs_test_number
-- ----------------------------
DROP TABLE IF EXISTS `shs_test_number`;
CREATE TABLE `shs_test_number` (
  `shs_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_test_number` int(11) DEFAULT NULL,
  `shs_test_desc` varchar(255) DEFAULT NULL,
  `shs_attachment` varchar(100) DEFAULT NULL,
  `shs_tq_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_test_id`),
  KEY `shs_tq_shs_test_number` (`shs_tq_id`),
  CONSTRAINT `shs_tq_shs_test_number` FOREIGN KEY (`shs_tq_id`) REFERENCES `shs_tq` (`shs_tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_test_number
-- ----------------------------
INSERT INTO `shs_test_number` VALUES ('1', '1', 'Identify what is asked in the following statements. (1 point each)', '', '16');

-- ----------------------------
-- Table structure for shs_topics
-- ----------------------------
DROP TABLE IF EXISTS `shs_topics`;
CREATE TABLE `shs_topics` (
  `shs_topics_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_topic_description` varchar(255) NOT NULL,
  `exam_id` int(40) NOT NULL,
  `shs_subj_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_topics_id`),
  KEY `major_exams_shs_topics` (`exam_id`),
  KEY `shs_subject_shs_topics` (`shs_subj_id`),
  CONSTRAINT `major_exams_shs_topics` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`),
  CONSTRAINT `shs_subject_shs_topics` FOREIGN KEY (`shs_subj_id`) REFERENCES `shs_subject` (`shs_subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_topics
-- ----------------------------
INSERT INTO `shs_topics` VALUES ('5', 'Definition of Terms', '9', '555');
INSERT INTO `shs_topics` VALUES ('6', 'How World Religions  Began', '9', '555');
INSERT INTO `shs_topics` VALUES ('7', 'Positive and Negative  Effect of Religions', '9', '555');
INSERT INTO `shs_topics` VALUES ('8', 'Judaism', '9', '555');
INSERT INTO `shs_topics` VALUES ('9', 'Christianity', '9', '555');
INSERT INTO `shs_topics` VALUES ('10', 'Islam', '9', '555');
INSERT INTO `shs_topics` VALUES ('11', 'Comparative Analysis of Judaism, Christianity, and Islam', '9', '555');
INSERT INTO `shs_topics` VALUES ('12', 'Hinduism', '10', '555');
INSERT INTO `shs_topics` VALUES ('13', 'Theravada Buddhism', '10', '555');
INSERT INTO `shs_topics` VALUES ('14', 'Mahayana Buddhism', '10', '555');
INSERT INTO `shs_topics` VALUES ('15', 'Comparative Analysis of Hinduism, Theravada Buddhism, and Mahayana Buddhism', '10', '555');
INSERT INTO `shs_topics` VALUES ('16', 'Confucianism', '10', '555');
INSERT INTO `shs_topics` VALUES ('17', 'Taoism', '10', '555');
INSERT INTO `shs_topics` VALUES ('18', 'Shintoism', '10', '555');
INSERT INTO `shs_topics` VALUES ('19', 'Comparative Analysis of Confucianism, Taoism, and Shintoism', '10', '555');
INSERT INTO `shs_topics` VALUES ('28', '1.	Akademiko, Di-akademikong Gawain: Paggawa ng Mini-Corner ng mga Kursong Pagpipilian sa Kolehiyo', '9', '571');
INSERT INTO `shs_topics` VALUES ('29', '2.	Mapanuring Pagbasa sa Akademiya; Pagbuo ng Tala-Basa o Reader-Response Journal', '9', '571');
INSERT INTO `shs_topics` VALUES ('30', '3.	Mapanuring Pagsulat sa Akademiya: Pagsulat ng Mapanuring Sanaysay', '9', '571');
INSERT INTO `shs_topics` VALUES ('31', '4.	Etika at Pagpapahalaga sa Akademiya: Pagsulat ng Replektibong Sanaysay', '9', '571');
INSERT INTO `shs_topics` VALUES ('32', '5.	Pagbuo, Pag-uugnay at Pagbubuod ng mga ideya', '9', '571');
INSERT INTO `shs_topics` VALUES ('33', 'Introduction to Different Types of Hazards', '9', '573');
INSERT INTO `shs_topics` VALUES ('34', 'Introduction to Disaster Concepts', '9', '573');
INSERT INTO `shs_topics` VALUES ('37', '6. Pagsulat sa larangan ng Humanidades: Pagbuo ng Lakbay-Sanaysay', '9', '571');
INSERT INTO `shs_topics` VALUES ('38', '7. Pagsulat sa Larangan ng Agham Panlipunan: Pagkritik', '9', '571');
INSERT INTO `shs_topics` VALUES ('39', 'Earthquake Hazards', '9', '573');
INSERT INTO `shs_topics` VALUES ('40', 'Volcanic Hazards', '9', '573');
INSERT INTO `shs_topics` VALUES ('41', '8. Pagsulat sa Larangan ng Siyensiya at Teknolohiya: Pagbuo ng Pananliksik o Kritikal na Editoryal', '9', '571');
INSERT INTO `shs_topics` VALUES ('42', 'Other Geological Hazards', '9', '573');
INSERT INTO `shs_topics` VALUES ('43', '1.	Pagpapayaman at Pag-oorganisa ng Datos: Charcter Sketch', '10', '571');
INSERT INTO `shs_topics` VALUES ('44', '2.	Pag-unawa sa Paksa at Pagtitipon at Pag-oorganisa ng Datos: Pagsulat ng Ulat', '10', '571');
INSERT INTO `shs_topics` VALUES ('45', 'Precautionary and Safety Measures for Landslides, Earthquakes and Volcanic Eruptions', '9', '573');
INSERT INTO `shs_topics` VALUES ('46', 'Topics in Analytic Geometry', '9', '567');
INSERT INTO `shs_topics` VALUES ('47', '3.	Pagsusuri ng Gawaing Malikhain: Pagsulat ng Rebyu 1', '10', '571');
INSERT INTO `shs_topics` VALUES ('48', '4.	Pagsusuri ng gawaing Akademiko Pagsulat ng Rebyu 2', '10', '571');
INSERT INTO `shs_topics` VALUES ('49', '5. Pagsusuri ng Isyu at Pagbuo ng Tindig sa Posisyong Papel', '10', '571');
INSERT INTO `shs_topics` VALUES ('50', '7. Pagbabahagi ng Kaalaman sa Paraang Pagbigkas: Talumpati', '10', '571');
INSERT INTO `shs_topics` VALUES ('51', '6. Pagbuo ng Panukalang Saliksik', '10', '571');
INSERT INTO `shs_topics` VALUES ('52', '8. Pagbabahagi ng Produkto ng Gawaing Akademiko:Iilang Paraan ng Presentasyon ng Saliksik', '10', '571');
INSERT INTO `shs_topics` VALUES ('54', 'trigonometric functions', '10', '567');
INSERT INTO `shs_topics` VALUES ('61', 'Communication', '9', '539');
INSERT INTO `shs_topics` VALUES ('64', 'Doing Philosophy', '9', '551');
INSERT INTO `shs_topics` VALUES ('65', 'Communication Models', '9', '539');
INSERT INTO `shs_topics` VALUES ('70', 'Five Elements of Communication Verbal and Non verbal Communication', '9', '539');
INSERT INTO `shs_topics` VALUES ('74', 'Effective Communication Skills', '9', '539');
INSERT INTO `shs_topics` VALUES ('77', 'Intercultural Communication', '9', '539');
INSERT INTO `shs_topics` VALUES ('78', 'Functions of Communication', '9', '539');
INSERT INTO `shs_topics` VALUES ('80', 'Doing Philosophy', '9', '552');
INSERT INTO `shs_topics` VALUES ('81', 'Types of Speech Context', '9', '539');
INSERT INTO `shs_topics` VALUES ('84', 'Methods of Philosophizing', '9', '551');
INSERT INTO `shs_topics` VALUES ('85', 'The Human Person as an Embodied Spirit', '9', '551');
INSERT INTO `shs_topics` VALUES ('86', 'Types of Speech Styles', '9', '539');
INSERT INTO `shs_topics` VALUES ('87', 'The Human Person in their Environment', '9', '551');
INSERT INTO `shs_topics` VALUES ('88', 'Freedom of the human person  ', '10', '551');
INSERT INTO `shs_topics` VALUES ('89', 'Types of Speech Acts', '9', '539');
INSERT INTO `shs_topics` VALUES ('90', 'Types of Communicative Strategies', '9', '539');
INSERT INTO `shs_topics` VALUES ('91', 'Intersubjectivity', '10', '551');
INSERT INTO `shs_topics` VALUES ('93', 'The Human Society in the Society', '10', '551');
INSERT INTO `shs_topics` VALUES ('94', 'Human persons as oriented towards their impending death', '10', '551');
INSERT INTO `shs_topics` VALUES ('95', 'Types of Speeches According to Purpose', '10', '539');
INSERT INTO `shs_topics` VALUES ('96', 'Types of Speeches According to Delivery ', '10', '539');
INSERT INTO `shs_topics` VALUES ('98', 'Principles of Speech Writing', '10', '539');
INSERT INTO `shs_topics` VALUES ('99', 'Outlining the Speech Contents', '10', '539');
INSERT INTO `shs_topics` VALUES ('103', 'Principles of Speech Delivery ', '10', '539');
INSERT INTO `shs_topics` VALUES ('105', 'FUNCTION', '9', '556');
INSERT INTO `shs_topics` VALUES ('106', 'OPERATIONS ON FUNCTIONS', '9', '556');
INSERT INTO `shs_topics` VALUES ('107', 'INVERSE FUNCTIONS', '9', '556');
INSERT INTO `shs_topics` VALUES ('108', 'Rational Equations and Inequalities', '9', '556');
INSERT INTO `shs_topics` VALUES ('109', 'RATIONAL FUNCTION', '9', '556');
INSERT INTO `shs_topics` VALUES ('110', 'Exponential Functions', '9', '556');
INSERT INTO `shs_topics` VALUES ('112', 'LOGARITHMIC FUNCTIONS AND THEIR GRAPHS', '9', '556');
INSERT INTO `shs_topics` VALUES ('113', 'Laws of Logarithms', '9', '556');
INSERT INTO `shs_topics` VALUES ('114', 'Simple Interest', '10', '556');
INSERT INTO `shs_topics` VALUES ('115', 'Simple Annuity', '10', '556');
INSERT INTO `shs_topics` VALUES ('116', 'General Annuity', '10', '556');
INSERT INTO `shs_topics` VALUES ('117', 'Stocks and Bonds', '10', '556');
INSERT INTO `shs_topics` VALUES ('118', 'Propositions and Symbols', '10', '556');
INSERT INTO `shs_topics` VALUES ('119', 'Truth Tables', '10', '556');
INSERT INTO `shs_topics` VALUES ('120', 'Forms of Conditional Proposition', '10', '556');
INSERT INTO `shs_topics` VALUES ('121', 'Tautologies and Fallacies', '10', '556');
INSERT INTO `shs_topics` VALUES ('122', 'Writing Proofs ', '10', '556');
INSERT INTO `shs_topics` VALUES ('124', 'Exercise For Fitness', '9', '592');
INSERT INTO `shs_topics` VALUES ('125', 'Exercise Program Design', '9', '592');
INSERT INTO `shs_topics` VALUES ('126', 'Types of Fitness Actives', '9', '592');
INSERT INTO `shs_topics` VALUES ('127', 'Aerobic and Zumba ', '9', '592');
INSERT INTO `shs_topics` VALUES ('128', 'Modifiable Risk Factors of Lifestyle Diseases', '10', '592');
INSERT INTO `shs_topics` VALUES ('129', 'Fuel for Performance', '10', '592');
INSERT INTO `shs_topics` VALUES ('130', 'Stress', '10', '592');
INSERT INTO `shs_topics` VALUES ('131', 'Definition of a trend', '9', '893');
INSERT INTO `shs_topics` VALUES ('132', 'The process of identifying a trend', '9', '893');
INSERT INTO `shs_topics` VALUES ('133', 'Differentiating a trend from a fad', '9', '893');
INSERT INTO `shs_topics` VALUES ('134', 'Elements of a trend', '9', '893');
INSERT INTO `shs_topics` VALUES ('136', 'The characteristics of a trend', '9', '893');
INSERT INTO `shs_topics` VALUES ('137', 'Strategic analysis', '9', '893');
INSERT INTO `shs_topics` VALUES ('138', 'Intuitive thinking', '9', '893');
INSERT INTO `shs_topics` VALUES ('139', 'Labor', '9', '893');
INSERT INTO `shs_topics` VALUES ('140', 'Migration', '9', '893');
INSERT INTO `shs_topics` VALUES ('142', 'The effects of consumption and production patterns to climate change', '10', '893');
INSERT INTO `shs_topics` VALUES ('149', 'The effects of climate change', '10', '893');
INSERT INTO `shs_topics` VALUES ('150', 'Steps to address the problems of climate change', '10', '893');
INSERT INTO `shs_topics` VALUES ('151', 'Democratic Interventions', '10', '893');
INSERT INTO `shs_topics` VALUES ('152', 'Information Communication Technology (ICT)', '10', '893');
INSERT INTO `shs_topics` VALUES ('153', 'Connections, Relationships, and Networks', '10', '893');
INSERT INTO `shs_topics` VALUES ('154', 'The Neural and Social Networks', '10', '893');
INSERT INTO `shs_topics` VALUES ('155', 'NATURE OF INQUIRY AND RESEARCH', '9', '565');
INSERT INTO `shs_topics` VALUES ('156', 'IDENTIFYING THE INQUIRY AND STATING THE PROBLEM', '9', '565');
INSERT INTO `shs_topics` VALUES ('157', 'LEARNING FROM OTHERS AND REVIEWING THE LITERATURE', '9', '565');
INSERT INTO `shs_topics` VALUES ('158', 'UNDERSTANDING DATA AND WAYS TO SYSTEMATICALLY COLLECT DATA', '10', '565');
INSERT INTO `shs_topics` VALUES ('159', 'FINDING ANSWERS THROUGH DATA COLLECTION', '10', '565');
INSERT INTO `shs_topics` VALUES ('160', 'REPORTING AND SHARING FINDINGS', '10', '565');
INSERT INTO `shs_topics` VALUES ('161', 'INFORMATION AND COMMUNICATION TECHNOLOGY', '9', '558');
INSERT INTO `shs_topics` VALUES ('162', 'RULES OF NETIQUETTE', '9', '558');
INSERT INTO `shs_topics` VALUES ('163', 'APPLIED PRODUCTIVITY TOOLS WITH ADVANCED APPLICATION TECHNIQUE', '9', '558');
INSERT INTO `shs_topics` VALUES ('164', 'IMAGING AND DESIGN FOR THE ONLINE ENVIRONMENT', '9', '558');
INSERT INTO `shs_topics` VALUES ('165', 'ONLINE PLATFORMS AS TOOLS FOR ICT CONTENT DEVELOPMENT', '9', '558');
INSERT INTO `shs_topics` VALUES ('166', 'COLLABORATIVE DEVELOPMENT OF ICT CONTENT', '9', '558');
INSERT INTO `shs_topics` VALUES ('167', 'MULTIMEDIA AND ICT', '9', '558');
INSERT INTO `shs_topics` VALUES ('168', 'ICTS AS PLATFORM FOR CHANGE', '9', '558');
INSERT INTO `shs_topics` VALUES ('169', 'DEVELOPING AN ICT PROJECT FOR SOCIAL CHANGE', '9', '558');
INSERT INTO `shs_topics` VALUES ('170', 'PUBLISHING AN ICT PROJECT', '9', '558');
INSERT INTO `shs_topics` VALUES ('171', 'SUSTAINING AN ICT PROJECT FOR SOCIAL CHANGE', '9', '558');
INSERT INTO `shs_topics` VALUES ('178', 'topic1', '9', '616');
INSERT INTO `shs_topics` VALUES ('179', 'topic2', '10', '616');

-- ----------------------------
-- Table structure for shs_tos
-- ----------------------------
DROP TABLE IF EXISTS `shs_tos`;
CREATE TABLE `shs_tos` (
  `shs_tos_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_kno_ni` int(11) DEFAULT NULL,
  `shs_com_ni` int(11) DEFAULT NULL,
  `shs_app_ni` int(11) DEFAULT NULL,
  `shs_ana_ni` int(11) DEFAULT NULL,
  `shs_eva_ni` int(11) DEFAULT NULL,
  `shs_syn_ni` int(11) DEFAULT NULL,
  `shs_kno_np` int(11) DEFAULT NULL,
  `shs_com_np` int(11) DEFAULT NULL,
  `shs_app_np` int(11) DEFAULT NULL,
  `shs_ana_np` int(11) DEFAULT NULL,
  `shs_eva_np` int(11) DEFAULT NULL,
  `shs_syn_np` int(11) DEFAULT NULL,
  `shs_tq_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_tos_id`),
  KEY `shs_tq_shs_tos` (`shs_tq_id`),
  CONSTRAINT `shs_tq_shs_tos` FOREIGN KEY (`shs_tq_id`) REFERENCES `shs_tq` (`shs_tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_tos
-- ----------------------------
INSERT INTO `shs_tos` VALUES ('3', '1', '1', '1', '1', '1', '1', '2', '2', '1', '1', '2', '2', '16');

-- ----------------------------
-- Table structure for shs_tos_topic
-- ----------------------------
DROP TABLE IF EXISTS `shs_tos_topic`;
CREATE TABLE `shs_tos_topic` (
  `shs_tostopic_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_topic_desc` text,
  `shs_num_of_hours` varchar(40) DEFAULT NULL,
  `shs_tos_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_tostopic_id`),
  KEY `shs_tos_shs_tos_topic` (`shs_tos_id`),
  CONSTRAINT `shs_tos_shs_tos_topic` FOREIGN KEY (`shs_tos_id`) REFERENCES `shs_tos` (`shs_tos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_tos_topic
-- ----------------------------
INSERT INTO `shs_tos_topic` VALUES ('2', 'topic1', '2', '3');
INSERT INTO `shs_tos_topic` VALUES ('3', 'topic2', '2', '3');

-- ----------------------------
-- Table structure for shs_tq
-- ----------------------------
DROP TABLE IF EXISTS `shs_tq`;
CREATE TABLE `shs_tq` (
  `shs_tq_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_main_direction` text,
  `shs_num_copies` int(11) DEFAULT NULL,
  `shs_main_attach` varchar(100) DEFAULT NULL,
  `exam_id` int(40) NOT NULL,
  `shs_syll_id` int(11) NOT NULL,
  `shs_upload_tq` varchar(255) DEFAULT NULL,
  `shs_upload_tos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shs_tq_id`),
  KEY `major_exams_shs_tq` (`exam_id`),
  KEY `shs_syll_shs_tq` (`shs_syll_id`),
  CONSTRAINT `major_exams_shs_tq` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`),
  CONSTRAINT `shs_syll_shs_tq` FOREIGN KEY (`shs_syll_id`) REFERENCES `shs_syll` (`shs_syll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_tq
-- ----------------------------
INSERT INTO `shs_tq` VALUES ('16', 'Do not write anything on the test questionnaire. Write all of your answers in your answer sheet/s. Calculators are not allowed during the examination. Any kind of cheating is prohibited. Once caught, the examination sheet invalidates the score.', '15', null, '9', '19', null, null);
INSERT INTO `shs_tq` VALUES ('17', null, '11', null, '10', '19', 'TQ-JO-21st Century Literature from the Philippines and the World-2018-2019-1st-SECOND QUARTER-04292019110648.docx', 'TOS-JO-21st Century Literature from the Philippines and the World-2018-2019-1st-TOS-SECOND QUARTER-04292019110653.docx');

-- ----------------------------
-- Table structure for shs_tqstatus
-- ----------------------------
DROP TABLE IF EXISTS `shs_tqstatus`;
CREATE TABLE `shs_tqstatus` (
  `shs_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `shs_status_desc` varchar(100) DEFAULT NULL,
  `shs_ph` varchar(40) DEFAULT NULL,
  `shs_late` varchar(40) DEFAULT NULL,
  `shs_revise_count` int(10) DEFAULT NULL,
  `shs_date_time` datetime DEFAULT NULL,
  `shs_notif_status` varchar(40) DEFAULT NULL,
  `shs_tq_id` int(11) NOT NULL,
  PRIMARY KEY (`shs_status_id`),
  KEY `shs_tq_shs_tqstatus` (`shs_tq_id`),
  CONSTRAINT `shs_tq_shs_tqstatus` FOREIGN KEY (`shs_tq_id`) REFERENCES `shs_tq` (`shs_tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shs_tqstatus
-- ----------------------------
INSERT INTO `shs_tqstatus` VALUES ('16', 'printed', 'instructor', 'no', null, '2019-04-29 10:58:59', 'read', '16');
INSERT INTO `shs_tqstatus` VALUES ('17', 'printed', 'instructor', 'no', null, '2019-04-29 11:09:19', 'read', '17');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_code` varchar(40) DEFAULT NULL,
  `subj_name` varchar(100) DEFAULT NULL,
  `subj_desc` varchar(100) DEFAULT NULL,
  `lec_unit` int(11) DEFAULT NULL,
  `lab_unit` int(11) DEFAULT NULL,
  `pre_requisite` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=893 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('165', 'GE11A', 'Communication Skills 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('166', 'GE121A', 'Komunikasyon sa Akademikong Filipino', '', '3', '0', '');
INSERT INTO `subject` VALUES ('169', 'GE211A', 'College Algebra', '', '3', '0', '');
INSERT INTO `subject` VALUES ('170', 'CS101', 'Computer Fundamentals w/ Business Application Software', '', '2', '1', '');
INSERT INTO `subject` VALUES ('171', 'GE511A', 'Euthenics 1', '', '1', '0', '');
INSERT INTO `subject` VALUES ('172', 'GE521A', 'Physical Education 1', '', '2', '0', '');
INSERT INTO `subject` VALUES ('173', 'GE531', 'National Service  Training Program 1  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('174', 'GE112B', 'Communication Skills 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('175', 'MKTG334', 'Major Course 5-Advertising', '', '3', '0', '');
INSERT INTO `subject` VALUES ('176', 'GE212B', 'Trigonometry', '\r\n', '3', '0', '');
INSERT INTO `subject` VALUES ('177', 'GE213B', 'Statistics and Probability', '', '3', '0', '');
INSERT INTO `subject` VALUES ('178', 'GE313B', 'Physical Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('179', 'CS102B', 'Intro to Information Systems', '', '2', '1', '');
INSERT INTO `subject` VALUES ('180', 'CS301B', 'Intro to Programming (C Language)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('181', 'GE512B', 'Euthenics 2', '', '1', '0', '');
INSERT INTO `subject` VALUES ('183', 'GE532', 'National Service   Training Program 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('184', 'GE113', 'Speech Communication 1 ', '\r\n', '3', '0', '');
INSERT INTO `subject` VALUES ('185', 'GE151', 'Art, Man  and   Society  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('186', 'IT101', 'Accounting for Non Accountants', '', '3', '0', '');
INSERT INTO `subject` VALUES ('187', 'CS202A', 'Discrete Mathematics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('189', 'CS302A', 'Computer Programming 1 (C++)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('190', 'IT101A', 'Accounting for Non Accountants', '', '3', '0', '');
INSERT INTO `subject` VALUES ('191', 'GE523', 'Physical  Education 3', '', '2', '0', '');
INSERT INTO `subject` VALUES ('192', 'ITE201B', 'Computer Installation & Configuration (CHS1)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('195', 'TCM211', 'Basic Mathematical Processes', '', '3', '0', '');
INSERT INTO `subject` VALUES ('196', 'TCM311', 'Principles of Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('197', 'CBA111', 'Fundamentals of Accounting 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('199', 'TCM411', 'Physical Fitness', '', '2', '0', '');
INSERT INTO `subject` VALUES ('201', 'CBA122', 'Fundamentals of Accounting 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('202', 'CBA211', 'Computer-Based Accounting 1', '', '4', '2', '');
INSERT INTO `subject` VALUES ('203', 'BE201', 'Introduction to  Business and Phil. Financial System  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('204', 'CBA312', 'Income Taxation', '', '3', '0', '');
INSERT INTO `subject` VALUES ('205', 'TCM421', 'Rhythmic Activities', '', '2', '0', '');
INSERT INTO `subject` VALUES ('206', 'TCM312', 'Work Ethics and Standards', '', '3', '0', '');
INSERT INTO `subject` VALUES ('207', 'GE131', 'Philippine  Literature  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('208', 'CBA131', 'Partnership and Corporation', '', '2', '1', '');
INSERT INTO `subject` VALUES ('209', 'CS305A', 'Computer Organization and Assembly Language (CHS)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('210', 'GE415A', 'Life and Works of Jose Rizal', '', '3', '0', '');
INSERT INTO `subject` VALUES ('211', 'CBA221', 'Computer-Based Accounting 2', '', '4', '2', '');
INSERT INTO `subject` VALUES ('212', 'CS411A', 'Modelling and Simulation', '', '3', '0', '');
INSERT INTO `subject` VALUES ('213', 'TCM432', 'Individual / Dual Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('214', 'GE304', 'Intro. to Microeconomic Theory & Policy w/ LRT', '', '3', '0', '');
INSERT INTO `subject` VALUES ('215', 'TCM142', 'Technical, Scientific & Business English', '', '3', '0', '');
INSERT INTO `subject` VALUES ('216', 'CBA142', 'Management Accounting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('217', 'IT302', 'Multimedia Systems', '', '2', '1', '');
INSERT INTO `subject` VALUES ('218', 'CBA232', 'Computer-Based Accounting Integrated', '', '2', '1', '');
INSERT INTO `subject` VALUES ('219', 'CBA700', 'Special Project in Computer-Based Accounting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('220', 'CBA800', 'On the Job Training', '', '3', '0', '');
INSERT INTO `subject` VALUES ('223', 'CS500B', 'CS Practicum (min. of 162 hours)', '', '0', '6', '');
INSERT INTO `subject` VALUES ('224', 'MGT311', 'Production and Operations Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('225', 'CS600A', 'CS Thesis A', '', '3', '0', '');
INSERT INTO `subject` VALUES ('226', 'BE502', 'Human Behavior in Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('227', 'CS379', 'Unified Functional Testing (HP) (Free Elective 3)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('228', 'CS404B', 'Principles Of Operating Systems and Its Application', '', '2', '1', '');
INSERT INTO `subject` VALUES ('230', 'CS405B', 'Data Communication & Networking 1 (CHS3)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('231', 'CS600B', 'CS Thesis B', '', '3', '0', '');
INSERT INTO `subject` VALUES ('233', 'IT202B', 'System Analysis and Design ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('234', 'BE101', 'Intro to Macroeconomic Theory and Practice', '', '3', '0', '');
INSERT INTO `subject` VALUES ('235', 'CSELECTIVE2', 'CS Major Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('236', 'CSELECTIVE3', 'CS Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('237', 'CSELECTIVE4', 'CS Major Elective 4', '', '3', '0', '');
INSERT INTO `subject` VALUES ('239', 'GE303', 'Society and Culture w/ FP & HIV/SARS Prevention', '', '3', '0', '');
INSERT INTO `subject` VALUES ('240', 'GE414A', 'Introduction to Microeconomic Theory & Policy with LRT', '', '3', '0', '');
INSERT INTO `subject` VALUES ('241', 'CS401A', 'Algorithm Design and Analysis', '', '3', '0', '');
INSERT INTO `subject` VALUES ('242', 'BE403', 'Fundamentals of Accounting 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('243', 'CS403A', 'Principles of Programming Languages with Compilers', '', '3', '0', '');
INSERT INTO `subject` VALUES ('244', 'MKTG31', 'Major Course 1-Pricing Strategy and Tactics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('245', 'CS404A', 'Prin. of Operating Systems & Its Applications', '', '2', '1', '');
INSERT INTO `subject` VALUES ('247', 'CS405A', 'Data Communications & Networking 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('248', 'GE116B', 'Technical, Scientific & Business English', '', '3', '0', '');
INSERT INTO `subject` VALUES ('249', 'ENTRE10', 'Major Elective 1-Entreprenuership', '', '3', '0', '');
INSERT INTO `subject` VALUES ('250', 'CS406B', 'Automata and Language Theory', '', '3', '0', '');
INSERT INTO `subject` VALUES ('251', 'CS408B', 'Computer Programming 2 (JAVA)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('252', 'CS409B', 'Intro. to Software Engineering', '', '2', '1', '');
INSERT INTO `subject` VALUES ('254', 'CS412A', 'ITE Professional Ethics & Values ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('255', 'CS410B', 'Web Programming & Development', '', '2', '1', '');
INSERT INTO `subject` VALUES ('256', 'CSELECTIVE1', 'CS Major Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('257', 'BE504', 'Business Policy & Strategy w/ Total Quality Mgt', '', '3', '0', '');
INSERT INTO `subject` VALUES ('258', 'IS202B', 'Project Management & Quality Systems', '', '3', '0', '');
INSERT INTO `subject` VALUES ('259', 'MKTG33', 'Major Course 7-Professional Salesmanship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('260', 'GE412B', 'Society & Culture w/ FP, Drug Educ. & HIV/AIDS/SARS Prev\'n.', '', '3', '0', '');
INSERT INTO `subject` VALUES ('261', 'GE413B', 'Phil. History, Politics, Governance & Constitution', '', '3', '0', '');
INSERT INTO `subject` VALUES ('262', 'MKTG37', 'Major Course 3-Service Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('263', 'CS203B', 'Mathematical Analysis 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('264', 'CS304B', 'Data Structure and Algorithms', '', '2', '1', '');
INSERT INTO `subject` VALUES ('265', 'MKTG35', 'Major Elective 4-franchising and Direct Marketing ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('267', 'CS306B', 'Object Oriented Programming', '', '2', '1', '');
INSERT INTO `subject` VALUES ('268', 'MG104', 'Major Elective 5 - Marketing Analysis', '', '3', '0', '');
INSERT INTO `subject` VALUES ('269', 'CS377', 'Application Lifecycle Management (HP) (Free Elective 1)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('270', 'CS201A', 'Mathematical Analysis 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('271', 'CS103A', 'Internet Technologies', '', '2', '1', '');
INSERT INTO `subject` VALUES ('272', 'BE601', 'Law on Obligation and Contracts', '', '3', '0', '');
INSERT INTO `subject` VALUES ('273', 'CS303A', 'Digital Designs ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('274', 'BE701', 'Philippine Tax System and Income Tax', '', '3', '0', '');
INSERT INTO `subject` VALUES ('277', 'BE503', 'Human Resource Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('278', 'BE407', 'Basic  Finance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('279', 'MKTG30', 'Major Course 2-Creativity Innovation & New Products', '', '3', '0', '');
INSERT INTO `subject` VALUES ('280', 'MKTG32', 'Major Course 3-Integrated Marketing Communication', '', '3', '0', '');
INSERT INTO `subject` VALUES ('281', 'FMGT302', 'Major Course 2 - Financial Markets and Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('282', 'FMGT301', 'Major  Course 1 - Financial Analysis and Reporting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('283', 'FMGT311', 'Major Elective 1 - Management of Financial  Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('284', 'FMGT303', 'Major Course 3 - Investment Portfolio Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('285', 'FMGT304', 'Major Course 4 - Credit and Collection', '', '3', '0', '');
INSERT INTO `subject` VALUES ('286', 'FMGT305', 'Major Course 5 - Corporate Finance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('287', 'FMGT306', 'Major Course 6 - Monetary Policy and Central Banking ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('288', 'FMGT312', 'Major Elective 2 - Electronic Banking ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('289', 'FMGT307', 'Major Course 7 - Capital Markets', '', '3', '0', '');
INSERT INTO `subject` VALUES ('290', 'FMGT308', 'Major Course 8 - Strategic Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('291', 'FMGT313', 'Major Elective 3 - Risk Analysis and Risk Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('292', 'FMGT314', 'Major Elective 4 - Marketing Of Financial Services', '', '3', '0', '');
INSERT INTO `subject` VALUES ('293', 'FMGT315', 'Major Elective 5 - Seminars in Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('294', 'MG108', 'Practicum / OJT', '', '9', '0', '');
INSERT INTO `subject` VALUES ('295', 'MG107', 'Case Study', '', '3', '0', '');
INSERT INTO `subject` VALUES ('296', 'BE901', 'Bus.Ethics w/ Social Responsibility & Good Governance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('297', 'BE801', 'Business   Statistics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('298', 'GE122B', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', '', '3', '0', '');
INSERT INTO `subject` VALUES ('299', 'MKTG332', 'Major Course 4-Customer Relationship Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('300', 'CS412B', 'ITE Professional Ethics and Values', '', '3', '0', '');
INSERT INTO `subject` VALUES ('301', 'IT302A', 'Multimedia Systems', '/,.12csdjkna:\"P_+_(908-=%^', '2', '1', '');
INSERT INTO `subject` VALUES ('302', 'IT201B', 'Comp. Inst\'n. & Configuration', '', '2', '1', '');
INSERT INTO `subject` VALUES ('303', 'IT600', 'IT Capstone Project (Entrepreneurship)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('304', 'IT304B', 'Network Security', 'msdnhf28391\":}&$%%*^', '2', '1', '');
INSERT INTO `subject` VALUES ('305', 'IT303B', 'Current Trends in IT', '', '2', '1', '');
INSERT INTO `subject` VALUES ('306', 'IT301B', 'Database Management Systems 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('307', 'ITMAJEL2', 'IT Major Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('308', 'IT500A', 'IT Practicum (min. 486 hours)', 'fkld;ml$%^@T*&^78908?\":<>', '0', '8', '');
INSERT INTO `subject` VALUES ('309', 'IS202', 'Project Management & Quality Systems', '', '3', '0', '');
INSERT INTO `subject` VALUES ('310', 'IT500', 'IT Practicum (min. 486 hours)', '', '0', '9', '');
INSERT INTO `subject` VALUES ('311', 'GE524', 'Physical Education  4 ', '', '2', '0', '');
INSERT INTO `subject` VALUES ('312', 'ITMAJEL1', 'IT Major Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('317', 'CS6399', 'CS Design Project 2', '', '0', '3', '');
INSERT INTO `subject` VALUES ('318', 'CS6306', 'Unified Functional Testing', '', '2', '1', '');
INSERT INTO `subject` VALUES ('319', 'GE6301', 'Life and Works of Rizal', '', '3', '0', '');
INSERT INTO `subject` VALUES ('320', 'GE6107', 'Ethics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('321', 'ITE6301', 'Technopreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('322', 'CS6398', 'CS Design Project 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('324', 'CS6305', 'CS Practicum (162 hours)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('325', 'CS6304', 'Modeling and Simulation', '', '2', '1', '');
INSERT INTO `subject` VALUES ('327', 'GE6100', 'Understanding the Self', '', '3', '0', '');
INSERT INTO `subject` VALUES ('328', 'GE6116', 'Science, Technology and Society', '', '3', '0', '');
INSERT INTO `subject` VALUES ('330', 'GE6101', 'Readings in Philippine History', '', '3', '0', '');
INSERT INTO `subject` VALUES ('331', 'PHYED6103', 'Individual/Dual Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('332', 'CS6302', 'Application Lifecycle Management', '', '2', '1', '');
INSERT INTO `subject` VALUES ('333', 'GE6102', 'The Contemporary World', '', '3', '0', '');
INSERT INTO `subject` VALUES ('334', 'ITE6300', 'Cloud Computing and the Internet of Things', '', '2', '1', '');
INSERT INTO `subject` VALUES ('335', 'CS6206', 'Principle of Operating Systems and Its Applications', '', '2', '1', '');
INSERT INTO `subject` VALUES ('336', 'FILI6301', 'Pagsasaling Pampanitikan', '', '3', '0', '');
INSERT INTO `subject` VALUES ('337', 'ITE6104', 'Computer Programming 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('338', 'GE6115', 'Art Appreciation', '', '3', '0', '');
INSERT INTO `subject` VALUES ('339', 'GE6221', 'Living in the IT Era', '', '3', '0', '');
INSERT INTO `subject` VALUES ('340', 'GE114B', 'Speech Communication 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('342', 'GE6304', 'The Entrepreneurial Mind', '', '3', '0', '');
INSERT INTO `subject` VALUES ('344', 'BAMM6101', 'Macroeconomics Theory and Practice', '', '3', '0', '');
INSERT INTO `subject` VALUES ('345', 'CS6210', 'Software Engineering 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('346', 'BAMM6400', 'Practicum (600 hrs)', '', '6', '0', '');
INSERT INTO `subject` VALUES ('347', 'CS6207', 'Programming Languages with Compiler', '', '2', '1', '');
INSERT INTO `subject` VALUES ('348', 'BAMM6401', 'Thesis 1 Thesis Writing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('349', 'CS6209', 'Software Engineering 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('350', 'BAFM6002', 'Elective 3 Financial Controllership', '', '3', '0', '');
INSERT INTO `subject` VALUES ('351', 'ITE6202', 'Social and Professional Issues', '', '3', '0', '');
INSERT INTO `subject` VALUES ('352', 'BAMM6402', 'Thesis 2 Thesis Writing 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('353', 'CS6204', 'Computer Architecture and Organization', '', '2', '1', '');
INSERT INTO `subject` VALUES ('354', 'BAFM6004', 'Elective 4 - Personal Finance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('355', 'BAFM6005', 'Elective 5 - Venture Capital', '', '3', '0', '');
INSERT INTO `subject` VALUES ('356', 'CS6205', 'Automata Theory and Formal Language', '', '3', '0', '');
INSERT INTO `subject` VALUES ('358', 'MGT6140A', 'Production Operations Management with TQM', '', '3', '0', '');
INSERT INTO `subject` VALUES ('359', 'BAFM6006', 'Elective 6 - Risk Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('360', 'IT6205A', 'Information Assurance and Security 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('363', 'COMP6101', 'Current Trends and Issues in Information System', '', '3', '0', '');
INSERT INTO `subject` VALUES ('364', 'BAFM6007', 'Elective 7 - Cooperative Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('365', 'ITE6200', 'Application Development and Emerging Technology', '', '2', '1', '');
INSERT INTO `subject` VALUES ('366', 'GE111', 'Communication Skills  1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('367', 'ITE6220', 'Information Management', '', '2', '1', '');
INSERT INTO `subject` VALUES ('368', 'BAMM6205', 'Business Ethics with Good Gov\'n & Social Resp', '', '3', '0', '');
INSERT INTO `subject` VALUES ('369', 'BAMM6301', 'International Business and Trade', '', '3', '0', '');
INSERT INTO `subject` VALUES ('370', 'IT6223', 'Data Communications and Networking 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('371', 'GE6302', 'Philippine Popular Culture', '', '3', '0', '');
INSERT INTO `subject` VALUES ('373', 'CS402', 'Database Management Systems 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('374', 'BAFM6302', 'Financial Analysis and Reporting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('375', 'BAMM6401', 'BA-MM Thesis Writing 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('376', 'BAMM6203', 'Marketing Research', '', '3', '0', '');
INSERT INTO `subject` VALUES ('377', 'CS6301', 'Logic Design & Digital Computer Circuits', '', '2', '1', '');
INSERT INTO `subject` VALUES ('378', 'BAFM6303', 'Credit and Collection', '', '3', '0', '');
INSERT INTO `subject` VALUES ('379', 'GE141', 'Intro to Philosophy w/ Logic ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('380', 'COMP6103', 'Current Trends and Issues', '', '2', '1', '');
INSERT INTO `subject` VALUES ('381', 'GE411', 'General  Psychology ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('382', 'GE302B', 'Phil. History w/ Politics and Governance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('383', 'CS6202', 'Algorithms and Complexity', '', '3', '0', '');
INSERT INTO `subject` VALUES ('384', 'GE211', 'College  Algebra', '', '3', '0', '');
INSERT INTO `subject` VALUES ('385', 'CS6203', 'Object-Oriented Programming', '', '2', '1', '');
INSERT INTO `subject` VALUES ('389', 'BAFM6006(1)', 'Elective 1 - Public Finance', '', '2', '1', '');
INSERT INTO `subject` VALUES ('390', 'PHYED6200', 'Team  Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('391', 'BAMM6302', 'Distribution Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('392', 'BAMM6304', 'Business Research', '', '3', '0', '');
INSERT INTO `subject` VALUES ('393', 'BAMM6007', 'Internet Marketing and Entrepreneurship (Elective 7)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('395', 'GE521', 'Physical Education 1 ', '', '2', '0', '');
INSERT INTO `subject` VALUES ('396', 'BAMM6303', 'Advertising', '', '3', '0', '');
INSERT INTO `subject` VALUES ('397', 'BAFM6305', 'Investment and Portfolio Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('398', 'BE301A', 'Principles of Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('399', 'GE112', 'Communication Skills 2 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('400', 'MGT6370', 'Strategic Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('401', 'GE122', 'Pagbasa at Pagsulat Tungo sa Pananaliksik ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('402', 'OFAD6006', 'Web Design (Elective 1)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('403', 'IT6202', 'Database and Management System 1 (Oracle)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('404', 'BAFM6306', 'Capital Markets', '', '3', '0', '');
INSERT INTO `subject` VALUES ('405', 'ITE6201', 'Data Structures and Algorithms', '', '2', '1', '');
INSERT INTO `subject` VALUES ('406', 'BAFM6307', 'Special Topics in Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('407', 'BAMM6006', 'International Marketing (Elective 6)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('408', 'CS6201', 'Discrete Structures 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('409', 'BAMM6305', 'Product Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('410', 'BAFM6003', 'Elective 2 - Treasury Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('411', 'BAMM6308', 'Feasibility Study', '', '3', '0', '');
INSERT INTO `subject` VALUES ('412', 'IT6201', 'Data Communications and Networking 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('413', 'IT6203', 'Database and Management System 2 (Oracle 10g Admin 2)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('414', 'GE131A', 'Philippine Literature', '', '3', '0', '');
INSERT INTO `subject` VALUES ('415', 'BAMM6306', 'Retail Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('416', 'BAMM6005', 'Environmental Marketing (Elective 5)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('417', 'GE213', 'Statistics and Probability ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('418', 'CS6200', 'Introduction to Human  Computer Interaction ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('419', 'IT6202A', 'Information Assurance and Security 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('420', 'GE303B', 'Society & Culture w/ FP & HIV/SARS Prevention', '', '3', '0', '');
INSERT INTO `subject` VALUES ('421', 'GE313', 'Physical Science ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('422', 'BAMM6307', 'Pricing Strategy and Tactics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('424', 'BAFM6203', 'Banking and Financial Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('425', 'NSTP6102', 'National Service Training  Program 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('426', 'CS102', 'Intro to Information Systems ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('427', 'BAMM6004', 'Personal Finance (Elective 4)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('428', 'BAMM6003', 'New Market Development (Elective 3)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('429', 'BAFM6204', 'Monetary Policy and Central Banking ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('430', 'BAMM6002', 'Franchising (Elective 2)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('431', 'IT6209', 'Introduction to Multimedia', '', '2', '1', '');
INSERT INTO `subject` VALUES ('432', 'PHYED6102', 'Rhythmic  Activities', '', '2', '0', '');
INSERT INTO `subject` VALUES ('433', 'BAFM6102', 'Financial Management ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('434', 'MGT6370A', 'Strategic  Management ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('435', 'IT6208', 'System Integration and Architecture 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('436', 'BE403B', 'Fundamentals of Accounting 3 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('437', 'ETHNS6102', 'Euthenics  2', '', '1', '0', '');
INSERT INTO `subject` VALUES ('438', 'MKTG311', 'Major Course 1-Pricing Strategy and Tactics  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('439', 'GE6105', 'Environmental  Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('440', 'ITELEC01', 'IT Major Elective 1 (Object Oriented Programming)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('441', 'CS301', 'Intro to Programming (C Language) ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('442', 'IT6300', 'Data Communications and Networking 4', '', '2', '1', '');
INSERT INTO `subject` VALUES ('444', 'ENTRE101', 'Major Elective 1 - Entrepreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('445', 'CS6100', 'Discrete Structures 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('446', 'GE6300', 'Life and Works of  Rizal', '', '3', '0', '');
INSERT INTO `subject` VALUES ('447', 'IT6301', 'System Administration and Maintenance', '', '2', '1', '');
INSERT INTO `subject` VALUES ('448', 'ITMAJEL4', 'IT Major Elective 4', '', '3', '0', '');
INSERT INTO `subject` VALUES ('452', 'NSTP6101', 'National  Service Training Program 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('453', 'GE522', 'Physical Education 2', '', '2', '0', '');
INSERT INTO `subject` VALUES ('454', 'ETHNS6101', 'Euthenics  1', '', '1', '0', '');
INSERT INTO `subject` VALUES ('455', 'ENGL6100', 'Purposive Communication 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('456', 'PHYED6101', 'Physical  Fitness', '', '2', '0', '');
INSERT INTO `subject` VALUES ('457', 'GE232A', 'Business Software Packages  ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('458', 'GE223A', 'Environmental Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('459', 'GE312', 'Environmental Science ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('460', 'BE402', 'Fundamentals of   Accounting 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('461', 'CS201', 'Mathematical Analysis 1 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('462', 'BAMM6206', 'Human Resource  Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('463', 'CS202', 'Discrete Mathematics ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('464', 'BE503A', 'Human Resource Management ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('465', 'CS103', 'Internet Technologies ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('466', 'NSCI6100', 'Calculus-Based Physics 1', '', '3', '1', '');
INSERT INTO `subject` VALUES ('467', 'IT6302', 'Integrative Programming and Technology', '', '3', '0', '');
INSERT INTO `subject` VALUES ('468', 'ITFELEC', 'IT Free Elective (Web Systems and Technologies)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('469', 'MKTG301', 'Major Course 2 - Creativity Innovation & New Product Dev\'t', '', '3', '0', '');
INSERT INTO `subject` VALUES ('470', 'CS302', 'Computer Programming 1 (C++) ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('471', 'IT6397', 'IT Practicum (486 hours)', '', '6', '0', '');
INSERT INTO `subject` VALUES ('472', 'CS303', 'Digital Designs ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('473', 'MKTG321', 'Major Course 3 - Integrated Marketing Communications ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('474', 'GE412', 'Society & Culture w/ FP, Drug Educ. & HIV/AIDS/SARS Prev\'n. ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('475', 'CS6303', 'Load Testing', '', '2', '1', '');
INSERT INTO `subject` VALUES ('476', 'GE116', 'Business Communication: Technical, Scientific and Business English', '', '3', '0', '');
INSERT INTO `subject` VALUES ('477', 'ITELEC02', 'IT Major Elective 2 (Systems Integration and Architecture 2)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('478', 'GE6106', 'Purposive Communication 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('479', 'IT6398', 'IT Capstone Project 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('481', 'GE401', 'Life and  Works  of Jose Rizal', '', '3', '0', '');
INSERT INTO `subject` VALUES ('482', 'ITE6102', 'Computer Programming 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('483', 'ITELEC03', 'IT Major Elective 3 ( Integrative Programming Technologies 2)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('484', 'BE601B', 'Law on Obligation and Contracts ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('485', 'MATH6100', 'Calculus 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('486', 'BE701B', 'Philippine Tax System and Income Tax  ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('487', 'GE413', 'Phil. History, Politics, Governance & Constitution ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('488', 'CS203', 'Mathematical Analysis 2 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('489', 'IT6399', 'IT Capstone Project 2', '', '0', '3', '');
INSERT INTO `subject` VALUES ('491', 'CS305', 'Comp. Org\'n. & Assembly Language ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('492', 'MKTG374', 'Major Elective 2 - Internet Marketing and Entrepreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('493', 'CS306', 'Object Oriented Programming ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('494', 'MKTG335', 'Major Course 4 - Customer Relationship Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('495', 'MKTG333', 'Major Course 5 - Advertising', '', '3', '0', '');
INSERT INTO `subject` VALUES ('496', 'COMP6101', 'Current Trends and Issues', '', '2', '1', '');
INSERT INTO `subject` VALUES ('497', 'GE414', 'Introduction to Microeconomic Theory & Policy with LRT ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('498', 'MKTG373', 'Major Elective 3 - Services Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('499', 'CS401', 'Algorithm Design and Analysis ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('500', 'MKTG351', 'Major Elective 4 - Franchising and Direct Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('501', 'BE901B', 'Bus. Ethics w/ Social Responsibility & Good Governance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('503', 'GE301A', 'General Psychology', '', '3', '0', '');
INSERT INTO `subject` VALUES ('504', 'CS403', 'Principles of Programming Languages with Compilers ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('505', 'BE501B', 'Principles of Management ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('506', 'IT6224', 'Data Communications and Networking 3', '', '2', '1', '');
INSERT INTO `subject` VALUES ('507', 'CS404', 'Prin. of Operating Systems & Its Applications ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('508', 'CS405', 'Data Communications & Networking 1 ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('509', 'CS406', 'Automata and Language Theory ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('510', 'MG107B', 'Case Study', '', '3', '0', '');
INSERT INTO `subject` VALUES ('511', 'CS408', 'Computer Programming 2 (JAVA) ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('512', 'CS409', 'Intro. to Software Engineering ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('513', 'CS410', 'Web Programming & Development ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('514', 'BE402A', 'Fundamentals of Accounting 2 ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('515', 'BE502A', 'Human Behavior in Organization ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('516', 'GE221B', 'General Chemistry   ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('517', 'ITE6101', 'Computing Fundamentals', '', '2', '1', '');
INSERT INTO `subject` VALUES ('518', 'FILI6201', 'Kritikal na Pagbasa, Pagsulat at Pagsasalita', '', '3', '0', '');
INSERT INTO `subject` VALUES ('519', 'GE415', 'Life and Works of Jose Rizal ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('520', 'CS500', 'CS Practicum (min. of 162 hours) ', '', '0', '6', '');
INSERT INTO `subject` VALUES ('521', 'CS411', 'Modelling and Simulation ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('522', 'CS600', 'CS Thesis A ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('523', 'CS412', 'ITE Professional Ethics & Values ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('527', 'GE232', 'Business Software  Packages', '', '2', '1', '');
INSERT INTO `subject` VALUES ('528', 'GE231', 'Computer Fundamentals w/ Office Software Applications', '', '2', '1', '');
INSERT INTO `subject` VALUES ('529', 'BE401', 'Fundamentals of   Accounting 1   ', '', '2', '1', '');
INSERT INTO `subject` VALUES ('530', 'IT6200', 'Introduction to  Human Computer Interaction', '', '2', '1', '');
INSERT INTO `subject` VALUES ('624', 'GE111A', 'Communication Arts 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('625', 'GE231A', 'Computer Fundamentals w/ MS Applications', '', '2', '1', '');
INSERT INTO `subject` VALUES ('626', 'PHYED4', 'Team Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('628', 'TCM442', 'Team Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('629', 'GE522B', 'Physical Education 2 ', '', '2', '0', '');
INSERT INTO `subject` VALUES ('630', 'CS6300', 'Load  Testing', '', '1', '2', '');
INSERT INTO `subject` VALUES ('631', 'GE301', 'General   Psychology', '', '3', '0', '');
INSERT INTO `subject` VALUES ('632', 'BE201A', 'Introduction to Business and Phil. Financial System', '', '3', '0', '');
INSERT INTO `subject` VALUES ('633', 'GE511', 'Euthenics 1 ', '', '1', '0', '');
INSERT INTO `subject` VALUES ('634', 'GE531A', 'National Service Training Program 1 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('635', 'GE532B', 'National Service Training Program 2 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('636', 'BE501', 'Principles of Management ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('637', 'GE121', 'Komunikasyon  sa Akademikong Filipino', '', '3', '0', '');
INSERT INTO `subject` VALUES ('638', 'CS6105', 'Discrete Mathematics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('639', 'GE411A', 'General     Psychology        ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('640', 'GE113A', 'Speech Communication 1 ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('641', 'GE512', 'Euthenics   2', '', '1', '0', '');
INSERT INTO `subject` VALUES ('642', 'CS101A', 'Computer Fundamentals               w/ MS Applications', '', '2', '1', '');
INSERT INTO `subject` VALUES ('643', 'BE801B', 'Business Statistics ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('644', 'BAMM6202', 'Phil Tax System and Income Tax', '', '3', '0', '');
INSERT INTO `subject` VALUES ('645', 'GE212', 'Trigonometry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('646', 'BAMM6201', 'Law on Obligations and Contracts', '', '3', '0', '');
INSERT INTO `subject` VALUES ('647', 'GE304A', 'Intro. to Microeconomic Theory & Policy w/ LRT ', '', '3', '0', '');
INSERT INTO `subject` VALUES ('648', 'CS304A', 'Data Structure      and Algorithms', '', '2', '1', '');
INSERT INTO `subject` VALUES ('649', 'BE202', 'Basic Finance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('650', 'GE523A', 'Physical Education 3', '', '2', '0', '');
INSERT INTO `subject` VALUES ('651', 'GE212B', 'Mathematics of Investment', '', '3', '0', '');
INSERT INTO `subject` VALUES ('652', 'IT201', 'Comp. Installation & Configuration', '', '2', '1', '');
INSERT INTO `subject` VALUES ('653', '', 'Major Elective 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('654', 'GE116', 'Technical, Scientific & Business English', '', '3', '0', '');
INSERT INTO `subject` VALUES ('655', 'CS401', 'Database Management Systems 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('656', 'GE111', 'English Communication Skills 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('657', 'IT202', 'System Analysis and Design', '', '2', '1', '');
INSERT INTO `subject` VALUES ('658', 'GE112', 'English Communication Skills 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('659', 'GE302', 'Phil. History w/ Politics and Governance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('660', 'ITMAJEL3', 'IT Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('661', '', 'Life-Long Life-Wide Learning Program (3LP)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('662', '', 'Free Elective (Specification)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('663', '', 'Major Elective 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('664', '', 'Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('665', 'GE121A', 'Sining ng Komunikasyon', '', '3', '0', '');
INSERT INTO `subject` VALUES ('666', 'GE212', 'Mathematics of Investment', '', '3', '0', '');
INSERT INTO `subject` VALUES ('667', 'GE524B', 'Physical Education 4', '', '2', '0', '');
INSERT INTO `subject` VALUES ('668', 'BE301', 'Principles of Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('669', 'MKTG334', 'Major Course 6 - Market Research', '', '3', '0', '');
INSERT INTO `subject` VALUES ('670', 'CS378', 'Load Testing (HP) (Free Elective 2)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('671', 'GE221', 'General Chemistry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('673', 'MKTG302', 'Major Course 2 - Financial Markets and Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('674', 'IT304', 'Network Security', '', '2', '1', '');
INSERT INTO `subject` VALUES ('675', 'IT303', 'Current Trends in IT', '', '2', '1', '');
INSERT INTO `subject` VALUES ('676', 'GE111A', 'English Communication Skills 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('677', 'CS304', 'Data  Structure and Algorithms', '', '2', '1', '');
INSERT INTO `subject` VALUES ('678', 'GE112A', 'English Communication Skills 2', '', '2', '0', '');
INSERT INTO `subject` VALUES ('679', 'GE112B', 'English Communication Skills 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('680', 'GE111A', 'Communication  Skills  1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('681', 'GE313B', 'General Chemistry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('682', 'IT6210A', 'Quantitative Methods', '', '3', '0', '');
INSERT INTO `subject` VALUES ('683', 'GE223B', 'Internet Technologies', '', '3', '0', '');
INSERT INTO `subject` VALUES ('684', 'IT6302', 'Integrative Programming and Technology 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('685', 'GE303B', 'Society and Culture w/ FP & HIV/SARS Prevention', '', '3', '0', '');
INSERT INTO `subject` VALUES ('686', 'GE115A', 'Speech Communication 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('687', 'BE101B', 'Intro to Macroeconomic Theory and Practice', '', '3', '0', '');
INSERT INTO `subject` VALUES ('688', 'BE802A', 'Quantitative Techniques in Business', '', '3', '0', '');
INSERT INTO `subject` VALUES ('689', 'GE151A', 'Art, Man and Society', '', '3', '0', '');
INSERT INTO `subject` VALUES ('690', 'GE117B', 'World Literature', '', '3', '0', '');
INSERT INTO `subject` VALUES ('691', 'CS101A', 'Computer Fundamentals w/ Business Application Software', '', '2', '1', '');
INSERT INTO `subject` VALUES ('692', '', 'Free Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('693', '', 'Free Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('694', '', 'Free Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('696', 'GE312A', 'Environmental Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('697', 'CS402A', 'Database Management Systems 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('698', 'FM511B', 'Major Course 1 - Financial Analysis and Reporting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('699', 'FM515B', 'Major Course 5 - Monetary Policy & Central Banking', '', '3', '0', '');
INSERT INTO `subject` VALUES ('700', 'FM511B', 'Major Course 1 - Banking & Financial Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('702', 'GE141A', 'Intro. to Philosophy w/ Logic', '', '3', '0', '');
INSERT INTO `subject` VALUES ('703', 'GE122B', 'Pagbasa at Pagsulat sa Iba\'t-ibang Disiplina', '', '3', '0', '');
INSERT INTO `subject` VALUES ('704', 'GE311B', 'General Chemistry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('705', 'GE412B', 'Society & Culture w/ FP & HIV/SARS Prevention', '', '3', '0', '');
INSERT INTO `subject` VALUES ('706', '', 'IT Major Elective 4', '', '3', '0', '');
INSERT INTO `subject` VALUES ('707', 'FELECT1', 'Free Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('708', 'FM512A', 'Major Course 2 - Credit and Collection', '', '3', '0', '');
INSERT INTO `subject` VALUES ('709', 'CSMAJEL1', 'CS Major Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('710', 'CS500A', 'CS Practicum', '', '0', '6', '');
INSERT INTO `subject` VALUES ('711', 'CSMAJEL2', 'CS Major Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('712', 'CSMAJEL3', 'CS Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('713', 'CSMAJEL4', 'CS Major Elective 4', '', '3', '0', '');
INSERT INTO `subject` VALUES ('714', 'IT202A', 'System Analysis and Design', '', '2', '1', '');
INSERT INTO `subject` VALUES ('715', 'FELECT2', 'Free Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('716', 'FELECT3', 'Free Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('717', '', 'IT Major Elective 1', '', '0', '3', '');
INSERT INTO `subject` VALUES ('718', '', 'IT Major Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('719', '', 'IT Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('720', 'CS305B', 'Comp. Org\'n. & Assembly Language', '', '2', '1', '');
INSERT INTO `subject` VALUES ('721', 'IT600B', 'IT Capstone Project (Entrepreneurship)', '', '3', '0', '');
INSERT INTO `subject` VALUES ('722', 'IT500A', 'IT Practicum (min. 486 hours)', '', '0', '9', '');
INSERT INTO `subject` VALUES ('723', 'GE233B', 'Internet Technologies', '', '2', '1', '');
INSERT INTO `subject` VALUES ('724', '', '3LP Seminar', '', '0', '0', '');
INSERT INTO `subject` VALUES ('725', 'MG108B', 'Practicum', '', '9', '0', '');
INSERT INTO `subject` VALUES ('726', 'GE6106', 'Purposive Communication', '', '3', '0', '');
INSERT INTO `subject` VALUES ('727', 'BAMM6102', 'Marketing Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('728', 'BAMM6402', 'BA-MM Thesis Writing 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('729', 'BAMM6204', 'Professional Salesmanship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('730', 'BAMM6400', 'BA-MM Practicum (600 hrs)', '', '6', '0', '');
INSERT INTO `subject` VALUES ('731', 'BE401B', 'Fundamentals of Accounting 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('732', 'GE114', 'Speech Communication 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('733', 'EM101A', 'Major Course 1 - Web Authoring', '', '2', '1', '');
INSERT INTO `subject` VALUES ('735', 'GE401A', 'Life and Works of Jose Rizal', '', '3', '0', '');
INSERT INTO `subject` VALUES ('736', 'BE504A', 'Business Policy & Strategy w/ TQM', '', '3', '0', '');
INSERT INTO `subject` VALUES ('737', 'EF107B', 'Major Subject 7 - Strategic Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('738', 'MKTG331', 'Major Course 4 - Customer Relationship Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('739', 'BE602A', 'Major Subject 8 - Law on Business Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('740', 'MKTG332', 'Major Course 7 - Professional Salesmanship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('741', 'MKTG335', 'Major Course 8 - Strategic Marketing Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('742', 'MG104B', 'Major Elective 5 - Management Services', '', '3', '0', '');
INSERT INTO `subject` VALUES ('743', 'MK206B', 'Major Course 6 - Strategic Marketing Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('744', 'GE113B', 'General Chemistry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('745', 'BE202A', 'Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('746', 'MK201B', 'Major Course 1 - Pricing Strategy and Tactics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('747', 'MK202A', 'Major Course 2 - Creativity Innovation and New Products Dev\'t', '', '3', '0', '');
INSERT INTO `subject` VALUES ('748', 'TC101A', 'Major Elective 1 - Entrepreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('749', 'MK203A', 'Major Course 3 - Integrated Marketing Communications', '', '3', '0', '');
INSERT INTO `subject` VALUES ('750', 'MK204B', 'Major Course 4 - Customer Relationship Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('751', 'MK205B', 'Major Course 5 - Professional Salesmanship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('752', 'MK101A', 'Major Elective 2 - Consumer Behavior ', '\r\n', '3', '0', '');
INSERT INTO `subject` VALUES ('753', 'BE602A', 'Major Course 8 - Law on Business Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('754', 'BE503A', 'Major Course 7 - Production/Operations Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('755', 'MK102A', 'Major Elective 3 - Sales Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('756', 'MK103A', 'Major Elective 4 - Franchising and Direct Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('757', 'EM105B', 'Major Elective 1 - International Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('758', 'GE223B', 'Environmental Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('759', 'EM102B', 'Major Course 2 - Online Consumers and Market Research', '', '2', '1', '');
INSERT INTO `subject` VALUES ('760', 'EM105B', 'Major Course 3 - Strategic Marketing Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('761', 'EM103A', 'Major Course 4 - Distribution Channels and Cost Structures', '', '3', '0', '');
INSERT INTO `subject` VALUES ('762', 'BE602A', 'Major Course 5 - Law on Business Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('763', 'EM104A', 'Major Course 6 - Advertising and Promotion', '', '2', '1', '');
INSERT INTO `subject` VALUES ('764', 'TC102B', 'Major Elective 2 - Technological Innovation and Product Development', '', '3', '0', '');
INSERT INTO `subject` VALUES ('765', 'BE201A', 'Major Subject 7 - Professional Salesmanship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('766', 'BE503A', 'Major Subject 8 - Production and Operation Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('767', 'MG104B', 'Major Elective 3 - Management Services', '', '3', '0', '');
INSERT INTO `subject` VALUES ('768', 'TC106A', 'Major Elective 4 - Phil. Business Environment', '', '3', '0', '');
INSERT INTO `subject` VALUES ('769', 'TC109B', 'Major Elective 5 - Managing Family Owned Business', '', '3', '0', '');
INSERT INTO `subject` VALUES ('770', 'MG104', 'Major Elective 5 - Marketing Analysis and Apps for Bus. Consulting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('771', 'BE501', 'Principles of Management and Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('772', 'GE223', 'Environmental Science', '', '3', '0', '');
INSERT INTO `subject` VALUES ('773', 'FM513A', 'Major Course 3 - Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('774', 'MK601A', 'Major Elective 1 - Entrepreneurial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('775', 'FM514B', 'Major Course 4 - Financial Analysis and Reporting', '', '3', '0', '');
INSERT INTO `subject` VALUES ('776', 'FM516B', 'Major Course 6 - Investment and Portfolio Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('777', 'FM603B', 'Major Elective 2 - Cooperative Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('778', 'FM517A', 'Major Course 7 - Capital Markets', '', '3', '0', '');
INSERT INTO `subject` VALUES ('779', 'FM518A', 'Major Course 8 - Strategic Financial Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('780', 'FM604A', 'Major Elective 3 - Treasury Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('781', 'FM605A', 'Major Elective 4 - Risk Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('782', 'FM607B', 'Major Elective 5 - Multinational Business Operations', '', '3', '0', '');
INSERT INTO `subject` VALUES ('783', 'MG105A', 'Major Course 1 - Administrative and Office Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('784', 'MG103', 'Major Elective 1 - Management of Technology', '', '3', '0', '');
INSERT INTO `subject` VALUES ('785', 'BE503A', 'Major Course 2 - Production and Operation Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('786', 'BE602A', 'Major Course 3 - Law on Business Organization', '', '3', '0', '');
INSERT INTO `subject` VALUES ('787', 'MG104B', 'Major Course 4 - Project Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('788', 'MG107A', 'Major Course 5 - Recruitment Selection and Training Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('789', 'EF103A', 'Major Course 6 - Managing Financial Institution', '', '3', '0', '');
INSERT INTO `subject` VALUES ('790', 'TC101A', 'Major Elective 2 - Entrepreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('791', 'TC106A', 'Major Subject 7 - Phil. Business Environment', '', '3', '0', '');
INSERT INTO `subject` VALUES ('792', 'TC109B', 'Major Subject 8 - Managing Family Owned Business', '', '3', '0', '');
INSERT INTO `subject` VALUES ('793', 'EB106B', 'Major Elective 3 - Special Topic in E-Business', '', '3', '0', '');
INSERT INTO `subject` VALUES ('794', 'MG104B', 'Major Elective 4 - Management Services', '', '3', '0', '');
INSERT INTO `subject` VALUES ('795', 'BE603A', 'Major Elective 5 - Law on Negotiable Instrument', '', '3', '0', '');
INSERT INTO `subject` VALUES ('796', 'HR511B', 'Major Course 1 - Administrative and Office Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('797', 'HR512A', 'Major Course 2 - Labor Law and Legislation', '', '3', '0', '');
INSERT INTO `subject` VALUES ('798', 'HR602B', 'Major Elective 5 - Management Services', '', '3', '0', '');
INSERT INTO `subject` VALUES ('799', 'HR516B', 'Major Course 6 - Strategic HR Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('800', 'HR601A', 'Major Elective 4 - Special Topics in HRM', '', '3', '0', '');
INSERT INTO `subject` VALUES ('801', 'MK517A', 'Major Elective 3 - Production and Operations Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('802', 'HR518A', 'Major Course 8 - Organization Development', '', '3', '0', '');
INSERT INTO `subject` VALUES ('803', 'HR517A', 'Major Course 7 - Labor Relations and Negotiations', '', '3', '0', '');
INSERT INTO `subject` VALUES ('804', 'MK611B', 'Major Elective 2 - Global/International Trade', '', '3', '0', '');
INSERT INTO `subject` VALUES ('805', 'HR515B', 'Major Course 5 - Compensation Administration', '', '3', '0', '');
INSERT INTO `subject` VALUES ('806', 'HR514B', 'Major Course 4 - Training and Development', '', '3', '0', '');
INSERT INTO `subject` VALUES ('807', 'HR513A', 'Major Course 3 - Recruitment and Selection', '', '3', '0', '');
INSERT INTO `subject` VALUES ('808', 'TCM111', 'Communication Skills 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('810', 'CCM111', 'Computer Fundamentals w/ MS Application', '', '2', '1', '');
INSERT INTO `subject` VALUES ('811', 'TCM511', 'National Service Training Program 1A or 1B', '', '3', '0', '');
INSERT INTO `subject` VALUES ('812', 'TCM611', 'Euthenics 1', '', '1', '0', '');
INSERT INTO `subject` VALUES ('813', 'TCM121', 'Communication Skills 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('814', 'TCM521', 'National Service Training Program 2A or 2B', '', '3', '0', '');
INSERT INTO `subject` VALUES ('815', 'TCM132', 'Speech Communication 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('816', 'COMSK1', 'Communication Arts and Skills 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('817', 'COMFUN', 'Computer Fundamentals', '', '3', '0', '');
INSERT INTO `subject` VALUES ('818', 'BAS', 'Business Application Software', '', '1', '1', '');
INSERT INTO `subject` VALUES ('819', 'INTPRO', 'Introduction to Programming (C-Language)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('820', 'BUSMAT', 'Elements of Business Mathematics', '', '3', '0', '');
INSERT INTO `subject` VALUES ('821', 'ALGBRA', 'Algebra', '', '3', '0', '');
INSERT INTO `subject` VALUES ('822', 'ETHNS1', 'Euthenics 1', '', '1', '0', '');
INSERT INTO `subject` VALUES ('823', 'PHYED1', 'Physical Fitness', '', '2', '0', '');
INSERT INTO `subject` VALUES ('824', 'NSTP01', 'Civic Welfare Service 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('825', 'COMSK2', 'Communication Arts and Skills 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('826', 'DESKPB', 'Desktop Publishing', '', '1', '1', '');
INSERT INTO `subject` VALUES ('827', 'FILEPRO', 'File Organization and Processing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('828', 'BUSMGT', 'Business Management', '\r\n', '3', '0', '');
INSERT INTO `subject` VALUES ('829', 'ACCTG1', 'Principles of Accounting', '', '2', '1', '');
INSERT INTO `subject` VALUES ('830', 'ETHNS2', 'Euthenics 2', '', '1', '0', '');
INSERT INTO `subject` VALUES ('831', 'PHYED2', 'Dance', '', '2', '0', '');
INSERT INTO `subject` VALUES ('832', 'NSTP02', 'Civic Welfare Service 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('833', 'PUBSPK', 'Public Speaking', '', '3', '0', '');
INSERT INTO `subject` VALUES ('834', 'MULDEV', 'Multimedia Development', '', '2', '1', '');
INSERT INTO `subject` VALUES ('835', 'BOK', 'Bookkeeping', '', '3', '0', '');
INSERT INTO `subject` VALUES ('836', 'MKTG', 'Principles of Marketing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('837', 'NET1', 'Introduction to Networking', '', '3', '0', '');
INSERT INTO `subject` VALUES ('838', 'PHYED3', 'Individual/Dual Sports', '', '2', '0', '');
INSERT INTO `subject` VALUES ('839', 'TECWRT', 'Technical Writing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('840', 'WEBPD', 'Web Page Design and Development', '', '2', '1', '');
INSERT INTO `subject` VALUES ('841', 'SHWRITE', 'Shorthand Writing', '', '3', '0', '');
INSERT INTO `subject` VALUES ('842', 'INFOSYS', 'Management Information System', '', '3', '0', '');
INSERT INTO `subject` VALUES ('843', 'PREVAL', 'Professional Ethics and Values Education', '', '3', '0', '');
INSERT INTO `subject` VALUES ('844', 'OJT', 'On the Job Training', '', '1', '0', '');
INSERT INTO `subject` VALUES ('845', 'DRAW1', 'Drawing 1', '', '0', '1', '');
INSERT INTO `subject` VALUES ('846', 'STCAB', 'Structured Cabling System', '', '3', '0', '');
INSERT INTO `subject` VALUES ('847', 'NET2', 'Local Area Networks', '', '3', '0', '');
INSERT INTO `subject` VALUES ('848', 'SHOPEN', 'Shop Entrepreneurship', '', '3', '0', '');
INSERT INTO `subject` VALUES ('849', 'COMARC', 'Computer System Architecture', '', '3', '0', '');
INSERT INTO `subject` VALUES ('850', 'PCMAIN', 'PC Troubleshooting and Maintenance', '', '0', '1', '');
INSERT INTO `subject` VALUES ('851', 'NET3', 'Wide Area Networks', '', '3', '0', '');
INSERT INTO `subject` VALUES ('852', 'NOSYS', 'Network Operating System &#40;Linux/NT&#41;', '', '2', '1', '');
INSERT INTO `subject` VALUES ('853', 'DIGELE', 'Digital Electronics', '', '3', '1', '');
INSERT INTO `subject` VALUES ('854', 'FUNELEC', 'Fundamentals of Electronics and Electricity', '', '3', '1', '');
INSERT INTO `subject` VALUES ('855', 'ECSYS', 'Electronics and Communication System', '', '3', '0', '');
INSERT INTO `subject` VALUES ('856', 'PROJMGT', 'Project Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('857', 'NET4', 'Introduction to TCP/IP and Networking Architecture', '', '3', '0', '');
INSERT INTO `subject` VALUES ('858', 'COMPR1', 'Computer Programming 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('859', 'COMPR2', 'Computer Programming 2', '', '3', '1', '');
INSERT INTO `subject` VALUES ('860', 'SYMLOG', 'Symbolic Logic', '', '3', '0', '');
INSERT INTO `subject` VALUES ('861', 'BUSDEV', 'Business System Development', '', '3', '0', '');
INSERT INTO `subject` VALUES ('862', 'SYSDES', 'System Analysis and Design', '', '3', '0', '');
INSERT INTO `subject` VALUES ('863', 'COMPR3', 'Computer Programming 3', '', '2', '1', '');
INSERT INTO `subject` VALUES ('864', 'OJT', 'On the Job Training (300 hrs.)', '', '1', '0', '');
INSERT INTO `subject` VALUES ('865', 'IT201B', 'Computer Installation and Configuration (CSS1)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('866', 'CS305A', 'Computer Organization and Assembly Language (CSS2)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('867', 'IT202B', 'System Design and Analysis', '', '2', '1', '');
INSERT INTO `subject` VALUES ('868', 'CS405B', 'Data Communication & Networking 1 (CSS3)', '', '2', '1', '');
INSERT INTO `subject` VALUES ('869', 'GE6114', 'Mathematics in the Modern World for Business and Technology', '', '3', '0', '');
INSERT INTO `subject` VALUES ('870', '', 'CS Major Elective 1', '', '3', '0', '');
INSERT INTO `subject` VALUES ('871', '', 'CS Major Elective 2', '', '3', '0', '');
INSERT INTO `subject` VALUES ('872', '', 'CS Major Elective 3', '', '3', '0', '');
INSERT INTO `subject` VALUES ('873', '', 'CS Major Elective 4', '', '3', '0', '');
INSERT INTO `subject` VALUES ('874', 'GE6114', 'Mathematics in the Modern World', '', '3', '0', '');
INSERT INTO `subject` VALUES ('875', 'CS6300', 'Software Engineering 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('877', 'EF109A', 'Major Elective 5 - Special Topic in E-Finance', '', '3', '0', '');
INSERT INTO `subject` VALUES ('878', 'BE503A', 'Major Elective 3 - Production and Operation Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('879', 'EF106A', 'Major Course 6 - Monetary Policy and Central Banking', '', '3', '0', '');
INSERT INTO `subject` VALUES ('880', 'AT102B', 'Major Course 2 - Cost Accounting 2', '', '2', '1', '');
INSERT INTO `subject` VALUES ('881', 'AT101A', 'Major Elective 1 - Cost Accounting 1', '', '2', '1', '');
INSERT INTO `subject` VALUES ('882', 'EF101B', 'Major Course 3 - Electronic Banking and Finance', '', '2', '1', '');
INSERT INTO `subject` VALUES ('883', 'EF102A', 'Major Course 4 - Securities Analysis and Treasury Management', '', '3', '0', '');
INSERT INTO `subject` VALUES ('884', 'EF103A', 'Major Course 5 - Managing Financial Institutions', '', '3', '0', '');
INSERT INTO `subject` VALUES ('885', 'GE6221', 'Living in the IT Era', '', '2', '1', '');
INSERT INTO `subject` VALUES ('886', 'IT500A', 'IT Practicum', '', '0', '9', '');
INSERT INTO `subject` VALUES ('887', 'GE221B', 'General Chemistry', '', '3', '0', '');
INSERT INTO `subject` VALUES ('892', 'BIO1', 'General Biology', null, '3', '1', ' ');

-- ----------------------------
-- Table structure for subject_info
-- ----------------------------
DROP TABLE IF EXISTS `subject_info`;
CREATE TABLE `subject_info` (
  `subject_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(40) DEFAULT NULL,
  `subject_code` varchar(40) DEFAULT NULL,
  `subject_unit` int(11) DEFAULT NULL,
  `pre_requisites` varchar(40) DEFAULT NULL,
  `subject_description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`subject_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subject_info
-- ----------------------------
INSERT INTO `subject_info` VALUES ('1', 'Business   Statistics', 'BE801', '3', '', '');
INSERT INTO `subject_info` VALUES ('2', 'General Chemistry   ', 'GE221B', '3', '', '');
INSERT INTO `subject_info` VALUES ('3', 'Physical Science ', 'GE313', '3', '', '');
INSERT INTO `subject_info` VALUES ('4', 'Environmental Science', 'GE223B', '3', '', '');
INSERT INTO `subject_info` VALUES ('5', 'Physical Science', 'GE313B', '3', '', '');
INSERT INTO `subject_info` VALUES ('6', 'Understanding the Self', 'GE6100', '3', '', '');
INSERT INTO `subject_info` VALUES ('7', 'General   Psychology', 'GE301', '3', '', '');
INSERT INTO `subject_info` VALUES ('8', 'Euthenics 1', 'GE511A', '1', '', '');
INSERT INTO `subject_info` VALUES ('9', 'Pagbasa at Pagsulat Tungo sa Pananaliksi', 'GE122', '3', '', '');
INSERT INTO `subject_info` VALUES ('10', 'Algorithm Design and Analysis ', 'CS401', '3', '', '');
INSERT INTO `subject_info` VALUES ('11', 'Readings in Philippine History', 'GE6101', '3', '', '');
INSERT INTO `subject_info` VALUES ('12', 'Trigonometry', 'GE212B', '3', '', '\r\n');
INSERT INTO `subject_info` VALUES ('13', 'Speech  Communication 1 ', 'GE113', '3', '', '\r\n');
INSERT INTO `subject_info` VALUES ('14', 'Purposive Communication 1', 'GE6106', '3', '', '');
INSERT INTO `subject_info` VALUES ('15', 'Communication Skills  1', 'GE111', '3', '', '');
INSERT INTO `subject_info` VALUES ('16', 'Communication Skills 2 ', 'GE112', '3', '', '');
INSERT INTO `subject_info` VALUES ('17', 'Speech Communication 3', 'GE115A', '3', '', '');
INSERT INTO `subject_info` VALUES ('18', 'Mathematics in the Modern World', 'GE6114', '3', '', '');
INSERT INTO `subject_info` VALUES ('19', 'Phil. History w/ Politics and Governance', 'GE302B', '3', '', '');
INSERT INTO `subject_info` VALUES ('20', 'Art, Man  and   Society  ', 'GE151', '3', '', '');
INSERT INTO `subject_info` VALUES ('21', 'Life and  Works  of Jose Rizal', 'GE401', '3', '', '');
INSERT INTO `subject_info` VALUES ('22', 'Environmental Science', 'GE223A', '3', '', '');
INSERT INTO `subject_info` VALUES ('23', 'Komunikasyon  sa Akademikong Filipino', 'GE121', '3', '', '');
INSERT INTO `subject_info` VALUES ('24', 'Physical Education 1', 'GE521A', '2', '', '');
INSERT INTO `subject_info` VALUES ('25', 'Physical Education 3', 'GE523A', '2', '', '');
INSERT INTO `subject_info` VALUES ('26', 'Physical Education 2', 'GE522', '2', '', '');
INSERT INTO `subject_info` VALUES ('27', 'College  Algebra', 'GE211', '3', '', '');
INSERT INTO `subject_info` VALUES ('28', 'Statistics and Probability', 'GE213B', '3', '', '');
INSERT INTO `subject_info` VALUES ('29', 'Komunikasyon sa Akademikong Filipino', 'GE121A', '3', '', '');
INSERT INTO `subject_info` VALUES ('30', 'Euthenics   2', 'GE512', '1', '', '');
INSERT INTO `subject_info` VALUES ('31', 'Communication Skills 2', 'GE112B', '3', '', '');
INSERT INTO `subject_info` VALUES ('32', 'Physical Education 2 ', 'GE522B', '2', '', '');
INSERT INTO `subject_info` VALUES ('33', 'Statistics and Probability ', 'GE213', '3', '', '');
INSERT INTO `subject_info` VALUES ('34', 'Philippine  Literature  ', 'GE131', '3', '', '');
INSERT INTO `subject_info` VALUES ('35', 'Intro. to Philosophy w/ Logic', 'GE141A', '3', '', '');
INSERT INTO `subject_info` VALUES ('36', 'Trigonometry', 'GE212', '3', '', '');
INSERT INTO `subject_info` VALUES ('37', 'Calculus 1', 'MATH6100', '3', '', '');
INSERT INTO `subject_info` VALUES ('38', 'Philippine Literature', 'GE131A', '3', '', '');
INSERT INTO `subject_info` VALUES ('39', 'Technical, Scientific & Business English', 'TCM142', '3', '', '');
INSERT INTO `subject_info` VALUES ('40', 'World Literature', 'GE117B', '3', '', '');
INSERT INTO `subject_info` VALUES ('41', 'Speech Communication 1 ', 'GE113A', '3', '', '');
INSERT INTO `subject_info` VALUES ('42', 'Introduction to Programming (C-Language)', 'INTPRO', '3', '', '');
INSERT INTO `subject_info` VALUES ('43', 'Internet Technologies', 'CS103A', '3', '', '');
INSERT INTO `subject_info` VALUES ('44', 'The Contemporary World', 'GE6102', '3', '', '');
INSERT INTO `subject_info` VALUES ('45', 'Computing Fundamentals', 'ITE6101', '3', '', '');
INSERT INTO `subject_info` VALUES ('46', 'Computer Installation and Configuration ', 'IT201B', '3', '', '');
INSERT INTO `subject_info` VALUES ('47', 'IT Capstone Project (Entrepreneurship)', 'IT600', '3', '', '');
INSERT INTO `subject_info` VALUES ('48', 'Intro to Information Systems ', 'CS102', '3', '', '');
INSERT INTO `subject_info` VALUES ('49', 'IT Major Elective 4', 'ITMAJEL4', '3', '', '');
INSERT INTO `subject_info` VALUES ('50', 'Data Communications & Networking 1 ', 'CS405', '3', '', '');
INSERT INTO `subject_info` VALUES ('51', 'Mathematical Analysis 1 ', 'CS201', '3', '', '');
INSERT INTO `subject_info` VALUES ('52', 'Network Security', 'IT304B', '3', '', 'msdnhf28391\":}&$%%*^');
INSERT INTO `subject_info` VALUES ('53', 'Modeling and Simulation', 'CS6304', '3', '', '');
INSERT INTO `subject_info` VALUES ('54', '3LP Seminar', '', '0', '', '');
INSERT INTO `subject_info` VALUES ('55', 'Accounting for Non Accountants', 'IT101', '3', '', '');
INSERT INTO `subject_info` VALUES ('56', 'Algebra', 'ALGBRA', '3', '', '');

-- ----------------------------
-- Table structure for submission_sched
-- ----------------------------
DROP TABLE IF EXISTS `submission_sched`;
CREATE TABLE `submission_sched` (
  `sub_sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `deadline` date DEFAULT NULL,
  `exam_id` int(40) NOT NULL,
  `dep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sub_sched_id`),
  KEY `major_exams_submission_sched` (`exam_id`),
  CONSTRAINT `major_exams_submission_sched` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submission_sched
-- ----------------------------
INSERT INTO `submission_sched` VALUES ('7', '2019-05-03', '9', 'SHS');
INSERT INTO `submission_sched` VALUES ('8', '2019-05-03', '1', 'GENED');
INSERT INTO `submission_sched` VALUES ('9', '2019-05-03', '1', 'SHS');

-- ----------------------------
-- Table structure for subtopic
-- ----------------------------
DROP TABLE IF EXISTS `subtopic`;
CREATE TABLE `subtopic` (
  `subtopic_id` int(11) NOT NULL AUTO_INCREMENT,
  `subtopic_description` varchar(100) DEFAULT NULL,
  `topics_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subtopic_id`),
  KEY `topics_subtopic` (`topics_id`),
  CONSTRAINT `topics_subtopic` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2692 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subtopic
-- ----------------------------
INSERT INTO `subtopic` VALUES ('2684', 'topic1', '1211');
INSERT INTO `subtopic` VALUES ('2685', 'Examination Week', '1212');
INSERT INTO `subtopic` VALUES ('2686', 'topic2', '1213');
INSERT INTO `subtopic` VALUES ('2687', 'Examination Week', '1214');
INSERT INTO `subtopic` VALUES ('2688', 'topic3', '1215');
INSERT INTO `subtopic` VALUES ('2689', 'Examination Week', '1216');
INSERT INTO `subtopic` VALUES ('2690', 'topic4', '1217');
INSERT INTO `subtopic` VALUES ('2691', 'Examination Week', '1218');

-- ----------------------------
-- Table structure for super_user
-- ----------------------------
DROP TABLE IF EXISTS `super_user`;
CREATE TABLE `super_user` (
  `id` int(40) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `position` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of super_user
-- ----------------------------
INSERT INTO `super_user` VALUES ('1', 'admin', 'system1234', 'ADMIN', 'offline');
INSERT INTO `super_user` VALUES ('2', 'print', 'print1234', 'Printing Incharge', 'offline');

-- ----------------------------
-- Table structure for syllabus
-- ----------------------------
DROP TABLE IF EXISTS `syllabus`;
CREATE TABLE `syllabus` (
  `syllabus_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_info_id` int(11) NOT NULL,
  `ss_id` int(40) NOT NULL,
  PRIMARY KEY (`syllabus_id`),
  KEY `subject_info_syllabus` (`course_info_id`),
  KEY `sched_subj_syllabus` (`ss_id`),
  CONSTRAINT `sched_subj_syllabus` FOREIGN KEY (`ss_id`) REFERENCES `sched_subj` (`ss_id`),
  CONSTRAINT `subject_info_syllabus` FOREIGN KEY (`course_info_id`) REFERENCES `subject_info` (`subject_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of syllabus
-- ----------------------------
INSERT INTO `syllabus` VALUES ('101', '54', '101');
INSERT INTO `syllabus` VALUES ('103', '55', '103');
INSERT INTO `syllabus` VALUES ('104', '56', '104');

-- ----------------------------
-- Table structure for syllabusstatus
-- ----------------------------
DROP TABLE IF EXISTS `syllabusstatus`;
CREATE TABLE `syllabusstatus` (
  `sstatus_id` int(11) NOT NULL AUTO_INCREMENT,
  `syll_status_desc` varchar(40) DEFAULT NULL,
  `syll_date_time` datetime DEFAULT NULL,
  `syll_status` varchar(40) DEFAULT NULL,
  `syll_rev_count` int(11) DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`sstatus_id`),
  KEY `syllabus_syllabusstatus` (`syllabus_id`),
  CONSTRAINT `syllabus_syllabusstatus` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of syllabusstatus
-- ----------------------------
INSERT INTO `syllabusstatus` VALUES ('101', 'approved', '2019-04-29 11:26:26', 'read', '0', '101');
INSERT INTO `syllabusstatus` VALUES ('103', 'pending', null, 'read', '0', '103');
INSERT INTO `syllabusstatus` VALUES ('104', 'pending', null, 'read', '0', '104');

-- ----------------------------
-- Table structure for syllabus_remarks
-- ----------------------------
DROP TABLE IF EXISTS `syllabus_remarks`;
CREATE TABLE `syllabus_remarks` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `remarks_desc` text,
  `remark_stat` varchar(40) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  PRIMARY KEY (`remark_id`),
  KEY `syllabus_syllabus_remarks` (`syllabus_id`),
  CONSTRAINT `syllabus_syllabus_remarks` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of syllabus_remarks
-- ----------------------------

-- ----------------------------
-- Table structure for testquestions
-- ----------------------------
DROP TABLE IF EXISTS `testquestions`;
CREATE TABLE `testquestions` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(10) DEFAULT NULL,
  `question_desc` varchar(255) DEFAULT NULL,
  `points` int(10) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `cognitive_level_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `cognitive_level_TestQuestions` (`cognitive_level_id`),
  KEY `topics_TestQuestions` (`topics_id`),
  KEY `test_number_TestQuestions` (`test_id`),
  CONSTRAINT `cognitive_level_TestQuestions` FOREIGN KEY (`cognitive_level_id`) REFERENCES `cognitive_level` (`cognitive_level_id`),
  CONSTRAINT `test_number_TestQuestions` FOREIGN KEY (`test_id`) REFERENCES `test_number` (`test_id`),
  CONSTRAINT `topics_TestQuestions` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testquestions
-- ----------------------------
INSERT INTO `testquestions` VALUES ('244', '1', 'It is a symbol or a letter used to represent numbers.', '2', '', '1', '1211', '75');
INSERT INTO `testquestions` VALUES ('245', '2', 'It is the highest exponent of the variable in the polynomial.', '2', '', '2', '1211', '75');
INSERT INTO `testquestions` VALUES ('246', '3', 'It is a polynomial which consists of only one term.', '1', '', '3', '1213', '75');
INSERT INTO `testquestions` VALUES ('247', '4', 'It is a polynomial which consists of two terms.', '2', '', '4', '1213', '75');
INSERT INTO `testquestions` VALUES ('248', '5', 'It is an algebraic expression which contains more than two terms.', '2', '', '5', '1213', '75');
INSERT INTO `testquestions` VALUES ('249', '6', 'It is a short-cut procedure of dividing a polynomial by a binomial divisor of the form x-r.', '2', '', '6', '1213', '75');

-- ----------------------------
-- Table structure for test_number
-- ----------------------------
DROP TABLE IF EXISTS `test_number`;
CREATE TABLE `test_number` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_number` int(11) DEFAULT NULL,
  `test_desc` varchar(255) DEFAULT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `tq_id` int(11) NOT NULL,
  PRIMARY KEY (`test_id`),
  KEY `tq_test_number` (`tq_id`),
  CONSTRAINT `tq_test_number` FOREIGN KEY (`tq_id`) REFERENCES `tq` (`tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of test_number
-- ----------------------------
INSERT INTO `test_number` VALUES ('75', '1', 'Identify what is asked in the following statements. (1 point each)', '', '185');

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `topics_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_description` varchar(255) NOT NULL,
  `ilo` text,
  `week` int(11) DEFAULT NULL,
  `tla` varchar(255) DEFAULT NULL,
  `resources` varchar(255) DEFAULT NULL,
  `oba` varchar(255) DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  `exam_id` int(40) NOT NULL,
  `idsa` varchar(255) DEFAULT NULL,
  `assessment` varchar(255) DEFAULT NULL,
  `ep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`topics_id`),
  KEY `syllabus_topics` (`syllabus_id`),
  KEY `major_exams_topics` (`exam_id`),
  CONSTRAINT `major_exams_topics` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`),
  CONSTRAINT `syllabus_topics` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1219 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('1211', 'topic1', null, '1', null, null, null, '101', '1', 'topic1', 'topic1', 'topic1');
INSERT INTO `topics` VALUES ('1212', '5', null, '2', null, null, null, '101', '5', 'Examination Week', 'Examination Week', 'Examination Week');
INSERT INTO `topics` VALUES ('1213', 'topic2', null, '3', null, null, null, '101', '2', 'topic2', 'topic2', 'topic2');
INSERT INTO `topics` VALUES ('1214', '6', null, '4', null, null, null, '101', '6', 'Examination Week', 'Examination Week', 'Examination Week');
INSERT INTO `topics` VALUES ('1215', 'topic3', null, '5', null, null, null, '101', '3', 'topic3', 'topic3', 'topic3');
INSERT INTO `topics` VALUES ('1216', '7', null, '6', null, null, null, '101', '7', 'Examination Week', 'Examination Week', 'Examination Week');
INSERT INTO `topics` VALUES ('1217', 'topic4', null, '7', null, null, null, '101', '4', 'topic4', 'topic4', 'topic4');
INSERT INTO `topics` VALUES ('1218', '8', null, '8', null, null, null, '101', '8', 'Examination Week', 'Examination Week', 'Examination Week');

-- ----------------------------
-- Table structure for tos
-- ----------------------------
DROP TABLE IF EXISTS `tos`;
CREATE TABLE `tos` (
  `tos_id` int(11) NOT NULL AUTO_INCREMENT,
  `kno_ni` int(11) DEFAULT NULL,
  `com_ni` int(11) DEFAULT NULL,
  `app_ni` int(11) DEFAULT NULL,
  `ana_ni` int(11) DEFAULT NULL,
  `eva_ni` int(11) DEFAULT NULL,
  `syn_ni` int(11) DEFAULT NULL,
  `kno_np` int(11) DEFAULT NULL,
  `com_np` int(11) DEFAULT NULL,
  `app_np` int(11) DEFAULT NULL,
  `ana_np` int(11) DEFAULT NULL,
  `eva_np` int(11) DEFAULT NULL,
  `syn_np` int(11) DEFAULT NULL,
  `tq_id` int(11) NOT NULL,
  PRIMARY KEY (`tos_id`),
  KEY `tq_tos` (`tq_id`),
  CONSTRAINT `tq_tos` FOREIGN KEY (`tq_id`) REFERENCES `tq` (`tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tos
-- ----------------------------
INSERT INTO `tos` VALUES ('19', '1', '1', '1', '1', '1', '1', '2', '2', '1', '2', '2', '2', '185');

-- ----------------------------
-- Table structure for tos_topic
-- ----------------------------
DROP TABLE IF EXISTS `tos_topic`;
CREATE TABLE `tos_topic` (
  `tostopic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_desc` text,
  `num_of_hours` varchar(40) DEFAULT NULL,
  `tos_id` int(11) NOT NULL,
  PRIMARY KEY (`tostopic_id`),
  KEY `tos_tos_topic` (`tos_id`),
  CONSTRAINT `tos_tos_topic` FOREIGN KEY (`tos_id`) REFERENCES `tos` (`tos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tos_topic
-- ----------------------------
INSERT INTO `tos_topic` VALUES ('154', 'topic1', '2', '19');
INSERT INTO `tos_topic` VALUES ('155', 'topic2', '3', '19');

-- ----------------------------
-- Table structure for tq
-- ----------------------------
DROP TABLE IF EXISTS `tq`;
CREATE TABLE `tq` (
  `tq_id` int(11) NOT NULL AUTO_INCREMENT,
  `main_direction` text,
  `num_copies` int(11) DEFAULT NULL,
  `main_attach` varchar(100) DEFAULT NULL,
  `syllabus_id` int(11) NOT NULL,
  `exam_id` int(40) NOT NULL,
  `upload_tq` varchar(255) DEFAULT NULL,
  `upload_tos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tq_id`),
  KEY `syllabus_tq` (`syllabus_id`),
  KEY `major_exams_tq` (`exam_id`),
  CONSTRAINT `major_exams_tq` FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`),
  CONSTRAINT `syllabus_tq` FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tq
-- ----------------------------
INSERT INTO `tq` VALUES ('185', 'Do not write anything on the test questionnaire. Write all of your answers in your answer sheet/s. Calculators are not allowed during the examination. Any kind of cheating is prohibited. Once caught, the examination sheet invalidates the score.', '16', null, '101', '1', null, null);
INSERT INTO `tq` VALUES ('186', null, null, null, '101', '2', null, null);
INSERT INTO `tq` VALUES ('187', null, null, null, '101', '3', null, null);
INSERT INTO `tq` VALUES ('188', null, null, null, '101', '4', null, null);

-- ----------------------------
-- Table structure for tqstatus
-- ----------------------------
DROP TABLE IF EXISTS `tqstatus`;
CREATE TABLE `tqstatus` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_desc` varchar(100) DEFAULT NULL,
  `ph` varchar(40) DEFAULT NULL,
  `late` varchar(40) DEFAULT NULL,
  `revise_count` int(10) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `notif_status` varchar(40) DEFAULT NULL,
  `tq_id` int(11) NOT NULL,
  PRIMARY KEY (`status_id`),
  KEY `tq_tqstatus` (`tq_id`),
  CONSTRAINT `tq_tqstatus` FOREIGN KEY (`tq_id`) REFERENCES `tq` (`tq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tqstatus
-- ----------------------------
INSERT INTO `tqstatus` VALUES ('185', 'queue for daa', 'dean', 'no', '0', '2019-04-29 15:48:53', 'unread', '185');
INSERT INTO `tqstatus` VALUES ('186', 'pending', null, null, '0', '2019-04-29 11:26:38', 'unread', '186');
INSERT INTO `tqstatus` VALUES ('187', 'pending', null, null, '0', '2019-04-29 11:26:38', 'unread', '187');
INSERT INTO `tqstatus` VALUES ('188', 'pending', null, null, '0', '2019-04-29 11:26:38', 'unread', '188');

-- ----------------------------
-- Table structure for user_access
-- ----------------------------
DROP TABLE IF EXISTS `user_access`;
CREATE TABLE `user_access` (
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
  `contact` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `employment_user_access` (`employment_id`),
  KEY `super_user_user_access` (`id`),
  CONSTRAINT `employment_user_access` FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`),
  CONSTRAINT `super_user_user_access` FOREIGN KEY (`id`) REFERENCES `super_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_access
-- ----------------------------
INSERT INTO `user_access` VALUES ('1', 'BA-2018-01', 'oWt54q', 'Instructor', null, 'checked', 'checked', '', '', '', '', '53', '1', '9355948117  ', 'offline');
INSERT INTO `user_access` VALUES ('2', 'BA-2018-02', '1fsFPk', 'Instructor', null, 'checked', 'checked', '', '', '', '', '64', '1', '9122706070  ', 'offline');
INSERT INTO `user_access` VALUES ('3', 'BA-2018-03', 'Z0AwB6', 'Instructor', null, 'checked', 'checked', '', '', '', '', '67', '1', '9092037773  ', 'offline');
INSERT INTO `user_access` VALUES ('4', 'BA-2018-04', 'rS8aMl', 'Instructor', null, 'checked', 'checked', '', '', '', '', '85', '1', '9491464250  ', 'offline');
INSERT INTO `user_access` VALUES ('5', 'BA-2018-05', 'kf7PZo', 'Dean', null, 'checked', 'checked', '', 'checked', '', 'checked', '96', '1', '9994407363  ', 'offline');
INSERT INTO `user_access` VALUES ('6', 'BA-2018-06', 'HLJB5L', 'Instructor', null, 'checked', 'checked', '', '', '', '', '100', '1', '9309240914  ', 'offline');
INSERT INTO `user_access` VALUES ('7', 'BA-2018-07', 'nsqunT', 'Instructor', null, 'checked', 'checked', '', '', '', '', '114', '1', '09758730386  ', 'offline');
INSERT INTO `user_access` VALUES ('8', 'BA-2018-08', 'Lwl5P5', 'Instructor', null, 'checked', 'checked', '', '', '', '', '119', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('9', 'BA-2018-09', 'E66vvL', 'Instructor', null, 'checked', 'checked', '', '', '', '', '123', '1', '09109755010  ', 'offline');
INSERT INTO `user_access` VALUES ('10', 'BA-2018-10', 'BLexLG', 'Instructor', null, 'checked', 'checked', '', '', '', '', '125', '1', '09091048790  ', 'offline');
INSERT INTO `user_access` VALUES ('11', 'BA-2018-11', '7lSAVI', 'Instructor', null, 'checked', 'checked', '', '', '', '', '128', '1', '09480181925  ', 'offline');
INSERT INTO `user_access` VALUES ('12', 'BA-2018-12', 'trTsr2', 'Instructor', null, 'checked', 'checked', '', '', '', '', '136', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('13', 'BA-2018-13', 'Kmms7s', 'Instructor', null, 'checked', 'checked', '', '', '', '', '137', '1', '09287225770  ', 'offline');
INSERT INTO `user_access` VALUES ('14', 'BA-2018-14', '9AZ7WY', 'Instructor', null, 'checked', 'checked', '', '', '', '', '142', '1', '09302419721  ', 'offline');
INSERT INTO `user_access` VALUES ('15', 'BA-2018-15', 'sX4Q8P', 'Instructor', null, 'checked', 'checked', '', '', '', '', '156', '1', '09099155876  ', 'offline');
INSERT INTO `user_access` VALUES ('16', 'BA-2018-16', 'B3Gon8', 'Instructor', null, 'checked', 'checked', '', '', '', '', '160', '1', '09328710639  ', 'offline');
INSERT INTO `user_access` VALUES ('17', 'BA-2018-17', 'DzrpqL', 'Instructor', null, 'checked', 'checked', '', '', '', '', '164', '1', '0909  ', 'offline');
INSERT INTO `user_access` VALUES ('18', 'BA-2018-18', 'RjBZAf', 'Instructor', null, 'checked', 'checked', '', '', '', '', '165', '1', '09391901622  ', 'offline');
INSERT INTO `user_access` VALUES ('19', 'BA-2018-19', 'DfBiS3', 'Instructor', null, 'checked', 'checked', '', '', '', '', '167', '1', '09984042424  ', 'offline');
INSERT INTO `user_access` VALUES ('20', 'BA-2018-20', 'mvxMjE', 'Instructor', null, 'checked', 'checked', '', '', '', '', '172', '1', '09357723708  ', 'offline');
INSERT INTO `user_access` VALUES ('21', 'BA-2018-21', 'RFedfJ', 'Instructor', null, 'checked', 'checked', '', '', '', '', '173', '1', '09486280404  ', 'offline');
INSERT INTO `user_access` VALUES ('22', 'BA-2018-22', 'o2RDxM', 'Instructor', null, 'checked', 'checked', '', '', '', '', '174', '1', '09487074504  ', 'offline');
INSERT INTO `user_access` VALUES ('23', 'BA-2018-23', 'Z04QVG', 'Instructor', null, 'checked', 'checked', '', '', '', '', '184', '1', '09124813982  ', 'offline');
INSERT INTO `user_access` VALUES ('24', 'BA-2018-24', 'OIPOdu', 'Instructor', null, 'checked', 'checked', '', '', '', '', '187', '1', '09154961434  ', 'offline');
INSERT INTO `user_access` VALUES ('25', 'GEN-2018-01', '9P4xWw', 'Instructor', null, 'checked', 'checked', '', '', '', '', '47', '1', '9175721022  ', 'offline');
INSERT INTO `user_access` VALUES ('26', 'GEN-2018-02', '8BVxZ1', 'Instructor', null, 'checked', 'checked', '', '', '', '', '106', '1', '9289670615  ', 'offline');
INSERT INTO `user_access` VALUES ('27', 'GEN-2018-03', 'FF6fNy', 'Instructor', null, 'checked', 'checked', '', '', '', '', '115', '1', '09489886175  ', 'offline');
INSERT INTO `user_access` VALUES ('28', 'GEN-2018-04', 'UgFLV8', 'Instructor', null, 'checked', 'checked', '', '', '', '', '120', '1', '09203185838  ', 'offline');
INSERT INTO `user_access` VALUES ('29', 'GEN-2018-05', 'jeu9a2', 'Instructor', null, 'checked', 'checked', '', '', '', '', '124', '1', '09463072072  ', 'offline');
INSERT INTO `user_access` VALUES ('30', 'GEN-2018-06', 'bWz5LV', 'Instructor', null, 'checked', 'checked', '', '', '', '', '144', '1', '09270244542  ', 'offline');
INSERT INTO `user_access` VALUES ('31', 'GEN-2018-07', 'Pm5lLw', 'Instructor', null, 'checked', 'checked', '', '', '', '', '146', '1', '09123861609  ', 'offline');
INSERT INTO `user_access` VALUES ('32', 'GEN-2018-08', 'beqovV', 'Instructor', null, 'checked', 'checked', '', '', '', '', '157', '1', '091248213665  ', 'offline');
INSERT INTO `user_access` VALUES ('33', 'GEN-2018-09', 'RMtGrc', 'Instructor', null, 'checked', 'checked', '', '', '', '', '158', '1', '09277870165  ', 'offline');
INSERT INTO `user_access` VALUES ('34', 'GEN-2018-10', 'sqG6EL', 'Instructor', null, 'checked', 'checked', '', '', '', '', '159', '1', '09074981248  ', 'offline');
INSERT INTO `user_access` VALUES ('35', 'GEN-2018-11', 'jATXqM', 'Instructor', null, 'checked', 'checked', '', '', '', '', '166', '1', '09092743027  ', 'offline');
INSERT INTO `user_access` VALUES ('36', 'GEN-2018-12', 'TGJKFH', 'Instructor', null, 'checked', 'checked', '', '', '', '', '168', '1', '09209644559  ', 'offline');
INSERT INTO `user_access` VALUES ('37', 'GEN-2018-13', 'bLS3hc', 'Instructor', null, 'checked', 'checked', '', '', '', '', '181', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('38', 'ITE-2018-01', 'E2i0DY', 'Dean', null, 'checked', 'checked', '', 'checked', '', '', '44', '1', '091013999964  ', 'offline');
INSERT INTO `user_access` VALUES ('39', 'ITE-2018-02', 'FZKFtC', 'Instructor', null, 'checked', 'checked', '', '', '', '', '46', '1', '9262044375  ', 'offline');
INSERT INTO `user_access` VALUES ('40', 'ITE-2018-03', 'sfix2c', 'Instructor', null, 'checked', 'checked', '', '', '', '', '49', '1', '9199911994  ', 'offline');
INSERT INTO `user_access` VALUES ('41', 'ITE-2018-04', 'onFWvp', 'Instructor', null, 'checked', 'checked', '', 'checked', '', 'checked', '52', '1', '9062459106  ', 'offline');
INSERT INTO `user_access` VALUES ('42', 'ITE-2018-05', 'PePg6r', 'Program Head', null, 'checked', 'checked', '', 'checked', '', '', '54', '1', '946382604  ', 'offline');
INSERT INTO `user_access` VALUES ('43', 'ITE-2018-06', '2tZPb7', 'Instructor', null, 'checked', 'checked', '', '', '', '', '57', '1', '9497092177  ', 'offline');
INSERT INTO `user_access` VALUES ('44', 'ITE-2018-07', 'Yol0At', 'Instructor', null, 'checked', 'checked', '', '', '', '', '68', '1', '9308021071  ', 'offline');
INSERT INTO `user_access` VALUES ('45', 'ITE-2018-08', 'M1EMCQ', 'Instructor', null, 'checked', 'checked', '', '', '', '', '93', '1', '912532468  ', 'offline');
INSERT INTO `user_access` VALUES ('46', 'ITE-2018-09', 'qHzpfs', 'Instructor', null, 'checked', 'checked', '', '', '', '', '103', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('47', 'ITE-2018-10', 'SNkuOB', 'Instructor', null, 'checked', 'checked', '', '', '', '', '104', '1', '9501886860  ', 'offline');
INSERT INTO `user_access` VALUES ('48', 'ITE-2018-11', '735hcG', 'Instructor', null, 'checked', 'checked', '', '', '', '', '111', '1', '9983225290  ', 'offline');
INSERT INTO `user_access` VALUES ('49', 'ITE-2018-12', 'yQucQA', 'Instructor', null, 'checked', 'checked', '', '', '', '', '126', '1', '09166163326  ', 'offline');
INSERT INTO `user_access` VALUES ('50', 'ITE-2018-13', '4Io307', 'Instructor', null, 'checked', 'checked', '', 'checked', '', '', '127', '1', '09076709100  ', 'offline');
INSERT INTO `user_access` VALUES ('51', 'ITE-2018-14', 'ZixROe', 'Instructor', null, 'checked', 'checked', '', '', '', '', '131', '1', '09157991341  ', 'offline');
INSERT INTO `user_access` VALUES ('52', 'ITE-2018-15', '2cK6uP', 'Instructor', null, 'checked', 'checked', '', '', '', '', '161', '1', '09108070683  ', 'offline');
INSERT INTO `user_access` VALUES ('53', 'ITE-2018-16', 'hrmfsD', 'Instructor', null, 'checked', 'checked', '', '', '', '', '162', '1', '09469006448  ', 'offline');
INSERT INTO `user_access` VALUES ('54', 'ITE-2018-17', 'PxXETY', 'Instructor', null, 'checked', 'checked', '', '', '', '', '163', '1', '09  ', 'offline');
INSERT INTO `user_access` VALUES ('55', 'ITE-2018-18', 'MPtSBt', 'Instructor', null, 'checked', 'checked', '', '', '', '', '182', '1', '09483653065  ', 'offline');
INSERT INTO `user_access` VALUES ('56', 'ITE-2018-19', 'XKnd3q', 'Instructor', null, 'checked', 'checked', '', '', '', '', '183', '1', '09382106831  ', 'offline');
INSERT INTO `user_access` VALUES ('57', 'SHS-2018-01', 'CgbLoy', 'Instructor', null, 'checked', 'checked', '', '', '', '', '61', '1', '9468148882  ', 'offline');
INSERT INTO `user_access` VALUES ('58', 'SHS-2018-02', 'ct1f3H', 'Dean', null, 'checked', 'checked', '', 'checked', '', '', '63', '1', '9093261240  ', 'offline');
INSERT INTO `user_access` VALUES ('59', 'SHS-2018-03', 'EghSF7', 'Instructor', null, 'checked', 'checked', '', '', '', '', '65', '1', '9092125821  ', 'offline');
INSERT INTO `user_access` VALUES ('60', 'SHS-2018-04', 'YI6Iq7', 'Instructor', null, 'checked', 'checked', '', '', '', '', '71', '1', '9071476860  ', 'offline');
INSERT INTO `user_access` VALUES ('61', 'SHS-2018-05', 'Wh2JPU', 'Instructor', null, 'checked', 'checked', '', '', '', '', '94', '1', '9126324779  ', 'offline');
INSERT INTO `user_access` VALUES ('62', 'SHS-2018-06', '1T7Fam', 'Dean', null, 'checked', 'checked', '', 'checked', '', '', '98', '1', '9466400505  ', 'offline');
INSERT INTO `user_access` VALUES ('63', 'SHS-2018-07', 'Xc8PrH', 'Academic Head', null, 'checked', 'checked', '', 'checked', '', 'checked', '107', '1', '9778136587  ', 'offline');
INSERT INTO `user_access` VALUES ('64', 'SHS-2018-08', 'ExdalE', 'Instructor', null, 'checked', 'checked', '', '', '', '', '113', '1', '9187709774  ', 'offline');
INSERT INTO `user_access` VALUES ('65', 'SHS-2018-09', 'v0MmKf', 'Instructor', null, 'checked', 'checked', '', '', '', '', '117', '1', '09153478495  ', 'offline');
INSERT INTO `user_access` VALUES ('66', 'SHS-2018-10', 'vIsnzY', 'Instructor', null, 'checked', 'checked', '', '', '', '', '122', '1', '09094035834  ', 'offline');
INSERT INTO `user_access` VALUES ('67', 'SHS-2018-11', 'ZaI8dX', 'Instructor', null, 'checked', 'checked', '', '', '', '', '129', '1', '0977651853  ', 'offline');
INSERT INTO `user_access` VALUES ('68', 'SHS-2018-12', 'ab5RYa', 'Instructor', null, 'checked', 'checked', '', '', '', '', '140', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('69', 'SHS-2018-13', 'eQBmBW', 'Instructor', null, 'checked', 'checked', '', '', '', '', '147', '1', '09094220222  ', 'offline');
INSERT INTO `user_access` VALUES ('70', 'SHS-2018-14', '54raHf', 'Instructor', null, 'checked', 'checked', '', '', '', '', '148', '1', '09753018850  ', 'offline');
INSERT INTO `user_access` VALUES ('71', 'SHS-2018-15', 'ds3Cfs', 'Instructor', null, 'checked', 'checked', '', '', '', '', '149', '1', '09502185675  ', 'offline');
INSERT INTO `user_access` VALUES ('72', 'SHS-2018-16', 'UL9jXG', 'Instructor', null, 'checked', 'checked', '', '', '', '', '152', '1', '09464630502  ', 'offline');
INSERT INTO `user_access` VALUES ('73', 'SHS-2018-17', 'QGAgWB', 'Instructor', null, 'checked', 'checked', '', '', '', '', '153', '1', '09482967180  ', 'offline');
INSERT INTO `user_access` VALUES ('74', 'SHS-2018-18', '3Pk813', 'Instructor', null, 'checked', 'checked', '', '', '', '', '154', '1', '09093382583  ', 'offline');
INSERT INTO `user_access` VALUES ('75', 'SHS-2018-19', 'u4tONT', 'Instructor', null, 'checked', 'checked', '', '', '', '', '169', '1', '09219226016  ', 'offline');
INSERT INTO `user_access` VALUES ('76', 'SHS-2018-20', 'Wpoj1d', 'Instructor', null, 'checked', 'checked', '', '', '', '', '186', '1', '09092055777  ', 'offline');
INSERT INTO `user_access` VALUES ('77', 'ITE-2018-20', 'BQxD4j', 'Instructor', null, 'checked', 'checked', '', '', '', '', '73', '1', '9285595074  ', 'offline');
INSERT INTO `user_access` VALUES ('78', 'SHS-2018-21', 'cP2kvc', 'Instructor', null, 'checked', 'checked', '', '', '', '', '150', '1', '09505998056', 'offline');
INSERT INTO `user_access` VALUES ('79', 'SHS-2018-22', 'qzEZKL', 'Instructor', null, 'checked', 'checked', '', '', '', '', '175', '1', '09302375034', 'offline');
INSERT INTO `user_access` VALUES ('80', 'ITE-2018-21', 'jyde', 'Instructor', null, 'checked', 'checked', '', '', '', '', '143', '1', '09951291190', 'offline');
INSERT INTO `user_access` VALUES ('81', 'BA-2018-25', 'dIlwClw', 'Instructor', null, 'checked', 'checked', '', '', '', '', '141', '1', '09210349486  ', 'offline');
INSERT INTO `user_access` VALUES ('82', 'BA-2018-26', 'bxHXo3', 'Instructor', null, 'checked', 'checked', '', '', '', '', '201', '1', '09507623608  ', 'offline');
INSERT INTO `user_access` VALUES ('83', 'BA-2018-27', 'LDQ5az', 'Instructor', null, 'checked', 'checked', '', '', '', '', '202', '1', '09957292598  ', 'offline');
INSERT INTO `user_access` VALUES ('84', 'GEN-2018-14', 'cI7aVO', 'Instructor', null, 'checked', 'checked', '', '', '', '', '192', '1', '09464192776  ', 'offline');
INSERT INTO `user_access` VALUES ('85', 'GEN-2018-15', 'RCDbGx', 'Instructor', null, 'checked', 'checked', '', '', '', '', '193', '1', '09473721745  ', 'offline');
INSERT INTO `user_access` VALUES ('86', 'GEN-2018-16', 'FL55V3', 'Instructor', null, 'checked', 'checked', '', '', '', '', '198', '1', '09354065122  ', 'offline');
INSERT INTO `user_access` VALUES ('87', 'GEN-2018-17', 'QueznU', 'Instructor', null, 'checked', 'checked', '', '', '', '', '199', '1', '09309662223  ', 'offline');
INSERT INTO `user_access` VALUES ('88', 'SHS-2018-23', 'BZpoTI', 'Instructor', null, 'checked', 'checked', '', '', '', '', '194', '1', '  ', 'offline');
INSERT INTO `user_access` VALUES ('89', 'SHS-2018-24', 'C3EiDI', 'Instructor', null, 'checked', 'checked', '', '', '', '', '195', '1', '09559629285  ', 'offline');
INSERT INTO `user_access` VALUES ('90', 'SHS-2018-25', 'No098I', 'Instructor', null, 'checked', 'checked', '', '', '', '', '196', '1', '09128335888  ', 'offline');
INSERT INTO `user_access` VALUES ('91', 'SHS-2018-26', 'HDfodF', 'Instructor', null, 'checked', 'checked', '', '', '', '', '197', '1', '09161278113  ', 'offline');
INSERT INTO `user_access` VALUES ('92', 'GEN-2018-18', 'JKL7s8', 'Instructor', null, 'checked', 'checked', '', '', '', '', '200', '1', ' ', 'offline');

-- ----------------------------
-- View structure for notif
-- ----------------------------
DROP VIEW IF EXISTS `notif`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `notif` AS SELECT
syllabus.course_info_id AS course_info_id,
syllabus.ss_id AS ss_id,
sched_subj.employment_id AS employment_id,
sched_subj.subj_id AS subj_id,
sched_subj.sem_id AS sem_id,
sched_subj.sy_id AS sy_id,
employees.employee_fname AS employee_fname,
employees.employee_mname AS employee_mname,
employees.employee_lname AS employee_lname,
employees.employee_ext AS employee_ext,
`subject`.subj_code AS subj_code,
`subject`.subj_name AS subj_name,
`subject`.subj_desc AS subj_desc,
tq.num_copies AS num_copies,
tq.syllabus_id AS syllabus_id,
tq.exam_id AS exam_id,
tqstatus.status_desc AS status_desc,
tqstatus.late AS late,
tqstatus.revise_count AS revise_count,
tqstatus.date_time AS date_time,
tqstatus.notif_status AS notif_status,
tqstatus.tq_id AS tq_id,
major_exams.exam_period AS exam_period,
user_access.username AS username,
user_access.user_id AS user_id,
department.department_name AS department_name,
tqstatus.ph,
school_year.sy,
semester.semester
FROM
(((((((((syllabus
JOIN sched_subj ON ((syllabus.ss_id = sched_subj.ss_id)))
JOIN employment ON ((sched_subj.employment_id = employment.employment_id)))
JOIN employees ON ((employment.employee_id = employees.employee_id)))
JOIN department ON ((employment.department_id = department.department_id)))
JOIN `subject` ON ((sched_subj.subj_id = `subject`.subj_id)))
JOIN tq ON ((tq.syllabus_id = syllabus.syllabus_id)))
JOIN tqstatus ON ((tqstatus.tq_id = tq.tq_id)))
JOIN major_exams ON ((tq.exam_id = major_exams.exam_id)))
JOIN user_access ON ((user_access.employment_id = employment.employment_id)))
INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id ;
