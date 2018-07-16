<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180716115957 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511A34844D60');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAF34844D60');
        $this->addSql('CREATE TABLE nature_tribunal (id INT AUTO_INCREMENT NOT NULL, nature_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_tribunal (id INT AUTO_INCREMENT NOT NULL, service_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_prefecture (id INT AUTO_INCREMENT NOT NULL, service_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autorite_prefecture (id INT AUTO_INCREMENT NOT NULL, autorite_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nature_prefecture (id INT AUTO_INCREMENT NOT NULL, nature_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autorite_tribunal (id INT AUTO_INCREMENT NOT NULL, autorite_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE autorite');
        $this->addSql('DROP INDEX IDX_DC8C3AAF34844D60 ON tribunal');
        $this->addSql('ALTER TABLE tribunal ADD autorite_tribunal_id_id INT DEFAULT NULL, ADD service_tribunal_id_id INT DEFAULT NULL, DROP tribunal_nature, DROP tribunal_service, CHANGE autorite_id_id nature_tribunal_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAF2A34D77F FOREIGN KEY (nature_tribunal_id_id) REFERENCES nature_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFBEFB0DC0 FOREIGN KEY (autorite_tribunal_id_id) REFERENCES autorite_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFD6DDE9B6 FOREIGN KEY (service_tribunal_id_id) REFERENCES service_tribunal (id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAF2A34D77F ON tribunal (nature_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal (autorite_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal (service_tribunal_id_id)');
        $this->addSql('DROP INDEX IDX_ABE6511A34844D60 ON prefecture');
        $this->addSql('ALTER TABLE prefecture ADD autorite_prefecture_id_id INT DEFAULT NULL, ADD service_prefecture_id_id INT DEFAULT NULL, DROP prefecture_nature, DROP prefecture_service, CHANGE autorite_id_id prefecture_nature_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AF0DA99CA FOREIGN KEY (prefecture_nature_id_id) REFERENCES nature_prefecture (id)');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AD3CAE0E FOREIGN KEY (autorite_prefecture_id_id) REFERENCES autorite_prefecture (id)');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AD33E3E39 FOREIGN KEY (service_prefecture_id_id) REFERENCES service_prefecture (id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AF0DA99CA ON prefecture (prefecture_nature_id_id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AD3CAE0E ON prefecture (autorite_prefecture_id_id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AD33E3E39 ON prefecture (service_prefecture_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAF2A34D77F');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFD6DDE9B6');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AD33E3E39');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AD3CAE0E');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AF0DA99CA');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFBEFB0DC0');
        $this->addSql('CREATE TABLE autorite (id INT AUTO_INCREMENT NOT NULL, autorite_nom VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE nature_tribunal');
        $this->addSql('DROP TABLE service_tribunal');
        $this->addSql('DROP TABLE service_prefecture');
        $this->addSql('DROP TABLE autorite_prefecture');
        $this->addSql('DROP TABLE nature_prefecture');
        $this->addSql('DROP TABLE autorite_tribunal');
        $this->addSql('DROP INDEX IDX_ABE6511AF0DA99CA ON prefecture');
        $this->addSql('DROP INDEX IDX_ABE6511AD3CAE0E ON prefecture');
        $this->addSql('DROP INDEX IDX_ABE6511AD33E3E39 ON prefecture');
        $this->addSql('ALTER TABLE prefecture ADD autorite_id_id INT DEFAULT NULL, ADD prefecture_nature VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD prefecture_service VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP prefecture_nature_id_id, DROP autorite_prefecture_id_id, DROP service_prefecture_id_id');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511A34844D60 FOREIGN KEY (autorite_id_id) REFERENCES autorite (id)');
        $this->addSql('CREATE INDEX IDX_ABE6511A34844D60 ON prefecture (autorite_id_id)');
        $this->addSql('DROP INDEX IDX_DC8C3AAF2A34D77F ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal');
        $this->addSql('ALTER TABLE tribunal ADD autorite_id_id INT DEFAULT NULL, ADD tribunal_nature VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD tribunal_service VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP nature_tribunal_id_id, DROP autorite_tribunal_id_id, DROP service_tribunal_id_id');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAF34844D60 FOREIGN KEY (autorite_id_id) REFERENCES autorite (id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAF34844D60 ON tribunal (autorite_id_id)');
    }
}
