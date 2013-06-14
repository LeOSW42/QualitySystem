DROP TABLE qs_problem_report;

CREATE TABLE `qs_problem_report` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customer` text NOT NULL,
  `type_of_pb` text NOT NULL,
  `description` text NOT NULL,
  `auditee` text NOT NULL,
  `auditor` text NOT NULL,
  `analysis` text NOT NULL,
  `action_by` text NOT NULL,
  `completion_date` date NOT NULL,
  `action_taken` text NOT NULL,
  `closed_by` text NOT NULL,
  `closed_date` date NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO qs_problem_report VALUES("1","2013-06-14","Eurolec","Big problem","This is the description of my big problem","Auditee","Auditor","The analysis of the problem is quite long","OpenSourceWay","2013-06-15","This is the long long long action taken area","Big boss","2013-06-18");
INSERT INTO qs_problem_report VALUES("2","2013-06-14","test 22","test2","2nd test","","","","","0000-00-00","","","0000-00-00");
INSERT INTO qs_problem_report VALUES("3","0000-00-00","Customer","Type","Test","","boby","","","0000-00-00","","","0000-00-00");



