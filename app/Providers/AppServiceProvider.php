<?php

namespace App\Providers;

use App\ComapnyDepartment;
use App\CompanyBranch;
use App\Degree;
use App\Education;
use App\EventAndEffects;
use App\Experience;
use App\Jop;
use App\Observers\CompanyBranchObserver;
use App\Observers\CompDepartmentObserver;
use App\Observers\DegreeObserver;
use App\Observers\EducationObserver;
use App\Observers\EventEffectObserver;
use App\Observers\ExperienceObserver;
use App\Observers\JopObserver;
use App\Observers\TypeWorkObserver;
use App\TypeWork;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Jop::observe(JopObserver::class);
        Degree::observe(DegreeObserver::class);
        Education::observe(EducationObserver::class);
        Experience::observe(ExperienceObserver::class);
        TypeWork::observe(TypeWorkObserver::class);
        ComapnyDepartment::observe(CompDepartmentObserver::class);
        CompanyBranch::observe(CompanyBranchObserver::class);
        EventAndEffects::observe(EventEffectObserver::class);
    }
}
