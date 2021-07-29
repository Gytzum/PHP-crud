<?php
namespace Models;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
class Employee
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
      /** 
     * @ORM\Column(type="string")
     */
    private $name;

      /**
     * Many employees have one project. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="employees")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $project;

    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getId() {
        return $this->id;
    }
    public function setProject($p) {
        $this->project = $p;
    }
    public function getProject() {
        return $this->project;
    }

}