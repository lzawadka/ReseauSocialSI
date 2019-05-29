# php-si



//D'abord créé la DATABASE si_php


CREATE TABLE `commentaires` (
  `id` int(3) NOT NULL,
  `id_post` int(3) NOT NULL,
  `auteur_commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu_commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `likePost` (
  `id` int(3) NOT NULL,
  `id_postLike` int(11) NOT NULL,
  `user_postLike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_postLike` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `titre_post` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contenu_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_post` datetime NOT NULL,
  `user_post` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `like_post` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `utilisateur` (
  `name_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

