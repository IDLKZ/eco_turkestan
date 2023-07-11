<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index(){
        $files = Storage::disk('local')->allFiles('backups');
        return view("admin.backups.index",compact("files"));
    }
}
