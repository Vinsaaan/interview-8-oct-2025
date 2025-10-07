<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/status', function () {
    return response()->json([
        'message'   => 'API is running',
        'timestamp' => now()->toISOString(),
    ], 200);
});

Route::apiResource('projects', ProjectController::class);
// Generates:
//   GET    /api/projects
//   GET    /api/projects/{project}
//   POST   /api/projects
//   PUT    /api/projects/{project}
//   DELETE /api/projects/{project}
