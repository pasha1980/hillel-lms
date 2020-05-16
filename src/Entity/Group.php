<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Group
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="groups")
 */
class Group
{
    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private ?int $id;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="datetime")
     */
    private ?\DateTime $startDate;

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
     * Many Groups have Many Students
     * @ORM\ManyToMany(targetEntity="Student", inversedBy="students")
     * @ORM\JoinTable(name="students_groups")
     */
    private $students;

    /**
     * Many Groups have one Course
     * @var Course|null
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="groups")
     */
    private $courses;

    /**
     * One Group has many Lessons
     * @var Collection
     * @ORM\OneToMany(targetEntity="Lesson", mappedBy="groups")
     */
    private $lessons;


    public function __construct() {
        $this->students = new ArrayCollection();
        $this->lessons = new ArrayCollection();
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
     * @return \DateTime|null
     */
    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime|null $startDate
     */
    public function setStartDate(?\DateTime $startDate): void
    {
        $this->startDate = $startDate;
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
     * @return Collection
     */
    public function getLessons(): Collection
    {
        return $this->lessons;
    }

    /**
     * @return Course|null
     */
    public function getCourses(): ?Course
    {
        return $this->courses;
    }

    /**
     * @param Course|null $courses
     */
    public function setCourses(?Course $courses): void
    {
        $this->courses = $courses;
    }

    /**
     * @return ArrayCollection
     */
    public function getStudents(): ArrayCollection
    {
        return $this->students;
    }
}