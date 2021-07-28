<?php
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
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="projects")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    public function getEmployeeName()
    {
        return $this->name;
    }

    public function setEmployeeName()
    {
        return $this->name;
    }
}