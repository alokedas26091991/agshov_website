<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CountriesFixture
 */
class CountriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'sortname' => 'L',
                'name' => 'Lorem ipsum dolor sit amet',
                'isd_code' => 'Lorem ipsum do',
                'is_deleted' => 1,
            ],
        ];
        parent::init();
    }
}
