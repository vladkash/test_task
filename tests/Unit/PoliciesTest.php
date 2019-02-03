<?php

namespace Tests\Unit;

use App\Application;
use App\Policies\ApplicationPolicy;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoliciesTest extends TestCase
{
    /**
     * Testing ability of admin to view application
     *
     * @return void
     */
    public function testAdminApplicationView()
    {
        $userAdmin = User::whereHas('role', function ($query) {
            $query->admin();
        })->first();

        $applicationPolicy = new ApplicationPolicy();

        $this->assertTrue($applicationPolicy->view($userAdmin, Application::first()));
    }

    /**
     * Testing ability of client to view his event's application
     *
     *@return void
     */
    public function testClientApplicationView()
    {
        $userClient = User::whereHas('role', function ($query) {
            $query->client();
        })->first();

        $applicationPolicy = new ApplicationPolicy();

        $this->assertTrue($applicationPolicy->view($userClient, $userClient->events()->first()->applications()->first()));
    }

}
