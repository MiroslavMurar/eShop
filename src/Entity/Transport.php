<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransportRepository")
 */
class Transport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Orderr", mappedBy="transport")
     */
    private $orderrs;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    public function __construct()
    {
        $this->orderrs = new ArrayCollection();
    }


    public function __toString() {
        return $this->name;
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
     * @return Collection|Orderr[]
     */
    public function getOrderrs(): Collection
    {
        return $this->orderrs;
    }

    public function addOrderr(Orderr $orderr): self
    {
        if (!$this->orderrs->contains($orderr)) {
            $this->orderrs[] = $orderr;
            $orderr->setTransport($this);
        }

        return $this;
    }

    public function removeOrderr(Orderr $orderr): self
    {
        if ($this->orderrs->contains($orderr)) {
            $this->orderrs->removeElement($orderr);
            // set the owning side to null (unless already changed)
            if ($orderr->getTransport() === $this) {
                $orderr->setTransport(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
