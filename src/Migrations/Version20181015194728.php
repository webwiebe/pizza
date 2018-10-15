<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181015194728 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE update_preference (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_bottom (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_order (id VARCHAR(255) NOT NULL, pizza_id VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3589140D41D1D42 (pizza_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_topping (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, cost INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE business (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, take_out TINYINT(1) NOT NULL, delivery TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza (id VARCHAR(255) NOT NULL, bottom_id VARCHAR(255) NOT NULL, topping_id VARCHAR(255) NOT NULL, INDEX IDX_CFDD826F5EED6714 (bottom_id), INDEX IDX_CFDD826FE9C2067C (topping_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizza_order ADD CONSTRAINT FK_3589140D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826F5EED6714 FOREIGN KEY (bottom_id) REFERENCES pizza_bottom (id)');
        $this->addSql('ALTER TABLE pizza ADD CONSTRAINT FK_CFDD826FE9C2067C FOREIGN KEY (topping_id) REFERENCES pizza_topping (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826F5EED6714');
        $this->addSql('ALTER TABLE pizza DROP FOREIGN KEY FK_CFDD826FE9C2067C');
        $this->addSql('ALTER TABLE pizza_order DROP FOREIGN KEY FK_3589140D41D1D42');
        $this->addSql('DROP TABLE update_preference');
        $this->addSql('DROP TABLE pizza_bottom');
        $this->addSql('DROP TABLE pizza_order');
        $this->addSql('DROP TABLE pizza_topping');
        $this->addSql('DROP TABLE business');
        $this->addSql('DROP TABLE pizza');
    }
}
