<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SchtroumpfRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: SchtroumpfRepository::class)]
class Schtroumpf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToMany(mappedBy: 'Schtroumpf', targetEntity: SchtroumpfJob::class, orphanRemoval: true)]
    private $schtroumpfJobs;

    #[ORM\OneToMany(mappedBy: 'schtroumpf', targetEntity: Review::class, orphanRemoval: true)]
    private $reviews;

    public function __construct()
    {
        $this->schtroumpfJobs = new ArrayCollection();
        $this->reviews = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|SchtroumpfJob[]
     */
    public function getSchtroumpfJobs(): Collection
    {
        return $this->schtroumpfJobs;
    }

    public function addSchtroumpfJob(SchtroumpfJob $schtroumpfJob): self
    {
        if (!$this->schtroumpfJobs->contains($schtroumpfJob)) {
            $this->schtroumpfJobs[] = $schtroumpfJob;
            $schtroumpfJob->setSchtroumpf($this);
        }

        return $this;
    }

    public function removeSchtroumpfJob(SchtroumpfJob $schtroumpfJob): self
    {
        if ($this->schtroumpfJobs->removeElement($schtroumpfJob)) {
            // set the owning side to null (unless already changed)
            if ($schtroumpfJob->getSchtroumpf() === $this) {
                $schtroumpfJob->setSchtroumpf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setSchtroumpf($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getSchtroumpf() === $this) {
                $review->setSchtroumpf(null);
            }
        }

        return $this;
    }
}
