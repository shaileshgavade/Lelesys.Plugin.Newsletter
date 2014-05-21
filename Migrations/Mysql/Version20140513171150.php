<?php
namespace TYPO3\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140513171150 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE lelesys_plugin_newsletter_domai_70879_newslettercategories_join (newsletter_recipient_person VARCHAR(40) NOT NULL, newsletter_category VARCHAR(40) NOT NULL, INDEX IDX_A01D74A2BA709A88 (newsletter_recipient_person), INDEX IDX_A01D74A2DB4EDFAB (newsletter_category), PRIMARY KEY(newsletter_recipient_person, newsletter_category)) ENGINE = InnoDB");
		$this->addSql("ALTER TABLE lelesys_plugin_newsletter_domai_70879_newslettercategories_join ADD CONSTRAINT FK_A01D74A2BA709A88 FOREIGN KEY (newsletter_recipient_person) REFERENCES lelesys_plugin_newsletter_domain_model_recipient_person (persistence_object_identifier)");
		$this->addSql("ALTER TABLE lelesys_plugin_newsletter_domai_70879_newslettercategories_join ADD CONSTRAINT FK_A01D74A2DB4EDFAB FOREIGN KEY (newsletter_category) REFERENCES lelesys_plugin_newsletter_domain_model_category (persistence_object_identifier)");
		$this->addSql("DROP TABLE lelesys_plugin_newsletter_domain_model_re_70879_categories_join");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("CREATE TABLE lelesys_plugin_newsletter_domain_model_re_70879_categories_join (newsletter_recipient_person VARCHAR(40) NOT NULL, newsletter_category VARCHAR(40) NOT NULL, INDEX IDX_CBAFBB99BA709A88 (newsletter_recipient_person), INDEX IDX_CBAFBB99DB4EDFAB (newsletter_category), PRIMARY KEY(newsletter_recipient_person, newsletter_category)) DEFAULT CHARACTER SET utf8 COLLATE ENGINE = InnoDB");
		$this->addSql("ALTER TABLE lelesys_plugin_newsletter_domain_model_re_70879_categories_join ADD CONSTRAINT FK_CBAFBB99BA709A88 FOREIGN KEY (newsletter_recipient_person) REFERENCES lelesys_plugin_newsletter_domain_model_recipient_person (persistence_object_identifier)");
		$this->addSql("ALTER TABLE lelesys_plugin_newsletter_domain_model_re_70879_categories_join ADD CONSTRAINT FK_CBAFBB99DB4EDFAB FOREIGN KEY (newsletter_category) REFERENCES lelesys_plugin_newsletter_domain_model_category (persistence_object_identifier)");
		$this->addSql("DROP TABLE lelesys_plugin_newsletter_domai_70879_newslettercategories_join");
	}
}