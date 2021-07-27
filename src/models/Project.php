<?php 

    include_once "bootstrap.php";
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
     * @ORM\Column(type="string") 
     */
    protected $name;

    /** 
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="project")
     */
    private $employees;

    public function __construct() {
       $this->employees = new ArrayCollection();
    } 

    public function getProjectName()
    {
        return $this->name;
    }
    
    public function setProjectName($name)
    {
        $this->name = $name;
    }

}
  