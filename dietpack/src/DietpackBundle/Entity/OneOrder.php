<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OneOrder
 *
 * @ORM\Table(name="one_order")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\OneOrderRepository")
 */
class OneOrder
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
     * @ORM\Column(name="start", type="date")
     */
    private $start;
    
    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finish", type="date")
     */
    private $finish;

    /**
     * @var bool
     *
     * @ORM\Column(name="expire", type="boolean")
     */
    private $expire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeDelivery", type="time")
     */
    private $timeDelivery;
    
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="one_order")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    
    /**
     * @ORM\OneToMany(targetEntity="AdditionalInfo", mappedBy="oneOrder")
     */
    private $additionalInfo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Diet", inversedBy="one_order" )
     * @ORM\JoinColumn(name="diet_id", referencedColumnName="id", nullable=false)
     */
    private $diet;


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
     * Set start
     *
     * @param \DateTime $start
     * @return OneOrder
     */
    public function setStart($start)
    {
        if($this->start == null){
            $this->start = $start;
        }else{
            $this->start = $start;
            $this->setFinish();
            $this->setExpire();
        }

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set finish
     * @return OneOrder
     */
    public function setFinish()
    {
        $date = new \DateTime();
        $date->setDate($this->start->format('Y'),$this->start->format('m'), $this->start->format('d'));
        $date->add(new \DateInterval('P'.($this->duration-1).'D'));
        $date->format('Y-m-d');
        $this->finish = $date;

        return $this;
    }

    /**
     * Get finish
     *
     * @return \DateTime 
     */
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set expire
     *
     * @param boolean $expire
     * @return OneOrder
     */
    public function setExpire()
    {
        $now = new \DateTime();
        $now->getTimestamp();
        if($this->start <= $now && $this->finish >= $now){
            $this->expire = 1;
        }else{
            $this->expire = 0;
        }

        return $this;
    }

    /**
     * Get expire
     *
     * @return boolean 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set timeDelivery
     *
     * @param \DateTime $timeDelivery
     * @return OneOrder
     */
    public function setTimeDelivery($timeDelivery)
    {
        $this->timeDelivery = $timeDelivery;

        return $this;
    }

    /**
     * Get timeDelivery
     *
     * @return \DateTime 
     */
    public function getTimeDelivery()
    {
        return $this->timeDelivery;
    }

    /**
     * Set client
     *
     * @param \DietpackBundle\Entity\Client $client
     * @return OneOrder
     */
    public function setClient(\DietpackBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \DietpackBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->additionalInfo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add additionalInfo
     *
     * @param \DietpackBundle\Entity\AdditionalInfo $additionalInfo
     * @return OneOrder
     */
    public function addAdditionalInfo(\DietpackBundle\Entity\AdditionalInfo $additionalInfo)
    {
        $this->additionalInfo[] = $additionalInfo;

        return $this;
    }

    /**
     * Remove additionalInfo
     *
     * @param \DietpackBundle\Entity\AdditionalInfo $additionalInfo
     */
    public function removeAdditionalInfo(\DietpackBundle\Entity\AdditionalInfo $additionalInfo)
    {
        $this->additionalInfo->removeElement($additionalInfo);
    }

    /**
     * Get additionalInfo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * Set diet
     *
     * @param \DietpackBundle\Entity\Diet $diet
     * @return OneOrder
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
     * Set duration
     *
     * @param integer $duration
     * @return OneOrder
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        $this->setFinish();
        $this->setExpire();

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }
    
    public function __toString() {
        return $this->start->format('Y-m-d').' ||| '.$this->client.'  '.$this->diet;
    }
}
