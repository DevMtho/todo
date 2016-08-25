
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- events
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `event_name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `created_at` DATETIME NOT NULL,
    `venue_id` INTEGER NOT NULL,
    `sponsor_id` INTEGER NOT NULL,
    `drink_id` INTEGER NOT NULL,
    `creator_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `events_FI_1` (`venue_id`),
    INDEX `events_FI_2` (`sponsor_id`),
    INDEX `events_FI_3` (`drink_id`),
    INDEX `events_FI_4` (`creator_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- creators
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `creators`;

CREATE TABLE `creators`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `cell_number` INTEGER(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- sponsors
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sponsors`;

CREATE TABLE `sponsors`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `sponsor_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- venues
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `venues`;

CREATE TABLE `venues`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `venue_name` VARCHAR(255) NOT NULL,
    `city` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- drinks
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `drinks`;

CREATE TABLE `drinks`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `drink_name` VARCHAR(255) NOT NULL,
    `drink_type` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
