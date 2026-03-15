<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/demo', 'demo')->name('demo');

Route::get('/demo/video', function () {
    $candidates = [
        public_path('videos/aquasmart-demo.mp4'),
        'C:\\Users\\Lenovo\\Downloads\\VID-20260315-WA0004.mp4',
    ];

    foreach ($candidates as $path) {
        if (File::exists($path)) {
            return response()->file($path, [
                'Content-Type' => 'video/mp4',
                'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
            ]);
        }
    }

    abort(404, 'Demo video not found.');
})->name('demo.video');
