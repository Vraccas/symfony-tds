<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task", indexes={@ORM\Index(name="idStory", columns={"idStory"})})
 * @ORM\Entity
 */
class Task
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
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \Story
     *
     * @ORM\ManyToOne(targetEntity="Story")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStory", referencedColumnName="id")
     * })
     */
    private $idstory;


    public function getId() {
        return $this->id;
    }

    public function getContent() {
        return $this->content;
    }

    public function getIdstory(): \Story {
        return $this->idstory;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setIdstory(\Story $idstory) {
        $this->idstory = $idstory;
    }


}
