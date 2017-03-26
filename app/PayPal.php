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
	}

	/**
	 * [payer return the payment's info]
	 * @return [Method] [define the payment method]
	 */
	public function payer(){
		return PaypalPayment::payer()->setPaymentMethod("paypal");
	}

	/**
	 * [generate the PayPal transaction]
	 * @return [Method] [get the amount info]
	 */
	public function transaction(){
		return PaypalPayment::transaction()->setAmount($this->amount())
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
		return PaypalPayment::redirectUrls()->setReturnUrl("$baseUrl/payments")
											->setCancelUrl("$baseUrl/checkout");
	}

	/**
	 * [get the currency info of transaction]
	 * @return [Method] [define the currency and amount of transaction]
	 */
	public function amount(){
		return PaypalPayment::amount()->setCurrency("USD")
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

		return PaypalPayment::itemList()->setItems($items);
	}

}