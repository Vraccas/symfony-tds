<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag", uniqueConstraints={@ORM\UniqueConstraint(name="title", columns={"title"})})
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=30, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=10, nullable=false)
     */
    private $color;


    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getColor() {
        return $this->color;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setColor($color) {
        $this->color = $color;
    }


}
