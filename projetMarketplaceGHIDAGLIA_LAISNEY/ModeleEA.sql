-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2020 at 10:28 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ebayECE`
--

-- --------------------------------------------------------

--
-- Table structure for table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE `acheteur` (
  `idAcheteur` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `paiement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`idAcheteur`, `login`, `password`, `nom`, `prenom`, `paiement`) VALUES
(2, 'laisney.manon@edu.ece.fr', 'artlover', 'Laisney', 'Manon', 'masterCard'),
(4, 'alienor@edu.ece.fr', 'alienor', 'Bierer', 'Alienor', 'visa'),
(7, 'gabrielle@edu.ece.fr', 'gablevy', 'Levy', 'Gabrielle', 'payPal'),
(15, 'marie.couffon@edu.ece.fr', 'couffon', 'Couffon', 'Marie', 'payPal');

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `login`, `password`, `nom`, `prenom`) VALUES
(1, 'anneclaire.laisney@edu.ece.fr', 'administrateur', 'Laisney', 'Anne-Claire');

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE `enchere` (
  `id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `prixVente` float NOT NULL,
  `repetition` int(11) NOT NULL,
  `vendeurId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infoPaiement`
--

DROP TABLE IF EXISTS `infoPaiement`;
CREATE TABLE `infoPaiement` (
  `id` int(11) NOT NULL,
  `typeCarte` varchar(255) NOT NULL,
  `dateExpiration` date NOT NULL,
  `codeSecurite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `idItem` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `photos` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `vendeurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`idItem`, `nom`, `categorie`, `statut`, `photos`, `description`, `prix`, `vendeurId`) VALUES
(78, 'Bague pompadour diamants, vers 1910, en or rose 18 ct (750/000), platine et diamants taille ancienne', 'vip', 'enchere', '../Vendeur/uploads/pompadour.png', 'Cette superbe bague Pompadour est un classique du début du XXème siècle. Elle est sertie en son centre d\'un beau diamant taillé à l\'ancienne pesant environ 1,40ct, entouré de huit autres plus petits pour un poids total de 3,40ct!', 9450, 14),
(80, 'Bague', 'ferraille', 'vendu', '../Vendeur/uploads/bague.png', 'Ancienne jolie bague en or blanc 18 carat et pierres.Poinçonnée tête d\'aigle..\r\nJoli modèle trilogie ancien.', 23456, 14),
(81, 'Montre antique bronze', 'musee', 'meilleureOffre', '../Vendeur/uploads/montre.png', 'Montre de poche mécanique en or rose laminé 14KTS ExcelsioR manufacturée par New York Standard Watch équipée d\'un calibre à remontage manuel. Le mécanisme et la boite sont signé, le fond est à visser, cadran émaillé blanc chiffres arabes', 12, 14),
(100, 'Magnifique Tableau avec Cadre Baroque Antique repro pour éponges 56 x 46 cm', 'musee', 'achatImmediat', '../Vendeur/uploads/baroque.png', 'Magnifique tableau baroque antique Repro.\r\nCette collection exclusive de reproductions d\'œuvres d\'art peintres contemporains est imprimée à l\'aide de la technique offset en 4,5 ou 6 couleurs sur du papier patiné de qualité de 200 g. ', 100, 14),
(12334, 'Malle en bois a restaurer', 'ferraille', 'achatImmediat', '../Vendeur/uploads/malle.png', 'Malle ancienne en bois peint en noir Dimensions: 51x51x80cm', 2, 21),
(12335, 'la Joconde', 'musee', 'enchere', '../Vendeur/uploads/joconde.png', 'Le visage de Mona Lisa est vraiment très réaliste et son regard est très humain, à savoir est-ce que cette femme eu été bien réelle ou est-ce par pure imagination ou idéal féminin que Léonard de Vinci a réalisé cette oeuvre d\'art !', 463783000, 18);

-- --------------------------------------------------------

--
-- Table structure for table `meilleureOffre`
--

DROP TABLE IF EXISTS `meilleureOffre`;
CREATE TABLE `meilleureOffre` (
  `id` int(11) NOT NULL,
  `prixAchat` float NOT NULL DEFAULT '1',
  `prixVente` float NOT NULL,
  `vendeurId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meilleureOffre`
--

INSERT INTO `meilleureOffre` (`id`, `prixAchat`, `prixVente`, `vendeurId`, `itemId`) VALUES
(1, 64738300, 64738300, 14, 78),
(2, 23456, 23456, 14, 80),
(3, 12, 12, 14, 81);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `acheteurId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `acheteurId`, `itemId`) VALUES
(96, 2, 12334);

