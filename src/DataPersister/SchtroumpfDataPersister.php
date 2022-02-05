<?php


namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Schtroumpf;
use Doctrine\ORM\EntityManagerInterface;


class SchtroumpfDataPersister implements ContextAwareDataPersisterInterface
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports($data, array $context = []): bool
    {

        return $data instanceof Schtroumpf;
    }

    public function persist($data, array $context = [])
    {
        $this->entityManager->persist($data);
        $this->entityManager->flush();

    }

    public function remove($data, array $context = [])
    {

        dd("cici");
        // call your persistence layer to delete $data
    }
}