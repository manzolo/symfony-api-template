<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200526201515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__manzolo AS SELECT id, description, y FROM manzolo');
        $this->addSql('DROP TABLE manzolo');
        $this->addSql('CREATE TABLE manzolo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(4000) NOT NULL COLLATE BINARY, day DATETIME NOT NULL)');
        $this->addSql('INSERT INTO manzolo (id, description, day) SELECT id, description, y FROM __temp__manzolo');
        $this->addSql('DROP TABLE __temp__manzolo');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__manzolo AS SELECT id, description, day FROM manzolo');
        $this->addSql('DROP TABLE manzolo');
        $this->addSql('CREATE TABLE manzolo (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(4000) NOT NULL, y DATETIME NOT NULL)');
        $this->addSql('INSERT INTO manzolo (id, description, y) SELECT id, description, day FROM __temp__manzolo');
        $this->addSql('DROP TABLE __temp__manzolo');
    }
}
