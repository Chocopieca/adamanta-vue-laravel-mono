<?php
namespace Database\Seeders;

class UnitSalesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rebuildTable('unit_sales', [
            [
                'active' => 1,
            ],
            [
                'active' => 1,
            ],
            [
                'active' => 1,
            ]
        ]);

        $this->rebuildTable('unit_sale_descriptions', [
            [
                'unit_sale_id' => 1,
                'language_id' => 1,
                'name' => 'кг',
            ],
            [
                'unit_sale_id' => 1,
                'language_id' => 2,
                'name' => 'kg',
            ],
            [
                'unit_sale_id' => 1,
                'language_id' => 3,
                'name' => 'кг',
            ],
            [
                'unit_sale_id' => 2,
                'language_id' => 1,
                'name' => 'гр',
            ],
            [
                'unit_sale_id' => 2,
                'language_id' => 2,
                'name' => 'gr',
            ],
            [
                'unit_sale_id' => 2,
                'language_id' => 3,
                'name' => 'гр',
            ],
            [
                'unit_sale_id' => 3,
                'language_id' => 1,
                'name' => 'мл',
            ],
            [
                'unit_sale_id' => 3,
                'language_id' => 2,
                'name' => 'ml',
            ],
            [
                'unit_sale_id' => 3,
                'language_id' => 3,
                'name' => 'мл',
            ],
        ]);
    }
}
