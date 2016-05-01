drop table if exists freeCitizenNotesInfos;
create table freeCitizenNotesInfos (
id integer not null primary key auto_increment,
idInfo integer not null,
idCommentateur integer  not null,
note integer not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

