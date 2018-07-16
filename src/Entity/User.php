<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private $createdBy;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Post", mappedBy="createdBy")
     */
    private $writtenPosts;

    public function __construct()
    {
        $this->createdBy = new ArrayCollection();
        $this->writtenPosts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCreatedBy(): Collection
    {
        return $this->createdBy;
    }

    public function addCreatedBy(User $createdBy): self
    {
        if (!$this->createdBy->contains($createdBy)) {
            $this->createdBy[] = $createdBy;
        }

        return $this;
    }

    public function removeCreatedBy(User $createdBy): self
    {
        if ($this->createdBy->contains($createdBy)) {
            $this->createdBy->removeElement($createdBy);
        }

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getWrittenPosts(): Collection
    {
        return $this->writtenPosts;
    }

    public function addWrittenPost(Post $writtenPost): self
    {
        if (!$this->writtenPosts->contains($writtenPost)) {
            $this->writtenPosts[] = $writtenPost;
            $writtenPost->setCreatedBy($this);
        }

        return $this;
    }

    public function removeWrittenPost(Post $writtenPost): self
    {
        if ($this->writtenPosts->contains($writtenPost)) {
            $this->writtenPosts->removeElement($writtenPost);
            // set the owning side to null (unless already changed)
            if ($writtenPost->getCreatedBy() === $this) {
                $writtenPost->setCreatedBy(null);
            }
        }

        return $this;
    }
	
	public function getRoles(): array
	{
		return [$this->getRole()];
	}
	
	public function getSalt()
	{
		return null;
	}
	
	public function eraseCredentials()
	{
		return null;
	}
}
