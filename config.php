<?php
header("content-type:text/html;charset=utf-8");
//开始回话控制
session_start();

//设置时区为中国时区
date_default_timezone_set("PRC");

//设置数据库相关常量
const DBHOST = 'localhost';
const DBUSER = 'root';
const DBPWD = '123456';
const DBNAME = 'bbs81';
const DBCHARSET = 'utf8';


@$conn = mysql_connect(DBHOST,DBUSER,DBPWD);
mysql_select_db(DBNAME);
mysql_set_charset(DBCHARSET);