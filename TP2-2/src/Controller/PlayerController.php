<?php
namespace App\Controller;


use App\FakeData;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Player;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayerController extends AbstractController
{

    #[Route("/player",name:"player_page")]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Player::class);
        $players = $repository->findAll();
        return $this->render("player/index.html.twig", ["players" => $players]);

    }

    #[Route("/player/add",name:"player_add")]
    public function add($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $player = new Player();

        if ($request->getMethod() == Request::METHOD_POST) {
            $player->setEmail($request->get('email'));
            $player->setUsername($request->get('username'));

            $entityManager->persist($player);
            $entityManager->flush();

            return $this->redirectTo("/player");
        }
        return $this->render("player/form.html.twig", ["player" => $player]);
    }

    #[Route("/player/show/{id}",name:"player_show")]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $repository = $entityManager->getRepository(Player::class);
        $player = $repository->find($id);
        return $this->render("player/show.html.twig", ["player" => $player, "availableGames" => FakeData::games()]);
    }

    #[Route("/player/edit/{id}",name:"player_edit")]
    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Player::class);
        $player  = $repository->find($id);

        if ($request->getMethod() == Request::METHOD_POST) {
            $player->setUsername($request->request->get('username'));
            $player->setEmail($request->request->get('email'));
            $entityManager->persist($player);
            $entityManager->flush();
            return $this->redirectTo("/player");
        }
        return $this->render("player/form.html.twig", ["player" => $player]);


    }

    #[Route("/player/delete/{id}",name:"player_delete")]
    public function delete($request, EntityManagerInterface $entityManager, $id): Response
    {

        $repository = $entityManager->getRepository(Player::class);
        $player = $repository->find($id);
        $entityManager->remove($player);
        $entityManager->flush();

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
