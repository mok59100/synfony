<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207141857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambres (id INT AUTO_INCREMENT NOT NULL, id_hotel_id INT NOT NULL, numero_chambre INT NOT NULL, type_chambre VARCHAR(50) NOT NULL, capacite_chambre INT NOT NULL, INDEX IDX_36C929626298578D (id_hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels (id INT AUTO_INCREMENT NOT NULL, libelle_hotel VARCHAR(50) NOT NULL, adresse VARCHAR(100) NOT NULL, code_postal INT NOT NULL, ville VARCHAR(50) NOT NULL, categorie_hotel VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambres ADD CONSTRAINT FK_36C929626298578D FOREIGN KEY (id_hotel_id) REFERENCES hotels (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambres DROP FOREIGN KEY FK_36C929626298578D');
        $this->addSql('DROP TABLE chambres');
        $this->addSql('DROP TABLE hotels');
    }
}
