<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu cho carousel và thông báo
        $carouselImages = ['admin_assets/img/2-p.jpg']; // Điền vào danh sách tên ảnh
        $notifications = ['admin_assets/img/2-p.jpg']; // Điền vào danh sách thông báo

        return view('home', compact('carouselImages', 'notifications'));
    }
}
