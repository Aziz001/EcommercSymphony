<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use src\ShopBundle\Document\UserAdr;
use src\ShopBundle\Document\Commandes;


class CheckoutController extends Controller
{
   //to bring user's adress if exists already 
    public function useradrAction($user)
{
     $user_info = $this->get('doctrine_mongodb')
        ->getRepository('ShopBundle:UserAdr')
        ->field('user')->equals($user)
		->getQuery()
	    ->execute();

    if (!$user_info) {
        throw $this->createNotFoundException('No user found');
    }
    //dunno about this tho
    return $this->render('ShopBundle:Default:index.html.twig', array(
            'user_info' => $user_info,
            ));

}
//email confirmation function
public function email_confirmAction($email)
{
    $message = \Swift_Message::newInstance()
        ->setSubject('Hello Email')
        ->setFrom('shop@email.com')
        ->setTo($email)
        ->setBody(  'order with success' );
    $this->get('mailer')->send($message);

    return $this->render('ShopBundle:Default:index.html.twig');
}
}
