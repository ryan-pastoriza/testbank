# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          final (1).dez                                   #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2016-11-23 13:42                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "syllabus"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `syllabus` (
    `syllabus_id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_info_id` INTEGER NOT NULL,
    `ss_id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_syllabus` PRIMARY KEY (`syllabus_id`)
);

# ---------------------------------------------------------------------- #
# Add table "sched_subj"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `sched_subj` (
    `ss_id` INTEGER(40) NOT NULL AUTO_INCREMENT,
    `employment_id` INTEGER NOT NULL,
    `subj_id` INTEGER NOT NULL,
    `sem_id` INTEGER(40) NOT NULL,
    `sy_id` INTEGER NOT NULL,
    CONSTRAINT `PK_sched_subj` PRIMARY KEY (`ss_id`)
);

# ---------------------------------------------------------------------- #
# Add table "topics"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `topics` (
    `topics_id` INTEGER NOT NULL AUTO_INCREMENT,
    `topic_description` VARCHAR(40) NOT NULL,
    `week` VARCHAR(40),
    `tla` VARCHAR(255),
    `resources` VARCHAR(255),
    `oba` VARCHAR(255),
    `syllabus_id` INTEGER NOT NULL,
    `exam_id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_topics` PRIMARY KEY (`topics_id`)
);

# ---------------------------------------------------------------------- #
# Add table "ILO"                                                        #
# ---------------------------------------------------------------------- #

