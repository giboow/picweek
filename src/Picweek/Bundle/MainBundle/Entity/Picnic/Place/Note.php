<?php

namespace Picweek\Bundle\MainBundle\Entity\Picnic\Place;

use Doctrine\ORM\Mapping\ManyToOne;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var integer note
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="\Picweek\Bundle\MainBundle\Entity\Picnic\Place", inversedBy="notes", cascade={"remove"})
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     */
    private $place;

    /**
     * @ORM\ManyToOne(targetEntity="\Picweek\Bundle\UserBundle\Entity\User", inversedBy="comments", cascade={"remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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
     * Set place
     *
     * @param Picweek\Bundle\MainBundle\Entity\Picnic\Place $place
     */
    public function setPlace(\Picweek\Bundle\MainBundle\Entity\Picnic\Place $place)
    {
        $this->place = $place;
    }

    /**
     * Get place
     *
     * @return Picweek\Bundle\MainBundle\Entity\Picnic\Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set note
     *
     * @param integer $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set user
     *
     * @param Picweek\Bundle\UserBundle\Entity\User $user
     */
    public function setUser(\Picweek\Bundle\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return Picweek\Bundle\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}