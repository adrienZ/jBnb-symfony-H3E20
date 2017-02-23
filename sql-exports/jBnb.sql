-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 24 Février 2017 à 00:00
-- Version du serveur :  5.6.28
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jBnb`
--

-- --------------------------------------------------------

--
-- Structure de la table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `symbole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `currency`
--

INSERT INTO `currency` (`id`, `symbole`, `name`) VALUES
(1, '€', 'euro'),
(2, '$', 'dollar');

-- --------------------------------------------------------

--
-- Structure de la table `filelist`
--

CREATE TABLE `filelist` (
  `id` int(11) NOT NULL,
  `file_type_id` int(11) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `file_type`
--

CREATE TABLE `file_type` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `devise_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `paypal_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_host` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'femme'),
(2, 'homme'),
(3, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `ldk`
--

CREATE TABLE `ldk` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `ldk`
--

INSERT INTO `ldk` (`id`, `name`) VALUES
(1, '1DK'),
(2, '2DK'),
(3, '3DK'),
(4, '4DK');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `l_dk_id` int(11) DEFAULT NULL,
  `host_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `surface` int(11) NOT NULL,
  `equipements` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rooms_type`
--

CREATE TABLE `rooms_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `rooms_type`
--

INSERT INTO `rooms_type` (`id`, `name`) VALUES
(1, 'Logement entier'),
(2, 'Chambre privée'),
(3, 'Chambre partagée');

-- --------------------------------------------------------

--
-- Structure de la table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `ip_adress` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `filelist`
--
ALTER TABLE `filelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_26E06F7B9E2A35A8` (`file_type_id`);

--
-- Index pour la table `file_type`
--
ALTER TABLE `file_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  ADD KEY `IDX_957A6479708A0E0` (`gender_id`),
  ADD KEY `IDX_957A6479F4445056` (`devise_id`);

--
-- Index pour la table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ldk`
--
ALTER TABLE `ldk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CA11A963537FE60` (`l_dk_id`),
  ADD KEY `IDX_7CA11A961FB8D185` (`host_id`),
  ADD KEY `IDX_7CA11A96C54C8C93` (`type_id`),
  ADD KEY `IDX_7CA11A9638248176` (`currency_id`);

--
-- Index pour la table `rooms_type`
--
ALTER TABLE `rooms_type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `filelist`
--
ALTER TABLE `filelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `file_type`
--
ALTER TABLE `file_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `ldk`
--
ALTER TABLE `ldk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `rooms_type`
--
ALTER TABLE `rooms_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `filelist`
--
ALTER TABLE `filelist`
  ADD CONSTRAINT `FK_26E06F7B9E2A35A8` FOREIGN KEY (`file_type_id`) REFERENCES `file_type` (`id`);

--
-- Contraintes pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD CONSTRAINT `FK_957A6479708A0E0` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `FK_957A6479F4445056` FOREIGN KEY (`devise_id`) REFERENCES `currency` (`id`);

--
-- Contraintes pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `FK_7CA11A961FB8D185` FOREIGN KEY (`host_id`) REFERENCES `fos_user` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_7CA11A963537FE60` FOREIGN KEY (`l_dk_id`) REFERENCES `ldk` (`id`),
  ADD CONSTRAINT `FK_7CA11A9638248176` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_7CA11A96C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `rooms_type` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
