<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Delivery
 *
 * @ORM\Table(name="delivery")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\DeliveryRepository")
 */
class Delivery
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
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=255)
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=32)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="diet", type="string", length=64)
     */
    private $diet;

    /**
     * @var string
     *
     * @ORM\Column(name="meal", type="string", length=64)
     */
    private $meal;


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
     * Set time
     *
     * @param \DateTime $time
     * @return Delivery
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Delivery
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return Delivery
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Delivery
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Delivery
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set diet
     *
     * @param string $diet
     * @return Delivery
     */
    public function setDiet($diet)
    {
        $this->diet = $diet;

        return $this;
    }

    /**
     * Get diet
     *
     * @return string 
     */
    public function getDiet()
    {
        return $this->diet;
    }

    /**
     * Set meal
     *
     * @param string $meal
     * @return Delivery
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;

        return $this;
    }

    /**
     * Get meal
     *
     * @return string 
     */
    public function getMeal()
    {
        return $this->meal;
    }
}
