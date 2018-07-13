<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180713095445 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, lieu_stage_id_id INT DEFAULT NULL, stage_numero VARCHAR(255) DEFAULT NULL, date DATETIME DEFAULT NULL, stage_hpo TINYINT(1) NOT NULL, INDEX IDX_C27C936933BA3147 (lieu_stage_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bordereau (id INT AUTO_INCREMENT NOT NULL, prefecture_id_id INT DEFAULT NULL, tribunal_id_id INT DEFAULT NULL, liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL, INDEX IDX_F7B4C561747B1928 (prefecture_id_id), INDEX IDX_F7B4C561D5BBB400 (tribunal_id_id), INDEX IDX_F7B4C56199205C5B (liaison_stagiaire_stage_dossier_cas_bordereau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi_dossier (id INT AUTO_INCREMENT NOT NULL, paye TINYINT(1) NOT NULL, reception_bulletin_inscription TINYINT(1) NOT NULL, copie_cni TINYINT(1) NOT NULL, copie_permis TINYINT(1) NOT NULL, releve_integral TINYINT(1) NOT NULL, decision_judiciaire TINYINT(1) NOT NULL, lettre_48n TINYINT(1) NOT NULL, observations VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi_dossier_mode_envoi_inscription (suivi_dossier_id INT NOT NULL, mode_envoi_inscription_id INT NOT NULL, INDEX IDX_3BE805C6CB7FE0F2 (suivi_dossier_id), INDEX IDX_3BE805C66DE5DB3E (mode_envoi_inscription_id), PRIMARY KEY(suivi_dossier_id, mode_envoi_inscription_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi_dossier_mode_envoi_convoc (suivi_dossier_id INT NOT NULL, mode_envoi_convoc_id INT NOT NULL, INDEX IDX_BB397385CB7FE0F2 (suivi_dossier_id), INDEX IDX_BB39738547801C9D (mode_envoi_convoc_id), PRIMARY KEY(suivi_dossier_id, mode_envoi_convoc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_infraction (id INT AUTO_INCREMENT NOT NULL, type_infraction VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu_stage (id INT AUTO_INCREMENT NOT NULL, lieu_nom VARCHAR(255) DEFAULT NULL, etablissement_nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, latitude NUMERIC(20, 18) DEFAULT NULL, longitude NUMERIC(20, 18) DEFAULT NULL, divers VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_envoi_inscription (id INT AUTO_INCREMENT NOT NULL, courrier TINYINT(1) NOT NULL, email TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permis (id INT AUTO_INCREMENT NOT NULL, stagiaire_id_id INT DEFAULT NULL, prefecture_id_id INT DEFAULT NULL, numero_permis VARCHAR(255) DEFAULT NULL, delivre_le DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_173894532AA7DFFB (stagiaire_id_id), INDEX IDX_17389453747B1928 (prefecture_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prefecture (id INT AUTO_INCREMENT NOT NULL, prefecture_nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liaison_stagiaire_stage_dossier_cas_bordereau (id INT AUTO_INCREMENT NOT NULL, stage_id_id INT DEFAULT NULL, suivi_dossier_id_id INT DEFAULT NULL, cas_stage_id_id INT DEFAULT NULL, INDEX IDX_CF1E2B42FFE32C93 (stage_id_id), UNIQUE INDEX UNIQ_CF1E2B424EC5FD04 (suivi_dossier_id_id), UNIQUE INDEX UNIQ_CF1E2B4248F70A6A (cas_stage_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tribunal (id INT AUTO_INCREMENT NOT NULL, tribunal_nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_envoi_convoc (id INT AUTO_INCREMENT NOT NULL, courrier TINYINT(1) NOT NULL, email TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animateur (id INT AUTO_INCREMENT NOT NULL, civilite_id_id INT DEFAULT NULL, fonction_animateur_id_id INT DEFAULT NULL, statut_id_id INT DEFAULT NULL, forfait_animateur_id_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, gta TINYINT(1) NOT NULL, raison_sociale VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, tel_portable VARCHAR(255) DEFAULT NULL, tel_fixe VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, urssaf VARCHAR(255) DEFAULT NULL, siret VARCHAR(255) DEFAULT NULL, km_a_r INT DEFAULT NULL, repas TINYINT(1) NOT NULL, INDEX IDX_2064DB2CC6BE736B (civilite_id_id), INDEX IDX_2064DB2C5A467232 (fonction_animateur_id_id), INDEX IDX_2064DB2C4DB9F129 (statut_id_id), INDEX IDX_2064DB2CB364AC04 (forfait_animateur_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE animateur_stage (animateur_id INT NOT NULL, stage_id INT NOT NULL, INDEX IDX_4A06D2447F05C301 (animateur_id), INDEX IDX_4A06D2442298D193 (stage_id), PRIMARY KEY(animateur_id, stage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_animateur (id INT AUTO_INCREMENT NOT NULL, status_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infraction (id INT AUTO_INCREMENT NOT NULL, tribunal_id_id INT DEFAULT NULL, date_infraction DATETIME DEFAULT NULL, heure_infraction TIME DEFAULT NULL, lieu_infraction LONGTEXT DEFAULT NULL, numero_parquet VARCHAR(255) DEFAULT NULL, conduite_sans_permis TINYINT(1) NOT NULL, conduite_sans_assurance TINYINT(1) NOT NULL, INDEX IDX_C1A458F5D5BBB400 (tribunal_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infraction_type_infraction (infraction_id INT NOT NULL, type_infraction_id INT NOT NULL, INDEX IDX_8E64B76A7697C467 (infraction_id), INDEX IDX_8E64B76A67A7352 (type_infraction_id), PRIMARY KEY(infraction_id, type_infraction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forfait_animateur (id INT AUTO_INCREMENT NOT NULL, forfait_prix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stagiaire (id INT AUTO_INCREMENT NOT NULL, civilite_id_id INT DEFAULT NULL, liaison_stagiaire_stage_dossier_cas_bordereau_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, nom_naissance VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, date_naissance DATETIME DEFAULT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, commune VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, tel_portable VARCHAR(255) DEFAULT NULL, tel_fixe VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, carte_avantages_jeunes TINYINT(1) NOT NULL, partenaires TINYINT(1) NOT NULL, adherents TINYINT(1) NOT NULL, INDEX IDX_4F62F731C6BE736B (civilite_id_id), INDEX IDX_4F62F73199205C5B (liaison_stagiaire_stage_dossier_cas_bordereau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction_animateur (id INT AUTO_INCREMENT NOT NULL, fonction_nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civilite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cas_stage (id INT AUTO_INCREMENT NOT NULL, cas_nom VARCHAR(255) DEFAULT NULL, cas_prix INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C936933BA3147 FOREIGN KEY (lieu_stage_id_id) REFERENCES lieu_stage (id)');
        $this->addSql('ALTER TABLE bordereau ADD CONSTRAINT FK_F7B4C561747B1928 FOREIGN KEY (prefecture_id_id) REFERENCES prefecture (id)');
        $this->addSql('ALTER TABLE bordereau ADD CONSTRAINT FK_F7B4C561D5BBB400 FOREIGN KEY (tribunal_id_id) REFERENCES tribunal (id)');
        $this->addSql('ALTER TABLE bordereau ADD CONSTRAINT FK_F7B4C56199205C5B FOREIGN KEY (liaison_stagiaire_stage_dossier_cas_bordereau_id) REFERENCES liaison_stagiaire_stage_dossier_cas_bordereau (id)');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_inscription ADD CONSTRAINT FK_3BE805C6CB7FE0F2 FOREIGN KEY (suivi_dossier_id) REFERENCES suivi_dossier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_inscription ADD CONSTRAINT FK_3BE805C66DE5DB3E FOREIGN KEY (mode_envoi_inscription_id) REFERENCES mode_envoi_inscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_convoc ADD CONSTRAINT FK_BB397385CB7FE0F2 FOREIGN KEY (suivi_dossier_id) REFERENCES suivi_dossier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_convoc ADD CONSTRAINT FK_BB39738547801C9D FOREIGN KEY (mode_envoi_convoc_id) REFERENCES mode_envoi_convoc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE permis ADD CONSTRAINT FK_173894532AA7DFFB FOREIGN KEY (stagiaire_id_id) REFERENCES stagiaire (id)');
        $this->addSql('ALTER TABLE permis ADD CONSTRAINT FK_17389453747B1928 FOREIGN KEY (prefecture_id_id) REFERENCES prefecture (id)');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau ADD CONSTRAINT FK_CF1E2B42FFE32C93 FOREIGN KEY (stage_id_id) REFERENCES stage (id)');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau ADD CONSTRAINT FK_CF1E2B424EC5FD04 FOREIGN KEY (suivi_dossier_id_id) REFERENCES suivi_dossier (id)');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau ADD CONSTRAINT FK_CF1E2B4248F70A6A FOREIGN KEY (cas_stage_id_id) REFERENCES cas_stage (id)');
        $this->addSql('ALTER TABLE animateur ADD CONSTRAINT FK_2064DB2CC6BE736B FOREIGN KEY (civilite_id_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE animateur ADD CONSTRAINT FK_2064DB2C5A467232 FOREIGN KEY (fonction_animateur_id_id) REFERENCES fonction_animateur (id)');
        $this->addSql('ALTER TABLE animateur ADD CONSTRAINT FK_2064DB2C4DB9F129 FOREIGN KEY (statut_id_id) REFERENCES statut_animateur (id)');
        $this->addSql('ALTER TABLE animateur ADD CONSTRAINT FK_2064DB2CB364AC04 FOREIGN KEY (forfait_animateur_id_id) REFERENCES forfait_animateur (id)');
        $this->addSql('ALTER TABLE animateur_stage ADD CONSTRAINT FK_4A06D2447F05C301 FOREIGN KEY (animateur_id) REFERENCES animateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animateur_stage ADD CONSTRAINT FK_4A06D2442298D193 FOREIGN KEY (stage_id) REFERENCES stage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infraction ADD CONSTRAINT FK_C1A458F5D5BBB400 FOREIGN KEY (tribunal_id_id) REFERENCES tribunal (id)');
        $this->addSql('ALTER TABLE infraction_type_infraction ADD CONSTRAINT FK_8E64B76A7697C467 FOREIGN KEY (infraction_id) REFERENCES infraction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infraction_type_infraction ADD CONSTRAINT FK_8E64B76A67A7352 FOREIGN KEY (type_infraction_id) REFERENCES type_infraction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F731C6BE736B FOREIGN KEY (civilite_id_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE stagiaire ADD CONSTRAINT FK_4F62F73199205C5B FOREIGN KEY (liaison_stagiaire_stage_dossier_cas_bordereau_id) REFERENCES liaison_stagiaire_stage_dossier_cas_bordereau (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau DROP FOREIGN KEY FK_CF1E2B42FFE32C93');
        $this->addSql('ALTER TABLE animateur_stage DROP FOREIGN KEY FK_4A06D2442298D193');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_inscription DROP FOREIGN KEY FK_3BE805C6CB7FE0F2');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_convoc DROP FOREIGN KEY FK_BB397385CB7FE0F2');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau DROP FOREIGN KEY FK_CF1E2B424EC5FD04');
        $this->addSql('ALTER TABLE infraction_type_infraction DROP FOREIGN KEY FK_8E64B76A67A7352');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C936933BA3147');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_inscription DROP FOREIGN KEY FK_3BE805C66DE5DB3E');
        $this->addSql('ALTER TABLE bordereau DROP FOREIGN KEY FK_F7B4C561747B1928');
        $this->addSql('ALTER TABLE permis DROP FOREIGN KEY FK_17389453747B1928');
        $this->addSql('ALTER TABLE bordereau DROP FOREIGN KEY FK_F7B4C56199205C5B');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F73199205C5B');
        $this->addSql('ALTER TABLE bordereau DROP FOREIGN KEY FK_F7B4C561D5BBB400');
        $this->addSql('ALTER TABLE infraction DROP FOREIGN KEY FK_C1A458F5D5BBB400');
        $this->addSql('ALTER TABLE suivi_dossier_mode_envoi_convoc DROP FOREIGN KEY FK_BB39738547801C9D');
        $this->addSql('ALTER TABLE animateur_stage DROP FOREIGN KEY FK_4A06D2447F05C301');
        $this->addSql('ALTER TABLE animateur DROP FOREIGN KEY FK_2064DB2C4DB9F129');
        $this->addSql('ALTER TABLE infraction_type_infraction DROP FOREIGN KEY FK_8E64B76A7697C467');
        $this->addSql('ALTER TABLE animateur DROP FOREIGN KEY FK_2064DB2CB364AC04');
        $this->addSql('ALTER TABLE permis DROP FOREIGN KEY FK_173894532AA7DFFB');
        $this->addSql('ALTER TABLE animateur DROP FOREIGN KEY FK_2064DB2C5A467232');
        $this->addSql('ALTER TABLE animateur DROP FOREIGN KEY FK_2064DB2CC6BE736B');
        $this->addSql('ALTER TABLE stagiaire DROP FOREIGN KEY FK_4F62F731C6BE736B');
        $this->addSql('ALTER TABLE liaison_stagiaire_stage_dossier_cas_bordereau DROP FOREIGN KEY FK_CF1E2B4248F70A6A');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE bordereau');
        $this->addSql('DROP TABLE suivi_dossier');
        $this->addSql('DROP TABLE suivi_dossier_mode_envoi_inscription');
        $this->addSql('DROP TABLE suivi_dossier_mode_envoi_convoc');
        $this->addSql('DROP TABLE type_infraction');
        $this->addSql('DROP TABLE lieu_stage');
        $this->addSql('DROP TABLE mode_envoi_inscription');
        $this->addSql('DROP TABLE permis');
        $this->addSql('DROP TABLE prefecture');
        $this->addSql('DROP TABLE liaison_stagiaire_stage_dossier_cas_bordereau');
        $this->addSql('DROP TABLE tribunal');
        $this->addSql('DROP TABLE mode_envoi_convoc');
        $this->addSql('DROP TABLE animateur');
        $this->addSql('DROP TABLE animateur_stage');
        $this->addSql('DROP TABLE statut_animateur');
        $this->addSql('DROP TABLE infraction');
        $this->addSql('DROP TABLE infraction_type_infraction');
        $this->addSql('DROP TABLE forfait_animateur');
        $this->addSql('DROP TABLE stagiaire');
        $this->addSql('DROP TABLE fonction_animateur');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE cas_stage');
    }
}
