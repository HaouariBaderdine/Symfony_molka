<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200427210615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE etape_circuit (id INT AUTO_INCREMENT NOT NULL, code_ville_id INT DEFAULT NULL, code_circuit_etape_id INT DEFAULT NULL, duree_etape INT NOT NULL, ordre_etape INT NOT NULL, INDEX IDX_484C507D5EBE781D (code_ville_id), INDEX IDX_484C507D71827C11 (code_circuit_etape_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etape_circuit ADD CONSTRAINT FK_484C507D5EBE781D FOREIGN KEY (code_ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE etape_circuit ADD CONSTRAINT FK_484C507D71827C11 FOREIGN KEY (code_circuit_etape_id) REFERENCES circuit (id)');
        $this->addSql('ALTER TABLE ville CHANGE code_dest_id code_dest_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE etape_circuit');
        $this->addSql('ALTER TABLE ville CHANGE code_dest_id code_dest_id INT DEFAULT NULL');
    }
}
