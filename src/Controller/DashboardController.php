<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectsRepository;
use App\Entity\Projects;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\{TextType, FileType};
use App\Form\ProjectsType;

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
     * @Route("/dashboard/edit/{id}", name="dashboard_edit")
     */
    public function add(Request $request, ObjectManager $manager, Projects $project = null)
    {
        if (!$project)
            $project = new Projects;
        $form  = $this->createForm(ProjectsType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) :
            $manager->persist($project);
            $manager->flush();
            return $this->redirectToRoute('dashboard');
        endif;
        return $this->render('dashboard/add.html.twig', [
            'formProject' => $form->createView(),
            'editMode' => $project->getId() !== null
        ]);
    }
}
