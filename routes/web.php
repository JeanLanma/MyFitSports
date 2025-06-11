<?php

use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\ERP\Branches\BranchesController;
use App\Http\Controllers\ERP\Inventory\InventoryController;
use App\Http\Controllers\Erp\Inventory\ProductCategoriesController;
use App\Http\Controllers\ERP\Inventory\ProductsController;
use App\Http\Controllers\ERP\SalesController;
use App\Http\Controllers\SupllierController;
use App\Http\Controllers\Teams\TeamsController;
use App\Http\Controllers\Workouts\WorkoutController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Home/IndexHome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/landing', function () {
    return Inertia::render('Home/IndexHome2', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::get('/customers/show/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

    Route::get('/teams', [TeamsController::class, 'index'])->name('teams.index');
    Route::get('/teams/create', [TeamsController::class, 'create'])->name('teams.create');
    Route::get('/teams/show/{team_id?}', [TeamsController::class, 'show'])->name('teams.show');
    Route::post('/teams/store', [TeamsController::class, 'store'])->name('teams.store');

    Route::get('/workouts', [WorkoutController::class, 'index'])->name('workouts.index');


    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/show/{sale?}', [SalesController::class, 'show'])->name('sales.show');
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/inventory/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/inventory/products/create', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/branches', [BranchesController::class, 'index'])->name('branches.index');
    Route::get('/branches/show', [BranchesController::class, 'index'])->name('branches.show');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/show', [InventoryController::class, 'index'])->name('inventory.show');

    Route::get('/product-categories', [ProductCategoriesController::class, 'index'])->name('product-categories.index');
    Route::get("/supplier", [SupllierController::class, "index"])->name("supplier.index");


    //Exports
    Route::get('/export/users', function()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    })->name('users.export');
    Route::get('/export/products', function()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    })->name('products.export');
});
