<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        // fetch all packages from the database
        $packages = Package::all();

        // return to the view with packages data
        return view('packages.index', compact('packages'));
    }
    public function show($id)
{
    $package = Package::findOrFail($id);
    return view('packages.show', compact('package'));
}
}
