<?php

namespace App\DataFixtures;

use App\Entity\Appointment;
use App\Entity\Category;
use App\Entity\Client;
use App\Entity\Compagny;
use App\Entity\Exchange;
use App\Entity\Invoice;
use App\Entity\Quotation;
use App\Entity\Ticket;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    private $categories;

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $categoryList = ["AGRICULTURE - BOIS", "ARCHITECTURE - PAYSAGE - URBANISME", "ARMÉE - SÉCURITÉ", "ARTS - ARTISANAT - CULTURE", "ASSURANCE - BANQUE", "AUDIOVISUEL - INFORMATION - COMMUNICATION", "CONSTRUCTION DURABLE - BÂTIMENT ET TRAVAUX PUBLICS", "DROIT - ÉCONOMIE - GESTION", "ENSEIGNEMENT - RECHERCHE", "ÉNERGIES - ENVIRONNEMENT", "GESTION ADMINISTRATIVE - TRANSPORT - LOGISTIQUE", "HÔTELLERIE - RESTAURATION - TOURISME", "INDUSTRIES", "INFORMATIQUE - INTERNET", "RELATION CLIENT (ACCUEIL - RELATION CLIENT, COMMERCE, VENTE)", "SANTÉ - SOCIAL - SPORT"];

        for ($i = 0; $i < sizeof($categoryList); $i++) {
            //category
            $category = new Category();
            $category->setType($categoryList[$i]);
            $this->categories[] = $category;
            $manager->persist($category);
        }

        for ($i = 0; $i < 10; $i++) {

            //user
            $user = new User();
            $user->setEmail($faker->email);
            $user->setAdress($faker->address);
            $user->setFirstName($faker->firstName);
            $user->setName($faker->lastName);
            $user->setPassword($faker->password);
            $user->setPhonenumber($faker->phoneNumber);
            $user->setRoles((array)'ROLE_USER');
            $manager->persist($user);

            //company
            $company = new Compagny();
            $company->setName($faker->company);
            $company->setAdress($faker->address);
            $company->setSendAdress($faker->address);
            $company->setTVA($faker->randomDigit);
            $company->setNAF($faker->randomDigit);
            $company->setSIRET($faker->randomDigit);
            $manager->persist($company);

            //client
            $client = new Client();
            $client->setCompagny($company);
            $client->setEmail($faker->email);
            $client->setAdress($faker->address);
            $client->setCP($faker->countryCode);
            $client->setCity($faker->city);
            $client->setFirstName($faker->firstName);
            $client->setName($faker->lastName);
            $client->setPhonenumber($faker->phoneNumber);
            $client->setStatus(true);
            rand(0,1) >= 0.5 ? $client->setCommitment('chaud') : $client->setCommitment('froid');
            $manager->persist($client);

            //exchange
            $exchange = new Exchange();
            $exchange->setClientId($client);
            $exchange->setUser($user);
            rand(0,1) >= 0.5 ? $exchange->setType('téléphone') : $exchange->setType('mail');
            $exchange->setDetail($faker->sentence);
            $manager->persist($exchange);

            //ticket
            $ticket = new Ticket();
            $ticket->setExchangeId($exchange);
            $tempCategoryId = $this->categories[rand(0, count($this->categories) - 1)];
            $ticket->setCategoryId($tempCategoryId);
            $ticket->setClient($client);
            $ticket->setUser($user);
            $ticket->setObject($faker->word);
            $ticket->setDetails($faker->sentence);
            $ticket->setStatus(true);
            $manager->persist($ticket);

            //appointment
            $appointment = new Appointment();
            $appointment->setTicketId($ticket);
            $appointment->setCompagnyId($company);
            $appointment->setClientId($client);
            $appointment->setUserId($user);
            $appointment->setObject($faker->word);
            $appointment->setDateTime($faker->dateTimeBetween('now', '+2 years'));
            $manager->persist($appointment);

            //quotation
            $quotation = new Quotation();
            $quotation->setClientId($client);
            $quotation->setCompagnyId($company);
            $quotation->setRef($faker->uuid);
            $quotation->setStatus(true);
            $quotation->setTVA($faker->randomDigit);
            $quotation->setTTC($faker->randomDigit);
            $quotation->setHT($faker->randomDigit);
            $manager->persist($quotation);

            //invoice
            $invoice = new Invoice();
            $invoice->setTicketId($ticket);
            $invoice->setClientId($client);
            $invoice->setUserId($user);
            $invoice->setRef($faker->uuid);
            $invoice->setStatus(true);
            $invoice->setTVA($faker->randomDigit);
            $invoice->setTTC($faker->randomDigit);
            $invoice->setHT($faker->randomDigit);
            $manager->persist($invoice);
        }

        //create one "user" user with fixed login credentials
        $user = new User();
        $user->setEmail('user@user.com');
        $user->setAdress($faker->address);
        $user->setFirstName($faker->firstName);
        $user->setName($faker->lastName);
        $user->setPassword('$2y$10$ywTv5juss2WV1RiacJ15U.g3KEB7n2BaUyj7lz/APESkPFkpwfJ2i');
        $user->setPhonenumber($faker->phoneNumber);
        $user->setRoles((array)'ROLE_USER');
        $manager->persist($user);

        //create one "admin" user with fixed login credentials
        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setAdress($faker->address);
        $user->setFirstName($faker->firstName);
        $user->setName($faker->lastName);
        $user->setPassword('$2y$10$ywTv5juss2WV1RiacJ15U.g3KEB7n2BaUyj7lz/APESkPFkpwfJ2i');
        $user->setPhonenumber($faker->phoneNumber);
        $user->setRoles((array)'ROLE_ADMIN');
        $manager->persist($user);

        $manager->flush();
    }
}