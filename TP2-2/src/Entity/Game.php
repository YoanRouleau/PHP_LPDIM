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

}