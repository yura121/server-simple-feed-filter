<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feed
 * @ORM\Table(name="feed", uniqueConstraints={@ORM\UniqueConstraint(name="feed_id_key", columns={"id"})}, indexes={@ORM\Index(name="feed_is_trash_idx", columns={"is_trash"})})
 * @ORM\Entity(repositoryClass="App\Repository\FeedRepository")
 */
class Feed
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var int
     * @ORM\Column(name="is_trash", type="integer", nullable=false)
     */
    private int $isTrash = 0;

    /**
     * @var string
     * @ORM\Column(name="created_at", type="text", nullable=false)
     */
    private string $createdAt;

    /**
     * @var string
     * @ORM\Column(name="title", type="text", nullable=false)
     */
    private string $title;

    /**
     * @var string
     * @ORM\Column(name="link", type="text", nullable=false)
     */
    private string $link;

    /**
     * @var string
     * @ORM\Column(name="dt", type="text", nullable=false)
     */
    private string $dt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsTrash(): ?int
    {
        return $this->isTrash;
    }

    public function setIsTrash(int $isTrash): self
    {
        $this->isTrash = $isTrash;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDt(): ?string
    {
        return $this->dt;
    }

    public function setDt(string $dt): self
    {
        $this->dt = $dt;

        return $this;
    }
}
