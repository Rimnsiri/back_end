<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RejectedTest;

class RejectedTestController extends Controller
{
    // Méthode pour afficher la liste des tests rejetés
    public function index()
    {
        $rejectedTests = RejectedTest::all();
        return view('rejected_tests.index', ['rejectedTests' => $rejectedTests]);
    }
}
