<?php

namespace App\Controller;


use App\Entity\Game;
use App\FakeData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route("/game",name:"game_page")]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $games = $entityManager
            ->getRepository(Game::class)
            ->findAll();
        return $this->render("game/index.html.twig", ["games" => $games]);

    }

    #[Route("/game/add",name:"game_add")]
    public function add(Request $request, EntityManagerInterface $entityManager, $id): Response
    {
        $game = new Game();

        if ($request->getMethod() == Request::METHOD_POST) {

            $game->setName($request->get('name'));
            $game->setImage($request->get('image'));

            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectTo("/game");
        }
        return $this->render("game/form.html.twig", ["game" => $game]);
    }

    #[Route("/game/show/{id}",name:"game_show")]
    public function show(EntityManagerInterface $entityManager, $id): Response
    {
        $game = $entityManager
            ->getRepository(Game::class)
            ->find($id);
        return $this->render("game/show.html.twig", ["game" => $game]);
    }

    #[Route("/game/edit/{id}",name:"game_edit")]
    public function edit($id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = $entityManager->getRepository(Game::class)->find($id);

        if ($request->getMethod() == Request::METHOD_POST) {
            $game->setName($request->request->get('name'));
            $game->setImage($request->request->get('image'));
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->redirectTo("/game");
        }
        return $this->render("game/form.html.twig", ["game" => $game]);

    }

    #[Route("/game/delete/{id}",name:"game_delete")]
    public function delete($id, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Game::class);
        $game = $repository->find($id);
        $entityManager->remove($game);
        $entityManager->flush();
        return $this->redirectTo("/game");
    }

}