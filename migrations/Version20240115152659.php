<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240115152659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE review DROP CONSTRAINT fk_794381c68e2368ab');
        $this->addSql('DROP INDEX idx_794381c68e2368ab');
        $this->addSql('ALTER TABLE review RENAME COLUMN rooms_id TO room_id');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C654177093 FOREIGN KEY (room_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_794381C654177093 ON review (room_id)');
        $this->addSql('ALTER TABLE "user" ADD is_verified BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP is_verified');
        $this->addSql('ALTER TABLE review DROP CONSTRAINT FK_794381C654177093');
        $this->addSql('DROP INDEX IDX_794381C654177093');
        $this->addSql('ALTER TABLE review RENAME COLUMN room_id TO rooms_id');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT fk_794381c68e2368ab FOREIGN KEY (rooms_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_794381c68e2368ab ON review (rooms_id)');
    }
}
