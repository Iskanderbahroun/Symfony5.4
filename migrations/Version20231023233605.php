<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023233605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1567F5183');
        $this->addSql('DROP INDEX IDX_64C19C1567F5183 ON category');
        $this->addSql('ALTER TABLE category DROP film_id');
        $this->addSql('ALTER TABLE film ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE film ADD CONSTRAINT FK_8244BE2212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8244BE2212469DE2 ON film (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE category ADD film_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1567F5183 ON category (film_id)');
        $this->addSql('ALTER TABLE film DROP FOREIGN KEY FK_8244BE2212469DE2');
        $this->addSql('DROP INDEX IDX_8244BE2212469DE2 ON film');
        $this->addSql('ALTER TABLE film DROP category_id');
    }
}
