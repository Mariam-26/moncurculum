<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220926101630 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rqth ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rqth ADD CONSTRAINT FK_BD7BE0F4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_BD7BE0F4FB88E14F ON rqth (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rqth DROP FOREIGN KEY FK_BD7BE0F4FB88E14F');
        $this->addSql('DROP INDEX IDX_BD7BE0F4FB88E14F ON rqth');
        $this->addSql('ALTER TABLE rqth DROP utilisateur_id');
    }
}
