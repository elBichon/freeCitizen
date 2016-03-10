create database if not exists freeCitizen character set utf8 collate utf8_unicode_ci;
use freeCitizen;

grant all privileges on freeCitizen.* to 'freeCitizen_user'@'localhost' identified by 'secret';