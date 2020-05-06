# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.2.1                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          final (1).dez                                   #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2016-11-28 00:45                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `syllabus` DROP FOREIGN KEY `subject_info_syllabus`;

ALTER TABLE `syllabus` DROP FOREIGN KEY `sched_subj_syllabus`;

ALTER TABLE `sched_subj` DROP FOREIGN KEY `subject_sched_subj`;

ALTER TABLE `sched_subj` DROP FOREIGN KEY `employment_sched_subj`;

ALTER TABLE `sched_subj` DROP FOREIGN KEY `semester_sched_subj`;

ALTER TABLE `sched_subj` DROP FOREIGN KEY `school_year_sched_subj`;

ALTER TABLE `topics` DROP FOREIGN KEY `syllabus_topics`;

ALTER TABLE `topics` DROP FOREIGN KEY `major_exams_topics`;

ALTER TABLE `course_learning_outcomes` DROP FOREIGN KEY `ILO_course_learning_outcomes`;

ALTER TABLE `course_learning_outcomes` DROP FOREIGN KEY `syllabus_course_learning_outcomes`;

ALTER TABLE `subtopic` DROP FOREIGN KEY `topics_subtopic`;

ALTER TABLE `TestQuestions` DROP FOREIGN KEY `cognitive_level_TestQuestions`;

ALTER TABLE `TestQuestions` DROP FOREIGN KEY `topics_TestQuestions`;

ALTER TABLE `TestQuestions` DROP FOREIGN KEY `test_number_TestQuestions`;

ALTER TABLE `test_number` DROP FOREIGN KEY `tq_test_number`;

ALTER TABLE `test_number` DROP FOREIGN KEY `question_type_test_number`;

ALTER TABLE `exam_schedule` DROP FOREIGN KEY `major_exams_exam_schedule`;

ALTER TABLE `subject` DROP FOREIGN KEY `cur_subject_subject`;

ALTER TABLE `unit_lecture` DROP FOREIGN KEY `subject_unit_lecture`;

ALTER TABLE `unit_lab` DROP FOREIGN KEY `subject_unit_lab`;

ALTER TABLE `cur_subject` DROP FOREIGN KEY `effectivity_cur_subject`;

ALTER TABLE `cur_subject` DROP FOREIGN KEY `year_cur_subject`;

ALTER TABLE `employment` DROP FOREIGN KEY `employees_employment`;

ALTER TABLE `employment` DROP FOREIGN KEY `department_employment`;

ALTER TABLE `user_access` DROP FOREIGN KEY `employment_user_access`;

ALTER TABLE `user_access` DROP FOREIGN KEY `super_user_user_access`;

ALTER TABLE `syllabus_pgo` DROP FOREIGN KEY `program_graduate_outcomes_syllabus_pgo`;

ALTER TABLE `syllabus_pgo` DROP FOREIGN KEY `syllabus_syllabus_pgo`;

ALTER TABLE `topic_ilo` DROP FOREIGN KEY `course_learning_outcomes_topic_ilo`;

ALTER TABLE `topic_ilo` DROP FOREIGN KEY `topics_topic_ilo`;

ALTER TABLE `course_req` DROP FOREIGN KEY `syllabus_course_req`;

ALTER TABLE `reference` DROP FOREIGN KEY `syllabus_reference`;

ALTER TABLE `policies` DROP FOREIGN KEY `syllabus_policies`;

ALTER TABLE `tq` DROP FOREIGN KEY `syllabus_tq`;

ALTER TABLE `tq` DROP FOREIGN KEY `major_exams_tq`;

ALTER TABLE `answer_choices` DROP FOREIGN KEY `TestQuestions_answer_choices`;

ALTER TABLE `tqstatus` DROP FOREIGN KEY `tq_tqstatus`;

ALTER TABLE `submission_sched` DROP FOREIGN KEY `major_exams_submission_sched`;

ALTER TABLE `syllabusstatus` DROP FOREIGN KEY `syllabus_syllabusstatus`;

ALTER TABLE `author` DROP FOREIGN KEY `syllabus_author`;

ALTER TABLE `author` DROP FOREIGN KEY `sched_subj_author`;

ALTER TABLE `conversation` DROP FOREIGN KEY `user_access_conversation`;

ALTER TABLE `messages` DROP FOREIGN KEY `conversation_messages`;

# ---------------------------------------------------------------------- #
# Drop table "answer_choices"                                            #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `answer_choices` MODIFY `ac_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `answer_choices` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `answer_choices`;

# ---------------------------------------------------------------------- #
# Drop table "TestQuestions"                                             #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `TestQuestions` MODIFY `q_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `TestQuestions` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `TestQuestions`;

# ---------------------------------------------------------------------- #
# Drop table "test_number"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `test_number` MODIFY `test_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `test_number` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `test_number`;

# ---------------------------------------------------------------------- #
# Drop table "author"                                                    #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `author` MODIFY `author_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `author` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `author`;

# ---------------------------------------------------------------------- #
# Drop table "syllabusstatus"                                            #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `syllabusstatus` MODIFY `sstatus_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `syllabusstatus` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `syllabusstatus`;

# ---------------------------------------------------------------------- #
# Drop table "tqstatus"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tqstatus` MODIFY `status_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tqstatus` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `tqstatus`;

# ---------------------------------------------------------------------- #
# Drop table "tq"                                                        #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `tq` MODIFY `tq_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `tq` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `tq`;

# ---------------------------------------------------------------------- #
# Drop table "policies"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `policies` MODIFY `policy_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `policies` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `policies`;

