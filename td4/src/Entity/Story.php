<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Story
 *
 * @ORM\Table(name="story", indexes={@ORM\Index(name="idDeveloper", columns={"idDeveloper"}), @ORM\Index(name="idProject", columns={"idProject"})})
 * @ORM\Entity
 */
class Story
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
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=true)
     */
    private $descriptif;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tags", type="text", length=65535, nullable=true)
     */
    private $tags;

    /**
     * @var string|null
     *
     * @ORM\Column(name="step", type="string", length=50, nullable=true)
     */
    private $step;

    /**
     * @var \Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDeveloper", referencedColumnName="id")
     * })
     */
    private $iddeveloper;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProject", referencedColumnName="id")
     * })
     */
    private $idproject;


    public function getId() {
        return $this->id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getStep() {
        return $this->step;
    }

    public function getIddeveloper(): \Developer {
        return $this->iddeveloper;
    }

    public function getIdproject(): \Project {
        return $this->idproject;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
    }

    public function setTags($tags) {
        $this->tags = $tags;
    }

    public function setStep($step) {
        $this->step = $step;
    }

    public function setIddeveloper(\Developer $iddeveloper) {
        $this->iddeveloper = $iddeveloper;
    }

    public function setIdproject(\Project $idproject) {
        $this->idproject = $idproject;
    }


}
