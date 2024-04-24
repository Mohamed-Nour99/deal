<?php

namespace Src\Domain\Deal\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Deal\Entities\DealPercentage;

class DealPercentageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DealPercentage::factory(1000)->times(50);
    }
}
