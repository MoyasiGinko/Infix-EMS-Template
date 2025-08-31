-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2025 at 01:55 AM
-- Server version: 10.11.14-MariaDB
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlabxcom_zoldii_ems_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent_notification_time_setups`
--

CREATE TABLE `absent_notification_time_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_from` varchar(191) DEFAULT NULL,
  `time_to` varchar(191) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admit_cards`
--

CREATE TABLE `admit_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_record_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admit_card_settings`
--

CREATE TABLE `admit_card_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_photo` tinyint(1) DEFAULT NULL,
  `student_name` tinyint(1) DEFAULT NULL,
  `admission_no` tinyint(1) DEFAULT NULL,
  `class_section` tinyint(1) DEFAULT NULL,
  `exam_name` tinyint(1) DEFAULT NULL,
  `academic_year` tinyint(1) DEFAULT NULL,
  `principal_signature` tinyint(1) DEFAULT NULL,
  `class_teacher_signature` tinyint(1) DEFAULT NULL,
  `gaurdian_name` tinyint(1) DEFAULT NULL,
  `school_address` tinyint(1) DEFAULT NULL,
  `student_download` tinyint(1) DEFAULT NULL,
  `parent_download` tinyint(1) DEFAULT NULL,
  `student_notification` tinyint(1) DEFAULT NULL,
  `parent_notification` tinyint(1) DEFAULT NULL,
  `principal_signature_photo` varchar(191) DEFAULT NULL,
  `teacher_signature_photo` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `admit_layout` int(11) NOT NULL DEFAULT 1,
  `admit_sub_title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_exam_wise_positions`
--

CREATE TABLE `all_exam_wise_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `total_mark` double DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `admission_no` int(11) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `grade` varchar(191) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_incidents`
--

CREATE TABLE `assign_incidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) DEFAULT NULL,
  `incident_id` int(10) UNSIGNED NOT NULL,
  `record_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_incident_comments`
--

CREATE TABLE `assign_incident_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `incident_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assign_permissions`
--

CREATE TABLE `assign_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `menu_status` tinyint(1) NOT NULL DEFAULT 1,
  `saas_schools` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `behaviour_record_settings`
--

CREATE TABLE `behaviour_record_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_comment` int(11) DEFAULT NULL,
  `parent_comment` int(11) DEFAULT NULL,
  `student_view` int(11) DEFAULT NULL,
  `parent_view` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_block_users`
--

CREATE TABLE `chat_block_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block_by` bigint(20) UNSIGNED NOT NULL,
  `block_to` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` bigint(20) UNSIGNED DEFAULT NULL,
  `to_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for unread,1 for seen',
  `message_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0- text message, 1- image, 2- pdf, 3- doc, 4- voice',
  `file_name` text DEFAULT NULL,
  `original_file_name` text DEFAULT NULL,
  `initial` tinyint(1) NOT NULL DEFAULT 0,
  `reply` bigint(20) UNSIGNED DEFAULT NULL,
  `forward` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_to` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_groups`
--

CREATE TABLE `chat_groups` (
  `id` char(36) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `photo_url` varchar(191) DEFAULT NULL,
  `privacy` int(11) DEFAULT NULL,
  `read_only` tinyint(1) NOT NULL DEFAULT 0,
  `group_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 => Open (Anyone can send message), 2 => Close (Only Admin can send message) ',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_message_recipients`
--

CREATE TABLE `chat_group_message_recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(191) NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_message_removes`
--

CREATE TABLE `chat_group_message_removes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_message_recipient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_users`
--

CREATE TABLE `chat_group_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `removed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_invitations`
--

CREATE TABLE `chat_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0- pending, 1- connected, 2- blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_invitation_types`
--

CREATE TABLE `chat_invitation_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invitation_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('one-to-one','group','class-teacher') NOT NULL DEFAULT 'one-to-one',
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_statuses`
--

CREATE TABLE `chat_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0- inactive, 1- active, 2- away, 3- busy',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `check_classes`
--

CREATE TABLE `check_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `is_color` tinyint(1) DEFAULT 1,
  `status` tinyint(1) DEFAULT 1,
  `default_value` varchar(191) DEFAULT NULL,
  `lawn_green` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_theme`
--

CREATE TABLE `color_theme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(191) DEFAULT NULL,
  `theme_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `content_type_id` int(11) NOT NULL,
  `youtube_link` varchar(191) DEFAULT NULL,
  `upload_file` varchar(200) DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_share_lists`
--

CREATE TABLE `content_share_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `share_date` date DEFAULT NULL,
  `valid_upto` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `send_type` varchar(191) DEFAULT NULL COMMENT 'G, C, I, P',
  `content_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content_ids`)),
  `gr_role_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gr_role_ids`)),
  `ind_user_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`ind_user_ids`)),
  `class_id` int(11) DEFAULT NULL,
  `section_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`section_ids`)),
  `url` text DEFAULT NULL,
  `shared_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_types`
--

CREATE TABLE `content_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `continets`
--

CREATE TABLE `continets` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `native` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `continent` varchar(191) NOT NULL,
  `capital` varchar(191) NOT NULL,
  `currency` varchar(191) NOT NULL,
  `languages` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_result_settings`
--

CREATE TABLE `custom_result_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `exam_percentage` double DEFAULT NULL,
  `merit_list_setting` varchar(191) NOT NULL,
  `print_status` varchar(191) DEFAULT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `header_background` varchar(191) DEFAULT NULL,
  `body_background` varchar(191) DEFAULT NULL,
  `academic_year` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vertical_boarder` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_sms_settings`
--

CREATE TABLE `custom_sms_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `gateway_name` varchar(191) NOT NULL,
  `set_auth` varchar(191) DEFAULT NULL,
  `gateway_url` varchar(191) NOT NULL,
  `request_method` varchar(191) NOT NULL,
  `send_to_parameter_name` varchar(191) NOT NULL,
  `messege_to_parameter_name` varchar(191) NOT NULL,
  `param_key_1` varchar(191) DEFAULT NULL,
  `param_value_1` varchar(191) DEFAULT NULL,
  `param_key_2` varchar(191) DEFAULT NULL,
  `param_value_2` varchar(191) DEFAULT NULL,
  `param_key_3` varchar(191) DEFAULT NULL,
  `param_value_3` varchar(191) DEFAULT NULL,
  `param_key_4` varchar(191) DEFAULT NULL,
  `param_value_4` varchar(191) DEFAULT NULL,
  `param_key_5` varchar(191) DEFAULT NULL,
  `param_value_5` varchar(191) DEFAULT NULL,
  `param_key_6` varchar(191) DEFAULT NULL,
  `param_value_6` varchar(191) DEFAULT NULL,
  `param_key_7` varchar(191) DEFAULT NULL,
  `param_value_7` varchar(191) DEFAULT NULL,
  `param_key_8` varchar(191) DEFAULT NULL,
  `param_value_8` varchar(191) DEFAULT NULL,
  `school_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `default_menus`
--

CREATE TABLE `default_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `module` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL,
  `lang_name` varchar(191) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_saas` tinyint(4) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_alumni` tinyint(4) DEFAULT NULL,
  `menu_status` tinyint(4) DEFAULT NULL,
  `permission_section` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `default_position` int(11) DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alternate_module` varchar(191) DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ignore` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_fees_installments`
--

CREATE TABLE `direct_fees_installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `fees_master_id` int(11) NOT NULL,
  `percentange` double NOT NULL,
  `amount` double NOT NULL,
  `due_date` date NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_fees_installment_assigns`
--

CREATE TABLE `direct_fees_installment_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_installment_id` int(11) NOT NULL,
  `fees_master_ids` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `slip` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `assign_ids` text DEFAULT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `discount_amount` float DEFAULT 0,
  `fees_discount_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `collected_by` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_fees_reminders`
--

CREATE TABLE `direct_fees_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `due_date_before` int(11) NOT NULL,
  `notification_types` varchar(191) NOT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direct_fees_settings`
--

CREATE TABLE `direct_fees_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_installment` tinyint(1) NOT NULL DEFAULT 0,
  `fees_reminder` tinyint(1) NOT NULL DEFAULT 0,
  `reminder_before` int(11) NOT NULL DEFAULT 5,
  `no_installment` int(11) NOT NULL DEFAULT 0,
  `due_date_from_sem` int(11) NOT NULL DEFAULT 10,
  `end_day` int(11) DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dire_fees_installment_child_payments`
--

CREATE TABLE `dire_fees_installment_child_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `direct_fees_installment_assign_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL DEFAULT 1,
  `amount` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `balance_amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `slip` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `discount_amount` float DEFAULT 0,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `due_fees_login_prevents`
--

CREATE TABLE `due_fees_login_prevents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_merit_positions`
--

CREATE TABLE `exam_merit_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `exam_term_id` int(11) DEFAULT NULL,
  `total_mark` double NOT NULL,
  `position` int(11) DEFAULT NULL,
  `admission_no` int(11) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `grade` varchar(191) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_step_skips`
--

CREATE TABLE `exam_step_skips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_carry_forward_logs`
--

CREATE TABLE `fees_carry_forward_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_record_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `amount` double NOT NULL,
  `amount_type` varchar(191) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  `date` timestamp NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_carry_forward_settings`
--

CREATE TABLE `fees_carry_forward_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `fees_due_days` int(11) NOT NULL,
  `payment_gateway` varchar(191) NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_installment_credits`
--

CREATE TABLE `fees_installment_credits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_record_id` int(11) NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_invoices`
--

CREATE TABLE `fees_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(191) DEFAULT NULL,
  `start_form` int(11) DEFAULT NULL,
  `un_academic_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_invoice_settings`
--

CREATE TABLE `fees_invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_th` int(11) NOT NULL DEFAULT 2,
  `invoice_type` varchar(191) NOT NULL DEFAULT 'invoice',
  `student_name` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_section` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_class` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_roll` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_group` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_admission_no` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `footer_1` varchar(255) DEFAULT 'Parent/Student',
  `footer_2` varchar(255) NOT NULL DEFAULT 'Casier',
  `footer_3` varchar(255) NOT NULL DEFAULT 'Officer',
  `signature_p` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `signature_c` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `signature_o` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `c_signature_p` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `c_signature_c` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `c_signature_o` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `copy_s` varchar(255) DEFAULT 'Parent/Student',
  `copy_o` varchar(255) NOT NULL DEFAULT 'Office',
  `copy_c` varchar(255) NOT NULL DEFAULT 'Casier',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `copy_write_msg` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_groups`
--

CREATE TABLE `fm_fees_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_invoices`
--

CREATE TABLE `fm_fees_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(191) NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `payment_status` varchar(191) DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT 'fees' COMMENT 'fees, lms',
  `school_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_invoice_chields`
--

CREATE TABLE `fm_fees_invoice_chields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fees_type` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `weaver` double DEFAULT NULL,
  `fine` double DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_invoice_settings`
--

CREATE TABLE `fm_fees_invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_positions` text DEFAULT NULL,
  `uniq_id_start` varchar(191) DEFAULT NULL,
  `prefix` varchar(191) DEFAULT NULL,
  `class_limit` int(11) DEFAULT NULL,
  `section_limit` int(11) DEFAULT NULL,
  `admission_limit` int(11) DEFAULT NULL,
  `weaver` varchar(191) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_transactions`
--

CREATE TABLE `fm_fees_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_method` varchar(80) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `add_wallet_money` double DEFAULT NULL,
  `payment_note` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `paid_status` varchar(30) NOT NULL,
  `fees_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_paid_amount` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_transaction_chields`
--

CREATE TABLE `fm_fees_transaction_chields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_type` varchar(191) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `service_charge` double DEFAULT NULL,
  `fine` double DEFAULT NULL,
  `weaver` double DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `fees_transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_types`
--

CREATE TABLE `fm_fees_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fees_group_id` int(10) UNSIGNED DEFAULT 1,
  `type` varchar(20) NOT NULL DEFAULT 'fees' COMMENT 'fees, lms',
  `course_id` int(11) DEFAULT NULL COMMENT 'Only For Lms',
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fm_fees_weavers`
--

CREATE TABLE `fm_fees_weavers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fees_type` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `weaver` double DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `academic_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_exam_results`
--

CREATE TABLE `frontend_exam_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_title` varchar(191) DEFAULT NULL,
  `main_description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `main_image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_academic_calendars`
--

CREATE TABLE `front_academic_calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `publish_date` varchar(191) DEFAULT NULL,
  `calendar_file` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_class_routines`
--

CREATE TABLE `front_class_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `publish_date` varchar(191) DEFAULT NULL,
  `result_file` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_exam_routines`
--

CREATE TABLE `front_exam_routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `publish_date` varchar(191) DEFAULT NULL,
  `result_file` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_results`
--

CREATE TABLE `front_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `publish_date` varchar(191) DEFAULT NULL,
  `result_file` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graduates`
--

CREATE TABLE `graduates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `un_department_id` int(11) DEFAULT NULL,
  `un_faculty_id` int(11) DEFAULT NULL,
  `graduation_date` int(11) DEFAULT NULL,
  `un_session_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) NOT NULL,
  `link` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

CREATE TABLE `incidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `point` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infixedu__pages`
--

CREATE TABLE `infixedu__pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `settings` longtext DEFAULT NULL,
  `home_page` tinyint(1) DEFAULT 0,
  `is_default` tinyint(1) DEFAULT 0,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `published_by` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infixedu__settings`
--

CREATE TABLE `infixedu__settings` (
  `section` varchar(191) NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infix_module_infos`
--

CREATE TABLE `infix_module_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `module_name` varchar(191) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `is_saas` tinyint(4) NOT NULL DEFAULT 0,
  `route` varchar(191) DEFAULT NULL,
  `parent_route` varchar(191) DEFAULT NULL,
  `lang_name` varchar(191) DEFAULT NULL,
  `icon_class` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 for module, 2 for module link, 3 for module links crud',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infix_module_managers`
--

CREATE TABLE `infix_module_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `version` varchar(200) DEFAULT NULL,
  `update_url` varchar(200) DEFAULT NULL,
  `purchase_code` varchar(200) DEFAULT NULL,
  `checksum` varchar(200) DEFAULT NULL,
  `installed_domain` varchar(200) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `addon_url` varchar(191) DEFAULT NULL,
  `activated_date` date DEFAULT NULL,
  `lang_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infix_module_student_parent_infos`
--

CREATE TABLE `infix_module_student_parent_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL COMMENT 'url',
  `lang_name` varchar(191) DEFAULT NULL,
  `icon_class` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `type` int(11) DEFAULT NULL COMMENT '1 for module, 2 for module link, 3 for module options',
  `user_type` int(11) DEFAULT NULL COMMENT '1 for student, 2 for parent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_section` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infix_permission_assigns`
--

CREATE TABLE `infix_permission_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL COMMENT ' module id, module link id, module link options id',
  `module_info` varchar(191) DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `saas_schools` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infix_roles`
--

CREATE TABLE `infix_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'System',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` varchar(191) DEFAULT '1',
  `updated_by` varchar(191) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `is_saas` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_settings`
--

CREATE TABLE `invoice_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `per_th` int(11) NOT NULL DEFAULT 2,
  `prefix` varchar(191) DEFAULT NULL,
  `student_name` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_section` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_class` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_roll` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_group` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `student_admission_no` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `footer_1` varchar(255) DEFAULT 'Parent/Student',
  `footer_2` varchar(255) NOT NULL DEFAULT 'Casier',
  `footer_3` varchar(255) NOT NULL DEFAULT 'Officer',
  `signature_p` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `signature_c` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `signature_o` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `c_signature_p` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `c_signature_c` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `c_signature_o` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `copy_s` varchar(255) DEFAULT 'Parent/Student',
  `copy_o` varchar(255) NOT NULL DEFAULT 'Office',
  `copy_c` varchar(255) NOT NULL DEFAULT 'Casier',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `copy_write_msg` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `native` varchar(191) NOT NULL,
  `rtl` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_planners`
--

CREATE TABLE `lesson_planners` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` int(11) DEFAULT NULL COMMENT '1=sat,2=sun,7=fri',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `lesson_detail_id` int(11) NOT NULL,
  `topic_detail_id` int(11) DEFAULT NULL,
  `sub_topic` varchar(191) DEFAULT NULL,
  `lecture_youube_link` text DEFAULT NULL,
  `lecture_vedio` text DEFAULT NULL,
  `attachment` text DEFAULT NULL,
  `teaching_method` text DEFAULT NULL,
  `general_objectives` text DEFAULT NULL,
  `previous_knowlege` text DEFAULT NULL,
  `comp_question` text DEFAULT NULL,
  `zoom_setup` text DEFAULT NULL,
  `presentation` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `lesson_date` date NOT NULL,
  `competed_date` date DEFAULT NULL,
  `completed_status` varchar(191) DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `class_period_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `routine_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plan_topics`
--

CREATE TABLE `lesson_plan_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_topic_title` varchar(191) NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `lesson_planner_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `library_subjects`
--

CREATE TABLE `library_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `sb_category_id` varchar(255) DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `subject_type` varchar(191) NOT NULL DEFAULT 'T',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_settings`
--

CREATE TABLE `maintenance_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT 'We will be back soon!',
  `sub_title` varchar(191) DEFAULT 'Sorry for the inconvenience but we are performing some maintenance at the moment.',
  `image` varchar(191) DEFAULT NULL,
  `applicable_for` varchar(191) DEFAULT NULL,
  `maintenance_mode` tinyint(1) DEFAULT 0,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(191) NOT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tags` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(191) NOT NULL,
  `notifiable_type` varchar(191) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `scopes` varchar(100) DEFAULT NULL,
  `revoked` varchar(100) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `provider` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `secret` varchar(200) NOT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_token_id` bigint(20) DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_student_answer_markings`
--

CREATE TABLE `online_exam_student_answer_markings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `online_exam_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_answer` varchar(191) DEFAULT NULL,
  `answer_status` varchar(191) DEFAULT NULL,
  `obtain_marks` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `marked_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_payments`
--

CREATE TABLE `payroll_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sm_hr_payroll_generate_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_mode` varchar(191) DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(191) DEFAULT NULL,
  `sidebar_menu` varchar(191) DEFAULT NULL,
  `old_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT 1,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL,
  `parent_route` varchar(191) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1 = menu, 2 = submenu, 3 = action',
  `lang_name` varchar(191) DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `svg` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `menu_status` tinyint(4) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 1,
  `is_saas` tinyint(4) NOT NULL DEFAULT 0,
  `relate_to_child` tinyint(4) DEFAULT 0,
  `is_menu` tinyint(4) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0,
  `is_teacher` tinyint(4) DEFAULT 0,
  `is_student` tinyint(4) DEFAULT 0,
  `is_parent` tinyint(4) DEFAULT 0,
  `is_alumni` tinyint(4) DEFAULT 0,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `permission_section` tinyint(4) DEFAULT NULL,
  `alternate_module` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `custom_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_sections`
--

CREATE TABLE `permission_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 9999,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `saas` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT 0,
  `availability` varchar(191) NOT NULL DEFAULT 'both',
  `show_admin_panel` tinyint(1) NOT NULL DEFAULT 0,
  `show_website` tinyint(1) NOT NULL DEFAULT 1,
  `showing_page` varchar(191) NOT NULL DEFAULT 'all',
  `applicable_for` varchar(191) DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `short_code` varchar(50) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pulse_aggregates`
--

CREATE TABLE `pulse_aggregates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bucket` int(10) UNSIGNED NOT NULL,
  `period` mediumint(8) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `aggregate` varchar(191) NOT NULL,
  `value` decimal(20,2) NOT NULL,
  `count` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pulse_entries`
--

CREATE TABLE `pulse_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pulse_values`
--

CREATE TABLE `pulse_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'System',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` varchar(191) DEFAULT '1',
  `updated_by` varchar(191) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_modules`
--

CREATE TABLE `school_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modules` longtext DEFAULT NULL,
  `menus` longtext DEFAULT NULL,
  `module_name` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_plans`
--

CREATE TABLE `seat_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_record_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat_plan_settings`
--

CREATE TABLE `seat_plan_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` tinyint(1) DEFAULT NULL,
  `student_photo` tinyint(1) DEFAULT NULL,
  `student_name` tinyint(1) DEFAULT NULL,
  `admission_no` tinyint(1) DEFAULT NULL,
  `class_section` tinyint(1) DEFAULT NULL,
  `exam_name` tinyint(1) DEFAULT NULL,
  `roll_no` tinyint(1) DEFAULT NULL,
  `academic_year` tinyint(1) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `start_time` varchar(191) NOT NULL,
  `end_time` varchar(191) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `school_id` int(11) DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sidebars`
--

CREATE TABLE `sidebars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT 1,
  `parent` int(11) DEFAULT NULL,
  `parent_route` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '1=paren, 2=child, 3=sub-child',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `is_saas` tinyint(4) NOT NULL DEFAULT 0,
  `ignore` int(11) NOT NULL DEFAULT 0,
  `role_id` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_templates`
--

CREATE TABLE `sms_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL COMMENT 'email, sms',
  `purpose` text NOT NULL,
  `subject` text NOT NULL,
  `body` longtext NOT NULL,
  `module` varchar(191) NOT NULL,
  `variable` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Enable & Disable',
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_about_pages`
--

CREATE TABLE `sm_about_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_title` varchar(191) DEFAULT NULL,
  `main_description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `main_image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_academic_years`
--

CREATE TABLE `sm_academic_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `copy_with_academic_year` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` varchar(191) DEFAULT NULL,
  `updated_at` varchar(191) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_add_expenses`
--

CREATE TABLE `sm_add_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_receive_id` int(11) DEFAULT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expense_head_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `payroll_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_add_incomes`
--

CREATE TABLE `sm_add_incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `item_sell_id` int(11) DEFAULT NULL,
  `fees_collection_id` int(11) DEFAULT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `income_head_id` int(10) UNSIGNED DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_method_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `installment_payment_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_add_ons`
--

CREATE TABLE `sm_add_ons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_admission_queries`
--

CREATE TABLE `sm_admission_queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `next_follow_up_date` date DEFAULT NULL,
  `assigned` varchar(191) DEFAULT NULL,
  `reference` int(11) DEFAULT NULL,
  `source` int(11) DEFAULT NULL,
  `no_of_child` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_admission_query_followups`
--

CREATE TABLE `sm_admission_query_followups` (
  `id` int(10) UNSIGNED NOT NULL,
  `response` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admission_query_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_amount_transfers`
--

CREATE TABLE `sm_amount_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `purpose` varchar(191) DEFAULT NULL,
  `from_payment_method` int(11) DEFAULT NULL,
  `from_bank_name` int(11) DEFAULT NULL,
  `to_payment_method` int(11) DEFAULT NULL,
  `to_bank_name` int(11) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `active_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_assign_class_teachers`
--

CREATE TABLE `sm_assign_class_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_assign_subjects`
--

CREATE TABLE `sm_assign_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_assign_vehicles`
--

CREATE TABLE `sm_assign_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vehicle_id` int(10) UNSIGNED DEFAULT NULL,
  `route_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_background_settings`
--

CREATE TABLE `sm_background_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT 0,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_backups`
--

CREATE TABLE `sm_backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `source_link` varchar(255) DEFAULT NULL,
  `file_type` tinyint(4) DEFAULT NULL COMMENT '0=Database, 1=File, 2=Image',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `lang_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_bank_accounts`
--

CREATE TABLE `sm_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `account_name` varchar(191) DEFAULT NULL,
  `account_number` varchar(191) DEFAULT NULL,
  `account_type` varchar(191) DEFAULT NULL,
  `opening_balance` double NOT NULL DEFAULT 0,
  `current_balance` double NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_bank_payment_slips`
--

CREATE TABLE `sm_bank_payment_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` float DEFAULT NULL,
  `slip` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `approve_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 approve',
  `payment_mode` varchar(191) NOT NULL COMMENT 'Bk= bank, Cq=Cheque',
  `reason` text DEFAULT NULL,
  `fees_discount_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `assign_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `child_payment_id` int(11) DEFAULT NULL,
  `installment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_bank_statements`
--

CREATE TABLE `sm_bank_statements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `after_balance` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL COMMENT '1 for Income 0 for Expense',
  `payment_method` int(10) UNSIGNED DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `item_receive_id` int(11) DEFAULT NULL,
  `item_receive_bank_statement_id` int(11) DEFAULT NULL,
  `item_sell_bank_statement_id` int(11) DEFAULT NULL,
  `item_sell_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_payment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payroll_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_base_groups`
--

CREATE TABLE `sm_base_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_base_setups`
--

CREATE TABLE `sm_base_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `base_setup_name` varchar(255) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `base_group_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_books`
--

CREATE TABLE `sm_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_title` varchar(200) DEFAULT NULL,
  `book_number` varchar(200) DEFAULT NULL,
  `isbn_no` varchar(200) DEFAULT NULL,
  `publisher_name` varchar(200) DEFAULT NULL,
  `author_name` varchar(200) DEFAULT NULL,
  `rack_number` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `book_price` int(11) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_subject_id` int(10) UNSIGNED DEFAULT NULL,
  `book_category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_book_categories`
--

CREATE TABLE `sm_book_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_book_issues`
--

CREATE TABLE `sm_book_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `given_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `issue_status` varchar(191) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_calendar_settings`
--

CREATE TABLE `sm_calendar_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `font_color` varchar(191) NOT NULL,
  `bg_color` varchar(191) NOT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_chart_of_accounts`
--

CREATE TABLE `sm_chart_of_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `head` varchar(200) DEFAULT NULL,
  `type` varchar(1) DEFAULT NULL COMMENT 'E = expense, I = income',
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_classes`
--

CREATE TABLE `sm_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(15) NOT NULL,
  `pass_mark` double DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_exam_routine_pages`
--

CREATE TABLE `sm_class_exam_routine_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_title` varchar(191) DEFAULT NULL,
  `main_description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `main_image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `class_routine` varchar(191) NOT NULL DEFAULT 'show',
  `exam_routine` varchar(191) NOT NULL DEFAULT 'show',
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_optional_subject`
--

