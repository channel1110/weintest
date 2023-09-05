<?php

namespace App\Console;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteExpiredUsers extends Command
{
    protected $signature = 'tdeluser:expired';
    protected $description = 'Delete users who have been deleted for more than 30 days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // 30일 이상 탈퇴한 사용자 삭제
        User::where('deleted_at', '<=', now()->subDays(30))->forceDelete();
        $this->info('Expired users have been deleted successfully.');
    }
}