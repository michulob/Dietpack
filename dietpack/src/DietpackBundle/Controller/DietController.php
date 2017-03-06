<?php

namespace DietpackBundle\Controller;

use DietpackBundle\Entity\Diet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Diet controller.
 *
 * @Route("diet")
 */
class DietController extends Controller
{
    /**
     * Lists all diet entities.
     *
     * @Route("/", name="diet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $diets = $em->getRepository('DietpackBundle:Diet')->findAll();

        return $this->render('diet/index.html.twig', array(
            'diets' => $diets,
        ));
    }

    /**
     * Creates a new diet entity.
     *
     * @Route("/new", name="diet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $diet = new Diet();
        $form = $this->createForm('DietpackBundle\Form\DietType', $diet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($diet);
            $em->flush($diet);

            return $this->redirectToRoute('diet_show', array('id' => $diet->getId()));
        }

        return $this->render('diet/new.html.twig', array(
            'diet' => $diet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a diet entity.
     *
     * @Route("/{id}", name="diet_show")
     * @Method("GET")
     */
    public function showAction(Diet $diet)
    {
        $deleteForm = $this->createDeleteForm($diet);

        return $this->render('diet/show.html.twig', array(
            'diet' => $diet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing diet entity.
     *
     * @Route("/{id}/edit", name="diet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Diet $diet)
    {
        $deleteForm = $this->createDeleteForm($diet);
        $editForm = $this->createForm('DietpackBundle\Form\DietType', $diet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('diet_edit', array('id' => $diet->getId()));
        }

        return $this->render('diet/edit.html.twig', array(
            'diet' => $diet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a diet entity.
     *
     * @Route("/{id}", name="diet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Diet $diet)
    {
        $form = $this->createDeleteForm($diet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($diet);
            $em->flush($diet);
        }

        return $this->redirectToRoute('diet_index');
    }

    /**
     * Creates a form to delete a diet entity.
     *
     * @param Diet $diet The diet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Diet $diet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diet_delete', array('id' => $diet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