CREATE TABLE `sm_class_optional_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `gpa_above` double NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_rooms`
--

CREATE TABLE `sm_class_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_routines`
--

CREATE TABLE `sm_class_routines` (
  `id` int(10) UNSIGNED NOT NULL,
  `monday` varchar(200) DEFAULT NULL,
  `monday_start_from` varchar(200) DEFAULT NULL,
  `monday_end_to` varchar(200) DEFAULT NULL,
  `monday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `tuesday` varchar(200) DEFAULT NULL,
  `tuesday_start_from` varchar(200) DEFAULT NULL,
  `tuesday_end_to` varchar(200) DEFAULT NULL,
  `tuesday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `wednesday` varchar(200) DEFAULT NULL,
  `wednesday_start_from` varchar(200) DEFAULT NULL,
  `wednesday_end_to` varchar(200) DEFAULT NULL,
  `wednesday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `thursday` varchar(200) DEFAULT NULL,
  `thursday_start_from` varchar(200) DEFAULT NULL,
  `thursday_end_to` varchar(200) DEFAULT NULL,
  `thursday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `friday` varchar(200) DEFAULT NULL,
  `friday_start_from` varchar(200) DEFAULT NULL,
  `friday_end_to` varchar(200) DEFAULT NULL,
  `friday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `saturday` varchar(200) DEFAULT NULL,
  `saturday_start_from` varchar(200) DEFAULT NULL,
  `saturday_end_to` varchar(200) DEFAULT NULL,
  `saturday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `sunday` varchar(200) DEFAULT NULL,
  `sunday_start_from` varchar(200) DEFAULT NULL,
  `sunday_end_to` varchar(200) DEFAULT NULL,
  `sunday_room_id` int(10) UNSIGNED DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_routine_updates`
--

CREATE TABLE `sm_class_routine_updates` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` int(11) DEFAULT NULL COMMENT '1=sat,2=sun,7=fri',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `is_break` tinyint(4) DEFAULT NULL COMMENT '1 = tiffin time, 0 = class',
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `class_period_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_sections`
--

CREATE TABLE `sm_class_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_teachers`
--

CREATE TABLE `sm_class_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `assign_class_teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_class_times`
--

CREATE TABLE `sm_class_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('exam','class') DEFAULT NULL,
  `period` varchar(191) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `is_break` tinyint(4) DEFAULT NULL COMMENT '1 = tiffin time, 0 = class',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_complaints`
--

CREATE TABLE `sm_complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `complaint_by` varchar(191) DEFAULT NULL,
  `complaint_type` tinyint(4) DEFAULT NULL,
  `complaint_source` tinyint(4) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `action_taken` varchar(191) DEFAULT NULL,
  `assigned` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_contact_messages`
--

CREATE TABLE `sm_contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT 0,
  `reply_status` tinyint(4) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_contact_pages`
--

CREATE TABLE `sm_contact_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `address_text` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `phone_text` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `email_text` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `zoom_level` int(11) DEFAULT NULL,
  `google_map_address` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_content_types`
--

CREATE TABLE `sm_content_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_countries`
--

CREATE TABLE `sm_countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `native` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `continent` varchar(255) DEFAULT NULL,
  `capital` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_courses`
--

CREATE TABLE `sm_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `overview` text DEFAULT NULL,
  `outline` text DEFAULT NULL,
  `prerequisites` text DEFAULT NULL,
  `resources` text DEFAULT NULL,
  `stats` text DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_course_categories`
--

CREATE TABLE `sm_course_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) DEFAULT NULL,
  `category_image` text DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_course_pages`
--

CREATE TABLE `sm_course_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_title` varchar(191) DEFAULT NULL,
  `main_description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `main_image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_currencies`
--

CREATE TABLE `sm_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `symbol` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency_type` varchar(2) DEFAULT '2',
  `currency_position` varchar(2) DEFAULT '2',
  `space` tinyint(1) DEFAULT 1,
  `decimal_digit` int(11) DEFAULT NULL,
  `decimal_separator` varchar(1) DEFAULT NULL,
  `thousand_separator` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_custom_fields`
--

CREATE TABLE `sm_custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_name` varchar(191) NOT NULL,
  `label` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `min_max_length` varchar(191) DEFAULT NULL,
  `min_max_value` varchar(191) DEFAULT NULL,
  `name_value` varchar(191) DEFAULT NULL,
  `width` varchar(191) DEFAULT NULL,
  `required` tinyint(4) DEFAULT NULL,
  `school_id` int(11) DEFAULT 1,
  `academic_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_custom_links`
--

CREATE TABLE `sm_custom_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `title4` varchar(255) DEFAULT NULL,
  `link_label1` varchar(255) DEFAULT NULL,
  `link_href1` varchar(255) DEFAULT NULL,
  `link_label2` varchar(255) DEFAULT NULL,
  `link_href2` varchar(255) DEFAULT NULL,
  `link_label3` varchar(255) DEFAULT NULL,
  `link_href3` varchar(255) DEFAULT NULL,
  `link_label4` varchar(255) DEFAULT NULL,
  `link_href4` varchar(255) DEFAULT NULL,
  `link_label5` varchar(255) DEFAULT NULL,
  `link_href5` varchar(255) DEFAULT NULL,
  `link_label6` varchar(255) DEFAULT NULL,
  `link_href6` varchar(255) DEFAULT NULL,
  `link_label7` varchar(255) DEFAULT NULL,
  `link_href7` varchar(255) DEFAULT NULL,
  `link_label8` varchar(255) DEFAULT NULL,
  `link_href8` varchar(255) DEFAULT NULL,
  `link_label9` varchar(255) DEFAULT NULL,
  `link_href9` varchar(255) DEFAULT NULL,
  `link_label10` varchar(255) DEFAULT NULL,
  `link_href10` varchar(255) DEFAULT NULL,
  `link_label11` varchar(255) DEFAULT NULL,
  `link_href11` varchar(255) DEFAULT NULL,
  `link_label12` varchar(255) DEFAULT NULL,
  `link_href12` varchar(255) DEFAULT NULL,
  `link_label13` varchar(255) DEFAULT NULL,
  `link_href13` varchar(255) DEFAULT NULL,
  `link_label14` varchar(255) DEFAULT NULL,
  `link_href14` varchar(255) DEFAULT NULL,
  `link_label15` varchar(255) DEFAULT NULL,
  `link_href15` varchar(255) DEFAULT NULL,
  `link_label16` varchar(255) DEFAULT NULL,
  `link_href16` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `dribble_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `behance_url` varchar(255) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_custom_temporary_results`
--

CREATE TABLE `sm_custom_temporary_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admission_no` varchar(200) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `term1` varchar(200) DEFAULT NULL,
  `gpa1` varchar(200) DEFAULT NULL,
  `term2` varchar(200) DEFAULT NULL,
  `gpa2` varchar(200) DEFAULT NULL,
  `term3` varchar(200) DEFAULT NULL,
  `gpa3` varchar(200) DEFAULT NULL,
  `final_result` varchar(200) DEFAULT NULL,
  `final_grade` varchar(200) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_dashboard_settings`
--

CREATE TABLE `sm_dashboard_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `dashboard_sec_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_date_formats`
--

CREATE TABLE `sm_date_formats` (
  `id` int(10) UNSIGNED NOT NULL,
  `format` varchar(191) DEFAULT NULL,
  `normal_view` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_designations`
--

CREATE TABLE `sm_designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `is_saas` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_donors`
--

CREATE TABLE `sm_donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `age` varchar(200) DEFAULT NULL,
  `current_address` varchar(500) DEFAULT NULL,
  `permanent_address` varchar(500) DEFAULT NULL,
  `show_public` tinyint(4) NOT NULL DEFAULT 1,
  `custom_field` text DEFAULT NULL,
  `custom_field_form_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bloodgroup_id` int(10) UNSIGNED DEFAULT NULL,
  `religion_id` int(10) UNSIGNED DEFAULT NULL,
  `gender_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_dormitory_lists`
--

CREATE TABLE `sm_dormitory_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `dormitory_name` varchar(200) NOT NULL,
  `type` varchar(191) NOT NULL COMMENT 'B=Boys, G=Girls',
  `address` varchar(191) DEFAULT NULL,
  `intake` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_email_settings`
--

CREATE TABLE `sm_email_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_engine_type` varchar(191) DEFAULT NULL,
  `from_name` varchar(191) DEFAULT NULL,
  `from_email` varchar(191) DEFAULT NULL,
  `mail_driver` varchar(191) DEFAULT NULL,
  `mail_host` varchar(191) DEFAULT NULL,
  `mail_port` varchar(191) DEFAULT NULL,
  `mail_username` varchar(191) DEFAULT NULL,
  `mail_password` varchar(191) DEFAULT NULL,
  `mail_encryption` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_email_sms_logs`
--

CREATE TABLE `sm_email_sms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `send_date` date DEFAULT NULL,
  `send_through` varchar(191) DEFAULT NULL,
  `send_to` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_events`
--

CREATE TABLE `sm_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(200) DEFAULT NULL,
  `for_whom` varchar(200) DEFAULT NULL COMMENT 'teacher, student, parents, all',
  `role_ids` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `event_location` varchar(200) DEFAULT NULL,
  `event_des` longtext NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `uplad_image_file` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exams`
--

CREATE TABLE `sm_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT 0,
  `exam_mark` double DEFAULT NULL,
  `pass_mark` double DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_type_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_attendances`
--

CREATE TABLE `sm_exam_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_attendance_children`
--

CREATE TABLE `sm_exam_attendance_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendance_type` varchar(2) DEFAULT NULL COMMENT 'P = present A = Absent',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_attendance_id` int(10) UNSIGNED DEFAULT NULL,
  `student_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_marks_registers`
--

CREATE TABLE `sm_exam_marks_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `obtained_marks` varchar(200) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_schedules`
--

CREATE TABLE `sm_exam_schedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_period_id` int(10) UNSIGNED DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_term_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_schedule_subjects`
--

CREATE TABLE `sm_exam_schedule_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `room` varchar(200) DEFAULT NULL,
  `full_mark` int(11) DEFAULT NULL,
  `pass_mark` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_schedule_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_settings`
--

CREATE TABLE `sm_exam_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_type` int(11) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_setups`
--

CREATE TABLE `sm_exam_setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_title` varchar(255) DEFAULT NULL,
  `exam_mark` double DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_term_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_signatures`
--

CREATE TABLE `sm_exam_signatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `signature` text NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_exam_types`
--

CREATE TABLE `sm_exam_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) NOT NULL,
  `is_average` tinyint(4) NOT NULL DEFAULT 0,
  `percentage` double DEFAULT NULL,
  `average_mark` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(10) UNSIGNED DEFAULT 0,
  `percantage` double DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_expense_heads`
--

CREATE TABLE `sm_expense_heads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_expert_teachers`
--

CREATE TABLE `sm_expert_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` tinyint(4) NOT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_assigns`
--

CREATE TABLE `sm_fees_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fees_amount` float DEFAULT NULL,
  `applied_discount` float DEFAULT NULL,
  `fees_master_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_discount_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_assign_discounts`
--

CREATE TABLE `sm_fees_assign_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_discount_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_group_id` int(10) UNSIGNED DEFAULT NULL,
  `applied_amount` double DEFAULT 0,
  `unapplied_amount` double DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_carry_forwards`
--

CREATE TABLE `sm_fees_carry_forwards` (
  `id` int(10) UNSIGNED NOT NULL,
  `balance` double NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `notes` varchar(191) NOT NULL DEFAULT 'Fees Carry Forward',
  `balance_type` varchar(191) DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_discounts`
--

CREATE TABLE `sm_fees_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `type` enum('once','year') DEFAULT NULL COMMENT 'once for one time, year for all months',
  `amount` float DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_groups`
--

CREATE TABLE `sm_fees_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `un_semester_label_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_masters`
--

CREATE TABLE `sm_fees_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fees_group_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `un_semester_label_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_payments`
--

CREATE TABLE `sm_fees_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `discount_month` tinyint(4) DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `fine` double DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `slip` varchar(191) DEFAULT NULL,
  `fine_title` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assign_id` int(10) UNSIGNED DEFAULT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_discount_id` int(10) UNSIGNED DEFAULT NULL,
  `fees_type_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `direct_fees_installment_assign_id` int(10) UNSIGNED DEFAULT NULL,
  `installment_payment_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_fees_types`
--

CREATE TABLE `sm_fees_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(230) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fees_group_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `un_semester_label_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_form_downloads`
--

CREATE TABLE `sm_form_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `short_description` varchar(200) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `show_public` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_frontend_persmissions`
--

CREATE TABLE `sm_frontend_persmissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `is_published` int(11) NOT NULL DEFAULT 0,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_general_settings`
--

CREATE TABLE `sm_general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(191) DEFAULT NULL,
  `site_title` varchar(191) DEFAULT NULL,
  `school_code` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `file_size` varchar(191) NOT NULL DEFAULT '102400',
  `currency` varchar(191) DEFAULT 'USD',
  `currency_symbol` varchar(191) DEFAULT '$',
  `currency_format` varchar(191) DEFAULT 'symbol_amount',
  `promotionSetting` int(11) DEFAULT 0,
  `logo` varchar(191) DEFAULT NULL,
  `favicon` varchar(191) DEFAULT NULL,
  `system_version` varchar(191) DEFAULT '8.2.8',
  `active_status` int(11) DEFAULT 1,
  `currency_code` varchar(191) DEFAULT 'USD',
  `language_name` varchar(191) DEFAULT 'en',
  `session_year` varchar(191) DEFAULT '2025',
  `system_purchase_code` text DEFAULT NULL,
  `system_activated_date` date DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `envato_user` varchar(191) DEFAULT NULL,
  `envato_item_id` varchar(191) DEFAULT NULL,
  `system_domain` varchar(191) DEFAULT NULL,
  `copyright_text` text DEFAULT NULL,
  `api_url` int(11) NOT NULL DEFAULT 1,
  `website_btn` int(11) NOT NULL DEFAULT 1,
  `dashboard_btn` int(11) NOT NULL DEFAULT 1,
  `report_btn` int(11) NOT NULL DEFAULT 1,
  `style_btn` int(11) NOT NULL DEFAULT 1,
  `ltl_rtl_btn` int(11) NOT NULL DEFAULT 1,
  `lang_btn` int(11) NOT NULL DEFAULT 1,
  `website_url` varchar(191) DEFAULT NULL,
  `ttl_rtl` int(11) NOT NULL DEFAULT 2,
  `phone_number_privacy` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `week_start_id` int(11) DEFAULT NULL,
  `time_zone_id` int(11) DEFAULT NULL,
  `attendance_layout` int(11) DEFAULT 1,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `language_id` int(10) UNSIGNED DEFAULT 1,
  `date_format_id` int(10) UNSIGNED DEFAULT 1,
  `ss_page_load` int(11) DEFAULT 3,
  `sub_topic_enable` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `software_version` varchar(100) DEFAULT NULL,
  `email_driver` varchar(191) NOT NULL DEFAULT 'php',
  `fcm_key` text DEFAULT NULL,
  `multiple_roll` tinyint(4) DEFAULT 0,
  `Lesson` int(11) DEFAULT 1,
  `Chat` int(11) DEFAULT 1,
  `FeesCollection` int(11) DEFAULT 0,
  `income_head_id` int(11) DEFAULT 0,
  `InfixBiometrics` int(11) DEFAULT 0,
  `ResultReports` int(11) DEFAULT 0,
  `TemplateSettings` int(11) DEFAULT 1,
  `MenuManage` int(11) DEFAULT 1,
  `RolePermission` int(11) DEFAULT 1,
  `RazorPay` int(11) DEFAULT 0,
  `Saas` int(11) DEFAULT 1,
  `StudentAbsentNotification` int(11) DEFAULT 1,
  `ParentRegistration` int(11) DEFAULT 0,
  `Zoom` int(11) DEFAULT 0,
  `BBB` int(11) DEFAULT 0,
  `VideoWatch` int(11) DEFAULT 0,
  `Jitsi` int(11) DEFAULT 0,
  `OnlineExam` int(11) DEFAULT 0,
  `SaasRolePermission` int(11) DEFAULT 0,
  `BulkPrint` int(11) DEFAULT 1,
  `HimalayaSms` int(11) DEFAULT 1,
  `XenditPayment` int(11) DEFAULT 1,
  `Wallet` int(11) DEFAULT 1,
  `Lms` int(11) DEFAULT 0,
  `ExamPlan` int(11) DEFAULT 1,
  `University` int(11) DEFAULT 0,
  `Gmeet` int(11) DEFAULT 0,
  `KhaltiPayment` int(11) DEFAULT 0,
  `Raudhahpay` int(11) DEFAULT 0,
  `AppSlider` int(11) DEFAULT 1,
  `BehaviourRecords` int(11) DEFAULT 0,
  `DownloadCenter` int(11) DEFAULT 1,
  `AiContent` int(11) DEFAULT 0,
  `WhatsappSupport` int(11) DEFAULT 0,
  `InAppLiveClass` int(11) DEFAULT 0,
  `fees_status` int(11) DEFAULT 1,
  `lms_checkout` int(11) DEFAULT 0,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `is_comment` tinyint(4) DEFAULT 0,
  `auto_approve` tinyint(4) DEFAULT 0,
  `blog_search` tinyint(4) DEFAULT 1,
  `recent_blog` tinyint(4) DEFAULT 1,
  `un_academic_id` int(10) UNSIGNED DEFAULT 1,
  `direct_fees_assign` tinyint(1) NOT NULL DEFAULT 0,
  `with_guardian` tinyint(1) NOT NULL DEFAULT 1,
  `result_type` varchar(191) DEFAULT NULL,
  `preloader_status` tinyint(1) NOT NULL DEFAULT 1,
  `preloader_style` tinyint(4) NOT NULL DEFAULT 3,
  `preloader_type` tinyint(4) NOT NULL DEFAULT 1,
  `preloader_image` varchar(191) NOT NULL DEFAULT 'public/uploads/settings/preloader/preloader1.gif',
  `due_fees_login` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Login restricted by due date , 0 = No Restriction ',
  `two_factor` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = Enable , 0 = Disable',
  `active_theme` varchar(191) NOT NULL DEFAULT 'edulia',
  `queue_connection` varchar(191) NOT NULL DEFAULT 'database',
  `role_based_sidebar` tinyint(1) NOT NULL DEFAULT 0,
  `is_custom_saas` int(11) NOT NULL DEFAULT 0,
  `shift_enable` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_header_menu_managers`
--

CREATE TABLE `sm_header_menu_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `element_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `link` varchar(191) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `show` tinyint(1) NOT NULL DEFAULT 0,
  `is_newtab` tinyint(1) NOT NULL DEFAULT 0,
  `theme` varchar(191) NOT NULL DEFAULT 'default',
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_holidays`
--

CREATE TABLE `sm_holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `holiday_title` varchar(200) DEFAULT NULL,
  `details` varchar(500) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `upload_image_file` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_homeworks`
--

CREATE TABLE `sm_homeworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `evaluation_date` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `marks` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evaluated_by` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chapter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_homework_students`
--

CREATE TABLE `sm_homework_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `marks` varchar(200) DEFAULT NULL,
  `teacher_comments` varchar(255) DEFAULT NULL,
  `complete_status` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `homework_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_home_page_settings`
--

CREATE TABLE `sm_home_page_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `long_title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `link_label` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_hourly_rates`
--

CREATE TABLE `sm_hourly_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(191) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_hr_payroll_earn_deducs`
--

CREATE TABLE `sm_hr_payroll_earn_deducs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(191) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `earn_dedc_type` varchar(5) DEFAULT NULL COMMENT 'e for earnings and d for deductions',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payroll_generate_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_hr_payroll_generates`
--

CREATE TABLE `sm_hr_payroll_generates` (
  `id` int(10) UNSIGNED NOT NULL,
  `basic_salary` double DEFAULT NULL,
  `total_earning` double DEFAULT NULL,
  `total_deduction` double DEFAULT NULL,
  `gross_salary` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `net_salary` double DEFAULT NULL,
  `payroll_month` varchar(191) DEFAULT NULL,
  `payroll_year` varchar(191) DEFAULT NULL,
  `payroll_status` varchar(191) DEFAULT NULL COMMENT 'NG for not generated, G for generated, P for paid',
  `payment_mode` varchar(191) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `paid_amount` int(11) DEFAULT NULL,
  `is_partial` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_hr_salary_templates`
--

CREATE TABLE `sm_hr_salary_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `salary_grades` varchar(200) DEFAULT NULL,
  `salary_basic` varchar(200) DEFAULT NULL,
  `overtime_rate` varchar(200) DEFAULT NULL,
  `house_rent` int(11) DEFAULT NULL,
  `provident_fund` int(11) DEFAULT NULL,
  `gross_salary` int(11) DEFAULT NULL,
  `total_deduction` int(11) DEFAULT NULL,
  `net_salary` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_human_departments`
--

CREATE TABLE `sm_human_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `is_saas` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_income_heads`
--

CREATE TABLE `sm_income_heads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_instructions`
--

CREATE TABLE `sm_instructions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_inventory_payments`
--

CREATE TABLE `sm_inventory_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_receive_sell_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `payment_type` varchar(11) DEFAULT NULL COMMENT 'R for receive S for sell',
  `payment_method` int(10) UNSIGNED DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_items`
--

CREATE TABLE `sm_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `total_in_stock` double DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_categories`
--

CREATE TABLE `sm_item_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_issues`
--

CREATE TABLE `sm_item_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `issue_to` int(10) UNSIGNED DEFAULT NULL,
  `issue_by` int(10) UNSIGNED DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `issue_status` varchar(191) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_receives`
--

CREATE TABLE `sm_item_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `receive_date` date DEFAULT NULL,
  `reference_no` varchar(191) DEFAULT NULL,
  `grand_total` decimal(20,2) NOT NULL,
  `total_quantity` decimal(20,2) NOT NULL,
  `total_paid` decimal(20,2) NOT NULL,
  `total_due` decimal(20,2) NOT NULL,
  `expense_head_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `paid_status` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_receive_children`
--

CREATE TABLE `sm_item_receive_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(20,2) NOT NULL,
  `quantity` decimal(20,2) NOT NULL,
  `sub_total` decimal(20,2) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `item_receive_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_sells`
--

CREATE TABLE `sm_item_sells` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_staff_id` int(11) DEFAULT NULL,
  `sell_date` date DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `grand_total` decimal(20,2) NOT NULL,
  `total_quantity` decimal(20,2) NOT NULL,
  `total_paid` decimal(20,2) NOT NULL,
  `total_due` decimal(20,2) NOT NULL,
  `income_head_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `paid_status` varchar(191) DEFAULT NULL COMMENT 'P = paid, PP = partially paid, U = unpaid, R = ----',
  `description` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_sell_children`
--

CREATE TABLE `sm_item_sell_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `sell_price` decimal(20,2) NOT NULL,
  `quantity` decimal(20,2) NOT NULL,
  `sub_total` decimal(20,2) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_sell_id` int(10) UNSIGNED DEFAULT NULL,
  `item_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_item_stores`
--

CREATE TABLE `sm_item_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `store_no` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_languages`
--

CREATE TABLE `sm_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_name` varchar(191) DEFAULT NULL,
  `native` varchar(191) DEFAULT NULL,
  `language_universal` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lang_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_language_phrases`
--

CREATE TABLE `sm_language_phrases` (
  `id` int(10) UNSIGNED NOT NULL,
  `modules` text DEFAULT NULL,
  `default_phrases` text DEFAULT NULL,
  `en` text DEFAULT NULL,
  `es` text DEFAULT NULL,
  `bn` text DEFAULT NULL,
  `fr` text DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_leave_deduction_infos`
--

CREATE TABLE `sm_leave_deduction_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `payroll_id` int(11) DEFAULT NULL,
  `extra_leave` int(11) DEFAULT NULL,
  `salary_deduct` int(11) DEFAULT NULL,
  `pay_month` varchar(191) DEFAULT NULL,
  `pay_year` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) DEFAULT 0,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_leave_defines`
--

CREATE TABLE `sm_leave_defines` (
  `id` int(10) UNSIGNED NOT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `total_days` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_leave_requests`
--

CREATE TABLE `sm_leave_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `apply_date` date DEFAULT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `approve_status` varchar(191) DEFAULT NULL COMMENT 'P for Pending, A for Approve, R for reject',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leave_define_id` int(10) UNSIGNED DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_leave_types`
--

CREATE TABLE `sm_leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `total_days` int(10) UNSIGNED DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_lessons`
--

CREATE TABLE `sm_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_title` varchar(191) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_lesson_details`
--

CREATE TABLE `sm_lesson_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `lesson_title` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_lesson_topics`
--

CREATE TABLE `sm_lesson_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_lesson_topic_details`
--

CREATE TABLE `sm_lesson_topic_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `topic_title` varchar(191) NOT NULL,
  `completed_status` varchar(191) DEFAULT NULL,
  `competed_date` date DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `topic_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_library_members`
--

CREATE TABLE `sm_library_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_ud_id` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member_type` int(10) UNSIGNED DEFAULT NULL,
  `student_staff_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_marks_grades`
--

