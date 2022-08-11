<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployeType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/entreprise", name="app_entreprise")
     * @Route("/", name="app_entreprise")
     */
    public function index(EmployesRepository $repo): Response
    {

        $employes = $repo->findAll();

        return $this->render('entreprise/index.html.twig', [
            'tabEmployes' => $employes
        ]);
    }

    /**
     * @Route("/entreprise/new", name="entreprise_create")
     * @Route("/entreprise/edit/{id}", name="entreprise_edit")
     */
    public function form(Request $superGlobals, EntityManagerInterface $manager, Employes $employe = null)
    {
        if (!$employe) {
            $employe = new Employes;
            $messageForm = "L'employé a été crée !";
        } else {
            $messageForm = "L'employe n° ".$employe->getId()." a été modifié !";
              }

        $form = $this->createForm(EmployeType::class, $employe);

        $form->handleRequest($superGlobals);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($employe);
            $manager->flush();
            $this->addFlash('success', $messageForm);
            return $this->redirectToRoute('app_entreprise', [
                'id' => $employe->getId()
            ]);
        }

        return $this->renderForm("entreprise/form.html.twig", [
            'formEmploye' => $form,
            'editMode' => $employe->getId() !== NULL
        ]);
    }

    /**
     * @Route("/entreprise/delete/{id}", name="entreprise_delete")
     */
    public function delete(EntityManagerInterface $manager, $id, EmployesRepository $repo)
    {
        $employe = $repo->find($id);

        $manager->remove($employe);

        $manager->flush();

        $this->addFlash('success', "L'employé n° $id a été supprimé !");

        return $this->redirectToRoute('app_entreprise');
    }
}