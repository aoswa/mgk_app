<?php

namespace App\Entity;

use App\Repository\VideoAlternativesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VideoAlternativesRepository::class)]
class VideoAlternatives
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    public $label;

    #[ORM\Column(type: 'string', length: 1024)]
    public $url;

    #[ORM\ManyToOne(targetEntity: Video::class, inversedBy: 'alternatives')]
    #[ORM\JoinColumn(nullable: false)]
    private $video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): self
    {
        $this->video = $video;

        return $this;
    }
}
