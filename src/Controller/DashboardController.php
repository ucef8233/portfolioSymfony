<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectsRepository;
use App\Entity\Projects;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\{TextType, FileType};

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(ProjectsRepository $repo)
    {
        $projects = $repo->findAll();
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'projects'  => $projects
        ]);
    }
    /**
     * @Route("/dashboard/add", name="dashboard_add")
     */
    public function add(Request $request)
    {
        $project = new Projects;
        $form  = $this->createFormBuilder($project)
            ->add('nom')
            ->add('lien', TextType::class)
            ->add('image', FileType::class)
            ->add('description')
            ->getForm();

        $form->handleRequest($request);
        dump($project);
        return $this->render('dashboard/add.html.twig', [
            'formProject' => $form->createView()
        ]);
    }
}
