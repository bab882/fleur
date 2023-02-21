<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221120948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE reset_password_request_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reset_password_request (id INT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7CE748AA76ED395 ON reset_password_request (user_id)');
        $this->addSql('COMMENT ON COLUMN reset_password_request.requested_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN reset_password_request.expires_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD first_name VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD middle_name VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD last_name VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD mobile VARCHAR(15) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD vendor VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD registred_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD profile TEXT DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN "user".registred_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "user".last_login IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE reset_password_request_id_seq CASCADE');
        $this->addSql('ALTER TABLE reset_password_request DROP CONSTRAINT FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE "user" DROP first_name');
        $this->addSql('ALTER TABLE "user" DROP middle_name');
        $this->addSql('ALTER TABLE "user" DROP last_name');
        $this->addSql('ALTER TABLE "user" DROP mobile');
        $this->addSql('ALTER TABLE "user" DROP vendor');
        $this->addSql('ALTER TABLE "user" DROP registred_at');
        $this->addSql('ALTER TABLE "user" DROP last_login');
        $this->addSql('ALTER TABLE "user" DROP profile');
    }
}
