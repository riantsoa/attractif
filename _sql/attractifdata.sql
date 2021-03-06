-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Décembre 2014 à 16:50
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `attractif`
--

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Telephone'),
(2, 'Tablette'),
(3, 'Ordinateur portable'),
(4, 'Appareils photo'),
(5, 'Périphériques de stockage');

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `date`, `place`, `descript`, `name`) VALUES
(1, '2014-12-13 19:00:00', '37 Rue Marbeuf, 75008 Paris', 'Au coeur de Paris et du triangle d''or, à deux pas des Champs Elysées, Le Salon Marbeuf est un appartement de réception unique situé au deuxième étage d''un magnifique immeuble Haussmannien. Vente de téléphones.', 'Le Salon Marbeuf - Téléphones Dec 2014'),
(2, '2014-12-20 17:00:00', '10 Route du Champ d''Entraînement, 75116 Paris', 'Situé dans le 16ème arrondissement de Paris, en bordure du Bois de Boulogne, à deux pas de Paris La Défense, le domaine de la Vigne de Paris-Bagatelle vous accueille dans un cadre atypique et privilégié pour que votre événement soit un souvenir inoubliable ! Vente de tablettes.', 'La Vigne de Paris Bagatelle - Tablettes Dec 2014'),
(3, '2014-12-09 09:15:12', '12 Rue la Fayette, 75009 Paris', 'Au cœur de Paris, à deux pas de l''Opéra Garnier et des Grands Magasins, Le Salon Lafayette, situé au deuxième étage d''un magnifique immeuble Haussmannien, est le lieu idéal pour l''organisation de tous vos évènements professionnels et privés. Vente d''ordinateurs portables.', 'Le Salon Lafayette - Ordi portables Dec 2014'),
(4, '2014-12-09 15:19:09', '7 Rue de Sainte Hélène, 75013 Paris', 'Bienvenue sur le site de l''Espace Seven Spirits, la nouvelle salle parisienne dédiée à l''événementiel d''entreprise : soirées, cocktails, dîners, séminaires, formations, expositions, lancements de produit, salons, tournages de film, arbres de Noël, conférences, défilés … Le Seven Spirits dispose de nouvelles infrastructures high-tech (son, éclairage, vidéo), d''un plafond nuit étoilée, d''un système d''éclairage écologique intégralement en LED, et d''une décoration, aussi moderne que cosy.', '7 Spirits - Appareils photo Dec 2014'),
(5, '2014-12-09 15:19:34', '1-13 quai de Grenelle, 75015 Paris', 'Les Espaces Cap 15 accueillent vos événements (séminaires, conventions, soirées de gala, etc.) pour toutes manifestations allant de 30 à 1 000 personnes. Bénéficiant d''une situation géographique exceptionnelle, en bordure de Seine et au pied de la tour Eiffel, ce centre high-tech dispose de 1 500m² de surfaces modulables en 17 salons. ', 'Les Espaces Cap 15 - Périphériques de stockage Dec 2014');

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `category`, `descript`, `image`) VALUES
(1, 'Apple Iphone 5', 250, 1, 'Iphone de bonne qualite. Vachement bien pour telephoner.', 'iphone5.jpg'),
(2, 'Samsung Galaxy Alpha', 250, 1, 'Dernier de chez Samsung. Prend des photo de qualité.', 'galaxy.jpg'),
(3, 'Samsung Galaxy Tab S 10.5', 150, 2, 'Tablette polyvalente.', 'samsung-galaxy-tab.jpg'),
(4, 'Tablette HP Surface pro', 150, 2, 'Tablette qu''elle est bien.', 'microsoft-surface-pro-2.jpg'),
(5, 'Mac Book Pro', 500, 3, 'Mac Book Pro dernier chris de chez Apple.', 'macbookpro-2014.jpg'),
(6, 'Asus ROG G751', 500, 3, 'Pc portable Asus pour gamer; hautes performances.', 'asus-rog.jpg'),
(7, 'Samsung NX1000 20-50mm II (B)', 275, 4, 'De son design épuré et élégant à son interface utilisateur incroyablement conviviale, le NX1000 de Samsung est conçu pour être le prolongement de votre créativité. Bien qu’il soit facile à utiliser, le NX1000 est un appareil photo ultra-performant. Son capteur APS-C à très haute résolution (20,3 mégapixels) permet la prise de photos incroyablement détaillées qui conservent une grande qualité lorsqu’elles sont agrandies. Grâce aux fonctions Wi-Fi intégrées du NX1000, vous pouvez rester en contact avec vos amis et votre famille, où que vous alliez. Ainsi, il est possible de montrer et de partager vos photos à la simple pression d’un bouton.', 'appsamsung.jpg'),
(8, 'Canon-eos-70d', 350, 4, 'L''EOS 70D est une belle évolution du boîtier expert grand public de Canon. Reprenant un châssis sain, un bel écran tactile sur rotule et une ergonomie sans faille, il ne se contente pas de synthétiser le 60D et le 7D. Il innove avec sa technologie Dual AF qui fluidifie et accélère l''autofocus en LiveView et en vidéo, jusque là talon d''Achille des reflex.', 'canon-eos-70d.jpg'),
(9, 'Western Digital My Passeport 1 To', 700, 5, 'Ce disque dur externe conserve bien entendu sa coque qui résiste aux éraflures et qui ne retient pas les traces de doigts. Cinq couleurs sont disponibles : noir, blanc, rouge, bleu et gris, mais toutes ne proposent pas l''ensemble des capacités. Seule la version noire est disponible de 500 Go à 2 To. La rouge, la bleue et la grise sont équipées de disques durs allant de 500 Go à 1 To. La blanche, quant à elle, n''est commercialisée qu''en 500 Go.', 'WD-mypasseport.JPG'),
(10, 'Disque Multimedia LACIE 1 To', 230, 5, 'Une interface soignée, une compatibilité satisfaisante et un suivi constructeur désormais régulier. Certes, il n''est pas parfait, mais il conviendra à tous ceux qui veulent lire facilement et simplement des fichiers multimédias.', 'lacieDD.jpg'),
(11, 'Disque Dur Corsair Voyager 2', 270, 5, 'Le Corsair Voyager Air 2 offre des débits très honorables en USB 3.0, tandis que son utilisation avec différents produits mobiles est simple et pratique. On regrette principalement son encombrement peu adapté à la mobilité.', 'DDcorsair-voyager-air-2.jpg'),
(12, 'Adata Elite', 180, 5, 'Bien entendu, le H720 est équipé d''une interface USB 3.0 de type micro. Malheureusement, le fabriquant ne communique pas sur les taux de transfert. Il faudra donc attendre son test pour y voir un peu plus clair.\r\n\r\nUne seule capacité sera commercialisée : 500 Go au prix conseillé de 75 euros avec 3 ans de garantie.', 'adata.jpg'),
(13, 'Panasonic Lumix FZ1000', 2000, 4, 'Capteur 1" de 20 Mpx, zoom 16x raisonnablement lumineux (25-400 mm f/2,8-4), réactivité de haut vol, écran orientable sur rotule, viseur électronique confortable et détaillé, vidéo en 4K, précis et polyvalent, le Panasonic Lumix FZ1000 a tout pour devenir le parfait partenaire photographique, en voyage et au quotidien. Il peut même remplacer un reflex d''entrée de gamme ! Qui a dit que les bridges étaient morts ?', 'panasonic-lumix-fz1000.jpg'),
(14, 'Nikon Coolpix S810c', 1740, 4, 'Le zoom 10x cède sa place à un 12x, un 25-300 mm f/3,3-6,3, toujours stabilisé et doublé d''un zoom numérique 4x. L''écran arrière OLED de 8,7 cm et 819 000 points est quant à lui remplacé par un TFT ACL, toujours multitouch, mais de 9,4 cm de diagonale et comportant 1 229 999 points. La mémoire interne passe à 4 Go, la mémoire vive est doublée à 1 Go ; le processeur central reste un Cortex A9, mais le tout est animé par Android 4.2.2 et non plus Android 2.3. Le stockage externe passe pour sa part au microSD (une carte de 16 Go est fournie) et une prise casque fait son apparition. Enfin, la nouvelle batterie EN-EL23 multiplie l''autonomie par deux et permet désormais d''atteindre (théoriquement) 270 vues. Par contre, il n''y a toujours pas d''emplacement pour une SIM 3G.', 'nikon-coolpix-s810.jpg'),
(15, 'Nikon Coolpix S31', 360, 4, '"Papa, Maman, puis-je avoir un appareil photo ?" Il y a quelques années encore, il suffisait d''acheter un compact jetable pour les vacances ou confier l''appareil argentique familial à ses enfants. Mais depuis l''avènement des smartphones, chacun a dans sa poche de quoi prendre des photos. Pourtant, un véritable APN dédié garde un intérêt, que ce soit pour son ergonomie plus appropriée à la prise de vue, pour son coût, pour son zoom optique ou, tout simplement, pour sa qualité d''image encore au-dessus de celle des meilleurs smartphones.', 'nikon-coolpix-s31.jpg'),
(16, 'Samsung Galaxy Tab 4 10.1', 480, 2, 'La Samsung Galaxy Tab 4 de 10,1 po vous offre un accès pratique à vos amis, vos réseaux et vos divertissements préférés. Son écran éclatant de 10,1 po convient parfaitement à la lecture vidéo en transit et aux expériences multimédias riches. De plus, la tablette se connecte aisément à votre téléphone Galaxy et à votre téléviseur Smart TV pour vous offrir un environnement maison véritablement synchronisé. Grâce à une gamme infinie d''applications allant du réseautage social aux jeux, vous disposerez de tout ce dont vous avez besoin partout où vous irez.', 'galaxyTab4.jpg'),
(17, 'Danew Konnect W40', 240, 1, 'Moins connu que Wiko mais adepte des mêmes recettes, le Français Danew fait parler lui en ce début de semaine grâce à deux terminaux qui visent à mettre Windows Phone à la portée de toutes les bourses. En effet, le Konnect W40 s''accompagne d''un prix de vente conseillé de 69,99 €.', 'danew-konnect-w40.png'),
(18, 'Western Digital WD TV HD', 130, 5, 'Description du produit: Western Digital - WDAVP00BE\r\nType de produit: Lecteur Multimédia Haute Définition\r\nFormats Vidéo: MPEG1/2/4, WMV9, AVI (MPEG4, Xvid, AVC), H.264, MKV, MOV (MPEG4, H.264)\r\nFormats de photos: JPEG, GIF, TIF/TIFF, BMP, PNG\r\nFormats de son: MP3, WMA, OGG, WAV/PCM/LPCM, AAC, FLAC, Dolby Digital, AIF/AIFF, MKA\r\nContenu du kit: Lecteur multimédia HD, Télécommande compacte (piles incluses), Logiciel de conversion de médias (Windows uniquement), Câble AV composite, Adaptateur secteur, Guide d''installation rapide\r\nDimensions(LXHXP): 40 mm X 100 mm X 125 mm\r\nPoids: 302, 5 g\r\nAdaptateur français fourni\r\n', 'wdtv.jpg');

