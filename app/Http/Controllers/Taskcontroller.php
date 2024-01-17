<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Taskcontroller extends Controller
{
    public function index(){
        return view('Task.index');
        // dd('index is Called');
    }
    public function create(){
        dd('index is Called');
    }
    public function store(){
        dd('store is Called');
    }
    public function show(){
        dd('show is Called');
    }
    public function edit(){
        dd('edit is Called'); 
    }
    public function update(){
        dd('update is Called');   
    }
    public function destroy(){
        dd('destroy is Called');   
    }



}
