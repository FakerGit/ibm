TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `add_users_role` AFTER INSERT ON `users` FOR EACH ROW insert into users_role values(new.uid,1)'
sql_modes=1073741824
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='gbk_chinese_ci'
