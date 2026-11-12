<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261105175137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD slug VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE products ADD category VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE products ADD nutrition JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD customizable JSON DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3BA5A5A989D9B62 ON products (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_B3BA5A5A989D9B62');
        $this->addSql('ALTER TABLE products DROP slug');
        $this->addSql('ALTER TABLE products DROP category');
        $this->addSql('ALTER TABLE products DROP nutrition');
        $this->addSql('ALTER TABLE products DROP customizable');
    }
}
