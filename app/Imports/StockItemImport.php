<?php

namespace App\Imports;

use App\Models\stock;
use App\Models\Stock_brand;
use App\Models\Stock_category;
use App\Models\stock_color;
use App\Models\Stock_fabric;
use App\Models\Stock_item;
use App\Models\Stock_manufacturer;
use App\Models\Stock_stock_room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockItemImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{

    public function model(array $row)
    {
//        dd($row);
        $brand_array = [
            "st_george",
            "castel",
            "senq",
            "doppel",
            "raya",
            "zebidar",
            "bgi_corporate",
        ];
        $Name = '';
        $fields_array = [
            "fabric",
            "size",
            "type",
            "color",
            "manufacturer",
        ];
        foreach ($fields_array as $index => $field) {
            if (!is_null($row[$field])) {
                $Name .= "_" . strtoupper($row[$field]);
            }
        }

        foreach ($brand_array as $brand) {
//            dd($row);
            if ($row[$brand] !== null) {
                $stock_room_id = Stock_stock_room::query()->firstOrCreate(
                    [
                        'Stock_Room' => strtoupper(str_replace('_', ' ', $brand)),
                    ],
                    [
                        'Site' => $row['site'] ?? 'AA',
                        'Branch' => $row['branch'] ?? 'KR',
                        'ShortName' => auth()->user()->Location . $row['site'] . auth()->user()->Department . $row['branch'] . strtoupper(str_replace('_', ' ', $brand)),
                        'Description' => strtoupper(str_replace('_', ' ', $brand)) . ' stock room located at ' . $row['branch'] . ', ' . auth()->user()->Location,
                        'Company' => auth()->user()->Location,
                        'Department' => auth()->user()->Department,
                        'CUID' => auth()->id(),
                        'UUID' => auth()->id(),
                    ]
                )->SRID;

                Stock_brand::query()->firstOrCreate(
                    [
                        'Type' => $row["type"],
                        'Brand' => strtoupper(str_replace('_', ' ', $brand)),
                    ],
                    [
                        'Company' => auth()->user()->Location,
                        'Department' => auth()->user()->Department,
                        'CUID' => auth()->id(),
                        'UUID' => auth()->id(),
                    ]
                );

                $stock_item_id = Stock_item::query()->firstOrCreate(
                    [
                        'Item_Code' => trim($Name, '_'),
                        'Type' => ucwords(strtolower($row['type'])),
                        'Brand' => strtoupper(str_replace('_', ' ', $brand)),
                        'Company' => auth()->user()->Location,
                    ],
                    [
                        'Department' => auth()->user()->Department,
                        "Fabric" => ucwords(strtolower($row["fabric"])),
                        "Size" => ucwords(strtolower($row["size"])),
                        "Color" => ucwords(strtolower($row["color"])),
                        "Manufacturer" => ucwords(strtolower($row["manufacturer"])),
                        'Countable' => $row["countableuncountable"] ?? 'Uncountable',
                        'Status' => $row["returnableunreturnable"] ?? 'Returnable',
                        'CUID' => auth()->id(),
                        'UUID' => auth()->id(),
                    ]
                )->SIID;

                stock::query()->updateOrCreate(
                    [
                        'Stock_Room' => $stock_room_id,
                        "Item" => $stock_item_id,
                    ],
                    [
                        'Company' => auth()->user()->Location,
                        'Department' => auth()->user()->Department,
                        'CUID' => auth()->id(),
                        'UUID' => auth()->id(),
                    ]
                )->increment('Quantity', $row[$brand]);
            }

        }
        if ($row['fabric'] !== null) {
            Stock_fabric::query()->firstOrCreate(
                [
                    'Type' => $row["type"],
                    'Fabric' => $row['fabric'],
                ],
                [
                    'Company' => auth()->user()->Location,
                    'Department' => auth()->user()->Department,
                    'CUID' => auth()->id(),
                    'UUID' => auth()->id(),
                ]
            );
        }

        if ($row['manufacturer'] !== null) {
            Stock_manufacturer::query()->firstOrCreate(
                ['Type' => $row["type"],
                    'Manufacturer' => $row['manufacturer'],],
                ['CUID' => auth()->id(),
                    'UUID' => auth()->id(),]
            );
        }

        if ($row['color'] !== null) {
            stock_color::query()->firstOrCreate(
                ['Type' => $row["type"],
                    'Color' => $row['color'],],
                ['Company' => auth()->user()->Location,
                    'Department' => auth()->user()->Department,
                    'CUID' => auth()->id(),
                    'UUID' => auth()->id(),]
            );
        }

        return Stock_category::query()->firstOrCreate(
            [
                'Type' => strtoupper($row['type']),
            ],
            [
                'Company' => auth()->user()->Location,
                'Department' => auth()->user()->Department,
                'CUID' => auth()->id(),
                'UUID' => auth()->id(),
            ]
        );
    }
}
