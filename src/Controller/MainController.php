<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    // private $productRepository;

    // public function __construct(ProductRepository $productRepository)
    // {
    //     $this->productRepository = $productRepository;
    // }

    #[Route('/', name: 'app_main')]
    public function index(ProductRepository $productRepository): Response
    {
        $product = $productRepository->findBy([],['PublishedAt' => 'DESC'],8);
        // dd($product);
   
        return $this->render('main/index.html.twig', [
            'newproducts' => $productRepository->findBy([],['PublishedAt' => 'DESC'],6),
        ]);
    }
}
