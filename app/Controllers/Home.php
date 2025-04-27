<?php

namespace App\Controllers;

use App\Models\DocterModel;
use App\Models\PasienModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('landing/index');
    }

    public function treatments(){
        return view('landing/treatment');
    }
    public function abouts(){
        return view('landing/about');
    }
    public function dokters(){
        
        $mdokter = new DocterModel();
        $data=[
            'data' => $mdokter->findAll()
        ];
        return view('landing/doctor',$data);
    }

    public function testimonials(){
        return view('landing/testimonial');
    }
    public function contacts(){
        return view('landing/contact');
    }

    public function registers(){
        return view('landing/register');
    }
}
