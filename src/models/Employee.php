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
     * Many features have one product. This is the owning side.
     * @ManyToOne(targetEntity="Project", inversedBy="employees")
     * @JoinColumn(name="employee_id", referencedColumnName="id")
     */
    private $project;

    // public function getName()
    // {
    //     return $this->name;
    // }
}