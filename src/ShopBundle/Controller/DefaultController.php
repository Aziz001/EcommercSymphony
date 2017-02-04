<?php

namespace ShopBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use src\ShopBundle\Document\Product;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use ShopBundle\Document\UserAdr;
header('content-type : application/json;charset=utf-8');
header("access-control-allow-origin: *");

class DefaultController extends Controller
{
   
   /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('ShopBundle:Default:index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ));
    }

 
       /**
       *GET Route annotatin.
       * POST Route annotation.
     * @Route("/" , name="home")
     */
    public function getAction(Request $request)
    {
            $request = $this->getRequest();

        //to bring categories
        $categories = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')
    ->distinct('category')
    ->limit(2)
    ->sort('delivery', 'DSC')
    ->getQuery()
    ->execute();
    //to bring brands
       $brand = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')
    ->distinct('brand')
    ->limit(2)
    ->sort('delivery', 'DSC')
    ->getQuery()
    ->execute();
    //to bring latest products
    $latest_products = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')
    ->sort('delivery', 'DSC')
    ->limit(10)
    ->getQuery()
    ->execute();
    //to bring products with best prices
    $best_products = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')
    ->sort('price', 'DSC')
    ->limit(10)
    ->getQuery()
    ->execute();
    $type=$request->request->get('type'); // get a $_POST parameter
    $cat = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')
    ->find($type)
    ->sort('delivery', 'DSC')
    ->limit(10)
    ->getQuery()
    ->execute();

    return $this->render('ShopBundle:Default:index.html.twig', array(
           'brand' => $brand, 'categories' => $categories,'latest_products' => $latest_products,'cat' => $cat, 'best_products' => $best_products,
        ));
    }

     /**
     * @Route("/login" , name="login")
     */

//login page
    public function loginAction()
    {

    return $this->forward('FOSUserBundle:Security:login');
    }
     /**
     * @Route("/register" , name="register")
     */
//register page
    public function registerAction()
    {

    return $this->forward('FOSUserBundle:Registration:register');
    }
     /**
     * @Route("/profile" , name="profile")
     */
//profile page
    public function profileAction()
    {

    return $this->forward('FOSUserBundle:Profile:show');
    }

   
}

   



   
