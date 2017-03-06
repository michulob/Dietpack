<?php

namespace DietpackBundle\Controller;

use DietpackBundle\Entity\AdditionalInfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Additionalinfo controller.
 *
 * @Route("additionalinfo")
 */
class AdditionalInfoController extends Controller
{
    /**
     * Lists all additionalInfo entities.
     *
     * @Route("/", name="additionalinfo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $additionalInfos = $em->getRepository('DietpackBundle:AdditionalInfo')->findAll();

        return $this->render('additionalinfo/index.html.twig', array(
            'additionalInfos' => $additionalInfos,
        ));
    }

    /**
     * Creates a new additionalInfo entity.
     *
     * @Route("/new", name="additionalinfo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $additionalInfo = new Additionalinfo();
        $form = $this->createForm('DietpackBundle\Form\AdditionalInfoType', $additionalInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($additionalInfo);
            $em->flush($additionalInfo);

            return $this->redirectToRoute('additionalinfo_show', array('id' => $additionalInfo->getId()));
        }

        return $this->render('additionalinfo/new.html.twig', array(
            'additionalInfo' => $additionalInfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a additionalInfo entity.
     *
     * @Route("/{id}", name="additionalinfo_show")
     * @Method("GET")
     */
    public function showAction(AdditionalInfo $additionalInfo)
    {
        $deleteForm = $this->createDeleteForm($additionalInfo);

        return $this->render('additionalinfo/show.html.twig', array(
            'additionalInfo' => $additionalInfo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing additionalInfo entity.
     *
     * @Route("/{id}/edit", name="additionalinfo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AdditionalInfo $additionalInfo)
    {
        $deleteForm = $this->createDeleteForm($additionalInfo);
        $editForm = $this->createForm('DietpackBundle\Form\AdditionalInfoType', $additionalInfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('additionalinfo_edit', array('id' => $additionalInfo->getId()));
        }

        return $this->render('additionalinfo/edit.html.twig', array(
            'additionalInfo' => $additionalInfo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a additionalInfo entity.
     *
     * @Route("/{id}", name="additionalinfo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AdditionalInfo $additionalInfo)
    {
        $form = $this->createDeleteForm($additionalInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($additionalInfo);
            $em->flush($additionalInfo);
        }

        return $this->redirectToRoute('additionalinfo_index');
    }

    /**
     * Creates a form to delete a additionalInfo entity.
     *
     * @param AdditionalInfo $additionalInfo The additionalInfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AdditionalInfo $additionalInfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('additionalinfo_delete', array('id' => $additionalInfo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
