<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="welcome")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }

    /**
     * @Route(
     *     "/hello-page/{name}",
     *     name="hello_page",
     *     defaults={"name" = "CodeReviewVideos"},
     *     requirements={"name" = "[A-Za-z]+"}
     * )
     * @param $name
     * @return Response
     */
    public function hello($name): Response
    {
        return $this->render('hello_page.html.twig', [
            'controller_name' => 'WelcomeController',
            'name' => $name
        ]);
    }
}
