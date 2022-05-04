<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220429050334 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, path VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, height INT NOT NULL, width INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, cert VARCHAR(255) DEFAULT NULL, class VARCHAR(255) DEFAULT NULL, duration INT NOT NULL, headline VARCHAR(255) NOT NULL, identifier VARCHAR(255) DEFAULT NULL, synopsis LONGTEXT DEFAULT NULL, year VARCHAR(255) NOT NULL, rating INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_cast (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_E1DE98FB8F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_genre (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, movie_id INT NOT NULL, INDEX IDX_FD1229644296D31F (genre_id), INDEX IDX_FD1229648F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie_image (id INT AUTO_INCREMENT NOT NULL, image_id INT NOT NULL, movie_id INT NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_BB7F1EC33DA5256D (image_id), INDEX IDX_BB7F1EC38F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, movie_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, url VARCHAR(1024) NOT NULL, INDEX IDX_7CC7DA2C8F93B6FC (movie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_alternatives (id INT AUTO_INCREMENT NOT NULL, video_id INT NOT NULL, label VARCHAR(255) NOT NULL, url VARCHAR(1024) NOT NULL, INDEX IDX_E79B3A9B29C1004E (video_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_cast ADD CONSTRAINT FK_E1DE98FB8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229644296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie_genre ADD CONSTRAINT FK_FD1229648F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE movie_image ADD CONSTRAINT FK_BB7F1EC33DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE movie_image ADD CONSTRAINT FK_BB7F1EC38F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE video_alternatives ADD CONSTRAINT FK_E79B3A9B29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229644296D31F');
        $this->addSql('ALTER TABLE movie_image DROP FOREIGN KEY FK_BB7F1EC33DA5256D');
        $this->addSql('ALTER TABLE movie_cast DROP FOREIGN KEY FK_E1DE98FB8F93B6FC');
        $this->addSql('ALTER TABLE movie_genre DROP FOREIGN KEY FK_FD1229648F93B6FC');
        $this->addSql('ALTER TABLE movie_image DROP FOREIGN KEY FK_BB7F1EC38F93B6FC');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C8F93B6FC');
        $this->addSql('ALTER TABLE video_alternatives DROP FOREIGN KEY FK_E79B3A9B29C1004E');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE movie_cast');
        $this->addSql('DROP TABLE movie_genre');
        $this->addSql('DROP TABLE movie_image');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE video_alternatives');
    }

    public function isTransactional(): bool
    {
        return false;
    }
}
