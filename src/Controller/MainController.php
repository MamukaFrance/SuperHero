<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Repository\HeroRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'main_home')]
    public function home(HeroRepository $heroRepository): Response
    {
        $hero = $heroRepository->find(2);
        return $this->render('main/home.html.twig', compact(['hero']));
    }
}
