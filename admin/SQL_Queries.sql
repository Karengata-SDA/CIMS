SELECT * FROM `property` WHERE `value` != "" AND `status` != "vacant" AND `status` != "not paid" AND `status` != "reserved";

SELECT * FROM `property` WHERE `status` != "vacant" AND `make` != "Apartment" OR `status` != "not paid" AND `make` != "Apartment";


UPDATE `property` SET `status` = 'not paid' WHERE `property`.`id` = 132;

UPDATE `property` SET `status` = 'vacant' WHERE `property`.`id` = 1182;


UPDATE `property` SET `status` = 'not paid' WHERE `status` != "vacant" AND `make` != "Apartment" OR `status` != "not paid" AND `make` != "Apartment";

SELECT * FROM `userdetails` WHERE `department` != "1" AND `department` != "2" AND `department` != "3" AND `department` != ""
UPDATE `userdetails` SET `department` = '3' WHERE `userdetails`.`department` = "AYS";




SELECT id, user_id, user_nm, device_id, department, code, type, method, description, quantity, amount, cost, vat, total_cost, paid, account_no, item_name, added_on  FROM `transactions` ORDER BY id DESC



/*if($type == "giving")
                    {                                 //id,     name  , qty,  price, cost,  payme,     payer
                        $items = explode("|", $cart); //28,  Sugarcane,  1,     2,     2 ,  Mpesa,  Tirhaqa Mogaka, n/a|29,Eggs,30,1, 30 ,Mpesa,Tirhaqa Mogaka,n/a|
                    }
                    else
                    {
                        $items = explode("|", $cart); //God's Tithe,2000|Combi. Offering,2000|Thanks Giving,500|Camp Offering,400|
                    }*/

UPDATE  userdetails SET  phone = REPLACE(phone, '-', '');
UPDATE `userdetails` SET `gender` = REPLACE(gender, 'MALE', "Male");
UPDATE `userdetails` SET `gender` = REPLACE(gender, 'FEMale', "Female");




SELECT id, member_no, name, email, phone, phone_alt, comments_remarks FROM `userdetails` WHERE `phone` != "" AND `comments_remarks` = "Present";
SELECT id, member_no, name, email, phone, phone_alt, comments_remarks FROM `userdetails` WHERE `phone` != "" AND `comments_remarks` = "Missing";
SELECT id, member_no, name, email, phone, phone_alt, comments_remarks FROM `userdetails` WHERE `phone` LIKE "%c/o%" OR `phone_alt`LIKE "%c/o%";

SELECT id, member_no, name, email, phone, phone_alt, comments_remarks FROM `userdetails` WHERE `phone_alt` LIKE "%c/o%";


SELECT phone, COUNT(phone) FROM userdetails GROUP BY phone HAVING COUNT(phone) > 1 
SELECT userdetails.id, userdetails.member_no, userdetails.member_no, userdetails.name, userdetails.phone, userdetails.comments_remarks FROM userdetails INNER JOIN (SELECT phone FROM userdetails WHERE `phone` != "" AND `phone` != "Present" AND `comments_remarks` = "Present" GROUP BY phone HAVING COUNT(phone) > 1) dup ON userdetails.phone = dup.phone ORDER BY `userdetails`.`phone` ASC
SELECT id, member_no, name, phone, phone_alt FROM `userdetails` WHERE `member_no` = "814";
SELECT id, member_no, name, firstname, middlename, other_name, lastname, phone, phone_alt, email_alt FROM `userdetails` WHERE `member_no` = "654"
SELECT id, member_no, name, firstname, middlename, other_name, lastname, phone, church_officer, board_member FROM `userdetails` WHERE `firstname` = "Erastus"

SELECT id, member_no, name, firstname, middlename, other_name, lastname, phone, church_officer, board_member FROM `userdetails` WHERE board_member = "yes"
SELECT id, member_no, name, title, firstname, middlename, other_name, lastname, phone, `phone_alt` church_officer, board_member FROM `userdetails` WHERE other_name != "";

