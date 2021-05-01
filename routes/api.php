<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/convenios/listar', [App\Http\Controllers\SimuladorController::class, 'listarConvenios']);
Route::get('/instituicoes/listar', [App\Http\Controllers\SimuladorController::class, 'listarInstituicoes']);
Route::post('/emprestimo/simular', [App\Http\Controllers\SimuladorController::class, 'simularEmprestimo']);