<?php
namespace ShopBundle\Services;

use Symfony\Component\Security\Core\SecurityContextInterface;

class GetReference 
{
    public function __construct($securityContext)
    {
        $this->securityContext = $securityContext;
         $em= $this->get('doctrine_mongodb')->getManager();
    }
    
    public function reference()
    {
        $reference = $this->em->getRepository('ShopBundle:Commandes')->findOneBy(array('id' => 'DESC'));
        
        if (!$reference)
            return 1;
        else 
            return $reference->getReference() +1;
    }
}