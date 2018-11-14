<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
	*@Route("/product/list" , name="Product_list")
	*/
    public function indexAction()
    {
    	// $request = $this->getRequest()->get('name');
        
    	// if(!isset($request))
    	// {
    		$productos = $this->getDoctrine()->getRepository('ProductoBundle:Producto')->findAll();
    	// }

    	// $productos = $this->getDoctrine()->getRepository('ProductoBundle:Producto')->createQueryBuilder('o')
    	// 							 ->where('o.name LIKE :name')
    	// 							 ->setParameter('name', '%'.$request.'%')
    	// 							 ->getQuery()
    	// 							 ->getResult();
    	return $this->render('ProductoBundle:Default:index.html.twig',['productos'=> $productos]);
    }

    /**
    *@Route("/product/cart/add/{id}/quantity/{quantity}" , name="Product_add_cart")
    */
    public function addToCartAction($id,$quantity){
        $producto= $this->getDoctrine()
        ->getRepository('ProductoBundle:Producto')
        ->find($id);

        if(null===$producto){
            throw new \Exception("Product not found");
        }

        $cartService = $this->get('app.cart');

        $cartService->add($producto);

        die();
    }

    /**
    *@Route("/product/cart/view" , name="product_view_cart")
    */
    public function viewCartAction(){
        var_dump($this->get('app.cart')
        ->all()
        );
        die();
    }
}