--
-- Contenu de la table `sale`
--

INSERT INTO `sale` (`id`, `user`, `product`, `date`, `event`) VALUES
(1, 6, 1, '2014-12-13 19:00:00', 1),
(2, 6, 5, '2014-12-10 09:45:10', 2),
(3, 7, 9, '2014-12-09 15:51:16', 3),
(4, 7, 9, '2014-12-09 15:51:16', 2),
(5, 9, 2, '2014-12-09 15:51:58', 2),
(6, 10, 7, '2014-12-09 15:51:58', 3),
(7, 3, 9, '2014-12-09 15:52:33', 4),
(8, 9, 9, '2014-12-09 15:52:33', 4),
(9, 7, 7, '2014-12-09 15:53:13', 4),
(10, 6, 8, '2014-12-10 09:53:58', 1),
(11, 6, 4, '2014-12-10 09:54:03', 1),
(12, 6, 7, '2014-12-10 10:00:00', 2);

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `mail`, `pass`, `newsletter`, `admin`) VALUES
(6, 'Batard', 'ba@gmail.com', '123', 1, 0),
(7, 'Bobby', 'Admin@admin.com', 'admin', 0, 0),
(8, 'Anthon', 'antho@gmail.com', 'antho', 0, 0),
(9, 'aaa@gmail.com', 'arnauda@gmail.com', 'aaa', 0, 0),
(10, 'bbb', 'Brentb@gmail.com', 'bbb', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
