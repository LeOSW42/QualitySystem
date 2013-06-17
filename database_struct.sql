CREATE TABLE `qs_problem_report` (
  `number` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
