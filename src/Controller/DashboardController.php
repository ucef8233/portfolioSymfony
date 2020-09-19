<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProjectsRepository;
use App\Entity\Projects;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\{HttpFoundation\Request, Routing\Annotation\Route};
use App\Form\ProjectsType;
use Knp\Component\Pager\PaginatorInterface;

class DashboardController extends AbstractController
{

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(ProjectsRepository $repo, PaginatorInterface $pagin, Request $request)
    {
        $contenu = $repo->findAll();
        $projects = $pagin->paginate($contenu, $request->query->getInt('page', 1), 3);
        return $this->render('dashboard/index.html.twig', [
            'projects'  => $projects
        ]);
    }
    /**
     * @Route("/dashboard/add", name="dashboard_add")
     * @Route("/dashboard/edit/{id}", name="dashboard_edit",methods="GET|PUT")
     */
    public function projectForms(Request $request, ObjectManager $manager, Projects $project = null)
    {
        if (!$project) {
            $project = new Projects;
            $project->setCreatedAt(new \DateTime());
        }
        $form  = $this->createForm(ProjectsType::class, $project, ['method' => 'PUT']);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) :
            $project->setUpdatedAt(new \DateTime());
            $manager->persist($project);
            $manager->flush();
            $this->addFlash('success', 'liste des project modifier avec succée');
            return $this->redirectToRoute('dashboard');
        endif;
        return $this->render('dashboard/projectForms.html.twig', [
            'formProject' => $form->createView(),
            'editMode' => $project->getId() !== null
        ]);
    }
    /**
     * @Route("/dashboard/delete/{id}",name="dashboard_delete",methods="DELETE")
     */
    public function deleteForm(ObjectManager $manager, Projects $project, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $project->getId(), $request->get('_token'))) {
            $manager->remove($project);
            $manager->flush();
            $this->addFlash('success', 'project supprimé avec succès');
        }
        return $this->redirectToRoute('dashboard');
        // dd($project->getId(), $request->get('_token'));
    }




















    // /**
    //  * @Route("/dashboard/profile",name="dashboard_profile")
    //  */
    // public function profile(Request $request, ObjectManager $manager, InfoAdminRepository $repo, SoftskillRepository $soft)
    // { /// infoAdminForm
    //     $profile = $repo->find(12650); /// a modifier
    //     $formProfile = $this->createForm(AdminType::class, $profile);
    //     $formProfile->handleRequest($request);
    //     if ($formProfile->isSubmitted() and $formProfile->isValid()) :
    //         $manager->persist($profile);
    //         $manager->flush();
    //         return $this->redirectToRoute('dashboard_profile');
    //     endif;
    //     //// Softskillls 
    //     // $soft = new Softskill;
    //     // $formSoftskills = $this->createForm(SoftskillType::class, $soft);
    //     // $formSoftskills->handleRequest($request);
    //     // if ($formSoftskills->isSubmitted() and $formSoftskills->isValid()) :
    //     //     $manager->persist($soft);
    //     //     $manager->flush();
    //     //     return $this->redirectToRoute('dashboard_profile');
    //     // endif;
    //     return $this->render('dashboard/profile.html.twig', [
    //         'formProfile' => $formProfile->createView(),
    //         // 'formSoftskills' => $formSoftskills->createView(),
    //         'profile' => $profile
    //     ]);
    // }
}
