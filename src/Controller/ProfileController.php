<?php

namespace App\Controller;

use App\Entity\{Etude, Experiance, Langage, Softskill};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\InfoAdminRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\{HttpFoundation\Request, Routing\Annotation\Route};
use App\Form\{InfoAdminType, SoftskillType, EtudeType, ExperianceType, LangageType};

class ProfileController extends AbstractController
{
    /**
     * @Route("/dashboard/profile", name="dashboard_profile")
     */
    public function index(InfoAdminRepository $repo, ObjectManager $manager, Request $request)
    {
        /////modif profile
        $profile = $repo->find(12651);
        $formProfile = $this->createForm(InfoAdminType::class, $profile);
        $formProfile->handleRequest($request);
        if ($formProfile->isSubmitted() and $formProfile->isValid()) :
            $manager->persist($profile);
            $manager->flush();
            return $this->redirectToRoute('dashboard_profile');
        endif;
        ////form soft 
        $soft = new Softskill;
        $formSoft = $this->createForm(SoftskillType::class, $soft);
        $formSoft->handleRequest($request);
        if ($formSoft->isSubmitted() and $formSoft->isValid()) :
            $manager->persist($soft);
            $manager->flush();
            $this->addFlash('success profile', 'Profile modifier avec succée');
            return $this->redirectToRoute('dashboard_profile');
        endif;
        ////form Etudes 
        $etude = new Etude;
        $formEtude = $this->createForm(EtudeType::class, $etude);
        $formEtude->handleRequest($request);
        if ($formEtude->isSubmitted() and $formEtude->isValid()) :
            $manager->persist($etude);
            $manager->flush();
            $this->addFlash('success profile', 'Profile modifier avec succée');
            return $this->redirectToRoute('dashboard_profile');
        endif;
        ////form Experiance 
        $experiance = new Experiance;
        $formExperiance = $this->createForm(ExperianceType::class, $experiance);
        $formExperiance->handleRequest($request);
        if ($formExperiance->isSubmitted() and $formExperiance->isValid()) :
            $manager->persist($experiance);
            $manager->flush();
            $this->addFlash('success profile', 'Profile modifier avec succée');
            return $this->redirectToRoute('dashboard_profile');
        endif;
        ////form langages 
        $lang = new Langage;
        $formLangage = $this->createForm(LangageType::class, $lang);
        $formLangage->handleRequest($request);
        if ($formLangage->isSubmitted() and $formLangage->isValid()) :
            $manager->persist($lang);
            $manager->flush();
            $this->addFlash('success profile', 'Profile modifier avec succée');
            return $this->redirectToRoute('dashboard_profile');
        endif;
        ////return View
        return $this->render('dashboard/profile.html.twig', [
            'formProfile' => $formProfile->createView(),
            'formSoft' => $formSoft->createView(),
            'formEtude' => $formEtude->createView(),
            'formExperiance' => $formExperiance->createView(),
            'formLangage' => $formLangage->createView(),
            'profile' => $profile
        ]);
    }
    /**
     * @Route("/profile/softskill/{id}",name="soft_delete",methods="DELETE")
     */
    public function deletesoft(ObjectManager $manager, Softskill $soft, Request $request)
    {
        if ($this->isCsrfTokenValid('deletesoft' . $soft->getId(), $request->get('_token'))) {
            $manager->remove($soft);
        }

        $manager->flush();
        $this->addFlash('success delet', 'element supprimé avec succès');
        return $this->redirectToRoute('dashboard_profile');
    }
    /**
     * @Route("/profile/etude/{id}",name="etude_delete",methods="DELETE")
     */
    public function deleteetude(ObjectManager $manager, Etude $etude, Request $request)
    {

        if ($this->isCsrfTokenValid('deletetude' . $etude->getId(), $request->get('_token'))) {
            $manager->remove($etude);
        }
        $manager->flush();
        $this->addFlash('success delet', 'element supprimé avec succès');
        return $this->redirectToRoute('dashboard_profile');
    }
    /**
     * @Route("/profile/experiance/{id}",name="experiance_delete",methods="DELETE")
     */
    public function deleteexperiance(ObjectManager $manager, Experiance $exp, Request $request)
    {

        if ($this->isCsrfTokenValid('deletexperiance' . $exp->getId(), $request->get('_token'))) {
            $manager->remove($exp);
        }
        $manager->flush();
        $this->addFlash('success delet', 'element supprimé avec succès');
        return $this->redirectToRoute('dashboard_profile');
    }
    /**
     * @Route("/profile/langage/{id}",name="langage_delete",methods="DELETE")
     */
    public function deletelangage(ObjectManager $manager, Langage $lng, Request $request)
    {

        if ($this->isCsrfTokenValid('deletelangage' . $lng->getId(), $request->get('_token'))) {
            $manager->remove($lng);
        }
        $manager->flush();
        $this->addFlash('success delet', 'element supprimé avec succès');
        return $this->redirectToRoute('dashboard_profile');
    }
}
