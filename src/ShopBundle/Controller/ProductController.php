<?php


namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use ShopBundle\Document\Product;


class ProductController extends Controller
{
	//to bring them products 
	public function showAction()
{
     $product = $this->get('doctrine_mongodb')
        ->getRepository('ShopBundle:Product')
        ->findAll();

    if (!$product) {
        throw $this->createNotFoundException('No product found');
    }
    //dunno about this tho
    return $this->render('ShopBundle:shopViews:shop.html.twig', array(
            'product' => $product,
            ));

}
  
	public function sendAction($delivery)
{//to bring him product
   
     $single_product = $this->get('doctrine_mongodb')
    ->getManager()
    ->createQueryBuilder('ShopBundle:Product')

    ->find($delivery)
    ->getQuery()
    ->execute();

    if (!$single_product) {
        throw $this->createNotFoundException('No product found for delivery ');
    }
    return $this->render('ShopBundle:shopViews:product.html.twig', array(
            'single_product' => $single_product,
            ));

}
  

}