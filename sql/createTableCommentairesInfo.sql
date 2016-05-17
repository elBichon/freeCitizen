/*creation de la table d'insertion des infos
identiofiant numerique
titre
date de post
texte a inserer
*/

drop table if exists freeCitizenCommentairesInfos;
create table freeCitizenCommentairesInfos (
id integer not null primary key auto_increment,
idArticle integer not null,
date datetime not null,
idAuteur integer  not null,
commentaire text not null
) engine=innodb character set utf8 collate utf8_unicode_ci;


