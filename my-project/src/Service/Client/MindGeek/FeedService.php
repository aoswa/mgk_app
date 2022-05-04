<?php

namespace App\Service\Client\MindGeek;

use App\Entity\Core\Media\Media;
use App\Entity\DTO\MediaDTO;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use function PHPSTORM_META\type;

class FeedService
{
    private $client;
    private $serializer;

    public function __construct(HttpClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getFeed()
    {
        $request = $this->client->request(
            'GET',
            'https://mgtechtest.blob.core.windows.net/files/showcase.json'
        );

        $data = utf8_encode($request->getContent());

        /** @param ArrayCollection $medias */
        $response = $this->serializer->deserialize(
            $this->serializer->serialize(json_decode($data, true), 'json'), MediaDTO::class.'[]', 'json'
        );

        return $response;
    }

}