<?php
namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the application's response macros.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            $except = ['first_page_url', 'last_page_url', 'prev_page_url', 'path', 'next_page_url'];
            try {
                if (is_object($data) && method_exists($data, 'toArray')) {
                    $data = $data->toArray();
                }
            } catch (\Exception $e) {
            }

            return [
                'errors'  => false,
                'data'    => (!empty($data)) ? array_except($data, $except) : $data,
            ];
        });
    }
}
