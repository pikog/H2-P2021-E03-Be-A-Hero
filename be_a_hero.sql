-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 13 avr. 2018 à 04:07
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `be_a_hero`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `heading` float NOT NULL,
  `type` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `description` text NOT NULL,
  `level` int(11) NOT NULL,
  `reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `heading` float NOT NULL,
  `type` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `places`
--

INSERT INTO `places` (`id`, `name`, `address`, `heading`, `type`, `lat`, `lon`) VALUES
(1, 'Barclays France', '183 Avenue Daumesnil, 75012 Paris', 25.93, 4, 48.840403, 2.392896),
(2, 'Banque populaire Rives de Paris', '110 Boulevard Saint-Germain, 75006 Paris', 106.38, 4, 48.851979, 2.341624),
(3, 'Banque de France', '39 Rue Croix des Petits Champs, 75001 Paris', 10.09, 4, 48.864898, 2.340278),
(4, 'Banque Palatine', '74 Rue Saint-Lazare, 75009 Paris', 342.08, 4, 48.87624, 2.33021),
(5, 'Banque Barclays : Agence de Paris Marais', '96 Rue de Turenne, 75004 Paris', 355.22, 4, 48.862204, 2.364757),
(6, 'LCL banque et assurance', '134 Rue de Belleville, 75020 Paris', 145.42, 4, 48.87499, 2.389111),
(7, 'Banque Palatine - Siège social', '42 Rue d\'Anjou, 75008 Paris', 121.21, 4, 48.872385, 2.322174),
(8, 'Banque de France', '3Bis Place de la Bastille, 75004 Paris', 347.88, 4, 48.853519, 2.368091),
(9, 'CIC', '85 Rue Damrémont, 75018 Paris', 309.01, 4, 48.893972, 2.336383),
(10, 'Banque populaire Rives de paris', '68 Avenue de Saint-Ouen, 75018 Paris', 88.43, 4, 48.891443, 2.327133),
(11, 'Caisse d’Épargne Paris Ordener', '162 Rue Ordener, 75018 Paris', 17.13, 4, 48.893808, 2.335899),
(12, 'Banque Barclays', '8 Rue de l\'Ouest, 75014 Paris', 173.05, 4, 48.837316, 2.322202),
(13, 'Banque Palatine', '79 Rue du Commerce, 75015 Paris', 122.94, 4, 48.844841, 2.294266),
(14, 'CIC', '77 Avenue des Gobelins, 75013 Paris', 13.15, 4, 48.832977, 2.354878),
(15, 'Crédit du Nord Paris', '12 Rue Jeanne d\'Arc, 75013 Paris', 99.73, 4, 48.829435, 2.369301),
(16, 'LCL', '67 Avenue de Saint-Mandé, 75012 Paris', 206.77, 4, 48.845, 2.404807),
(17, 'BRED Banque Populaire', '49 Avenue de Paris, 94300 Vincennes', 168.1, 4, 48.845344, 2.428862),
(18, 'Centre des Finances publiques', '130 Rue de la Jarry, 94300 Vincennes', 174.04, 4, 48.849733, 2.450207),
(19, 'Banque de France', '19 Rue de Montreuil, 94300 Vincennes', 271.79, 4, 48.847741, 2.434599),
(20, 'LCI', '5 Place du Général Leclerc, 94160 Saint-Mandé', 358.21, 4, 48.845563, 2.435113),
(21, 'HSBC Saint-Mandé', '30 Avenue du Général de Gaulle, 94160 Saint-Mandé', 272.2, 4, 48.84411, 2.41748),
(22, 'La banque postale', '137 Boulevard Soult, 75012 Paris', 281.83, 4, 48.846246, 2.410545),
(23, 'Banque de France', '21 rue de Montreuil, 94300 Vincennes', 273.32, 4, 48.84776, 2.434599),
(25, 'Gare de Lyon', 'Place Louis-Armand, 75571 Paris', 126.33, 1, 48.844367, 2.374377),
(26, 'Gare du Nord', '18 Rue de Dunkerque, 75010 Paris', 61.11, 1, 48.881005, 2.355314),
(27, 'Tour Eiffel', '5 Avenue Anatole France, 75007 Paris', 306.68, 1, 48.8556475, 2.298630399999979),
(28, 'Tour Montparnasse', '33 Avenue du Maine, 75015, Paris', 5.38, 1, 48.842129, 2.321969899999999),
(29, 'Tour Majunga', '12 Rue Delarivière Lefoullon, 92800 Puteaux', 339.57, 1, 48.888403, 2.243651399999976),
(30, '11 rue jean Moulin', '11 rue jean Moulin, 92800 Puteaux', 317.78, 1, 48.8875098, 2.24008589999994),
(31, 'Bastille', 'Place de la bastille, 75011 Paris', 307.2, 1, 48.853354, 2.369490600000063),
(32, 'Place de la République', 'Place de la République, 75003 Paris', 275.88, 1, 48.8673936, 2.3634144000000106),
(33, 'Institut national du sport', '11 Avenue du Tremblay, 75012 Paris', 242.36, 1, 48.8340447, 2.4545399999999518),
(34, 'Piscine Georges Rigal', '115 Boulevard de Charonne, 75011 Paris', 211.15, 1, 48.856438, 2.393391000000065),
(35, 'Piscine des Rentiers', '184 Rue du Château-des-Rentiers, 75013 Paris', 25.99, 1, 48.8304931, 2.3620700999999826),
(36, 'Pont de l’Alma', 'Pont de l’Alma, 75008 Paris', 247.05, 1, 48.8635573, 2.301700100000062),
(37, 'Le pont des arts', 'Le pont des arts, 75006 Paris', 188.88, 1, 48.85834240000001, 2.3375083999999333),
(38, 'Métro Croix de Chavaux', '5 avenue de la résistance, 93100, Montreuil', 359.71, 1, 48.8583523, 2.436438100000032),
(39, 'Gare Vincennes', '98 avenue de paris, 94300 Vincennes', 352.68, 1, 48.8457519, 2.427920399999948),
(40, 'Rue du progrès', '37 rue du progrès, 93100 Montreuil', 259.5, 1, 48.85163319999999, 2.418335299999967),
(41, 'Rue de Valmy', '36 rue de Valmy, 93100 Montreuil', 49.91, 1, 48.85086399999999, 2.4173640000000205),
(42, 'Rue de la prévoyance', '8 rue de la prévoyance, 75019 Paris', 15.46, 1, 48.8825638, 2.3921851999999717),
(43, 'Orange Bank', ' 67 Rue Robespierre, 93100 Montreuil', 124.95, 3, 48.8521426, 2.4241793999999572),
(44, 'Grand Rex', '1 Boulevard Poissonnière, 75002 Paris', 202.86, 3, 48.8705638, 2.3474873000000116),
(45, 'Gare de l’est', 'Rue du 8 mai 1945, Paris 75010', 64.2, 3, 48.8761354, 2.358263999999963),
(46, 'Bar près de l\'institut du monde arabe', '2 rue du fossé Saint-Bernard, 75005 Paris', 281.54, 3, 48.849187, 2.355557200000021),
(47, 'Stade de France', 'Stade de France, 93200 Saint-Denis', 303.95, 3, 48.92352330000001, 2.3629081999999926),
(48, 'Parc des Princes', '14 Rue Claude Farrère, 75016 Paris', 150.43, 3, 48.8423676, 2.2516931000000113),
(49, 'Centre commercial de Beaugrenelle', '5 rue Linois, 75015 Paris', 338.11, 3, 48.8481835, 2.2825551999999334),
(50, 'La Cigale', '120 Boulevard de Rochechouart, 75018 Paris', 336.8, 3, 48.8823738, 2.3401578000000427),
(51, 'Sacré Coeur', '35 Rue du Chevalier de la Barre, 75018 Paris', 20.31, 3, 48.8867061, 2.3430227999999715),
(52, 'Mk2 Bibliothèque', '128 Avenue de France, 75013 Paris', 351.61, 3, 48.8326912, 2.3752415000000155),
(53, 'Cinema Vincennes', '1 avenue de Paris , 94300 Vincennes', 9.28, 3, 48.84480139999999, 2.4343140999999378),
(54, 'Bibliothèque Sud', ' 3 Rue du Maréchal Maunoury, 94300 Vincennes', 161.15, 3, 48.84386629999999, 2.430898100000036),
(55, 'Supermarché ', '269 Avenue Daumesnil, 75012 Paris', 169.73, 3, 48.8361585, 2.4055448999999953),
(56, 'Bibliothèque Christine de Pisan', '9 Rue de Lagny, 94300 Vincennes', 194.08, 3, 48.8488424, 2.425144899999964),
(57, 'Parc Monceau', '35 Boulevard de Courcelles, 75008 Paris', 123.03, 6, 48.8802832, 2.3085671999999704),
(58, 'Bois de Vincennes', 'Allée des Lapins, 75012 Paris', 327.37, 6, 48.8331769, 2.425863599999957),
(59, 'Jardin des Tuileries', '113 Rue de Rivoli, 75001 Paris', 251.48, 6, 48.8637215, 2.3320810000000165),
(60, 'Jardin du Luxembourg', '20 Rue Royer-Collard, 75005 Paris', 290.24, 6, 48.8462818, 2.3406539999999723),
(61, 'Jardin d’acclimatation ', '74 Boulevard Maurice Barres, 92200 Neuilly-sur-Seine', 152.51, 6, 48.8800234, 2.2650171999999884),
(62, 'Jardin de l’arsenal ', '53 Boulevard de la Bastille, 75012 Paris', 345.85, 6, 48.8495949, 2.368001800000002),
(63, 'Decathlon Montreuil', '79 Rue de la République, 93100 Montreuil', 161.53, 6, 48.85203970000001, 2.4159475999999813),
(64, 'Parc Montsouris', '2 Rue Gazan, 75014 Paris', 198.77, 6, 48.8242091, 2.339834699999983),
(65, 'Total Accès', '86 Rue de Paris, 93100 Montreuil', 339.46, 6, 48.8570004, 2.4290624999999864),
(66, 'Parc des buttes Chaumont ', '1 Rue Botzaris, 75019 Paris', 328.46, 6, 48.8769129, 2.381104599999958),
(67, 'Parc Georges Brassens', '2 Place Jacques Marette, 75015 Paris', 226.01, 6, 48.8328042, 2.300788799999964),
(68, 'Parc de la Villette', '211 Avenue Jean Jaurès, 75019 Paris', 317.9, 6, 48.8905829, 2.3917436000000407),
(69, 'Rue Paul Bert', '5 Rue Paul Bert, 93170 Bagnolet', 244.21, 5, 48.8593598, 2.418752300000051),
(70, 'Rue du Parc', '5 Rue du Parc, 94300 Saint-Mandé', 84.73, 5, 48.8468374, 2.4528918999999405),
(71, 'Rue de Lagny', '74 rue de Lagny, 75029 Paris', 0.84, 5, 48.8488833, 2.4073008999999956),
(72, 'Rue Jean Jacques Rousseau', '9 rue Jean Jacques Rousseau, 93100 Montreuil', 43.96, 5, 48.85058780000001, 2.4285479000000123),
(73, 'Le Dojo Cinema', '35 Rue du Progrès, 93100 Montreuil', 174.3, 5, 48.8516103, 2.4186151999999765),
(74, 'Avenue Georges Clemenceau', '17 Avenue Georges Clemenceau, 94300 Vincennes', 97.34, 5, 48.8486698, 2.422871299999997),
(75, 'Centre sportif Hector Berlioz', '112B Avenue de Paris, 94300 Vincennes', 13.73, 5, 48.8461852, 2.4264220000000023),
(76, 'Bibliothèque Ouest Christine de Pisan', '9 Rue de Lagny, 94300 Vincennes', 199.09, 5, 48.8488424, 2.425144899999964),
(77, 'Concrete Paris', 'Port de la Rapée, 75012 Paris', 212.02, 5, 48.8414201, 2.3724972999999636),
(78, 'Le Rive Gauche', '1 Rue du Sabot, 75006 Paris', 116.49, 5, 48.8529931, 2.3315130999999383),
(79, 'Batofar', '11 Quai François Mauriac, 75013 Paris', 322.5, 5, 48.8327009, 2.3788474000000406),
(80, 'Mix Club', '24 Rue de l\'Arrivée, 75015 Paris', 137.85, 5, 48.8427617, 2.3215966000000208),
(81, 'Hotel de ville', 'Place de l\'Hôtel de ville, Paris', 109.31, 7, 48.85680070000001, 2.351083399999993),
(82, 'Assemblée Nationale', '126 Rue de l\'Université, 75007 Paris, France', 235.58, 7, 48.8620166, 2.31868170000007),
(83, 'Elysée Palace', '55 Rue du Faubourg Saint-Honoré, 75008 Paris', 235.58, 7, 48.87060109999999, 2.316953300000023),
(84, 'Mairie du 1er arrondissement', '4 Place du Louvre, 75001 Paris', 187.5, 7, 48.8600425, 2.3412673999999924),
(85, 'Manufacture des Gobelins', '42 Avenue des Gobelins, 75013 Paris', 270.26, 7, 48.8352234, 2.3526646000000255),
(86, 'Palais Brongniard', '16 Place de la Bourse, 75002 Paris', 175.31, 7, 48.86922029999999, 2.3412243000000217),
(87, 'Palais Garnier', '8 Rue Scribe, 75009 Paris', 342.26, 7, 48.8719697, 2.331601399999954),
(88, 'Grande Mosquée de Paris', '2bis Place du Puits de l\'Ermite', 99.62, 7, 48.8424299, 2.354171199999996),
(89, 'Mairie du 15ème', '31 Rue Peclet, 75015 Paris', 129.68, 7, 48.8413986, 2.3003453000000036),
(90, 'Caisse d\'allocation familliale', '50 Rue du Dr Finlay, 75015 Paris', 223.1, 7, 48.8511217, 2.291078700000071),
(91, 'Centre commercial Grands Angles', '15 Rue des Lumières, 93100 Montreuil', 187.14, 7, 48.8614154, 2.4414716),
(92, 'Cinéma Gaumond Parnasse', '3 Rue d\'Odessa, 75015 Paris', 63.82, 7, 48.8430536, 2.3245039999999335),
(93, 'Les Caves Alliées', '44 Rue Grégoire de Tours, 75006 Paris', 254.62, 7, 48.8518664, 2.337359900000024),
(94, 'Palais des Congrès', '128 Rue de Paris, 93100 Montreuil', 9.28, 7, 48.8568282, 2.425811299999964),
(95, 'Hetic', '27 Bis Rue du Progrès, 93100 Montreuil', 122.53, 7, 48.8518602, 2.420284400000014),
(96, 'Théâtre de Châtelet', '1 Place du Châtelet, 75001 Paris', 99.08, 7, 48.8575996, 2.3467544999999745),
(97, 'DGSE', '141 Boulevard Mortier, 75020 Paris', 251.87, 7, 48.8745199, 2.4077899999999772),
(98, 'Pole Géoscience', '73 Avenue de Paris, 94160 Saint-Mandé', 193.81, 7, 48.8455901, 2.4251994999999624),
(99, 'AS', '12 Rue Henri Rol-Tanguy, 93100 Montreuil', 227.56, 7, 48.8504788, 2.4221661000000267),
(100, 'Ecole Maternelle Joseph Clouet', '11 Rue Georges Huchon, 94300 Vincennes', 291.79, 7, 48.8478319, 2.4215686000000005);

-- --------------------------------------------------------

--
-- Structure de la table `scripts`
--

CREATE TABLE `scripts` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `level` int(11) NOT NULL,
  `reward` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scripts`
