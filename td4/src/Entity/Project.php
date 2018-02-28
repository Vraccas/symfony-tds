<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Project
 *
 * @ORM\Table(name="project", uniqueConstraints={@ORM\UniqueConstraint(name="projectName", columns={"name"})}, indexes={@ORM\Index(name="idOwner", columns={"idOwner"})})
 * @ORM\Entity
 */
class Project
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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text", length=65535, nullable=false)
     */
    private $descriptif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=false)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date", nullable=false)
     */
    private $duedate;

    /**
     * @var \Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOwner", referencedColumnName="id")
     * })
     */
    private $owner;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Story", mappedBy="project")
     */
    private $stories;
     
    public function __construct(){
        $this->stories=new ArrayCollection();
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescriptif() {
        return $this->descriptif;
    }

    public function getStartdate(): \DateTime {
        return $this->startdate;
    }

    public function getDuedate(): \DateTime {
        return $this->duedate;
    }

    public function getIdowner(): \Developer {
        return $this->owner;
    }

    public function getStories(): \Story {
        return $this->stories;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
    }

    public function setStartdate(\DateTime $startdate) {
        $this->startdate = $startdate;
    }

    public function setDuedate(\DateTime $duedate) {
        $this->duedate = $duedate;
    }

    public function setIdowner(\Developer $idowner) {
        $this->owner = $idowner;
    }

    public function setStories(\Story $stories) {
        $this->stories = $stories;
    }



}
