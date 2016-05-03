drop table if exists freeCitizenEvent;
create table freeCitizenEvent (
id integer not null primary key auto_increment,
date datetime not null,
dateDebut datetime not null,
ville varchar(50) not null,
titre varchar(50) not null,
theme varchar(50) not null,
idAuteur integer  not null,
participant integer  not null,,
descriptif text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

