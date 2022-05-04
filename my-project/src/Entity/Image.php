<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Image
{

    const CARD_TYPE_IMAGE = 'card';
    const KEYART_TYPE_IMAGE = 'keyart';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $path;

    #[ORM\Column(type: 'string', length: 255)]
    private $filename;

    #[ORM\Column(type: 'integer')]
    private $height;

    #[ORM\Column(type: 'integer')]
    private $width;

    private $imageUrl;

    #[ORM\OneToMany(mappedBy: "image", targetEntity: "MovieImage", fetch: "EXTRA_LAZY")]
    private $movieImage;

    private $type;

    protected $file;

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getFile()
    {
        return $this->file;
    }

    #[ORM\PrePersist]
    public function upload() 
    {
        $fileName = basename($this->getFile());
        $fileExtension = $this->getFileExtension($fileName);

        $uploadFilename = md5(uniqid().$fileName). '.' .$fileExtension;

        $file = file_get_contents($this->getFile());
        $path = $this->getUploadDir().'/'.$uploadFilename;
        
        file_put_contents($path, $file);

        $this->path = '/uploads/' . $this->type.'/'.$uploadFilename;
        $this->filename = $fileName;
    }

    protected function getFileExtension($filename)
    {
        $extension = explode('.', $filename);
        return array_pop($extension);
    }

    protected function getUploadDir()
    {
        try {
            if (!is_dir(__DIR__.'/../../public/uploads/' . $this->type)) {
                mkdir(__DIR__.'/../../public/uploads/' . $this->type, 0777, true);
            }
        } catch (\Exception $e) {
            
        }

        return __DIR__.'/../../public/uploads/' . $this->type;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
