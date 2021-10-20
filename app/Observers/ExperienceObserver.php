<?php

namespace App\Observers;

use App\Experience;

class ExperienceObserver
{
    /**
     * Handle the experience "created" event.
     *
     * @param  \App\Experience  $experience
     * @return void
     */
    public function created(Experience $experience)
    {
        //
    }

    /**
     * Handle the experience "updated" event.
     *
     * @param  \App\Experience  $experience
     * @return void
     */
    public function updated(Experience $experience)
    {
        //
    }

    /**
     * Handle the experience "deleted" event.
     *
     * @param  \App\Experience  $experience
     * @return void
     */
    public function deleted(Experience $experience)
    {
        //
    }

    /**
     * Handle the experience "restored" event.
     *
     * @param  \App\Experience  $experience
     * @return void
     */
    public function restored(Experience $experience)
    {
        //
    }

    /**
     * Handle the experience "force deleted" event.
     *
     * @param  \App\Experience  $experience
     * @return void
     */
    public function forceDeleted(Experience $experience)
    {
        //
    }
}