CREATE TABLE `sm_marks_grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade_name` varchar(191) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  `from` double DEFAULT NULL,
  `up` double DEFAULT NULL,
  `percent_from` double DEFAULT NULL,
  `percent_upto` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_marks_registers`
--

CREATE TABLE `sm_marks_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_marks_register_children`
--

CREATE TABLE `sm_marks_register_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `abs` int(11) NOT NULL DEFAULT 0 COMMENT '1 for absent, 0 for present',
  `gpa_point` double DEFAULT NULL,
  `gpa_grade` varchar(55) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `marks_register_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_marks_send_sms`
--

CREATE TABLE `sm_marks_send_sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `sms_send_status` tinyint(4) NOT NULL DEFAULT 1,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_mark_stores`
--

CREATE TABLE `sm_mark_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_roll_no` int(11) NOT NULL DEFAULT 1,
  `student_addmission_no` int(11) NOT NULL DEFAULT 1,
  `total_marks` double NOT NULL DEFAULT 0,
  `is_absent` tinyint(4) NOT NULL DEFAULT 1,
  `teacher_remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_term_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_setup_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `student_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_menus`
--

CREATE TABLE `sm_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `module` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL,
  `lang_name` varchar(191) DEFAULT NULL,
  `section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_saas` tinyint(4) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_alumni` tinyint(4) DEFAULT NULL,
  `menu_status` tinyint(4) DEFAULT NULL,
  `permission_section` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `default_position` int(11) DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alternate_module` varchar(191) DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ignore` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_modules`
--

CREATE TABLE `sm_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_module_links`
--

CREATE TABLE `sm_module_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `route` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_module_permissions`
--

CREATE TABLE `sm_module_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `dashboard_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_module_permission_assigns`
--

CREATE TABLE `sm_module_permission_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_news`
--

CREATE TABLE `sm_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(191) NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `active_status` int(11) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `image_thumb` varchar(191) DEFAULT NULL,
  `news_body` longtext DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `mark_as_archive` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `is_global` tinyint(4) DEFAULT 1,
  `auto_approve` tinyint(4) DEFAULT 0,
  `is_comment` tinyint(4) DEFAULT 0,
  `order` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_news_categories`
--

CREATE TABLE `sm_news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL DEFAULT 'news',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_news_comments`
--

CREATE TABLE `sm_news_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `news_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_news_pages`
--

CREATE TABLE `sm_news_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_title` varchar(191) DEFAULT NULL,
  `main_description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `main_image` varchar(191) DEFAULT NULL,
  `button_text` varchar(191) DEFAULT NULL,
  `button_url` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_notice_boards`
--

CREATE TABLE `sm_notice_boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `notice_title` varchar(200) DEFAULT NULL,
  `notice_message` text DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_on` date DEFAULT NULL,
  `inform_to` varchar(200) DEFAULT NULL COMMENT 'Notice message sent to these roles',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_published` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_notifications`
--

CREATE TABLE `sm_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `message` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 1,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_notification_settings`
--

CREATE TABLE `sm_notification_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(191) DEFAULT NULL,
  `destination` varchar(191) DEFAULT NULL COMMENT 'E=email, S=SMS, W=web, A=app',
  `recipient` varchar(191) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `template` longtext DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `shortcode` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_online_exams`
--

CREATE TABLE `sm_online_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` varchar(200) DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `end_date_time` varchar(191) DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = Pending 1 Published',
  `is_taken` tinyint(4) DEFAULT 0,
  `is_closed` tinyint(4) DEFAULT 0,
  `is_waiting` tinyint(4) DEFAULT 0,
  `is_running` tinyint(4) DEFAULT 0,
  `auto_mark` tinyint(4) DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_online_exam_marks`
--

CREATE TABLE `sm_online_exam_marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `abs` int(11) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_online_exam_questions`
--

CREATE TABLE `sm_online_exam_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(1) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `trueFalse` varchar(1) DEFAULT NULL COMMENT 'F = false, T = true ',
  `suitable_words` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `online_exam_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_online_exam_question_assigns`
--

CREATE TABLE `sm_online_exam_question_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `online_exam_id` int(10) UNSIGNED DEFAULT NULL,
  `question_bank_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_online_exam_question_mu_options`
--

CREATE TABLE `sm_online_exam_question_mu_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 unchecked 1 checked',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `online_exam_question_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'here we use foreign key shorter name',
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_optional_subject_assigns`
--

CREATE TABLE `sm_optional_subject_assigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `session_id` int(10) UNSIGNED NOT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_pages`
--

CREATE TABLE `sm_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `sub_title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `header_image` text DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_dynamic` tinyint(4) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_parents`
--

CREATE TABLE `sm_parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `fathers_name` varchar(200) DEFAULT NULL,
  `fathers_mobile` varchar(200) DEFAULT NULL,
  `fathers_occupation` varchar(200) DEFAULT NULL,
  `fathers_photo` varchar(200) DEFAULT NULL,
  `mothers_name` varchar(200) DEFAULT NULL,
  `mothers_mobile` varchar(200) DEFAULT NULL,
  `mothers_occupation` varchar(200) DEFAULT NULL,
  `mothers_photo` varchar(200) DEFAULT NULL,
  `relation` varchar(200) DEFAULT NULL,
  `guardians_name` varchar(200) DEFAULT NULL,
  `guardians_mobile` varchar(200) DEFAULT NULL,
  `guardians_email` varchar(200) DEFAULT NULL,
  `guardians_occupation` varchar(200) DEFAULT NULL,
  `guardians_relation` varchar(30) DEFAULT NULL,
  `guardians_photo` varchar(200) DEFAULT NULL,
  `guardians_address` varchar(200) DEFAULT NULL,
  `is_guardian` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_payment_gateway_settings`
--

CREATE TABLE `sm_payment_gateway_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `gateway_name` varchar(191) DEFAULT NULL,
  `gateway_username` varchar(191) DEFAULT NULL,
  `gateway_password` varchar(191) DEFAULT NULL,
  `gateway_signature` varchar(191) DEFAULT NULL,
  `gateway_client_id` varchar(191) DEFAULT NULL,
  `gateway_mode` varchar(191) DEFAULT NULL,
  `gateway_secret_key` varchar(191) DEFAULT NULL,
  `gateway_secret_word` varchar(191) DEFAULT NULL,
  `gateway_publisher_key` varchar(191) DEFAULT NULL,
  `gateway_private_key` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_details` text DEFAULT NULL,
  `cheque_details` text DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `service_charge` tinyint(1) DEFAULT 0,
  `charge_type` varchar(2) DEFAULT NULL COMMENT 'P=percentage, F=Flat',
  `charge` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_payment_methhods`
--

