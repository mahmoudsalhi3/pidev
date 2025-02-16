<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250216133700 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_5ACE3AF04B89032C (post_id), INDEX IDX_5ACE3AF0BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_389B7835E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF04B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT FK_5ACE3AF0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CD4E929F4');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6D41A30BD');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6786A81FB');
        $this->addSql('ALTER TABLE inscription_webinar DROP FOREIGN KEY FK_E03369A69D86650F');
        $this->addSql('ALTER TABLE inscription_webinar DROP FOREIGN KEY FK_E03369A6EAE1CF7C');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3D41A30BD');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA786A81FB');
        $this->addSql('ALTER TABLE progression DROP FOREIGN KEY FK_D5B25073B3E3A863');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E5A38831B');
        $this->addSql('ALTER TABLE questionquiz DROP FOREIGN KEY FK_D96D02108337E7D7');
        $this->addSql('ALTER TABLE quizlesson DROP FOREIGN KEY FK_8E3FE1EFCDF80196');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D8E68610');
        $this->addSql('ALTER TABLE reponsequiz DROP FOREIGN KEY FK_81D4714C5BA17805');
        $this->addSql('ALTER TABLE reviews DROP FOREIGN KEY FK_6970EB0FD41A30BD');
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB776C1197C9');
        $this->addSql('ALTER TABLE score_projet DROP FOREIGN KEY FK_B3CFDB778F0DF8AC');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE inscription_webinar');
        $this->addSql('DROP TABLE judge');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE progression');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE questionquiz');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quizlesson');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE reponsequiz');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE score_projet');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE webinar');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE85F12B8');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE85F12B8');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_9474526ce85f12b8 ON comment');
        $this->addSql('CREATE INDEX IDX_9474526C4B89032C ON comment (post_id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE85F12B8 FOREIGN KEY (post_id) REFERENCES post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, idowner_id INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datecreation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FDCA8C9CD4E929F4 (idowner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, idcours_id INT NOT NULL, iduser_id INT NOT NULL, dateinscription DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5E90F6D6786A81FB (iduser_id), INDEX IDX_5E90F6D6D41A30BD (idcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE inscription_webinar (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, webinar_id_id INT NOT NULL, registered_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E03369A6EAE1CF7C (webinar_id_id), INDEX IDX_E03369A69D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE judge (id INT AUTO_INCREMENT NOT NULL, judge_id INT NOT NULL, judge_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, judge_email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, idcours_id INT DEFAULT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, videourl VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ordre INT NOT NULL, INDEX IDX_F87474F3D41A30BD (idcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, iduser_id INT DEFAULT NULL, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, dateenvoi DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_BF5476CA786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE progression (id INT AUTO_INCREMENT NOT NULL, idlesson_id INT NOT NULL, datefin DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D5B25073B3E3A863 (idlesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, project_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, start_date DATE NOT NULL, end_date DATE NOT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, owner_user_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, idquiz_id INT NOT NULL, textquestion LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, typequestion VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_B6F7494E5A38831B (idquiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE questionquiz (id INT AUTO_INCREMENT NOT NULL, quiz_id_id INT NOT NULL, textquestion LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nombrepoints INT NOT NULL, INDEX IDX_D96D02108337E7D7 (quiz_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE quiz (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_creation DATETIME NOT NULL, datedebut DATETIME NOT NULL, datefin DATETIME NOT NULL, statut VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE quizlesson (id INT AUTO_INCREMENT NOT NULL, lesson_id INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_8E3FE1EFCDF80196 (lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT NOT NULL, textreponse LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, is_correct TINYINT(1) NOT NULL, INDEX IDX_5FB6DEC7D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reponsequiz (id INT AUTO_INCREMENT NOT NULL, id_quiz_id INT NOT NULL, reponsequiz LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_81D4714C5BA17805 (id_quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reviews (id INT AUTO_INCREMENT NOT NULL, idcours_id INT DEFAULT NULL, rating INT NOT NULL, review VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datecreation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_6970EB0FD41A30BD (idcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE score_projet (id INT AUTO_INCREMENT NOT NULL, project_id_id INT NOT NULL, judge_id_id INT NOT NULL, score_id INT NOT NULL, score INT NOT NULL, feedback LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, score_date DATE NOT NULL, INDEX IDX_B3CFDB776C1197C9 (project_id_id), UNIQUE INDEX UNIQ_B3CFDB778F0DF8AC (judge_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_naissance DATE NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, datecreation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', role LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE webinar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, presenter VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_time DATETIME NOT NULL, duration INT NOT NULL, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tags VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, registration_required SMALLINT NOT NULL, max_attendees INT NOT NULL, platform VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, webinar_link VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, recording_available SMALLINT NOT NULL, createdat DATETIME NOT NULL, updatedat DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CD4E929F4 FOREIGN KEY (idowner_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6D41A30BD FOREIGN KEY (idcours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6786A81FB FOREIGN KEY (iduser_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription_webinar ADD CONSTRAINT FK_E03369A69D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription_webinar ADD CONSTRAINT FK_E03369A6EAE1CF7C FOREIGN KEY (webinar_id_id) REFERENCES webinar (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3D41A30BD FOREIGN KEY (idcours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA786A81FB FOREIGN KEY (iduser_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE progression ADD CONSTRAINT FK_D5B25073B3E3A863 FOREIGN KEY (idlesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E5A38831B FOREIGN KEY (idquiz_id) REFERENCES quizlesson (id)');
        $this->addSql('ALTER TABLE questionquiz ADD CONSTRAINT FK_D96D02108337E7D7 FOREIGN KEY (quiz_id_id) REFERENCES quiz (id)');
        $this->addSql('ALTER TABLE quizlesson ADD CONSTRAINT FK_8E3FE1EFCDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D8E68610 FOREIGN KEY (idquestion_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE reponsequiz ADD CONSTRAINT FK_81D4714C5BA17805 FOREIGN KEY (id_quiz_id) REFERENCES questionquiz (id)');
        $this->addSql('ALTER TABLE reviews ADD CONSTRAINT FK_6970EB0FD41A30BD FOREIGN KEY (idcours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB776C1197C9 FOREIGN KEY (project_id_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE score_projet ADD CONSTRAINT FK_B3CFDB778F0DF8AC FOREIGN KEY (judge_id_id) REFERENCES judge (id)');
        $this->addSql('ALTER TABLE post_tag DROP FOREIGN KEY FK_5ACE3AF04B89032C');
        $this->addSql('ALTER TABLE post_tag DROP FOREIGN KEY FK_5ACE3AF0BAD26311');
        $this->addSql('DROP TABLE post_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C4B89032C');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE85F12B8 FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('DROP INDEX idx_9474526c4b89032c ON comment');
        $this->addSql('CREATE INDEX IDX_9474526CE85F12B8 ON comment (post_id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
    }
}
