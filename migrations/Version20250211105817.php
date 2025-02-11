<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250211105817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE score_projet (id INT AUTO_INCREMENT NOT NULL, project_id_id INT NOT NULL, judge_id_id INT NOT NULL, score_id INT NOT NULL, score INT NOT NULL, feedback LONGTEXT NOT NULL, score_date DATE NOT NULL, INDEX IDX_B3CFDB776C1197C9 (project_id_id), UNIQUE INDEX UNIQ_B3CFDB778F0DF8AC (judge_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB776C1197C9 FOREIGN KEY (project_id_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB778F0DF8AC FOREIGN KEY (judge_id_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB776C1197C9');
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB778F0DF8AC');
        $this->addSql('DROP TABLE score_projet');
    }
}
