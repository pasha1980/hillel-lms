<?php

declare(strict_types=1);

namespace App\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200517074014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE courses (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, lessonsCount INT NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lessons (id INT AUTO_INCREMENT NOT NULL, groups_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_3F4218D9F373DCF (groups_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE done_homeworks (id INT AUTO_INCREMENT NOT NULL, homework_id INT DEFAULT NULL, student_id INT DEFAULT NULL, text VARCHAR(255) NOT NULL, reply VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_A959F90EB203DDE5 (homework_id), INDEX IDX_A959F90ECB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE homeworks (id INT AUTO_INCREMENT NOT NULL, lessons_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, text VARCHAR(255) NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_8AE6C397FED07355 (lessons_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, birthday DATE NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups (id INT AUTO_INCREMENT NOT NULL, courses_id INT DEFAULT NULL, startDate DATETIME NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_F06D3970F9295384 (courses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_groups (group_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_4AB11C12FE54D947 (group_id), INDEX IDX_4AB11C12CB944F1A (student_id), PRIMARY KEY(group_id, student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9F373DCF FOREIGN KEY (groups_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE done_homeworks ADD CONSTRAINT FK_A959F90EB203DDE5 FOREIGN KEY (homework_id) REFERENCES homeworks (id)');
        $this->addSql('ALTER TABLE done_homeworks ADD CONSTRAINT FK_A959F90ECB944F1A FOREIGN KEY (student_id) REFERENCES students (id)');
        $this->addSql('ALTER TABLE homeworks ADD CONSTRAINT FK_8AE6C397FED07355 FOREIGN KEY (lessons_id) REFERENCES lessons (id)');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D3970F9295384 FOREIGN KEY (courses_id) REFERENCES courses (id)');
        $this->addSql('ALTER TABLE students_groups ADD CONSTRAINT FK_4AB11C12FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE students_groups ADD CONSTRAINT FK_4AB11C12CB944F1A FOREIGN KEY (student_id) REFERENCES students (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE groups DROP FOREIGN KEY FK_F06D3970F9295384');
        $this->addSql('ALTER TABLE homeworks DROP FOREIGN KEY FK_8AE6C397FED07355');
        $this->addSql('ALTER TABLE done_homeworks DROP FOREIGN KEY FK_A959F90EB203DDE5');
        $this->addSql('ALTER TABLE done_homeworks DROP FOREIGN KEY FK_A959F90ECB944F1A');
        $this->addSql('ALTER TABLE students_groups DROP FOREIGN KEY FK_4AB11C12CB944F1A');
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9F373DCF');
        $this->addSql('ALTER TABLE students_groups DROP FOREIGN KEY FK_4AB11C12FE54D947');
        $this->addSql('DROP TABLE courses');
        $this->addSql('DROP TABLE lessons');
        $this->addSql('DROP TABLE done_homeworks');
        $this->addSql('DROP TABLE homeworks');
        $this->addSql('DROP TABLE students');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE students_groups');
    }
}
