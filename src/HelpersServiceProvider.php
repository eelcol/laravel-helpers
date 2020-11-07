<?php

namespace Eelcol\LaravelHelpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // extend the UploadedFile class
        UploadedFile::macro('saveToCloud', function (string $target_folder, string $disk = null) {
            
            $filename = microtime(true) . "_" . rand(1111, 9999) . "." . $this->clientExtension();

            if(is_null($disk)) {
                $storage = Storage::cloud();
            } else {
                $storage = Storage::disk($disk);
            }

            $path = $storage->putFileAs($target_folder, $this, $filename, ['visibility' => 'public']);

            $url = $storage->url($path);

            // if the url contains the app url
            // remove the app url from the final url
            if (substr($url, 0, strlen(config('app.url'))) == config('app.url')) {
                $url = substr($url, strlen(config('app.url')));
            }

            return $url;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