SELECT default_character_set_name FROM information_schema.SCHEMATA S WHERE schema_name = "karengat_cims";
SELECT CCSA.character_set_name FROM information_schema.`TABLES` T,information_schema.`COLLATION_CHARACTER_SET_APPLICABILITY` CCSA WHERE CCSA.collation_name = T.table_collation AND T.table_schema = "karengat_cims" AND T.table_name = "userdetails";
ALTER TABLE userdetails CONVERT TO CHARACTER SET utf8 COLLATE utf8_bin;
UPDATE  userdetails SET  phone = REPLACE(phone, '’', "'");
UPDATE userdetails SET `firstname`= CONCAT( UPPER( SUBSTRING( `firstname`, 1, 1 ) ) , LOWER( SUBSTRING( `firstname` FROM 2 ) ) );
-- https://hceint.wordpress.com/2010/11/11/converting-to-title-case-in-mysql-capitalizing-mysql-a-php-solution/
-- https://www.experts-exchange.com/questions/29012011/Title-Case-a-String-in-Using-MySql-PHP.html
-- $json = preg_replace("/\\\x[0-9a-f]{2}/", "", $mystring);

SELECT id, trx_number, member_no, name, firstname, middlename, other_name, lastname, phone, church_officer, board_member FROM `userdetails` WHERE member_no = "158"
-- require_once('../../../api/config.php');
-- sudo systemctl status apache2

-- SELECT DISTINCT user_id FROM transcripts INNER JOIN `users` ON transcripts.user_id = users.id WHERE transcripts.current_topic = '$row[name]' AND transcripts.status = 'start' AND transcripts.quiz_type = 'preQuiz Transcript' AND userdetails.country = '$inchini'";

SELECT id, member_no, name, email, phone, phone_alt, comments_remarks, `status` FROM `userdetails` WHERE `phone` != "" AND `comments_remarks` = "Present";
SELECT id, member_no, name, title, firstname, middlename, other_name, lastname, phone, username, password, `phone_alt` church_officer, board_member, comments_remarks FROM `userdetails` WHERE firstname = "Tommy" OR  firstname = "George";

-- https://www.databasejournal.com/features/mysql/article.php/3911786/Eliminating-Duplicate-Rows-from-MySQL-Result-Sets.htm
/*
 * SELECT emp2.dept_id, 
       emp1.name, 
       emp1.gender, 
       emp2.max_salary
FROM (
  SELECT dept_id,       
         Max(salary) as max_salary 
  FROM   employees 
  GROUP BY dept_id
) as emp2 JOIN employees as emp1 ON emp1.salary = emp2.max_salary
GROUP BY dept_id;
 * 
 */

-- https://www.xaprb.com/blog/2006/10/09/how-to-find-duplicate-rows-with-sql/
-- 
-- https://stackoverflow.com/questions/34738259/php-mysqli-select-two-distinct-from-data-base
/*
$query = "select DISTINCT Standard , DISTINCT AttendanceID  from attendance_master where  Attendence_taken_by !='$admin'  and  SchoolID='$schoolid' and AttendanceDate >= '$tfrom_date' and AttendanceDate <= '$tto_date' ";

$result = mysqli_query($mysqli,$query)or die(mysqli_error($mysqli));
while($row=mysqli_fetch_array($result))
{
    echo "<table><tr>".$row["Standard"]."</tr><tr>".$row["AttendanceID"]."</tr></table>";
}
 * 
 * 
 */

SELECT MIN(firstname), MIN(member_no), MIN(phone) FROM userdetails GROUP BY firstname
select firstname, phone, count(*) from userdetails group by phone, firstname having count(distinct phone > 1) or count(distinct name > 1);
select b, c, count(*) from a_b_c group by b, c having count(distinct b > 1) or count(distinct c > 1);
SELECT id, member_no, name, title, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, church_officer, board_member, role, `level`, username, password FROM `userdetails` WHERE `member_no` = "961"

SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, `comments_remarks`, church_officer, board_member, role, `level`, username, password FROM `userdetails` WHERE lastname != ""
SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, church_officer, board_member, role, `level` username, password FROM `userdetails` WHERE `other_name` = "" AND lastname = ""
SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, `comments_remarks`, church_officer, board_member, role, `level`, username, password FROM `userdetails` WHERE `other_name` = "" AND lastname = "";
UPDATE  userdetails SET  lastname = REPLACE(middlename, '’', "'") WHERE `other_name` = "" AND lastname = "";

SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, `comments_remarks`, church_officer, board_member, role, `level`, username, password FROM `userdetails` WHERE `other_name` != "" AND lastname = "";
UPDATE  userdetails SET  lastname = REPLACE(middlename, '', "") WHERE `other_name` != "" AND lastname = ""

SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, `comments_remarks`, church_officer, board_member, role, `level`, idno, dob, entry_mode, comments_remarks FROM `userdetails` WHERE idno != ""
UPDATE  userdetails SET  dob = REPLACE(idno, '', "") WHERE idno != "";
UPDATE `userdetails` SET `idno` = '' WHERE `userdetails`.`idno` != "";
UPDATE `userdetails` SET `middlename` = '' WHERE middlename = lastname

SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, `comments_remarks`, church_officer, board_member, role, `level`, idno, dob, entry_mode FROM `userdetails` WHERE `other_name` = lastname
SELECT id, member_no, name, firstname, middlename, lastname, other_name, email, phone, address, username, password, department, role, level, comments_remarks FROM `userdetails` WHERE `firstname` = "Bob"
SELECT id, member_no, name, firstname, middlename, lastname, other_name, email, email_alt, phone, phone_alt, address, residence, username, password, department, role, level, comments_remarks FROM `userdetails` WHERE `member_no` = "797"

-- https://www.webveteran.com/blog/web-coding/mysql/mysql-quickly-find-duplicate-records-based-on-any-field/
UPDATE  userdetails SET  phone = REPLACE(phone, phone, SUBSTR(phone, -9, 9));
select member_no, firstname, phone, count(*) from userdetails WHERE `phone` != "" group by phone, firstname having count(distinct phone > 1) or count(distinct name > 1) ORDER BY `count(*)`  DESC;
SELECT * FROM userdetails WHERE phone IN (SELECT phone FROM userdetails GROUP BY phone HAVING count(phone) > 1) ORDER BY phone
SELECT * FROM userdetails WHERE phone IN (SELECT phone FROM userdetails GROUP BY phone HAVING count(phone) > 1)  AND `phone` != "" ORDER BY `userdetails`.`id`  ASC;
SELECT id, member_no, name, title, name, firstname, middlename, other_name, lastname, phone, `phone_alt`, email, church_officer, board_member, role, `level`, username, password, comments_remarks FROM userdetails WHERE phone IN (SELECT phone FROM userdetails GROUP BY phone HAVING count(phone) > 1)  AND `phone` != "" ORDER BY `userdetails`.`phone` ASC

--Duplicate Phone No.
SELECT id, member_no, name, firstname, middlename, other_name, lastname, phone, phone_alt, comments_remarks FROM `userdetails` WHERE member_no = "911";   


SELECT id, member_no, family_id, name, firstname, middlename, lastname, other_name, email, phone, phone_alt, address, residence, age, marital_status, membership, member_by, comments_remarks FROM `userdetails` WHERE `member_no` = "813" OR `lastname` = "Onyango"
SELECT * FROM `transactions` ORDER BY id DESC;

