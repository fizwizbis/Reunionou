<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class event extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'event:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all created events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = ['Id', 'Title', 'Author', 'Public', 'Free', 'Price'];
        $events = \App\Event::all(['id', 'title', 'author', 'public', 'free', 'price'])->toArray();
        $this->table($headers, $events);
    }
}
