<?php 
namespace ShopBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ShopBundle\Document\UserAdr;

class UserAdrData extends AbstractFixture implements OrderedFixtureInterface
{   //to load users adress into database
    public function load(ObjectManager $manager)
    {
       /* $adresse1 = new UserAdr();
        $adresse1->setUser($this->getReference('utilisateur1'));
        $adresse1->setNom('Cheikh');
        $adresse1->setPrenom('Ines');
        $adresse1->setTelephone('93503460');
        $adresse1->setAdresse('Tunis mannouba');
        $adresse1->setEmail('cheikhrouhouines94@gmail.com');
        $adresse1->setCp('2010');
        $adresse1->setPays('Tunisie');
        $adresse1->setVille('tunis');
        $adresse1->setNotes('Mannouba ENSI');
        $manager->persist($adresse1);
        
       
        
        $manager->flush();*/
    }
    
    public function getOrder()
    {
        return 2;
    }
}