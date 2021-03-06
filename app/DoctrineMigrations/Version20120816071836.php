<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120816071836 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE transfers (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, value NUMERIC(10, 0) NOT NULL, data DATETIME NOT NULL, fromAccount_id INT DEFAULT NULL, toAccount_id INT DEFAULT NULL, INDEX IDX_802A3918893668CD (fromAccount_id), INDEX IDX_802A3918A8092A06 (toAccount_id), INDEX IDX_802A3918A76ED395 (user_id), PRIMARY KEY(id)) ENGINE = InnoDB");
        $this->addSql("ALTER TABLE transfers ADD CONSTRAINT FK_802A3918893668CD FOREIGN KEY (fromAccount_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE transfers ADD CONSTRAINT FK_802A3918A8092A06 FOREIGN KEY (toAccount_id) REFERENCES accounts (id)");
        $this->addSql("ALTER TABLE transfers ADD CONSTRAINT FK_802A3918A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)");
        $this->addSql("ALTER TABLE accounts ADD balance NUMERIC(10, 0) DEFAULT NULL");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE transfers");
        $this->addSql("ALTER TABLE accounts DROP balance");
    }
}
