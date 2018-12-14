<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ranking
 *
 * @ORM\Table(name="ranking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RankingRepository")
 */
class Ranking
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="upvote_amount", type="integer", nullable=true)
     */
    private $upvoteAmount;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Ranking
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ranking
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set upvoteAmount
     *
     * @param integer $upvoteAmount
     *
     * @return Ranking
     */
    public function setUpvoteAmount($upvoteAmount)
    {
        $this->upvoteAmount = $upvoteAmount;

        return $this;
    }

    /**
     * Get upvoteAmount
     *
     * @return int
     */
    public function getUpvoteAmount()
    {
        return $this->upvoteAmount;
    }
}

