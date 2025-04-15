<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'app_category')]
    public function index(
        int $id,
        CategoryRepository $categoryRepository
    ): Response
    {
        // Fetch the category by ID
        $category = $categoryRepository->find($id);
        if (!$category) {
            throw $this->createNotFoundException('Category not found');
        }

        $categories = $categoryRepository->findAll();

        // Render the category view
        return $this->render('content/category.html.twig', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}
