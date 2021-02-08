<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 * @ORM\Entity()
 * @ORM\Table(name="score")
 */
class Score{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="scores")
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="scores")
     */
    private $game;

}