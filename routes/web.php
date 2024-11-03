<?php

use App\Exports\AttendanceExport;
use App\Livewire\Presensi;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::group(['middleware' => 'auth'], function() {
    Route::get('/presensi', Presensi::class)->name('presensi');
    Route::get('/attendance/export', function () {
        return Excel::download(new AttendanceExport, 'attendance.xlsx');
    })->name('attendance-export');
});

Route::get('/login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});
