<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200516102659 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE homeworks (id INT AUTO_INCREMENT NOT NULL, lessons_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_8AE6C397FED07355 (lessons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doneHomeworks (id INT AUTO_INCREMENT NOT NULL, homeworks_id INT DEFAULT NULL, student_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, reply VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_408A22A337A3A80F (homeworks_id), INDEX IDX_408A22A3CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_groups (group_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_4AB11C12FE54D947 (group_id), INDEX IDX_4AB11C12CB944F1A (student_id), PRIMARY KEY(group_id, student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE homeworks ADD CONSTRAINT FK_8AE6C397FED07355 FOREIGN KEY (lessons_id) REFERENCES lessons (id)');
        $this->addSql('ALTER TABLE doneHomeworks ADD CONSTRAINT FK_408A22A337A3A80F FOREIGN KEY (homeworks_id) REFERENCES homeworks (id)');
        $this->addSql('ALTER TABLE doneHomeworks ADD CONSTRAINT FK_408A22A3CB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE students_groups ADD CONSTRAINT FK_4AB11C12FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE students_groups ADD CONSTRAINT FK_4AB11C12CB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lessons ADD groups_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9F373DCF FOREIGN KEY (groups_id) REFERENCES groups (id)');
        $this->addSql('CREATE INDEX IDX_3F4218D9F373DCF ON lessons (groups_id)');
        $this->addSql('ALTER TABLE groups ADD courses_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('CREATE INDEX IDX_F06D3970F9295384 ON groups (courses_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE doneHomeworks DROP FOREIGN KEY FK_408A22A337A3A80F');
        $this->addSql('DROP TABLE homeworks');
        $this->addSql('DROP TABLE doneHomeworks');
        $this->addSql('DROP TABLE students_groups');
        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970F9295384');
        $this->addSql('DROP INDEX IDX_F06D3970F9295384 ON groups');
        $this->addSql('ALTER TABLE groups DROP courses_id');
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9F373DCF');
        $this->addSql('DROP INDEX IDX_3F4218D9F373DCF ON lessons');
        $this->addSql('ALTER TABLE lessons DROP groups_id');
    }
}
