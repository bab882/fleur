<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'cart_')]
class AddtocartController extends AbstractController
{

    private RequestStack $RequestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    #[Route('/add/{id}', name: 'index')]
    public function index(int $id) : void
    {
        $cart = $this->RequestStack->getSession()->get('cart', []);

        if(!empty($cart[$id]))
        {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $this->getSession()->set('cart', $cart);
        // dd($cart);
        // return $this->render('base.html.twig');
    }
    private function getSession()
    {
        return $this->RequestStack->getSession();
    }
}
