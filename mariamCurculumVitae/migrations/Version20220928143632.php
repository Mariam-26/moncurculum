<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928143632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mariam ADD utilisateur_id INT DEFAULT NULL, ADD email VARCHAR(255) NOT NULL, ADD mobile INT NOT NULL, ADD image LONGTEXT NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD code_postal INT NOT NULL, ADD pays VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mariam ADD CONSTRAINT FK_682F3C61FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_682F3C61FB88E14F ON mariam (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mariam DROP FOREIGN KEY FK_682F3C61FB88E14F');
        $this->addSql('DROP INDEX IDX_682F3C61FB88E14F ON mariam');
        $this->addSql('ALTER TABLE mariam DROP utilisateur_id, DROP email, DROP mobile, DROP image, DROP ville, DROP code_postal, DROP pays');
    }
}
