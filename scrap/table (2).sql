
INSERT INTO `effectivity` (`eff_id`, `eff_sy`, `eff_sem`) VALUES
(1, '2016-2017', '1st Semister'),
(2, '2016-2017', '2st Semister'),
(3, '2017-2018', '1nd Semister'),
(4, '2017-2018', '2nd Semister');

INSERT INTO `year` (`y_id`, `year`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');



INSERT INTO `cur_subject` (`cs_id`, `eff_id`, `y_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);



INSERT INTO `department` (`department_id`, `department_name`, `department_status`) VALUES
(1, 'ITE ', 'Active'),
(2, 'CS', 'Active'),
(3, 'BA', 'Active'),
(4, 'CSNT', 'Inactive'),
(5, 'CSDP', 'Inactive');

INSERT INTO `testbank`.`major_exams` (`exam_id`, `exam_period`) VALUES 
('1', 'prelim'), 
('2', 'midterm'), 
('3', 'prefinal'), 
('4', 'final');

INSERT INTO `ilo` (`ILO_ID`, `ILO_attributes`, `ILO_code`, `ILO_description`) VALUES
(1, 'Critical and Logical Thinker', 'IGO01', 'Critically analyze and evaluate the application of fundamental knowledge and disciplinal principles in defined problem or requirements to the abstraction, conceptualization, and generation of comprehensive conclusion and substantiated recommendation'),
(2, 'Ingenuity', 'IGO02', 'Incorporate legal, environmental, scientific, technological, economic, cultural, professional, and other disciplinal requirements in the conceptualization, proposal, formulation, creation, development, innovation, and sustainability of cost-effective tang'),
(3, 'Collaborative Governance', 'IGO03', 'Demonstrate committed leadership in the achievement of team goals and collaboratively function as a responsible and effective member or leader in different teams and multidisciplinary settings reflective of Filipino cultural heritage and values of family,'),
(7, 'Effective Communicator', 'IGO04', 'Effectively communicate with English fluency in narrative, logical, tabular, graphical, verbal, and electronic formats that meet user and audience requirements '),
(8, 'Ethics', 'IGO05', 'Demonstrate with understanding and commitment to adhere oneself to professional norms and ethics in the practice of discipline '),
(9, 'Lifelong Learning', 'IGO06', 'Evaluate and reflects critically on own assumptions and values, thinking, performance, and behavior, and well-being that result with the recognition of the need for continual learning as a foundation for professional development, as well as the sustainabl');



INSERT INTO `program_graduate_outcomes` (`pgo_id`, `graduate_attributes`, `graduate_outcome_code`, `graduate_outcome_description`) VALUES
(7, 'Knowledge for Solving Computing Problems 1', 'IT01', 'Apply Knowledge of computing, science, and mathematics appropriate to the discipline.'),
(8, 'Knowledge for Solving Computing Problems 2', 'IT02', 'Understand best practice and standards and their applications'),
(9, 'Problem Analysis 1', 'IT03', 'Analyze complex problems, and identify and define the computing requirements appropriate to its solution'),
(10, 'Problem Analysis 2', 'IT04', 'Identify and analyze user needs and take them into account in the selection, creation, evaluation and administration of computer-based systems.'),
(11, 'Design/ Development Solutions 1', 'IT05', 'Design, implement, and evaluate computer-based systems, processes, components, or programs to meet desired needs and requirements under various constraints'),
(12, 'Design/ Development Solutions 2', 'IT06', 'Integrate IT-based solutions into the user environment effectively'),
(13, 'Modern Tool Usage', 'IT07', 'Apply knowledge through the use of current techniques, skills, tools and practices necessary for the IT profession'),
(14, 'Individual & Team Work 1', 'IT08', 'Function effectively as a member of leader of a development team recognizing the different roles within a team to accomplish a common goal'),
(15, 'Individual & Team Work 2', 'IT09', 'Assist in the creation of an effective IT Project Plan'),
(16, 'Communication', 'IT10', 'Communicate effectively with the computing community and with society at large about complex computing activities through logical writing, presentations, and clear instructions'),
(17, 'Computing Professionalism and Ethics 1', 'IT11', 'Analyze the local and global impact of computing information technology on individuals, organizations, and society'),
(18, 'Computing Professionalism and Ethics 2', 'IT12', 'Understand professional, ethical, legal, security and social issues and responsibilities in the utilization of information technology'),
(19, 'Life-Long Learning', 'IT13', 'Recognized the need for and engage in planning self-learning and improving performance as a foundation for continuing professional development');



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




INSERT INTO `school_year` (`sy_id`, `sy`) VALUES
(1, '2016-2017'),
(2, '2017-2018');



INSERT INTO `semester` (`sem_id`, `semester`) VALUES
(1, '1st Semester'),
(2, '2nd Semester');



INSERT INTO `subject` (`subj_id`, `subj_code`, `subj_name`, `subj_desc`, `cs_id`) VALUES
(1, 'cab2', 'Algebra', 'Math', 1),
(2, 'c2b2', 'Physical Education 3', 'Sports', 2),
(3, 'cb2a', 'Communication Skill 1', 'Language', 1),
(4, 'csa1', 'Computer Fundamentals', 'Basic Computer Knowledge', 1),
(5, 'cs4b', 'Internet Technology', 'HMTL', 2),
(6, 'Itea', 'Free Elective 3', 'HP Tester', 3);



INSERT INTO `super_user` (`id`, `username`, `password`, `position`) VALUES
(1, 'admin', '1234', 'ADMIN'),
(2, 'print', '1234', 'Printing Incharge');






INSERT INTO `user_access` (`user_id`, `username`, `password`, `position`, `syllabus`, `tq`, `notification`, `queue`, `reports`, `setdate`, `employment_id`, `id`) VALUES
(6, 'jyde', '1234', 'Instructor', 'checked', 'checked', '', '', '', '', 888, 1);







INSERT INTO `unit_lecture` (`ulec_id`, `unit`, `subj_id`) VALUES
(1, '3', 1),
(2, '3', 2),
(3, '3', 3),
(4, '3', 4),
(5, '3', 5),
(6, '3', 6);

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



INSERT INTO `question_type` (`question_type_id`, `question_type_name`) VALUES
(1, 'Identification'),
(2, 'Enumeration'),
(3, 'Multiple Choice'),
(4, 'True or False'),
(5, 'Matching Type'),
(6, 'Problem Solving'),
(7, 'Essay'),
(8, 'Fill in the Blank');



INSERT INTO `cognitive_level` (`cognitive_level_id`, `cognitive_desc`) VALUES
(1, 'Knowledge'),
(2, 'Comprehension'),
(3, 'Application'),
(4, 'Analysis'),
(5, 'Evaluation'),
(6, 'Synthesis');
