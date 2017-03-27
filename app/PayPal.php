<?php

namespace App;

class PayPal
{
	private $_apiContext;
	private $shoppingCart;
	private $_clientId;
	private $_clientSecret;

	/**
	 * [instance the PayPal Object]
	 * @param [Array] $shoppingCart [Shopping cart content]
	 */
	public function __construct($shoppingCart)
	{
		$this->_clientId = env('PAYPAL_CLIENT_ID');
		$this->_clientSecret = env('PAYPAL_CLIENT_SECRET');

		$this->_apiContext = \PaypalPayment::apiContext($this->_clientId,$this->_clientSecret);

		$getConfig = config('paypal_payment');
		$config = array_dot($getConfig);
		$this->_apiContext->setConfig($config);
		$this->shoppingCart = $shoppingCart;
	}

	/**
	 * [Generate a request to PayPal]
	 * @return [type] [description]
	 */
	public function generate(){
		$payment = \PaypalPayment::payment()->setIntent('sale')
											->setPayer($this->payer())
											->setTransactions([$this->transaction()])
											->setRedirectUrls($this->redirectUrl());

		try {
			$payment->create($this->_apiContext);
		} catch (\Exception $ex) {
			dd($ex);
			exit(1);
		}

		return $payment;
	}

	/**
	 * [payer return the payment's info]
	 * @return [Method] [define the payment method]
	 */
	public function payer(){
		return \PaypalPayment::payer()->setPaymentMethod("paypal");
	}

	/**
	 * [generate the PayPal transaction]
	 * @return [Method] [get the amount info]
	 */
	public function transaction(){
		return \PaypalPayment::transaction()->setAmount($this->amount())
										   ->setItemList($this->items())
										   ->setDescription("Your purchase on N-Air")
										   ->setInvoiceNumber(uniqid());
	}

	/**
	 * [generate url for reditections]
	 * @return [Method] [generate url for success or failed transaction]
	 */
	public function redirectUrl(){
		$baseUrl = url('/');
		return \PaypalPayment::redirectUrls()->setReturnUrl("$baseUrl/payments/store")
											->setCancelUrl("$baseUrl/checkout");
	}

	/**
	 * [get the currency info of transaction]
	 * @return [Method] [define the currency and amount of transaction]
	 */
	public function amount(){
		return \PaypalPayment::amount()->setCurrency("USD")
									  ->setTotal($this->shoppingCart->total());
	}

	/**
	 * [Browse the products and organize the format]
	 * @return [Method] [list of items]
	 */
	public function items(){
		$items = [];
		$products = $this->shoppingCart->products()->get();

		foreach ($products as $product) {
			array_push($items,$product->PayPalItem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}

	/**
	 * [Execute the payment by the user]
	 * @param  [String] $paymentId [transaction id generate by PayPal]
	 * @param  [String] $PayerID   [account id of payer]
	 * @return [Method]            [execute the payment]
	 */
	public function execute($paymentId,$PayerID){
		$payment =  \PaypalPayment::getById($paymentId,$this->_apiContext);
		$execution = \Paypalpayment::PaymentExecution()->setPayerId($PayerID);
		return $payment->execute($execution,$this->_apiContext);
	}

}