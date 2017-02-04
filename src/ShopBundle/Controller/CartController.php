<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ShopBundle\Document\UserAdr;

class CartController extends Controller
{
    /**Function that shows the number of articles on customer cart**/
    public function menuAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('cart'))
            $articles = 0;
        else
            $articles = count($session->get('cart'));

        return $this->render('ShopBundle:shopViews:cart.html.twig', array('articles' => $articles));
    }

    /**Function that adds an article**/
    public function addAction($id)
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('cart')) $session->set('cart',array());
        $cart = $session->get('cart');

        /**add article**/
            if ($this->getRequest()->query->get('qte') != null)
                $cart[$id] = $this->getRequest()->query->get('qte');
            else
                $cart[$id] = 1;

            $this->get('session')->getFlashBag()->add('success','Article added');


        $session->set('cart',$cart);


        return $this->redirect($this->generateUrl('cart'));
    }

    /**Function that modifies quantity**/
    public function modifyQuantityAction($id){
        $session = $this->getRequest()->getSession();

        if (!$session->has('cart')) $session->set('cart',array());
        $cart = $session->get('cart');

            if ($this->getRequest()->query->get('qte') != null) $cart[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success','Quantity modified');


        $session->set('cart',$cart);


        return $this->redirect($this->generateUrl('cart'));
    }

    /**Function that remove an article from a cart**/
    public function removeAction($id)
    {
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart');

        if (array_key_exists($id, $cart))
        {
            unset($cart[$id]);
            $session->set('cart',$cart);
            $this->get('session')->getFlashBag()->add('success','Article deleted');
        }

        return $this->redirect($this->generateUrl('cart'));
    }

    public function cartAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('cart')) $session->set('cart', array());

        $em = $this->get('doctrine_mongodb')->getManager();
        $products = $em->getRepository('ShopBundle:Product')->findArray(array_keys($session->get('cart')));

        return $this->render('ShopBundle:shopViews:cart.html.twig', array('product' => $products,
            'cart' => $session->get('cart')));
    }

    public function checkoutAction()
    {
        if ($this->get('request')->getMethod() == 'POST')
//            $this->setLivraisonOnSession();

        $em = $this->get('doctrine_mongodb')->getManager();
        $prepareCommande = $this->forward('ShopBundle:Commandes:prepare');
        $commande = $em->getRepository('ShopBundle:Commandes')->find($prepareCommande->getContent());

        return $this->render('ShopBundle:shopViews:checkout.html.twig', array('commande' => $commande));
    }
}