<?php
namespace BsdTraning\UnitTest\MockObject;

use BsdTraning\UnitTest\Services\Payment;
use BsdTraning\UnitTest\Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * Thay thế code trong lúc thực thi, tham khảo http://php.net/manual/en/book.runkit.php
     * https://www.littlehart.net/atthekeyboard/2012/07/13/monkey-patching-is-for-closers/
     * @throws \Exception
     */
    public function testProcessPaymentReturnsTrueOnSuccessfulPayment()
    {
        $paymentDetails = array(
            'amount'   => 123.99,
            'card_num' => '4111-1111-1111-1111',
            'exp_date' => '03/2013',
        );

        $payment = new Payment();

        $response = new \stdClass();
        $response->approved = true;
        $response->transaction_id = 123;

        /**
         * Mock object
         */
        $authorizeNet = $this->getMockBuilder(\AuthorizeNetAIM::class)
            ->setConstructorArgs([Payment::API_ID, Payment::TRANS_KEY])
            ->getMock();

        /**
         * Stub method
         */
        $authorizeNet->expects($this->once())
            ->method('authorizeAndCapture')
            ->will($this->returnValue($response));

        /**
         * Dependency Injection
         */
        $result = $payment->processPayment($authorizeNet, $paymentDetails);

        $this->assertTrue($result);
    }
}