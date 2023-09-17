<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new class';
    protected $type='class';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $fileName = $this->viewPath($name);
        $classContent = '<?php'.PHP_EOL;
        $classContent .= "namespace App\Repository;";
        $classContent .= PHP_EOL . 'class ' . $name . '{' . PHP_EOL . '}';
        $filePath = app_path($fileName);
        if (file_exists($filePath)) {
        $this->error('Class already exists!');
        return;
        }
        file_put_contents($filePath, $classContent);
        $this->info('Class generated successfully!');
    }

    /**
    * Get the view full path.
    *
    * @param string $view
    *
    * @return string
    */
    public function viewPath($name)
    {
    $name = str_replace('.', '/', $name) . '.php';
    $path = "Repository/$name";
    return $path;
    }
}
