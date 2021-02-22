<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;
use \Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

abstract class AbstractController
{

    private ?RouterInterface $router;

    /**
     * @return RouterInterface|null
     */
    public function getRouter(): ?RouterInterface
    {
        return $this->router;
    }

    /**
     * @param RouterInterface|null $router
     */
    public function setRouter(?RouterInterface $router): void
    {
        $this->router = $router;
    }

    public function render($templateName, $data = []): Response
    {
        $loader = new FilesystemLoader(__DIR__ . "/../../templates");
        $twig = new Environment($loader, [
            'cache' => __DIR__ . "/../../var/cache/",
            'debug' => true,
        ]);

        $path = new TwigFunction('path', function ($route, $routeParams=[]) {
            return $this->getRouter()->generate($route, $routeParams);
        });

        $twig->addFunction($path);

        return new Response($twig->render($templateName, $data));
    }
    public function redirectTo($path):Response{
        return new RedirectResponse($path);
    }
}