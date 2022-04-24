<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205161253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Activity (IdActivity INT AUTO_INCREMENT NOT NULL, Name VARCHAR(100) NOT NULL, Color VARCHAR(100) NOT NULL, Login VARCHAR(10) DEFAULT NULL, INDEX actv_login_fk (Login), PRIMARY KEY(IdActivity)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE TaskPlanned (IdTaskPlanned INT AUTO_INCREMENT NOT NULL, Name VARCHAR(100) NOT NULL, Comment VARCHAR(100) DEFAULT NULL, Date DATE NOT NULL, BeginTime TIME NOT NULL, Duration NUMERIC(11, 2) NOT NULL, Login VARCHAR(10) DEFAULT NULL, INDEX index_task_planned_1 (Login), PRIMARY KEY(IdTaskPlanned)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE User (Login VARCHAR(10) NOT NULL, Name VARCHAR(100) NOT NULL, LastName VARCHAR(100) DEFAULT NULL, Email VARCHAR(100) DEFAULT NULL, Phone INT NOT NULL, IsAdmin TINYINT(1) NOT NULL, PRIMARY KEY(Login)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Activity ADD CONSTRAINT FK_55026B0C6BC9E414 FOREIGN KEY (Login) REFERENCES User (Login)');
        $this->addSql('ALTER TABLE TaskPlanned ADD CONSTRAINT FK_EA3E172B6BC9E414 FOREIGN KEY (Login) REFERENCES User (Login)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Activity DROP FOREIGN KEY FK_55026B0C6BC9E414');
        $this->addSql('ALTER TABLE TaskPlanned DROP FOREIGN KEY FK_EA3E172B6BC9E414');
        $this->addSql('DROP TABLE Activity');
        $this->addSql('DROP TABLE TaskPlanned');
        $this->addSql('DROP TABLE User');
    }
}