--Search Member
--SELECT id, member_no, firstname, lastname, gender, phone, department, department1, comments_remarks FROM `userdetails` LIMIT 1500
--SELECT id, member_no, firstname, lastname, gender, phone, department, department1, department2, department3, comments_remarks FROM `userdetails` WHERE LOWER(`firstname`) LIKE LOWER("%xx%") OR LOWER(`lastname`) LIKE LOWER("%xx%") OR LOWER(`phone`) LIKE LOWER("%xx%") ORDER BY `firstname` LIMIT 1500
SELECT id, member_no, family_id, spouse, name, username, password, other_name, firstname, middlename, lastname, other_name, email, phone, address, residence, comments_remarks, department, age, marital_status, membership, member_by FROM `userdetails` WHERE `member_no` = "xx" OR family_id = "xx" OR LOWER(`name`) LIKE LOWER("%xx%") OR LOWER(`firstname`) LIKE LOWER("%xx%") OR LOWER(`lastname`) LIKE LOWER("%xx%") OR LOWER(`phone`) LIKE LOWER("%xx%") OR LOWER(`username`) LIKE LOWER("%xx%")

SELECT id, member_no, family_id, spouse, firstname, lastname, role, level, other_name, email, phone, phone_alt, comments_remarks, department, department1, `board_member`, church_officer, marital_status, membership, member_by FROM `userdetails` WHERE `member_no` = "72" OR LOWER(`firstname`) LIKE LOWER("%xx%") OR LOWER(`lastname`) LIKE LOWER("%xx%") OR LOWER(`phone`) LIKE LOWER("%721884476%") ORDER BY `userdetails`.`board_member`  DESC

SELECT * FROM `userdetails` WHERE LOCATE('Tommy',firstname) > 0


--List Transactions
SELECT id, user_id, user_nm, device_id, code, method, amount, item_name, added_on, status FROM `transactions` ORDER BY `added_on`  DESC;

--Search Receipt
SELECT user_nm, code, item_name, description, method, amount, due_on, payopt1, payamt1, paydtm1, payref1, added_on FROM `transactions` WHERE `user_id` = "959" AND `added_on` LIKE "%2020-05%" ORDER BY `id` DESC




--TRANSACTIONS:
SELECT * FROM `transactions` WHERE `added_on` LIKE "%2020-03-14%" AND `type` = "original" ORDER BY `id` DESC

