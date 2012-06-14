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
class Comment
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
     * @var text $comment
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var integer $score
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="\Picweek\Bundle\MainBundle\Entity\Picnic\Place", inversedBy="comments", cascade={"remove"})
     * @ORM\JoinColumn(name="desk_id", referencedColumnName="id")
     */
    private $place;

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
     * Set comment
     *
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return text
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set score
     *
     * @param integer $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
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
}