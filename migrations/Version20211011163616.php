<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211011163616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association_vehicule_conducteur (id INT AUTO_INCREMENT NOT NULL, id_conducteur_id INT NOT NULL, id_vehicule_id INT NOT NULL, INDEX IDX_F94AC86E4F479BA3 (id_conducteur_id), INDEX IDX_F94AC86E5258F8E6 (id_vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE association_vehicule_conducteur ADD CONSTRAINT FK_F94AC86E4F479BA3 FOREIGN KEY (id_conducteur_id) REFERENCES conducteur (id)');
        $this->addSql('ALTER TABLE association_vehicule_conducteur ADD CONSTRAINT FK_F94AC86E5258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicule (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE association_vehicule_conducteur DROP FOREIGN KEY FK_F94AC86E5258F8E6');
        $this->addSql('DROP TABLE association_vehicule_conducteur');
        $this->addSql('DROP TABLE vehicule');
    }
}
