<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230227102601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pictures ADD image_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures ADD image_size INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures DROP pictures');
        $this->addSql('ALTER TABLE pictures ALTER product_id SET NOT NULL');
        $this->addSql('COMMENT ON COLUMN pictures.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE product RENAME COLUMN ../../img/ TO end_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE pictures ADD pictures VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pictures DROP image_name');
        $this->addSql('ALTER TABLE pictures DROP updated_at');
        $this->addSql('ALTER TABLE pictures DROP image_size');
        $this->addSql('ALTER TABLE pictures ALTER product_id DROP NOT NULL');
        $this->addSql('ALTER TABLE product RENAME COLUMN end_at TO ../../img/');
    }
}

