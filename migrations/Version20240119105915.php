<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240119105915 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_room (user_id INT NOT NULL, room_id INT NOT NULL, PRIMARY KEY(user_id, room_id))');
        $this->addSql('CREATE INDEX IDX_81E1D52A76ED395 ON user_room (user_id)');
        $this->addSql('CREATE INDEX IDX_81E1D5254177093 ON user_room (room_id)');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D52A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D5254177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_room DROP CONSTRAINT FK_81E1D52A76ED395');
        $this->addSql('ALTER TABLE user_room DROP CONSTRAINT FK_81E1D5254177093');
        $this->addSql('DROP TABLE user_room');
    }
}
