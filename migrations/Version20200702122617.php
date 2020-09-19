<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200702122617 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_project (student_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_C2856516CB944F1A (student_id), INDEX IDX_C2856516166D1F9C (project_id), PRIMARY KEY(student_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE student_project ADD CONSTRAINT FK_C2856516CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_project ADD CONSTRAINT FK_C2856516166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE school_year CHANGE name name VARCHAR(200) NOT NULL');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33166D1F9C');
        $this->addSql('DROP INDEX IDX_B723AF33166D1F9C ON student');
        $this->addSql('ALTER TABLE student DROP project_id, CHANGE firstname firstname VARCHAR(200) NOT NULL, CHANGE lastname lastname VARCHAR(200) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE student_project');
        $this->addSql('ALTER TABLE school_year CHANGE name name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE student ADD project_id INT DEFAULT NULL, CHANGE firstname firstname VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lastname lastname VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_B723AF33166D1F9C ON student (project_id)');
    }
}
