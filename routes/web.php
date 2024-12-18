<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PharmacyStaffController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\MedicineDataController;
use App\Http\Controllers\TrainingAndSupportController;
use App\Http\Controllers\Auth\PharmacyStaffAuthController;
use App\Http\Controllers\Auth\ClientAuthController;
use App\Http\Controllers\ClientHomeController;

Route::get('/home', [ClientHomeController::class, 'index'])->name('home')->middleware('auth:pharmacy_staff');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');



// ====================== PHARMACY STAFF ROUTES ======================


Route::get('/pharmacyStaff/actions/{id}', [PharmacyStaffController::class, 'showAction'])->name('pharmacyStaff.actions.show')->middleware('auth:pharmacy_staff');
Route::post('index', [PharmacyStaffController::class, 'showClient'])->name('pharmacyStaff.showClient')->middleware('auth:pharmacy_staff');

Route::get('clients/create', [PharmacyStaffController::class, 'createClient'])->name('pharmacyStaff.createClient')->middleware('auth:pharmacy_staff');
Route::post('clients', [PharmacyStaffController::class, 'storeClient'])->name('pharmacyStaff.storeClient')->middleware('auth:pharmacy_staff');
Route::get('clients/{id}/edit', [PharmacyStaffController::class, 'editClient'])->name('pharmacyStaff.editClient')->middleware('auth:pharmacy_staff');
Route::put('clients/{id}', [PharmacyStaffController::class, 'updateClient'])->name('pharmacyStaff.updateClient')->middleware('auth:pharmacy_staff');
Route::get('clients/{id}/prescriptions/create', [PharmacyStaffController::class, 'createPrescription'])->name('pharmacyStaff.createPrescription')->middleware('auth:pharmacy_staff');
Route::post('clients/{id}/prescriptions', [PharmacyStaffController::class, 'storePrescription'])->name('pharmacyStaff.storePrescription')->middleware('auth:pharmacy_staff');
Route::get('clients/{id}/edit-contact', [PharmacyStaffController::class, 'editContactDetails'])->name('pharmacyStaff.editContactDetails')->middleware('auth:pharmacy_staff');
Route::put('clients/{id}/edit-contact', [PharmacyStaffController::class, 'updateContactDetails'])->name('pharmacyStaff.updateContactDetails')->middleware('auth:pharmacy_staff');
Route::get('clients/{id}/edit-private', [PharmacyStaffController::class, 'editPrivateDetails'])->name('pharmacyStaff.editPrivateDetails')->middleware('auth:pharmacy_staff');
Route::put('clients/{id}/edit-private', [PharmacyStaffController::class, 'updatePrivateDetails'])->name('pharmacyStaff.updatePrivateDetails')->middleware('auth:pharmacy_staff');
Route::get('clients/{id}/edit-medical-history', [PharmacyStaffController::class, 'editMedicalHistory'])->name('pharmacyStaff.editMedicalHistory')->middleware('auth:pharmacy_staff');
Route::put('clients/{id}/edit-medical-history', [PharmacyStaffController::class, 'updateMedicalHistory'])->name('pharmacyStaff.updateMedicalHistory')->middleware('auth:pharmacy_staff');
                           Route::get('/clientso', [PharmacyStaffController::class, 'indexo'])->name('clientso')->middleware('auth:pharmacy_staff');
Route::get('/pharmacyStaff/clients/{id}', [PharmacyStaffController::class, 'showClient'])->name('pharmacyStaff.showClient')->middleware('auth:pharmacy_staff');
Route::get('/medicines', [PharmacyStaffController::class, 'indexMedicines'])->name('pharmacyStaff.medicines.index')->middleware('auth:pharmacy_staff');
Route::get('/medicines/create', [PharmacyStaffController::class, 'createMedicine'])->name('pharmacyStaff.medicines.create')->middleware('auth:pharmacy_staff');
Route::post('/medicines', [PharmacyStaffController::class, 'storeMedicine'])->name('pharmacyStaff.medicines.store')->middleware('auth:pharmacy_staff');
Route::get('/medicines/{id}', [PharmacyStaffController::class, 'showMedicine'])->name('pharmacyStaff.medicines.show')->middleware('auth:pharmacy_staff');
Route::delete('/medicines/{id}', [PharmacyStaffController::class, 'destroyMedicine'])->name('pharmacyStaff.medicines.destroy')->middleware('auth:pharmacy_staff');

    // In web.php (or routes file)
