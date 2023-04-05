-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema_anthony
CREATE DATABASE IF NOT EXISTS `cinema_anthony` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema_anthony`;

-- Listage de la structure de table cinema_anthony. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `anneeSortie` int NOT NULL,
  `dureeMinutes` int NOT NULL,
  `synopsis` text NOT NULL,
  `note` int NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table cinema_anthony.film : ~15 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `dureeMinutes`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Le silence des agneaux', 1991, 118, 'Un psychopathe connu sous le nom de Buffalo Bill sème la terreur dans le Middle West en kidnappant et en assassinant de jeunes femmes. Clarice Starling, une jeune agent du FBI, est chargée d\'interroger l\'ex-psychiatre Hannibal Lecter. Psychopathe redoutablement intelligent et porté sur le cannibalisme, Lecter est capable de lui fournir des informations concernant Buffalo Bill ainsi que son portrait psychologique. Mais il n\'accepte de l\'aider qu\'en échange d\'informations sur la vie privée de la jeune femme. Entre eux s\'établit un lien de fascination et de répulsion.\r\n', 4, 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/image/001/203/fbjfvpmcmyghw3i8tcmef4cweuh-680.jpg', 1),
	(2, 'Speed', 1994, 116, 'Un jeune policier est aux prises avec un maître chanteur, artificier à la retraite, qui menace de faire sauter un autobus dans lequel il a placé une bombe qu\'il peut faire exploser à distance.', 3, 'https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/B595D609DF84483CE4A6F8419D356325A690DF88F2C7267D556388ED618A86F2/scale?width=506&aspectRatio=2.00&format=jpeg', 2),
	(3, 'True Lies', 1994, 144, 'Comment un agent secret va reconquérir sa femme qui ignore tout des activités secrètes de son époux et le trouve bien fade en Monsieur-tout-le-monde...', 2, 'https://fr.web.img3.acsta.net/medias/nmedia/18/64/75/73/19224329.jpg', 3),
	(4, 'Les aventuriers de l\'arche perdue', 1981, 116, '1936. Parti à la recherche d\'une idole sacrée en pleine jungle péruvienne, l\'aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.\r\nRevenu à la vie civile à son poste de professeur universitaire d\'archéologie, il est mandaté par les services secrets et par son ami Marcus Brody, conservateur du National Museum de Washington, pour mettre la main sur le Médaillon de Râ, en possession de son ancienne amante Marion Ravenwood, désormais tenancière d\'un bar au Tibet.\r\nCet artefact égyptien serait en effet un premier pas sur le chemin de l\'Arche d\'Alliance, celle-là même où Moïse conserva les Dix Commandements. Une pièce historique aux pouvoirs inimaginables dont Hitler cherche à s\'emparer...', 5, 'https://i0.wp.com/www.filmspourenfants.net/wp-content/uploads/2018/04/les-aventuriers-de-larche-perdue-a.jpg?fit=555%2C747&ssl=1', 4),
	(5, 'Indiana Jones et le temple maudit', 1984, 118, 'L\'archéologue aventurier Indiana Jones est de retour. Il poursuit une terrible secte qui a dérobé un joyau sacré doté de pouvoirs fabuleux. Une chanteuse de cabaret et un époustouflant gamin l\'aideront a affronter les dangers les plus insensés.\r\n', 5, 'https://i0.wp.com/www.filmspourenfants.net/wp-content/uploads/2018/04/indiana-jones-et-le-temple-maudit-a.jpg?fit=555%2C715&ssl=1', 4),
	(6, 'Bird box', 2020, 117, 'Alors qu\'une mystérieuse force décime la population mondiale, une seule chose est sûre : ceux qui ont gardé les yeux ouverts ont perdu la vie. Malgré la situation, Malorie trouve l\'amour, l\'espoir et un nouveau départ avant de tout voir s\'envoler. Désormais, elle doit prendre la fuite avec ses deux enfants, suivre une rivière périlleuse jusqu\'au seul endroit où ils peuvent encore se réfugier. Mais pour survivre, ils devront entreprendre ce voyage difficile les yeux bandés.\r\n', 3, 'https://fr.web.img6.acsta.net/pictures/18/10/24/16/32/3420946.jpg', 5),
	(7, '8 mile', 2003, 110, 'A Detroit, en 1995, Jimmy Smith Jr. a des rêves plein la tête, mais il lui manque encore les mots pour les exprimer. Sa vie d\'adolescent se déroule entre banlieue blanche et quartiers noirs, le long de cette ligne de démarcation que l\'on nomme 8 Mile Road. En dépit de tous ses efforts, Jimmy n\'a jamais franchi cette barrière symbolique et continue d\'accumuler les déboires familiaux, professionnels et sentimentaux.\r\n\r\nUn jour, il participe à un clash - une joute oratoire de rappeurs - où il doit faire face à Papa Doc, le chef de la bande des " Leaders du Monde Libre ". Paralysé par le trac, il reste muet et doit quitter la scène sous les huées de la foule. Cette nouvelle humiliation l\'oblige à un salutaire examen de conscience. Quelques jours plus tard, Jimmy se retrouve forcé de tenter un come-back...\r\n', 4, 'https://fr.web.img4.acsta.net/medias/nmedia/00/02/46/93/affiche.jpg', 6),
	(8, 'Piége de cristal', 1988, 135, 'John McClane, policier new-yorkais, est venu rejoindre sa femme Holly, dont il est séparé depuis plusieurs mois, pour les fêtes de Noël dans le secret espoir d\'une réconciliation. Celle-ci est cadre dans une multinationale japonaise, la Nakatomi Corporation. Son patron, M. Takagi, donne une soirée en l\'honneur de ses employés, à laquelle assiste McClane. Tandis qu\'il s\'isole pour téléphoner, un commando investit l\'immeuble et coupe toutes les communications avec l\'extérieur...', 4, 'https://www.ecranlarge.com/media/cache/1600x1200/uploads/image/001/122/omoh8uh4u5psmdw3dgtzco6eql8-427.jpg', 7),
	(9, 'Une journée en enfer', 1995, 145, 'Le lieutenant John McClane est de retour et il est demandé en personne par un terroriste, Simon, qui menace New York. Alors qu\'il fait équipe avec Zeus, un commerçant du quartier d\'Harlem embarqué dans l\'aventure malgré lui, McLane se livre à un petit jeu à travers toute la ville, devant résoudre des énigmes. S\'il rate son coup, une bombe explose, c\'est la règle imposée par Simon...\r\n', 4, 'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/51bXwsdYQAL._AC_SY445_.jpg', 7),
	(10, 'Total Recall', 1990, 113, 'La planète Terre, 2048. Hanté par un cauchemar qui l’entraîne chaque nuit sur Mars, Doug Quaid s’adresse à un laboratoire, Rekall, qui lui offre de matérialiser son rêve grâce à un puissant hallucinogène. Mais l’expérience dérape : la drogue réveille en lui le souvenir d’un séjour bien réel sur Mars, à l’époque où il était l’agent le plus redouté du despote Cohaagen. Des tueurs désormais à ses trousses, Quaid décide de repartir sur la planète rouge où l’attendent d’autres souvenirs et bien d’autres dangers...\r\n', 4, 'https://fr.web.img2.acsta.net/pictures/20/09/07/11/16/5690971.jpg', 8),
	(11, 'Les autres', 2001, 132, 'En 1945, dans une immense demeure victorienne isolée sur l\'île de Jersey située au large de la Normandie, vit Grace, une jeune femme pieuse, et ses deux enfants, Anne et Nicholas. Les journées sont longues pour cette mère de famille qui passe tout son temps à éduquer ses enfants en leur inculquant ses principes religieux. Atteints d\'un mal étrange, Anne et Nicholas ne doivent en aucun cas être exposés à la lumière du jour. Ils vivent donc reclus dans ce manoir obscur, tous rideaux tirés.\r\nUn jour d\'épais brouillard, trois personnes frappent à la porte du manoir isolé, en quête d’un travail. Grace, qui a justement besoin d\'aide pour l\'entretien du parc ainsi que d’une nouvelle nounou pour ses enfants, les engage. Dès lors, des événements étranges surviennent dans la demeure...', 2, 'https://fr.web.img4.acsta.net/medias/nmedia/00/02/33/92/afflesautres.jpg', 9),
	(12, 'Robin des bois prince des voleurs', 1991, 140, 'En 1193, Le Roi d\'Angleterre Richard Coeur de Lion est retenu captif par les Autrichiens. Évadé d\'une geôle à Jérusalem après une croisade des plus périlleuses, Robin de Locksley retourne sur l\'île de Grande-Bretagne. Il est accompagné d\'Azeem, un Maure qu\'il a libéré. Mais Robin réalise avec horreur que ses terres natales ont été mises à feu et à sang. Le Shérif de Nottingham opprime les populations locales et agit comme un vrai tyran. Considéré comme un hors-la-loi, Robin se réfugie dans la forêt de Sherwood. Il y rencontre des brigands et s\'allie avec eux pour défier le Shérif, qui cherche à s\'emparer du trône royal.\r\n', 5, 'https://fr.web.img3.acsta.net/pictures/210/122/21012285_20130613120205794.jpg', 10),
	(13, 'Bopha', 2020, 120, 'En pleine Apartheid, les mésaventures d\'un policier noir en Afrique du Sud, qui subit le racisme de ses supérieurs...', 0, 'https://fr.web.img3.acsta.net/c_310_420/medias/nmedia/18/72/99/39/19185807.jpg', 11),
	(14, 'Les aventuriers de l\'arche perdue', 1989, 124, '1936. Parti à la recherche d\'une idole sacrée en pleine jungle péruvienne, l\'aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.', 5, 'https://fr.web.img2.acsta.net/c_310_420/medias/nmedia/00/02/49/18/affiche.jpg', 4),
	(15, 'Belle journée pour mourir', 2013, 96, 'Bruce Willis est de retour dans son rôle le plus mythique : John McClane, le « vrai héros » par excellence, qui a le talent et la trempe de celui qui résiste jusqu’au bout.', 4, 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/94/29/36/20417688.jpg', 7);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
