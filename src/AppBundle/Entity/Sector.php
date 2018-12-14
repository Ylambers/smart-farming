<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sector
 *
 * @ORM\Table(name="sector")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SectorRepository")
 */
class Sector
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
     * @ORM\Column(name="sector_title", type="string", length=255)
     */
    private $sectorTitle;


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
     * Set sectorTitle
     *
     * @param string $sectorTitle
     *
     * @return Sector
     */
    public function setSectorTitle($sectorTitle)
    {
        $this->sectorTitle = $sectorTitle;

        return $this;
    }

    /**
     * Get sectorTitle
     *
     * @return string
     */
    public function getSectorTitle()
    {
        return $this->sectorTitle;
    }
}

