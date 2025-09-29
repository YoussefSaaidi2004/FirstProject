<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route(path: '/authorshow/{name}', name: 'app_authorshow')]
    public function showAuthor($name): Response
    {
        return $this->render('author/showauthor.html.twig', [
            'name' => $name,
        ]);
    }
    #[Route('/authors/list', name: 'app_authors_list')]
    public function listAuthors(): Response
    {
        $authors = [
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => 'William Shakespeare', 'email' =>'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha-Hussein.jpg','username' => 'Taha Hussein', 'email' =>'taha.hussein@gmail.com', 'nb_books' => 300),
        ];


        return $this->render('author/list.html.twig', [
         'authors' => $authors,
        ]);
    }

    #[Route('/author/details/{id}', name: 'app_author_details')]
    public function authorDetails($id): Response
    {
        $authors = [
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => 'William Shakespeare', 'email' =>'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>'taha.hussein@gmail.com', 'nb_books' => 300),
        ];

        $author = null;
        foreach ($authors as $a) {
            if ($a['id'] == $id) {
                $author = $a;
                break;
            }
        }

        if (!$author) {
            throw $this->createNotFoundException('Auteur non trouvé');
        }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }
}
