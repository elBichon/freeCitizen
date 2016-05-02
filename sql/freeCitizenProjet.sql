drop table if exists freeCitizenProjet;
create table freeCitizenProjet (
id integer not null primary key auto_increment,
date datetime not null,
dateDebut datetime not null,
ville varchar(50) not null,
theme varchar(50) not null,
idAuteur integer  not null,
equipe varchar(50) not null,
descriptif text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

