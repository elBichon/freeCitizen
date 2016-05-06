/*script de creation des membres
stockage hashe des mdp
*/
drop table if exists freeCitizenMembres;
create table freeCitizenMembres (
id integer not null primary key auto_increment,
login varchar(50) not null,
email varchar(50) not null,
pass varchar(50) not null,
cookies varchar(50),
cgu varchar(50) not null,
confirmation integer,
connect integer
) engine=innodb character set utf8 collate utf8_unicode_ci;
