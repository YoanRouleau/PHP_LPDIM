<?php
namespace App\Controller;


use App\FakeData;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Player;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends AbstractController
{


    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        /**
         * @todo lister les joueurs
         */
        $repository = $entityManager->getRepository(Player::class);
        $players = $repository->findAll();
        return $this->render("player/index", ["players" => $players]);

    }

    public function add(Request $request): Response
    {
        $player = FakeData::players(1)[0];

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/player");
        }
        return $this->render("player/form", ["player" => $player]);
    }


    public function show($id): Response
    {
        $player = FakeData::players(1)[0];
        return $this->render("player/show", ["player" => $player, "availableGames" => FakeData::games()]);
    }


    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Player::class);
        $player  = $repository->find($id);

        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/player");
        }
        return $this->render("player/form", ["player" => $player]);


    }

    public function delete($id): Response
    {
        /**
         * @todo supprimer l'objet
         */
        return $this->redirectTo("/player");

    }

    public function addgame($id, Request $request): Response
    {
        if ($request->getMethod() == Request::METHOD_POST) {
            /**
             * @todo enregistrer l'objet
             */
            return $this->redirectTo("/player");
        }
    }

}
