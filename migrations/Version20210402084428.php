<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402084428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8445774FDDC');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8449D86650F');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844BE539471');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844DC2902E0');
        $this->addSql('DROP INDEX IDX_FE38F844BE539471 ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F8449D86650F ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F8445774FDDC ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F844DC2902E0 ON appointment');
        $this->addSql('ALTER TABLE appointment ADD ticket_id_id INT DEFAULT NULL, ADD compagny_id_id INT DEFAULT NULL, ADD client_id_id INT DEFAULT NULL, ADD user_id_id INT DEFAULT NULL, DROP ticket_id, DROP compagny_id, DROP client_id, DROP user_id');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8445774FDDC FOREIGN KEY (ticket_id_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_FE38F844BE539471 ON appointment (compagny_id_id)');
        $this->addSql('CREATE INDEX IDX_FE38F8449D86650F ON appointment (user_id_id)');
        $this->addSql('CREATE INDEX IDX_FE38F8445774FDDC ON appointment (ticket_id_id)');
        $this->addSql('CREATE INDEX IDX_FE38F844DC2902E0 ON appointment (client_id_id)');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079BE539471');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079DC2902E0');
        $this->addSql('DROP INDEX IDX_D33BB079BE539471 ON exchange');
        $this->addSql('DROP INDEX IDX_D33BB079DC2902E0 ON exchange');
        $this->addSql('ALTER TABLE exchange ADD client_id_id INT NOT NULL, ADD compagny_id_id INT NOT NULL, DROP client_id, DROP compagny_id');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_D33BB079BE539471 ON exchange (compagny_id_id)');
        $this->addSql('CREATE INDEX IDX_D33BB079DC2902E0 ON exchange (client_id_id)');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517445774FDDC');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449D86650F');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744BE539471');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744DC2902E0');
        $this->addSql('DROP INDEX IDX_90651744DC2902E0 ON invoice');
        $this->addSql('DROP INDEX IDX_906517449D86650F ON invoice');
        $this->addSql('DROP INDEX IDX_906517445774FDDC ON invoice');
        $this->addSql('DROP INDEX IDX_90651744BE539471 ON invoice');
        $this->addSql('ALTER TABLE invoice ADD ticket_id_id INT NOT NULL, ADD compagny_id_id INT NOT NULL, ADD user_id_id INT NOT NULL, DROP ticket_id, DROP compagny_id, DROP user_id, CHANGE client_id client_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517445774FDDC FOREIGN KEY (ticket_id_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_90651744DC2902E0 ON invoice (client_id_id)');
        $this->addSql('CREATE INDEX IDX_906517449D86650F ON invoice (user_id_id)');
        $this->addSql('CREATE INDEX IDX_906517445774FDDC ON invoice (ticket_id_id)');
        $this->addSql('CREATE INDEX IDX_90651744BE539471 ON invoice (compagny_id_id)');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9BE539471');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9DC2902E0');
        $this->addSql('DROP INDEX IDX_474A8DB9BE539471 ON quotation');
        $this->addSql('DROP INDEX IDX_474A8DB9DC2902E0 ON quotation');
        $this->addSql('ALTER TABLE quotation ADD client_id_id INT DEFAULT NULL, ADD compagny_id_id INT DEFAULT NULL, DROP client_id, DROP compagny_id');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9BE539471 FOREIGN KEY (compagny_id_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9DC2902E0 FOREIGN KEY (client_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_474A8DB9BE539471 ON quotation (compagny_id_id)');
        $this->addSql('CREATE INDEX IDX_474A8DB9DC2902E0 ON quotation (client_id_id)');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36173D21F');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA39777D11E');
        $this->addSql('DROP INDEX IDX_97A0ADA39777D11E ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA36173D21F ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE exchange_id exchange_id_id INT NOT NULL, CHANGE category_id category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36173D21F FOREIGN KEY (exchange_id_id) REFERENCES exchange (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA39777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA39777D11E ON ticket (category_id_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA36173D21F ON ticket (exchange_id_id)');
        $this->addSql('ALTER TABLE user CHANGE phonenumber phonenumber VARCHAR(128) DEFAULT NULL, CHANGE adress adress VARCHAR(128) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8445774FDDC');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844BE539471');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F844DC2902E0');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F8449D86650F');
        $this->addSql('DROP INDEX IDX_FE38F8445774FDDC ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F844BE539471 ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F844DC2902E0 ON appointment');
        $this->addSql('DROP INDEX IDX_FE38F8449D86650F ON appointment');
        $this->addSql('ALTER TABLE appointment ADD ticket_id INT DEFAULT NULL, ADD compagny_id INT DEFAULT NULL, ADD client_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP ticket_id_id, DROP compagny_id_id, DROP client_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8445774FDDC FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844BE539471 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F844DC2902E0 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F8449D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_FE38F8445774FDDC ON appointment (ticket_id)');
        $this->addSql('CREATE INDEX IDX_FE38F844BE539471 ON appointment (compagny_id)');
        $this->addSql('CREATE INDEX IDX_FE38F844DC2902E0 ON appointment (client_id)');
        $this->addSql('CREATE INDEX IDX_FE38F8449D86650F ON appointment (user_id)');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079DC2902E0');
        $this->addSql('ALTER TABLE exchange DROP FOREIGN KEY FK_D33BB079BE539471');
        $this->addSql('DROP INDEX IDX_D33BB079DC2902E0 ON exchange');
        $this->addSql('DROP INDEX IDX_D33BB079BE539471 ON exchange');
        $this->addSql('ALTER TABLE exchange ADD client_id INT NOT NULL, ADD compagny_id INT NOT NULL, DROP client_id_id, DROP compagny_id_id');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079DC2902E0 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE exchange ADD CONSTRAINT FK_D33BB079BE539471 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('CREATE INDEX IDX_D33BB079DC2902E0 ON exchange (client_id)');
        $this->addSql('CREATE INDEX IDX_D33BB079BE539471 ON exchange (compagny_id)');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517445774FDDC');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744DC2902E0');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_90651744BE539471');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517449D86650F');
        $this->addSql('DROP INDEX IDX_906517445774FDDC ON invoice');
        $this->addSql('DROP INDEX IDX_90651744DC2902E0 ON invoice');
        $this->addSql('DROP INDEX IDX_90651744BE539471 ON invoice');
        $this->addSql('DROP INDEX IDX_906517449D86650F ON invoice');
        $this->addSql('ALTER TABLE invoice ADD ticket_id INT NOT NULL, ADD compagny_id INT NOT NULL, ADD user_id INT NOT NULL, DROP ticket_id_id, DROP compagny_id_id, DROP user_id_id, CHANGE client_id_id client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517445774FDDC FOREIGN KEY (ticket_id) REFERENCES ticket (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744DC2902E0 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744BE539471 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517449D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_906517445774FDDC ON invoice (ticket_id)');
        $this->addSql('CREATE INDEX IDX_90651744DC2902E0 ON invoice (client_id)');
        $this->addSql('CREATE INDEX IDX_90651744BE539471 ON invoice (compagny_id)');
        $this->addSql('CREATE INDEX IDX_906517449D86650F ON invoice (user_id)');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9DC2902E0');
        $this->addSql('ALTER TABLE quotation DROP FOREIGN KEY FK_474A8DB9BE539471');
        $this->addSql('DROP INDEX IDX_474A8DB9DC2902E0 ON quotation');
        $this->addSql('DROP INDEX IDX_474A8DB9BE539471 ON quotation');
        $this->addSql('ALTER TABLE quotation ADD client_id INT DEFAULT NULL, ADD compagny_id INT DEFAULT NULL, DROP client_id_id, DROP compagny_id_id');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9DC2902E0 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE quotation ADD CONSTRAINT FK_474A8DB9BE539471 FOREIGN KEY (compagny_id) REFERENCES compagny (id)');
        $this->addSql('CREATE INDEX IDX_474A8DB9DC2902E0 ON quotation (client_id)');
        $this->addSql('CREATE INDEX IDX_474A8DB9BE539471 ON quotation (compagny_id)');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA36173D21F');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA39777D11E');
        $this->addSql('DROP INDEX IDX_97A0ADA36173D21F ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA39777D11E ON ticket');
        $this->addSql('ALTER TABLE ticket CHANGE exchange_id_id exchange_id INT NOT NULL, CHANGE category_id_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA36173D21F FOREIGN KEY (exchange_id) REFERENCES exchange (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA39777D11E FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA36173D21F ON ticket (exchange_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA39777D11E ON ticket (category_id)');
        $this->addSql('ALTER TABLE user CHANGE phonenumber phonenumber VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adress adress VARCHAR(128) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
