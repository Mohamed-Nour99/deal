<?php

namespace Src\Domain\Deal\Database\Seeds;

use Illuminate\Database\Seeder;
use Src\Domain\Deal\Entities\Deal;

class DealTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Deal::factory(1000)->times(50);
    }
}