CREATE TABLE `sm_payment_methhods` (
  `id` int(10) UNSIGNED NOT NULL,
  `method` varchar(255) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_phone_call_logs`
--

CREATE TABLE `sm_phone_call_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `next_follow_up_date` date DEFAULT NULL,
  `call_duration` varchar(100) DEFAULT NULL,
  `call_type` varchar(2) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_photo_galleries`
--

CREATE TABLE `sm_photo_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `feature_image` varchar(191) DEFAULT NULL,
  `gallery_image` varchar(191) DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_postal_dispatches`
--

CREATE TABLE `sm_postal_dispatches` (
  `id` int(10) UNSIGNED NOT NULL,
  `to_title` varchar(191) DEFAULT NULL,
  `from_title` varchar(191) DEFAULT NULL,
  `reference_no` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_postal_receives`
--

CREATE TABLE `sm_postal_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_title` varchar(191) DEFAULT NULL,
  `to_title` varchar(191) DEFAULT NULL,
  `reference_no` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_product_purchases`
--

CREATE TABLE `sm_product_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `expaire_date` date NOT NULL,
  `price` float DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `due_amount` float DEFAULT NULL,
  `package` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_question_banks`
--

CREATE TABLE `sm_question_banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(2) NOT NULL COMMENT 'M for multi ans, T for trueFalse, F for fill in the blanks',
  `question` text DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `trueFalse` varchar(1) DEFAULT NULL COMMENT 'F = false, T = true ',
  `suitable_words` text DEFAULT NULL,
  `number_of_option` varchar(2) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `q_group_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_question_bank_mu_options`
--

CREATE TABLE `sm_question_bank_mu_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 = false, 1 = correct',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_bank_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_question_groups`
--

CREATE TABLE `sm_question_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_question_levels`
--

CREATE TABLE `sm_question_levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_result_stores`
--

CREATE TABLE `sm_result_stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_roll_no` int(11) NOT NULL DEFAULT 1,
  `student_addmission_no` int(11) NOT NULL DEFAULT 1,
  `is_absent` int(11) NOT NULL DEFAULT 0 COMMENT '1=Absent, 0=Present',
  `total_marks` double NOT NULL DEFAULT 0,
  `total_gpa_point` double DEFAULT NULL,
  `total_gpa_grade` varchar(255) DEFAULT '0',
  `teacher_remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_type_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `exam_setup_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `student_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_role_permissions`
--

CREATE TABLE `sm_role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_link_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_room_lists`
--

CREATE TABLE `sm_room_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number_of_bed` int(11) NOT NULL,
  `cost_per_bed` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dormitory_id` int(10) UNSIGNED DEFAULT 1,
  `room_type_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_room_types`
--

CREATE TABLE `sm_room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_routes`
--

CREATE TABLE `sm_routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `far` float NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_schools`
--

CREATE TABLE `sm_schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `school_name` varchar(200) DEFAULT NULL,
  `created_by` tinyint(4) NOT NULL DEFAULT 1,
  `updated_by` tinyint(4) NOT NULL DEFAULT 1,
  `email` varchar(200) DEFAULT NULL,
  `domain` varchar(191) NOT NULL DEFAULT 'school',
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `school_code` varchar(200) DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `plan_type` varchar(200) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `contact_type` enum('yearly','monthly','once') DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 approved, 0 pending',
  `is_enabled` varchar(20) NOT NULL DEFAULT 'yes' COMMENT 'yes=Login enable, no=Login disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_seat_plans`
--

CREATE TABLE `sm_seat_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_seat_plan_children`
--

CREATE TABLE `sm_seat_plan_children` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` tinyint(4) DEFAULT NULL,
  `assign_students` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seat_plan_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_sections`
--

CREATE TABLE `sm_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `section_name` varchar(15) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `un_academic_id` int(10) UNSIGNED DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_send_messages`
--

CREATE TABLE `sm_send_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_title` varchar(200) DEFAULT NULL,
  `message_des` varchar(500) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_on` date DEFAULT NULL,
  `message_to` varchar(200) DEFAULT NULL COMMENT 'message sent to these roles',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_sessions`
--

CREATE TABLE `sm_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `session` varchar(255) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_setup_admins`
--

CREATE TABLE `sm_setup_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1 purpose, 2 complaint type, 3 source, 4 Reference',
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_sms_gateways`
--

CREATE TABLE `sm_sms_gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `type` varchar(5) DEFAULT 'com',
  `clickatell_username` varchar(255) DEFAULT NULL,
  `clickatell_password` varchar(255) DEFAULT NULL,
  `clickatell_api_id` varchar(255) DEFAULT NULL,
  `twilio_account_sid` varchar(255) DEFAULT NULL,
  `twilio_authentication_token` varchar(255) DEFAULT NULL,
  `twilio_registered_no` varchar(255) DEFAULT NULL,
  `msg91_authentication_key_sid` varchar(255) DEFAULT NULL,
  `msg91_sender_id` varchar(255) DEFAULT NULL,
  `msg91_route` varchar(255) DEFAULT NULL,
  `msg91_country_code` varchar(255) DEFAULT NULL,
  `textlocal_username` varchar(255) DEFAULT NULL,
  `textlocal_hash` varchar(255) DEFAULT NULL,
  `textlocal_sender` varchar(255) DEFAULT NULL,
  `device_info` text DEFAULT NULL,
  `africatalking_username` varchar(255) DEFAULT NULL,
  `africatalking_api_key` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `gateway_type` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_social_media_icons`
--

CREATE TABLE `sm_social_media_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 active, 0 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_staffs`
--

CREATE TABLE `sm_staffs` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_no` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `fathers_name` varchar(100) DEFAULT NULL,
  `mothers_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT '2025-07-09',
  `date_of_joining` date DEFAULT '2025-07-09',
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `emergency_mobile` varchar(50) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `merital_status` varchar(30) DEFAULT NULL,
  `staff_photo` varchar(191) DEFAULT NULL,
  `current_address` varchar(500) DEFAULT NULL,
  `permanent_address` varchar(500) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `epf_no` varchar(20) DEFAULT NULL,
  `basic_salary` varchar(200) DEFAULT NULL,
  `contract_type` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `casual_leave` varchar(15) DEFAULT NULL,
  `medical_leave` varchar(15) DEFAULT NULL,
  `metarnity_leave` varchar(15) DEFAULT NULL,
  `bank_account_name` varchar(50) DEFAULT NULL,
  `bank_account_no` varchar(50) DEFAULT NULL,
  `bank_name` varchar(20) DEFAULT NULL,
  `bank_brach` varchar(30) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `twiteer_url` varchar(100) DEFAULT NULL,
  `linkedin_url` varchar(100) DEFAULT NULL,
  `instragram_url` varchar(100) DEFAULT NULL,
  `joining_letter` varchar(500) DEFAULT NULL,
  `resume` varchar(500) DEFAULT NULL,
  `other_document` varchar(500) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `show_public` tinyint(4) NOT NULL DEFAULT 0,
  `driving_license` varchar(255) DEFAULT NULL,
  `driving_license_ex_date` date DEFAULT NULL,
  `custom_field` text DEFAULT NULL,
  `custom_field_form_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT 1,
  `department_id` int(10) UNSIGNED DEFAULT 1,
  `user_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT 1,
  `previous_role_id` int(11) DEFAULT NULL,
  `gender_id` int(10) UNSIGNED DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `is_saas` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_staff_attendance_imports`
--

CREATE TABLE `sm_staff_attendance_imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendence_date` date DEFAULT NULL,
  `in_time` varchar(50) DEFAULT NULL,
  `out_time` varchar(50) DEFAULT NULL,
  `attendance_type` varchar(10) DEFAULT NULL COMMENT 'Present: P Late: L Absent: A Holiday: H Half Day: F',
  `notes` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_staff_attendences`
--

CREATE TABLE `sm_staff_attendences` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendence_type` varchar(10) DEFAULT NULL COMMENT 'Present: P Late: L Absent: A Holiday: H Half Day: F',
  `notes` varchar(500) DEFAULT NULL,
  `attendence_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `staff_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_staff_registration_fields`
--

CREATE TABLE `sm_staff_registration_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(191) DEFAULT NULL,
  `label_name` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) DEFAULT 1,
  `is_required` tinyint(4) DEFAULT 0,
  `staff_edit` tinyint(4) DEFAULT 0,
  `required_type` tinyint(4) DEFAULT NULL COMMENT '1=switch on,2=off',
  `position` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_students`
--

CREATE TABLE `sm_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `admission_no` int(11) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `first_name` varchar(70) DEFAULT NULL,
  `last_name` varchar(70) DEFAULT NULL,
  `full_name` varchar(130) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `student_photo` varchar(191) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `weight` varchar(200) DEFAULT NULL,
  `current_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `driver_id` varchar(25) DEFAULT NULL,
  `national_id_no` varchar(25) DEFAULT NULL,
  `local_id_no` varchar(25) DEFAULT NULL,
  `bank_account_no` varchar(30) DEFAULT NULL,
  `bank_name` varchar(25) DEFAULT NULL,
  `previous_school_details` varchar(500) DEFAULT NULL,
  `aditional_notes` text DEFAULT NULL,
  `ifsc_code` varchar(50) DEFAULT NULL,
  `document_title_1` varchar(200) DEFAULT NULL,
  `document_file_1` varchar(200) DEFAULT NULL,
  `document_title_2` varchar(200) DEFAULT NULL,
  `document_file_2` varchar(200) DEFAULT NULL,
  `document_title_3` varchar(200) DEFAULT NULL,
  `document_file_3` varchar(200) DEFAULT NULL,
  `document_title_4` varchar(200) DEFAULT NULL,
  `document_file_4` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `custom_field` text DEFAULT NULL,
  `custom_field_form_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bloodgroup_id` int(10) UNSIGNED DEFAULT NULL,
  `religion_id` int(10) UNSIGNED DEFAULT NULL,
  `route_list_id` int(10) UNSIGNED DEFAULT NULL,
  `dormitory_id` int(10) UNSIGNED DEFAULT NULL,
  `vechile_id` int(10) UNSIGNED DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `student_category_id` int(10) UNSIGNED DEFAULT NULL,
  `student_group_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `gender_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_attendances`
--

CREATE TABLE `sm_student_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendance_type` varchar(10) DEFAULT NULL COMMENT 'Present: P Late: L Absent: A Holiday: H Half Day: F',
  `notes` varchar(500) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_attendance_imports`
--

CREATE TABLE `sm_student_attendance_imports` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendance_date` date DEFAULT NULL,
  `in_time` varchar(50) DEFAULT NULL,
  `out_time` varchar(50) DEFAULT NULL,
  `attendance_type` varchar(10) DEFAULT NULL COMMENT 'Present: P Late: L Absent: A Holiday: H Half Day: F',
  `notes` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_categories`
--

CREATE TABLE `sm_student_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_certificates`
--

CREATE TABLE `sm_student_certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `header_left_text` varchar(90) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `body` text DEFAULT NULL,
  `body_two` text DEFAULT NULL,
  `certificate_no` text DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `footer_left_text` varchar(90) DEFAULT NULL,
  `footer_center_text` varchar(90) DEFAULT NULL,
  `footer_right_text` varchar(191) DEFAULT NULL,
  `student_photo` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 = yes 0 no',
  `file` varchar(191) DEFAULT NULL,
  `layout` int(11) DEFAULT NULL COMMENT '1 = Portrait, 2 =  Landscape',
  `body_font_family` varchar(15) DEFAULT NULL,
  `body_font_size` varchar(10) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL COMMENT 'Height in mm',
  `width` varchar(50) DEFAULT NULL COMMENT 'width in mm',
  `default_for` varchar(50) DEFAULT NULL COMMENT 'default_for course',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_documents`
--

CREATE TABLE `sm_student_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `student_staff_id` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL COMMENT 'stu=student,stf=staff',
  `file` varchar(191) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_excel_formats`
--

CREATE TABLE `sm_student_excel_formats` (
  `roll_no` varchar(191) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `date_of_birth` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `admission_date` varchar(191) DEFAULT NULL,
  `category` varchar(191) DEFAULT NULL,
  `blood_group` varchar(191) DEFAULT NULL,
  `height` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `siblings_id` varchar(191) DEFAULT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `father_phone` varchar(191) DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `mother_phone` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `guardian_name` varchar(191) DEFAULT NULL,
  `guardian_relation` varchar(191) DEFAULT NULL,
  `guardian_email` varchar(191) DEFAULT NULL,
  `guardian_phone` varchar(191) DEFAULT NULL,
  `guardian_occupation` varchar(191) DEFAULT NULL,
  `guardian_address` varchar(191) DEFAULT NULL,
  `current_address` varchar(191) DEFAULT NULL,
  `permanent_address` varchar(191) DEFAULT NULL,
  `bank_account_no` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `national_identification_no` varchar(191) DEFAULT NULL,
  `local_identification_no` varchar(191) DEFAULT NULL,
  `previous_school_details` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_groups`
--

CREATE TABLE `sm_student_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_homeworks`
--

CREATE TABLE `sm_student_homeworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `percentage` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evaluated_by` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_id_cards`
--

CREATE TABLE `sm_student_id_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `signature` varchar(191) DEFAULT NULL,
  `background_img` varchar(191) DEFAULT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `role_id` text DEFAULT NULL,
  `page_layout_style` varchar(30) DEFAULT NULL,
  `user_photo_style` varchar(30) DEFAULT NULL,
  `user_photo_width` varchar(30) DEFAULT NULL,
  `user_photo_height` varchar(191) DEFAULT NULL,
  `pl_width` int(11) DEFAULT NULL,
  `pl_height` int(11) DEFAULT NULL,
  `t_space` int(11) DEFAULT NULL,
  `b_space` int(11) DEFAULT NULL,
  `r_space` int(11) DEFAULT NULL,
  `l_space` int(11) DEFAULT NULL,
  `admission_no` varchar(10) DEFAULT NULL,
  `student_name` varchar(10) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `father_name` varchar(10) DEFAULT NULL,
  `mother_name` varchar(10) DEFAULT NULL,
  `student_address` varchar(10) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `blood` varchar(10) DEFAULT NULL,
  `photo` int(11) NOT NULL DEFAULT 1,
  `signature_status` int(11) NOT NULL DEFAULT 1,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `staff_department` int(11) NOT NULL DEFAULT 0,
  `staff_designation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_promotions`
--

CREATE TABLE `sm_student_promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `result_status` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `previous_class_id` int(10) UNSIGNED DEFAULT NULL,
  `current_class_id` int(10) UNSIGNED DEFAULT NULL,
  `previous_section_id` int(10) UNSIGNED DEFAULT NULL,
  `current_section_id` int(10) UNSIGNED DEFAULT NULL,
  `previous_session_id` int(10) UNSIGNED DEFAULT NULL,
  `current_session_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `admission_number` int(11) DEFAULT NULL,
  `student_info` longtext DEFAULT NULL,
  `merit_student_info` longtext DEFAULT NULL,
  `previous_roll_number` int(11) DEFAULT NULL,
  `current_roll_number` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `previous_shift_id` int(11) DEFAULT NULL,
  `current_shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_registration_fields`
--

CREATE TABLE `sm_student_registration_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_name` varchar(191) DEFAULT NULL,
  `label_name` varchar(191) DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT 1,
  `active_status` tinyint(4) DEFAULT 1,
  `is_required` tinyint(4) DEFAULT 0,
  `student_edit` tinyint(4) DEFAULT 0,
  `parent_edit` tinyint(4) DEFAULT 0,
  `staff_edit` tinyint(4) DEFAULT 0,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=student,2=staff',
  `is_system_required` tinyint(4) DEFAULT 0,
  `required_type` tinyint(4) DEFAULT NULL COMMENT '1=switch on,2=off',
  `position` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_section` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_take_online_exams`
--

CREATE TABLE `sm_student_take_online_exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Yet, 1 = alreday submitted, 2 = got marks',
  `student_done` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Yet, 1 = complete',
  `total_marks` int(11) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `record_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `online_exam_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_take_online_exam_questions`
--

CREATE TABLE `sm_student_take_online_exam_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `trueFalse` varchar(1) DEFAULT NULL COMMENT 'F = false, T = true ',
  `suitable_words` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `take_online_exam_id` int(10) UNSIGNED DEFAULT NULL,
  `question_bank_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_take_onln_ex_ques_options`
--

CREATE TABLE `sm_student_take_onln_ex_ques_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0 unchecked 1 checked',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `take_online_exam_question_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_student_timelines`
--

CREATE TABLE `sm_student_timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_student_id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL COMMENT 'stu=student,stf=staff',
  `visible_to_student` int(11) NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = yes',
  `active_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_styles`
--

CREATE TABLE `sm_styles` (
  `id` int(10) UNSIGNED NOT NULL,
  `style_name` varchar(255) DEFAULT NULL,
  `path_main_style` varchar(255) DEFAULT NULL,
  `path_infix_style` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `primary_color2` varchar(255) DEFAULT NULL,
  `title_color` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `white` varchar(255) DEFAULT NULL,
  `black` varchar(255) DEFAULT NULL,
  `sidebar_bg` varchar(255) DEFAULT NULL,
  `barchart1` varchar(255) DEFAULT NULL,
  `barchart2` varchar(255) DEFAULT NULL,
  `barcharttextcolor` varchar(255) DEFAULT NULL,
  `barcharttextfamily` varchar(255) DEFAULT NULL,
  `areachartlinecolor1` varchar(255) DEFAULT NULL,
  `areachartlinecolor2` varchar(255) DEFAULT NULL,
  `dashboardbackground` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `is_default` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'if 1 then yes, if 0 then no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_subjects`
--

CREATE TABLE `sm_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  `pass_mark` double DEFAULT NULL,
  `subject_type` enum('T','P') NOT NULL COMMENT 'T=Theory, P=Practical',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_subject_attendances`
--

CREATE TABLE `sm_subject_attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendance_type` varchar(10) DEFAULT NULL COMMENT 'Present: P Late: L Absent: A Holiday: H Half Day: F',
  `notes` varchar(500) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `student_record_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `active_status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_suppliers`
--

CREATE TABLE `sm_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `contact_person_name` varchar(191) DEFAULT NULL,
  `contact_person_mobile` varchar(191) DEFAULT NULL,
  `contact_person_email` varchar(100) DEFAULT NULL,
  `cotact_person_address` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_system_versions`
--

CREATE TABLE `sm_system_versions` (
  `id` int(10) UNSIGNED NOT NULL,
  `version_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_teacher_upload_contents`
--

CREATE TABLE `sm_teacher_upload_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_title` varchar(200) DEFAULT NULL,
  `content_type` varchar(191) DEFAULT NULL COMMENT 'as assignment, st study material, sy sullabus, ot others download',
  `available_for_admin` int(11) DEFAULT 0,
  `available_for_all_classes` int(11) NOT NULL DEFAULT 0,
  `upload_date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `source_url` varchar(191) DEFAULT NULL,
  `upload_file` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `parent_course_id` int(11) DEFAULT NULL,
  `class` int(10) UNSIGNED DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `chapter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_temporary_meritlists`
--

CREATE TABLE `sm_temporary_meritlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `iid` varchar(250) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  `merit_order` double DEFAULT NULL,
  `student_name` varchar(250) DEFAULT NULL,
  `admission_no` varchar(250) DEFAULT NULL,
  `subjects_id_string` varchar(250) DEFAULT NULL,
  `subjects_string` varchar(250) DEFAULT NULL,
  `marks_string` varchar(250) DEFAULT NULL,
  `total_marks` double DEFAULT NULL,
  `average_mark` float DEFAULT NULL,
  `gpa_point` float DEFAULT NULL,
  `result` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `exam_id` int(10) UNSIGNED DEFAULT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `roll_no` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_testimonials`
--

CREATE TABLE `sm_testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `designation` varchar(191) NOT NULL,
  `institution_name` varchar(191) NOT NULL,
  `image` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `star_rating` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_time_zones`
--

CREATE TABLE `sm_time_zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `time_zone` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_to_dos`
--

CREATE TABLE `sm_to_dos` (
  `id` int(10) UNSIGNED NOT NULL,
  `todo_title` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `complete_status` varchar(191) DEFAULT 'P' COMMENT 'C for complete, N for not Complete, P Pending',
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_upload_contents`
--

CREATE TABLE `sm_upload_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_title` varchar(200) DEFAULT NULL,
  `content_type` int(11) DEFAULT NULL,
  `available_for_role` int(11) DEFAULT NULL,
  `available_for_class` int(11) DEFAULT NULL,
  `available_for_section` int(11) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `upload_file` varchar(200) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_upload_homework_contents`
--

CREATE TABLE `sm_upload_homework_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT 1,
  `homework_id` int(10) UNSIGNED DEFAULT 1,
  `description` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_user_logs`
--

CREATE TABLE `sm_user_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(191) DEFAULT NULL,
  `user_agent` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_vehicles`
--

CREATE TABLE `sm_vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `made_year` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_video_galleries`
--

CREATE TABLE `sm_video_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `is_publish` tinyint(1) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_visitors`
--

CREATE TABLE `sm_visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `visitor_id` varchar(255) DEFAULT NULL,
  `no_of_person` int(11) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `in_time` varchar(255) DEFAULT NULL,
  `out_time` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT 1,
  `updated_by` int(10) UNSIGNED DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sm_weekends`
--

CREATE TABLE `sm_weekends` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_weekend` int(11) DEFAULT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` varchar(191) DEFAULT NULL,
  `updated_at` varchar(191) DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `speech_sliders`
--

CREATE TABLE `speech_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `speech` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_import_bulk_temporaries`
--

CREATE TABLE `staff_import_bulk_temporaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_no` int(11) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `fathers_name` varchar(100) DEFAULT NULL,
  `mothers_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT '2025-07-09',
  `date_of_joining` date DEFAULT '2025-07-09',
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `emergency_mobile` varchar(50) DEFAULT NULL,
  `marital_status` varchar(30) DEFAULT NULL,
  `staff_photo` varchar(191) DEFAULT NULL,
  `current_address` varchar(500) DEFAULT NULL,
  `permanent_address` varchar(500) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `experience` varchar(200) DEFAULT NULL,
  `epf_no` varchar(20) DEFAULT NULL,
  `basic_salary` varchar(200) DEFAULT NULL,
  `contract_type` varchar(200) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `casual_leave` varchar(15) DEFAULT NULL,
  `medical_leave` varchar(15) DEFAULT NULL,
  `maternity_leave` varchar(15) DEFAULT NULL,
  `bank_account_name` varchar(50) DEFAULT NULL,
  `bank_account_no` varchar(50) DEFAULT NULL,
  `bank_name` varchar(20) DEFAULT NULL,
  `bank_brach` varchar(30) DEFAULT NULL,
  `facebook_url` varchar(100) DEFAULT NULL,
  `twitter_url` varchar(100) DEFAULT NULL,
  `linkedin_url` varchar(100) DEFAULT NULL,
  `instagram_url` varchar(100) DEFAULT NULL,
  `joining_letter` varchar(500) DEFAULT NULL,
  `resume` varchar(500) DEFAULT NULL,
  `other_document` varchar(500) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `driving_license` varchar(255) DEFAULT NULL,
  `driving_license_ex_date` date DEFAULT NULL,
  `role` varchar(191) DEFAULT NULL,
  `department` varchar(191) DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_academic_histories`
--

CREATE TABLE `student_academic_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 1,
  `occurance_date` date NOT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance_bulks`
--

CREATE TABLE `student_attendance_bulks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` varchar(191) DEFAULT NULL,
  `attendance_type` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_record_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_bulk_temporaries`
--

CREATE TABLE `student_bulk_temporaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admission_number` varchar(191) DEFAULT NULL,
  `roll_no` varchar(191) DEFAULT NULL,
  `first_name` varchar(191) DEFAULT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `date_of_birth` varchar(191) DEFAULT NULL,
  `religion` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `caste` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `admission_date` varchar(191) DEFAULT NULL,
  `blood_group` varchar(191) DEFAULT NULL,
  `height` varchar(191) DEFAULT NULL,
  `weight` varchar(191) DEFAULT NULL,
  `father_name` varchar(191) DEFAULT NULL,
  `father_phone` varchar(191) DEFAULT NULL,
  `father_occupation` varchar(191) DEFAULT NULL,
  `mother_name` varchar(191) DEFAULT NULL,
  `mother_phone` varchar(191) DEFAULT NULL,
  `mother_occupation` varchar(191) DEFAULT NULL,
  `guardian_name` varchar(191) DEFAULT NULL,
  `guardian_relation` varchar(191) DEFAULT NULL,
  `guardian_email` varchar(191) DEFAULT NULL,
  `guardian_phone` varchar(191) DEFAULT NULL,
  `guardian_occupation` varchar(191) DEFAULT NULL,
  `guardian_address` varchar(191) DEFAULT NULL,
  `current_address` varchar(191) DEFAULT NULL,
  `permanent_address` varchar(191) DEFAULT NULL,
  `bank_account_no` varchar(191) DEFAULT NULL,
  `bank_name` varchar(191) DEFAULT NULL,
  `national_identification_no` varchar(191) DEFAULT NULL,
  `local_identification_no` varchar(191) DEFAULT NULL,
  `previous_school_details` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `roll_no` varchar(191) DEFAULT NULL,
  `is_promote` tinyint(1) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_graduate` tinyint(1) DEFAULT 0,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_record_temporaries`
--

CREATE TABLE `student_record_temporaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sm_student_id` int(10) UNSIGNED NOT NULL,
  `student_record_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_evaluations`
--

CREATE TABLE `teacher_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` text DEFAULT NULL,
  `comment` varchar(191) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `record_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_evaluation_settings`
--

CREATE TABLE `teacher_evaluation_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT 0,
  `submitted_by` varchar(191) NOT NULL DEFAULT '[]',
  `rating_submission_time` varchar(191) NOT NULL DEFAULT 'any',
  `auto_approval` tinyint(1) NOT NULL DEFAULT 1,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `path_main_style` varchar(255) DEFAULT NULL,
  `path_infix_style` varchar(255) DEFAULT NULL,
  `replicate_theme` varchar(255) DEFAULT NULL,
  `color_mode` varchar(191) NOT NULL DEFAULT 'gradient',
  `box_shadow` tinyint(1) DEFAULT 1,
  `background_type` varchar(191) NOT NULL DEFAULT 'image',
  `background_color` varchar(191) DEFAULT NULL,
  `background_image` varchar(191) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `is_system` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcations`
--

CREATE TABLE `transcations` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'debit',
  `payment_method` varchar(20) DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `morphable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `morphable_type` varchar(191) DEFAULT NULL,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `transaction_date` date DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(11) NOT NULL DEFAULT 1,
  `academic_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `two_factor_settings`
--

CREATE TABLE `two_factor_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `via_sms` tinyint(1) NOT NULL DEFAULT 0,
  `via_email` tinyint(1) NOT NULL DEFAULT 1,
  `for_student` tinyint(4) NOT NULL DEFAULT 2,
  `for_parent` tinyint(4) NOT NULL DEFAULT 3,
  `for_teacher` tinyint(4) NOT NULL DEFAULT 4,
  `for_staff` tinyint(4) NOT NULL DEFAULT 6,
  `for_admin` tinyint(4) NOT NULL DEFAULT 1,
  `expired_time` double NOT NULL DEFAULT 300,
  `school_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(192) DEFAULT NULL,
  `username` varchar(192) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `email` varchar(192) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(210) DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `random_code` text DEFAULT NULL,
  `notificationToken` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `language` varchar(191) DEFAULT 'en',
  `style_id` int(11) DEFAULT 1,
  `rtl_ltl` int(11) DEFAULT 2,
  `selected_session` int(11) DEFAULT 1,
  `created_by` int(11) DEFAULT 1,
  `updated_by` int(11) DEFAULT 1,
  `access_status` int(11) DEFAULT 1,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `is_administrator` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_registered` tinyint(4) NOT NULL DEFAULT 0,
  `device_token` text DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `card_brand` varchar(191) DEFAULT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `verified` varchar(191) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `wallet_balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_otp_codes`
--

CREATE TABLE `user_otp_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `otp_code` varchar(191) NOT NULL,
  `expired_time` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `version_histories`
--

CREATE TABLE `version_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(191) DEFAULT NULL,
  `release_date` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `notes` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_uploads`
--

CREATE TABLE `video_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `youtube_link` varchar(191) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `academic_id` int(10) UNSIGNED DEFAULT NULL,
  `school_id` int(10) UNSIGNED DEFAULT 1,
  `un_session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_academic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_semester_label_id` bigint(20) UNSIGNED DEFAULT NULL,
  `un_section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double DEFAULT NULL,
  `payment_method` varchar(191) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL COMMENT 'diposit, refund, expense, fees_refund',
  `file` text DEFAULT NULL,
  `reject_note` text DEFAULT NULL,
  `expense` double DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending' COMMENT 'pending, approve, reject',
  `created_by` int(11) DEFAULT NULL,
  `academic_id` int(11) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent_notification_time_setups`
--
ALTER TABLE `absent_notification_time_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admit_cards`
--
ALTER TABLE `admit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admit_card_settings`
--
ALTER TABLE `admit_card_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_exam_wise_positions`
--
ALTER TABLE `all_exam_wise_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_incidents`
--
ALTER TABLE `assign_incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_incident_comments`
--
ALTER TABLE `assign_incident_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_permissions`
--
ALTER TABLE `assign_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_permissions_school_id_foreign` (`school_id`);

--
-- Indexes for table `behaviour_record_settings`
--
ALTER TABLE `behaviour_record_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_block_users`
--
ALTER TABLE `chat_block_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_groups`
--
ALTER TABLE `chat_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_groups_class_id_foreign` (`class_id`),
  ADD KEY `chat_groups_section_id_foreign` (`section_id`),
  ADD KEY `chat_groups_subject_id_foreign` (`subject_id`),
  ADD KEY `chat_groups_teacher_id_foreign` (`teacher_id`),
  ADD KEY `chat_groups_school_id_foreign` (`school_id`),
  ADD KEY `chat_groups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `chat_group_message_recipients`
--
ALTER TABLE `chat_group_message_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_message_removes`
--
ALTER TABLE `chat_group_message_removes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_users`
--
ALTER TABLE `chat_group_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_invitations`
--
ALTER TABLE `chat_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_invitation_types`
--
ALTER TABLE `chat_invitation_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_statuses`
--
ALTER TABLE `chat_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_classes`
--
ALTER TABLE `check_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_theme`
--
ALTER TABLE `color_theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_theme_color_id_foreign` (`color_id`),
  ADD KEY `color_theme_theme_id_foreign` (`theme_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_academic_id_foreign` (`academic_id`),
  ADD KEY `contents_school_id_foreign` (`school_id`);

--
-- Indexes for table `content_share_lists`
--
ALTER TABLE `content_share_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_share_lists_academic_id_foreign` (`academic_id`),
  ADD KEY `content_share_lists_school_id_foreign` (`school_id`);

--
-- Indexes for table `content_types`
--
ALTER TABLE `content_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_types_academic_id_foreign` (`academic_id`),
  ADD KEY `content_types_school_id_foreign` (`school_id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continents_school_id_foreign` (`school_id`);

--
-- Indexes for table `continets`
--
ALTER TABLE `continets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continets_school_id_foreign` (`school_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_school_id_foreign` (`school_id`),
  ADD KEY `countries_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `custom_result_settings`
--
ALTER TABLE `custom_result_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_result_settings_school_id_foreign` (`school_id`),
  ADD KEY `custom_result_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `custom_sms_settings`
--
ALTER TABLE `custom_sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_menus`
--
ALTER TABLE `default_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `direct_fees_installments`
--
ALTER TABLE `direct_fees_installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direct_fees_installments_school_id_foreign` (`school_id`);

--
-- Indexes for table `direct_fees_installment_assigns`
--
ALTER TABLE `direct_fees_installment_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direct_fees_installment_assigns_bank_id_foreign` (`bank_id`),
  ADD KEY `direct_fees_installment_assigns_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `direct_fees_installment_assigns_fees_type_id_foreign` (`fees_type_id`),
  ADD KEY `direct_fees_installment_assigns_student_id_foreign` (`student_id`),
  ADD KEY `direct_fees_installment_assigns_school_id_foreign` (`school_id`);

--
-- Indexes for table `direct_fees_reminders`
--
ALTER TABLE `direct_fees_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direct_fees_reminders_school_id_foreign` (`school_id`);

--
-- Indexes for table `direct_fees_settings`
--
ALTER TABLE `direct_fees_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direct_fees_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `dire_fees_installment_child_payments`
--
ALTER TABLE `dire_fees_installment_child_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dire_fees_installment_child_payments_bank_id_foreign` (`bank_id`),
  ADD KEY `dire_fees_installment_child_payments_fees_type_id_foreign` (`fees_type_id`),
  ADD KEY `dire_fees_installment_child_payments_student_id_foreign` (`student_id`),
  ADD KEY `dire_fees_installment_child_payments_school_id_foreign` (`school_id`);

--
-- Indexes for table `due_fees_login_prevents`
--
ALTER TABLE `due_fees_login_prevents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `due_fees_login_prevents_user_id_foreign` (`user_id`),
  ADD KEY `due_fees_login_prevents_role_id_foreign` (`role_id`),
  ADD KEY `due_fees_login_prevents_school_id_foreign` (`school_id`),
  ADD KEY `due_fees_login_prevents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `exam_merit_positions`
--
ALTER TABLE `exam_merit_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_step_skips`
--
ALTER TABLE `exam_step_skips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_step_skips_school_id_foreign` (`school_id`),
  ADD KEY `exam_step_skips_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees_carry_forward_logs`
--
ALTER TABLE `fees_carry_forward_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_carry_forward_logs_school_id_foreign` (`school_id`);

--
-- Indexes for table `fees_carry_forward_settings`
--
ALTER TABLE `fees_carry_forward_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_carry_forward_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `fees_installment_credits`
--
ALTER TABLE `fees_installment_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_invoices_school_id_foreign` (`school_id`);

--
-- Indexes for table `fees_invoice_settings`
--
ALTER TABLE `fees_invoice_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_invoice_settings_created_by_foreign` (`created_by`),
  ADD KEY `fees_invoice_settings_updated_by_foreign` (`updated_by`),
  ADD KEY `fees_invoice_settings_school_id_foreign` (`school_id`),
  ADD KEY `fees_invoice_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `fm_fees_groups`
--
ALTER TABLE `fm_fees_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_fees_invoices`
--
ALTER TABLE `fm_fees_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fm_fees_invoices_student_id_foreign` (`student_id`);

--
-- Indexes for table `fm_fees_invoice_chields`
--
ALTER TABLE `fm_fees_invoice_chields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fm_fees_invoice_chields_fees_invoice_id_foreign` (`fees_invoice_id`);

--
-- Indexes for table `fm_fees_invoice_settings`
--
ALTER TABLE `fm_fees_invoice_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_fees_transactions`
--
ALTER TABLE `fm_fees_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fm_fees_transactions_fees_invoice_id_foreign` (`fees_invoice_id`);

--
-- Indexes for table `fm_fees_transaction_chields`
--
ALTER TABLE `fm_fees_transaction_chields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fm_fees_transaction_chields_fees_transaction_id_foreign` (`fees_transaction_id`);

--
-- Indexes for table `fm_fees_types`
--
ALTER TABLE `fm_fees_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fm_fees_weavers`
--
ALTER TABLE `fm_fees_weavers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fm_fees_weavers_fees_invoice_id_foreign` (`fees_invoice_id`);

--
-- Indexes for table `frontend_exam_results`
--
ALTER TABLE `frontend_exam_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontend_exam_results_school_id_foreign` (`school_id`);

--
-- Indexes for table `front_academic_calendars`
--
ALTER TABLE `front_academic_calendars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_academic_calendars_school_id_foreign` (`school_id`);

--
-- Indexes for table `front_class_routines`
--
ALTER TABLE `front_class_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_class_routines_school_id_foreign` (`school_id`);

--
-- Indexes for table `front_exam_routines`
--
ALTER TABLE `front_exam_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_exam_routines_school_id_foreign` (`school_id`);

--
-- Indexes for table `front_results`
--
ALTER TABLE `front_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_results_school_id_foreign` (`school_id`);

--
-- Indexes for table `graduates`
--
ALTER TABLE `graduates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `graduates_student_id_foreign` (`student_id`),
  ADD KEY `graduates_school_id_foreign` (`school_id`),
  ADD KEY `graduates_session_id_foreign` (`session_id`),
  ADD KEY `graduates_class_id_foreign` (`class_id`),
  ADD KEY `graduates_section_id_foreign` (`section_id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_sliders_school_id_foreign` (`school_id`);

--
-- Indexes for table `incidents`
--
ALTER TABLE `incidents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incidents_school_id_foreign` (`school_id`);

--
-- Indexes for table `infixedu__pages`
--
ALTER TABLE `infixedu__pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infixedu__pages_school_id_foreign` (`school_id`),
  ADD KEY `infixedu__pages_status_index` (`status`);
ALTER TABLE `infixedu__pages` ADD FULLTEXT KEY `infixedu__pages_name_fulltext` (`name`);

--
-- Indexes for table `infix_module_infos`
--
ALTER TABLE `infix_module_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infix_module_infos_created_by_foreign` (`created_by`),
  ADD KEY `infix_module_infos_updated_by_foreign` (`updated_by`),
  ADD KEY `infix_module_infos_school_id_foreign` (`school_id`);

--
-- Indexes for table `infix_module_managers`
--
ALTER TABLE `infix_module_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infix_module_student_parent_infos`
--
ALTER TABLE `infix_module_student_parent_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infix_module_student_parent_infos_created_by_foreign` (`created_by`),
  ADD KEY `infix_module_student_parent_infos_updated_by_foreign` (`updated_by`),
  ADD KEY `infix_module_student_parent_infos_school_id_foreign` (`school_id`);

--
-- Indexes for table `infix_permission_assigns`
--
ALTER TABLE `infix_permission_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infix_permission_assigns_role_id_foreign` (`role_id`),
  ADD KEY `infix_permission_assigns_school_id_foreign` (`school_id`);

--
-- Indexes for table `infix_roles`
--
ALTER TABLE `infix_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infix_roles_school_id_foreign` (`school_id`);

--
-- Indexes for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_settings_created_by_foreign` (`created_by`),
  ADD KEY `invoice_settings_updated_by_foreign` (`updated_by`),
  ADD KEY `invoice_settings_school_id_foreign` (`school_id`),
  ADD KEY `invoice_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_school_id_foreign` (`school_id`);

--
-- Indexes for table `lesson_planners`
--
ALTER TABLE `lesson_planners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_planners_room_id_foreign` (`room_id`),
  ADD KEY `lesson_planners_teacher_id_foreign` (`teacher_id`),
  ADD KEY `lesson_planners_class_period_id_foreign` (`class_period_id`),
  ADD KEY `lesson_planners_subject_id_foreign` (`subject_id`),
  ADD KEY `lesson_planners_class_id_foreign` (`class_id`),
  ADD KEY `lesson_planners_section_id_foreign` (`section_id`),
  ADD KEY `lesson_planners_school_id_foreign` (`school_id`),
  ADD KEY `lesson_planners_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `lesson_plan_topics`
--
ALTER TABLE `lesson_plan_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_plan_topics_topic_id_foreign` (`topic_id`),
  ADD KEY `lesson_plan_topics_lesson_planner_id_foreign` (`lesson_planner_id`);

--
-- Indexes for table `library_subjects`
--
ALTER TABLE `library_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_subjects_school_id_foreign` (`school_id`),
  ADD KEY `library_subjects_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `maintenance_settings`
--
ALTER TABLE `maintenance_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `online_exam_student_answer_markings`
--
ALTER TABLE `online_exam_student_answer_markings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payroll_payments`
--
ALTER TABLE `payroll_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_payments_sm_hr_payroll_generate_id_foreign` (`sm_hr_payroll_generate_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_school_id_foreign` (`school_id`);

--
-- Indexes for table `permission_sections`
--
ALTER TABLE `permission_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_sections_school_id_foreign` (`school_id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plugins_school_id_foreign` (`school_id`);

--
-- Indexes for table `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_aggregates_bucket_period_type_aggregate_key_hash_unique` (`bucket`,`period`,`type`,`aggregate`,`key_hash`),
  ADD KEY `pulse_aggregates_period_bucket_index` (`period`,`bucket`),
  ADD KEY `pulse_aggregates_type_index` (`type`),
  ADD KEY `pulse_aggregates_period_type_aggregate_bucket_index` (`period`,`type`,`aggregate`,`bucket`);

--
-- Indexes for table `pulse_entries`
--
ALTER TABLE `pulse_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pulse_entries_timestamp_index` (`timestamp`),
  ADD KEY `pulse_entries_type_index` (`type`),
  ADD KEY `pulse_entries_key_hash_index` (`key_hash`),
  ADD KEY `pulse_entries_timestamp_type_key_hash_value_index` (`timestamp`,`type`,`key_hash`,`value`);

--
-- Indexes for table `pulse_values`
--
ALTER TABLE `pulse_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_values_type_key_hash_unique` (`type`,`key_hash`),
  ADD KEY `pulse_values_timestamp_index` (`timestamp`),
  ADD KEY `pulse_values_type_index` (`type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_school_id_foreign` (`school_id`);

--
-- Indexes for table `school_modules`
--
ALTER TABLE `school_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_modules_school_id_foreign` (`school_id`);

--
-- Indexes for table `seat_plans`
--
ALTER TABLE `seat_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_plan_settings`
--
ALTER TABLE `seat_plan_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebars`
--
ALTER TABLE `sidebars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sidebars_user_id_foreign` (`user_id`),
  ADD KEY `sidebars_school_id_foreign` (`school_id`);

--
-- Indexes for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_templates_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_about_pages`
--
ALTER TABLE `sm_about_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_about_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_academic_years`
--
ALTER TABLE `sm_academic_years`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_academic_years_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_add_expenses`
--
ALTER TABLE `sm_add_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_add_expenses_school_id_foreign` (`school_id`),
  ADD KEY `sm_add_expenses_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_add_incomes`
--
ALTER TABLE `sm_add_incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_add_incomes_account_id_foreign` (`account_id`),
  ADD KEY `sm_add_incomes_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `sm_add_incomes_school_id_foreign` (`school_id`),
  ADD KEY `sm_add_incomes_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_add_ons`
--
ALTER TABLE `sm_add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_admission_queries`
--
ALTER TABLE `sm_admission_queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_admission_queries_class_foreign` (`class`),
  ADD KEY `sm_admission_queries_school_id_foreign` (`school_id`),
  ADD KEY `sm_admission_queries_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_admission_query_followups`
--
ALTER TABLE `sm_admission_query_followups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_admission_query_followups_admission_query_id_foreign` (`admission_query_id`),
  ADD KEY `sm_admission_query_followups_school_id_foreign` (`school_id`),
  ADD KEY `sm_admission_query_followups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_amount_transfers`
--
ALTER TABLE `sm_amount_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_amount_transfers_school_id_foreign` (`school_id`),
  ADD KEY `sm_amount_transfers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_assign_class_teachers`
--
ALTER TABLE `sm_assign_class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_assign_class_teachers_class_id_foreign` (`class_id`),
  ADD KEY `sm_assign_class_teachers_section_id_foreign` (`section_id`),
  ADD KEY `sm_assign_class_teachers_school_id_foreign` (`school_id`),
  ADD KEY `sm_assign_class_teachers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_assign_subjects`
--
ALTER TABLE `sm_assign_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_assign_subjects_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sm_assign_subjects_class_id_foreign` (`class_id`),
  ADD KEY `sm_assign_subjects_section_id_foreign` (`section_id`),
  ADD KEY `sm_assign_subjects_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_assign_subjects_school_id_foreign` (`school_id`),
  ADD KEY `sm_assign_subjects_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_assign_vehicles`
--
ALTER TABLE `sm_assign_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_assign_vehicles_vehicle_id_foreign` (`vehicle_id`),
  ADD KEY `sm_assign_vehicles_route_id_foreign` (`route_id`),
  ADD KEY `sm_assign_vehicles_school_id_foreign` (`school_id`),
  ADD KEY `sm_assign_vehicles_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_background_settings`
--
ALTER TABLE `sm_background_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_background_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_backups`
--
ALTER TABLE `sm_backups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_backups_school_id_foreign` (`school_id`),
  ADD KEY `sm_backups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_bank_accounts`
--
ALTER TABLE `sm_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_bank_accounts_school_id_foreign` (`school_id`),
  ADD KEY `sm_bank_accounts_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_bank_payment_slips`
--
ALTER TABLE `sm_bank_payment_slips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_bank_payment_slips_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `sm_bank_payment_slips_student_id_foreign` (`student_id`),
  ADD KEY `sm_bank_payment_slips_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_bank_statements`
--
ALTER TABLE `sm_bank_statements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_base_groups`
--
ALTER TABLE `sm_base_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_base_groups_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_base_setups`
--
ALTER TABLE `sm_base_setups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_base_setups_base_group_id_foreign` (`base_group_id`),
  ADD KEY `sm_base_setups_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_books`
--
ALTER TABLE `sm_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_books_book_category_id_foreign` (`book_category_id`),
  ADD KEY `sm_books_school_id_foreign` (`school_id`),
  ADD KEY `sm_books_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_book_categories`
--
ALTER TABLE `sm_book_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_book_categories_school_id_foreign` (`school_id`),
  ADD KEY `sm_book_categories_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_book_issues`
--
ALTER TABLE `sm_book_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_book_issues_book_id_foreign` (`book_id`),
  ADD KEY `sm_book_issues_member_id_foreign` (`member_id`),
  ADD KEY `sm_book_issues_school_id_foreign` (`school_id`),
  ADD KEY `sm_book_issues_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_calendar_settings`
--
ALTER TABLE `sm_calendar_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_calendar_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_chart_of_accounts`
--
ALTER TABLE `sm_chart_of_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_chart_of_accounts_school_id_foreign` (`school_id`),
  ADD KEY `sm_chart_of_accounts_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_classes`
--
ALTER TABLE `sm_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_classes_school_id_foreign` (`school_id`),
  ADD KEY `sm_classes_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_exam_routine_pages`
--
ALTER TABLE `sm_class_exam_routine_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_exam_routine_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_class_optional_subject`
--
ALTER TABLE `sm_class_optional_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_optional_subject_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_optional_subject_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_rooms`
--
ALTER TABLE `sm_class_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_rooms_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_rooms_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_routines`
--
ALTER TABLE `sm_class_routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_routines_class_id_foreign` (`class_id`),
  ADD KEY `sm_class_routines_section_id_foreign` (`section_id`),
  ADD KEY `sm_class_routines_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_class_routines_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_routines_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_routine_updates`
--
ALTER TABLE `sm_class_routine_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_routine_updates_room_id_foreign` (`room_id`),
  ADD KEY `sm_class_routine_updates_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sm_class_routine_updates_class_period_id_foreign` (`class_period_id`),
  ADD KEY `sm_class_routine_updates_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_class_routine_updates_class_id_foreign` (`class_id`),
  ADD KEY `sm_class_routine_updates_section_id_foreign` (`section_id`),
  ADD KEY `sm_class_routine_updates_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_routine_updates_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_sections`
--
ALTER TABLE `sm_class_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_sections_section_id_foreign` (`section_id`),
  ADD KEY `sm_class_sections_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_sections_academic_id_foreign` (`academic_id`),
  ADD KEY `sm_class_sections_class_id_section_id_index` (`class_id`,`section_id`);

--
-- Indexes for table `sm_class_teachers`
--
ALTER TABLE `sm_class_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sm_class_teachers_assign_class_teacher_id_foreign` (`assign_class_teacher_id`),
  ADD KEY `sm_class_teachers_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_teachers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_class_times`
--
ALTER TABLE `sm_class_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_class_times_school_id_foreign` (`school_id`),
  ADD KEY `sm_class_times_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_complaints`
--
ALTER TABLE `sm_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_complaints_school_id_foreign` (`school_id`),
  ADD KEY `sm_complaints_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_contact_messages`
--
ALTER TABLE `sm_contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_contact_messages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_contact_pages`
--
ALTER TABLE `sm_contact_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_contact_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_content_types`
--
ALTER TABLE `sm_content_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_content_types_school_id_foreign` (`school_id`),
  ADD KEY `sm_content_types_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_countries`
--
ALTER TABLE `sm_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_countries_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_courses`
--
ALTER TABLE `sm_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_courses_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_course_categories`
--
ALTER TABLE `sm_course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_course_pages`
--
ALTER TABLE `sm_course_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_course_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_currencies`
--
ALTER TABLE `sm_currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_currencies_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_custom_fields`
--
ALTER TABLE `sm_custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_custom_links`
--
ALTER TABLE `sm_custom_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_custom_links_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_custom_temporary_results`
--
ALTER TABLE `sm_custom_temporary_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_custom_temporary_results_school_id_foreign` (`school_id`),
  ADD KEY `sm_custom_temporary_results_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_dashboard_settings`
--
ALTER TABLE `sm_dashboard_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_dashboard_settings_role_id_foreign` (`role_id`),
  ADD KEY `sm_dashboard_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_date_formats`
--
ALTER TABLE `sm_date_formats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_date_formats_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_designations`
--
ALTER TABLE `sm_designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_designations_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_donors`
--
ALTER TABLE `sm_donors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_donors_bloodgroup_id_foreign` (`bloodgroup_id`),
  ADD KEY `sm_donors_religion_id_foreign` (`religion_id`),
  ADD KEY `sm_donors_gender_id_foreign` (`gender_id`),
  ADD KEY `sm_donors_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_dormitory_lists`
--
ALTER TABLE `sm_dormitory_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_dormitory_lists_school_id_foreign` (`school_id`),
  ADD KEY `sm_dormitory_lists_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_email_settings`
--
ALTER TABLE `sm_email_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_email_settings_school_id_foreign` (`school_id`),
  ADD KEY `sm_email_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_email_sms_logs`
--
ALTER TABLE `sm_email_sms_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_email_sms_logs_school_id_foreign` (`school_id`),
  ADD KEY `sm_email_sms_logs_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_events`
--
ALTER TABLE `sm_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_events_school_id_foreign` (`school_id`),
  ADD KEY `sm_events_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exams`
--
ALTER TABLE `sm_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exams_exam_type_id_foreign` (`exam_type_id`),
  ADD KEY `sm_exams_class_id_foreign` (`class_id`),
  ADD KEY `sm_exams_section_id_foreign` (`section_id`),
  ADD KEY `sm_exams_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exams_school_id_foreign` (`school_id`),
  ADD KEY `sm_exams_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_attendances`
--
ALTER TABLE `sm_exam_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_attendances_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exam_attendances_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_exam_attendances_class_id_foreign` (`class_id`),
  ADD KEY `sm_exam_attendances_section_id_foreign` (`section_id`),
  ADD KEY `sm_exam_attendances_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_attendances_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_attendance_children`
--
ALTER TABLE `sm_exam_attendance_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_attendance_children_exam_attendance_id_foreign` (`exam_attendance_id`),
  ADD KEY `sm_exam_attendance_children_student_record_id_foreign` (`student_record_id`),
  ADD KEY `sm_exam_attendance_children_class_id_foreign` (`class_id`),
  ADD KEY `sm_exam_attendance_children_section_id_foreign` (`section_id`),
  ADD KEY `sm_exam_attendance_children_student_id_foreign` (`student_id`),
  ADD KEY `sm_exam_attendance_children_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_attendance_children_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_marks_registers`
--
ALTER TABLE `sm_exam_marks_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_marks_registers_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_exam_marks_registers_student_id_foreign` (`student_id`),
  ADD KEY `sm_exam_marks_registers_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exam_marks_registers_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_marks_registers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_schedules`
--
ALTER TABLE `sm_exam_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_schedules_exam_period_id_foreign` (`exam_period_id`),
  ADD KEY `sm_exam_schedules_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exam_schedules_exam_term_id_foreign` (`exam_term_id`),
  ADD KEY `sm_exam_schedules_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_exam_schedules_class_id_foreign` (`class_id`),
  ADD KEY `sm_exam_schedules_section_id_foreign` (`section_id`),
  ADD KEY `sm_exam_schedules_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sm_exam_schedules_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_schedules_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_schedule_subjects`
--
ALTER TABLE `sm_exam_schedule_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_schedule_subjects_exam_schedule_id_foreign` (`exam_schedule_id`),
  ADD KEY `sm_exam_schedule_subjects_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exam_schedule_subjects_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_schedule_subjects_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_settings`
--
ALTER TABLE `sm_exam_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_settings_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_setups`
--
ALTER TABLE `sm_exam_setups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_setups_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_exam_setups_class_id_foreign` (`class_id`),
  ADD KEY `sm_exam_setups_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_exam_setups_section_id_foreign` (`section_id`),
  ADD KEY `sm_exam_setups_exam_term_id_foreign` (`exam_term_id`),
  ADD KEY `sm_exam_setups_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_setups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_signatures`
--
ALTER TABLE `sm_exam_signatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_signatures_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_signatures_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_exam_types`
--
ALTER TABLE `sm_exam_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_exam_types_school_id_foreign` (`school_id`),
  ADD KEY `sm_exam_types_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_expense_heads`
--
ALTER TABLE `sm_expense_heads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_expense_heads_school_id_foreign` (`school_id`),
  ADD KEY `sm_expense_heads_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_expert_teachers`
--
ALTER TABLE `sm_expert_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_expert_teachers_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_fees_assigns`
--
ALTER TABLE `sm_fees_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_assigns_fees_master_id_foreign` (`fees_master_id`),
  ADD KEY `sm_fees_assigns_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `sm_fees_assigns_student_id_foreign` (`student_id`),
  ADD KEY `sm_fees_assigns_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_assigns_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_assign_discounts`
--
ALTER TABLE `sm_fees_assign_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_assign_discounts_student_id_foreign` (`student_id`),
  ADD KEY `sm_fees_assign_discounts_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `sm_fees_assign_discounts_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_assign_discounts_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_carry_forwards`
--
ALTER TABLE `sm_fees_carry_forwards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_carry_forwards_student_id_foreign` (`student_id`),
  ADD KEY `sm_fees_carry_forwards_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_carry_forwards_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_discounts`
--
ALTER TABLE `sm_fees_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_discounts_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_discounts_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_groups`
--
ALTER TABLE `sm_fees_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_groups_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_groups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_masters`
--
ALTER TABLE `sm_fees_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_masters_fees_group_id_foreign` (`fees_group_id`),
  ADD KEY `sm_fees_masters_fees_type_id_foreign` (`fees_type_id`),
  ADD KEY `sm_fees_masters_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_masters_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_payments`
--
ALTER TABLE `sm_fees_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_payments_assign_id_foreign` (`assign_id`),
  ADD KEY `sm_fees_payments_bank_id_foreign` (`bank_id`),
  ADD KEY `sm_fees_payments_fees_discount_id_foreign` (`fees_discount_id`),
  ADD KEY `sm_fees_payments_fees_type_id_foreign` (`fees_type_id`),
  ADD KEY `sm_fees_payments_student_id_foreign` (`student_id`),
  ADD KEY `sm_fees_payments_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_payments_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_fees_types`
--
ALTER TABLE `sm_fees_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_fees_types_fees_group_id_foreign` (`fees_group_id`),
  ADD KEY `sm_fees_types_school_id_foreign` (`school_id`),
  ADD KEY `sm_fees_types_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_form_downloads`
--
ALTER TABLE `sm_form_downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_form_downloads_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_frontend_persmissions`
--
ALTER TABLE `sm_frontend_persmissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_frontend_persmissions_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_general_settings`
--
ALTER TABLE `sm_general_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_general_settings_session_id_foreign` (`session_id`),
  ADD KEY `sm_general_settings_language_id_foreign` (`language_id`),
  ADD KEY `sm_general_settings_date_format_id_foreign` (`date_format_id`),
  ADD KEY `sm_general_settings_school_id_foreign` (`school_id`),
  ADD KEY `sm_general_settings_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_header_menu_managers`
--
ALTER TABLE `sm_header_menu_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_header_menu_managers_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_holidays`
--
ALTER TABLE `sm_holidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_holidays_school_id_foreign` (`school_id`),
  ADD KEY `sm_holidays_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_homeworks`
--
ALTER TABLE `sm_homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_homeworks_evaluated_by_foreign` (`evaluated_by`),
  ADD KEY `sm_homeworks_class_id_foreign` (`class_id`),
  ADD KEY `sm_homeworks_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_homeworks_school_id_foreign` (`school_id`),
  ADD KEY `sm_homeworks_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_homework_students`
--
ALTER TABLE `sm_homework_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_homework_students_student_id_foreign` (`student_id`),
  ADD KEY `sm_homework_students_homework_id_foreign` (`homework_id`),
  ADD KEY `sm_homework_students_school_id_foreign` (`school_id`),
  ADD KEY `sm_homework_students_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_home_page_settings`
--
ALTER TABLE `sm_home_page_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_home_page_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_hourly_rates`
--
ALTER TABLE `sm_hourly_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_hourly_rates_school_id_foreign` (`school_id`),
  ADD KEY `sm_hourly_rates_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_hr_payroll_earn_deducs`
--
ALTER TABLE `sm_hr_payroll_earn_deducs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_hr_payroll_earn_deducs_payroll_generate_id_foreign` (`payroll_generate_id`),
  ADD KEY `sm_hr_payroll_earn_deducs_school_id_foreign` (`school_id`),
  ADD KEY `sm_hr_payroll_earn_deducs_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_hr_payroll_generates`
--
ALTER TABLE `sm_hr_payroll_generates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_hr_payroll_generates_staff_id_foreign` (`staff_id`),
  ADD KEY `sm_hr_payroll_generates_school_id_foreign` (`school_id`),
  ADD KEY `sm_hr_payroll_generates_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_hr_salary_templates`
--
ALTER TABLE `sm_hr_salary_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_hr_salary_templates_school_id_foreign` (`school_id`),
  ADD KEY `sm_hr_salary_templates_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_human_departments`
--
ALTER TABLE `sm_human_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_human_departments_created_by_foreign` (`created_by`),
  ADD KEY `sm_human_departments_updated_by_foreign` (`updated_by`),
  ADD KEY `sm_human_departments_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_income_heads`
--
ALTER TABLE `sm_income_heads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_income_heads_school_id_foreign` (`school_id`),
  ADD KEY `sm_income_heads_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_instructions`
--
ALTER TABLE `sm_instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_instructions_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_inventory_payments`
--
ALTER TABLE `sm_inventory_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_inventory_payments_school_id_foreign` (`school_id`),
  ADD KEY `sm_inventory_payments_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_items`
--
ALTER TABLE `sm_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_items_item_category_id_foreign` (`item_category_id`),
  ADD KEY `sm_items_school_id_foreign` (`school_id`),
  ADD KEY `sm_items_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_categories`
--
ALTER TABLE `sm_item_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_categories_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_categories_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_issues`
--
ALTER TABLE `sm_item_issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_issues_role_id_foreign` (`role_id`),
  ADD KEY `sm_item_issues_item_category_id_foreign` (`item_category_id`),
  ADD KEY `sm_item_issues_item_id_foreign` (`item_id`),
  ADD KEY `sm_item_issues_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_issues_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_receives`
--
ALTER TABLE `sm_item_receives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_receives_supplier_id_foreign` (`supplier_id`),
  ADD KEY `sm_item_receives_store_id_foreign` (`store_id`),
  ADD KEY `sm_item_receives_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_receives_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_receive_children`
--
ALTER TABLE `sm_item_receive_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_receive_children_item_id_foreign` (`item_id`),
  ADD KEY `sm_item_receive_children_item_receive_id_foreign` (`item_receive_id`),
  ADD KEY `sm_item_receive_children_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_receive_children_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_sells`
--
ALTER TABLE `sm_item_sells`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_sells_role_id_foreign` (`role_id`),
  ADD KEY `sm_item_sells_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_sells_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_sell_children`
--
ALTER TABLE `sm_item_sell_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_sell_children_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_sell_children_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_item_stores`
--
ALTER TABLE `sm_item_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_item_stores_school_id_foreign` (`school_id`),
  ADD KEY `sm_item_stores_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_languages`
--
ALTER TABLE `sm_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_languages_lang_id_foreign` (`lang_id`),
  ADD KEY `sm_languages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_language_phrases`
--
ALTER TABLE `sm_language_phrases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_language_phrases_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_leave_deduction_infos`
--
ALTER TABLE `sm_leave_deduction_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_leave_deduction_infos_school_id_foreign` (`school_id`),
  ADD KEY `sm_leave_deduction_infos_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_leave_defines`
--
ALTER TABLE `sm_leave_defines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_leave_defines_role_id_foreign` (`role_id`),
  ADD KEY `sm_leave_defines_user_id_foreign` (`user_id`),
  ADD KEY `sm_leave_defines_type_id_foreign` (`type_id`),
  ADD KEY `sm_leave_defines_school_id_foreign` (`school_id`),
  ADD KEY `sm_leave_defines_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_leave_requests`
--
ALTER TABLE `sm_leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_leave_requests_leave_define_id_foreign` (`leave_define_id`),
  ADD KEY `sm_leave_requests_staff_id_foreign` (`staff_id`),
  ADD KEY `sm_leave_requests_role_id_foreign` (`role_id`),
  ADD KEY `sm_leave_requests_type_id_foreign` (`type_id`),
  ADD KEY `sm_leave_requests_school_id_foreign` (`school_id`),
  ADD KEY `sm_leave_requests_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_leave_types`
--
ALTER TABLE `sm_leave_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_leave_types_school_id_foreign` (`school_id`),
  ADD KEY `sm_leave_types_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_lessons`
--
ALTER TABLE `sm_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_lessons_class_id_foreign` (`class_id`),
  ADD KEY `sm_lessons_section_id_foreign` (`section_id`),
  ADD KEY `sm_lessons_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_lessons_school_id_foreign` (`school_id`),
  ADD KEY `sm_lessons_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_lesson_details`
--
ALTER TABLE `sm_lesson_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_lesson_details_class_id_foreign` (`class_id`),
  ADD KEY `sm_lesson_details_section_id_foreign` (`section_id`),
  ADD KEY `sm_lesson_details_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_lesson_details_school_id_foreign` (`school_id`),
  ADD KEY `sm_lesson_details_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_lesson_topics`
--
ALTER TABLE `sm_lesson_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_lesson_topics_class_id_foreign` (`class_id`),
  ADD KEY `sm_lesson_topics_section_id_foreign` (`section_id`),
  ADD KEY `sm_lesson_topics_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_lesson_topics_school_id_foreign` (`school_id`),
  ADD KEY `sm_lesson_topics_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_lesson_topic_details`
--
ALTER TABLE `sm_lesson_topic_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_lesson_topic_details_topic_id_foreign` (`topic_id`),
  ADD KEY `sm_lesson_topic_details_school_id_foreign` (`school_id`),
  ADD KEY `sm_lesson_topic_details_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_library_members`
--
ALTER TABLE `sm_library_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_library_members_member_type_foreign` (`member_type`),
  ADD KEY `sm_library_members_student_staff_id_foreign` (`student_staff_id`),
  ADD KEY `sm_library_members_school_id_foreign` (`school_id`),
  ADD KEY `sm_library_members_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_marks_grades`
--
ALTER TABLE `sm_marks_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_marks_grades_school_id_foreign` (`school_id`),
  ADD KEY `sm_marks_grades_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_marks_registers`
--
ALTER TABLE `sm_marks_registers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_marks_registers_student_id_foreign` (`student_id`),
  ADD KEY `sm_marks_registers_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_marks_registers_class_id_foreign` (`class_id`),
  ADD KEY `sm_marks_registers_section_id_foreign` (`section_id`),
  ADD KEY `sm_marks_registers_school_id_foreign` (`school_id`),
  ADD KEY `sm_marks_registers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_marks_register_children`
--
ALTER TABLE `sm_marks_register_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_marks_register_children_marks_register_id_foreign` (`marks_register_id`),
  ADD KEY `sm_marks_register_children_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_marks_register_children_school_id_foreign` (`school_id`),
  ADD KEY `sm_marks_register_children_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_marks_send_sms`
--
ALTER TABLE `sm_marks_send_sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_marks_send_sms_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_marks_send_sms_student_id_foreign` (`student_id`),
  ADD KEY `sm_marks_send_sms_school_id_foreign` (`school_id`),
  ADD KEY `sm_marks_send_sms_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_mark_stores`
--
ALTER TABLE `sm_mark_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_mark_stores_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_mark_stores_exam_term_id_foreign` (`exam_term_id`),
  ADD KEY `sm_mark_stores_exam_setup_id_foreign` (`exam_setup_id`),
  ADD KEY `sm_mark_stores_student_id_foreign` (`student_id`),
  ADD KEY `sm_mark_stores_student_record_id_foreign` (`student_record_id`),
  ADD KEY `sm_mark_stores_class_id_foreign` (`class_id`),
  ADD KEY `sm_mark_stores_section_id_foreign` (`section_id`),
  ADD KEY `sm_mark_stores_school_id_foreign` (`school_id`),
  ADD KEY `sm_mark_stores_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_menus`
--
ALTER TABLE `sm_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_modules`
--
ALTER TABLE `sm_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_modules_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_module_links`
--
ALTER TABLE `sm_module_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_module_links_module_id_foreign` (`module_id`),
  ADD KEY `sm_module_links_created_by_foreign` (`created_by`),
  ADD KEY `sm_module_links_updated_by_foreign` (`updated_by`),
  ADD KEY `sm_module_links_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_module_permissions`
--
ALTER TABLE `sm_module_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_module_permissions_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_module_permission_assigns`
--
ALTER TABLE `sm_module_permission_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_module_permission_assigns_module_id_foreign` (`module_id`),
  ADD KEY `sm_module_permission_assigns_role_id_foreign` (`role_id`),
  ADD KEY `sm_module_permission_assigns_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_news`
--
ALTER TABLE `sm_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_news_category_id_foreign` (`category_id`);

--
-- Indexes for table `sm_news_categories`
--
ALTER TABLE `sm_news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_news_comments`
--
ALTER TABLE `sm_news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_news_comments_news_id_foreign` (`news_id`),
  ADD KEY `sm_news_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `sm_news_pages`
--
ALTER TABLE `sm_news_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_news_pages_created_by_foreign` (`created_by`),
  ADD KEY `sm_news_pages_updated_by_foreign` (`updated_by`),
  ADD KEY `sm_news_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_notice_boards`
--
ALTER TABLE `sm_notice_boards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_notice_boards_school_id_foreign` (`school_id`),
  ADD KEY `sm_notice_boards_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_notifications`
--
ALTER TABLE `sm_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_notifications_school_id_foreign` (`school_id`),
  ADD KEY `sm_notifications_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_notification_settings`
--
ALTER TABLE `sm_notification_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_notification_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_online_exams`
--
ALTER TABLE `sm_online_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_online_exams_class_id_foreign` (`class_id`),
  ADD KEY `sm_online_exams_section_id_foreign` (`section_id`),
  ADD KEY `sm_online_exams_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_online_exams_school_id_foreign` (`school_id`),
  ADD KEY `sm_online_exams_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_online_exam_marks`
--
ALTER TABLE `sm_online_exam_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_online_exam_marks_student_id_foreign` (`student_id`),
  ADD KEY `sm_online_exam_marks_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_online_exam_marks_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_online_exam_marks_school_id_foreign` (`school_id`),
  ADD KEY `sm_online_exam_marks_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_online_exam_questions`
--
ALTER TABLE `sm_online_exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_online_exam_questions_online_exam_id_foreign` (`online_exam_id`),
  ADD KEY `sm_online_exam_questions_school_id_foreign` (`school_id`),
  ADD KEY `sm_online_exam_questions_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_online_exam_question_assigns`
--
ALTER TABLE `sm_online_exam_question_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_online_exam_question_assigns_online_exam_id_foreign` (`online_exam_id`),
  ADD KEY `sm_online_exam_question_assigns_question_bank_id_foreign` (`question_bank_id`),
  ADD KEY `sm_online_exam_question_assigns_school_id_foreign` (`school_id`),
  ADD KEY `sm_online_exam_question_assigns_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_online_exam_question_mu_options`
--
ALTER TABLE `sm_online_exam_question_mu_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `on_ex_qu_id` (`online_exam_question_id`),
  ADD KEY `sm_online_exam_question_mu_options_school_id_foreign` (`school_id`),
  ADD KEY `sm_online_exam_question_mu_options_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_optional_subject_assigns`
--
ALTER TABLE `sm_optional_subject_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_optional_subject_assigns_student_id_foreign` (`student_id`),
  ADD KEY `sm_optional_subject_assigns_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_optional_subject_assigns_school_id_foreign` (`school_id`),
  ADD KEY `sm_optional_subject_assigns_session_id_foreign` (`session_id`),
  ADD KEY `sm_optional_subject_assigns_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_pages`
--
ALTER TABLE `sm_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sm_pages_sub_title_unique` (`sub_title`),
  ADD KEY `sm_pages_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_parents`
--
ALTER TABLE `sm_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_parents_user_id_foreign` (`user_id`),
  ADD KEY `sm_parents_school_id_foreign` (`school_id`),
  ADD KEY `sm_parents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_payment_gateway_settings`
--
ALTER TABLE `sm_payment_gateway_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_payment_gateway_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_payment_methhods`
--
ALTER TABLE `sm_payment_methhods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_payment_methhods_gateway_id_foreign` (`gateway_id`),
  ADD KEY `sm_payment_methhods_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_phone_call_logs`
--
ALTER TABLE `sm_phone_call_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_phone_call_logs_school_id_foreign` (`school_id`),
  ADD KEY `sm_phone_call_logs_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_photo_galleries`
--
ALTER TABLE `sm_photo_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_photo_galleries_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_postal_dispatches`
--
ALTER TABLE `sm_postal_dispatches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_postal_dispatches_school_id_foreign` (`school_id`),
  ADD KEY `sm_postal_dispatches_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_postal_receives`
--
ALTER TABLE `sm_postal_receives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_postal_receives_school_id_foreign` (`school_id`),
  ADD KEY `sm_postal_receives_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_product_purchases`
--
ALTER TABLE `sm_product_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_product_purchases_user_id_foreign` (`user_id`),
  ADD KEY `sm_product_purchases_staff_id_foreign` (`staff_id`),
  ADD KEY `sm_product_purchases_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_question_banks`
--
ALTER TABLE `sm_question_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_question_banks_q_group_id_foreign` (`q_group_id`),
  ADD KEY `sm_question_banks_class_id_foreign` (`class_id`),
  ADD KEY `sm_question_banks_section_id_foreign` (`section_id`),
  ADD KEY `sm_question_banks_school_id_foreign` (`school_id`),
  ADD KEY `sm_question_banks_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_question_bank_mu_options`
--
ALTER TABLE `sm_question_bank_mu_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_question_bank_mu_options_question_bank_id_foreign` (`question_bank_id`),
  ADD KEY `sm_question_bank_mu_options_school_id_foreign` (`school_id`),
  ADD KEY `sm_question_bank_mu_options_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_question_groups`
--
ALTER TABLE `sm_question_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_question_groups_school_id_foreign` (`school_id`),
  ADD KEY `sm_question_groups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_question_levels`
--
ALTER TABLE `sm_question_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_question_levels_school_id_foreign` (`school_id`),
  ADD KEY `sm_question_levels_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_result_stores`
--
ALTER TABLE `sm_result_stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_result_stores_exam_type_id_foreign` (`exam_type_id`),
  ADD KEY `sm_result_stores_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_result_stores_exam_setup_id_foreign` (`exam_setup_id`),
  ADD KEY `sm_result_stores_student_id_foreign` (`student_id`),
  ADD KEY `sm_result_stores_student_record_id_foreign` (`student_record_id`),
  ADD KEY `sm_result_stores_class_id_foreign` (`class_id`),
  ADD KEY `sm_result_stores_section_id_foreign` (`section_id`),
  ADD KEY `sm_result_stores_school_id_foreign` (`school_id`),
  ADD KEY `sm_result_stores_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_role_permissions`
--
ALTER TABLE `sm_role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_role_permissions_module_link_id_foreign` (`module_link_id`),
  ADD KEY `sm_role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `sm_role_permissions_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_room_lists`
--
ALTER TABLE `sm_room_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_room_lists_dormitory_id_foreign` (`dormitory_id`),
  ADD KEY `sm_room_lists_room_type_id_foreign` (`room_type_id`),
  ADD KEY `sm_room_lists_school_id_foreign` (`school_id`),
  ADD KEY `sm_room_lists_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_room_types`
--
ALTER TABLE `sm_room_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_room_types_school_id_foreign` (`school_id`),
  ADD KEY `sm_room_types_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_routes`
--
ALTER TABLE `sm_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_routes_school_id_foreign` (`school_id`),
  ADD KEY `sm_routes_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_schools`
--
ALTER TABLE `sm_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_seat_plans`
--
ALTER TABLE `sm_seat_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_seat_plans_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_seat_plans_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_seat_plans_class_id_foreign` (`class_id`),
  ADD KEY `sm_seat_plans_section_id_foreign` (`section_id`),
  ADD KEY `sm_seat_plans_school_id_foreign` (`school_id`),
  ADD KEY `sm_seat_plans_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_seat_plan_children`
--
ALTER TABLE `sm_seat_plan_children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_seat_plan_children_seat_plan_id_foreign` (`seat_plan_id`),
  ADD KEY `sm_seat_plan_children_school_id_foreign` (`school_id`),
  ADD KEY `sm_seat_plan_children_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_sections`
--
ALTER TABLE `sm_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_sections_school_id_foreign` (`school_id`),
  ADD KEY `sm_sections_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_send_messages`
--
ALTER TABLE `sm_send_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_send_messages_school_id_foreign` (`school_id`),
  ADD KEY `sm_send_messages_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_sessions`
--
ALTER TABLE `sm_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_sessions_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_setup_admins`
--
ALTER TABLE `sm_setup_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_setup_admins_school_id_foreign` (`school_id`),
  ADD KEY `sm_setup_admins_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_sms_gateways`
--
ALTER TABLE `sm_sms_gateways`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_sms_gateways_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_social_media_icons`
--
ALTER TABLE `sm_social_media_icons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_social_media_icons_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_staffs`
--
ALTER TABLE `sm_staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_staffs_designation_id_foreign` (`designation_id`),
  ADD KEY `sm_staffs_department_id_foreign` (`department_id`),
  ADD KEY `sm_staffs_user_id_foreign` (`user_id`),
  ADD KEY `sm_staffs_role_id_foreign` (`role_id`),
  ADD KEY `sm_staffs_gender_id_foreign` (`gender_id`),
  ADD KEY `sm_staffs_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_staff_attendance_imports`
--
ALTER TABLE `sm_staff_attendance_imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_staff_attendance_imports_staff_id_foreign` (`staff_id`),
  ADD KEY `sm_staff_attendance_imports_school_id_foreign` (`school_id`),
  ADD KEY `sm_staff_attendance_imports_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_staff_attendences`
--
ALTER TABLE `sm_staff_attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_staff_attendences_staff_id_foreign` (`staff_id`),
  ADD KEY `sm_staff_attendences_school_id_foreign` (`school_id`),
  ADD KEY `sm_staff_attendences_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_staff_registration_fields`
--
ALTER TABLE `sm_staff_registration_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_staff_registration_fields_school_id_foreign` (`school_id`),
  ADD KEY `sm_staff_registration_fields_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_students`
--
ALTER TABLE `sm_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_students_bloodgroup_id_foreign` (`bloodgroup_id`),
  ADD KEY `sm_students_religion_id_foreign` (`religion_id`),
  ADD KEY `sm_students_route_list_id_foreign` (`route_list_id`),
  ADD KEY `sm_students_dormitory_id_foreign` (`dormitory_id`),
  ADD KEY `sm_students_vechile_id_foreign` (`vechile_id`),
  ADD KEY `sm_students_room_id_foreign` (`room_id`),
  ADD KEY `sm_students_student_category_id_foreign` (`student_category_id`),
  ADD KEY `sm_students_student_group_id_foreign` (`student_group_id`),
  ADD KEY `sm_students_class_id_foreign` (`class_id`),
  ADD KEY `sm_students_section_id_foreign` (`section_id`),
  ADD KEY `sm_students_session_id_foreign` (`session_id`),
  ADD KEY `sm_students_parent_id_foreign` (`parent_id`),
  ADD KEY `sm_students_user_id_foreign` (`user_id`),
  ADD KEY `sm_students_role_id_foreign` (`role_id`),
  ADD KEY `sm_students_gender_id_foreign` (`gender_id`),
  ADD KEY `sm_students_school_id_foreign` (`school_id`),
  ADD KEY `sm_students_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_attendances`
--
ALTER TABLE `sm_student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_attendances_student_id_foreign` (`student_id`),
  ADD KEY `sm_student_attendances_class_id_foreign` (`class_id`),
  ADD KEY `sm_student_attendances_section_id_foreign` (`section_id`),
  ADD KEY `sm_student_attendances_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_attendances_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_attendance_imports`
--
ALTER TABLE `sm_student_attendance_imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_attendance_imports_student_id_foreign` (`student_id`),
  ADD KEY `sm_student_attendance_imports_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_attendance_imports_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_categories`
--
ALTER TABLE `sm_student_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_categories_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_categories_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_certificates`
--
ALTER TABLE `sm_student_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_certificates_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_certificates_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_documents`
--
ALTER TABLE `sm_student_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_documents_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_documents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_excel_formats`
--
ALTER TABLE `sm_student_excel_formats`
  ADD KEY `sm_student_excel_formats_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_excel_formats_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_groups`
--
ALTER TABLE `sm_student_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_groups_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_groups_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_homeworks`
--
ALTER TABLE `sm_student_homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_homeworks_evaluated_by_foreign` (`evaluated_by`),
  ADD KEY `sm_student_homeworks_student_id_foreign` (`student_id`),
  ADD KEY `sm_student_homeworks_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_student_homeworks_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_homeworks_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_id_cards`
--
ALTER TABLE `sm_student_id_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_id_cards_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_id_cards_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_promotions`
--
ALTER TABLE `sm_student_promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_promotions_previous_class_id_foreign` (`previous_class_id`),
  ADD KEY `sm_student_promotions_current_class_id_foreign` (`current_class_id`),
  ADD KEY `sm_student_promotions_previous_section_id_foreign` (`previous_section_id`),
  ADD KEY `sm_student_promotions_current_section_id_foreign` (`current_section_id`),
  ADD KEY `sm_student_promotions_previous_session_id_foreign` (`previous_session_id`),
  ADD KEY `sm_student_promotions_current_session_id_foreign` (`current_session_id`),
  ADD KEY `sm_student_promotions_student_id_foreign` (`student_id`),
  ADD KEY `sm_student_promotions_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_promotions_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_registration_fields`
--
ALTER TABLE `sm_student_registration_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_registration_fields_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_registration_fields_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_take_online_exams`
--
ALTER TABLE `sm_student_take_online_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_take_online_exams_student_id_foreign` (`student_id`),
  ADD KEY `sm_student_take_online_exams_online_exam_id_foreign` (`online_exam_id`),
  ADD KEY `sm_student_take_online_exams_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_take_online_exams_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_take_online_exam_questions`
--
ALTER TABLE `sm_student_take_online_exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_on_ex_id` (`take_online_exam_id`),
  ADD KEY `sm_student_take_online_exam_questions_question_bank_id_foreign` (`question_bank_id`),
  ADD KEY `sm_student_take_online_exam_questions_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_take_online_exam_questions_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_take_onln_ex_ques_options`
--
ALTER TABLE `sm_student_take_onln_ex_ques_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_on_ex_q_id` (`take_online_exam_question_id`),
  ADD KEY `sm_student_take_onln_ex_ques_options_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_take_onln_ex_ques_options_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_student_timelines`
--
ALTER TABLE `sm_student_timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_student_timelines_school_id_foreign` (`school_id`),
  ADD KEY `sm_student_timelines_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_styles`
--
ALTER TABLE `sm_styles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_styles_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_subjects`
--
ALTER TABLE `sm_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_subjects_school_id_foreign` (`school_id`),
  ADD KEY `sm_subjects_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_subject_attendances`
--
ALTER TABLE `sm_subject_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_subject_attendances_class_id_foreign` (`class_id`),
  ADD KEY `sm_subject_attendances_section_id_foreign` (`section_id`),
  ADD KEY `sm_subject_attendances_subject_id_foreign` (`subject_id`),
  ADD KEY `sm_subject_attendances_student_id_foreign` (`student_id`),
  ADD KEY `sm_subject_attendances_student_record_id_foreign` (`student_record_id`),
  ADD KEY `sm_subject_attendances_school_id_foreign` (`school_id`),
  ADD KEY `sm_subject_attendances_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_suppliers`
--
ALTER TABLE `sm_suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_suppliers_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_system_versions`
--
ALTER TABLE `sm_system_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_teacher_upload_contents`
--
ALTER TABLE `sm_teacher_upload_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_teacher_upload_contents_class_foreign` (`class`),
  ADD KEY `sm_teacher_upload_contents_school_id_foreign` (`school_id`),
  ADD KEY `sm_teacher_upload_contents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_temporary_meritlists`
--
ALTER TABLE `sm_temporary_meritlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_temporary_meritlists_exam_id_foreign` (`exam_id`),
  ADD KEY `sm_temporary_meritlists_class_id_foreign` (`class_id`),
  ADD KEY `sm_temporary_meritlists_section_id_foreign` (`section_id`),
  ADD KEY `sm_temporary_meritlists_school_id_foreign` (`school_id`),
  ADD KEY `sm_temporary_meritlists_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_testimonials`
--
ALTER TABLE `sm_testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_testimonials_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_time_zones`
--
ALTER TABLE `sm_time_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sm_to_dos`
--
ALTER TABLE `sm_to_dos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_to_dos_school_id_foreign` (`school_id`),
  ADD KEY `sm_to_dos_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_upload_contents`
--
ALTER TABLE `sm_upload_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_upload_contents_school_id_foreign` (`school_id`),
  ADD KEY `sm_upload_contents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_upload_homework_contents`
--
ALTER TABLE `sm_upload_homework_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_upload_homework_contents_student_id_foreign` (`student_id`),
  ADD KEY `sm_upload_homework_contents_homework_id_foreign` (`homework_id`),
  ADD KEY `sm_upload_homework_contents_school_id_foreign` (`school_id`),
  ADD KEY `sm_upload_homework_contents_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_user_logs`
--
ALTER TABLE `sm_user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_user_logs_user_id_foreign` (`user_id`),
  ADD KEY `sm_user_logs_role_id_foreign` (`role_id`),
  ADD KEY `sm_user_logs_school_id_foreign` (`school_id`),
  ADD KEY `sm_user_logs_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_vehicles`
--
ALTER TABLE `sm_vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_vehicles_school_id_foreign` (`school_id`),
  ADD KEY `sm_vehicles_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_video_galleries`
--
ALTER TABLE `sm_video_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_video_galleries_school_id_foreign` (`school_id`);

--
-- Indexes for table `sm_visitors`
--
ALTER TABLE `sm_visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_visitors_school_id_foreign` (`school_id`),
  ADD KEY `sm_visitors_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `sm_weekends`
--
ALTER TABLE `sm_weekends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sm_weekends_school_id_foreign` (`school_id`),
  ADD KEY `sm_weekends_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `speech_sliders`
--
ALTER TABLE `speech_sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speech_sliders_school_id_foreign` (`school_id`);

--
-- Indexes for table `staff_import_bulk_temporaries`
--
ALTER TABLE `staff_import_bulk_temporaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_import_bulk_temporaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_academic_histories`
--
ALTER TABLE `student_academic_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_academic_histories_student_id_foreign` (`student_id`),
  ADD KEY `student_academic_histories_school_id_foreign` (`school_id`),
  ADD KEY `student_academic_histories_academic_id_foreign` (`academic_id`);

--
-- Indexes for table `student_attendance_bulks`
--
ALTER TABLE `student_attendance_bulks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_bulk_temporaries`
--
ALTER TABLE `student_bulk_temporaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_records_class_id_foreign` (`class_id`),
  ADD KEY `student_records_section_id_foreign` (`section_id`),
  ADD KEY `student_records_session_id_foreign` (`session_id`),
  ADD KEY `student_records_school_id_foreign` (`school_id`),
  ADD KEY `student_records_academic_id_foreign` (`academic_id`),
  ADD KEY `student_records_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_record_temporaries`
--
ALTER TABLE `student_record_temporaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_record_temporaries_sm_student_id_foreign` (`sm_student_id`),
  ADD KEY `student_record_temporaries_student_record_id_foreign` (`student_record_id`),
  ADD KEY `student_record_temporaries_school_id_foreign` (`school_id`);

--
-- Indexes for table `teacher_evaluations`
--
ALTER TABLE `teacher_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_evaluation_settings`
--
ALTER TABLE `teacher_evaluation_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `themes_school_id_foreign` (`school_id`);

--
-- Indexes for table `transcations`
--
ALTER TABLE `transcations`
  ADD KEY `transcations_user_id_foreign` (`user_id`);

--
-- Indexes for table `two_factor_settings`
--
ALTER TABLE `two_factor_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `two_factor_settings_school_id_foreign` (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_school_id_foreign` (`school_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_otp_codes`
--
ALTER TABLE `user_otp_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_otp_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `version_histories`
--
ALTER TABLE `version_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_uploads`
--
ALTER TABLE `video_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_uploads_academic_id_foreign` (`academic_id`),
  ADD KEY `video_uploads_school_id_foreign` (`school_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_transactions_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absent_notification_time_setups`
--
ALTER TABLE `absent_notification_time_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admit_cards`
--
ALTER TABLE `admit_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admit_card_settings`
--
ALTER TABLE `admit_card_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_exam_wise_positions`
--
ALTER TABLE `all_exam_wise_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_incidents`
--
ALTER TABLE `assign_incidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_incident_comments`
--
ALTER TABLE `assign_incident_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_permissions`
--
ALTER TABLE `assign_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `behaviour_record_settings`
--
ALTER TABLE `behaviour_record_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_block_users`
--
ALTER TABLE `chat_block_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_group_message_recipients`
--
ALTER TABLE `chat_group_message_recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_group_message_removes`
--
ALTER TABLE `chat_group_message_removes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_group_users`
--
ALTER TABLE `chat_group_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_invitations`
--
ALTER TABLE `chat_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_invitation_types`
--
ALTER TABLE `chat_invitation_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_statuses`
--
ALTER TABLE `chat_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_classes`
--
ALTER TABLE `check_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_theme`
--
ALTER TABLE `color_theme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_share_lists`
--
ALTER TABLE `content_share_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_types`
--
ALTER TABLE `content_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continents`
--
ALTER TABLE `continents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `continets`
--
ALTER TABLE `continets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_result_settings`
--
ALTER TABLE `custom_result_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_sms_settings`
--
ALTER TABLE `custom_sms_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_menus`
--
ALTER TABLE `default_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_fees_installments`
--
ALTER TABLE `direct_fees_installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_fees_installment_assigns`
--
ALTER TABLE `direct_fees_installment_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_fees_reminders`
--
ALTER TABLE `direct_fees_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_fees_settings`
--
ALTER TABLE `direct_fees_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dire_fees_installment_child_payments`
--
ALTER TABLE `dire_fees_installment_child_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `due_fees_login_prevents`
--
ALTER TABLE `due_fees_login_prevents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_merit_positions`
--
ALTER TABLE `exam_merit_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_step_skips`
--
ALTER TABLE `exam_step_skips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_carry_forward_logs`
--
ALTER TABLE `fees_carry_forward_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_carry_forward_settings`
--
ALTER TABLE `fees_carry_forward_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_installment_credits`
--
ALTER TABLE `fees_installment_credits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_invoice_settings`
--
ALTER TABLE `fees_invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_groups`
--
ALTER TABLE `fm_fees_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_invoices`
--
ALTER TABLE `fm_fees_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_invoice_chields`
--
ALTER TABLE `fm_fees_invoice_chields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_invoice_settings`
--
ALTER TABLE `fm_fees_invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_transactions`
--
ALTER TABLE `fm_fees_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_transaction_chields`
--
ALTER TABLE `fm_fees_transaction_chields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_types`
--
ALTER TABLE `fm_fees_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fm_fees_weavers`
--
ALTER TABLE `fm_fees_weavers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_exam_results`
--
ALTER TABLE `frontend_exam_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_academic_calendars`
--
ALTER TABLE `front_academic_calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_class_routines`
--
ALTER TABLE `front_class_routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_exam_routines`
--
ALTER TABLE `front_exam_routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_results`
--
ALTER TABLE `front_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `graduates`
--
ALTER TABLE `graduates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incidents`
--
ALTER TABLE `incidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infixedu__pages`
--
ALTER TABLE `infixedu__pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infix_module_infos`
--
ALTER TABLE `infix_module_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infix_module_managers`
--
ALTER TABLE `infix_module_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infix_module_student_parent_infos`
--
ALTER TABLE `infix_module_student_parent_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infix_permission_assigns`
--
ALTER TABLE `infix_permission_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infix_roles`
--
ALTER TABLE `infix_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_planners`
--
ALTER TABLE `lesson_planners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_plan_topics`
--
ALTER TABLE `lesson_plan_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_subjects`
--
ALTER TABLE `library_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_settings`
--
ALTER TABLE `maintenance_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_student_answer_markings`
--
ALTER TABLE `online_exam_student_answer_markings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_payments`
--
ALTER TABLE `payroll_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_sections`
--
ALTER TABLE `permission_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pulse_entries`
--
ALTER TABLE `pulse_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pulse_values`
--
ALTER TABLE `pulse_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_modules`
--
ALTER TABLE `school_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_plans`
--
ALTER TABLE `seat_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat_plan_settings`
--
ALTER TABLE `seat_plan_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sidebars`
--
ALTER TABLE `sidebars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_templates`
--
ALTER TABLE `sms_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_about_pages`
--
ALTER TABLE `sm_about_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_academic_years`
--
ALTER TABLE `sm_academic_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_add_expenses`
--
ALTER TABLE `sm_add_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_add_incomes`
--
ALTER TABLE `sm_add_incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_add_ons`
--
ALTER TABLE `sm_add_ons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_admission_queries`
--
ALTER TABLE `sm_admission_queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_admission_query_followups`
--
ALTER TABLE `sm_admission_query_followups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_amount_transfers`
--
ALTER TABLE `sm_amount_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_assign_class_teachers`
--
ALTER TABLE `sm_assign_class_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_assign_subjects`
--
ALTER TABLE `sm_assign_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_assign_vehicles`
--
ALTER TABLE `sm_assign_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_background_settings`
--
ALTER TABLE `sm_background_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_backups`
--
ALTER TABLE `sm_backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_bank_accounts`
--
ALTER TABLE `sm_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_bank_payment_slips`
--
ALTER TABLE `sm_bank_payment_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_bank_statements`
--
ALTER TABLE `sm_bank_statements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_base_groups`
--
ALTER TABLE `sm_base_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_base_setups`
--
ALTER TABLE `sm_base_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_books`
--
ALTER TABLE `sm_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_book_categories`
--
ALTER TABLE `sm_book_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_book_issues`
--
ALTER TABLE `sm_book_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_calendar_settings`
--
ALTER TABLE `sm_calendar_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_chart_of_accounts`
--
ALTER TABLE `sm_chart_of_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_classes`
--
ALTER TABLE `sm_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_exam_routine_pages`
--
ALTER TABLE `sm_class_exam_routine_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_optional_subject`
--
ALTER TABLE `sm_class_optional_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_rooms`
--
ALTER TABLE `sm_class_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_routines`
--
ALTER TABLE `sm_class_routines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_routine_updates`
--
ALTER TABLE `sm_class_routine_updates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_sections`
--
ALTER TABLE `sm_class_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_teachers`
--
ALTER TABLE `sm_class_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_class_times`
--
ALTER TABLE `sm_class_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_complaints`
--
ALTER TABLE `sm_complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_contact_messages`
--
ALTER TABLE `sm_contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_contact_pages`
--
ALTER TABLE `sm_contact_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_content_types`
--
ALTER TABLE `sm_content_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_countries`
--
ALTER TABLE `sm_countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_courses`
--
ALTER TABLE `sm_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_course_categories`
--
ALTER TABLE `sm_course_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_course_pages`
--
ALTER TABLE `sm_course_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_currencies`
--
ALTER TABLE `sm_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_custom_fields`
--
ALTER TABLE `sm_custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_custom_links`
--
ALTER TABLE `sm_custom_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_custom_temporary_results`
--
ALTER TABLE `sm_custom_temporary_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_dashboard_settings`
--
ALTER TABLE `sm_dashboard_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_date_formats`
--
ALTER TABLE `sm_date_formats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_designations`
--
ALTER TABLE `sm_designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_donors`
--
ALTER TABLE `sm_donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_dormitory_lists`
--
ALTER TABLE `sm_dormitory_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_email_settings`
--
ALTER TABLE `sm_email_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_email_sms_logs`
--
ALTER TABLE `sm_email_sms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_events`
--
ALTER TABLE `sm_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exams`
--
ALTER TABLE `sm_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_attendances`
--
ALTER TABLE `sm_exam_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_attendance_children`
--
ALTER TABLE `sm_exam_attendance_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_marks_registers`
--
ALTER TABLE `sm_exam_marks_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_schedules`
--
ALTER TABLE `sm_exam_schedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_schedule_subjects`
--
ALTER TABLE `sm_exam_schedule_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_settings`
--
ALTER TABLE `sm_exam_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_setups`
--
ALTER TABLE `sm_exam_setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_signatures`
--
ALTER TABLE `sm_exam_signatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_exam_types`
--
ALTER TABLE `sm_exam_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_expense_heads`
--
ALTER TABLE `sm_expense_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_expert_teachers`
--
ALTER TABLE `sm_expert_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_assigns`
--
ALTER TABLE `sm_fees_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_assign_discounts`
--
ALTER TABLE `sm_fees_assign_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_carry_forwards`
--
ALTER TABLE `sm_fees_carry_forwards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_discounts`
--
ALTER TABLE `sm_fees_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_groups`
--
ALTER TABLE `sm_fees_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_masters`
--
ALTER TABLE `sm_fees_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_payments`
--
ALTER TABLE `sm_fees_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_fees_types`
--
ALTER TABLE `sm_fees_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_form_downloads`
--
ALTER TABLE `sm_form_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_frontend_persmissions`
--
ALTER TABLE `sm_frontend_persmissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_general_settings`
--
ALTER TABLE `sm_general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_header_menu_managers`
--
ALTER TABLE `sm_header_menu_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_holidays`
--
ALTER TABLE `sm_holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_homeworks`
--
ALTER TABLE `sm_homeworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_homework_students`
--
ALTER TABLE `sm_homework_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_home_page_settings`
--
ALTER TABLE `sm_home_page_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_hourly_rates`
--
ALTER TABLE `sm_hourly_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_hr_payroll_earn_deducs`
--
ALTER TABLE `sm_hr_payroll_earn_deducs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_hr_payroll_generates`
--
ALTER TABLE `sm_hr_payroll_generates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_hr_salary_templates`
--
ALTER TABLE `sm_hr_salary_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_human_departments`
--
ALTER TABLE `sm_human_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_income_heads`
--
ALTER TABLE `sm_income_heads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_instructions`
--
ALTER TABLE `sm_instructions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_inventory_payments`
--
ALTER TABLE `sm_inventory_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_items`
--
ALTER TABLE `sm_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_categories`
--
ALTER TABLE `sm_item_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_issues`
--
ALTER TABLE `sm_item_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_receives`
--
ALTER TABLE `sm_item_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_receive_children`
--
ALTER TABLE `sm_item_receive_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_sells`
--
ALTER TABLE `sm_item_sells`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_sell_children`
--
ALTER TABLE `sm_item_sell_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_item_stores`
--
ALTER TABLE `sm_item_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_languages`
--
ALTER TABLE `sm_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_language_phrases`
--
ALTER TABLE `sm_language_phrases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_leave_deduction_infos`
--
ALTER TABLE `sm_leave_deduction_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_leave_defines`
--
ALTER TABLE `sm_leave_defines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_leave_requests`
--
ALTER TABLE `sm_leave_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_leave_types`
--
ALTER TABLE `sm_leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_lessons`
--
ALTER TABLE `sm_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_lesson_details`
--
ALTER TABLE `sm_lesson_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_lesson_topics`
--
ALTER TABLE `sm_lesson_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_lesson_topic_details`
--
ALTER TABLE `sm_lesson_topic_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_library_members`
--
ALTER TABLE `sm_library_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_marks_grades`
--
ALTER TABLE `sm_marks_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_marks_registers`
--
ALTER TABLE `sm_marks_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_marks_register_children`
--
ALTER TABLE `sm_marks_register_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_marks_send_sms`
--
ALTER TABLE `sm_marks_send_sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_mark_stores`
--
ALTER TABLE `sm_mark_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_menus`
--
ALTER TABLE `sm_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_modules`
--
ALTER TABLE `sm_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_module_links`
--
ALTER TABLE `sm_module_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_module_permissions`
--
ALTER TABLE `sm_module_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_module_permission_assigns`
--
ALTER TABLE `sm_module_permission_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_news`
--
ALTER TABLE `sm_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_news_categories`
--
ALTER TABLE `sm_news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_news_comments`
--
ALTER TABLE `sm_news_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_news_pages`
--
ALTER TABLE `sm_news_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_notice_boards`
--
ALTER TABLE `sm_notice_boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_notifications`
--
ALTER TABLE `sm_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_notification_settings`
--
ALTER TABLE `sm_notification_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_online_exams`
--
ALTER TABLE `sm_online_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_online_exam_marks`
--
ALTER TABLE `sm_online_exam_marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_online_exam_questions`
--
ALTER TABLE `sm_online_exam_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_online_exam_question_assigns`
--
ALTER TABLE `sm_online_exam_question_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_online_exam_question_mu_options`
--
ALTER TABLE `sm_online_exam_question_mu_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_optional_subject_assigns`
--
ALTER TABLE `sm_optional_subject_assigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_pages`
--
ALTER TABLE `sm_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_parents`
--
ALTER TABLE `sm_parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_payment_gateway_settings`
--
ALTER TABLE `sm_payment_gateway_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_payment_methhods`
--
ALTER TABLE `sm_payment_methhods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_phone_call_logs`
--
ALTER TABLE `sm_phone_call_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_photo_galleries`
--
ALTER TABLE `sm_photo_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_postal_dispatches`
--
ALTER TABLE `sm_postal_dispatches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_postal_receives`
--
ALTER TABLE `sm_postal_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_product_purchases`
--
ALTER TABLE `sm_product_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_question_banks`
--
ALTER TABLE `sm_question_banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_question_bank_mu_options`
--
ALTER TABLE `sm_question_bank_mu_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_question_groups`
--
ALTER TABLE `sm_question_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_question_levels`
--
ALTER TABLE `sm_question_levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_result_stores`
--
ALTER TABLE `sm_result_stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_role_permissions`
--
ALTER TABLE `sm_role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_room_lists`
--
ALTER TABLE `sm_room_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_room_types`
--
ALTER TABLE `sm_room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_routes`
--
ALTER TABLE `sm_routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_schools`
--
ALTER TABLE `sm_schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_seat_plans`
--
ALTER TABLE `sm_seat_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_seat_plan_children`
--
ALTER TABLE `sm_seat_plan_children`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_sections`
--
ALTER TABLE `sm_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_send_messages`
--
ALTER TABLE `sm_send_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_sessions`
--
ALTER TABLE `sm_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_setup_admins`
--
ALTER TABLE `sm_setup_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_sms_gateways`
--
ALTER TABLE `sm_sms_gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_social_media_icons`
--
ALTER TABLE `sm_social_media_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_staffs`
--
ALTER TABLE `sm_staffs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_staff_attendance_imports`
--
ALTER TABLE `sm_staff_attendance_imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_staff_attendences`
--
ALTER TABLE `sm_staff_attendences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_staff_registration_fields`
--
ALTER TABLE `sm_staff_registration_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_students`
--
ALTER TABLE `sm_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_attendances`
--
ALTER TABLE `sm_student_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_attendance_imports`
--
ALTER TABLE `sm_student_attendance_imports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_categories`
--
ALTER TABLE `sm_student_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_certificates`
--
ALTER TABLE `sm_student_certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_documents`
--
ALTER TABLE `sm_student_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_groups`
--
ALTER TABLE `sm_student_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_homeworks`
--
ALTER TABLE `sm_student_homeworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_id_cards`
--
ALTER TABLE `sm_student_id_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_promotions`
--
ALTER TABLE `sm_student_promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_registration_fields`
--
ALTER TABLE `sm_student_registration_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_take_online_exams`
--
ALTER TABLE `sm_student_take_online_exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_take_online_exam_questions`
--
ALTER TABLE `sm_student_take_online_exam_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_take_onln_ex_ques_options`
--
ALTER TABLE `sm_student_take_onln_ex_ques_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_student_timelines`
--
ALTER TABLE `sm_student_timelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_styles`
--
ALTER TABLE `sm_styles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_subjects`
--
ALTER TABLE `sm_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_subject_attendances`
--
ALTER TABLE `sm_subject_attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_suppliers`
--
ALTER TABLE `sm_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_system_versions`
--
ALTER TABLE `sm_system_versions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_teacher_upload_contents`
--
ALTER TABLE `sm_teacher_upload_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_temporary_meritlists`
--
ALTER TABLE `sm_temporary_meritlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_testimonials`
--
ALTER TABLE `sm_testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_time_zones`
--
ALTER TABLE `sm_time_zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_to_dos`
--
ALTER TABLE `sm_to_dos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_upload_contents`
--
ALTER TABLE `sm_upload_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_upload_homework_contents`
--
ALTER TABLE `sm_upload_homework_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_user_logs`
--
ALTER TABLE `sm_user_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_vehicles`
--
ALTER TABLE `sm_vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_video_galleries`
--
ALTER TABLE `sm_video_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_visitors`
--
ALTER TABLE `sm_visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sm_weekends`
--
ALTER TABLE `sm_weekends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `speech_sliders`
--
ALTER TABLE `speech_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_import_bulk_temporaries`
--
ALTER TABLE `staff_import_bulk_temporaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_academic_histories`
--
ALTER TABLE `student_academic_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance_bulks`
--
ALTER TABLE `student_attendance_bulks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_bulk_temporaries`
--
ALTER TABLE `student_bulk_temporaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_record_temporaries`
--
ALTER TABLE `student_record_temporaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_evaluations`
--
ALTER TABLE `teacher_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_evaluation_settings`
--
ALTER TABLE `teacher_evaluation_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `two_factor_settings`
--
ALTER TABLE `two_factor_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_otp_codes`
--
ALTER TABLE `user_otp_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `version_histories`
--
ALTER TABLE `version_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_uploads`
--
ALTER TABLE `video_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_permissions`
--
ALTER TABLE `assign_permissions`
  ADD CONSTRAINT `assign_permissions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_groups`
--
ALTER TABLE `chat_groups`
  ADD CONSTRAINT `chat_groups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_groups_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_groups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_groups_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_groups_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_groups_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `color_theme`
--
ALTER TABLE `color_theme`
  ADD CONSTRAINT `color_theme_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_theme_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_share_lists`
--
ALTER TABLE `content_share_lists`
  ADD CONSTRAINT `content_share_lists_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_share_lists_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_types`
--
ALTER TABLE `content_types`
  ADD CONSTRAINT `content_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `continents`
--
ALTER TABLE `continents`
  ADD CONSTRAINT `continents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `continets`
--
ALTER TABLE `continets`
  ADD CONSTRAINT `continets_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `countries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `custom_result_settings`
--
ALTER TABLE `custom_result_settings`
  ADD CONSTRAINT `custom_result_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custom_result_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `direct_fees_installments`
--
ALTER TABLE `direct_fees_installments`
  ADD CONSTRAINT `direct_fees_installments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `direct_fees_installment_assigns`
--
ALTER TABLE `direct_fees_installment_assigns`
  ADD CONSTRAINT `direct_fees_installment_assigns_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `sm_bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `direct_fees_installment_assigns_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `sm_fees_discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `direct_fees_installment_assigns_fees_type_id_foreign` FOREIGN KEY (`fees_type_id`) REFERENCES `sm_fees_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `direct_fees_installment_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `direct_fees_installment_assigns_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `direct_fees_reminders`
--
ALTER TABLE `direct_fees_reminders`
  ADD CONSTRAINT `direct_fees_reminders_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `direct_fees_settings`
--
ALTER TABLE `direct_fees_settings`
  ADD CONSTRAINT `direct_fees_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dire_fees_installment_child_payments`
--
ALTER TABLE `dire_fees_installment_child_payments`
  ADD CONSTRAINT `dire_fees_installment_child_payments_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `sm_bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dire_fees_installment_child_payments_fees_type_id_foreign` FOREIGN KEY (`fees_type_id`) REFERENCES `sm_fees_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dire_fees_installment_child_payments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dire_fees_installment_child_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `due_fees_login_prevents`
--
ALTER TABLE `due_fees_login_prevents`
  ADD CONSTRAINT `due_fees_login_prevents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_fees_login_prevents_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_fees_login_prevents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `due_fees_login_prevents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_step_skips`
--
ALTER TABLE `exam_step_skips`
  ADD CONSTRAINT `exam_step_skips_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_step_skips_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_carry_forward_logs`
--
ALTER TABLE `fees_carry_forward_logs`
  ADD CONSTRAINT `fees_carry_forward_logs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_carry_forward_settings`
--
ALTER TABLE `fees_carry_forward_settings`
  ADD CONSTRAINT `fees_carry_forward_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD CONSTRAINT `fees_invoices_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_invoice_settings`
--
ALTER TABLE `fees_invoice_settings`
  ADD CONSTRAINT `fees_invoice_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoice_settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoice_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoice_settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fm_fees_invoices`
--
ALTER TABLE `fm_fees_invoices`
  ADD CONSTRAINT `fm_fees_invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fm_fees_invoice_chields`
--
ALTER TABLE `fm_fees_invoice_chields`
  ADD CONSTRAINT `fm_fees_invoice_chields_fees_invoice_id_foreign` FOREIGN KEY (`fees_invoice_id`) REFERENCES `fm_fees_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fm_fees_transactions`
--
ALTER TABLE `fm_fees_transactions`
  ADD CONSTRAINT `fm_fees_transactions_fees_invoice_id_foreign` FOREIGN KEY (`fees_invoice_id`) REFERENCES `fm_fees_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fm_fees_transaction_chields`
--
ALTER TABLE `fm_fees_transaction_chields`
  ADD CONSTRAINT `fm_fees_transaction_chields_fees_transaction_id_foreign` FOREIGN KEY (`fees_transaction_id`) REFERENCES `fm_fees_transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fm_fees_weavers`
--
ALTER TABLE `fm_fees_weavers`
  ADD CONSTRAINT `fm_fees_weavers_fees_invoice_id_foreign` FOREIGN KEY (`fees_invoice_id`) REFERENCES `fm_fees_invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `frontend_exam_results`
--
ALTER TABLE `frontend_exam_results`
  ADD CONSTRAINT `frontend_exam_results_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_academic_calendars`
--
ALTER TABLE `front_academic_calendars`
  ADD CONSTRAINT `front_academic_calendars_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_class_routines`
--
ALTER TABLE `front_class_routines`
  ADD CONSTRAINT `front_class_routines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_exam_routines`
--
ALTER TABLE `front_exam_routines`
  ADD CONSTRAINT `front_exam_routines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_results`
--
ALTER TABLE `front_results`
  ADD CONSTRAINT `front_results_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `graduates`
--
ALTER TABLE `graduates`
  ADD CONSTRAINT `graduates_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `graduates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `graduates_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `graduates_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sm_sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `graduates_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD CONSTRAINT `home_sliders_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infixedu__pages`
--
ALTER TABLE `infixedu__pages`
  ADD CONSTRAINT `infixedu__pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infix_module_infos`
--
ALTER TABLE `infix_module_infos`
  ADD CONSTRAINT `infix_module_infos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `infix_module_infos_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `infix_module_infos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infix_module_student_parent_infos`
--
ALTER TABLE `infix_module_student_parent_infos`
  ADD CONSTRAINT `infix_module_student_parent_infos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `infix_module_student_parent_infos_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `infix_module_student_parent_infos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infix_permission_assigns`
--
ALTER TABLE `infix_permission_assigns`
  ADD CONSTRAINT `infix_permission_assigns_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `infix_permission_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `infix_roles`
--
ALTER TABLE `infix_roles`
  ADD CONSTRAINT `infix_roles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_settings`
--
ALTER TABLE `invoice_settings`
  ADD CONSTRAINT `invoice_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_settings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_planners`
--
ALTER TABLE `lesson_planners`
  ADD CONSTRAINT `lesson_planners_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_class_period_id_foreign` FOREIGN KEY (`class_period_id`) REFERENCES `sm_class_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `sm_class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_planners_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_plan_topics`
--
ALTER TABLE `lesson_plan_topics`
  ADD CONSTRAINT `lesson_plan_topics_lesson_planner_id_foreign` FOREIGN KEY (`lesson_planner_id`) REFERENCES `lesson_planners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_plan_topics_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `sm_lesson_topic_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `library_subjects`
--
ALTER TABLE `library_subjects`
  ADD CONSTRAINT `library_subjects_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_subjects_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance_settings`
--
ALTER TABLE `maintenance_settings`
  ADD CONSTRAINT `maintenance_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payroll_payments`
--
ALTER TABLE `payroll_payments`
  ADD CONSTRAINT `payroll_payments_sm_hr_payroll_generate_id_foreign` FOREIGN KEY (`sm_hr_payroll_generate_id`) REFERENCES `sm_hr_payroll_generates` (`id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_sections`
--
ALTER TABLE `permission_sections`
  ADD CONSTRAINT `permission_sections_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plugins`
--
ALTER TABLE `plugins`
  ADD CONSTRAINT `plugins_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `school_modules`
--
ALTER TABLE `school_modules`
  ADD CONSTRAINT `school_modules_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sidebars`
--
ALTER TABLE `sidebars`
  ADD CONSTRAINT `sidebars_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sidebars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms_templates`
--
ALTER TABLE `sms_templates`
  ADD CONSTRAINT `sms_templates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_about_pages`
--
ALTER TABLE `sm_about_pages`
  ADD CONSTRAINT `sm_about_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_academic_years`
--
ALTER TABLE `sm_academic_years`
  ADD CONSTRAINT `sm_academic_years_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_add_expenses`
--
ALTER TABLE `sm_add_expenses`
  ADD CONSTRAINT `sm_add_expenses_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_add_expenses_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_add_incomes`
--
ALTER TABLE `sm_add_incomes`
  ADD CONSTRAINT `sm_add_incomes_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_add_incomes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `sm_bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_add_incomes_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `sm_payment_methhods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_add_incomes_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_admission_queries`
--
ALTER TABLE `sm_admission_queries`
  ADD CONSTRAINT `sm_admission_queries_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_admission_queries_class_foreign` FOREIGN KEY (`class`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_admission_queries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_admission_query_followups`
--
ALTER TABLE `sm_admission_query_followups`
  ADD CONSTRAINT `sm_admission_query_followups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_admission_query_followups_admission_query_id_foreign` FOREIGN KEY (`admission_query_id`) REFERENCES `sm_admission_queries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_admission_query_followups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_amount_transfers`
--
ALTER TABLE `sm_amount_transfers`
  ADD CONSTRAINT `sm_amount_transfers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_amount_transfers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_assign_class_teachers`
--
ALTER TABLE `sm_assign_class_teachers`
  ADD CONSTRAINT `sm_assign_class_teachers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_class_teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_class_teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_class_teachers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_assign_subjects`
--
ALTER TABLE `sm_assign_subjects`
  ADD CONSTRAINT `sm_assign_subjects_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_subjects_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_subjects_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_assign_vehicles`
--
ALTER TABLE `sm_assign_vehicles`
  ADD CONSTRAINT `sm_assign_vehicles_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_vehicles_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `sm_routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_vehicles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_assign_vehicles_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `sm_vehicles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_background_settings`
--
ALTER TABLE `sm_background_settings`
  ADD CONSTRAINT `sm_background_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_backups`
--
ALTER TABLE `sm_backups`
  ADD CONSTRAINT `sm_backups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_backups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_bank_accounts`
--
ALTER TABLE `sm_bank_accounts`
  ADD CONSTRAINT `sm_bank_accounts_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_bank_accounts_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_bank_payment_slips`
--
ALTER TABLE `sm_bank_payment_slips`
  ADD CONSTRAINT `sm_bank_payment_slips_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `sm_fees_discounts` (`id`),
  ADD CONSTRAINT `sm_bank_payment_slips_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`),
  ADD CONSTRAINT `sm_bank_payment_slips_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_base_groups`
--
ALTER TABLE `sm_base_groups`
  ADD CONSTRAINT `sm_base_groups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_base_setups`
--
ALTER TABLE `sm_base_setups`
  ADD CONSTRAINT `sm_base_setups_base_group_id_foreign` FOREIGN KEY (`base_group_id`) REFERENCES `sm_base_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_base_setups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_books`
--
ALTER TABLE `sm_books`
  ADD CONSTRAINT `sm_books_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_books_book_category_id_foreign` FOREIGN KEY (`book_category_id`) REFERENCES `sm_book_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_books_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_book_categories`
--
ALTER TABLE `sm_book_categories`
  ADD CONSTRAINT `sm_book_categories_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_book_categories_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_book_issues`
--
ALTER TABLE `sm_book_issues`
  ADD CONSTRAINT `sm_book_issues_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_book_issues_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `sm_books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_book_issues_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_book_issues_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_calendar_settings`
--
ALTER TABLE `sm_calendar_settings`
  ADD CONSTRAINT `sm_calendar_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_chart_of_accounts`
--
ALTER TABLE `sm_chart_of_accounts`
  ADD CONSTRAINT `sm_chart_of_accounts_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_chart_of_accounts_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_classes`
--
ALTER TABLE `sm_classes`
  ADD CONSTRAINT `sm_classes_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_classes_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_exam_routine_pages`
--
ALTER TABLE `sm_class_exam_routine_pages`
  ADD CONSTRAINT `sm_class_exam_routine_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_optional_subject`
--
ALTER TABLE `sm_class_optional_subject`
  ADD CONSTRAINT `sm_class_optional_subject_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_optional_subject_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_rooms`
--
ALTER TABLE `sm_class_rooms`
  ADD CONSTRAINT `sm_class_rooms_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_rooms_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_routines`
--
ALTER TABLE `sm_class_routines`
  ADD CONSTRAINT `sm_class_routines_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routines_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routines_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routines_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_routine_updates`
--
ALTER TABLE `sm_class_routine_updates`
  ADD CONSTRAINT `sm_class_routine_updates_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_class_period_id_foreign` FOREIGN KEY (`class_period_id`) REFERENCES `sm_class_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `sm_class_rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_routine_updates_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_sections`
--
ALTER TABLE `sm_class_sections`
  ADD CONSTRAINT `sm_class_sections_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_sections_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_sections_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_teachers`
--
ALTER TABLE `sm_class_teachers`
  ADD CONSTRAINT `sm_class_teachers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_teachers_assign_class_teacher_id_foreign` FOREIGN KEY (`assign_class_teacher_id`) REFERENCES `sm_assign_class_teachers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_class_times`
--
ALTER TABLE `sm_class_times`
  ADD CONSTRAINT `sm_class_times_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_class_times_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_complaints`
--
ALTER TABLE `sm_complaints`
  ADD CONSTRAINT `sm_complaints_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_complaints_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_contact_messages`
--
ALTER TABLE `sm_contact_messages`
  ADD CONSTRAINT `sm_contact_messages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_contact_pages`
--
ALTER TABLE `sm_contact_pages`
  ADD CONSTRAINT `sm_contact_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_content_types`
--
ALTER TABLE `sm_content_types`
  ADD CONSTRAINT `sm_content_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_content_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_countries`
--
ALTER TABLE `sm_countries`
  ADD CONSTRAINT `sm_countries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_courses`
--
ALTER TABLE `sm_courses`
  ADD CONSTRAINT `sm_courses_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_course_pages`
--
ALTER TABLE `sm_course_pages`
  ADD CONSTRAINT `sm_course_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_currencies`
--
ALTER TABLE `sm_currencies`
  ADD CONSTRAINT `sm_currencies_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_custom_links`
--
ALTER TABLE `sm_custom_links`
  ADD CONSTRAINT `sm_custom_links_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_custom_temporary_results`
--
ALTER TABLE `sm_custom_temporary_results`
  ADD CONSTRAINT `sm_custom_temporary_results_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_custom_temporary_results_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`);

--
-- Constraints for table `sm_dashboard_settings`
--
ALTER TABLE `sm_dashboard_settings`
  ADD CONSTRAINT `sm_dashboard_settings_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_dashboard_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_date_formats`
--
ALTER TABLE `sm_date_formats`
  ADD CONSTRAINT `sm_date_formats_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_designations`
--
ALTER TABLE `sm_designations`
  ADD CONSTRAINT `sm_designations_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_donors`
--
ALTER TABLE `sm_donors`
  ADD CONSTRAINT `sm_donors_bloodgroup_id_foreign` FOREIGN KEY (`bloodgroup_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_donors_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_donors_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_donors_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_dormitory_lists`
--
ALTER TABLE `sm_dormitory_lists`
  ADD CONSTRAINT `sm_dormitory_lists_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_dormitory_lists_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_email_settings`
--
ALTER TABLE `sm_email_settings`
  ADD CONSTRAINT `sm_email_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_email_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_email_sms_logs`
--
ALTER TABLE `sm_email_sms_logs`
  ADD CONSTRAINT `sm_email_sms_logs_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_email_sms_logs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_events`
--
ALTER TABLE `sm_events`
  ADD CONSTRAINT `sm_events_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_events_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exams`
--
ALTER TABLE `sm_exams`
  ADD CONSTRAINT `sm_exams_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exams_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exams_exam_type_id_foreign` FOREIGN KEY (`exam_type_id`) REFERENCES `sm_exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exams_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exams_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_attendances`
--
ALTER TABLE `sm_exam_attendances`
  ADD CONSTRAINT `sm_exam_attendances_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendances_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendances_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_attendance_children`
--
ALTER TABLE `sm_exam_attendance_children`
  ADD CONSTRAINT `sm_exam_attendance_children_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_exam_attendance_id_foreign` FOREIGN KEY (`exam_attendance_id`) REFERENCES `sm_exam_attendances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_attendance_children_student_record_id_foreign` FOREIGN KEY (`student_record_id`) REFERENCES `student_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_marks_registers`
--
ALTER TABLE `sm_exam_marks_registers`
  ADD CONSTRAINT `sm_exam_marks_registers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_marks_registers_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_marks_registers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_marks_registers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_marks_registers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_schedules`
--
ALTER TABLE `sm_exam_schedules`
  ADD CONSTRAINT `sm_exam_schedules_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_exam_period_id_foreign` FOREIGN KEY (`exam_period_id`) REFERENCES `sm_class_times` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_exam_term_id_foreign` FOREIGN KEY (`exam_term_id`) REFERENCES `sm_exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedules_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_schedule_subjects`
--
ALTER TABLE `sm_exam_schedule_subjects`
  ADD CONSTRAINT `sm_exam_schedule_subjects_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedule_subjects_exam_schedule_id_foreign` FOREIGN KEY (`exam_schedule_id`) REFERENCES `sm_exam_schedules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedule_subjects_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_schedule_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_settings`
--
ALTER TABLE `sm_exam_settings`
  ADD CONSTRAINT `sm_exam_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_setups`
--
ALTER TABLE `sm_exam_setups`
  ADD CONSTRAINT `sm_exam_setups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_exam_term_id_foreign` FOREIGN KEY (`exam_term_id`) REFERENCES `sm_exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_setups_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_signatures`
--
ALTER TABLE `sm_exam_signatures`
  ADD CONSTRAINT `sm_exam_signatures_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_signatures_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_exam_types`
--
ALTER TABLE `sm_exam_types`
  ADD CONSTRAINT `sm_exam_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_exam_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_expense_heads`
--
ALTER TABLE `sm_expense_heads`
  ADD CONSTRAINT `sm_expense_heads_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_expense_heads_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_expert_teachers`
--
ALTER TABLE `sm_expert_teachers`
  ADD CONSTRAINT `sm_expert_teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_assigns`
--
ALTER TABLE `sm_fees_assigns`
  ADD CONSTRAINT `sm_fees_assigns_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assigns_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `sm_fees_discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assigns_fees_master_id_foreign` FOREIGN KEY (`fees_master_id`) REFERENCES `sm_fees_masters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assigns_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_assign_discounts`
--
ALTER TABLE `sm_fees_assign_discounts`
  ADD CONSTRAINT `sm_fees_assign_discounts_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assign_discounts_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `sm_fees_discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assign_discounts_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_assign_discounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_carry_forwards`
--
ALTER TABLE `sm_fees_carry_forwards`
  ADD CONSTRAINT `sm_fees_carry_forwards_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_carry_forwards_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_carry_forwards_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_discounts`
--
ALTER TABLE `sm_fees_discounts`
  ADD CONSTRAINT `sm_fees_discounts_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_discounts_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_groups`
--
ALTER TABLE `sm_fees_groups`
  ADD CONSTRAINT `sm_fees_groups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_groups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_masters`
--
ALTER TABLE `sm_fees_masters`
  ADD CONSTRAINT `sm_fees_masters_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_masters_fees_group_id_foreign` FOREIGN KEY (`fees_group_id`) REFERENCES `sm_fees_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_masters_fees_type_id_foreign` FOREIGN KEY (`fees_type_id`) REFERENCES `sm_fees_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_masters_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_payments`
--
ALTER TABLE `sm_fees_payments`
  ADD CONSTRAINT `sm_fees_payments_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_assign_id_foreign` FOREIGN KEY (`assign_id`) REFERENCES `sm_fees_assigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `sm_bank_accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_fees_discount_id_foreign` FOREIGN KEY (`fees_discount_id`) REFERENCES `sm_fees_discounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_fees_type_id_foreign` FOREIGN KEY (`fees_type_id`) REFERENCES `sm_fees_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_fees_types`
--
ALTER TABLE `sm_fees_types`
  ADD CONSTRAINT `sm_fees_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_types_fees_group_id_foreign` FOREIGN KEY (`fees_group_id`) REFERENCES `sm_fees_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_fees_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_form_downloads`
--
ALTER TABLE `sm_form_downloads`
  ADD CONSTRAINT `sm_form_downloads_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_frontend_persmissions`
--
ALTER TABLE `sm_frontend_persmissions`
  ADD CONSTRAINT `sm_frontend_persmissions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_general_settings`
--
ALTER TABLE `sm_general_settings`
  ADD CONSTRAINT `sm_general_settings_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_general_settings_date_format_id_foreign` FOREIGN KEY (`date_format_id`) REFERENCES `sm_date_formats` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_general_settings_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `sm_languages` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_general_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_general_settings_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sm_header_menu_managers`
--
ALTER TABLE `sm_header_menu_managers`
  ADD CONSTRAINT `sm_header_menu_managers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_holidays`
--
ALTER TABLE `sm_holidays`
  ADD CONSTRAINT `sm_holidays_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_holidays_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_homeworks`
--
ALTER TABLE `sm_homeworks`
  ADD CONSTRAINT `sm_homeworks_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homeworks_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homeworks_evaluated_by_foreign` FOREIGN KEY (`evaluated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homeworks_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homeworks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_homework_students`
--
ALTER TABLE `sm_homework_students`
  ADD CONSTRAINT `sm_homework_students_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homework_students_homework_id_foreign` FOREIGN KEY (`homework_id`) REFERENCES `sm_homeworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homework_students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_homework_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_home_page_settings`
--
ALTER TABLE `sm_home_page_settings`
  ADD CONSTRAINT `sm_home_page_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_hourly_rates`
--
ALTER TABLE `sm_hourly_rates`
  ADD CONSTRAINT `sm_hourly_rates_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hourly_rates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_hr_payroll_earn_deducs`
--
ALTER TABLE `sm_hr_payroll_earn_deducs`
  ADD CONSTRAINT `sm_hr_payroll_earn_deducs_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hr_payroll_earn_deducs_payroll_generate_id_foreign` FOREIGN KEY (`payroll_generate_id`) REFERENCES `sm_hr_payroll_generates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hr_payroll_earn_deducs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_hr_payroll_generates`
--
ALTER TABLE `sm_hr_payroll_generates`
  ADD CONSTRAINT `sm_hr_payroll_generates_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hr_payroll_generates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hr_payroll_generates_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_hr_salary_templates`
--
ALTER TABLE `sm_hr_salary_templates`
  ADD CONSTRAINT `sm_hr_salary_templates_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_hr_salary_templates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_human_departments`
--
ALTER TABLE `sm_human_departments`
  ADD CONSTRAINT `sm_human_departments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_human_departments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_human_departments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_income_heads`
--
ALTER TABLE `sm_income_heads`
  ADD CONSTRAINT `sm_income_heads_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_income_heads_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_instructions`
--
ALTER TABLE `sm_instructions`
  ADD CONSTRAINT `sm_instructions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_inventory_payments`
--
ALTER TABLE `sm_inventory_payments`
  ADD CONSTRAINT `sm_inventory_payments_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_inventory_payments_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_items`
--
ALTER TABLE `sm_items`
  ADD CONSTRAINT `sm_items_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `sm_item_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_items_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_categories`
--
ALTER TABLE `sm_item_categories`
  ADD CONSTRAINT `sm_item_categories_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_categories_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_issues`
--
ALTER TABLE `sm_item_issues`
  ADD CONSTRAINT `sm_item_issues_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_issues_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `sm_item_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_issues_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `sm_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_issues_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_issues_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_receives`
--
ALTER TABLE `sm_item_receives`
  ADD CONSTRAINT `sm_item_receives_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receives_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receives_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `sm_item_stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receives_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `sm_suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_receive_children`
--
ALTER TABLE `sm_item_receive_children`
  ADD CONSTRAINT `sm_item_receive_children_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receive_children_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `sm_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receive_children_item_receive_id_foreign` FOREIGN KEY (`item_receive_id`) REFERENCES `sm_item_receives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_receive_children_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_sells`
--
ALTER TABLE `sm_item_sells`
  ADD CONSTRAINT `sm_item_sells_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_sells_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_sells_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_sell_children`
--
ALTER TABLE `sm_item_sell_children`
  ADD CONSTRAINT `sm_item_sell_children_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_sell_children_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_item_stores`
--
ALTER TABLE `sm_item_stores`
  ADD CONSTRAINT `sm_item_stores_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_item_stores_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_languages`
--
ALTER TABLE `sm_languages`
  ADD CONSTRAINT `sm_languages_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_languages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_language_phrases`
--
ALTER TABLE `sm_language_phrases`
  ADD CONSTRAINT `sm_language_phrases_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_leave_deduction_infos`
--
ALTER TABLE `sm_leave_deduction_infos`
  ADD CONSTRAINT `sm_leave_deduction_infos_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_deduction_infos_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`);

--
-- Constraints for table `sm_leave_defines`
--
ALTER TABLE `sm_leave_defines`
  ADD CONSTRAINT `sm_leave_defines_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_defines_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_defines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_defines_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `sm_leave_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_defines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_leave_requests`
--
ALTER TABLE `sm_leave_requests`
  ADD CONSTRAINT `sm_leave_requests_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_requests_leave_define_id_foreign` FOREIGN KEY (`leave_define_id`) REFERENCES `sm_leave_defines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_requests_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_requests_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_requests_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_requests_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `sm_leave_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_leave_types`
--
ALTER TABLE `sm_leave_types`
  ADD CONSTRAINT `sm_leave_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_leave_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_lessons`
--
ALTER TABLE `sm_lessons`
  ADD CONSTRAINT `sm_lessons_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lessons_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lessons_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lessons_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lessons_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_lesson_details`
--
ALTER TABLE `sm_lesson_details`
  ADD CONSTRAINT `sm_lesson_details_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_details_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_details_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_details_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_details_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_lesson_topics`
--
ALTER TABLE `sm_lesson_topics`
  ADD CONSTRAINT `sm_lesson_topics_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topics_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topics_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topics_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topics_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_lesson_topic_details`
--
ALTER TABLE `sm_lesson_topic_details`
  ADD CONSTRAINT `sm_lesson_topic_details_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topic_details_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_lesson_topic_details_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `sm_lesson_topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_library_members`
--
ALTER TABLE `sm_library_members`
  ADD CONSTRAINT `sm_library_members_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_library_members_member_type_foreign` FOREIGN KEY (`member_type`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_library_members_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_library_members_student_staff_id_foreign` FOREIGN KEY (`student_staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_marks_grades`
--
ALTER TABLE `sm_marks_grades`
  ADD CONSTRAINT `sm_marks_grades_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_grades_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_marks_registers`
--
ALTER TABLE `sm_marks_registers`
  ADD CONSTRAINT `sm_marks_registers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_registers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_registers_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_registers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_registers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_registers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_marks_register_children`
--
ALTER TABLE `sm_marks_register_children`
  ADD CONSTRAINT `sm_marks_register_children_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_register_children_marks_register_id_foreign` FOREIGN KEY (`marks_register_id`) REFERENCES `sm_marks_registers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_register_children_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_register_children_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_marks_send_sms`
--
ALTER TABLE `sm_marks_send_sms`
  ADD CONSTRAINT `sm_marks_send_sms_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_send_sms_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_send_sms_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_marks_send_sms_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_mark_stores`
--
ALTER TABLE `sm_mark_stores`
  ADD CONSTRAINT `sm_mark_stores_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_exam_setup_id_foreign` FOREIGN KEY (`exam_setup_id`) REFERENCES `sm_exam_setups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_exam_term_id_foreign` FOREIGN KEY (`exam_term_id`) REFERENCES `sm_exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_student_record_id_foreign` FOREIGN KEY (`student_record_id`) REFERENCES `student_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_mark_stores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_modules`
--
ALTER TABLE `sm_modules`
  ADD CONSTRAINT `sm_modules_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_module_links`
--
ALTER TABLE `sm_module_links`
  ADD CONSTRAINT `sm_module_links_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_module_links_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `sm_modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_module_links_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_module_links_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_module_permissions`
--
ALTER TABLE `sm_module_permissions`
  ADD CONSTRAINT `sm_module_permissions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_module_permission_assigns`
--
ALTER TABLE `sm_module_permission_assigns`
  ADD CONSTRAINT `sm_module_permission_assigns_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `sm_module_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_module_permission_assigns_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_module_permission_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_news`
--
ALTER TABLE `sm_news`
  ADD CONSTRAINT `sm_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `sm_news_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_news_comments`
--
ALTER TABLE `sm_news_comments`
  ADD CONSTRAINT `sm_news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `sm_news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_news_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_news_pages`
--
ALTER TABLE `sm_news_pages`
  ADD CONSTRAINT `sm_news_pages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_news_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_news_pages_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_notice_boards`
--
ALTER TABLE `sm_notice_boards`
  ADD CONSTRAINT `sm_notice_boards_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_notice_boards_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_notifications`
--
ALTER TABLE `sm_notifications`
  ADD CONSTRAINT `sm_notifications_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_notifications_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_notification_settings`
--
ALTER TABLE `sm_notification_settings`
  ADD CONSTRAINT `sm_notification_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_online_exams`
--
ALTER TABLE `sm_online_exams`
  ADD CONSTRAINT `sm_online_exams_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exams_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exams_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exams_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_online_exam_marks`
--
ALTER TABLE `sm_online_exam_marks`
  ADD CONSTRAINT `sm_online_exam_marks_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_marks_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_marks_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_online_exam_questions`
--
ALTER TABLE `sm_online_exam_questions`
  ADD CONSTRAINT `sm_online_exam_questions_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_questions_online_exam_id_foreign` FOREIGN KEY (`online_exam_id`) REFERENCES `sm_online_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_questions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_online_exam_question_assigns`
--
ALTER TABLE `sm_online_exam_question_assigns`
  ADD CONSTRAINT `sm_online_exam_question_assigns_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_question_assigns_online_exam_id_foreign` FOREIGN KEY (`online_exam_id`) REFERENCES `sm_online_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_question_assigns_question_bank_id_foreign` FOREIGN KEY (`question_bank_id`) REFERENCES `sm_question_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_question_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_online_exam_question_mu_options`
--
ALTER TABLE `sm_online_exam_question_mu_options`
  ADD CONSTRAINT `on_ex_qu_id` FOREIGN KEY (`online_exam_question_id`) REFERENCES `sm_online_exam_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_question_mu_options_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_online_exam_question_mu_options_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_optional_subject_assigns`
--
ALTER TABLE `sm_optional_subject_assigns`
  ADD CONSTRAINT `sm_optional_subject_assigns_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_optional_subject_assigns_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_optional_subject_assigns_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_optional_subject_assigns_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_optional_subject_assigns_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_pages`
--
ALTER TABLE `sm_pages`
  ADD CONSTRAINT `sm_pages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_parents`
--
ALTER TABLE `sm_parents`
  ADD CONSTRAINT `sm_parents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_parents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_payment_gateway_settings`
--
ALTER TABLE `sm_payment_gateway_settings`
  ADD CONSTRAINT `sm_payment_gateway_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_payment_methhods`
--
ALTER TABLE `sm_payment_methhods`
  ADD CONSTRAINT `sm_payment_methhods_gateway_id_foreign` FOREIGN KEY (`gateway_id`) REFERENCES `sm_payment_gateway_settings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_payment_methhods_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_phone_call_logs`
--
ALTER TABLE `sm_phone_call_logs`
  ADD CONSTRAINT `sm_phone_call_logs_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_phone_call_logs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_photo_galleries`
--
ALTER TABLE `sm_photo_galleries`
  ADD CONSTRAINT `sm_photo_galleries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_postal_dispatches`
--
ALTER TABLE `sm_postal_dispatches`
  ADD CONSTRAINT `sm_postal_dispatches_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_postal_dispatches_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_postal_receives`
--
ALTER TABLE `sm_postal_receives`
  ADD CONSTRAINT `sm_postal_receives_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_postal_receives_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_product_purchases`
--
ALTER TABLE `sm_product_purchases`
  ADD CONSTRAINT `sm_product_purchases_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_product_purchases_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_product_purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_question_banks`
--
ALTER TABLE `sm_question_banks`
  ADD CONSTRAINT `sm_question_banks_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_banks_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_banks_q_group_id_foreign` FOREIGN KEY (`q_group_id`) REFERENCES `sm_question_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_banks_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_banks_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_question_bank_mu_options`
--
ALTER TABLE `sm_question_bank_mu_options`
  ADD CONSTRAINT `sm_question_bank_mu_options_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_bank_mu_options_question_bank_id_foreign` FOREIGN KEY (`question_bank_id`) REFERENCES `sm_question_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_bank_mu_options_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_question_groups`
--
ALTER TABLE `sm_question_groups`
  ADD CONSTRAINT `sm_question_groups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_groups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_question_levels`
--
ALTER TABLE `sm_question_levels`
  ADD CONSTRAINT `sm_question_levels_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_question_levels_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_result_stores`
--
ALTER TABLE `sm_result_stores`
  ADD CONSTRAINT `sm_result_stores_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_exam_setup_id_foreign` FOREIGN KEY (`exam_setup_id`) REFERENCES `sm_exam_setups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_exam_type_id_foreign` FOREIGN KEY (`exam_type_id`) REFERENCES `sm_exam_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_student_record_id_foreign` FOREIGN KEY (`student_record_id`) REFERENCES `student_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_result_stores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_role_permissions`
--
ALTER TABLE `sm_role_permissions`
  ADD CONSTRAINT `sm_role_permissions_module_link_id_foreign` FOREIGN KEY (`module_link_id`) REFERENCES `sm_module_links` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sm_role_permissions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_room_lists`
--
ALTER TABLE `sm_room_lists`
  ADD CONSTRAINT `sm_room_lists_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_room_lists_dormitory_id_foreign` FOREIGN KEY (`dormitory_id`) REFERENCES `sm_dormitory_lists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_room_lists_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `sm_room_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_room_lists_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_room_types`
--
ALTER TABLE `sm_room_types`
  ADD CONSTRAINT `sm_room_types_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_room_types_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_routes`
--
ALTER TABLE `sm_routes`
  ADD CONSTRAINT `sm_routes_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_routes_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_seat_plans`
--
ALTER TABLE `sm_seat_plans`
  ADD CONSTRAINT `sm_seat_plans_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plans_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plans_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plans_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plans_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plans_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_seat_plan_children`
--
ALTER TABLE `sm_seat_plan_children`
  ADD CONSTRAINT `sm_seat_plan_children_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plan_children_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_seat_plan_children_seat_plan_id_foreign` FOREIGN KEY (`seat_plan_id`) REFERENCES `sm_seat_plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_sections`
--
ALTER TABLE `sm_sections`
  ADD CONSTRAINT `sm_sections_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_sections_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_send_messages`
--
ALTER TABLE `sm_send_messages`
  ADD CONSTRAINT `sm_send_messages_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_send_messages_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_sessions`
--
ALTER TABLE `sm_sessions`
  ADD CONSTRAINT `sm_sessions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_setup_admins`
--
ALTER TABLE `sm_setup_admins`
  ADD CONSTRAINT `sm_setup_admins_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_setup_admins_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_sms_gateways`
--
ALTER TABLE `sm_sms_gateways`
  ADD CONSTRAINT `sm_sms_gateways_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_social_media_icons`
--
ALTER TABLE `sm_social_media_icons`
  ADD CONSTRAINT `sm_social_media_icons_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_staffs`
--
ALTER TABLE `sm_staffs`
  ADD CONSTRAINT `sm_staffs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `sm_human_departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_staffs_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `sm_designations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_staffs_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_staffs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_staffs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_staffs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_staff_attendance_imports`
--
ALTER TABLE `sm_staff_attendance_imports`
  ADD CONSTRAINT `sm_staff_attendance_imports_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_staff_attendance_imports_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_staff_attendance_imports_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_staff_attendences`
--
ALTER TABLE `sm_staff_attendences`
  ADD CONSTRAINT `sm_staff_attendences_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_staff_attendences_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_staff_attendences_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `sm_staffs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_staff_registration_fields`
--
ALTER TABLE `sm_staff_registration_fields`
  ADD CONSTRAINT `sm_staff_registration_fields_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_staff_registration_fields_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_students`
--
ALTER TABLE `sm_students`
  ADD CONSTRAINT `sm_students_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_students_bloodgroup_id_foreign` FOREIGN KEY (`bloodgroup_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_dormitory_id_foreign` FOREIGN KEY (`dormitory_id`) REFERENCES `sm_dormitory_lists` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `sm_parents` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `sm_base_setups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_students_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `sm_room_lists` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_route_list_id_foreign` FOREIGN KEY (`route_list_id`) REFERENCES `sm_routes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_student_category_id_foreign` FOREIGN KEY (`student_category_id`) REFERENCES `sm_student_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_student_group_id_foreign` FOREIGN KEY (`student_group_id`) REFERENCES `sm_student_groups` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_students_vechile_id_foreign` FOREIGN KEY (`vechile_id`) REFERENCES `sm_vehicles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sm_student_attendances`
--
ALTER TABLE `sm_student_attendances`
  ADD CONSTRAINT `sm_student_attendances_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendances_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_attendance_imports`
--
ALTER TABLE `sm_student_attendance_imports`
  ADD CONSTRAINT `sm_student_attendance_imports_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendance_imports_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_attendance_imports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_categories`
--
ALTER TABLE `sm_student_categories`
  ADD CONSTRAINT `sm_student_categories_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_categories_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_certificates`
--
ALTER TABLE `sm_student_certificates`
  ADD CONSTRAINT `sm_student_certificates_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_certificates_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_documents`
--
ALTER TABLE `sm_student_documents`
  ADD CONSTRAINT `sm_student_documents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_documents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_excel_formats`
--
ALTER TABLE `sm_student_excel_formats`
  ADD CONSTRAINT `sm_student_excel_formats_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_excel_formats_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_groups`
--
ALTER TABLE `sm_student_groups`
  ADD CONSTRAINT `sm_student_groups_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_groups_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_homeworks`
--
ALTER TABLE `sm_student_homeworks`
  ADD CONSTRAINT `sm_student_homeworks_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_homeworks_evaluated_by_foreign` FOREIGN KEY (`evaluated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_homeworks_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_homeworks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_homeworks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_id_cards`
--
ALTER TABLE `sm_student_id_cards`
  ADD CONSTRAINT `sm_student_id_cards_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_id_cards_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_promotions`
--
ALTER TABLE `sm_student_promotions`
  ADD CONSTRAINT `sm_student_promotions_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_current_class_id_foreign` FOREIGN KEY (`current_class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_current_section_id_foreign` FOREIGN KEY (`current_section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_current_session_id_foreign` FOREIGN KEY (`current_session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_previous_class_id_foreign` FOREIGN KEY (`previous_class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_previous_section_id_foreign` FOREIGN KEY (`previous_section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_previous_session_id_foreign` FOREIGN KEY (`previous_session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_promotions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_registration_fields`
--
ALTER TABLE `sm_student_registration_fields`
  ADD CONSTRAINT `sm_student_registration_fields_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_student_registration_fields_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_take_online_exams`
--
ALTER TABLE `sm_student_take_online_exams`
  ADD CONSTRAINT `sm_student_take_online_exams_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_online_exams_online_exam_id_foreign` FOREIGN KEY (`online_exam_id`) REFERENCES `sm_online_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_online_exams_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_online_exams_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_take_online_exam_questions`
--
ALTER TABLE `sm_student_take_online_exam_questions`
  ADD CONSTRAINT `sm_student_take_online_exam_questions_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_online_exam_questions_question_bank_id_foreign` FOREIGN KEY (`question_bank_id`) REFERENCES `sm_question_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_online_exam_questions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_on_ex_id` FOREIGN KEY (`take_online_exam_id`) REFERENCES `sm_student_take_online_exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_take_onln_ex_ques_options`
--
ALTER TABLE `sm_student_take_onln_ex_ques_options`
  ADD CONSTRAINT `sm_student_take_onln_ex_ques_options_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_take_onln_ex_ques_options_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_on_ex_q_id` FOREIGN KEY (`take_online_exam_question_id`) REFERENCES `sm_student_take_online_exam_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_student_timelines`
--
ALTER TABLE `sm_student_timelines`
  ADD CONSTRAINT `sm_student_timelines_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_student_timelines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_styles`
--
ALTER TABLE `sm_styles`
  ADD CONSTRAINT `sm_styles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_subjects`
--
ALTER TABLE `sm_subjects`
  ADD CONSTRAINT `sm_subjects_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subjects_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_subject_attendances`
--
ALTER TABLE `sm_subject_attendances`
  ADD CONSTRAINT `sm_subject_attendances_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_student_record_id_foreign` FOREIGN KEY (`student_record_id`) REFERENCES `student_records` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_subject_attendances_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `sm_subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_suppliers`
--
ALTER TABLE `sm_suppliers`
  ADD CONSTRAINT `sm_suppliers_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_teacher_upload_contents`
--
ALTER TABLE `sm_teacher_upload_contents`
  ADD CONSTRAINT `sm_teacher_upload_contents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_teacher_upload_contents_class_foreign` FOREIGN KEY (`class`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_teacher_upload_contents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_temporary_meritlists`
--
ALTER TABLE `sm_temporary_meritlists`
  ADD CONSTRAINT `sm_temporary_meritlists_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_temporary_meritlists_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_temporary_meritlists_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `sm_exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_temporary_meritlists_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_temporary_meritlists_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_testimonials`
--
ALTER TABLE `sm_testimonials`
  ADD CONSTRAINT `sm_testimonials_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_to_dos`
--
ALTER TABLE `sm_to_dos`
  ADD CONSTRAINT `sm_to_dos_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_to_dos_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_upload_contents`
--
ALTER TABLE `sm_upload_contents`
  ADD CONSTRAINT `sm_upload_contents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_upload_contents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_upload_homework_contents`
--
ALTER TABLE `sm_upload_homework_contents`
  ADD CONSTRAINT `sm_upload_homework_contents_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_upload_homework_contents_homework_id_foreign` FOREIGN KEY (`homework_id`) REFERENCES `sm_homeworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_upload_homework_contents_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_upload_homework_contents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_user_logs`
--
ALTER TABLE `sm_user_logs`
  ADD CONSTRAINT `sm_user_logs_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_user_logs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_user_logs_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_vehicles`
--
ALTER TABLE `sm_vehicles`
  ADD CONSTRAINT `sm_vehicles_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_vehicles_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_video_galleries`
--
ALTER TABLE `sm_video_galleries`
  ADD CONSTRAINT `sm_video_galleries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_visitors`
--
ALTER TABLE `sm_visitors`
  ADD CONSTRAINT `sm_visitors_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sm_visitors_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sm_weekends`
--
ALTER TABLE `sm_weekends`
  ADD CONSTRAINT `sm_weekends_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sm_weekends_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `speech_sliders`
--
ALTER TABLE `speech_sliders`
  ADD CONSTRAINT `speech_sliders_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_import_bulk_temporaries`
--
ALTER TABLE `staff_import_bulk_temporaries`
  ADD CONSTRAINT `staff_import_bulk_temporaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_academic_histories`
--
ALTER TABLE `student_academic_histories`
  ADD CONSTRAINT `student_academic_histories_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_academic_histories_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_academic_histories_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_records`
--
ALTER TABLE `student_records`
  ADD CONSTRAINT `student_records_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `sm_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sm_sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_record_temporaries`
--
ALTER TABLE `student_record_temporaries`
  ADD CONSTRAINT `student_record_temporaries_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_record_temporaries_sm_student_id_foreign` FOREIGN KEY (`sm_student_id`) REFERENCES `sm_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_record_temporaries_student_record_id_foreign` FOREIGN KEY (`student_record_id`) REFERENCES `student_records` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transcations`
--
ALTER TABLE `transcations`
  ADD CONSTRAINT `transcations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `two_factor_settings`
--
ALTER TABLE `two_factor_settings`
  ADD CONSTRAINT `two_factor_settings_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `infix_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_otp_codes`
--
ALTER TABLE `user_otp_codes`
  ADD CONSTRAINT `user_otp_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `video_uploads`
--
ALTER TABLE `video_uploads`
  ADD CONSTRAINT `video_uploads_academic_id_foreign` FOREIGN KEY (`academic_id`) REFERENCES `sm_academic_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `video_uploads_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `sm_schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `wallet_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
