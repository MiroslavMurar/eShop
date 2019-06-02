<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailProductsController extends AbstractController
{
    /**
     * @Route("/detail/products/{id}", name="detail_products")
     */
    public function index(Product $product): Response
    {
        return $this->render('detail_products/index.html.twig', [
            'product' => $product,
        ]);
    }
}



