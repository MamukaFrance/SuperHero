<?php

namespace App\Controller;

use App\Entity\Hero;
use App\Repository\HeroRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SuperHeroController extends AbstractController
{
    #[Route('/list', name: 'superHero_list')]
    public function list(HeroRepository $heroRepository): Response
    {
        $heros = $heroRepository->findAll();

        return $this->render('superHero/list.html.twig', [
            'heros' => $heros,
        ]);
    }

    #[Route('/tri/{param}', name: 'superHero_tri')]
    public function tri(string $param, HeroRepository $heroRepository): Response
    {
        $heros = match ($param) {
            'nom' => $heroRepository->sortByName(),
            'puissance' => $heroRepository->sortByPower(),
            default => $heroRepository->findAll(),
        };

        return $this->render('superHero/list.html.twig', [
            'heros' => $heros,
        ]);
    }

    #[Route('/list/{id}', name: 'superHero_detail', requirements: ['id' => '\d+'])]
    public function detail(Hero $hero): Response
    {
        return $this->render('superHero/detail.html.twig', [
            'hero' => $hero,
        ]);
    }

    #[Route('/favori/{id}', name: 'superHero_favori', requirements: ['id' => '\d+'])]
    public function favori(Hero $hero, HeroRepository $heroRepository, EntityManagerInterface $em): Response
    {
        $hero->setFavori(!$hero->isFavori());
        $em->flush();

        $heros = $heroRepository->findAll();

        return $this->render('superHero/list.html.twig', [
            'heros' => $heros,
        ]);
    }
}
