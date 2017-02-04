<?php
namespace PayBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Payment\CoreBundle\Entity\PaymentInstruction;

/**
 * @MongoDB\Document
 */
class Order
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    private $id;
    /** @MongoDB\ReferenceOne(targetDocument="JMS\Payment\CoreBundle\Entity\PaymentInstruction", mappedBy="user") */

    private $paymentInstruction;

    /** @MongoDB\Int */
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPaymentInstruction()
    {
        return $this->paymentInstruction;
    }

    public function setPaymentInstruction(PaymentInstruction $instruction)
    {
        $this->paymentInstruction = $instruction;
    }
}