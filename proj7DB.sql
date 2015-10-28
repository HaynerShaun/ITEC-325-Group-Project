/*
* @author Tyler Tevendale
* @version 2015-OCT-22
* ITEC 325, Fall 2015
*/

drop table Survey;
drop table Advisor;
drop table Topic;

create table Advisor
(
	AID			VARCHAR2(4),
	NAME		VARCHAR2(50) NOT NULL,
	ISACTIVE	VARCHAR2(5)	 NOT NULL,
	CONSTRAINT PK_AID PRIMARY KEY (AID),
	CONSTRAINT CK_ISACTIVE CHECK(isActive = 'TRUE' or isActive = 'FALSE')
);

create table Topic
(
	TID			VARCHAR2(4),
	TOPICNAME	VARCHAR2(100) NOT NULL,
	CONSTRAINT PK_TID PRIMARY KEY(TID)
);

CREATE TABLE Survey
(
	SID					VARCHAR2(6),
	AID					VARCHAR2(4),
	TID					VARCHAR2(4),
	SURVEYDATE			TIMESTAMP,
	PRESENTATION		VARCHAR2(10) NOT NULL,
	HELPFULRATING		NUMBER(1) NOT NULL,
	UTILIZERATING		NUMBER(1) NOT NULL,
	KNOWLEDGERATING		NUMBER(1) NOT NULL,
	COMMENTS			VARCHAR2(256),
	CONSTRAINT PK_SURVEY PRIMARY KEY(SID),
	CONSTRAINT FK_ADVISOR FOREIGN KEY(AID) REFERENCES Advisor(AID),
	CONSTRAINT FK_TOPIC FOREIGN KEY(TID) REFERENCES Topic(TID),
	CONSTRAINT CK_PRESENTATION CHECK(PRESENTATION = 'INDIVIDUAL' OR PRESENTATION = 'GROUP'),
	CONSTRAINT CK_HELPFULRATING CHECK(HELPFULRATING >= 1 AND HELPFULRATING <= 5),
	CONSTRAINT CK_UTILIZERATING CHECK(UTILIZERATING >= 1 AND UTILIZERATING <= 5),
	CONSTRAINT CK_KNOWLEDGERATING CHECK(KNOWLEDGERATING >= 1 AND KNOWLEDGERATING <= 5)
);

insert into advisor (AID, Name, isActive)
values (1001, 'Teresa D.', 'TRUE');
insert into advisor (AID, Name, isActive)
values (1002, 'Leanne H.', 'FALSE');
insert into advisor (AID, Name, isActive)
values (1003, 'John L.', 'TRUE');
insert into advisor (AID, Name, isActive)
values (1004, 'Ellen T.', 'FALSE');

insert into Topic (TID, TopicName)
values (9001, 'Assessments / Focus');
insert into Topic (TID, TopicName)
values (9002, 'Resume / Cover Letter');
insert into Topic (TID, TopicName)
values (9003, 'Graduate School');
insert into Topic (TID, TopicName)
values (9004, 'Internships');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating, 
				UtilizeRating, KnowledgeRating, Comments)
values (100001, 1001, 9001, TO_DATE('2015-09-01', 'YYYY-MM-DD'), 'INDIVIDUAL',
		4, 2, 4, 'She did okay');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating, 
				UtilizeRating, KnowledgeRating, Comments)
values (100002, 1001, 9003, TO_DATE('2015-09-01', 'YYYY-MM-DD'), 'GROUP',
        5, 4, 4, 'Awesome and cool yeah');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating, 
				UtilizeRating, KnowledgeRating, Comments)
values (100003, 1001, 9001, TO_DATE('2015-10-14', 'YYYY-MM-DD'), 'INDIVIDUAL',
        4, 4, 4, 'I got my work done thanks to her');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating, 
				UtilizeRating, KnowledgeRating, Comments)
values (100004, 1002, 9001, TO_DATE('2015-03-01', 'YYYY-MM-DD'), 'INDIVIDUAL',
        1, 2, 1, 'This person should be fired');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating, 
				UtilizeRating, KnowledgeRating, Comments)
values (100005, 1002, 9002, TO_DATE('2015-03-19', 'YYYY-MM-DD'), 'GROUP',
        1, 1, 1, 'We didnt get anything done');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating,
                UtilizeRating, KnowledgeRating, Comments)
values (100006, 1002, 9004, TO_DATE('2015-04-09', 'YYYY-MM-DD'), 'INDIVIDUAL',
        1, 1, 1, 'Why did I come to this person');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating,
                UtilizeRating, KnowledgeRating, Comments)
values (100007, 1004, 9002, TO_DATE('2015-04-19', 'YYYY-MM-DD'), 'INDIVIDUAL',
        3, 3, 2, 'We got the work done');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating,
                UtilizeRating, KnowledgeRating, Comments)
values (100008, 1004, 9001, TO_DATE('2015-03-19', 'YYYY-MM-DD'), 'GROUP',
        2, 3, 4, 'He wasnt great but we got it done');

insert into Survey (SID, AID, TID, SurveyDate, Presentation, HelpfulRating,
                UtilizeRating, KnowledgeRating, Comments)
values (100009, 1004, 9004, TO_DATE('2015-03-19', 'YYYY-MM-DD'), 'INDIVIDUAL',
		2, 2, 3, 'Would have been nicer to have someone else');
