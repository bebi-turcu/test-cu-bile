<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grouping
 *
 * @ORM\Table(name="grouping")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupingRepository")
 */
class Grouping
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
     * @ORM\Column(name="colours", type="string", length=16)
     */
    private $colours;

    /**
     * @var string
     *
     * @ORM\Column(name="distribution", type="string", length=255)
     */
    private $distribution;

    /**
     * @var array
     *
     * @ORM\Column(name="grouping", type="json_array")
     */
    private $grouping;


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
     * Set colours
     *
     * @param string $colours
     *
     * @return Grouping
     */
    public function setColours($colours)
    {
        $this->colours = $colours;

        return $this;
    }

    /**
     * Get colours
     *
     * @return string
     */
    public function getColours()
    {
        return $this->colours;
    }

    /**
     * Set distribution
     *
     * @param string $distribution
     *
     * @return Grouping
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get distribution
     *
     * @return string
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Set grouping
     *
     * @param array $grouping
     *
     * @return Grouping
     */
    public function setGrouping($grouping)
    {
        $this->grouping = $grouping;

        return $this;
    }

    /**
     * Get grouping
     *
     * @return array
     */
    public function getGrouping()
    {
        return $this->grouping;
    }
}