-- --------------------------------------------------------

--
-- Table structure for table `sitePaiement`
--

DROP TABLE IF EXISTS `sitePaiement`;
CREATE TABLE `sitePaiement` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresseLigne1` varchar(255) NOT NULL,
  `adresseLigne2` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `acheteurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE `vendeur` (
  `idVendeur` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photoPreferee` varchar(255) NOT NULL DEFAULT '../Vendeur/uploads/account.png',
  `backgroundPhoto` varchar(255) NOT NULL DEFAULT '../Vendeur/uploads/mexique.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`idVendeur`, `login`, `password`, `nom`, `prenom`, `photoPreferee`, `backgroundPhoto`) VALUES
(14, 'estelle@edu.ece.fr', 'estelle', 'Sarther', 'Estelle', '../Vendeur/uploads/account.png', '../Vendeur/uploads/mexique.png'),
(18, 'agathe@edu.ece.fr', 'agathe', 'Bierer', 'Agathe', '../Vendeur/uploads/account.png', '../Vendeur/uploads/mexique.png'),
(21, 'marco@edu.ece.fr', 'marco', 'Levy', 'Marc', '../Vendeur/uploads/account.png', '../Vendeur/uploads/mexique.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acheteur`
--
ALTER TABLE `acheteur`
  ADD PRIMARY KEY (`idAcheteur`),
  ADD UNIQUE KEY `login` (`login`) USING BTREE,
  ADD KEY `password` (`password`) USING BTREE;

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `password` (`password`) USING BTREE;

--
-- Indexes for table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendeurId` (`vendeurId`) USING BTREE,
  ADD UNIQUE KEY `itemId` (`itemId`) USING BTREE;

--
-- Indexes for table `infoPaiement`
--
ALTER TABLE `infoPaiement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `vendeurId` (`vendeurId`) USING BTREE;

--
-- Indexes for table `meilleureOffre`
--
ALTER TABLE `meilleureOffre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendeurId` (`vendeurId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acheteurId` (`acheteurId`) USING BTREE,
  ADD KEY `itemId` (`itemId`) USING BTREE;

--
-- Indexes for table `sitePaiement`
--
ALTER TABLE `sitePaiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acheteurId` (`acheteurId`);

--
-- Indexes for table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`idVendeur`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `password` (`password`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acheteur`
--
ALTER TABLE `acheteur`
  MODIFY `idAcheteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `infoPaiement`
--
ALTER TABLE `infoPaiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12336;

--
-- AUTO_INCREMENT for table `meilleureOffre`
--
ALTER TABLE `meilleureOffre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `vendeur`
--
ALTER TABLE `vendeur`
  MODIFY `idVendeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`vendeurId`) REFERENCES `vendeur` (`idVendeur`),
  ADD CONSTRAINT `enchere_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`idItem`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`vendeurId`) REFERENCES `vendeur` (`idVendeur`);

--
-- Constraints for table `meilleureOffre`
--
ALTER TABLE `meilleureOffre`
  ADD CONSTRAINT `meilleureoffre_ibfk_1` FOREIGN KEY (`vendeurId`) REFERENCES `vendeur` (`idVendeur`),
  ADD CONSTRAINT `meilleureoffre_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`idItem`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`idItem`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`acheteurId`) REFERENCES `acheteur` (`idAcheteur`);

--
-- Constraints for table `sitePaiement`
--
ALTER TABLE `sitePaiement`
  ADD CONSTRAINT `sitepaiement_ibfk_1` FOREIGN KEY (`acheteurId`) REFERENCES `acheteur` (`idAcheteur`),
  ADD CONSTRAINT `sitepaiement_ibfk_2` FOREIGN KEY (`id`) REFERENCES `infoPaiement` (`id`);

