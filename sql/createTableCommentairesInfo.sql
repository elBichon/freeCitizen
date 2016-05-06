/*creation de la table d'insertion des infos
identiofiant numerique
titre
date de post
texte a inserer
*/

drop table if exists freeCitizenCommentairesInfos;
create table freeCitizenCommentairesInfos (
id integer not null primary key auto_increment,
titre varchar(50) not null,
idInfo integer not null,
datePost datetime not null,
idCommentateur integer  not null,
texte text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;


