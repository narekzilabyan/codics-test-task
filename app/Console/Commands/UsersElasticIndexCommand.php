<?php

namespace App\Console\Commands;

use App\Models\User;
use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class UsersElasticIndexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elastic:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add indexes to elasticsearch for users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = ClientBuilder::create()->setHosts(['http://elasticsearch:9200'])->build();

        $users = User::all();

        foreach ($users as $user) {
            $client->index([
                'index' => 'users',
                'body'  => $user->toArray()
            ]);
        }
        $this->info("Users were successfully indexed");

        return 0;
    }
}
