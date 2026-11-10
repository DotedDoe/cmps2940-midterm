<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProductRepository;
use App\Entity\Product;
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

#[Route('/inventory', name: 'inventory')]
public function inventory(ProductRepository $productRepository): Response
{
    $products = array_map(
        static function (Product $product): array {
            return [
                'id' => $product->getSlug(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'category' => $product->getCategory(),
                'image' => $product->getImage(),
                'description' => $product->getDescription(),
                'nutrition' => $product->getNutrition(),
                'customizable' => $product->getCustomizable(),
            ];
        },
        $productRepository->findAll()
    );

    return $this->render('inventory/index.html.twig', [
        'products' => $products,
    ]);
}

    #[Route('/about-us', name: 'about_us')]
    public function aboutUs(): Response
    {
        return $this->render('about_us/index.html.twig');
    }

    #[Route('/cart', name: 'cart')]
    public function cart(): Response
    {
        return $this->render('cart/index.html.twig');
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('login/index.html.twig');
    }

    #[Route('/create', name: 'create')]
    public function create(): Response
    {
        return $this->render('create/index.html.twig');
    }
}
