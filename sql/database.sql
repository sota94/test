create table human (
    human_id INT AUTO_INCREMENT,
    human_name varchar(50) not null,
    human_pass varchar(50) not null,
    human_email varchar(50) not null,
    human_address varchar(50) not null,
    `position_id` int NOT NULL, #役職のid
    primary key(human_id)
);
#従業員のアカウント

CREATE TABLE attendance ( 
  employee_id INT  AUTO_INCREMENT PRIMARY KEY ,
  human_id INT ,
  human_name varchar(50),
  hiniti date,
  check_in time,
  check_out time,
  work_predict time, #退勤予定
  rest_work int, #休憩時間
  kakunin char(1), #1まだ 2終わり
  sum_time int #出勤時間合計
); 
#kakuninが1だと退勤されてない、2だと退勤済み
#勤怠しているか登録される

CREATE TABLE `positions` (
  `position_id` int AUTO_INCREMENT PRIMARY KEY,
  `position_name` varchar(50) NOT NULL,
  `hourly_wage` int NOT NULL,
  administrator int #1=管理者 2=その他
);
#役職による情報

INSERT INTO `positions` (`position_id`, `position_name`, `hourly_wage`,administrator) VALUES
(1, '店長', 1500,1),
(2, 'アルバイト', 1072,2);

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
#個人の給与計算

insert into attendance(human_id,human_name,hiniti,check_in,check_out,work_predict,rest_work,kakunin,sum_time)
value(1,"山西颯太","2023-02-16","12:00:00","13:00:00","13:00:00",0,2,60);
insert into attendance(human_id,human_name,hiniti,check_in,check_out,work_predict,rest_work,kakunin,sum_time)
value(1,"山西颯太","2023-03-16","12:00:00","13:00:00","13:00:00",0,2,60);
insert into attendance(human_id,human_name,hiniti,check_in,check_out,work_predict,rest_work,kakunin,sum_time)
value(1,"山西颯太","2023-03-16","13:00:00","15:00:00","15:00:00",60,2,60);