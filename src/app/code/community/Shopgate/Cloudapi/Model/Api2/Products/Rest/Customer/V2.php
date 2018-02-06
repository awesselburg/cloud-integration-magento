<?php

/**
 * Copyright Shopgate Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    Shopgate Inc, 804 Congress Ave, Austin, Texas 78701 <interfaces@shopgate.com>
 * @copyright Shopgate Inc
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

class Shopgate_Cloudapi_Model_Api2_Products_Rest_Customer_V2 extends Shopgate_Cloudapi_Model_Api2_Products_Rest
{
    /**
     * Current logged in customer
     *
     * @var Mage_Customer_Model_Customer
     */
    protected $customer;

    /**
     * Get customer group
     *
     * @return int
     * @throws Exception
     */
    protected function getCustomerGroupId()
    {
        return $this->getCustomer()->getGroupId();
    }

    /**
     * Define product price with or without taxes
     *
     * @param float $price
     * @param bool  $withTax
     *
     * @return float
     * @throws Exception
     */
    protected function applyTaxToPrice($price, $withTax = true)
    {
        $customer = $this->getCustomer();
        /** @var $session Mage_Customer_Model_Session */
        $session = Mage::getSingleton('customer/session');
        $session->setCustomerId($customer->getId());
        $price = $this->getPrice(
            $price, $withTax, $customer->getPrimaryShippingAddress(),
            $customer->getPrimaryBillingAddress(), $customer->getTaxClassId()
        );
        $session->setCustomerId(null);

        return $price;
    }

    /**
     * Retrieve current customer
     *
     * @return Mage_Customer_Model_Customer
     * @throws Exception
     */
    protected function getCustomer()
    {
        if (null === $this->customer) {
            /** @var $customer Mage_Customer_Model_Customer */
            $customer = Mage::getModel('customer/customer')->load($this->getApiUser()->getUserId());
            if (!$customer->getId()) {
                $this->_critical('Customer not found.', Mage_Api2_Model_Server::HTTP_INTERNAL_ERROR);
            }
            $this->customer = $customer;
        }

        return $this->customer;
    }
}

