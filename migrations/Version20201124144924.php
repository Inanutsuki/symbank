<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201124144924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD credit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455CE062FF9 FOREIGN KEY (credit_id) REFERENCES credit (id)');
        $this->addSql('CREATE INDEX IDX_C7440455CE062FF9 ON client (credit_id)');
        $this->addSql('ALTER TABLE credit DROP FOREIGN KEY FK_1CC16EFE19EB6921');
        $this->addSql('DROP INDEX IDX_1CC16EFE19EB6921 ON credit');
        $this->addSql('ALTER TABLE credit DROP client_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455CE062FF9');
        $this->addSql('DROP INDEX IDX_C7440455CE062FF9 ON client');
        $this->addSql('ALTER TABLE client DROP credit_id');
        $this->addSql('ALTER TABLE credit ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE credit ADD CONSTRAINT FK_1CC16EFE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_1CC16EFE19EB6921 ON credit (client_id)');
    }
}
