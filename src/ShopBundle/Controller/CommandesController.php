<?php


namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use ShopBundle\Document\Commandes;
use ShopBundle\Document\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class CommandesController extends Controller
{

 //validate a command/save command to data base
    public function prepareAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->get('doctrine_mongodb')->getManager();

       /* if (!$session->has('commande'))
            $commande = new Commandes();
        else
            $commande = $em->getRepository('ShopBundle:Commandes')->find($session)->get('commande');
*/
        $commande = new Commandes();
        $commande->setDate(new \DateTime());
       // $commande->setUser($this->container->get('security.context')->getToken()->getUser());
        $commande->setValider(1);
        //need of a service
        $commande->setReference($this->container->get('setNewReference')->reference()); //Service
        //pass arguments of cart?
        $commande->setCommande(NULL);

        $em->persist($commande);
        $em->flush();
        $this->get('session')->getFlashBag()->add('success','Votre commande est validé avec succès');


        return $this->render('ShopBundle:Default:index.html.twig');
    }

    
}