<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406095641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (idProduit INT UNSIGNED AUTO_INCREMENT NOT NULL, nomP VARCHAR(20) NOT NULL, idFamille INT UNSIGNED DEFAULT NULL, INDEX fk_produit_famille (idFamille), PRIMARY KEY(idProduit)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2734CA99E1 FOREIGN KEY (idFamille) REFERENCES famille (idFamille)');
        $this->addSql('ALTER TABLE client CHANGE nomCl nomCl VARCHAR(20) NOT NULL, CHANGE RcsCl RcsCl VARCHAR(50) DEFAULT \'NULL\', CHANGE EmailCl EmailCl VARCHAR(60) DEFAULT \'NULL\', CHANGE client_sup client_sup TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE depot CHANGE Dep_Sup Dep_sup TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE famille CHANGE famille_sup famille_sup TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE frs CHANGE nomf nomF VARCHAR(20) NOT NULL, CHANGE RcsF RcsF VARCHAR(20) DEFAULT \'NULL\', CHANGE frs_sup frs_sup TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE modep CHANGE ModeP_sup ModeP_sup TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE idType idType INT UNSIGNED DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('ALTER TABLE client CHANGE nomCl nomCl VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE RcsCl RcsCl VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE EmailCl EmailCl VARCHAR(80) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_general_ci`, CHANGE client_sup client_sup TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE depot CHANGE Dep_sup Dep_Sup TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE famille CHANGE famille_sup famille_sup TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE frs CHANGE nomF nomf VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE RcsF RcsF VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, CHANGE frs_sup frs_sup TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE modep CHANGE ModeP_sup ModeP_sup TINYINT(1) DEFAULT \'0\'');
        $this->addSql('ALTER TABLE user CHANGE idType idType INT UNSIGNED DEFAULT NULL');
    }
}
