PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "migrations" ("id" integer not null primary key autoincrement, "migration" varchar not null, "batch" integer not null);
INSERT INTO migrations VALUES(1,'2019_04_22_042156_create_users_table',1);
CREATE TABLE IF NOT EXISTS "users" ("id" integer not null primary key autoincrement, "email" varchar not null, "password" varchar not null, "remember_token" varchar null, "created_at" datetime null, "updated_at" datetime null, "student_id" integer null, foreign key("student_id") references "students"("student_id"));
INSERT INTO users VALUES(3,'jaejunmi@usc.edu','$2y$10$6Xfqf03Z2.QhdNjHFTF.veB/TJFWVGNSg4PKBPhl5DliqhbZRQ3vS',NULL,NULL,NULL,1);
INSERT INTO users VALUES(4,'zard304@gmail.com','$2y$10$OjJjPbSniWHxEeo6h6apl.PZg26wWOtmh1xXqxpgAq4TYnkwQBNk2',NULL,NULL,NULL,2);
INSERT INTO users VALUES(5,'jaejunmin@usc.edu','$2y$10$xOD20gVpZ.dt3B6U96Xd4e8Qi.M5ghSxxUUrsd6NnrcOCrtiQSOe6',NULL,NULL,NULL,3);
INSERT INTO users VALUES(6,'jjjj@usc.edu','$2y$10$IDdaWVtSNcVDaGsAL9T32e0dY2bQurYqrt6WpDTtFtkkxVRsuxmC.',NULL,NULL,NULL,4);
INSERT INTO users VALUES(7,'zard0304@gmail.com','$2y$10$PrV8pivTZoi5r4OHDPgjV.8RQ99Uj0Y00y28gU6XlsjUhl/tz9v7C',NULL,NULL,NULL,5);
CREATE TABLE majors(
 major_id INTEGER PRIMARY KEY,
 name TEXT NOT NULL
);
INSERT INTO majors VALUES(1,'Accounting');
INSERT INTO majors VALUES(2,'Economic');
INSERT INTO majors VALUES(3,'Computer Science');
INSERT INTO majors VALUES(4,'Chemistry');
INSERT INTO majors VALUES(5,'Business');
INSERT INTO majors VALUES(6,'Biology');
INSERT INTO majors VALUES(7,'English');
INSERT INTO majors VALUES(8,'Film');
INSERT INTO majors VALUES(9,'Sociology');
INSERT INTO majors VALUES(10,'Engineer');
INSERT INTO majors VALUES(11,'Others');
INSERT INTO majors VALUES(12,'Other BA');
INSERT INTO majors VALUES(13,'Other BS');
CREATE TABLE colleges(
 college_id INTEGER PRIMARY KEY,
 name TEXT NOT NULL
);
INSERT INTO colleges VALUES(1,'USC');
INSERT INTO colleges VALUES(2,'UCLA');
INSERT INTO colleges VALUES(3,'UCSD');
INSERT INTO colleges VALUES(4,'UC Berkely');
INSERT INTO colleges VALUES(5,'UC SANTA BARBARA');
INSERT INTO colleges VALUES(6,'UC Irvine');
INSERT INTO colleges VALUES(7,'UC DAVIS');
INSERT INTO colleges VALUES(8,'MIT');
INSERT INTO colleges VALUES(9,'Cal Tech');
INSERT INTO colleges VALUES(10,'Others');
CREATE TABLE college_major(
 college_id integer,
 major_id integer,
 PRIMARY KEY (college_id, major_id),
 FOREIGN KEY (college_id) REFERENCES colleges (college_id)
 ON DELETE CASCADE ON UPDATE NO ACTION,
 FOREIGN KEY (major_id) REFERENCES majors (major_id)
 ON DELETE CASCADE ON UPDATE NO ACTION
);
INSERT INTO college_major VALUES(1,1);
INSERT INTO college_major VALUES(1,2);
INSERT INTO college_major VALUES(1,3);
INSERT INTO college_major VALUES(1,4);
INSERT INTO college_major VALUES(1,5);
INSERT INTO college_major VALUES(1,6);
INSERT INTO college_major VALUES(1,7);
INSERT INTO college_major VALUES(1,8);
INSERT INTO college_major VALUES(1,9);
INSERT INTO college_major VALUES(1,10);
INSERT INTO college_major VALUES(1,11);
INSERT INTO college_major VALUES(1,12);
INSERT INTO college_major VALUES(1,13);
INSERT INTO college_major VALUES(2,1);
INSERT INTO college_major VALUES(2,2);
INSERT INTO college_major VALUES(2,3);
INSERT INTO college_major VALUES(2,4);
INSERT INTO college_major VALUES(2,5);
INSERT INTO college_major VALUES(2,6);
INSERT INTO college_major VALUES(2,7);
INSERT INTO college_major VALUES(2,8);
INSERT INTO college_major VALUES(2,9);
INSERT INTO college_major VALUES(2,10);
INSERT INTO college_major VALUES(2,11);
INSERT INTO college_major VALUES(2,12);
INSERT INTO college_major VALUES(2,13);
INSERT INTO college_major VALUES(3,1);
INSERT INTO college_major VALUES(3,2);
INSERT INTO college_major VALUES(3,3);
INSERT INTO college_major VALUES(3,4);
INSERT INTO college_major VALUES(3,5);
INSERT INTO college_major VALUES(3,6);
INSERT INTO college_major VALUES(3,7);
INSERT INTO college_major VALUES(3,8);
INSERT INTO college_major VALUES(3,9);
INSERT INTO college_major VALUES(3,10);
INSERT INTO college_major VALUES(3,11);
INSERT INTO college_major VALUES(3,12);
INSERT INTO college_major VALUES(3,13);
INSERT INTO college_major VALUES(4,1);
INSERT INTO college_major VALUES(4,2);
INSERT INTO college_major VALUES(4,3);
INSERT INTO college_major VALUES(4,4);
INSERT INTO college_major VALUES(4,5);
INSERT INTO college_major VALUES(4,6);
INSERT INTO college_major VALUES(4,7);
INSERT INTO college_major VALUES(4,8);
INSERT INTO college_major VALUES(4,9);
INSERT INTO college_major VALUES(4,10);
INSERT INTO college_major VALUES(4,11);
INSERT INTO college_major VALUES(4,12);
INSERT INTO college_major VALUES(4,13);
INSERT INTO college_major VALUES(5,1);
INSERT INTO college_major VALUES(5,2);
INSERT INTO college_major VALUES(5,3);
INSERT INTO college_major VALUES(5,4);
INSERT INTO college_major VALUES(5,5);
INSERT INTO college_major VALUES(5,6);
INSERT INTO college_major VALUES(5,7);
INSERT INTO college_major VALUES(5,8);
INSERT INTO college_major VALUES(5,9);
INSERT INTO college_major VALUES(5,10);
INSERT INTO college_major VALUES(5,11);
INSERT INTO college_major VALUES(5,12);
INSERT INTO college_major VALUES(5,13);
INSERT INTO college_major VALUES(6,1);
INSERT INTO college_major VALUES(6,2);
INSERT INTO college_major VALUES(6,3);
INSERT INTO college_major VALUES(6,4);
INSERT INTO college_major VALUES(6,5);
INSERT INTO college_major VALUES(6,6);
INSERT INTO college_major VALUES(6,7);
INSERT INTO college_major VALUES(6,8);
INSERT INTO college_major VALUES(6,9);
INSERT INTO college_major VALUES(6,10);
INSERT INTO college_major VALUES(6,11);
INSERT INTO college_major VALUES(6,12);
INSERT INTO college_major VALUES(6,13);
INSERT INTO college_major VALUES(7,1);
INSERT INTO college_major VALUES(7,2);
INSERT INTO college_major VALUES(7,3);
INSERT INTO college_major VALUES(7,4);
INSERT INTO college_major VALUES(7,5);
INSERT INTO college_major VALUES(7,6);
INSERT INTO college_major VALUES(7,7);
INSERT INTO college_major VALUES(7,8);
INSERT INTO college_major VALUES(7,9);
INSERT INTO college_major VALUES(7,10);
INSERT INTO college_major VALUES(7,11);
INSERT INTO college_major VALUES(7,12);
INSERT INTO college_major VALUES(7,13);
INSERT INTO college_major VALUES(8,1);
INSERT INTO college_major VALUES(8,2);
INSERT INTO college_major VALUES(8,3);
INSERT INTO college_major VALUES(8,4);
INSERT INTO college_major VALUES(8,5);
INSERT INTO college_major VALUES(8,6);
INSERT INTO college_major VALUES(8,7);
INSERT INTO college_major VALUES(8,8);
INSERT INTO college_major VALUES(8,9);
INSERT INTO college_major VALUES(8,10);
INSERT INTO college_major VALUES(8,11);
INSERT INTO college_major VALUES(8,12);
INSERT INTO college_major VALUES(8,13);
INSERT INTO college_major VALUES(9,1);
INSERT INTO college_major VALUES(9,2);
INSERT INTO college_major VALUES(9,3);
INSERT INTO college_major VALUES(9,4);
INSERT INTO college_major VALUES(9,5);
INSERT INTO college_major VALUES(9,6);
INSERT INTO college_major VALUES(9,7);
INSERT INTO college_major VALUES(9,8);
INSERT INTO college_major VALUES(9,9);
INSERT INTO college_major VALUES(9,10);
INSERT INTO college_major VALUES(9,11);
INSERT INTO college_major VALUES(9,12);
INSERT INTO college_major VALUES(9,13);
INSERT INTO college_major VALUES(10,1);
INSERT INTO college_major VALUES(10,2);
INSERT INTO college_major VALUES(10,3);
INSERT INTO college_major VALUES(10,4);
INSERT INTO college_major VALUES(10,5);
INSERT INTO college_major VALUES(10,6);
INSERT INTO college_major VALUES(10,7);
INSERT INTO college_major VALUES(10,8);
INSERT INTO college_major VALUES(10,9);
INSERT INTO college_major VALUES(10,10);
INSERT INTO college_major VALUES(10,11);
INSERT INTO college_major VALUES(10,12);
INSERT INTO college_major VALUES(10,13);
CREATE TABLE students (
 student_id INTEGER PRIMARY KEY,
 name TEXT,
 grad_year INTEGER,
 intro TEXT,
 college_id integer,
 major_id integer,
 FOREIGN KEY (college_id) REFERENCES colleges(college_id)
 FOREIGN KEY (major_id) REFERENCES majors(major_id)
);
INSERT INTO students VALUES(1,'jjaejun min',2004,'hello kkkkkkkk',7,2);
INSERT INTO students VALUES(2,'jjjjjjj',2019,'312312312312312',5,5);
INSERT INTO students VALUES(3,'jaejun Min',2018,'hello world',6,8);
INSERT INTO students VALUES(4,'jaejun Min',2018,'hello my name is jae',4,11);
INSERT INTO students VALUES(5,'zard',2018,'helooo  helooo helooo helooo helooo',3,12);
CREATE TABLE comments(
comment_id INTEGER PRIMARY KEY,
title TEXT NOT NULL,
content TEXT NOT NULL,
timestamp DATE DEFAULT (datetime('now','localtime')),
student_id integer,
FOREIGN KEY (student_id) REFERENCES students(student_id)
);
INSERT INTO comments VALUES(1,'Second test','Second testSecond testSecond testSecond test','2019-05-01 23:42:14',3);
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('migrations',1);
INSERT INTO sqlite_sequence VALUES('users',7);
CREATE UNIQUE INDEX "users_email_unique" on "users" ("email");
COMMIT;
