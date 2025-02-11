<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250211115318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponsequiz (id INT AUTO_INCREMENT NOT NULL, id_quiz_id INT NOT NULL, reponsequiz LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_81D4714C5BA17805 (id_quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponsequiz ADD CONSTRAINT FK_81D4714C5BA17805 FOREIGN KEY (id_quiz_id) REFERENCES questionquiz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponsequiz DROP FOREIGN KEY FK_81D4714C5BA17805');
        $this->addSql('DROP TABLE reponsequiz');
    }
}
