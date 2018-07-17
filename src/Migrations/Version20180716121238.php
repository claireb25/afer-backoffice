<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180716121238 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_ABE6511A34844D60 ON prefecture');
        $this->addSql('ALTER TABLE prefecture ADD autorite_prefecture_id_id INT DEFAULT NULL, ADD service_prefecture_id_id INT DEFAULT NULL, DROP prefecture_nature, DROP prefecture_service, CHANGE autorite_id_id prefecture_nature_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AF0DA99CA FOREIGN KEY (prefecture_nature_id_id) REFERENCES nature_prefecture (id)');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AD3CAE0E FOREIGN KEY (autorite_prefecture_id_id) REFERENCES autorite_prefecture (id)');
        $this->addSql('ALTER TABLE prefecture ADD CONSTRAINT FK_ABE6511AD33E3E39 FOREIGN KEY (service_prefecture_id_id) REFERENCES service_prefecture (id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AF0DA99CA ON prefecture (prefecture_nature_id_id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AD3CAE0E ON prefecture (autorite_prefecture_id_id)');
        $this->addSql('CREATE INDEX IDX_ABE6511AD33E3E39 ON prefecture (service_prefecture_id_id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAF2A34D77F FOREIGN KEY (nature_tribunal_id_id) REFERENCES nature_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFBEFB0DC0 FOREIGN KEY (autorite_tribunal_id_id) REFERENCES autorite_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFD6DDE9B6 FOREIGN KEY (service_tribunal_id_id) REFERENCES service_tribunal (id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAF2A34D77F ON tribunal (nature_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal (autorite_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal (service_tribunal_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AF0DA99CA');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AD3CAE0E');
        $this->addSql('ALTER TABLE prefecture DROP FOREIGN KEY FK_ABE6511AD33E3E39');
        $this->addSql('DROP INDEX IDX_ABE6511AF0DA99CA ON prefecture');
        $this->addSql('DROP INDEX IDX_ABE6511AD3CAE0E ON prefecture');
        $this->addSql('DROP INDEX IDX_ABE6511AD33E3E39 ON prefecture');
        $this->addSql('ALTER TABLE prefecture ADD autorite_id_id INT DEFAULT NULL, ADD prefecture_nature VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD prefecture_service VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP prefecture_nature_id_id, DROP autorite_prefecture_id_id, DROP service_prefecture_id_id');
        $this->addSql('CREATE INDEX IDX_ABE6511A34844D60 ON prefecture (autorite_id_id)');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAF2A34D77F');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFBEFB0DC0');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFD6DDE9B6');
        $this->addSql('DROP INDEX IDX_DC8C3AAF2A34D77F ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal');
    }
}
