<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrintProductsController extends AbstractController
{
    /**
     * @Route("/print/products", name="print_products")
     */
    public function index(ProductRepository $productRepository)
    {
        return $this->render('print_products/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
}
