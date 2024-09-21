-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 21 sep. 2024 à 19:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `accepted_tests`
--

CREATE TABLE `accepted_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compteentrepris_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duree_estimee` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fichier_pdf` varchar(255) DEFAULT NULL,
  `company_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accepted_tests`
--

INSERT INTO `accepted_tests` (`id`, `compteentrepris_id`, `nom`, `description`, `duree_estimee`, `categorie`, `niveau`, `created_at`, `updated_at`, `fichier_pdf`, `company_password`) VALUES
(2, 4, 'web', 'bonne chance', 30, 'Programmation', 'Débutant', '2024-09-06 07:10:57', '2024-09-06 07:10:57', '1725610148_Mastre_professionnel_SSII (2).pdf', '12374394'),
(3, 4, 'ai', 'bvvvvvvvvvv', 20, 'Logique algorithmique', 'Intermédiaire', '2024-09-06 10:35:14', '2024-09-06 10:35:14', '1725622505_Mastre_professionnel_SSII (2).pdf', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `comptedevs`
--

CREATE TABLE `comptedevs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prénom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmepassword` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comptedevs`
--

INSERT INTO `comptedevs` (`id`, `nom`, `prénom`, `email`, `password`, `confirmepassword`, `created_at`, `updated_at`) VALUES
(11, 'Nsiri', 'Rim', 'nsiririm111@gmail.com', '$2y$12$gqWzg1wSrHaE/5PawWgbLOs7bJUYJzIs5wj2NttZ8A2nmJn6AH9L.', '$2y$12$nuWKqE7ifFM.8WlMYORrAeeb5C.iTV6OBCjpuDd3wr9A5svny2IIO', '2024-09-06 07:01:21', '2024-09-06 07:01:21'),
(12, 'Nsiri', 'Rim', 'nsiririm1@gmail.com', '$2y$12$TGgCPH/bk38pUrWIsFpH8OqAAhDlBkn0Eug8FEpPwR0m9J4pGMrfW', '$2y$12$Nl3XwBTlnNfy0nhqm1rXaee/iOwForvuRUc7EwyRYGdh8ujLsEyR.', '2024-09-06 07:17:14', '2024-09-06 07:17:14'),
(13, 'Nsiri', 'marwa', 'nsiririm00@gmail.com', '$2y$12$7S4W5lXZg7rGv0zUpRAJv.PYoU2Z52qhFyVWM4vg4gHPUmj/d9xYO', '$2y$12$7NYCD7OFqFTSL9IVnoHDR.1FoNxHhpuSQBnGfx.yYueo05iwWQmfW', '2024-09-06 07:41:46', '2024-09-06 07:41:46'),
(15, 'Nsiri', 'Rim', 'nsiririm2003@gmail.com', '$2y$12$i85Xx9a/u0D97cbJF2wpDONS7DtNtk7U9OARYNltTO1PcrF7XMlv2', '$2y$12$goDpNWy7DSOupJaUBGe5FeK4M7IArdZojZjHN.O3smuMlu9PWtVHq', '2024-09-06 11:02:01', '2024-09-06 11:02:01');

-- --------------------------------------------------------

--
-- Structure de la table `compteentrepris`
--

CREATE TABLE `compteentrepris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `domaine` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmepassword` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compteentrepris`
--

INSERT INTO `compteentrepris` (`id`, `nom`, `domaine`, `email`, `password`, `confirmepassword`, `created_at`, `updated_at`) VALUES
(4, 'Nsiri', 'web', 'nsiririm111@gmail.com', '$2y$12$/e15uLpAuhP3V1zZvf5HLugzNrSpC.76notS6X1A2hZuJCEdaWmKy', '$2y$12$Tabyhmd2W4ffMQVz6IeH3enwHBg/cuy5i0hsaeotP4pPcA1ke94xi', '2024-09-06 07:07:47', '2024-09-06 07:07:47');

-- --------------------------------------------------------

--
-- Structure de la table `contactdevs`
--

CREATE TABLE `contactdevs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dev_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `response` text DEFAULT NULL,
  `response_time` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dev_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tjm` int(11) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `french_level` varchar(255) DEFAULT NULL,
  `english_level` varchar(255) DEFAULT NULL,
  `ispublic` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cvs`
