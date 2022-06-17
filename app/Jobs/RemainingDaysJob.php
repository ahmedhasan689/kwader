<?php

namespace App\Jobs;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemainingDaysJob implements ShouldQueue
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
        $users = User::onlyTrashed()->get();

        foreach ($users as $user){
            $from = Carbon::createFromFormat('Y-m-d H:s:i', now());
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $user->deleted_at->addDays(30));
            $diff_in_days = $from->diffInDays($to);

            $user->update([
                'remaining_days' => $diff_in_days,
            ]);

            if ($user->remaining_days == '0'){
                $employee = Employee::where('user_id', $user->id)->delete();
                $employer = Employer::where('user_id', $user->id)->delete();
                $user->forceDelete();
            };
        }




    }
}