CREATE TABLE `ILO` (
    `ILO_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `ILO_attributes` VARCHAR(40),
    `ILO_code` VARCHAR(40),
    `ILO_description` VARCHAR(100),
    PRIMARY KEY (`ILO_ID`)
);

# ---------------------------------------------------------------------- #
# Add table "course_learning_outcomes"                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `course_learning_outcomes` (
    `CLO_id` INTEGER NOT NULL AUTO_INCREMENT,
    `ILO_ID` INTEGER NOT NULL,
    `syllabus_id` INTEGER NOT NULL,
    PRIMARY KEY (`CLO_id`)
);

# ---------------------------------------------------------------------- #
# Add table "subject_info"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `subject_info` (
    `subject_info_id` INTEGER NOT NULL AUTO_INCREMENT,
    `subject_name` VARCHAR(40),
    `subject_code` VARCHAR(40),
    `subject_unit` VARCHAR(40),
    `pre_requisites` VARCHAR(40),
    `subject_description` VARCHAR(40),
    CONSTRAINT `PK_subject_info` PRIMARY KEY (`subject_info_id`)
);

# ---------------------------------------------------------------------- #
# Add table "program_graduate_outcomes"                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `program_graduate_outcomes` (
    `pgo_id` INTEGER NOT NULL AUTO_INCREMENT,
    `graduate_attributes` VARCHAR(100),
    `graduate_outcome_code` VARCHAR(40),
    `graduate_outcome_description` VARCHAR(500),
    CONSTRAINT `PK_program_graduate_outcomes` PRIMARY KEY (`pgo_id`)
);

# ---------------------------------------------------------------------- #
# Add table "subtopic"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `subtopic` (
    `subtopic_id` INTEGER NOT NULL AUTO_INCREMENT,
    `subtopic_description` VARCHAR(100),
    `topics_id` INTEGER,
    CONSTRAINT `PK_subtopic` PRIMARY KEY (`subtopic_id`)
);

# ---------------------------------------------------------------------- #
# Add table "TestQuestions"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `TestQuestions` (
    `q_id` INTEGER NOT NULL AUTO_INCREMENT,
    `number` INTEGER(10),
    `question_desc` VARCHAR(255),
    `points` INTEGER(10),
    `answer` VARCHAR(100),
    `remarks` VARCHAR(100),
    `attachment` VARCHAR(100),
    `cognitive_level_id` INTEGER NOT NULL,
    `topics_id` INTEGER NOT NULL,
    `test_id` INTEGER NOT NULL,
    CONSTRAINT `PK_TestQuestions` PRIMARY KEY (`q_id`)
);

# ---------------------------------------------------------------------- #
# Add table "major_exams"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `major_exams` (
    `exam_id` INTEGER(40) NOT NULL AUTO_INCREMENT,
    `exam_period` VARCHAR(40),
    CONSTRAINT `PK_major_exams` PRIMARY KEY (`exam_id`)
);

# ---------------------------------------------------------------------- #
# Add table "test_number"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `test_number` (
    `test_id` INTEGER NOT NULL AUTO_INCREMENT,
    `test_number` VARCHAR(100),
    `test_desc` VARCHAR(255),
    `attachment` VARCHAR(100),
    `tq_id` INTEGER NOT NULL,
    `question_type_id` INTEGER NOT NULL,
    PRIMARY KEY (`test_id`)
);

# ---------------------------------------------------------------------- #
# Add table "cognitive_level"                                            #
# ---------------------------------------------------------------------- #

CREATE TABLE `cognitive_level` (
    `cognitive_level_id` INTEGER NOT NULL AUTO_INCREMENT,
    `cognitive_desc` VARCHAR(50),
    CONSTRAINT `PK_cognitive_level` PRIMARY KEY (`cognitive_level_id`)
);

# ---------------------------------------------------------------------- #
# Add table "exam_schedule"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `exam_schedule` (
    `exam_schedule_id` INTEGER NOT NULL AUTO_INCREMENT,
    `start` DATE,
    `end` VARCHAR(40),
    `exam_id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_exam_schedule` PRIMARY KEY (`exam_schedule_id`)
);

# ---------------------------------------------------------------------- #
# Add table "subject"                                                    #
# ---------------------------------------------------------------------- #

CREATE TABLE `subject` (
    `subj_id` INTEGER NOT NULL AUTO_INCREMENT,
    `subj_code` VARCHAR(40),
    `subj_name` VARCHAR(40),
    `subj_desc` VARCHAR(40),
    `cs_id` INTEGER NOT NULL,
    CONSTRAINT `PK_subject` PRIMARY KEY (`subj_id`)
);

# ---------------------------------------------------------------------- #
# Add table "unit_lecture"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `unit_lecture` (
    `ulec_id` INTEGER NOT NULL AUTO_INCREMENT,
    `unit` VARCHAR(40),
    `subj_id` INTEGER NOT NULL,
    CONSTRAINT `PK_unit_lecture` PRIMARY KEY (`ulec_id`)
);

# ---------------------------------------------------------------------- #
# Add table "unit_lab"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `unit_lab` (
    `ulab_id` INTEGER NOT NULL AUTO_INCREMENT,
    `subj_id` INTEGER NOT NULL,
    CONSTRAINT `PK_unit_lab` PRIMARY KEY (`ulab_id`)
);

# ---------------------------------------------------------------------- #
# Add table "cur_subject"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `cur_subject` (
    `cs_id` INTEGER NOT NULL,
    `eff_id` INTEGER NOT NULL,
    `y_id` INTEGER NOT NULL,
    CONSTRAINT `PK_cur_subject` PRIMARY KEY (`cs_id`)
);

# ---------------------------------------------------------------------- #
# Add table "effectivity"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `effectivity` (
    `eff_id` INTEGER NOT NULL,
    `eff_sy` VARCHAR(40),
    `eff_sem` VARCHAR(40),
    CONSTRAINT `PK_effectivity` PRIMARY KEY (`eff_id`)
);

# ---------------------------------------------------------------------- #
# Add table "year"                                                       #
# ---------------------------------------------------------------------- #

CREATE TABLE `year` (
    `y_id` INTEGER NOT NULL AUTO_INCREMENT,
    `year` VARCHAR(40),
    CONSTRAINT `PK_year` PRIMARY KEY (`y_id`)
);

# ---------------------------------------------------------------------- #
# Add table "employment"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `employment` (
    `employment_id` INTEGER NOT NULL,
    `employment_status` VARCHAR(50),
    `employment_job_title` VARCHAR(50),
    `employee_id` INTEGER NOT NULL,
    `department_id` INTEGER NOT NULL,
    PRIMARY KEY (`employment_id`)
);

# ---------------------------------------------------------------------- #
# Add table "employees"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `employees` (
    `employee_id` INTEGER NOT NULL AUTO_INCREMENT,
    `employee_fname` VARCHAR(50),
    `employee_mname` VARCHAR(50),
    `employee_lname` VARCHAR(50),
    `employee_ext` VARCHAR(40),
    CONSTRAINT `PK_employees` PRIMARY KEY (`employee_id`)
);

# ---------------------------------------------------------------------- #
# Add table "department"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `department` (
    `department_id` INTEGER NOT NULL AUTO_INCREMENT,
    `department_name` VARCHAR(40),
    `department_status` VARCHAR(40),
    CONSTRAINT `PK_department` PRIMARY KEY (`department_id`)
);

# ---------------------------------------------------------------------- #
# Add table "semester"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `semester` (
    `sem_id` INTEGER(40) NOT NULL AUTO_INCREMENT,
    `semester` VARCHAR(40),
    CONSTRAINT `PK_semester` PRIMARY KEY (`sem_id`)
);

# ---------------------------------------------------------------------- #
# Add table "school_year"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `school_year` (
    `sy_id` INTEGER NOT NULL AUTO_INCREMENT,
    `sy` VARCHAR(40),
    CONSTRAINT `PK_school_year` PRIMARY KEY (`sy_id`)
);

# ---------------------------------------------------------------------- #
# Add table "user_access"                                                #
# ---------------------------------------------------------------------- #

CREATE TABLE `user_access` (
    `user_id` INTEGER NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(40),
    `password` VARCHAR(40),
    `position` VARCHAR(40),
    `user_id1` INTEGER,
    `syllabus` VARCHAR(40),
    `tq` VARCHAR(40),
    `notification` VARCHAR(40),
    `queue` VARCHAR(40),
    `reports` VARCHAR(40),
    `setdate` VARCHAR(40),
    `employment_id` INTEGER NOT NULL,
    `id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_user_access` PRIMARY KEY (`user_id`)
);

# ---------------------------------------------------------------------- #
# Add table "super_user"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `super_user` (
    `id` INTEGER(40) NOT NULL,
    `username` VARCHAR(40),
    `password` VARCHAR(40),
    `position` VARCHAR(40),
    CONSTRAINT `PK_super_user` PRIMARY KEY (`id`)
);

# ---------------------------------------------------------------------- #
# Add table "syllabus_pgo"                                               #
# ---------------------------------------------------------------------- #

CREATE TABLE `syllabus_pgo` (
    `spgo_id` INTEGER NOT NULL AUTO_INCREMENT,
    `pgo_id` INTEGER NOT NULL,
    `syllabus_id` INTEGER,
    CONSTRAINT `PK_syllabus_pgo` PRIMARY KEY (`spgo_id`)
);

# ---------------------------------------------------------------------- #
# Add table "topic_ilo"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `topic_ilo` (
    `topic_ilo_id` INTEGER NOT NULL AUTO_INCREMENT,
    `CLO_id` INTEGER NOT NULL,
    `topics_id` INTEGER NOT NULL,
    CONSTRAINT `PK_topic_ilo` PRIMARY KEY (`topic_ilo_id`)
);

# ---------------------------------------------------------------------- #
# Add table "course_req"                                                 #
# ---------------------------------------------------------------------- #

CREATE TABLE `course_req` (
    `cr_id` INTEGER NOT NULL AUTO_INCREMENT,
    `cr_output` VARCHAR(40),
    `cr_desc` VARCHAR(40),
    `syllabus_id` INTEGER NOT NULL,
    CONSTRAINT `PK_course_req` PRIMARY KEY (`cr_id`)
);

# ---------------------------------------------------------------------- #
# Add table "reference"                                                  #
# ---------------------------------------------------------------------- #

CREATE TABLE `reference` (
    `ref_id` INTEGER NOT NULL AUTO_INCREMENT,
    `ref_desc` VARCHAR(40),
    `syllabus_id` INTEGER NOT NULL,
    CONSTRAINT `PK_reference` PRIMARY KEY (`ref_id`)
);

# ---------------------------------------------------------------------- #
# Add table "policies"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `policies` (
    `policy_id` INTEGER NOT NULL AUTO_INCREMENT,
    `late_tardiness` VARCHAR(40),
    `absence` VARCHAR(40),
    `miss_quiz` VARCHAR(40),
    `permits` VARCHAR(40),
    `cheating` VARCHAR(40),
    `class_misbehavior` VARCHAR(40),
    `syllabus_id` INTEGER NOT NULL,
    CONSTRAINT `PK_policies` PRIMARY KEY (`policy_id`)
);

# ---------------------------------------------------------------------- #
# Add table "tq"                                                         #
# ---------------------------------------------------------------------- #

CREATE TABLE `tq` (
    `tq_id` INTEGER NOT NULL AUTO_INCREMENT,
    `tos_remarks` VARCHAR(255),
    `syllabus_id` INTEGER NOT NULL,
    `exam_id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_tq` PRIMARY KEY (`tq_id`)
);

# ---------------------------------------------------------------------- #
# Add table "question_type"                                              #
# ---------------------------------------------------------------------- #

CREATE TABLE `question_type` (
    `question_type_id` INTEGER NOT NULL AUTO_INCREMENT,
    `question_type_name` VARCHAR(100),
    CONSTRAINT `PK_question_type` PRIMARY KEY (`question_type_id`)
);

# ---------------------------------------------------------------------- #
# Add table "answer_choices"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `answer_choices` (
    `ac_id` INTEGER NOT NULL AUTO_INCREMENT,
    `answer_desc` VARCHAR(255),
    `q_id` INTEGER,
    CONSTRAINT `PK_answer_choices` PRIMARY KEY (`ac_id`)
);

# ---------------------------------------------------------------------- #
# Add table "tqstatus"                                                   #
# ---------------------------------------------------------------------- #

CREATE TABLE `tqstatus` (
    `status_id` INTEGER NOT NULL AUTO_INCREMENT,
    `status_desc` VARCHAR(100),
    `revise_count` INTEGER(10),
    `date` DATE,
    `notif_status` VARCHAR(40),
    `tq_id` INTEGER NOT NULL,
    CONSTRAINT `PK_tqstatus` PRIMARY KEY (`status_id`)
);

# ---------------------------------------------------------------------- #
# Add table "submission_sched"                                           #
# ---------------------------------------------------------------------- #

CREATE TABLE `submission_sched` (
    `sub_sched_id` INTEGER NOT NULL AUTO_INCREMENT,
    `deadline` DATE,
    `exam_id` INTEGER(40) NOT NULL,
    CONSTRAINT `PK_submission_sched` PRIMARY KEY (`sub_sched_id`)
);

# ---------------------------------------------------------------------- #
# Add table "syllabusstatus"                                             #
# ---------------------------------------------------------------------- #

CREATE TABLE `syllabusstatus` (
    `sstatus_id` INTEGER NOT NULL AUTO_INCREMENT,
    `status_desc` VARCHAR(40),
    `syllabus_id` INTEGER NOT NULL,
    CONSTRAINT `PK_syllabusstatus` PRIMARY KEY (`sstatus_id`)
);

# ---------------------------------------------------------------------- #
# Add table "author"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `author` (
    `author_id` INTEGER NOT NULL AUTO_INCREMENT,
    `author_desc` VARCHAR(40),
    `syllabus_id` INTEGER,
    `ss_id` INTEGER(40),
    CONSTRAINT `PK_author` PRIMARY KEY (`author_id`)
);

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `syllabus` ADD CONSTRAINT `subject_info_syllabus` 
    FOREIGN KEY (`course_info_id`) REFERENCES `subject_info` (`subject_info_id`);

ALTER TABLE `syllabus` ADD CONSTRAINT `sched_subj_syllabus` 
    FOREIGN KEY (`ss_id`) REFERENCES `sched_subj` (`ss_id`);

ALTER TABLE `sched_subj` ADD CONSTRAINT `subject_sched_subj` 
    FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

ALTER TABLE `sched_subj` ADD CONSTRAINT `employment_sched_subj` 
    FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`);

