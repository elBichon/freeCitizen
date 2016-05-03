drop table if exists freeCitizenProduit;
create table freeCitizenProduit (
id integer not null primary key auto_increment,
titre varchar(50) not null,
date datetime not null,
dateDisponnbilite datetime not null,
ville varchar(50) not null,
type varchar(50) not null,
statut varchar(50) not null,
idAuteur integer  not null,
descriptif text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

