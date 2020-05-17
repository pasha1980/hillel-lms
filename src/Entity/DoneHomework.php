<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DoneHomework
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="done_homeworks")
 */

class DoneHomework
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
    private ?string $text;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $reply;

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
     * Many DoneHomeworks have one Homework
     * @var Homework|null
     * @ORM\ManyToOne(targetEntity="Homework", inversedBy="doneHomeworks")
     */
    private $homework;

    /**
     * Many DoneHomework has one Student
     * @var Student|null
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="doneHomework")
     */
    private $student;

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
     * @return string|null
     */
    public function getReply(): ?string
    {
        return $this->reply;
    }

    /**
     * @param string|null $reply
     */
    public function setReply(?string $reply): void
    {
        $this->reply = $reply;
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
     * @return Homework|null
     */
    public function getHomework(): ?Homework
    {
        return $this->homework;
    }

    /**
     * @param Homework|null $homeworks
     */
    public function setHomework(?Homework $homework): void
    {
        $this->homework = $homework;
    }

    /**
     * @return Student|null
     */
    public function getStudent(): ?Student
    {
        return $this->student;
    }

    /**
     * @param Student|null $student
     */
    public function setStudent(?Student $student): void
    {
        $this->student = $student;
    }
}