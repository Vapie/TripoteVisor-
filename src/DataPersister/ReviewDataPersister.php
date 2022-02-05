<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Review;

final class ReviewDataPersister implements ContextAwareDataPersisterInterface
{
    public function supports($data, array $context = []): bool
    {
        return $data instanceof Review;
    }

    public function persist($data, array $context = [])
    {
        dd("onéla");
        // call your persistence layer to save $data
        return $data;
    }

    public function remove($data, array $context = [])
    {
        dd("onéici");
        // call your persistence layer to delete $data
    }
}