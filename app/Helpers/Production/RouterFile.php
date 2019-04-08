<?php
namespace App\Helpers\Production;

use App\Helpers\RouterFileInterface;
use Illuminate\Support\Facades\Route;

class RouterFile implements RouterFileInterface
{
    public static function includeRouteFiles($folder)
    {
        try {
            $rdi = new \RecursiveDirectoryIterator($folder);
            $it  = new \RecursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    Route::prefix('/')
                        ->group($it->key());
                }

                $it->next();
            }
        } catch (Exception $e) {
        }
    }
}
