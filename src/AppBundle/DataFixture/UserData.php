<?php
namespace AppBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Document\User;

class UserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    //fonction load to save users into the database
    public function load(ObjectManager $manager)
    {
        $utilisateur1 = new User();
        $utilisateur1->setName('inesch');
        $utilisateur1->setEmail('cheikhines@gmail.com');
        $utilisateur1->setPassword('ats2016');
        $manager->persist($utilisateur1);
        
        
        $manager->flush();
        
        $this->addReference('utilisateur1', $utilisateur1);
        
    }
      public function getOrder()
    {
        return 1;
    }
    
  
}