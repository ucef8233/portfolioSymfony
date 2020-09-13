<?php

namespace App\Controller;

// use App\Entity\Projects;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\{ProjectsRepository, InfoAdminRepository};
// use Knp\Bundle\PaginatorBundle\KnpPaginatorBundle;

class PortfolioController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(ProjectsRepository $repoProject, InfoAdminRepository $repoAdmin)
    {
        return $this->render('portfolio/home.html.twig', [
            'projects'  => $repoProject->findAll(),
            'profile' => $repoAdmin->find(12651)
        ]);
    }
}