ALTER TABLE `sched_subj` ADD CONSTRAINT `semester_sched_subj` 
    FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`);

ALTER TABLE `sched_subj` ADD CONSTRAINT `school_year_sched_subj` 
    FOREIGN KEY (`sy_id`) REFERENCES `school_year` (`sy_id`);

ALTER TABLE `topics` ADD CONSTRAINT `syllabus_topics` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `topics` ADD CONSTRAINT `major_exams_topics` 
    FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`);

ALTER TABLE `course_learning_outcomes` ADD CONSTRAINT `ILO_course_learning_outcomes` 
    FOREIGN KEY (`ILO_ID`) REFERENCES `ILO` (`ILO_ID`);

ALTER TABLE `course_learning_outcomes` ADD CONSTRAINT `syllabus_course_learning_outcomes` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `subtopic` ADD CONSTRAINT `topics_subtopic` 
    FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

ALTER TABLE `TestQuestions` ADD CONSTRAINT `cognitive_level_TestQuestions` 
    FOREIGN KEY (`cognitive_level_id`) REFERENCES `cognitive_level` (`cognitive_level_id`);

ALTER TABLE `TestQuestions` ADD CONSTRAINT `topics_TestQuestions` 
    FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

ALTER TABLE `TestQuestions` ADD CONSTRAINT `test_number_TestQuestions` 
    FOREIGN KEY (`test_id`) REFERENCES `test_number` (`test_id`);

