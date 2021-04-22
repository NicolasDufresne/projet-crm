<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210422133113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appointment (id INT AUTO_INCREMENT NOT NULL, ticket_id_id INT DEFAULT NULL, compagny_id_id INT DEFAULT NULL, client_id_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, object VARCHAR(128) NOT NULL, date_time DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_FE38F8445774FDDC (ticket_id_id), INDEX IDX_FE38F844BE539471 (compagny_id_id), INDEX IDX_FE38F844DC2902E0 (client_id_id), INDEX IDX_FE38F8449D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, compagny_id INT NOT NULL, email VARCHAR(128) NOT NULL, name VARCHAR(128) NOT NULL, first_name VARCHAR(128) NOT NULL, phonenumber VARCHAR(128) DEFAULT NULL, adress VARCHAR(128) NOT NULL, cp VARCHAR(128) NOT NULL, city VARCHAR(128) NOT NULL, status VARCHAR(128) NOT NULL, commitment VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_C74404551224ABE0 (compagny_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagny (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(128) NOT NULL, adress VARCHAR(128) NOT NULL, send_adress VARCHAR(128) NOT NULL, tva DOUBLE PRECISION NOT NULL, naf DOUBLE PRECISION NOT NULL, siret DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exchange (id INT AUTO_INCREMENT NOT NULL, client_id_id INT NOT NULL, user_id INT NOT NULL, type VARCHAR(128) NOT NULL, detail VARCHAR(128) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D33BB079DC2902E0 (client_id_id), INDEX IDX_D33BB079A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exchange_user (exchange_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_BB2DF6DB68AFD1A0 (exchange_id), INDEX IDX_BB2DF6DBA76ED395 (user_id), PRIMARY KEY(exchange_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historic (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historic_ticket (historic_id INT NOT NULL, ticket_id INT NOT NULL, INDEX IDX_3456628952F34864 (historic_id), INDEX IDX_34566289700047D2 (ticket_id), PRIMARY KEY(historic_id, ticket_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, ticket_id_id INT NOT NULL, client_id_id INT DEFAULT NULL, user_id_id INT NOT NULL, ref VARCHAR(128) NOT NULL, status VARCHAR(128) NOT NULL, tva DOUBLE PRECISION NOT NULL, ttc DOUBLE PRECISION NOT NULL, ht DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_906517445774FDDC (ticket_id_id), INDEX IDX_90651744DC2902E0 (client_id_id), INDEX IDX_906517449D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation (id INT AUTO_INCREMENT NOT NULL, client_id_id INT DEFAULT NULL, compagny_id_id INT DEFAULT NULL, ref VARCHAR(128) NOT NULL, status VARCHAR(128) NOT NULL, tva DOUBLE PRECISION NOT NULL, ttc DOUBLE PRECISION NOT NULL, ht DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_474A8DB9DC2902E0 (client_id_id), INDEX IDX_474A8DB9BE539471 (compagny_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation_ticket (quotation_id INT NOT NULL, ticket_id INT NOT NULL, INDEX IDX_6DD06739B4EA4E60 (quotation_id), INDEX IDX_6DD06739700047D2 (ticket_id), PRIMARY KEY(quotation_id, ticket_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation_user (quotation_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_10677305B4EA4E60 (quotation_id), INDEX IDX_10677305A76ED395 (user_id), PRIMARY KEY(quotation_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, exchange_id_id INT DEFAULT NULL, category_id_id INT DEFAULT NULL, client_id INT NOT NULL, user_id INT NOT NULL, object VARCHAR(128) NOT NULL, details VARCHAR(128) DEFAULT NULL, status VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_97A0ADA36173D21F (exchange_id_id), INDEX IDX_97A0ADA39777D11E (category_id_id), INDEX IDX_97A0ADA319EB6921 (client_id), INDEX IDX_97A0ADA3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(128) NOT NULL, first_name VARCHAR(128) NOT NULL, phonenumber VARCHAR(128) DEFAULT NULL, adress VARCHAR(128) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8445774FDDC FOREIGN KEY (ticket_id_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404551224ABE0 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE exchange_user ADD CONSTRAINT FK_BB2DF6DB68AFD1A0 FOREIGN KEY (exchange_id) REFERENCES exchange (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exchange_user ADD CONSTRAINT FK_BB2DF6DBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historic_ticket ADD CONSTRAINT FK_3456628952F34864 FOREIGN KEY (historic_id) REFERENCES historic (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historic_ticket ADD CONSTRAINT FK_34566289700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517445774FDDC FOREIGN KEY (ticket_id_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE quotation_ticket ADD CONSTRAINT FK_6DD06739B4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quotation_ticket ADD CONSTRAINT FK_6DD06739700047D2 FOREIGN KEY (ticket_id) REFERENCES ticket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quotation_user ADD CONSTRAINT FK_10677305B4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE quotation_user ADD CONSTRAINT FK_10677305A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36173D21F FOREIGN KEY (exchange_id_id) REFERENCES exchange (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA39777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA319EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA39777D11E');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844DC2902E0');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079DC2902E0');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744DC2902E0');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9DC2902E0');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA319EB6921');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844BE539471');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404551224ABE0');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9BE539471');
        $this->addSql('ALTER TABLE exchange_user DROP FOREIGN KEY FK_BB2DF6DB68AFD1A0');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36173D21F');
        $this->addSql('ALTER TABLE historic_ticket DROP FOREIGN KEY FK_3456628952F34864');
        $this->addSql('ALTER TABLE quotation_ticket DROP FOREIGN KEY FK_6DD06739B4EA4E60');
        $this->addSql('ALTER TABLE quotation_user DROP FOREIGN KEY FK_10677305B4EA4E60');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8445774FDDC');
        $this->addSql('ALTER TABLE historic_ticket DROP FOREIGN KEY FK_34566289700047D2');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517445774FDDC');
        $this->addSql('ALTER TABLE quotation_ticket DROP FOREIGN KEY FK_6DD06739700047D2');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8449D86650F');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079A76ED395');
        $this->addSql('ALTER TABLE exchange_user DROP FOREIGN KEY FK_BB2DF6DBA76ED395');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449D86650F');
        $this->addSql('ALTER TABLE quotation_user DROP FOREIGN KEY FK_10677305A76ED395');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3A76ED395');
        $this->addSql('DROP TABLE appointment');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE compagny');
        $this->addSql('DROP TABLE exchange');
        $this->addSql('DROP TABLE exchange_user');
        $this->addSql('DROP TABLE historic');
        $this->addSql('DROP TABLE historic_ticket');
        $this->addSql('DROP TABLE invoice');
        $this->addSql('DROP TABLE quotation');
        $this->addSql('DROP TABLE quotation_ticket');
        $this->addSql('DROP TABLE quotation_user');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE user');
    }
}
