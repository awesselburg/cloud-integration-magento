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

/**
 * @method $this setType(string $type)
 * @method string getType()
 * @method $this setAmount(float $amount)
 * @method float getAmount()
 */
class Shopgate_Cloudapi_Model_Frontend_Checkout_Onepage_Purchase_Total extends Varien_Object
{
    /**
     * Type shipping
     */
    const TYPE_SHIPPING = 'shipping';

    /**
     * Type tax
     */
    const TYPE_TAX = 'tax';

    /**
     * Type grant total
     */
    const TYPE_GRAND_TOTAL = 'grandTotal';
}
