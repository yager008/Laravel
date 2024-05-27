<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanUpTypeResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanup:typeresults';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up invalid type_results records that do not have a matching user_id in the users table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('type_results')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereColumn('users.id', 'type_results.user_id');
            })
            ->delete();

        $this->info('Invalid type_results records have been cleaned up.');
        return 0;
    }
}
