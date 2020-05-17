<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Homework
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="homeworks")
 */
class Homework
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private ?int $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $title;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $text;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $updatedAt;

    /**
     * Many Homeworks have one Lesson
     * @var Lesson|null
     * @ORM\ManyToOne(targetEntity="Lesson", inversedBy="groups")
     */
    private $lessons;

    /**
     * One Homework has many DoneHomeworks
     * @var Collection
     * @ORM\OneToMany(targetEntity="DoneHomework", mappedBy="homework")
     */
    private $doneHomeworks;

    public function __construct()
    {
        $this->doneHomeworks = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime|null $createdAt
     */
    public function setCreatedAt(?\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Lesson|null
     */
    public function getLessons(): ?Lesson
    {
        return $this->lessons;
    }

    /**
     * @param Lesson|null $lessons
     */
    public function setLessons(?Lesson $lessons): void
    {
        $this->lessons = $lessons;
    }

    /**
     * @return Collection
     */
    public function getDoneHomeworks(): Collection
    {
        return $this->doneHomeworks;
    }
}