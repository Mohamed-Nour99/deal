<?php

namespace Src\Domain\Deal\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class PolicyServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \Src\Domain\Deal\Entities\Deal::class => \Src\Domain\Deal\Policies\DealPolicy::class,
		\Src\Domain\Deal\Entities\DealPercentage::class => \Src\Domain\Deal\Policies\DealPercentagePolicy::class,
		###POLICIES###
    ];

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
