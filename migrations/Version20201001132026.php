<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001132026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD client_message_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C32E2E68 FOREIGN KEY (client_message_id) REFERENCES message (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455C32E2E68 ON client (client_message_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C32E2E68');
        $this->addSql('DROP INDEX UNIQ_C7440455C32E2E68 ON client');
        $this->addSql('ALTER TABLE client DROP client_message_id');
    }
}
