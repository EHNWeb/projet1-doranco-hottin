<?php

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployesFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        $employesInitData = [
            [
                'prenom' => 'Camille',
                'nom' => 'Baubier',
                'telephone' => '06 78 23 03 21',
                'email' => 'camille.baubier@gmail.com',
                'adresse' => '10 rue de rivoli 75001 Paris',
                'poste' => 'Responsable RH',
                'salaire' => 2500,
                'datedenaissance' => '01/05/1982'
            ],
            [
                'prenom' => 'Thomas',
                'nom' => 'Winter',
                'telephone' => '06 89 77 32 90',
                'email' => 'thomwinter@hotmail.fr',
                'adresse' => '15 avenue jean jaures 33000 Bordeaux',
                'poste' => 'Responsable Qualité',
                'salaire' => 2800,
                'datedenaissance' => '26/12/1979'
            ],
            [
                'prenom' => 'Julien',
                'nom' => 'Cottet',
                'telephone' => '06 26 66 25 21',
                'email' => 'cottet.julien@gmail.com',
                'adresse' => '70 rue royale 06000 Nice',
                'poste' => 'PDG',
                'salaire' => 1900,
                'datedenaissance' => '27/02/1991'
            ],
            [
                'prenom' => 'Mathieu',
                'nom' => 'Valse',
                'telephone' => '06 58 12 50 01',
                'email' => 'mathieuv@yahoo.fr',
                'adresse' => '87 avenue du printemps 69000 Lyon',
                'poste' => 'Responsable R&D',
                'salaire' => 1500,
                'datedenaissance' => '20/08/1992'
            ],
            [
                'prenom' => 'Amandine',
                'nom' => 'Thoyer',
                'telephone' => '06 22 99 00 10',
                'email' => 'camille.thoyer@gmail.com',
                'adresse' => '15 rue du vieu-port 13000 Marseille',
                'poste' => 'Responsable IT',
                'salaire' => 3100,
                'datedenaissance' => '09/09/1985'
            ]
        ];

        for ($i = 0; $i < 5; $i++) {
            $employe = new Employes;

            $employe->setPrenom($employesInitData[$i]['prenom'])
                ->setNom($employesInitData[$i]['nom'])
                ->setTelephone($employesInitData[$i]['telephone'])
                ->setEmail($employesInitData[$i]['email'])
                ->setAdresse($employesInitData[$i]['adresse'])
                ->setPoste($employesInitData[$i]['poste'])
                ->setSalaire($employesInitData[$i]['salaire'])
                ->setDatedenaissance(new \DateTime())
                ->setDatedenaissance(\DateTime::createFromFormat("d/m/Y", $employesInitData[$i]['datedenaissance']));

            // Insertion des données
            // persist() permet de faire persister l'article dans le temps et préparer son insertion en BDD
            $manager->persist($employe);
        }

        $manager->flush();
    }
}
