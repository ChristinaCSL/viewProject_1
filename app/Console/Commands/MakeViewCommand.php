<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create {view} blade';

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
     *
     */
    public function handle()
    {
        $view = $this->argument('view');
        $path = $this->viewPath($view);
        $folderpath = "resources/views/author";

        if(!File::isDirectory($folderpath))
        {
            //to create folder
            File::makeDirectory($folderpath,0777, true, true);
        }



        // if (File::exists($path))
        // {
        // $this->error("File {$path} already exists!");
        // return;
        // }
        // File::put($path, $path);
        // $this->info("File {$path} created.");

        if(!File::exists($path))
        {
            //to save files
            $content="<html></html>";
            File::put($path,$content);
            $this->info($path."is created");
        }
        else{
            $this->error($view.".blade.php is already existed");
        }
    }

    /**
    * Get the view full path.
    *
    * @param string $view
    *
    * @return string
    */
    public function viewPath($view)
    {
        $view = str_replace('.', '/', $view) . '.blade.php';
        $path = "resources/views/{$view}";
        return $path;
    }
}
