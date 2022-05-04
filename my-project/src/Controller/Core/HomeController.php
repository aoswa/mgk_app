<?php

namespace App\Controller\Core;

use App\Entity\Core\Media\Media;
use App\Entity\DTO\MediaDTO;
use App\Entity\Image;
use App\Entity\Movie;
use App\Service\Client\MindGeek\FeedService;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route(path: "/", name: "core.homepage")]
    public function indexAction(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $results = $this->em->getRepository(Movie::class)->count();

        $pagination = [];
        $movies = [];

        if ($results > 0) {
            $limit = 10;
            $offset = ($page-1)*$limit;
            $pages = ceil($results/$limit);

            $pagination = [
                'currentPage' => $page, 
                'totalPages' => $pages, 
                'results' => $results
            ];

            $movies = $this->em->getRepository(Movie::class)->findBy([], null, $limit, $offset);
            
            $images = [
                Image::CARD_TYPE_IMAGE => [], 
                Image::KEYART_TYPE_IMAGE => []
            ];

            foreach ($movies as $movie) {
                foreach ($movie->getImages() as $image) {
                    $images[$image->getType()][] = $image;
                }
            }
        }

        return $this->render('core/index.html.twig', [
            'movies' => $movies, 
            'pagination' => $pagination
        ]);
        
    }
}