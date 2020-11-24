<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124141231 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, statut_marital_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, date_de_naissance DATETIME NOT NULL, adresse LONGTEXT NOT NULL, code_postal VARCHAR(5) NOT NULL, telephone VARCHAR(10) NOT NULL, INDEX IDX_C7440455D50AA530 (statut_marital_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE credit (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, organisme VARCHAR(50) NOT NULL, montant NUMERIC(10, 0) NOT NULL, ref_client INT NOT NULL, INDEX IDX_1CC16EFE19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_marital (id INT AUTO_INCREMENT NOT NULL, statut VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455D50AA530 FOREIGN KEY (statut_marital_id) REFERENCES statut_marital (id)');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFE19EB6921');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455D50AA530');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE credit');
        $this->addSql('DROP TABLE statut_marital');
    }
}
