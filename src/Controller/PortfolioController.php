<?php

namespace App\Controller;

use App\Entity\Projects;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectsRepository;

class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(ProjectsRepository $repo)
    {
        $projects = $repo->findAll();
        return $this->render('portfolio/home.html.twig', [
            'controller_name' => 'PortfolioController',
            'projects'  => $projects
        ]);
    }
}