ALTER TABLE `test_number` ADD CONSTRAINT `tq_test_number` 
    FOREIGN KEY (`tq_id`) REFERENCES `tq` (`tq_id`);

ALTER TABLE `test_number` ADD CONSTRAINT `question_type_test_number` 
    FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`question_type_id`);

ALTER TABLE `exam_schedule` ADD CONSTRAINT `major_exams_exam_schedule` 
    FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`);

ALTER TABLE `subject` ADD CONSTRAINT `cur_subject_subject` 
    FOREIGN KEY (`cs_id`) REFERENCES `cur_subject` (`cs_id`);

ALTER TABLE `unit_lecture` ADD CONSTRAINT `subject_unit_lecture` 
    FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

ALTER TABLE `unit_lab` ADD CONSTRAINT `subject_unit_lab` 
    FOREIGN KEY (`subj_id`) REFERENCES `subject` (`subj_id`);

ALTER TABLE `cur_subject` ADD CONSTRAINT `effectivity_cur_subject` 
    FOREIGN KEY (`eff_id`) REFERENCES `effectivity` (`eff_id`);

ALTER TABLE `cur_subject` ADD CONSTRAINT `year_cur_subject` 
    FOREIGN KEY (`y_id`) REFERENCES `year` (`y_id`);

ALTER TABLE `employment` ADD CONSTRAINT `employees_employment` 
    FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

ALTER TABLE `employment` ADD CONSTRAINT `department_employment` 
    FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

ALTER TABLE `user_access` ADD CONSTRAINT `employment_user_access` 
    FOREIGN KEY (`employment_id`) REFERENCES `employment` (`employment_id`);

ALTER TABLE `user_access` ADD CONSTRAINT `super_user_user_access` 
    FOREIGN KEY (`id`) REFERENCES `super_user` (`id`);

ALTER TABLE `syllabus_pgo` ADD CONSTRAINT `program_graduate_outcomes_syllabus_pgo` 
    FOREIGN KEY (`pgo_id`) REFERENCES `program_graduate_outcomes` (`pgo_id`);

ALTER TABLE `syllabus_pgo` ADD CONSTRAINT `syllabus_syllabus_pgo` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `topic_ilo` ADD CONSTRAINT `course_learning_outcomes_topic_ilo` 
    FOREIGN KEY (`CLO_id`) REFERENCES `course_learning_outcomes` (`CLO_id`);

ALTER TABLE `topic_ilo` ADD CONSTRAINT `topics_topic_ilo` 
    FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);

ALTER TABLE `course_req` ADD CONSTRAINT `syllabus_course_req` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `reference` ADD CONSTRAINT `syllabus_reference` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `policies` ADD CONSTRAINT `syllabus_policies` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `tq` ADD CONSTRAINT `syllabus_tq` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `tq` ADD CONSTRAINT `major_exams_tq` 
    FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`);

ALTER TABLE `answer_choices` ADD CONSTRAINT `TestQuestions_answer_choices` 
    FOREIGN KEY (`q_id`) REFERENCES `TestQuestions` (`q_id`);

ALTER TABLE `tqstatus` ADD CONSTRAINT `tq_tqstatus` 
    FOREIGN KEY (`tq_id`) REFERENCES `tq` (`tq_id`);

ALTER TABLE `submission_sched` ADD CONSTRAINT `major_exams_submission_sched` 
    FOREIGN KEY (`exam_id`) REFERENCES `major_exams` (`exam_id`);

ALTER TABLE `syllabusstatus` ADD CONSTRAINT `syllabus_syllabusstatus` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `author` ADD CONSTRAINT `syllabus_author` 
    FOREIGN KEY (`syllabus_id`) REFERENCES `syllabus` (`syllabus_id`);

ALTER TABLE `author` ADD CONSTRAINT `sched_subj_author` 
    FOREIGN KEY (`ss_id`) REFERENCES `sched_subj` (`ss_id`);
