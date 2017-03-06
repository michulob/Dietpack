<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingredient
 *
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\IngredientRepository")
 */
class Ingredient
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
     * @ORM\Column(name="name", type="string", length=64, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="calorificPer100", type="integer")
     */
    private $calorificPer100;
    
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="ingredient")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;
    

    /**
     * @ORM\ManyToMany(targetEntity="Meal", mappedBy="ingredients")
     */
    private $meals;


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
     * @return Ingredient
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
     * Set calorificPer100
     *
     * @param integer $calorificPer100
     * @return Ingredient
     */
    public function setCalorificPer100($calorificPer100)
    {
        $this->calorificPer100 = $calorificPer100;

        return $this;
    }

    /**
     * Get calorificPer100
     *
     * @return integer 
     */
    public function getCalorificPer100()
    {
        return $this->calorificPer100;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->meals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set category
     *
     * @param \DietpackBundle\Entity\Category $category
     * @return Ingredient
     */
    public function setCategory(\DietpackBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \DietpackBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add meals
     *
     * @param \DietpackBundle\Entity\Meal $meals
     * @return Ingredient
     */
    public function addMeal(\DietpackBundle\Entity\Meal $meals)
    {
        $this->meals[] = $meals;

        return $this;
    }

    /**
     * Remove meals
     *
     * @param \DietpackBundle\Entity\Meal $meals
     */
    public function removeMeal(\DietpackBundle\Entity\Meal $meals)
    {
        $this->meals->removeElement($meals);
    }

    /**
     * Get meals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMeals()
    {
        return $this->meals;
    }
    
    public function __toString(){
        return $this->name.'['.$this->calorificPer100.' kcal/100g]';
    }
}
