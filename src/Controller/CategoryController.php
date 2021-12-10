<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category.index")
     */
    public function index(): Response
    {
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/category/{name}", name="category.show")
     */

    public function show($name): Response
    {
        $categoryRepository = $this->getDoctrine()->getRepository(Category::class);
        $category = $categoryRepository->find($name);
        if (!$category)
        {
            throw $this->createNotFoundException('The category does not exist');
        }
        return $this->render('category/show.html.twig', [
            'controller_name' => 'ShowController',
            'category' => $category,
        ]);
    }
}
