<?php
/**
 * A Magento 2 module named Dealer4Dealer\SubstituteOrders
 * Copyright (C) 2017 Maikel Martens
 *
 * This file is part of Dealer4Dealer\SubstituteOrders.
 *
 * Dealer4Dealer\SubstituteOrders is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Dealer4Dealer\SubstituteOrders\Model\ResourceModel\Order;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Dealer4Dealer\SubstituteOrders\Model\Order',
            'Dealer4Dealer\SubstituteOrders\Model\ResourceModel\Order'
        );
    }

    /**
     * @param $invoice
     * @return $this
     */
    public function filterByInvoice($invoice)
    {
        $this->getSelect()->join(
            ['s' => $this->getTable('dealer4dealer_orderinvoicerelation')],
            's.order_id = main_table.order_id',
            []
        )->where(
            's.invoice_id=?',
            $invoice->getId()
        );

        return $this;
    }
}
