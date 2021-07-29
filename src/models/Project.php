<?php 
    namespace Models;
    include_once "bootstrap.php";
    
    use Doctrine\ORM\Mapping as ORM;
    use Doctrine\Common\Collections\ArrayCollection;
    

/**
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project{
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
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="project" )
     */
    private $employees;

    public function __construct() {
       $this->employees = new ArrayCollection();
    } 

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    public function setEmployee($e) {
        $this->employees = $e;
    }
    public function getEmployee() {
        return $this->employees;
    }
    
}
  