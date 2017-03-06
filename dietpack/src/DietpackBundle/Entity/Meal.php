<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meal
 *
 * @ORM\Table(name="meal")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\MealRepository")
 */
class Meal
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
     * @ORM\Column(name="calorific", type="integer")
     */
    private $calorific;
    
    /**
     * @ORM\OneToMany(targetEntity="OneDayMenu", mappedBy="meal")
     */
    private $menu;
    
    /**
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="meals")
     * @ORM\JoinTable(name="ingredients_meals")
     */
    private $ingredients;


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
     * @return Meal
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
     * @return Meal
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
     * Constructor
     */
    public function __construct()
    {
        $this->menu = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add menu
     *
     * @param \DietpackBundle\Entity\OneDayMenu $menu
     * @return Meal
     */
    public function addMenu(\DietpackBundle\Entity\OneDayMenu $menu)
    {
        $this->menu[] = $menu;

        return $this;
    }

    /**
     * Remove menu
     *
     * @param \DietpackBundle\Entity\OneDayMenu $menu
     */
    public function removeMenu(\DietpackBundle\Entity\OneDayMenu $menu)
    {
        $this->menu->removeElement($menu);
    }

    /**
     * Get menu
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Add ingredients
     *
     * @param \DietpackBundle\Entity\Ingredient $ingredients
     * @return Meal
     */
    public function addIngredient(\DietpackBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients[] = $ingredients;

        return $this;
    }

    /**
     * Remove ingredients
     *
     * @param \DietpackBundle\Entity\Ingredient $ingredients
     */
    public function removeIngredient(\DietpackBundle\Entity\Ingredient $ingredients)
    {
        $this->ingredients->removeElement($ingredients);
    }

    /**
     * Get ingredients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }
    
    public function __toString()
    {
        return $this->name.'  '.$this->calorific;
    }
}
