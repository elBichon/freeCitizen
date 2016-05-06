/*script de creation des villes*/

drop table if exists freeCitizenVilles;
create table freeCitizenVilles (
id integer not null primary key auto_increment,
idMembre varchar(50) not null,
ville varchar(50) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;
