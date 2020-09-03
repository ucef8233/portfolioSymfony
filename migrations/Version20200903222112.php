<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200903222112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE experiance (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, experiance VARCHAR(255) NOT NULL, date VARCHAR(255) NOT NULL, INDEX IDX_8AF25654642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langage (id INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, langage VARCHAR(255) NOT NULL, INDEX IDX_CC50EA26642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experiance ADD CONSTRAINT FK_8AF25654642B8210 FOREIGN KEY (admin_id) REFERENCES info_admin (id)');
        $this->addSql('ALTER TABLE langage ADD CONSTRAINT FK_CC50EA26642B8210 FOREIGN KEY (admin_id) REFERENCES info_admin (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE experiance');
        $this->addSql('DROP TABLE langage');
    }
}
