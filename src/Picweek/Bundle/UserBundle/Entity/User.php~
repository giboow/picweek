<?php
namespace Picweek\Bundle\UserBundle\Entity;

use Symfony\Tests\Component\Translation\String;

use Doctrine\ORM\Mapping\Column;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User entity
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Emplacement
     * @var String
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     * @ORM\GeneratedValue
     */
    protected $location;


    /**
     * @ORM\OneToMany(targetEntity="\Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment", mappedBy="place", cascade={"remove","persist"})
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="\Picweek\Bundle\MainBundle\Entity\Picnic\Place\Note", mappedBy="place", cascade={"remove","persist"})
     */
    private $notes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set location
     *
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }


    /**
     * Add comments
     *
     * @param Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment $comments
     */
    public function addComment(\Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add notes
     *
     * @param Picweek\Bundle\MainBundle\Entity\Picnic\Place\Note $notes
     */
    public function addNote(\Picweek\Bundle\MainBundle\Entity\Picnic\Place\Note $notes)
    {
        $this->notes[] = $notes;
    }

    /**
     * Get notes
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }
}