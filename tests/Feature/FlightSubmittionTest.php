<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Modules\Database\Seeders\MembersDatabaseSeeder;

class FlightSubmittionTest extends TestCase
{
    /**
     * Testing the functionality of flight submittions by end-users
     * Seed DB
     * @author AutiCodes
     */
    public function testFormSubmittion()
    {
        $this->seed();
    }
    
}
