<?php 

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="project")
     */
    private $employee;

    public function __construct() {
        $this->employee = new ArrayCollection();
    }
}
  