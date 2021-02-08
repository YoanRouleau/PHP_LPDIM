<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 * @ORM\Entity()
 * @ORM\Table(name="player")
 */
class Player{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="Game", mappedBy="ownedBy")
     */
    private $ownedGames;

    /**
     * @ORM\OneToMany(targetEntity="Score", mappedBy="player")
     */
    private $scores;

}