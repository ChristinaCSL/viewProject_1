<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class MakeFolderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:folderview {folderview}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $folderview = $this->argument('folderview');
        // $folder = $this->argument('folder');
        $path = $this->viewPath($folderview);
        $folderpath = "resources/views/{$folderview}";

        if(!File::isDirectory($folderpath))
        {
            //to create folder
            File::makeDirectory($folderpath,0777, true, true);
        }
        // return 0;

        if(!File::exists($path))
        {
            //to save files
            $content="<html></html>";
            File::put($path,$content);
            $this->info($path."is created");
        }
        else{
            $this->error($folderview.".blade.php is already existed");
        }
    }

    public function viewPath($folderview)
    {
        $folderview = str_replace('.', '/', $folderview) . '.blade.php';
        $path = "resources/views/{$folderview}";
        return $path;
    }
}
