<?php

namespace App\Entity;

use App\Repository\MovieGenreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieGenreRepository::class)]
#[ORM\Table(name: "movie_genre")]
class MovieGenre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity:"Genre", inversedBy: "movieGenre")]
    #[ORM\JoinColumn(name: "genre_id", referencedColumnName: "id", nullable: false)]
    private $genre;

    #[ORM\ManyToOne(targetEntity:"Movie", inversedBy:"genres")]
    #[ORM\JoinColumn(name: "movie_id", referencedColumnName: "id", nullable: false)]
    private $movie;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * Get the value of movie
     */ 
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set the value of movie
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

}
