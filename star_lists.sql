-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 jan. 2021 à 20:43
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `star_lists`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_18_171948_create_stars_table', 1),
(5, '2021_01_19_002624_create_roles_table', 2),
(6, '2021_01_19_003105_create_role_users_table', 3),
(7, '2021_01_20_173644_add_photo_to_users_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-01-20 00:45:55', '2021-01-19 00:45:55'),
(2, 'user', '2021-01-19 02:03:37', '2021-01-19 02:03:37');

-- --------------------------------------------------------

--
-- Structure de la table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`) VALUES
(1, 1),
(7, 2),
(8, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `stars`
--

CREATE TABLE `stars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stars`
--

INSERT INTO `stars` (`id`, `nom`, `prenom`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Angelina', 'Joly', '1611148368_jude_law.jpg', 'She\'s an actor', '2021-01-19 08:07:06', '2021-01-20 12:12:48'),
(4, 'kingsley', 'juju', '1611099047_avatar3.png', 'good', '2021-01-19 08:26:06', '2021-01-19 22:30:47'),
(17, 'Angelina', 'Jolie', '1611144741_angelina_jolie.jpg', 'Angelina Jolie  is an American actress, filmmaker, and humanitarian. The recipient of numerous accolades, including an Academy Award and three Golden Globe Awards, she has been named Hollywood\'s highest-paid actress multiple times.\r\n\r\nJolie made her screen debut as a child alongside her father, Jon Voight, in Lookin\' to Get Out (1982), and her film career began in earnest a decade later with the low-budget production Cyborg 2 (1993), followed by her first leading role in a major film, Hackers (1995). She starred in the critically acclaimed biographical cable films George Wallace (1997) and Gia (1998), and won an Academy Award for Best Supporting Actress for her performance in the 1999 drama Girl.', '2021-01-20 11:12:21', '2021-01-20 11:12:21'),
(18, 'Beyonce', 'Knowles', '1611144890_beyonce_knowles.jpg', 'Beyonce Knowles first captured the public\'s eye as lead vocalist of the R&B group Destiny\'s Child. She later established a solo career with her debut album Dangerously in Love, becoming one of music\'s top-selling artists with sold-out tours and a slew of awards. Knowles has also starred in several films, including Dream Girls. She married hip-hop recording artist Jay-Z in 2008 and the couple has three children.\r\n\r\nBeyoncé Giselle Knowles was born on September 4, 1981, in Houston, Texas. She started singing at an early age, competing in local talent shows and winning many of these events by impressing audiences with her singing and dancing abilities.', '2021-01-20 11:14:50', '2021-01-20 11:14:50'),
(19, 'Jennifer', 'Aniston', '1611145084_jennifer_aniston.jpg', 'Jennifer Joanna Aniston (born February 11, 1969) is an American actress, producer, and businesswoman. The daughter of actors John Aniston and Nancy Dow, she began working as an actress at an early age with an uncredited role in the 1987 film Mac and Me; her first major film role came in the 1993 horror comedy Leprechaun. Since her career grew in the 1990s, Aniston has been one of Hollywood\'s highest-paid actresses.\r\n\r\nAniston rose to international fame for her role as Rachel Green on the television sitcom Friends (1994–2004), for which she earned Primetime Emmy, Golden Globe, and Screen Actors Guild awards. Her character became widely popular and is considered one of the greatest female characters in television history. Aniston has since played starring roles in numerous dramas, comedies and romantic comedies.', '2021-01-20 11:18:04', '2021-01-20 11:18:04'),
(20, 'Jude', 'Law', '1611151418_jude_law.jpg', 'David Jude Heyworth Law is an English actor. He has received multiple awards including a BAFTA Film Award as well as nominations for two Academy Awards and two Tony Awards. In 2007, he received an Honorary César and was named a knight of the Order of Arts and Letters by the French government.\r\n\r\nBorn and raised in London, Law started acting in theatre. After finding small roles in feature films, Law gained recognition for his role in Anthony Minghella\'s The Talented Mr. Ripley (1999), for which he won the BAFTA Award for Best Actor in a Supporting Role and was nominated for an Academy Award.\r\n\r\nLaw played Dr. Watson in Sherlock Holmes (2009) and Sherlock Holmes: A Game of Shadows (2011), a younger Albus Dumbledore in Fantastic Beasts.', '2021-01-20 11:21:47', '2021-01-20 13:09:05'),
(21, 'Leonardo', 'Dicarpio', '1611145552_leonardo_dicarpio.jpg', 'Leonardo Wilhelm DiCaprio is an American actor, film producer and environmentalist. As of 2019, his films have grossed US$7.2 billion worldwide, and he has placed eight times in annual rankings of the highest-paid actors in the world.\r\n\r\nBorn in Los Angeles, DiCaprio began his career by appearing in television commercials in the late 1980s. In the early 1990s, he played recurring roles in various television series, such as the sitcom Parenthood. \r\n\r\nHe had his first major film role in This Boy\'s Life (1993) and received acclaim for his supporting role as a developmentally disabled boy in What\'s Eating Gilbert Grape (1993). He achieved international stardom in the epic romance Titanic (1997), which became the highest-grossing film to that point. \r\n\r\nDiCaprio portrayed Howard Hughes in The Aviator (2004) and continued to receive acclaim for his performances in the political thriller Blood Diamond (2006), the crime drama The Departed (2006), and the romantic drama Revolutionary Road (2008).', '2021-01-20 11:25:52', '2021-01-20 13:11:39'),
(22, 'Megan', 'Fox', '1611145742_megan_fox.jpg', 'Megan Denise is an American actress and model. She made her acting debut in the family film Holiday in the Sun (2001). This was followed by numerous supporting roles in film and television, as well as a starring role in the ABC sitcom Hope & Faith (2004–2006). \r\n\r\nFox went on to make her feature film debut in the teen musical comedy Confessions of a Teenage Drama Queen (2004).\r\n\r\nFox received worldwide recognition for her breakout role as Mikaela Banes in the blockbuster action film Transformers (2007). She reprised her role in the sequel Transformers: Revenge of the Fallen (2009) and portrayed the titular character in the horror comedy Jennifer\'s Body (2009).', '2021-01-20 11:29:02', '2021-01-20 11:29:02'),
(23, 'Nicole', 'Kidman', '1611145940_nicole_kidman.jpg', 'Nicole Mary Kidman is an Australian actress, singer, and producer. She has received an Academy Award, two Primetime Emmy Awards, and five Golden Globe Awards. She was ranked among the world\'s highest-paid actresses in 2006, 2018 and 2019. \r\n\r\nTime magazine named her one of the 100 most influential people in the world in 2004 and again in 2018. In 2020, The New York Times ranked her fifth on its list of the greatest actors of the 21st century up to that point.\r\n\r\nKidman began her acting career in Australia with the 1983 films Bush Christmas and BMX Bandits. Her breakthrough came in 1989 with the thriller film Dead Calm and the miniseries Bangkok Hilton. In 1990, she made her Hollywood debut in the racing film Days of Thunder, opposite Tom Cruise.', '2021-01-20 11:32:20', '2021-01-20 11:32:20'),
(24, 'Robert', 'Pattinson', '1611146082_robert_pattinson.jpg', 'Robert Douglas Thomas Pattinson is an English actor. Noted for his versatile roles in both big-budget and independent films, Pattinson has been ranked among the world\'s highest-paid actors. Time magazine named him one of the 100 most influential people in the world, and he was featured in the Forbes Celebrity 100 list.\r\n\r\nAfter starting to act in a London theatre club at age 15, he began his film career by playing Cedric Diggory in the fantasy film Harry Potter and the Goblet of Fire (2005).\r\n\r\n He gained worldwide recognition at age 22 in the role of Edward Cullen in The Twilight Saga film series (2008–2012), which grossed over $3.3 billion worldwide. \r\n\r\nAfter starring in the romantic dramas Remember Me (2010) and Water for Elephants (2011), Pattinson received critical acclaim for his performances in independent films from auteur directors.', '2021-01-20 11:34:42', '2021-01-20 11:34:42'),
(25, 'Robert', 'Redford', '1611146736_robert_redford.jpg', 'Charles Robert Redford Jr. is an American retired actor, director, and activist. He is the recipient of various accolades, including; two Academy Awards, a British Academy Film Award, three Golden Globe Awards, the Cecil B. DeMille Award, and the Presidential Medal of Freedom. \r\n\r\nAppearing on stage in the late 1950s, Redford\'s television career began in 1960, including an appearance on The Twilight Zone in 1962. He earned an Emmy nomination as Best Supporting Actor for his performance in The Voice of Charlie Pont (1962). \r\n\r\nRedford made his film debut in War Hunt (1962). His role in Inside Daisy Clover (1965) won him a Golden Globe for the best new star. He starred alongside Paul Newman in Butch Cassidy and the Sundance Kid (1969), which was a huge success and made him a major star.', '2021-01-20 11:45:36', '2021-01-20 13:15:06'),
(26, 'Selena', 'Gomez', '1611146929_selena_gomez.jpg', 'Selena Marie Gomez  is an American singer, actress, and producer. Born and raised in Texas, Gomez began her career by appearing on the children\'s television series Barney & Friends (2002–2004). In her teens, she rose to prominence for her role as Alex Russo in the Emmy Award–winning Disney Channel television series Wizards of Waverly Place.\r\n\r\nAlongside her television career, Gomez has starred in the films Another Cinderella Story (2008), Princess Protection Program (2009), Wizards of Waverly Place: The Movie (2009), Ramona and Beezus (2010), Monte Carlo (2011), Spring Breakers (2012), Getaway (2013), The Fundamentals of Caring (2016), The Dead Don\'t Die (2019), and A Rainy Day in New York (2019). \r\n\r\nShe also voices the character of Mavis in the Hotel Transylvania film franchise (2012–present), and has served as executive producer for the Netflix television series 13 Reasons Why (2017–2020) and Living Undocumented (2019).', '2021-01-20 11:48:49', '2021-01-20 11:48:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', 'admin@admin.com', '1611165091_angelina_jolie.jpg', NULL, '$2y$10$HyY3c0isv44jdqbbuYDVru0tWOSAi7y69Et8wWby9w8tQDZpKnOxy', NULL, '2021-01-18 21:50:22', '2021-01-18 21:50:22'),
(2, 'kingsley', 'king@gmail.com', 'avatar1.png', NULL, '$2y$10$B2g2I097hXNkKGA0xpNIZed4KqrZVnyMjlX/yibvsi98NAHBTGik.', NULL, '2021-01-19 00:15:56', '2021-01-19 00:15:56'),
(7, 'daniel', 'dan@gmail.com', NULL, NULL, '$2y$10$2JvtRCCYw2tfbG82u8Iv9uLLYm3DWyLzjox5uDwcr5iX45zgrUXkK', NULL, '2021-01-19 01:30:00', '2021-01-19 01:30:00'),
(8, 'eva', 'eva@gmail.com', '1611165091_angelina_jolie.jpg', NULL, '$2y$10$j0.SYngHZX6UB6jigc.NC.vGwlbAoM8mzbjI3AhSFORxgzAnHBzMK', NULL, '2021-01-20 16:51:31', '2021-01-20 16:51:31'),
(9, 'sly', 'sly@gmail.com', 'avatar1.png', NULL, '$2y$10$3CBo5jKTMjd2JiBFKi9L0.UFTQb8W7.jqnHqmnqQ.S7QxlH.E6BUi', NULL, '2021-01-20 17:13:03', '2021-01-20 17:13:03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role_users`
--
ALTER TABLE `role_users`
  ADD KEY `role_users_user_id_foreign` (`user_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Index pour la table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
