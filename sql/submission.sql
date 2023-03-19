#従業員のアカウント
create table human (
    human_id INT AUTO_INCREMENT,
    human_name varchar(50) not null,
    human_pass varchar(50) not null,
    human_email varchar(50) not null,
    human_address varchar(50) not null,
    `position_id` int NOT NULL, #役職のid
    primary key(human_id)
);

#勤怠情報が登録される
CREATE TABLE attendance ( 
  employee_id INT  AUTO_INCREMENT PRIMARY KEY ,
  human_id INT ,
  human_name varchar(50),
  hiniti date,
  check_in time,
  check_out time,
  work_predict time, 
  rest_work int, 
  kakunin char(1),
  sum_time int 
); 

#役職ごとの情報
CREATE TABLE `positions` (
  `position_id` int AUTO_INCREMENT PRIMARY KEY,
  `position_name` varchar(50) NOT NULL,
  `hourly_wage` int NOT NULL,
  administrator int 
);
INSERT INTO `positions` (`position_name`, `hourly_wage`,administrator) VALUE
('オーナー', 2000,1);

#個人の給与
CREATE TABLE wage (
    human_id int AUTO_INCREMENT PRIMARY KEY, 
    days int NOT NULL,  #勤務日数
    wage_time int NOT NULL, #合計勤務時間
    hourly_wage int NOT NULL, #時給
    total_wage int NOT NULL,  #総支給額
    total_subtraction int NOT NULL, #差引額
    total int NOT NULL,  #差引総支給額
    hiniti date
);
