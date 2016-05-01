drop table if exists freeCitizenInfos;
create table freeCitizenInfos (
id integer not null primary key auto_increment,
date datetime not null,
ville varchar(50) not null,
theme varchar(50) not null,
idAuteur integer  not null,
texte text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

