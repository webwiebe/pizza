<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181015201240 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pizza_order ADD update_preference_id VARCHAR(255) DEFAULT NULL, ADD business_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pizza_order ADD CONSTRAINT FK_358914057662D58 FOREIGN KEY (update_preference_id) REFERENCES update_preference (id)');
        $this->addSql('ALTER TABLE pizza_order ADD CONSTRAINT FK_3589140A89DB457 FOREIGN KEY (business_id) REFERENCES business (id)');
        $this->addSql('CREATE INDEX IDX_358914057662D58 ON pizza_order (update_preference_id)');
        $this->addSql('CREATE INDEX IDX_3589140A89DB457 ON pizza_order (business_id)');
        $this->addSql('ALTER TABLE business ADD pizza_order_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE business ADD CONSTRAINT FK_8D36E381B312A6E FOREIGN KEY (pizza_order_id) REFERENCES pizza_order (id)');
        $this->addSql('CREATE INDEX IDX_8D36E381B312A6E ON business (pizza_order_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE business DROP FOREIGN KEY FK_8D36E381B312A6E');
        $this->addSql('DROP INDEX IDX_8D36E381B312A6E ON business');
        $this->addSql('ALTER TABLE business DROP pizza_order_id');
        $this->addSql('ALTER TABLE pizza_order DROP FOREIGN KEY FK_358914057662D58');
        $this->addSql('ALTER TABLE pizza_order DROP FOREIGN KEY FK_3589140A89DB457');
        $this->addSql('DROP INDEX IDX_358914057662D58 ON pizza_order');
        $this->addSql('DROP INDEX IDX_3589140A89DB457 ON pizza_order');
        $this->addSql('ALTER TABLE pizza_order DROP update_preference_id, DROP business_id');
    }
}
