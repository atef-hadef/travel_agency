<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250425202923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, package_id INT DEFAULT NULL, flight_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, booking_date DATETIME NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, status VARCHAR(50) NOT NULL, number_of_people INT NOT NULL, special_requests LONGTEXT DEFAULT NULL, booking_reference VARCHAR(255) NOT NULL, number_of_passengers INT DEFAULT NULL, check_in_date DATE DEFAULT NULL, check_out_date DATE DEFAULT NULL, number_of_guests INT DEFAULT NULL, INDEX IDX_E00CEDDEA76ED395 (user_id), INDEX IDX_E00CEDDEF44CABFF (package_id), INDEX IDX_E00CEDDE91F478C5 (flight_id), INDEX IDX_E00CEDDE3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, package_id INT DEFAULT NULL, flight_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, booking_date DATETIME NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, total_price DOUBLE PRECISION NOT NULL, status VARCHAR(50) NOT NULL, number_of_people INT NOT NULL, special_requests LONGTEXT DEFAULT NULL, booking_reference VARCHAR(255) NOT NULL, number_of_passengers INT DEFAULT NULL, check_in_date DATE DEFAULT NULL, check_out_date DATE DEFAULT NULL, number_of_guests INT DEFAULT NULL, INDEX IDX_3EC63EAAA76ED395 (user_id), INDEX IDX_3EC63EAAF44CABFF (package_id), INDEX IDX_3EC63EAA91F478C5 (flight_id), INDEX IDX_3EC63EAA3243BB18 (hotel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, flight_number VARCHAR(255) NOT NULL, origin VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, departure_time DATETIME NOT NULL, arrival_time DATETIME NOT NULL, price DOUBLE PRECISION NOT NULL, available_seats INT NOT NULL, airline VARCHAR(255) NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, rating VARCHAR(20) NOT NULL, price_per_night DOUBLE PRECISION NOT NULL, available_rooms INT NOT NULL, amenities JSON NOT NULL, website VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(50) NOT NULL, max_guests INT DEFAULT 4 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE package (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, duration INT NOT NULL, destination VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, max_participants INT NOT NULL, available_spots INT NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, included_services JSON NOT NULL, highlights JSON NOT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, date_of_birth DATE DEFAULT NULL, nationality VARCHAR(50) DEFAULT NULL, passport_number VARCHAR(50) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEF44CABFF FOREIGN KEY (package_id) REFERENCES package (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE91F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAAF44CABFF FOREIGN KEY (package_id) REFERENCES package (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA91F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEA76ED395');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEF44CABFF');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE91F478C5');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE3243BB18');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAA76ED395');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAAF44CABFF');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA91F478C5');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA3243BB18');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE package');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
