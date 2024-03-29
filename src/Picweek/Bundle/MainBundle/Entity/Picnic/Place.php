<?php

namespace Picweek\Bundle\MainBundle\Entity\Picnic;

use Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picweek\Bundle\MainBundle\Entity\Picnic\Place
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Picweek\Bundle\MainBundle\Entity\Picnic\PlaceRepository")
 */
class Place
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $address
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var float $latitude
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float $longitude
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var text $info
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @var boolean $parking
     *
     * @ORM\Column(name="parking", type="boolean")
     */
    private $parking;

    /**
     * @var boolean $toilets
     *
     * @ORM\Column(name="toilets", type="boolean")
     */
    private $toilets;

    /**
     * @var boolean $tables
     *
     * @ORM\Column(name="tables", type="boolean")
     */
    private $tables;

    /**
     * @var boolean $games
     *
     * @ORM\Column(name="games", type="boolean")
     */
    private $games;

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
     *
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set address
     *
     * @param text $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return text
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set info
     *
     * @param text $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * Get info
     *
     * @return text
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set parking
     *
     * @param boolean $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }

    /**
     * Get parking
     *
     * @return boolean
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set toilets
     *
     * @param boolean $toilets
     */
    public function setToilets($toilets)
    {
        $this->toilets = $toilets;
    }

    /**
     * Get toilets
     *
     * @return boolean
     */
    public function getToilets()
    {
        return $this->toilets;
    }

    /**
     * Set tables
     *
     * @param boolean $tables
     */
    public function setTables($tables)
    {
        $this->tables = $tables;
    }

    /**
     * Get tables
     *
     * @return boolean
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Set games
     *
     * @param boolean $games
     */
    public function setGames($games)
    {
        $this->games = $games;
    }

    /**
     * Get games
     *
     * @return boolean
     */
    public function getGames()
    {
        return $this->games;
    }


    /**
     * Add comments
     *
     * @param Picweek\Bundle\MainBundle\Entity\Picnic\Place\Comment $comments
     */
    public function addComment(Comment $comments)
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
     * Set comments
     *
     * @param \Doctrine\Common\Collections\Collection $comments
     */
    public function setComments(\Doctrine\Common\Collections\Collection $comments)
    {
        $this->comments = $comments;
    }

    /**
     * Convert to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
