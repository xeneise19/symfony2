<?php

namespace ProductoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{

	/**
     * @Route("/product/view/{id}", name="product_view")
     */

	public function product_view($id)
	{
			$productos= $this->getDoctrine()
    	->getRepository('ProductoBundle:Producto')
    	->find($id);
        return $this->render('ProductoBundle:Default:view.html.twig',['producto'=>$productos]);
	}
}
