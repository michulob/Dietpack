<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diet
 *
 * @ORM\Table(name="diet")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\DietRepository")
 */
class Diet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="calorific", type="integer")
     */
    private $calorific;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;
    
    /**
     * @ORM\OneToMany(targetEntity="OneOrder", mappedBy="diet")
     */
    private $orders;
    
    /**
     * @ORM\ManyToOne(targetEntity="OneDayMenu", inversedBy="diet")
     * @ORM\JoinColumn(name="menu1", referencedColumnName="id")
     */
    private $menu1;
    
    /**
     * @ORM\ManyToOne(targetEntity="OneDayMenu", inversedBy="diet")
     * @ORM\JoinColumn(name="menu2", referencedColumnName="id")
     */
    private $menu2;
    
    /**
     * @ORM\ManyToOne(targetEntity="OneDayMenu", inversedBy="diet")
     * @ORM\JoinColumn(name="menu3", referencedColumnName="id")
     */
    private $menu3;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Diet
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set calorific
     *
     * @param integer $calorific
     * @return Diet
     */
    public function setCalorific($calorific)
    {
        $this->calorific = $calorific;

        return $this;
    }

    /**
     * Get calorific
     *
     * @return integer 
     */
    public function getCalorific()
    {
        return $this->calorific;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Diet
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add orders
     *
     * @param \DietpackBundle\Entity\OneOrder $orders
     * @return Diet
     */
    public function addOrder(\DietpackBundle\Entity\OneOrder $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \DietpackBundle\Entity\OneOrder $orders
     */
    public function removeOrder(\DietpackBundle\Entity\OneOrder $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
    
    public function __toString()
    {
        return $this->name.'  '.$this->calorific;
    }    


    /**
     * Set menu1
     *
     * @param \DietpackBundle\Entity\OneDayMenu $menu1
     * @return Diet
     */
    public function setMenu1(\DietpackBundle\Entity\OneDayMenu $menu1 = null)
    {
        $this->menu1 = $menu1;

        return $this;
    }

    /**
     * Get menu1
     *
     * @return \DietpackBundle\Entity\OneDayMenu 
     */
    public function getMenu1()
    {
        return $this->menu1;
    }

    /**
     * Set menu2
     *
     * @param \DietpackBundle\Entity\OneDayMenu $menu2
     * @return Diet
     */
    public function setMenu2(\DietpackBundle\Entity\OneDayMenu $menu2 = null)
    {
        $this->menu2 = $menu2;

        return $this;
    }

    /**
     * Get menu2
     *
     * @return \DietpackBundle\Entity\OneDayMenu 
     */
    public function getMenu2()
    {
        return $this->menu2;
    }

    /**
     * Set menu3
     *
     * @param \DietpackBundle\Entity\OneDayMenu $menu3
     * @return Diet
     */
    public function setMenu3(\DietpackBundle\Entity\OneDayMenu $menu3 = null)
    {
        $this->menu3 = $menu3;

        return $this;
    }

    /**
     * Get menu3
     *
     * @return \DietpackBundle\Entity\OneDayMenu 
     */
    public function getMenu3()
    {
        return $this->menu3;
    }
}
