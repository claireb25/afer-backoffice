<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180716104222 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animateur CHANGE civilite_id_id civilite_id_id INT DEFAULT NULL, CHANGE fonction_animateur_id_id fonction_animateur_id_id INT DEFAULT NULL, CHANGE statut_id_id statut_id_id INT DEFAULT NULL, CHANGE forfait_animateur_id_id forfait_animateur_id_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL, CHANGE region region VARCHAR(255) DEFAULT NULL, CHANGE tel_portable tel_portable VARCHAR(255) DEFAULT NULL, CHANGE tel_fixe tel_fixe VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE urssaf urssaf VARCHAR(255) DEFAULT NULL, CHANGE siret siret VARCHAR(255) DEFAULT NULL, CHANGE km_a_r km_a_r INT DEFAULT NULL');
        $this->addSql('ALTER TABLE autorite_prefecture CHANGE autorite_nom autorite_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE autorite_tribunal CHANGE autorite_nom autorite_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE bordereau CHANGE prefecture_id_id prefecture_id_id INT DEFAULT NULL, CHANGE tribunal_id_id tribunal_id_id INT DEFAULT NULL, CHANGE liaison_stagiaire_stage_dossier_cas_bordereau_id liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cas_stage CHANGE cas_nom cas_nom VARCHAR(255) DEFAULT NULL, CHANGE cas_prix cas_prix INT DEFAULT NULL');
        $this->addSql('ALTER TABLE civilite CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fonction_animateur CHANGE fonction_nom fonction_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE forfait_animateur CHANGE forfait_prix forfait_prix INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infraction CHANGE tribunal_id_id tribunal_id_id INT DEFAULT NULL, CHANGE date_infraction date_infraction DATETIME DEFAULT NULL, CHANGE heure_infraction heure_infraction TIME DEFAULT NULL, CHANGE numero_parquet numero_parquet VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu_stage CHANGE lieu_nom lieu_nom VARCHAR(255) DEFAULT NULL, CHANGE etablissement_nom etablissement_nom VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL, CHANGE tel tel VARCHAR(255) DEFAULT NULL, CHANGE latitude latitude NUMERIC(20, 18) DEFAULT NULL, CHANGE longitude longitude NUMERIC(20, 18) DEFAULT NULL, CHANGE divers divers VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nature_prefecture CHANGE nature_nom nature_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nature_tribunal CHANGE nature_nom nature_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE permis CHANGE stagiaire_id_id stagiaire_id_id INT DEFAULT NULL, CHANGE prefecture_id_id prefecture_id_id INT DEFAULT NULL, CHANGE numero_permis numero_permis VARCHAR(255) DEFAULT NULL, CHANGE delivre_le delivre_le DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE prefecture CHANGE prefecture_nature_id_id prefecture_nature_id_id INT DEFAULT NULL, CHANGE autorite_prefecture_id_id autorite_prefecture_id_id INT DEFAULT NULL, CHANGE service_prefecture_id_id service_prefecture_id_id INT DEFAULT NULL, CHANGE prefecture_nom prefecture_nom VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service_prefecture CHANGE service_nom service_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE service_tribunal CHANGE service_nom service_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stage CHANGE lieu_stage_id_id lieu_stage_id_id INT DEFAULT NULL, CHANGE stage_numero stage_numero VARCHAR(255) DEFAULT NULL, CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE stagiaire CHANGE civilite_id_id civilite_id_id INT DEFAULT NULL, CHANGE liaison_stagiaire_stage_dossier_cas_bordereau_id liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE nom_naissance nom_naissance VARCHAR(255) DEFAULT NULL, CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE date_naissance date_naissance DATE DEFAULT NULL, CHANGE lieu_naissance lieu_naissance VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL, CHANGE pays pays VARCHAR(255) DEFAULT NULL, CHANGE tel_portable tel_portable VARCHAR(255) DEFAULT NULL, CHANGE tel_fixe tel_fixe VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE statut_animateur CHANGE status_nom status_nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE suivi_dossier CHANGE observations observations VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFB5C87ABA');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFBEFB0DC0');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFD6DDE9B6');
        $this->addSql('DROP INDEX IDX_DC8C3AAFB5C87ABA ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal');
        $this->addSql('ALTER TABLE tribunal ADD nature_tribunal_id_id INT DEFAULT NULL, ADD autorite_tribunal_id_id INT DEFAULT NULL, ADD service_tribunal_id_id INT DEFAULT NULL, DROP tribunal_nature_id, DROP autorite_tribunal_id, DROP service_tribunal_id, CHANGE tribunal_nom tribunal_nom VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE code_postal code_postal VARCHAR(255) DEFAULT NULL, CHANGE commune commune VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAF2A34D77F FOREIGN KEY (nature_tribunal_id_id) REFERENCES nature_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFBEFB0DC0 FOREIGN KEY (autorite_tribunal_id_id) REFERENCES autorite_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFD6DDE9B6 FOREIGN KEY (service_tribunal_id_id) REFERENCES service_tribunal (id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAF2A34D77F ON tribunal (nature_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal (autorite_tribunal_id_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal (service_tribunal_id_id)');
        $this->addSql('ALTER TABLE type_infraction CHANGE type_infraction type_infraction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau CHANGE stage_id_id stage_id_id INT DEFAULT NULL, CHANGE suivi_dossier_id_id suivi_dossier_id_id INT DEFAULT NULL, CHANGE cas_stage_id_id cas_stage_id_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animateur CHANGE civilite_id_id civilite_id_id INT DEFAULT NULL, CHANGE fonction_animateur_id_id fonction_animateur_id_id INT DEFAULT NULL, CHANGE statut_id_id statut_id_id INT DEFAULT NULL, CHANGE forfait_animateur_id_id forfait_animateur_id_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE raison_sociale raison_sociale VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE commune commune VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE region region VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel_portable tel_portable VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel_fixe tel_fixe VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE urssaf urssaf VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE siret siret VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE km_a_r km_a_r INT DEFAULT NULL');
        $this->addSql('ALTER TABLE autorite_prefecture CHANGE autorite_nom autorite_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE autorite_tribunal CHANGE autorite_nom autorite_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE bordereau CHANGE prefecture_id_id prefecture_id_id INT DEFAULT NULL, CHANGE tribunal_id_id tribunal_id_id INT DEFAULT NULL, CHANGE liaison_stagiaire_stage_dossier_cas_bordereau_id liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cas_stage CHANGE cas_nom cas_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE cas_prix cas_prix INT DEFAULT NULL');
        $this->addSql('ALTER TABLE civilite CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE fonction_animateur CHANGE fonction_nom fonction_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE forfait_animateur CHANGE forfait_prix forfait_prix INT DEFAULT NULL');
        $this->addSql('ALTER TABLE infraction CHANGE tribunal_id_id tribunal_id_id INT DEFAULT NULL, CHANGE date_infraction date_infraction DATETIME DEFAULT \'NULL\', CHANGE heure_infraction heure_infraction TIME DEFAULT \'NULL\', CHANGE numero_parquet numero_parquet VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau CHANGE stage_id_id stage_id_id INT DEFAULT NULL, CHANGE suivi_dossier_id_id suivi_dossier_id_id INT DEFAULT NULL, CHANGE cas_stage_id_id cas_stage_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lieu_stage CHANGE lieu_nom lieu_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE etablissement_nom etablissement_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE commune commune VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel tel VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE latitude latitude NUMERIC(20, 18) DEFAULT \'NULL\', CHANGE longitude longitude NUMERIC(20, 18) DEFAULT \'NULL\', CHANGE divers divers VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE nature_prefecture CHANGE nature_nom nature_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE nature_tribunal CHANGE nature_nom nature_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE permis CHANGE stagiaire_id_id stagiaire_id_id INT DEFAULT NULL, CHANGE prefecture_id_id prefecture_id_id INT DEFAULT NULL, CHANGE numero_permis numero_permis VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE delivre_le delivre_le DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE prefecture CHANGE prefecture_nature_id_id prefecture_nature_id_id INT DEFAULT NULL, CHANGE autorite_prefecture_id_id autorite_prefecture_id_id INT DEFAULT NULL, CHANGE service_prefecture_id_id service_prefecture_id_id INT DEFAULT NULL, CHANGE prefecture_nom prefecture_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE commune commune VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE service_prefecture CHANGE service_nom service_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE service_tribunal CHANGE service_nom service_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE stage CHANGE lieu_stage_id_id lieu_stage_id_id INT DEFAULT NULL, CHANGE stage_numero stage_numero VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE stagiaire CHANGE civilite_id_id civilite_id_id INT DEFAULT NULL, CHANGE liaison_stagiaire_stage_dossier_cas_bordereau_id liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE nom_naissance nom_naissance VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\', CHANGE lieu_naissance lieu_naissance VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE commune commune VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE pays pays VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel_portable tel_portable VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE tel_fixe tel_fixe VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE statut_animateur CHANGE status_nom status_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE suivi_dossier CHANGE observations observations VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAF2A34D77F');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFBEFB0DC0');
        $this->addSql('ALTER TABLE tribunal DROP FOREIGN KEY FK_DC8C3AAFD6DDE9B6');
        $this->addSql('DROP INDEX IDX_DC8C3AAF2A34D77F ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal');
        $this->addSql('DROP INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal');
        $this->addSql('ALTER TABLE tribunal ADD tribunal_nature_id INT DEFAULT NULL, ADD autorite_tribunal_id INT DEFAULT NULL, ADD service_tribunal_id INT DEFAULT NULL, DROP nature_tribunal_id_id, DROP autorite_tribunal_id_id, DROP service_tribunal_id_id, CHANGE tribunal_nom tribunal_nom VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE code_postal code_postal VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE commune commune VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFB5C87ABA FOREIGN KEY (tribunal_nature_id) REFERENCES nature_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFBEFB0DC0 FOREIGN KEY (autorite_tribunal_id) REFERENCES autorite_tribunal (id)');
        $this->addSql('ALTER TABLE tribunal ADD CONSTRAINT FK_DC8C3AAFD6DDE9B6 FOREIGN KEY (service_tribunal_id) REFERENCES service_tribunal (id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFB5C87ABA ON tribunal (tribunal_nature_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFBEFB0DC0 ON tribunal (autorite_tribunal_id)');
        $this->addSql('CREATE INDEX IDX_DC8C3AAFD6DDE9B6 ON tribunal (service_tribunal_id)');
        $this->addSql('ALTER TABLE type_infraction CHANGE type_infraction type_infraction VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
