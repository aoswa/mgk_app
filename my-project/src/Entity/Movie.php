<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    protected $body;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $cert;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $class;

    #[ORM\Column(type: 'integer')]
    protected $duration;

    #[ORM\Column(type: 'string', length: 255)]
    protected $headline;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $identifier;

    #[ORM\Column(type: 'text', nullable: true)]
    protected $synopsis;

    #[ORM\Column(type: 'string')]
    protected $year;

    #[ORM\Column(type: 'integer', nullable: true)]
    protected $rating;

    #[ORM\OneToMany(targetEntity: "MovieGenre", mappedBy: "movie")]
    private $genres;

    #[ORM\OneToMany(targetEntity: "MovieImage", mappedBy: "movie")]
    private $images;

    #[ORM\OneToMany(targetEntity: "Video", mappedBy: "movie")]
    private $videos;

    #[ORM\OneToMany(targetEntity: "MovieCast", mappedBy: "movie")]
    private $casts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getCert(): ?string
    {
        return $this->cert;
    }

    public function setCert(?string $cert): self
    {
        $this->cert = $cert;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Get the value of videos
     */ 
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Get the value of casts
     */ 
    public function getCasts()
    {
        return $this->casts;
    }
}
