--Administrator table--
DROP TABLE IF EXISTS 'administrator';
CREATE TABLE 'administrator' (
  'username' varchar(7) NOT NULL,
  'password' varchar(10) NOT NULL,
  'email' varchar(30) NOT NULL,
  'fullName' varchar(30) NOT NULL,
  'staffID' varchar(7) NOT NULL,
  'centreName' varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--Patient table--
DROP TABLE IF EXISTS 'administrator';
CREATE TABLE 'administrator' (
  'username' varchar(7) NOT NULL,
  'password' varchar(10) NOT NULL,
  'email' varchar(30) NOT NULL,
  'fullName' varchar(30) NOT NULL,
  'ICPassport' varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;