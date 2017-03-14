<?php

namespace DietpackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdditionalInfo
 *
 * @ORM\Table(name="additional_info")
 * @ORM\Entity(repositoryClass="DietpackBundle\Repository\AdditionalInfoRepository")
 */
class AdditionalInfo
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
     * @ORM\Column(name="fromDate", type="datetime")
     */
    private $fromDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="untilDate", type="datetime")
     */
    private $untilDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="expire", type="boolean")
     */
    private $expire;
    
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;
    
    /**
     * @ORM\ManyToOne(targetEntity="OneOrder", inversedBy="additional_info")
     * @ORM\JoinColumn(name="one_order_id", referencedColumnName="id")
     */
    private $oneOrder;


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
     * Set fromDate
     *
     * @param \DateTime $fromDate
     * @return AdditionalInfo
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * Get fromDate
     *
     * @return \DateTime 
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * Set untilDate
     *
     * @param \DateTime $untilDate
     * @return AdditionalInfo
     */
    public function setUntilDate($untilDate)
    {
        $this->untilDate = $untilDate;
        $this->setExpire();
        return $this;
    }

    /**
     * Get untilDate
     *
     * @return \DateTime 
     */
    public function getUntilDate()
    {
        return $this->untilDate;
    }

    /**
     * Set expire
     *
     * @param boolean $expire
     * @return AdditionalInfo
     */
    public function setExpire()
    {
        $now = new \DateTime();
        $now->getTimestamp();
        if($now <= $this->untilDate && $now >= $this->fromDate){
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
     * Set oneOrder
     *
     * @param \DietpackBundle\Entity\OneOrder $oneOrder
     * @return AdditionalInfo
     */
    public function setOneOrder(\DietpackBundle\Entity\OneOrder $oneOrder = null)
    {
        $this->oneOrder = $oneOrder;

        return $this;
    }

    /**
     * Get oneOrder
     *
     * @return \DietpackBundle\Entity\OneOrder 
     */
    public function getOneOrder()
    {
        return $this->oneOrder;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return AdditionalInfo
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }
    
    public function __toString(){
        return $this->text;
    }
}
