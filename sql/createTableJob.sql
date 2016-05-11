/*script de creation des job
statut proposition ou recherche de jobs
*/
drop table if exists freeCitizenJob;
create table freeCitizenJob (
id integer not null primary key auto_increment,
titre varchar(50) not null,
date datetime not null,
dateTot datetime not null,
dateTard datetime not null,
ville varchar(50) not null,
type varchar(50) not null,
statut varchar(50) not null,
idAuteur integer  not null,
votes integer  not null,
descriptif text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

