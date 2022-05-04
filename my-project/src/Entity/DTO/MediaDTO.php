<?php

namespace App\Entity\DTO;

class MediaDTO
{
    private string $id;
    private string $body;
    private array $cardImages = [];
    private array $cast = [];
    private string $cert;
    private string $class;
    private array $directors;
    private int $duration;
    private array $genres = [];
    private string $headline;
    private array $keyArtImages = [];
    private string $lastUpdated;
    private string $quote;
    private int $rating;
    private string $reviewAuthor;
    private string $skyGoId;
    private string $skyGoUrl;
    private string $sum;
    private string $synopsis;
    private string $url;
    private array $videos = [];
    private array $viewingWindow = [];
    private string $year;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of cardImages
     */ 
    public function getCardImages()
    {
        return $this->cardImages;
    }

    /**
     * Set the value of cardImages
     *
     * @return  self
     */ 
    public function setCardImages($cardImages)
    {
        $this->cardImages = $cardImages;

        return $this;
    }

    /**
     * Get the value of cast
     */ 
    public function getCast()
    {
        return $this->cast;
    }

    /**
     * Set the value of cast
     *
     * @return  self
     */ 
    public function setCast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get the value of cert
     */ 
    public function getCert()
    {
        return $this->cert;
    }

    /**
     * Set the value of cert
     *
     * @return  self
     */ 
    public function setCert($cert)
    {
        $this->cert = $cert;

        return $this;
    }

    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of directors
     */ 
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Set the value of directors
     *
     * @return  self
     */ 
    public function setDirectors($directors)
    {
        $this->directors = $directors;

        return $this;
    }

    /**
     * Get the value of duration
     */ 
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @return  self
     */ 
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of genres
     */ 
    public function getGenres()
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @return  self
     */ 
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Get the value of headline
     */ 
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Set the value of headline
     *
     * @return  self
     */ 
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * Get the value of keyArtImages
     */ 
    public function getKeyArtImages()
    {
        return $this->keyArtImages;
    }

    /**
     * Set the value of keyArtImages
     *
     * @return  self
     */ 
    public function setKeyArtImages($keyArtImages)
    {
        $this->keyArtImages = $keyArtImages;

        return $this;
    }

    /**
     * Get the value of lastUpdated
     */ 
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set the value of lastUpdated
     *
     * @return  self
     */ 
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get the value of quote
     */ 
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * Set the value of quote
     *
     * @return  self
     */ 
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of reviewAuthor
     */ 
    public function getReviewAuthor()
    {
        return $this->reviewAuthor;
    }

    /**
     * Set the value of reviewAuthor
     *
     * @return  self
     */ 
    public function setReviewAuthor($reviewAuthor)
    {
        $this->reviewAuthor = $reviewAuthor;

        return $this;
    }

    /**
     * Get the value of skyGoId
     */ 
    public function getSkyGoId()
    {
        return $this->skyGoId;
    }

    /**
     * Set the value of skyGoId
     *
     * @return  self
     */ 
    public function setSkyGoId($skyGoId)
    {
        $this->skyGoId = $skyGoId;

        return $this;
    }

    /**
     * Get the value of skyGoUrl
     */ 
    public function getSkyGoUrl()
    {
        return $this->skyGoUrl;
    }

    /**
     * Set the value of skyGoUrl
     *
     * @return  self
     */ 
    public function setSkyGoUrl($skyGoUrl)
    {
        $this->skyGoUrl = $skyGoUrl;

        return $this;
    }

    /**
     * Get the value of sum
     */ 
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set the value of sum
     *
     * @return  self
     */ 
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get the value of synopsis
     */ 
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @return  self
     */ 
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of videos
     */ 
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Set the value of videos
     *
     * @return  self
     */ 
    public function setVideos($videos)
    {
        $this->videos = $videos;

        return $this;
    }

    /**
     * Get the value of viewingWindow
     */ 
    public function getViewingWindow()
    {
        return $this->viewingWindow;
    }

    /**
     * Set the value of viewingWindow
     *
     * @return  self
     */ 
    public function setViewingWindow($viewingWindow)
    {
        $this->viewingWindow = $viewingWindow;

        return $this;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

}