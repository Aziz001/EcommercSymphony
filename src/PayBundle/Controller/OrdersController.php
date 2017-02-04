<?php
namespace PayBundle\Controller;


use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PayBundle\Document\Order;
use JMS\Payment\CoreBundle\PluginController\Result;




class OrdersController extends Controller
{

/**
* @Route("/order/{amount}",name="order") 
* @Template
 */
public function showAction(Request $request,$amount)
{ //show form of payment and submit form
	    $em = $this->get('doctrine_mongodb')->getManager();

    $order = new Order($amount);
    $em->persist($order);
    $em->flush();
    $id=$order->getId(); 
    $amount=$order->getAmount(); 
      $form = $this->createForm(ChoosePaymentMethodType::class, null, [
        'amount'   => $order->getAmount(),
        'currency' => 'EUR',
    ]);
      $page=$this->render('PayBundle:Default:show.html.twig', array(
           'form'  => $form->createView(),'amount' => $amount,
            ));
//problem with driver, database conflict
       $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $ppc = $this->get('payment.plugin_controller');
        $ppc->createPaymentInstruction($instruction = $form->getData());

        $order->setPaymentInstruction($instruction);

        $em->persist($order);
        $em->flush($order);

      $page=$this->render('PayBundle:Default:create.html.twig', array(
           'order' => $order,
            ));
    }
 
   
   return $page;
}

//Creating a Payment action
public function paymentCreateAction(Order $order)
{

$instruction = $order->getPaymentInstruction();
    $pendingTransaction = $instruction->getPendingTransaction();

    if ($pendingTransaction !== null) {
        return $pendingTransaction->getPayment();
    }

    $ppc = $this->get('payment.plugin_controller');
    $amount = $instruction->getAmount() - $instruction->getDepositedAmount();

    $ppc->createPayment($instruction->getId(), $amount);

    //$ppc = $this->get('payment.plugin_controller');
    $result = $ppc->approveAndDeposit($payment->getId(), $payment->getTargetAmount());

    if ($result->getStatus() === Result::STATUS_SUCCESS) {
           return $this->render('PayBundle:Default:complete.html.twig');
    }

    throw new \Exception('Transaction was not successful: '.$result->getReasonCode());
}
/**
* @Route("/complete",name="complete") 
* @Template
 */
public function completeAction(){
    return $this->render('PayBundle:Default:complete.html.twig');
}

}