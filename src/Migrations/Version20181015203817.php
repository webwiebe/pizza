<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181015203817 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E381B312A6E');
        $this->addSql('DROP INDEX IDX_8D36E381B312A6E ON business');
        $this->addSql('ALTER TABLE business DROP pizza_order_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE business ADD pizza_order_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E381B312A6E FOREIGN KEY (pizza_order_id) REFERENCES pizza_order (id)');
        $this->addSql('CREATE INDEX IDX_8D36E381B312A6E ON business (pizza_order_id)');
    }
}
