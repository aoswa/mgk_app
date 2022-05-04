<?php

namespace App\Entity;

use App\Repository\MovieImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieImageRepository::class)]
class MovieImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $type;

    #[ORM\ManyToOne(targetEntity:"Image", inversedBy: "movieImage")]
    #[ORM\JoinColumn(name: "image_id", referencedColumnName: "id", nullable: false)]
    #[ORM\OrderBy(["width" => "DESC"])]
    private $image;

    #[ORM\ManyToOne(targetEntity: "Movie", inversedBy: "images")]
    #[ORM\JoinColumn(name: "movie_id", referencedColumnName: "id", nullable: false)]
    private $movie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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
     *
     * @return  self
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}
