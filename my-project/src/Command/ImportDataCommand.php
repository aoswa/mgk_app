<?php

namespace App\Command;

use App\Entity\DTO\MediaDTO;
use App\Entity\Genre;
use App\Entity\Image;
use App\Entity\Movie;
use App\Entity\MovieCast;
use App\Entity\MovieGenre;
use App\Entity\MovieImage;
use App\Entity\Video;
use App\Entity\VideoAlternatives;
use App\Repository\GenreRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use App\Service\Client\MindGeek\FeedService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\Serializer\SerializerInterface;

class ImportDataCommand extends Command
{
    protected static $defaultName = 'import:data';

    private $feedService;
    private $genreRepository;
    private $em;
    private $serializerInterface;

    public function __construct(
        FeedService $feedService, 
        EntityManagerInterface $em, 
        GenreRepository $genreRepository, 
        SerializerInterface $serializerInterface
    ) {
        $this->feedService = $feedService;
        $this->genreRepository = $genreRepository; 
        $this->em = $em;
        $this->serializerInterface = $serializerInterface;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {   
        $data = $this->feedService->getFeed();

        if (!is_null($data)) {

            try {
                $this->import($data);
            } catch (Exception $e) {
                $output->writeln($e->getMessage());
                return Command::FAILURE;
            }

        } else {
            $output->writeln('Error! Source not available!');
            return Command::FAILURE;
        }

        $output->writeln("Resources imported!");
        return Command::SUCCESS;
    }

    public function import($data)
    {
        try {
            /**
             * @param MediaDTO $entry
             */

            foreach ($data as $entry) {

                $movieObject = new Movie();
                $movieObject->setBody($entry->getBody())
                    ->setCert($entry->getCert())
                    ->setDuration($entry->getDuration())
                    ->setHeadline($entry->getHeadline())
                    ->setYear($entry->getYear())
                    ->setClass($entry->getClass())
                    ->setSynopsis($entry->getSynopsis());

                $this->em->persist($movieObject);

                foreach ($entry->getCardImages() as $cardImage) {

                    try {
                       
                        $imageObject = new Image();
                   
                        $imageObject->setType($imageObject::CARD_TYPE_IMAGE);
                        $imageObject->setFile($cardImage['url']);
                        $imageObject->setHeight($cardImage['h']);
                        $imageObject->setWidth($cardImage['w']);
                    
                        $this->em->persist($imageObject);

                        $movieImageObject = new MovieImage();
                        $movieImageObject->setType($imageObject::CARD_TYPE_IMAGE);
                        $movieImageObject->setImage($imageObject);
                        $movieImageObject->setMovie($movieObject);

                        $this->em->persist($movieImageObject);

                    } catch (\Exception $e) {
                        
                    }

                }

                foreach ($entry->getKeyArtImages() as $keyArtImage) {

                    try {
                       
                        $imageObject = new Image();
                   
                        $imageObject->setType($imageObject::KEYART_TYPE_IMAGE);
                        $imageObject->setFile($keyArtImage['url']);
                        $imageObject->setHeight($keyArtImage['h']);
                        $imageObject->setWidth($keyArtImage['w']);
                    
                        $this->em->persist($imageObject);

                        $movieImageObject = new MovieImage();
                        $movieImageObject->setType($imageObject::KEYART_TYPE_IMAGE);
                        $movieImageObject->setImage($imageObject);
                        $movieImageObject->setMovie($movieObject);

                        $this->em->persist($movieImageObject);

                    } catch (\Exception $e) {
                        
                    }

                }

                foreach ($entry->getVideos() as $video) {
                 
                    $videoObject = new Video();
                    $videoObject->setTitle($video['title']);
                    $videoObject->setType($video['type']);
                    $videoObject->setMovie($movieObject);
                    $videoObject->setUrl($video['url']);

                    $this->em->persist($videoObject);

                    if (array_key_exists('alternatives', $video)) {

                        $alternatives = $this->serializerInterface->deserialize(
                            json_encode($video['alternatives']), VideoAlternatives::class.'[]', 'json'
                        );

                        foreach ($alternatives as $alternativeObject) {

                            $alternativeObject->setVideo($videoObject);
                            $this->em->persist($alternativeObject);
                        }
                    }
                }

                foreach ($entry->getDirectors() as $director) {
                    $newCast = new MovieCast();
                    $newCast->setType($newCast::TYPE_DIRECTOR);
                    $newCast->setName($director['name']);
                    $newCast->setMovie($movieObject);
                    $this->em->persist($newCast);
                }
                    
                foreach ($entry->getCast() as $director) {
                    $newCast = new MovieCast();
                    $newCast->setType($newCast::TYPE_CAST);
                    $newCast->setName($director['name']);
                    $newCast->setMovie($movieObject);
                    $this->em->persist($newCast);
                }

                foreach ($entry->getGenres() as $genre) {
                    $genreObject = $this->em->getRepository(Genre::class)->findOneBy([
                        'name' => $genre
                    ]);

                    if (is_null($genreObject)) {
                        $genreObject = new Genre();
                        $genreObject->setName($genre);
                        
                        $this->em->persist($genreObject);
                    }
                    
                    $newGenre = new MovieGenre();
                    $newGenre->setGenre($genreObject);
                    $newGenre->setMovie($movieObject);

                    $this->em->persist($newGenre);
                }

                $this->em->flush();
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}