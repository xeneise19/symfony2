<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class showController extends Controller
{
	/**
	*@Route("/product/view/{id}" , name="Product_view")
	*/
    public function viewAction($id)
    {
    	$producto = $this->getDoctrine()->getRepository('ProductoBundle:Producto')->find($id);
    	// echo json_encode($producto);
    	// new \ecommarg\cart\Cart();
    	//obtener servicio
    	// $this->get('app.Cart');
    	return $this->render('ProductoBundle:Default:show.html.twig',['producto'=> $producto]);
    }
}
