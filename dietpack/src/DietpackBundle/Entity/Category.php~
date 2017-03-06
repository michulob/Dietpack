<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Ingredient", mappedBy="category")
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
     * @return Category
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
     * Constructor
     */
    public function __construct()
    {
        $this->ingredients = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ingredients
     *
     * @param \DietpackBundle\Entity\Ingredient $ingredients
     * @return Category
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
    
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
    }
}
