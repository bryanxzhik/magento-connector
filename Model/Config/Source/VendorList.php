<?php
/**
 * SmartCat Translate Connector
 * Copyright (C) 2017 SmartCat
 *
 * This file is part of SmartCat/Connector.
 *
 * SmartCat/Connector is free software: you can redistribute it and/or modify
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

namespace SmartCat\Connector\Magento\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;
<<<<<<< HEAD
use SmartCat\Connector\Magento\Helper\SmartCatFacade;
=======
use SmartCat\Connector\Service\ConnectorService;
>>>>>>> parent of 06302bf... Refactoring
use Magento\Framework\Message\ManagerInterface;

class VendorList implements ArrayInterface
{
    private $connectorService;
    private $messageManager;

    public function __construct(
        ConnectorService $connectorService,
        ManagerInterface $messageManager
    ) {
        $this->connectorService = $connectorService;
        $this->messageManager = $messageManager;
    }

    public function toOptionArray()
    {
        $vendors = [
            ['label' => __('Translate internally'), 'value' => '']
        ];

        try {
            $vendorsList = $this->connectorService->getService()
                ->getDirectoriesManager()->directoriesGet(['type' => 'vendor'])
                ->getItems();

        } catch (\Throwable $e) {
            $this->messageManager->addErrorMessage(__('SmartCat API error occurred: ') . $e->getMessage());
            return $vendors;
        }

        if (isset($vendorsList)) {
            foreach ($vendorsList as $vendor) {
                $vendors[] = [
                    'label' => $vendor->getName(),
                    'value' => $vendor->getId()
                ];
            }
        } else {
            $this->messageManager->addWarningMessage(__('Vendors not found'));
        }

        return $vendors;
    }
}
