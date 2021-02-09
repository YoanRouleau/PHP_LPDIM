<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Game
 * @ORM\Entity()
 * @ORM\Table(name="game")
 */
class Game{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     * @ORM\GeneratedValue()
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="Player", inversedBy="ownedGames")
     */
    private $ownedBy;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="game")
     */
    private $scores;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * @param mixed $ownedBy
     */
    public function setOwnedBy($ownedBy): void
    {
        $this->ownedBy = $ownedBy;
    }

    /**
     * @return mixed
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * @param mixed $scores
     */
    public function setScores($scores): void
    {
        $this->scores = $scores;
    }

}