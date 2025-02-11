<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250211110723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB778F0DF8AC');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB778F0DF8AC FOREIGN KEY (judge_id_id) REFERENCES judge (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB778F0DF8AC');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB778F0DF8AC FOREIGN KEY (judge_id_id) REFERENCES utilisateur (id)');
    }
}
