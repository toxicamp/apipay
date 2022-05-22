<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','2fa']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the application yourSelf.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function yourSelf()
    {
        return view('yourself');
    }

    /**
     * Show the application apiDocument.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apiDocument()
    {
        return view('apidocument');
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('contact');
    }


}