# ---------------------------------------------------------------------- #
# Drop table "reference"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `reference` MODIFY `ref_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `reference` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `reference`;

# ---------------------------------------------------------------------- #
# Drop table "course_req"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `course_req` MODIFY `cr_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `course_req` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `course_req`;

# ---------------------------------------------------------------------- #
# Drop table "topic_ilo"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `topic_ilo` MODIFY `topic_ilo_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `topic_ilo` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `topic_ilo`;

# ---------------------------------------------------------------------- #
# Drop table "syllabus_pgo"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `syllabus_pgo` MODIFY `spgo_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `syllabus_pgo` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `syllabus_pgo`;

# ---------------------------------------------------------------------- #
# Drop table "subtopic"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `subtopic` MODIFY `subtopic_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `subtopic` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `subtopic`;

# ---------------------------------------------------------------------- #
# Drop table "course_learning_outcomes"                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `course_learning_outcomes` MODIFY `CLO_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `course_learning_outcomes` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `course_learning_outcomes`;

# ---------------------------------------------------------------------- #
# Drop table "topics"                                                    #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `topics` MODIFY `topics_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `topics` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `topics`;

# ---------------------------------------------------------------------- #
# Drop table "syllabus"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `syllabus` MODIFY `syllabus_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `syllabus` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `syllabus`;

# ---------------------------------------------------------------------- #
# Drop table "sched_subj"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `sched_subj` MODIFY `ss_id` INTEGER(40) NOT NULL;

# Drop constraints #

ALTER TABLE `sched_subj` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `sched_subj`;

# ---------------------------------------------------------------------- #
# Drop table "unit_lab"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `unit_lab` MODIFY `ulab_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `unit_lab` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `unit_lab`;

# ---------------------------------------------------------------------- #
# Drop table "unit_lecture"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `unit_lecture` MODIFY `ulec_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `unit_lecture` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `unit_lecture`;

# ---------------------------------------------------------------------- #
# Drop table "subject"                                                   #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `subject` MODIFY `subj_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `subject` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `subject`;

# ---------------------------------------------------------------------- #
# Drop table "messages"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `messages` MODIFY `chat_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `messages` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `messages`;

# ---------------------------------------------------------------------- #
# Drop table "conversation"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `conversation` MODIFY `conver_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `conversation` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `conversation`;

# ---------------------------------------------------------------------- #
# Drop table "user_access"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `user_access` MODIFY `user_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `user_access` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `user_access`;

# ---------------------------------------------------------------------- #
# Drop table "employment"                                                #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `employment` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `employment`;

# ---------------------------------------------------------------------- #
# Drop table "cur_subject"                                               #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `cur_subject` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `cur_subject`;

# ---------------------------------------------------------------------- #
# Drop table "submission_sched"                                          #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `submission_sched` MODIFY `sub_sched_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `submission_sched` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `submission_sched`;

# ---------------------------------------------------------------------- #
# Drop table "question_type"                                             #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `question_type` MODIFY `question_type_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `question_type` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `question_type`;

# ---------------------------------------------------------------------- #
# Drop table "super_user"                                                #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `super_user` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `super_user`;

# ---------------------------------------------------------------------- #
# Drop table "school_year"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `school_year` MODIFY `sy_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `school_year` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `school_year`;

# ---------------------------------------------------------------------- #
# Drop table "semester"                                                  #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `semester` MODIFY `sem_id` INTEGER(40) NOT NULL;

# Drop constraints #

ALTER TABLE `semester` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `semester`;

# ---------------------------------------------------------------------- #
# Drop table "department"                                                #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `department` MODIFY `department_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `department` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `department`;

# ---------------------------------------------------------------------- #
# Drop table "employees"                                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `employees` MODIFY `employee_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `employees` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `employees`;

# ---------------------------------------------------------------------- #
# Drop table "year"                                                      #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `year` MODIFY `y_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `year` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `year`;

# ---------------------------------------------------------------------- #
# Drop table "effectivity"                                               #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `effectivity` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `effectivity`;

# ---------------------------------------------------------------------- #
# Drop table "exam_schedule"                                             #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `exam_schedule` MODIFY `exam_schedule_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `exam_schedule` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `exam_schedule`;

# ---------------------------------------------------------------------- #
# Drop table "cognitive_level"                                           #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `cognitive_level` MODIFY `cognitive_level_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `cognitive_level` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `cognitive_level`;

# ---------------------------------------------------------------------- #
# Drop table "major_exams"                                               #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `major_exams` MODIFY `exam_id` INTEGER(40) NOT NULL;

# Drop constraints #

ALTER TABLE `major_exams` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `major_exams`;

# ---------------------------------------------------------------------- #
# Drop table "program_graduate_outcomes"                                 #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `program_graduate_outcomes` MODIFY `pgo_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `program_graduate_outcomes` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `program_graduate_outcomes`;

# ---------------------------------------------------------------------- #
# Drop table "subject_info"                                              #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `subject_info` MODIFY `subject_info_id` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `subject_info` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `subject_info`;

# ---------------------------------------------------------------------- #
# Drop table "ILO"                                                       #
# ---------------------------------------------------------------------- #

# Remove autoinc for PK drop #

ALTER TABLE `ILO` MODIFY `ILO_ID` INTEGER NOT NULL;

# Drop constraints #

ALTER TABLE `ILO` DROP PRIMARY KEY;

# Drop table #

DROP TABLE `ILO`;
