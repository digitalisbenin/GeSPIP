<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Contrat;
use Carbon\Carbon;


class UpdateContractStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $now = Carbon::now(); // Date actuelle

        Contrat::where('status', '!=', 'En difficulté') // Vérifier que ce n'est pas déjà mis à jour
            ->where('date_achev_pro', '<', $now) // Comparer la date
            ->update(['status' => 'En difficulté']);

        \Log::info('Contrats mis à jour avec succès.');
    }
}
