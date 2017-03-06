<?php

namespace DietpackBundle\Controller;

use DietpackBundle\Entity\OneOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Oneorder controller.
 *
 * @Route("oneorder")
 */
class OneOrderController extends Controller
{
    /**
     * Lists all oneOrder entities.
     *
     * @Route("/", name="oneorder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $oneOrders = $em->getRepository('DietpackBundle:OneOrder')->findAll();

        return $this->render('oneorder/index.html.twig', array(
            'oneOrders' => $oneOrders,
        ));
    }

    /**
     * Creates a new oneOrder entity.
     *
     * @Route("/new", name="oneorder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $oneOrder = new Oneorder();
        $form = $this->createForm('DietpackBundle\Form\OneOrderType', $oneOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $oneOrder->setFinish()->setExpire();
            $em->persist($oneOrder);
            $em->flush($oneOrder);

            return $this->redirectToRoute('oneorder_show', array('id' => $oneOrder->getId()));
        }

        return $this->render('oneorder/new.html.twig', array(
            'oneOrder' => $oneOrder,
            'form' => $form->createView(),
        ));

    }

    /**
     * Finds and displays a oneOrder entity.
     *
     * @Route("/{id}", name="oneorder_show")
     * @Method("GET")
     */
    public function showAction(OneOrder $oneOrder)
    {
        $deleteForm = $this->createDeleteForm($oneOrder);

        return $this->render('oneorder/show.html.twig', array(
            'oneOrder' => $oneOrder,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing oneOrder entity.
     *
     * @Route("/{id}/edit", name="oneorder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, OneOrder $oneOrder)
    {
        $deleteForm = $this->createDeleteForm($oneOrder);
        $editForm = $this->createForm('DietpackBundle\Form\OneOrderType', $oneOrder);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oneorder_edit', array('id' => $oneOrder->getId()));
        }

        return $this->render('oneorder/edit.html.twig', array(
            'oneOrder' => $oneOrder,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a oneOrder entity.
     *
     * @Route("/{id}", name="oneorder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, OneOrder $oneOrder)
    {
        $form = $this->createDeleteForm($oneOrder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($oneOrder);
            $em->flush($oneOrder);
        }

        return $this->redirectToRoute('oneorder_index');
    }

    /**
     * Creates a form to delete a oneOrder entity.
     *
     * @param OneOrder $oneOrder The oneOrder entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OneOrder $oneOrder)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('oneorder_delete', array('id' => $oneOrder->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
