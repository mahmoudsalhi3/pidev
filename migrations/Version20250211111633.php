<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250211111633 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE questionquiz (id INT AUTO_INCREMENT NOT NULL, quiz_id_id INT NOT NULL, textquestion LONGTEXT NOT NULL, nombrepoints INT NOT NULL, INDEX IDX_D96D02108337E7D7 (quiz_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questionquiz ADD CONSTRAINT FK_D96D02108337E7D7 FOREIGN KEY (quiz_id_id) REFERENCES quiz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questionquiz DROP FOREIGN KEY FK_D96D02108337E7D7');
        $this->addSql('DROP TABLE questionquiz');
    }
}
