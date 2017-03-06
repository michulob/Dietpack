<?php

namespace DietpackBundle\Controller;

use DietpackBundle\Entity\OneDayMenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Onedaymenu controller.
 *
 * @Route("onedaymenu")
 */
class OneDayMenuController extends Controller
{
    /**
     * Lists all oneDayMenu entities.
     *
     * @Route("/", name="onedaymenu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $oneDayMenus = $em->getRepository('DietpackBundle:OneDayMenu')->findAll();

        return $this->render('onedaymenu/index.html.twig', array(
            'oneDayMenus' => $oneDayMenus,
        ));
    }

    /**
     * Creates a new oneDayMenu entity.
     *
     * @Route("/new", name="onedaymenu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $oneDayMenu = new Onedaymenu();
        $form = $this->createForm('DietpackBundle\Form\OneDayMenuType', $oneDayMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($oneDayMenu);
            $em->flush($oneDayMenu);

            return $this->redirectToRoute('onedaymenu_show', array('id' => $oneDayMenu->getId()));
        }

        return $this->render('onedaymenu/new.html.twig', array(
            'oneDayMenu' => $oneDayMenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a oneDayMenu entity.
     *
     * @Route("/{id}", name="onedaymenu_show")
     * @Method("GET")
     */
    public function showAction(OneDayMenu $oneDayMenu)
    {
        $deleteForm = $this->createDeleteForm($oneDayMenu);

        return $this->render('onedaymenu/show.html.twig', array(
            'oneDayMenu' => $oneDayMenu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing oneDayMenu entity.
     *
     * @Route("/{id}/edit", name="onedaymenu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OneDayMenu $oneDayMenu)
    {
        $deleteForm = $this->createDeleteForm($oneDayMenu);
        $editForm = $this->createForm('DietpackBundle\Form\OneDayMenuType', $oneDayMenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('onedaymenu_edit', array('id' => $oneDayMenu->getId()));
        }

        return $this->render('onedaymenu/edit.html.twig', array(
            'oneDayMenu' => $oneDayMenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a oneDayMenu entity.
     *
     * @Route("/{id}", name="onedaymenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OneDayMenu $oneDayMenu)
    {
        $form = $this->createDeleteForm($oneDayMenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($oneDayMenu);
            $em->flush($oneDayMenu);
        }

        return $this->redirectToRoute('onedaymenu_index');
    }

    /**
     * Creates a form to delete a oneDayMenu entity.
     *
     * @param OneDayMenu $oneDayMenu The oneDayMenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OneDayMenu $oneDayMenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('onedaymenu_delete', array('id' => $oneDayMenu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
