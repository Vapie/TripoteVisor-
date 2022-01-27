<?php

namespace App\Entity;

use App\Repository\SchtroumpfJobRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchtroumpfJobRepository::class)]
class SchtroumpfJob
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Schtroumpf::class, inversedBy: 'schtroumpfJobs')]
    #[ORM\JoinColumn(nullable: false)]
    private $Schtroumpf;

    #[ORM\Column(type: 'string', length: 255)]
    private $role;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'schtroumpfJobs')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSchtroumpf(): ?Schtroumpf
    {
        return $this->Schtroumpf;
    }

    public function setSchtroumpf(?Schtroumpf $Schtroumpf): self
    {
        $this->Schtroumpf = $Schtroumpf;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }



}

