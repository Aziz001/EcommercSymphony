<?php
use Doctrine\Common\Persistence\ObjectManager;

$manager = ObjectManager();

    $info = json_decode(file_get_contents("php://input"));
    
    $adresse1 = new UserAdr();
        $adresse1->setUser();
        $adresse1->setNom($info['Name']);
        $adresse1->setPrenom($info['Lastname']);
        $adresse1->setTelephone($info['phone']);
        $adresse1->setEmail($jsons['email']);
        $adresse1->setAdresse($jsons['address']);
        $adresse1->setCp($jsons['pc']);
        $adresse1->setPays($jsons['country']);
        $adresse1->setVille($jsons['city']);
        $adresse1->setNotes($jsons['notes']);
        $manager->persist($adresse1);
          $manager->flush();

