-- Reconstructed schema (structure + relations) from migrations & models
-- NOTE: The live SHOW CREATE TABLE could not run (ionCube loader missing); this file is an inferred, documentation-only approximation.
-- Focus: permission/menu system integration (permissions, assign_permissions, sm_menus, sidebars, roles)

-- =====================================================
-- Table: permissions (inferred; original migration not present in repo)
-- =====================================================
CREATE TABLE `permissions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NULL,
  `lang_name` VARCHAR(191) NULL,
  `module` VARCHAR(191) NULL,
  `sidebar_menu` VARCHAR(191) NULL,
  `icon` VARCHAR(191) NULL,
  `svg` VARCHAR(191) NULL,
  `route` VARCHAR(191) NULL,
  `parent_route` VARCHAR(191) NULL,
  `position` INT NULL,
  `is_admin` TINYINT(1) DEFAULT 0,
  `is_teacher` TINYINT(1) DEFAULT 0,
  `is_student` TINYINT(1) DEFAULT 0,
  `is_parent` TINYINT(1) DEFAULT 0,
  `is_saas` TINYINT(1) DEFAULT 0,
  `is_menu` TINYINT(1) DEFAULT 0,
  `status` TINYINT(1) DEFAULT 1,
  `menu_status` TINYINT(1) DEFAULT 1,
  `relate_to_child` TINYINT(1) DEFAULT 0,
  `alternate_module` VARCHAR(191) NULL,
  `permission_section` TINYINT(1) DEFAULT 0,
  `section_id` BIGINT NULL,
  `type` TINYINT NULL,
  `old_id` INT NULL,
  `role_id` BIGINT NULL,
  `custom_menu_id` BIGINT NULL,
  `school_id` BIGINT NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_route_idx` (`route`),
  KEY `permissions_parent_route_idx` (`parent_route`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Table: assign_permissions (Modules/RolePermission/Database/...create_assign_permissions_table)
-- =====================================================
CREATE TABLE `assign_permissions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` INT NULL,
  `role_id` INT UNSIGNED NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  `menu_status` TINYINT(1) NOT NULL DEFAULT 1,
  `saas_schools` TEXT NULL,
  `created_by` INT UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` INT UNSIGNED NOT NULL DEFAULT 1,
  `school_id` INT UNSIGNED NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  KEY `assign_permissions_permission_id_idx` (`permission_id`),
  KEY `assign_permissions_role_id_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Table: sm_menus (database/migrations/2025_04_29_130721_add_default_sm_menus_data.php)
-- =====================================================
CREATE TABLE `sm_menus` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NULL,
  `module` VARCHAR(191) NULL,
  `route` VARCHAR(191) NULL,
  `lang_name` VARCHAR(191) NULL,
  `section_id` BIGINT UNSIGNED NULL,
  `icon` VARCHAR(191) NULL,
  `status` TINYINT NULL,
  `is_saas` TINYINT NULL,
  `role_id` BIGINT UNSIGNED NULL,
  `is_alumni` TINYINT NULL,
  `menu_status` TINYINT NULL,
  `permission_section` TINYINT NULL,
  `position` INT NULL,
  `default_position` INT NULL,
  `parent` BIGINT UNSIGNED NULL,
  `parent_id` BIGINT UNSIGNED NULL,
  `school_id` BIGINT UNSIGNED NULL,
  `alternate_module` VARCHAR(191) NULL,
  `permission_id` BIGINT UNSIGNED NULL,
  `ignore` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  KEY `sm_menus_parent_id_idx` (`parent_id`),
  KEY `sm_menus_permission_id_idx` (`permission_id`),
  KEY `sm_menus_role_id_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Table: default_menus (parallel to sm_menus for baseline)
-- =====================================================
CREATE TABLE `default_menus` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NULL,
  `module` VARCHAR(191) NULL,
  `route` VARCHAR(191) NULL,
  `lang_name` VARCHAR(191) NULL,
  `section_id` BIGINT UNSIGNED NULL,
  `icon` VARCHAR(191) NULL,
  `status` TINYINT NULL,
  `is_saas` TINYINT NULL,
  `role_id` BIGINT UNSIGNED NULL,
  `is_alumni` TINYINT NULL,
  `menu_status` TINYINT NULL,
  `permission_section` TINYINT NULL,
  `position` INT NULL,
  `default_position` INT NULL,
  `parent` BIGINT UNSIGNED NULL,
  `parent_id` BIGINT UNSIGNED NULL,
  `school_id` BIGINT UNSIGNED NULL,
  `alternate_module` VARCHAR(191) NULL,
  `permission_id` BIGINT UNSIGNED NULL,
  `ignore` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Table: sidebars (Modules/MenuManage/Database/Migrations/2023_03_22_131748_create_sidebars_table.php)
-- =====================================================
CREATE TABLE `sidebars` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` INT NULL,
  `position` INT NULL,
  `section_id` INT NULL DEFAULT 1,
  `parent` INT NULL,
  `parent_route` INT NULL,
  `level` INT NULL COMMENT '1=paren, 2=child, 3=sub-child',
  `user_id` BIGINT UNSIGNED NULL,
  `is_saas` TINYINT NOT NULL DEFAULT 0,
  `ignore` INT NOT NULL DEFAULT 0,
  `role_id` INT NULL,
  `active_status` TINYINT NOT NULL DEFAULT 1,
  `school_id` BIGINT UNSIGNED NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  KEY `sidebars_permission_id_idx` (`permission_id`),
  KEY `sidebars_role_id_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- (Simplified) roles table (InfixRole) – exact migration not shown; assumed)
-- =====================================================
CREATE TABLE `infix_roles` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) NOT NULL,
  `type` VARCHAR(50) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- Relationships (explicit + inferred)
-- =====================================================
-- assign_permissions.permission_id -> permissions.id
-- assign_permissions.role_id -> infix_roles.id (inferred)
-- sm_menus.permission_id -> permissions.id (logical link; not always enforced)
-- sm_menus.parent_id -> sm_menus.id (self-referential tree)
-- sidebars.permission_id -> permissions.id
-- sidebars.parent -> sidebars.permission_id (legacy tree by permission ids)
-- permissions.parent_route -> permissions.route (tree by route string)
-- default_menus acts as seed template for sm_menus

-- =====================================================
-- Integration Notes for "Notes" module
-- =====================================================
-- 1. Ensure a permissions row with route='notes.index', status=1, menu_status=1, role flags set.
-- 2. Ensure assign_permissions row(s) for each role needing access (permission_id = permissions.id).
-- 3. Create/Upsert sm_menus item: permission_section=0, parent_id=<section sm_menus.id>, permission_id=<permissions.id>, menu_status=1, role_id=<role>.
-- 4. Mark any legacy sidebars row for that permission active_status=1 (or ignore=1) so it won't appear as unused duplicate.
-- 5. Clear caches (permission + sidebar + config).

-- End of reconstructed schema.