Route::prefix('pharmacyStaff/inventory')->middleware('auth:pharmacy_staff')->group(function () {
    Route::get('/', [PharmacyStaffController::class, 'inventoryIndex'])->name('pharmacyStaff.inventory.index');
    Route::get('/create', [PharmacyStaffController::class, 'inventoryCreateView'])->name('pharmacyStaff.inventory.create');
    Route::post('/store', [PharmacyStaffController::class, 'inventoryStore'])->name('pharmacyStaff.inventory.store');
    Route::get('/{medicine_id}/edit', [PharmacyStaffController::class, 'inventoryEditView'])->name('pharmacyStaff.inventory.edit'); // Expect medicine_id instead of id
    Route::put('/{medicine_id}', [PharmacyStaffController::class, 'inventoryUpdate'])->name('pharmacyStaff.inventory.update');
    Route::delete('/{medicine_id}', [PharmacyStaffController::class, 'inventoryDestroy'])->name('pharmacyStaff.inventory.destroy');
});

Route::prefix('pharmacyStaff/trainings')->middleware('auth:pharmacy_staff')->group(function () {
    Route::get('/', [PharmacyStaffController::class, 'trainingsIndex'])->name('pharmacyStaff.trainings.index');
    Route::get('/create', [PharmacyStaffController::class, 'trainingsCreateView'])->name('pharmacyStaff.trainings.create');
    Route::post('/store', [PharmacyStaffController::class, 'trainingsStore'])->name('pharmacyStaff.trainings.store');
    Route::get('/{training_id}', [PharmacyStaffController::class, 'trainingsShow'])->name('pharmacyStaff.trainings.show');
    Route::get('/{training_id}/edit', [PharmacyStaffController::class, 'trainingsEditView'])->name('pharmacyStaff.trainings.edit');
    Route::put('/{training_id}', [PharmacyStaffController::class, 'trainingsUpdate'])->name('pharmacyStaff.trainings.update');
    Route::delete('/{training_id}', [PharmacyStaffController::class, 'trainingsDestroy'])->name('pharmacyStaff.trainings.destroy');
});

Route::prefix('pharmacyStaff/support')->middleware('auth:pharmacy_staff')->group(function () {
    Route::get('/basic', [PharmacyStaffController::class, 'basicSupport'])->name('pharmacyStaff.support.basic');
    Route::get('/advanced', [PharmacyStaffController::class, 'advancedSupport'])->name('pharmacyStaff.support.advanced');
});

Route::prefix('pharmacy-staff/reports')->middleware('auth:pharmacy_staff')->group(function () {
    Route::get('/', [PharmacyStaffController::class, 'reportsIndex'])->name('pharmacyStaff.reports.index');
    Route::get('/create', [PharmacyStaffController::class, 'reportsCreateView'])->name('pharmacyStaff.reports.create');
    Route::post('/store', [PharmacyStaffController::class, 'reportsStore'])->name('pharmacyStaff.reports.store');
    Route::get('/{id}', [PharmacyStaffController::class, 'reportsShow'])->name('pharmacyStaff.reports.show');
    Route::get('/{id}/edit', [PharmacyStaffController::class, 'reportsEditView'])->name('pharmacyStaff.reports.edit');
    Route::put('/{id}', [PharmacyStaffController::class, 'reportsUpdate'])->name('pharmacyStaff.reports.update');
    Route::delete('/{id}', [PharmacyStaffController::class, 'reportsDestroy'])->name('pharmacyStaff.reports.destroy');
});





Route::prefix('client')->name('auth.client.')->group(function () {
    Route::get('login', [ClientAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [ClientAuthController::class, 'login']); // POST route
    Route::get('register', [ClientAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [ClientAuthController::class, 'register']);
    Route::post('logout', [ClientAuthController::class, 'logout'])->name('logout');
});
Route::get('profile', [ClientController::class, 'accessInfo'])->name('profile')->middleware('auth:client');
Route::get('prescription', [ClientController::class, 'showprescriptions'])->name('clientPrescription')->middleware('auth:client');

Route::get('editContactDetails', [ClientController::class, 'editContactDetails'])->name('editContact')->middleware('auth:client');
Route::put('updateContactDetails', [ClientController::class, 'updateContactDetails'])->name('updateContactDetails')->middleware('auth:client');

// ========================== CLIENT HOME ROUTE ==========================
    Route::get('clienthome', [ClientController::class, 'index'])->name('clienthome')->middleware('auth:client');


// });


// ===================== PHARMACY STAFF AUTH ROUTES =====================
Route::prefix(
'staff')->name('staff.')->group(function () {
    Route::get('login', [PharmacyStaffAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [PharmacyStaffAuthController::class, 'login']);
    Route::get('register', [PharmacyStaffAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [PharmacyStaffAuthController::class, 'register']);
    Route::post('logout', [PharmacyStaffAuthController::class, 'logout'])->name('logout');
});