--

INSERT INTO `scripts` (`id`, `name`, `description`, `level`, `reward`, `type`) VALUES
(1, 'Robbery goes wrong at', 'A madman was cornered by the police after an intimidation attempt on the staff. In an attempt to avoid his immediate arrest, he sequestered the employees inside the building.', 1, 25, 7),
(2, 'Late train at', 'The railwaymen’s trike take a new turn. They took hostages to bargain new social rights', 3, 75, 7),
(3, 'Thats enough at', 'Pineapple pizza is a SHAME - said Sergion Castini, pizzaiolo since 2013, he took hostages to bargain the end of this unatural feat', 3, 75, 7),
(4, 'Paranoïd at', 'Convinced that alien are among us, freaks took many people under his so called protection.', 2, 50, 7),
(5, 'Enthusiast at', 'Galvanized by the last Batman, Kévin took exemple on his favorite antagonist. ', 1, 25, 7),
(6, 'Mass at', 'Armed and dangerous religious cult have taken hostages ', 3, 75, 7),
(7, 'Mayhem at', 'It.. It was Spongebob ! cried a bystander. The true identity of the thugs are still unknown.', 3, 75, 7),
(8, 'Breakdown at', 'Suffering from PTST, this fighter took civilian to protect himself from bombing. ', 1, 25, 7),
(9, 'Iron Knee at', ' CRS in strike, that was unexpected', 3, 75, 7),
(10, 'Negociation at', 'To be heard, Anon Imous took human as a bargain', 2, 50, 7),
(11, 'Explosion at', 'A boiler exploded, causing a massive fire in the lower floors. ', 1, 25, 6),
(12, 'Bonefire fail at', 'Jean Kasper wanted to make a campfire, but he forgot that he was indoors.', 1, 25, 6),
(13, 'Trashfire at', 'A cigarette butt thrown too early.', 1, 25, 6),
(14, 'Smells like gaz at', 'A gaz leak occurs, half the building is in fire !', 2, 50, 6),
(15, 'Vandalism at', 'A car is in fire, too bad for the owner.', 1, 25, 6),
(16, 'Smoking hot situation at', 'This meal was obviously too spicy.', 1, 25, 6),
(17, 'Fireman at', 'I said gasoline into the truck, not in the water tank ! - Firefighter John ', 2, 50, 6),
(18, 'Litteraly a Burning man at', 'He thought he was the Torch.', 1, 25, 6),
(19, 'Firefly at', 'The Firefly was spotted in the area, watch for fire !', 3, 75, 6),
(20, 'throwing a plane at', 'You tried to rescue a plane, but let it “land” too close to habitation. Repair your mess !', 2, 50, 6),
(21, 'Aim elsewhere than the', 'Okay, so you can breathe fire. Don’t close your eyes next time.', 1, 25, 6),
(22, 'Stolen bag at', 'Grandma’s bag has been stolen', 1, 25, 5),
(23, 'Fight at', 'First rule is, do not talk about the fight club', 1, 25, 5),
(24, 'Racket at', 'Someone lunchbox is being stolen ', 1, 25, 5),
(25, 'Breaking in at', 'Your ex-girlfriend is trying to get his clothes back', 1, 25, 5),
(26, 'Violence at', 'Two drunk guys arguing about this elephant is whether pink or yellow.', 2, 50, 5),
(27, 'Insult at', 'A young developper is being insulted for pushing in wrong branch. ', 1, 25, 5),
(28, 'Harassmen at', 'A men is yelling “Are you accepting applications for your fan club ?” at a woman ', 2, 50, 5),
(29, 'Battle at', 'THIS IS SPARTA', 3, 75, 5),
(30, 'Snatching at', 'Someone cat has been kidnapped !', 1, 25, 5),
(31, 'Fuite at', 'A kid has stolen some candies and took the escape !', 1, 25, 5),
(32, 'Ivresse at', 'Some developer has been drinking too much after a hard week', 1, 25, 5),
(33, 'Tree crash at', '“This tree didn’t use his turn signal !” ', 1, 25, 1),
(34, 'Motorcycle crash at', 'He tries to go through a car. Didn’t end well.', 2, 50, 1),
(35, 'The bus goes round and round at', 'That was a neat turn. Unfortunately, the bus rolled over. ', 2, 50, 1),
(36, 'Parking in ', 'That was not a parking.', 1, 25, 1),
(37, 'Stunt job at', 'Someone lied on his resume.', 1, 25, 1),
(38, 'Spilled beer at', 'Hold my beer, I got this. ', 1, 25, 1),
(39, 'Going to fast into', 'The speed limit is not 50 for nothing. ', 1, 25, 1),
(40, 'Gang war at', 'A reckoning is in progress. Act fast before anybody get hurt !', 1, 50, 3),
(41, 'Paintball in', 'Fun but forbidden', 1, 25, 3),
(42, 'Robots attack at', 'Cylon have found us ! Kill it with fire before it lay robot eggs !', 2, 50, 3),
(43, 'Triple Threat at', 'The Hand wants to take control of the place. Get them !', 2, 50, 3),
(44, 'Cache busted at', 'They found your hideout and want revenge. Prevent them from hurting anyone else !', 2, 50, 3),
(45, 'The Empire strikes b- at', 'Stormtroopers ?! Aren’t they a little short for that ?', 1, 25, 3),
(46, 'Sith happened at', 'Malgus is there. Don’t let him do a new Slacking !', 2, 50, 3),
(47, 'Robbery at', 'Everyone needs money, him more than others.', 1, 25, 4),
(48, 'Infinity stone stollen at', 'Thanos wants the last one. Stop him ! ', 1, 25, 4),
(49, 'Vanishing vibranium at', 'Something is happening to the stock, investigate before its too late ! ', 1, 50, 4),
(50, 'Blackmail at', 'A close friend of yours call for help as his browser history is at risk. ', 2, 50, 4),
(51, 'Robin hood strikes at', 'The infamous green hood have lost his mind, he steals to the poor and keep it all for himself.', 1, 25, 4),
(52, 'Werewolf hunter at', 'Robbery in progress in the silver supplies.\r\n', 2, 50, 4),
(53, 'Sleight of hands at', ' He got some dexterity bonus, neat !... I mean, find him !', 1, 25, 4),
(54, 'Stollen supplies at', 'The attendance reports missing sugar crates, you must find them before the General’s next cup of coffee. He hates bitterness.\r\n', 1, 25, 4),
(55, 'Hanmster missing at', 'Habo was kidnapped ! Go and find it.', 3, 75, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `last_geoloc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_geoloc_lat` double NOT NULL,
  `last_geoloc_lon` double NOT NULL,
  `hero_name` varchar(50) NOT NULL,
  `hero` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `xp` int(11) NOT NULL DEFAULT '0',
  `events_success` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scripts`
--
ALTER TABLE `scripts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;
--
-- AUTO_INCREMENT pour la table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `scripts`
--
ALTER TABLE `scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
