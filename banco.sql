CREATE DATABASE IF NOT EXISTS Quiz;

CREATE TABLE answer (
  `questionsid` text NOT NULL,
  `ansid` text NOT NULL
);

CREATE TABLE history (
  `email` varchar(50) NOT NULL,
  `quizid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `hitscore` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL
);

CREATE TABLE options (
  `questionsid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
);

CREATE TABLE questions (
  `quizid` text NOT NULL,
  `questionsid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
);

CREATE TABLE quiz (
  `quizid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `hitscore` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE rank (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE user (
  `name` varchar(50) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
);

INSERT INTO user (`name`, `institution`, `email`, `password`)
VALUES
  (
    'Teste Teste',
    'UFMS',
    'teste@teste',
    '698dc19d489c4e4db73e28a713eab07b'
  );

ALTER TABLE user
ADD PRIMARY KEY (`email`);
