<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SpecialistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', fn() => view('welcome'));

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Perfil
Route::middleware(['auth'])->group(function () {

    Route::patch(
        '/appointments/{appointment}/cancel',
        [AppointmentController::class, 'cancel']
    )->name('appointments.cancel');

    Route::resource('appointments', AppointmentController::class);

    Route::get(
        '/appointments/calendar',
        [AppointmentController::class, 'calendar']
    )
        ->name('appointments.calendar');
});

// Registro
Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Usuarios (solo admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Servicios - lectura todos, escritura solo admin
Route::middleware(['auth'])->group(function () {
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
});

// Inventario - lectura todos, escritura solo admin
Route::middleware(['auth'])->group(function () {
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
});

// Especialistas - lectura todos, escritura solo admin
Route::middleware(['auth'])->group(function () {
    Route::get('/specialists', [SpecialistController::class, 'index'])->name('specialists.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/specialists/create', [SpecialistController::class, 'create'])->name('specialists.create');
    Route::post('/specialists', [SpecialistController::class, 'store'])->name('specialists.store');
    Route::get('/specialists/{specialist}/edit', [SpecialistController::class, 'edit'])->name('specialists.edit');
    Route::put('/specialists/{specialist}', [SpecialistController::class, 'update'])->name('specialists.update');
    Route::delete('/specialists/{specialist}', [SpecialistController::class, 'destroy'])->name('specialists.destroy');
});

// Citas
Route::middleware(['auth'])->group(function () {

    Route::resource('appointments', AppointmentController::class);

    Route::get('/appointments/calendar', [AppointmentController::class, 'calendar'])
        ->name('appointments.calendar');

    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
        ->name('appointments.cancel');

    Route::patch('/appointments/{appointment}/status', [AppointmentController::class, 'quickStatus'])
        ->name('appointments.status');

});

// Carrito
Route::middleware(['auth'])->group(function () {

    Route::get('/carrito', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/carrito/anadir/{id}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::delete('/carrito/eliminar/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/carrito/anadir-servicio/{id}', [CartController::class, 'addService'])
        ->name('cart.addService');

    Route::post('/carrito/finalizar', [CartController::class, 'checkout'])
        ->name('cart.checkout');
});

// Reportes
Route::get(
    '/reportes/citas',
    [DashboardController::class, 'reportes']
)
    ->middleware(['auth', 'role:admin'])
    ->name('reportes.citas');

Route::get(
    '/reportes/servicios',
    [DashboardController::class, 'serviciosMasSolicitados']
)
    ->middleware(['auth', 'role:admin'])
    ->name('reportes.servicios');
Route::get(
    '/reportes/especialistas',
    [DashboardController::class, 'especialistasMasSolicitadas']
)
    ->middleware(['auth', 'role:admin'])
    ->name('reportes.especialistas');
Route::get(
    '/reportes/inventario-bajo',
    [DashboardController::class, 'inventarioBajo']
)
    ->middleware(['auth', 'role:admin'])
    ->name('reportes.inventario');
Route::get(
    '/reportes/ingresos',
    [DashboardController::class, 'ingresosEstimados']
)
    ->middleware(['auth', 'role:admin'])
    ->name('reportes.ingresos');

// Exportes PDF y Excel
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/reportes/citas/pdf', [DashboardController::class, 'exportCitasPDF'])->name('reportes.citas.pdf');
    Route::get('/reportes/citas/excel', [DashboardController::class, 'exportCitasExcel'])->name('reportes.citas.excel');
    Route::get('/reportes/servicios/pdf', [DashboardController::class, 'exportServiciosPDF'])->name('reportes.servicios.pdf');
    Route::get('/reportes/servicios/excel', [DashboardController::class, 'exportServiciosExcel'])->name('reportes.servicios.excel');
    Route::get('/reportes/especialistas/pdf', [DashboardController::class, 'exportEspecialistasPDF'])->name('reportes.especialistas.pdf');
    Route::get('/reportes/especialistas/excel', [DashboardController::class, 'exportEspecialistasExcel'])->name('reportes.especialistas.excel');
    Route::get('/reportes/inventario/pdf', [DashboardController::class, 'exportInventarioPDF'])->name('reportes.inventario.pdf');
    Route::get('/reportes/inventario/excel', [DashboardController::class, 'exportInventarioExcel'])->name('reportes.inventario.excel');
    Route::get('/reportes/ingresos/pdf', [DashboardController::class, 'exportIngresosPDF'])->name('reportes.ingresos.pdf');
    Route::get('/reportes/ingresos/excel', [DashboardController::class, 'exportIngresosExcel'])->name('reportes.ingresos.excel');
});

// Autenticación
require __DIR__ . '/auth.php';