--

INSERT INTO `cvs` (`id`, `dev_id`, `title`, `description`, `tjm`, `niveau`, `french_level`, `english_level`, `ispublic`, `created_at`, `updated_at`) VALUES
(9, 11, ',x;v:', 'ndklx', 300, 'débutant', 'N1', 'N3', 1, '2024-09-06 07:19:25', '2024-09-06 07:19:25'),
(10, 12, 'cbcn,', 'sndlsmkmùx', 450, 'sénior', 'N3', 'N4', 1, '2024-09-06 07:43:55', '2024-09-06 07:43:55'),
(14, 16, 'cv1', 'voila mon cv', 500, 'expert', 'N5', 'N5', 1, '2024-09-16 11:15:44', '2024-09-16 11:15:44');

-- --------------------------------------------------------

--
-- Structure de la table `cv_skills`
--

CREATE TABLE `cv_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cv_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `nbrmonth` int(11) NOT NULL DEFAULT 0,
  `isprincipal` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cv_skills`
--

INSERT INTO `cv_skills` (`id`, `cv_id`, `skill_id`, `nbrmonth`, `isprincipal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, NULL, NULL),
(2, 1, 2, 3, 1, NULL, NULL),
(3, 2, 1, 3, 1, NULL, NULL),
(4, 2, 2, 5, 0, NULL, NULL),
(5, 3, 1, 3, 1, NULL, NULL),
(6, 4, 1, 3, 1, NULL, NULL),
(7, 4, 3, 3, 1, NULL, NULL),
(8, 5, 2, 3, 0, NULL, NULL),
(9, 6, 1, 3, 1, NULL, NULL),
(10, 7, 1, 3, 1, NULL, NULL),
(11, 8, 1, 3, 1, NULL, NULL),
(12, 9, 2, 5, 0, NULL, NULL),
(13, 10, 3, 5, 0, NULL, NULL),
(15, 11, 4, 2, 0, NULL, NULL),
(16, 9, 1, 6, 0, NULL, NULL),
(17, 12, 3, 5, 0, NULL, NULL),
(18, 12, 4, 3, 0, NULL, NULL),
(19, 13, 2, 4, 0, NULL, NULL),
(20, 10, 5, 6, 1, NULL, NULL),
(21, 10, 4, 5, 1, NULL, NULL),
(22, 14, 5, 5, 0, NULL, NULL),
(23, 14, 2, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `devs`
--

CREATE TABLE `devs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `presentation` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `comptedev_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `devs`
--

INSERT INTO `devs` (`id`, `name`, `firstname`, `presentation`, `email`, `phone`, `address`, `photo`, `comptedev_id`, `created_at`, `updated_at`) VALUES
(11, 'Nsiri', 'Rim', 'nslkw', 'nsiririm1@gmail.com', '21077024', 'jandouba', 'tax-alt_13794627_1725610663.png', 12, '2024-09-06 07:17:43', '2024-09-06 07:17:43'),
(12, 'Nsiri', 'marwa', 'jhslksm', 'nsiririm00@gmail.com', '21077024', 'jandouba', 'snapedit_1716078053290_1725612142.png', 13, '2024-09-06 07:42:22', '2024-09-06 10:38:21'),
(16, 'Nsiri', 'om zen', 'hello', 'nsiririm33@gmail.com', '21077024', 'jandouba', 'snapedit_1716077862285_1725953935.png', NULL, '2024-09-10 06:38:57', '2024-09-16 11:08:04');

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cv_id` bigint(20) UNSIGNED NOT NULL,
  `diplome` varchar(255) NOT NULL,
  `école` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `education`
--

INSERT INTO `education` (`id`, `cv_id`, `diplome`, `école`, `startdate`, `enddate`, `description`, `created_at`, `updated_at`) VALUES
(9, 9, 'licence', 'kef', '2024-09-07', '2025-02-14', 'sdnlxxvl', '2024-09-06 07:19:25', '2024-09-06 07:19:25'),
(10, 10, 'nclkxlc', 'isik', '2024-09-07', '2025-01-12', 'fffffffffffffffff', '2024-09-06 07:43:55', '2024-09-06 07:43:55'),
(14, 14, 'licence', 'isi', '2024-09-17', '2025-03-28', 'licence en sc info', '2024-09-16 11:15:51', '2024-09-16 11:15:51');

-- --------------------------------------------------------

--
-- Structure de la table `enregistests`
--

CREATE TABLE `enregistests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developerEmail` varchar(255) NOT NULL,
  `developerPassword` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `developer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `test_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `enregistests`
--

INSERT INTO `enregistests` (`id`, `developerEmail`, `developerPassword`, `created_at`, `updated_at`, `developer_id`, `test_id`) VALUES
(3, 'nsiririm111@gmail.com', '12374394', '2024-09-06 07:11:05', '2024-09-06 07:11:05', 11, 2),
(4, 'nsiririm1@gmail.com', '12374394', '2024-09-06 07:20:27', '2024-09-06 07:20:27', 12, 2),
(6, 'nsiririm00@gmail.com', '12374394', '2024-09-06 07:51:50', '2024-09-06 07:51:50', 13, 2),
(8, 'nsiririm1@gmail.com', '123456789', '2024-09-06 10:36:18', '2024-09-06 10:36:18', 12, 3),
(9, 'nsiririm2003@gmail.com', '12374394', '2024-09-06 11:03:40', '2024-09-06 11:03:40', 15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cv_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `entreprisename` varchar(255) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `cv_id`, `title`, `entreprisename`, `startdate`, `enddate`, `description`, `created_at`, `updated_at`) VALUES
(9, 9, 'member', 'google', '2025-03-22', '2026-01-23', ',s,dnlxxm', '2024-09-06 07:19:25', '2024-09-06 07:19:25'),
(10, 10, 'member', 'google', '2025-01-19', '2025-02-22', 'vvvvvvvvvvvcxd', '2024-09-06 07:43:55', '2024-09-06 07:43:55'),
(14, 14, 'member', 'GDSC', '2024-09-12', '2026-01-31', 'member a google', '2024-09-16 11:15:51', '2024-09-16 11:15:51');

-- --------------------------------------------------------

--
-- Structure de la table `experience_skill`
--

CREATE TABLE `experience_skill` (
  `exp_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2024_04_21_162458_drop_statut_column_from_tests_table', 1),
(230, '2014_10_12_000000_create_users_table', 2),
(231, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(232, '2019_08_19_000000_create_failed_jobs_table', 2),
(233, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(234, '2024_02_24_134109_create_comptedevs_table', 2),
(235, '2024_02_25_093616_create_devs_table', 2),
(236, '2024_02_25_094350_create_cvs_table', 2),
(237, '2024_02_25_094425_create_skills_table', 2),
(238, '2024_02_25_094443_create_education_table', 2),
(239, '2024_02_25_094505_create_experiences_table', 2),
(240, '2024_02_27_095545_create_cv_skills_table', 2),
(241, '2024_02_28_161816_create_experience_skill_table', 2),
(242, '2024_04_09_192922_create_contactdevs_table', 2),
(243, '2024_04_20_203615_create_compteentrepris_table', 2),
(244, '2024_04_21_124526_create_tests_table', 2),
(245, '2024_04_21_161108_add_updated_at_to_tests_table', 2),
(246, '2024_04_21_180744_create_accepted_tests_table', 2),
(247, '2024_04_21_185308_create_rejected_tests_table', 2),
(248, '2024_04_23_191847_add_fichier_pdf_to_accepted_tests_table', 2),
(249, '2024_04_24_091009_add_company_password_to_tests_table', 2),
(250, '2024_04_24_195549_add_company_password_to_accepted_tests_table', 2),
(251, '2024_05_03_134117_create_enregistest_table', 2),
(252, '2024_05_03_152218_add_developer_info_to_enregistest_table', 2),
(253, '2024_05_03_175413_add_test_id_to_enregistests_table', 2),
(254, '2024_05_03_222111_create_reponse_tests_table', 2),
(255, '2024_05_05_190506_add_id_test_and_id_devp_to_reponse_tests_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rejected_tests`
--

CREATE TABLE `rejected_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compteentrepris_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duree_estimee` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponse_tests`
--

CREATE TABLE `reponse_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reponse` text NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `id_test` bigint(20) UNSIGNED DEFAULT NULL,
  `compteentrepris_id` bigint(20) UNSIGNED NOT NULL,
  `note` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_devp` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reponse_tests`
--

INSERT INTO `reponse_tests` (`id`, `reponse`, `start_time`, `end_time`, `id_test`, `compteentrepris_id`, `note`, `created_at`, `updated_at`, `id_devp`) VALUES
(3, 'hdksmkfmdvlcv,vcnc', '2024-09-06 07:11:20', '2024-09-06 07:12:02', 2, 4, 14, '2024-09-06 07:11:20', '2024-09-06 11:28:56', 11),
(10, 'xnxlkxù', '2024-09-06 10:36:28', '2024-09-06 10:36:33', 3, 4, 12, '2024-09-06 10:36:28', '2024-09-06 10:39:18', 12);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'angular', 'public/photos/BcDKtXgVp66ZNBKkcjqheGDIDEnvzoiBzNNHymCq.png', '2024-05-10 13:46:29', '2024-05-10 13:46:29'),
(2, 'django', 'public/photos/9mC0hHTiI6rZNf1WFmeyl8Q12ecaPOMESYgX5a4v.png', '2024-05-10 13:46:42', '2024-05-10 13:46:42'),
(3, 'java', 'public/photos/24uozhdoNdsEunVh5BPqysrNFq8fcMqxJNi6ssxu.jpg', '2024-05-11 17:49:04', '2024-05-11 17:49:04'),
(4, 'python', 'public/photos/G1T7GqGDE8E5N9oCSHzyZ3YQMYUQFttDXXvzcZMl.png', '2024-09-06 06:58:53', '2024-09-06 06:58:53'),
(5, 'javascript', 'public/photos/fuuCcgz1u7x1raOjYcSY3harAYyPmK8Qqjnl0Zx2.png', '2024-09-06 11:31:42', '2024-09-06 11:31:42');

-- --------------------------------------------------------

--
-- Structure de la table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `compteentrepris_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duree_estimee` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  `fichier_pdf` blob DEFAULT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'en attente',
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'devfactory', 'devfactory@gmail.com', NULL, '$2y$12$MQTxS3/UgWMECjSXEjwmzOUYcDoa8ePFmjiZy2s9uqN7sVW5357xO', 'RH3ywd0mjXEwCtXsJ6Fnc3DGhvhVPFTgMwNcLIcfROXbTw1S3R62ZEqQtM5z', '2024-05-10 13:46:10', '2024-05-10 13:46:10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accepted_tests`
--
ALTER TABLE `accepted_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accepted_tests_compteentrepris_id_foreign` (`compteentrepris_id`);

--
-- Index pour la table `comptedevs`
--
ALTER TABLE `comptedevs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compteentrepris`
--
ALTER TABLE `compteentrepris`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contactdevs`
--
ALTER TABLE `contactdevs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contactdevs_email_unique` (`email`),
  ADD KEY `contactdevs_dev_id_foreign` (`dev_id`);

--
-- Index pour la table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cvs_dev_id_foreign` (`dev_id`);

--
-- Index pour la table `cv_skills`
--
ALTER TABLE `cv_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_skills_skill_id_foreign` (`skill_id`);

--
-- Index pour la table `devs`
--
ALTER TABLE `devs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devs_email_unique` (`email`),
  ADD KEY `devs_comptedev_id_foreign` (`comptedev_id`);

--
-- Index pour la table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_cv_id_foreign` (`cv_id`);

--
-- Index pour la table `enregistests`
--
ALTER TABLE `enregistests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enregistests_developer_id_foreign` (`developer_id`),
  ADD KEY `enregistests_test_id_foreign` (`test_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_cv_id_foreign` (`cv_id`);

--
-- Index pour la table `experience_skill`
--
ALTER TABLE `experience_skill`
  ADD PRIMARY KEY (`exp_id`,`skill_id`),
  ADD KEY `experience_skill_skill_id_foreign` (`skill_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `rejected_tests`
--
ALTER TABLE `rejected_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rejected_tests_compteentrepris_id_foreign` (`compteentrepris_id`);

--
-- Index pour la table `reponse_tests`
--
ALTER TABLE `reponse_tests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_compteentrepris_id_foreign` (`compteentrepris_id`);

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
-- AUTO_INCREMENT pour la table `accepted_tests`
--
ALTER TABLE `accepted_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comptedevs`
--
ALTER TABLE `comptedevs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `compteentrepris`
--
ALTER TABLE `compteentrepris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contactdevs`
--
ALTER TABLE `contactdevs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `cv_skills`
--
ALTER TABLE `cv_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `devs`
--
ALTER TABLE `devs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `enregistests`
--
ALTER TABLE `enregistests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rejected_tests`
--
ALTER TABLE `rejected_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponse_tests`
--
ALTER TABLE `reponse_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accepted_tests`
--
ALTER TABLE `accepted_tests`
  ADD CONSTRAINT `accepted_tests_compteentrepris_id_foreign` FOREIGN KEY (`compteentrepris_id`) REFERENCES `compteentrepris` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `contactdevs`
--
ALTER TABLE `contactdevs`
  ADD CONSTRAINT `contactdevs_dev_id_foreign` FOREIGN KEY (`dev_id`) REFERENCES `devs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `cvs_dev_id_foreign` FOREIGN KEY (`dev_id`) REFERENCES `devs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cv_skills`
--
ALTER TABLE `cv_skills`
  ADD CONSTRAINT `cv_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devs`
--
ALTER TABLE `devs`
  ADD CONSTRAINT `devs_comptedev_id_foreign` FOREIGN KEY (`comptedev_id`) REFERENCES `comptedevs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_cv_id_foreign` FOREIGN KEY (`cv_id`) REFERENCES `cvs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `enregistests`
--
ALTER TABLE `enregistests`
  ADD CONSTRAINT `enregistests_developer_id_foreign` FOREIGN KEY (`developer_id`) REFERENCES `comptedevs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enregistests_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `accepted_tests` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_cv_id_foreign` FOREIGN KEY (`cv_id`) REFERENCES `cvs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `experience_skill`
--
ALTER TABLE `experience_skill`
  ADD CONSTRAINT `experience_skill_exp_id_foreign` FOREIGN KEY (`exp_id`) REFERENCES `experiences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_skill_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `rejected_tests`
--
ALTER TABLE `rejected_tests`
  ADD CONSTRAINT `rejected_tests_compteentrepris_id_foreign` FOREIGN KEY (`compteentrepris_id`) REFERENCES `compteentrepris` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_compteentrepris_id_foreign` FOREIGN KEY (`compteentrepris_id`) REFERENCES `compteentrepris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
