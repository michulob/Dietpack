<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OneDayMenu
 *
 * @ORM\Table(name="one_day_menu")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\OneDayMenuRepository")
 */
class OneDayMenu
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
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Diet", inversedBy="one_day_menu")
     * @ORM\JoinColumn(name="diet_id", referencedColumnName="id")
     */
    
    private $diet;
    
    /**
     * @ORM\ManyToOne(targetEntity="Meal", inversedBy="one_day_menu")
     * @ORM\JoinColumn(name="first_breakfast", referencedColumnName="id")
     */
    private $firstBreakfast;
    
    /**
     * @ORM\ManyToOne(targetEntity="Meal", inversedBy="one_day_menu")
     * @ORM\JoinColumn(name="second_breakfast", referencedColumnName="id")
     */
    private $secondBreakfast;
    
    /**
     * @ORM\ManyToOne(targetEntity="Meal", inversedBy="one_day_menu")
     * @ORM\JoinColumn(name="dinner", referencedColumnName="id")
     */
    private $dinner;
    
    /**
     * @ORM\ManyToOne(targetEntity="Meal", inversedBy="one_day_menu")
     * @ORM\JoinColumn(name="tea_meal", referencedColumnName="id")
     */
    private $teaMeal;
    
    /**
     * @ORM\ManyToOne(targetEntity="Meal", inversedBy="OneDayMenu")
     * @ORM\JoinColumn(name="supper", referencedColumnName="id")
     */
    private $supper;


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
     * Set diet
     *
     * @param \DietpackBundle\Entity\Diet $diet
     * @return OneDayMenu
     */
    public function setDiet(\DietpackBundle\Entity\Diet $diet = null)
    {
        $this->diet = $diet;

        return $this;
    }

    /**
     * Get diet
     *
     * @return \DietpackBundle\Entity\Diet 
     */
    public function getDiet()
    {
        return $this->diet;
    }

    /**
     * Set firstBreakfast
     *
     * @param \DietpackBundle\Entity\Meal $firstBreakfast
     * @return OneDayMenu
     */
    public function setFirstBreakfast(\DietpackBundle\Entity\Meal $firstBreakfast = null)
    {
        $this->firstBreakfast = $firstBreakfast;

        return $this;
    }

    /**
     * Get firstBreakfast
     *
     * @return \DietpackBundle\Entity\Meal 
     */
    public function getFirstBreakfast()
    {
        return $this->firstBreakfast;
    }

    /**
     * Set secondBreakfast
     *
     * @param \DietpackBundle\Entity\Meal $secondBreakfast
     * @return OneDayMenu
     */
    public function setSecondBreakfast(\DietpackBundle\Entity\Meal $secondBreakfast = null)
    {
        $this->secondBreakfast = $secondBreakfast;

        return $this;
    }

    /**
     * Get secondBreakfast
     *
     * @return \DietpackBundle\Entity\Meal 
     */
    public function getSecondBreakfast()
    {
        return $this->secondBreakfast;
    }

    /**
     * Set dinner
     *
     * @param \DietpackBundle\Entity\Meal $dinner
     * @return OneDayMenu
     */
    public function setDinner(\DietpackBundle\Entity\Meal $dinner = null)
    {
        $this->dinner = $dinner;

        return $this;
    }

    /**
     * Get dinner
     *
     * @return \DietpackBundle\Entity\Meal 
     */
    public function getDinner()
    {
        return $this->dinner;
    }

    /**
     * Set teaMeal
     *
     * @param \DietpackBundle\Entity\Meal $teaMeal
     * @return OneDayMenu
     */
    public function setTeaMeal(\DietpackBundle\Entity\Meal $teaMeal = null)
    {
        $this->teaMeal = $teaMeal;

        return $this;
    }

    /**
     * Get teaMeal
     *
     * @return \DietpackBundle\Entity\Meal 
     */
    public function getTeaMeal()
    {
        return $this->teaMeal;
    }

    /**
     * Set supper
     *
     * @param \DietpackBundle\Entity\Meal $supper
     * @return OneDayMenu
     */
    public function setSupper(\DietpackBundle\Entity\Meal $supper = null)
    {
        $this->supper = $supper;

        return $this;
    }

    /**
     * Get supper
     *
     * @return \DietpackBundle\Entity\Meal 
     */
    public function getSupper()
    {
        return $this->supper;
    }
    
    public function __toString(){
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return OneDayMenu
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
}
