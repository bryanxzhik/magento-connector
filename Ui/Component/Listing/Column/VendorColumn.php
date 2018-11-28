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

namespace SmartCat\Connector\Magento\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
<<<<<<< HEAD
use SmartCat\Connector\Magento\Helper\SmartCatFacade;
=======
use SmartCat\Connector\Service\ConnectorService;
>>>>>>> parent of 06302bf... Refactoring

class VendorColumn extends Column
{
    /**
     * @var ConnectorService
     */
    protected $connectorService;

    /**
     * Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param ConnectorService  $connectorService
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        ConnectorService $connectorService,
        array $components = [],
        array $data = []
    ) {
        $this->connectorService = $connectorService;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function prepareDataSource(array $dataSource)
    {
        $vendors = [];

        if (isset($dataSource['data']['items'])) {
            try {
                $vendorsList = $this->connectorService->getService()
                    ->getDirectoriesManager()->directoriesGet(['type' => 'vendor'])
                    ->getItems();

                foreach ($vendorsList as $vendor) {
                    $vendors[] = [
                        'id' => $vendor->getId(),
                        'name' => $vendor->getName()
                    ];
                }

            } catch (\Throwable $e) {
                return $dataSource;
            }

            if (empty($vendors)) {
                return $dataSource;
            }

            foreach ($dataSource['data']['items'] as &$item) {
                if($this->getData('name') == 'vendor'){
                    $vendorId = array_search($item['vendor'], array_column($vendors, 'id'));
                    if ($vendorId !== false) {
                        $item[$this->getData('name')] = $vendors[$vendorId]['name'];
                    } else {
                        $item[$this->getData('name')] = __('Translate internally');
                    }
                }
            }
        }

        return $dataSource;
    }
}