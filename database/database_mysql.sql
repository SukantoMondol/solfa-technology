SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_content_tables', 1);

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Solfa Admin', 'admin@solfatechnologies.com', NULL, '$2y$12$zhrJRTwpQYvbdIxLSEOKUOJEckhJ9pbgc183Sx7c.uPGnXxwtt8Me', NULL, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Solfa Technologies', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'tagline', 'Smart IT Solutions for Digital Growth', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'hero_title', 'Reliable IT & Digital Solutions for Growing Businesses', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(4, 'hero_text', 'Solfa Technologies provides industry-specific technology and marketing strategies for businesses of all sizes. Our team offers complete support including web development, creative design, SEO, and performance marketing to help brands grow faster and smarter.', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(5, 'phone', '+880 1700 000000', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(6, 'email', 'hello@solfatechnologies.com', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(7, 'address', 'Dhaka, Bangladesh', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(8, 'facebook', 'https://facebook.com/solfatechnologies', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(9, 'linkedin', 'https://linkedin.com/company/solfatechnologies', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(10, 'twitter', 'https://x.com/solfatech', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(11, 'stat_projects', '250', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(12, 'stat_clients', '120', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(13, 'stat_years', '8', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(14, 'stat_team', '35', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(15, 'about_title', 'Solfa Technologies - Smart Solutions for Digital Growth', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(16, 'about_text', 'Solfa Technologies delivers reliable technology services, innovative software solutions, and expert support to help businesses scale, secure systems, and succeed in an evolving digital landscape.', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(17, 'vision', 'To become the most trusted technology partner for growing businesses, delivering solutions that create lasting digital impact.', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(18, 'mission', 'We combine creativity, engineering, and strategy to build digital products and campaigns that move businesses forward.', '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `title`, `slug`, `icon`, `excerpt`, `body`, `image`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-development', 'code', 'Custom websites and web applications built with modern frameworks, optimized for speed, security, and scale.', 'Custom websites and web applications built with modern frameworks, optimized for speed, security, and scale. Contact us to learn how this service can be tailored to your business goals.', NULL, 1, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'SEO Optimization', 'seo-optimization', 'search', 'Technical SEO, on-page optimization, and content strategies that increase visibility and drive organic traffic.', 'Technical SEO, on-page optimization, and content strategies that increase visibility and drive organic traffic. Contact us to learn how this service can be tailored to your business goals.', NULL, 2, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Graphics Design', 'graphics-design', 'pen', 'Brand identities, marketing creatives, and UI design that make your business memorable and professional.', 'Brand identities, marketing creatives, and UI design that make your business memorable and professional. Contact us to learn how this service can be tailored to your business goals.', NULL, 3, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(4, 'Digital Marketing', 'digital-marketing', 'chart', 'Performance-driven campaigns across search and social that turn advertising budgets into measurable growth.', 'Performance-driven campaigns across search and social that turn advertising budgets into measurable growth. Contact us to learn how this service can be tailored to your business goals.', NULL, 4, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(5, 'Social Media Strategy', 'social-media-strategy', 'share', 'Content calendars, community management, and paid social strategies that build engaged audiences.', 'Content calendars, community management, and paid social strategies that build engaged audiences. Contact us to learn how this service can be tailored to your business goals.', NULL, 5, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(6, 'Mobile App Development', 'mobile-app-development', 'mobile', 'Native and cross-platform mobile applications designed for performance and delightful user experience.', 'Native and cross-platform mobile applications designed for performance and delightful user experience. Contact us to learn how this service can be tailored to your business goals.', NULL, 6, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `client` varchar(255) DEFAULT NULL,
  `completed_at` date DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `projects` (`id`, `title`, `slug`, `category`, `client`, `completed_at`, `description`, `image`, `is_featured`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'E-commerce Platform for RetailPro', 'e-commerce-platform-for-retailpro', 'Web Development', 'RetailPro Ltd.', '2026-06-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 1, 1, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'SEO Campaign for MediCare Clinic', 'seo-campaign-for-medicare-clinic', 'SEO', 'MediCare Clinic', '2026-05-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 1, 2, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Brand Launch for UrbanWear', 'brand-launch-for-urbanwear', 'Digital Marketing', 'UrbanWear', '2026-04-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 1, 3, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(4, 'Corporate Website for BuildRight', 'corporate-website-for-buildright', 'Web Development', 'BuildRight Construction', '2026-03-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 0, 4, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(5, 'Local SEO for FreshMart Grocery', 'local-seo-for-freshmart-grocery', 'SEO', 'FreshMart', '2026-02-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 0, 5, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(6, 'Social Ads for FitLife Gym', 'social-ads-for-fitlife-gym', 'Digital Marketing', 'FitLife Gym', '2026-01-13', 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.', NULL, 0, 6, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `quote` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `testimonials` (`id`, `name`, `position`, `company`, `quote`, `avatar`, `rating`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Gilbert Chaves', 'CEO', 'RetailPro Ltd.', 'Solfa Technologies rebuilt our online store and our conversion rate doubled within three months. Professional, responsive, and genuinely invested in our success.', NULL, 5, 1, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'Alina Rahman', 'Founder', 'UrbanWear', 'From branding to launch campaigns, the Solfa team handled everything. We could not have asked for a smoother experience.', NULL, 5, 2, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Sakib Hossain', 'Director', 'MediCare Clinic', 'Our clinic now ranks on the first page for every key search term in our city. The SEO work paid for itself many times over.', NULL, 5, 3, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `faqs` (`id`, `question`, `answer`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'What services does Solfa Technologies offer?', 'We offer web development, SEO optimization, graphics design, digital marketing, social media strategy, and mobile app development - a complete digital growth stack under one roof.', 1, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'How long does a typical website project take?', 'A standard business website takes 3-6 weeks depending on scope. Larger platforms and custom applications are scoped individually with a clear timeline before we start.', 2, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Do you work with startups and small businesses?', 'Absolutely. We build industry-specific strategies for businesses of all sizes, with flexible packages designed to fit startup budgets.', 3, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(4, 'How do you measure the success of a campaign?', 'Every engagement starts with agreed KPIs - traffic, rankings, leads, or revenue. You receive transparent monthly reports showing exactly what was done and what it achieved.', 4, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(5, 'Do you provide support after the project launches?', 'Yes. All projects include a support period, and we offer ongoing maintenance and growth retainers so your product keeps improving after launch.', 5, 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `slug`, `excerpt`, `body`, `image`, `author`, `published_at`, `created_at`, `updated_at`) VALUES
(1, '5 Signs Your Business Website Needs a Redesign', '5-signs-your-business-website-needs-a-redesign', 'Slow load times, outdated design, and poor mobile experience quietly cost you customers. Here is how to know when it is time to rebuild.', 'Slow load times, outdated design, and poor mobile experience quietly cost you customers. Here is how to know when it is time to rebuild.\n\nAt Solfa Technologies we help businesses make these decisions every day. This article walks through the key considerations, common mistakes, and a simple checklist you can apply to your own business right away.\n\nIf you would like a free consultation on this topic, get in touch with our team - we are always happy to help.', NULL, 'Solfa Team', '2026-07-06 09:41:52', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'How Local SEO Helps Small Businesses Win Big', 'how-local-seo-helps-small-businesses-win-big', 'Local search is where buying decisions happen. Learn the fundamentals of ranking in your city and turning searches into store visits.', 'Local search is where buying decisions happen. Learn the fundamentals of ranking in your city and turning searches into store visits.\n\nAt Solfa Technologies we help businesses make these decisions every day. This article walks through the key considerations, common mistakes, and a simple checklist you can apply to your own business right away.\n\nIf you would like a free consultation on this topic, get in touch with our team - we are always happy to help.', NULL, 'Solfa Team', '2026-06-29 09:41:52', '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Choosing the Right Digital Marketing Channel in 2026', 'choosing-the-right-digital-marketing-channel-in-2026', 'Search, social, email, or video? A practical framework for deciding where your marketing budget will work hardest.', 'Search, social, email, or video? A practical framework for deciding where your marketing budget will work hardest.\n\nAt Solfa Technologies we help businesses make these decisions every day. This article walks through the key considerations, common mistakes, and a simple checklist you can apply to your own business right away.\n\nIf you would like a free consultation on this topic, get in touch with our team - we are always happy to help.', NULL, 'Solfa Team', '2026-06-22 09:41:52', '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `jobs_openings`
--

CREATE TABLE IF NOT EXISTS `jobs_openings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Full Time',
  `workplace_type` varchar(255) NOT NULL DEFAULT 'In office',
  `vacancies` int(11) NOT NULL DEFAULT 1,
  `salary` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jobs_openings_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `jobs_openings` (`id`, `title`, `slug`, `location`, `type`, `workplace_type`, `vacancies`, `salary`, `summary`, `description`, `deadline`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Digital Marketing Intern', 'digital-marketing-intern', 'Dhaka', 'Full Time', 'In office', 3, 'Negotiable', 'Assist in managing social media campaigns, content scheduling, and digital analytics.', 'Assist in managing social media campaigns, content scheduling, and digital analytics.\n\nRequirements:\n- Basic understanding of social media marketing\n- Good communication skills\n\nTo apply, send your CV to careers@solfatechnologies.com', '2026-07-31', 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(2, 'Senior Content Writer', 'senior-content-writer', 'Dhaka', 'Full Time', 'In office', 1, 'Negotiable', 'Craft compelling articles, website copy, and marketing campaign materials.', 'Craft compelling articles, website copy, and marketing campaign materials.\n\nRequirements:\n- 2+ years content writing experience\n\nTo apply, send your CV to careers@solfatechnologies.com', '2026-07-31', 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(3, 'Senior Creative Designer', 'senior-creative-designer', 'Dhaka', 'Full Time', 'In office', 1, 'Negotiable', 'Design brand identities, UI components, and social media creative assets.', 'Design brand identities, UI components, and social media creative assets.\n\nRequirements:\n- Strong portfolio in Photoshop, Illustrator, Figma\n\nTo apply, send your CV to careers@solfatechnologies.com', '2026-07-31', 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(4, 'Video Editor', 'video-editor', 'Dhaka', 'Full Time', 'In office', 1, 'Negotiable', 'Create engaging video reels, promotional ads, and motion graphics.', 'Create engaging video reels, promotional ads, and motion graphics.\n\nRequirements:\n- Proficiency in Premiere Pro and After Effects\n\nTo apply, send your CV to careers@solfatechnologies.com', '2026-07-31', 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52'),
(5, 'Senior Laravel Developer', 'senior-laravel-developer', 'Dhaka', 'Full Time', 'Hybrid', 2, 'Negotiable', 'Build and maintain web applications using Laravel, MySQL, and modern APIs.', 'Build and maintain web applications using Laravel, MySQL, and modern APIs.\n\nRequirements:\n- 3+ years Laravel experience\n\nTo apply, send your CV to careers@solfatechnologies.com', '2026-08-15', 1, '2026-07-13 09:41:52', '2026-07-13 09:41:52');

--
-- Table structure for table `contact_messages`
--

CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscribers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `job_applications`
--

CREATE TABLE IF NOT EXISTS `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `portfolio_link` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `meeting_date` date NOT NULL,
  `meeting_time` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'confirmed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
