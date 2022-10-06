<?php

declare(strict_types=1);

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004012313 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs'
        // tabel category
        $createTable = <<<SQL
        CREATE TABLE `product_category` (
        `uuid` VARCHAR(36) NOT NULL,
        `name` VARCHAR(200) NULL DEFAULT NULL,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL DEFAULT NULL,
        `deleted_at` DATETIME NULL DEFAULT NULL,
        PRIMARY KEY (`uuid`));
SQL;
        $this->addSql($createTable);


        // tabel product
        $createTable = <<<SQL
        CREATE TABLE `product` (
        `uuid` VARCHAR(36) NOT NULL,
        `product_category_uuid` VARCHAR(36) NULL DEFAULT NULL,
        `name` VARCHAR(200) NULL DEFAULT NULL,
        `price` FLOAT NULL DEFAULT NULL,
        `photo` VARCHAR(200) NULL DEFAULT NULL,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL DEFAULT NULL,
        `deleted_at` DATETIME NULL DEFAULT NULL,
        PRIMARY KEY (`uuid`),
        INDEX `product_product_category_idx` (`product_category_uuid` ASC),
        CONSTRAINT `fk_product_product_category`
        FOREIGN KEY (`product_category_uuid`)
        REFERENCES `product_category` (`uuid`)
        ON DELETE SET NULL
        ON UPDATE NO ACTION);
            ENGINE=InnoDB
            DEFAULT CHARSET=utf8
            COLLATE=utf8_unicode_ci;
SQL;
        $this->addSql($createTable);

        // tabel warehouse
        $createTable = <<<SQL
        CREATE TABLE `warehouse` (
        `uuid` VARCHAR(36) NOT NULL,
        `name` VARCHAR(200) NULL DEFAULT NULL,
        `code` VARCHAR(200) NULL DEFAULT NULL,
        `type` VARCHAR(200) NULL DEFAULT NULL,
        `product_uuid` VARCHAR(36) NULL DEFAULT NULL,
        `warehouse_uuid` VARCHAR(36) NULL DEFAULT NULL,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL DEFAULT NULL,
        `deleted_at` DATETIME NULL DEFAULT NULL,
        PRIMARY KEY (`uuid`),
        INDEX `warehouse_product_idx` (`product_uuid` ASC),
        CONSTRAINT `fk_warehouse_product`
            FOREIGN KEY (`product_uuid`)
            REFERENCES `product` (`uuid`)
            ON DELETE SET NULL
            ON UPDATE NO ACTION,
        INDEX `warehouse_warehouse_product_idx` (`warehouse_uuid` ASC),
        CONSTRAINT `fk_warehouse_warehouse_product`
            FOREIGN KEY (`warehouse_uuid`)
            REFERENCES `warehouse_product` (`uuid`)
            ON DELETE SET NULL
            ON UPDATE NO ACTION);
            ENGINE=InnoDB
            DEFAULT CHARSET=utf8
            COLLATE=utf8_unicode_ci;
SQL;
        $this->addSql($createTable);


        $createTable = <<<SQL
        CREATE TABLE `warehouse_product` (
        `uuid` VARCHAR(36) NOT NULL,
        `warehouse_uuid` VARCHAR(36) NULL DEFAULT NULL,
        `product_uuid` VARCHAR(36) NULL DEFAULT NULL,
        `stock` INT NULL DEFAULT NULL,
        `created_at` DATETIME NULL,
        `updated_at` DATETIME NULL DEFAULT NULL,
        `deleted_at` DATETIME NULL DEFAULT NULL,
        PRIMARY KEY (`uuid`),
        INDEX `warehouse_product_warehouse_idx` (`warehouse_uuid` ASC),
        INDEX `warehouse_product_product_idx` (`product_uuid` ASC),
        CONSTRAINT `fk_warehouse_product_warehouse`
            FOREIGN KEY (`warehouse_uuid`)
            REFERENCES `warehouse` (`uuid`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
        CONSTRAINT `fk_warehouse_product_product`
            FOREIGN KEY (`product_uuid`)
            REFERENCES `product` (`uuid`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ENGINE = InnoDB
        DEFAULT CHARACTER SET = utf8
        COLLATE = utf8_unicode_ci;
SQL;
        $this->addSql($createTable);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        //drop tabel yang sudah dibuat
        //         ALTER TABLE `warehouse` 
        // DROP FOREIGN KEY `fk_warehouse_warehouse_product`,
        // DROP FOREIGN KEY `fk_warehouse_product`;
        // ALTER TABLE `warehouse` 
        // DROP COLUMN `warehouse_uuid`,
        // DROP COLUMN `product_uuid`,
        // DROP INDEX `warehouse_warehouse_product_idx` ,
        // DROP INDEX `warehouse_product_idx` ;
        // ;



        $dropTable = <<<SQL
        SET FOREIGN_KEY_CHECKS = 0 ;
        DROP TABLE `product_category`,
            `product`,  
            `warehouse`,
            `warehouse_product`
        SET FOREIGN_KEY_CHECKS = 1 ;
    SQL;
        $this->addSql($dropTable);
    }
}
