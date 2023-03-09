<?php

namespace App\Controllers;

use App\Models\LayoutModel;

class Contact extends BaseController
{
    protected $layoutModel;
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->layoutModel = new LayoutModel();
    }
    public function index()
    {

        $data = [
        ];
        // return view('welcome_message');
        return view('/pages/contact', $data);
    }
}