--MESSAGES
SELECT * FROM `messages` WHERE `reference` = '828AWL' ORDER BY id DESC;
SELECT id, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` WHERE `from_id` = "288822"  ORDER BY `id` DESC

SELECT id, user_nm, department, code, item_name, amount, added_on, status FROM `transactions` ORDER BY `transactions`.`id`  DESC
SELECT * FROM `transactions` WHERE id > 4807 ORDER BY `transactions`.`id`  DESC

SELECT `id`, `name` FROM `userdetails` WHERE `id` IN (SELECT DISTINCT `device_id` FROM `transactions` GROUP BY `device_id`) GROUP BY `id` ORDER BY id ASC; -- 6 treasurers on 2020.12.05

SELECT `device_id` FROM `transactions` GROUP BY `device_id` ORDER BY device_id ASC; 
-- 6 treasurers on 2020.12.05
-- 6 treasurers on 2020.01.11



SELECT id, name, member_no, phone, username, password, role, level, comments_remarks FROM `userdetails` WHERE id = "530";
SELECT * FROM `transactions` WHERE `device_id` = "1482" GROUP BY `code` ORDER BY `transactions`.`id`  DESC;
SELECT * FROM `transactions` WHERE `code` IN (SELECT DISTINCT `code` FROM `transactions` GROUP BY `code`) AND `added_on` LIKE "%2020-01-04%" ORDER BY `transactions`.`id` DESC;
SELECT id, user_nm, item_name, description, amount, method, reference_no, added_on FROM `transactions` WHERE `code` IN (SELECT DISTINCT `code` FROM `transactions` GROUP BY `code`) ORDER BY `transactions`.`id` ASC;
--556 total items
--497 total



/*
447  - TOMMY MOGAKA OGWOKA   -    49 total envelopes
449  - SAMSON MANWA ONDIEKI  -     2 total envelopes
555  - GEORGE MANWA MOKAYA   -    65 total envelopes 
642  - BRENDA OPANGA         -   117 total envelopes
647  - PAULINE OPANGA        -   132 total envelopes
1583 - Winnie Michira        -  + 11 total envelopes
                                 -------------------
     2020.01.04                  376 total envelopes
                                 -------------------

447  - TOMMY MOGAKA OGWOKA   -    35 total envelopes
449  - SAMSON MANWA ONDIEKI  -    47 total envelopes
530  - ADAM  CHEPKWONY       -    79 total envelopes
555  - GEORGE MANWA MOKAYA   -    52 total envelopes  
642  - BRENDA OPANGA         -    84 total envelopes
1583 - Winnie Michira        -  + 37 total envelopes
                                 -------------------
     2020.12.11                  334 total envelopes
                                 -------------------
*/

--1482 - Cliff Mogoi





--SELECT * FROM `transactions` WHERE `device_id` = "1482" GROUP BY `code` ORDER BY `transactions`.`id`  DESC
--SELECT id, user_id, user_nm, device_id, code, amount, item_nm FROM `transactions` WHERE `device_id` = "145" GROUP BY `code` ORDER BY `transactions`.`id`  DESC
--SELECT * FROM `karengat_cims`.`transactions` WHERE `transactions`.`id` = 554 AND `transactions`.`user_id` = 0 AND `transactions`.`user_nm` = 'Sabbath School' AND `transactions`.`device_id` = '145' AND `transactions`.`department` = '' AND `transactions`.`code` = "756PZE"
--UPDATE `transactions` SET `device_id` = '647' WHERE `transactions`.`device_id` = "145";


--SELECT id, item_name, description FROM `transactions` WHERE `item_name` IN (SELECT DISTINCT `item_name` FROM `transactions` GROUP BY `item_name`) ORDER BY `transactions`.`id` DESC;
--SELECT id, user_id, user_nm, item_name, description, amount, added_on FROM `transactions` WHERE `item_name` IN (SELECT DISTINCT `item_name` FROM `transactions` WHERE item_name !="" GROUP BY `item_name`) ORDER BY `transactions`.`item_name` ASC
/*
197, Hezekiah Chepkwony, Church Bldg. - AWM Grp. 4, NULL, 10000.00, 2019-12-28 13:25:15
198, Janet Chepkwony,    Church Bldg. - AWM Grp. 4, NULL, 10000.00, 2019-12-28 13:25:15
1014, Margaret Ongachi,  Church Bldg. - AYS,        NULL, 10000.00, 2019-12-28 13:25:15
*/

SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Lesson Quarterly";
SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Expenses" AND `added_on` LIKE "%2020-03-7%" AND `type` = "original";
SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Offering" AND `added_on` LIKE "%2020-03-7%" AND `type` = "original"

SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Expenses" AND `added_on` LIKE "%2020-02-08%" AND `type` = "original";
SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Offering" AND `added_on` LIKE "%2020-02-08%" AND `type` = "original";

SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Expenses" AND `added_on` LIKE "%2020-02-02%"-- AND `type` = "original";
SELECT item_name, `user_nm`, `department`, amount FROM `transactions` WHERE `item_name` = "Camp Offering" AND `added_on` LIKE "%2020-02-02%"-- AND `type` = "original";

/*
Lesson Quarterly    -   David Onyancha   800.00
Lesson Quarterly    -   Yucabeth Maraga 1000.00
Lesson Quarterly    -   Anthony Meyoki   200.00
*/

/*
Camp Expenses	Gordon Ogweno 	  AMO	    1000
Camp Expenses	Juliet Kunusia 	  	    1000
Camp Expenses	Lucy Nyagitari 	  	    1000
Camp Expenses	Carolyne Miyogo   	    1000
Camp Expenses	Dottie Torori 	  	    3000
Camp Expenses	Hellen Opanga 	  	    50
Camp Expenses	Damaris Michoma   	    1000
Camp Expenses	Hezron Osano 	  AMO	    1000
Camp Expenses	Nikitah Nyambare  AYS	    10
Camp Expenses	Julie Ochenge 	  	    50
Camp Expenses	Sila Kipkoech 	  AMO	    500
Camp Expenses	Irvine Lumumba 	  	    50
Camp Expenses	Caroline Mobisa   AWM	    500
Camp Expenses	Melvine Oloo 	  	    100
Camp Expenses	Deborah Ogeto 	  	    200
Camp Expenses	Harrison Owino 	  AMO	    1000
Camp Expenses	Juliet Owino 	  	    1000
Camp Expenses	Dorothy Omwoyo 	  	    500
Camp Expenses	David Oloo 	  	    1000
Camp Expenses	Joy Chloy 	  	    50

*/




SELECT DISTINCT `item_name` FROM `transactions` GROUP BY `item_name` ORDER BY `item_name` ASC;
SELECT DISTINCT `item_name` FROM `transactions` GROUP BY `item_name` ;
SELECT DISTINCT `item_name` FROM `transactions` WHERE `added_on` LIKE "%2020-03-14%" AND `type` = "original" GROUP BY `item_name` ORDER BY `item_name` ASC;
SELECT DISTINCT `item_name` FROM `transactions` WHERE `added_on` LIKE "%2020-02-29%" AND `type` = "original" GROUP BY `item_name` ORDER BY `item_name` ASC;
SELECT DISTINCT `item_name` FROM `transactions` WHERE `added_on` LIKE "%2020-02-08%" AND `type` = "original" GROUP BY `item_name` ORDER BY `item_name` ASC;


SELECT `id`, `item_name`, `description` FROM `transactions` WHERE `added_on` LIKE "%2020-02-29%" AND `item_name` = "Camp Expenses" ORDER BY `item_name` ASC
--13 Total Giving Items - 2020.01.04 
--14 Total Giving Items - 2020.01.11
--14 Total Giving Items - 2020.03.15



/*
2020.01.04 
----------
AWM
Camp Expenses
Camp Offering
Church Building
Combi. Offering
Evangelism
God's Tithe
Lesson Quarterly
Local Budget
New Year Offering
Sabbath School
Thanks Giving
Welfare


2020.01.11
----------
Camp Expenses
Camp Offering
Childrens Choir
Church Building
Combi. Offering
Cradle Roll
Evangelism
God's Tithe
Good Samaritan
Lessons
Local Budget
Sabbath School
Thanks Giving
Welfare


2020.03.15
----------
Adventist Radio
AWM
Camp Expenses
Camp Offering
Church Building
Club Registration
Combi. Offering
Evangelism
God's Tithe
Local Budget
Msamaria Mwema
Pathfinder's Club
Sabbath School
Thanks Giving


2020
*/

SELECT SUM(amount) AS giving FROM transactions WHERE `added_on` LIKE "%2020-03-14%" AND `type` = "original";
--Total Ksh.   996,439.00 - 2020.01.04
--Total Ksh. 1,279,628.00 - 2020.01.11
--Total Ksh.   401,621.00 - 2020.03.14


SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Church Building" AND `added_on` LIKE "%2020-03-14%" AND `type` = "original"
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "God's Tithe";   ----Total Ksh. 534,969.00    |    893,090.00
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "AWM";           ----Total Ksh.  10,130.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Camp Expenses"  ----Total Ksh.   4,300.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Camp Offering"  ----Total Ksh.     100.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Evangelism"     ----Total Ksh.   7,100.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Lesson Quarterly" --Total Ksh.  18,480.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Local Budget"   ----Total Ksh. 134,492.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "New Year Offering"--Total Ksh.   2,200.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Sabbath School" ----Total Ksh.  10,218.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Thanks Giving"  ----Total Ksh. 146,705.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Welfare"        ----Total Ksh.     800.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Church Building"----Total Ksh.  56,368.00    |    
SELECT SUM(amount) AS giving FROM transactions WHERE item_name = "Combi. Offering"----Total Ksh.  70,577.00    |    




SELECT item_name, count(*) FROM transactions group by item_name having count(distinct item_name > 1); -- 13 Total Giving Items that people gave for on 2020.12.05
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-02-08%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-02-02%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-01-27%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-01-25%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-01-18%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);
SELECT item_name, count(*) FROM transactions WHERE `added_on` LIKE "%2020-01-11%" AND `type` = "original" GROUP BY item_name having count(distinct item_name > 1);




/*

2020.01.04
----------
AWM                  5  ----Total Ksh.  10,130.00 
Camp Expenses        4  ----Total Ksh.   4,300.00  
Camp Offering        2  ----Total Ksh.     100.00 
Church Building     42  ----Total Ksh.  56,368.00
Combi. Offering     79  ----Total Ksh.  70,577.00
Evangelism          15  ----Total Ksh.   7,100.00
God's Tithe         98  ----Total Ksh. 534,969.00
Lesson Quarterly     6  ----Total Ksh.  18,480.00
Local Budget       160  ----Total Ksh. 134,492.00
New Year Offering    2  ----Total Ksh.   2,200.00
Sabbath School      15  ----Total Ksh.  10,218.00
Thanks Giving      126  ----Total Ksh. 146,705.00
Welfare              2  ----Total Ksh.     800.00
                  +
----------------------           ----------------
Totals     (Items) 556     (Money)Ksh. 996,439.00
----------------------           ----------------

2020.01.11
----------
Local Budget       142
God's Tithe        108
Thanks Giving       82
Combi. Offering     81
Church Building     39
Sabbath School      17
Evangelism          11
Lessons              7
Camp Offering        3
Camp Expenses        1
Childrens Choir      1
Cradle Roll          1
Good Samaritan       1
Lesson               2
Welfare              1



2020.02.03
----------
Adventurer's Club
AWM
AWM Group 1
Camp Expenses
Camp Offering
Church Building
Church Prayer
Combi. Offering
Evangelism
God's Tithe
Local Budget
Mission
Outreach
Pathfinder's Club
Sabbath School
Station Dev. Fund
Thanks Giving
Windows



2020.03.15
----------
Adventist Radio      1  ----Total Ksh.     500.00
AWM                  2  ----Total Ksh.   1,300.00
Camp Expenses       20  ----Total Ksh.  14,010.00
Camp Offering       10  ----Total Ksh.   3,480.00
Church Building     21  ----Total Ksh.  23,580.00
Club Registration    1  ----Total Ksh.   2,000.00
Combi. Offering     47  ----Total Ksh.  43,010.00
Evangelism          13  ----Total Ksh.   2,915.00
God's Tithe         74  ----Total Ksh. 237,446.00
Local Budget        68  ----Total Ksh.  45,910.00
Msamaria Mwema       1  ----Total Ksh.   1,000.00
Pathfinder's Club    1  ----Total Ksh.    4000.00
Sabbath School      11  ----Total Ksh.   7,545.00
Thanks Giving       30  ----Total Ksh.  14,925.00
                  +
----------------------           ----------------
Totals     (Items) 300     (Money)Ksh. 401,621.00
----------------------           ----------------

*/



--SELECT `user_nm` FROM `transactions` WHERE `added_on` LIKE "%2020-01-04%" GROUP BY `code` ORDER BY user_nm ASC; --376 total members gave on 2020.12.05 including several visitors and two unamed visitors and a Sabbath School. Besides these there was a lot of loose offerings.
--SELECT `user_id`, `user_nm` FROM `transactions` WHERE `added_on` LIKE "%2020-01-04%" GROUP BY `user_id` ORDER BY user_nm ASC --117 total members gave on 2020.12.05
SELECT user_nm, count(*) FROM transactions group by user_nm having count(distinct user_nm > 1); --317 total members gave on 2020.12.05
--SELECT `user_id`, user_nm, count(*) FROM transactions group by code having count(distinct user_nm > 1); ----376 total members gave on 2020.12.05

SELECT user_id, user_nm, `code`, description, count(*) FROM transactions group by user_id having count(distinct user_id > 1); -->314 = 116+198 i.e total members gave on 2020.12.05 (The ideal ... every giver must get an Member ID)

--select user_nm, count(*) from transactions group by user_nm having count(distinct user_nm > 1); --317 people gave
select user_id, user_nm, count(*) from transactions group by user_id having count(distinct user_id > 1); --314 = 116+198 people gave
/*
...
Williams Wahome   3
Wilson Ogonda     1
Winfridah Bosire  1
Winfridah Bwari   2
Winnie Ndubi      4
Wycliff Amenya    1
Yucabeth Maraga   1
Yvonne Omollo     2
Zawadi Maranga    1
Zipporah Mogaka   1
Zuberi Mitito     2
*/


SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `user_id` = "53";
SELECT SUM(amount) AS giving FROM transactions WHERE user_id = "53";
/*
item_name       user_id        user_nm        code   description     amount
God's Tithe        53       Winnie Ndubi    1436KRC     NULL        10500.00
Combi. Offering    53       Winnie Ndubi    1436KRC     NULL         2000.00
Local Budget       53       Winnie Ndubi    1436KRC     NULL         1000.00
Thanks Giving      53       Winnie Ndubi    1436KRC     NULL       + 1500.00
                                                                   ----------
                                                                    15000.00
                                                                   ----------
*/

--SELECT `method`, count(*) FROM `transactions` GROUP BY `method` having count(distinct `method` > 1);
--SELECT `method`, count(*) from transactions group by `user_id` having count(distinct `method` > 1);
--SELECT `method`, count(*) from transactions group by `code` having count(distinct `method` > 1);
--SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "card" GROUP BY `code`;      -- 23 card
--SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "cheque" GROUP BY `code`;    --  9 cheque
SELECT `id`, `name` FROM `settings` WHERE `name` IN (SELECT DISTINCT `method` FROM `transactions` GROUP BY `method`) GROUP BY `name` ORDER BY id ASC;
SELECT DISTINCT `method`  FROM `transactions` GROUP BY `method` ORDER BY `method` ASC;
SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "cheque" GROUP BY `user_id`;    --cheq  -   7  =         people gave by cheque
SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "cash" GROUP BY `user_id`;      --cash  - 246  = 167+79  people gave by cash
SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "card" GROUP BY `user_id`;      --card  -  30  =  18+12  people gave by card
SELECT `item_name`, `user_id`, `user_nm`, `code`, `description`, `amount` FROM `transactions` WHERE `method` = "Mpesa" GROUP BY `user_id`;     --Mpesa -  64  =  25+39  people gave by Mpesa
                                                                                                                                               
/*
card   23
cash  293
cheque  7
Mpesa  51
      347
*/


--`payopt1`, `payamt1`, `payopt2`, `payamt2`, `payopt3`, `payamt3`


SELECT id, name, member_no, phone, username, password, role, level, department, comments_remarks FROM `userdetails` WHERE comments_remarks = "Missing" AND phone != "" OR comments_remarks = "Present" AND phone != ""
ALTER TABLE `userdetails` auto_increment = 1587;

SELECT id, name, member_no, phone, username, password, role, level, department, comments_remarks FROM `userdetails` WHERE `username` LIKE "%karengata%" OR member_no = "1021" OR member_no = "13"  
ORDER BY `userdetails`.`username` ASC

SELECT id, user_id, user_nm, device_id, department, code, type, method, item_name, amount, `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, description, quantity, cost, vat, total_cost, paid, account_no,  added_on FROM `transactions` ORDER BY id DESC


SELECT id, user_id, device_id, department, code, type, item_name, amount FROM `transactions` WHERE `user_id` = '158' AND added_on LIKE '%2020-02%';
