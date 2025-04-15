<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250415094919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE upload (id INT AUTO_INCREMENT NOT NULL, uploaded_by_id INT NOT NULL, uploaded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', url VARCHAR(255) NOT NULL, INDEX IDX_17BDE61FA2B28FE8 (uploaded_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FA2B28FE8 FOREIGN KEY (uploaded_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media CHANGE discr mediaType VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD profile_picture VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE upload DROP FOREIGN KEY FK_17BDE61FA2B28FE8');
        $this->addSql('DROP TABLE upload');
        $this->addSql('ALTER TABLE `user` DROP profile_picture');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE media CHANGE mediaType discr VARCHAR(255) NOT NULL');
    }
}
