<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Contrat;
use Carbon\Carbon;
class UpdateContractsStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contracts:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour les statuts des contrats expirés';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now(); // Date actuelle

        $updated = Contrat::whereNotIn('status', ['En difficulté', 'Terminer'])
            ->where('date_achev_pro', '<', $now)
            ->update(['status' => 'En difficulté']);

        $this->info("{$updated} contrats mis à jour.");
        // return Command::SUCCESS;
    }
}
