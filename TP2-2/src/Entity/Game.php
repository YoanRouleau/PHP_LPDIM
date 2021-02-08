<?php

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

}