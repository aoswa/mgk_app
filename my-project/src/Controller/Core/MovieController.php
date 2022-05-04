<?php

namespace App\Controller\Core;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movie/{id}', name: 'core.movie')]
    public function index(Movie $movie): Response
    {
        return $this->render('core/movie/index.html.twig', [
            'movie' => $movie,
        ]);
    }
}
