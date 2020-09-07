<?php

namespace App\Controller;

use App\Entity\Projects;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\{ProjectsRepository, InfoAdminRepository};

class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(ProjectsRepository $repoProject, InfoAdminRepository $repoAdmin)
    {
        $projects = $repoProject->findAll();
        $profile = $repoAdmin->find(12650);
        dump($profile);
        return $this->render('portfolio/home.html.twig', [
            'controller_name' => 'PortfolioController',
            'projects'  => $projects,
            'profile' => $profile
        ]);
    }
}
