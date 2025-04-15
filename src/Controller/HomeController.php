<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        MovieRepository $movieRepository
    ): Response {
        $movies = $movieRepository->findAll();
        return $this->render('index.html.twig', [
            'movies' => $movies,
        ]);
    }

    #[Route('/discover', name: 'app_discover')]
    public function discover(
        MovieRepository $movieRepository, CategoryRepository $categoryRepository
    ): Response
    {
        $movies = $movieRepository->findAll();
        $categories = $categoryRepository->findAll();
        return $this->render('discover.html.twig', [
            'movies' => $movies,
            'categories' => $categories,
        ]);
    }

    #[Route('/lists', name: 'app_lists')]
    public function lists(): Response
    {
        return $this->render('lists.html.twig');
    }

    #[Route('/subscriptions', name: 'app_subscriptions')]
    public function subscriptions(): Response
    {
        return $this->render('subscriptions.html.twig');
    }
}
