<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    public $title;

    #[ORM\Column(type: 'string', length: 255)]
    public $type;

    #[ORM\Column(type: 'string', length: 1024)]
    public $url;

    #[ORM\ManyToOne(targetEntity: "Movie", inversedBy: "videos", fetch: "EXTRA_LAZY")]
    protected $movie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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
}
