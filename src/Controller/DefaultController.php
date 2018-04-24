<?php

namespace App\Controller;

use App\Entity\MenuLabel;
use App\Entity\MenuItem;
use App\Form\MenuLabelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        $menuLabels = $this->getDoctrine()
                ->getRepository(MenuLabel::class)
                ->findAll();
        return $this->render('menu_label/index.html.twig', [
                    'menu_labels' => $menuLabels
        ]);
    }

    /**
     * @Route("/new", name="menu_label_new", methods="GET|POST")
     */
    public function newAction(Request $request) {
        $menuLabel = new MenuLabel();
        $form = $this->createForm(MenuLabelType::class, $menuLabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menuLabel);
            $em->flush();

            return $this->redirectToRoute('menu_label_index');
        }

        return $this->render('menu_label/new.html.twig', [
                    'menu_label' => $menuLabel,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_label_show", methods="GET")
     */
    public function showAction(MenuLabel $menuLabel) {
        return $this->render('menu_label/show.html.twig', ['menu_label' => $menuLabel]);
    }

    /**
     * @Route("/{id}/edit", name="menu_label_edit", methods="GET|POST")
     */
    public function editAction(Request $request, MenuLabel $menuLabel): Response {
        $form = $this->createForm(MenuLabelType::class, $menuLabel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('menu_label_edit', ['id' => $menuLabel->getId()]);
        }

        return $this->render('menu_label/edit.html.twig', [
                    'menu_label' => $menuLabel,
                    'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="menu_label_delete", methods="DELETE")
     */
    public function deleteAction(Request $request, MenuLabel $menuLabel): Response {
        if ($this->isCsrfTokenValid('delete' . $menuLabel->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menuLabel);
            $em->flush();
        }

        return $this->redirectToRoute('menu_label_index');
    }

}
