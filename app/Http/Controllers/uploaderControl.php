<?php

namespace App\Http\Controllers;

use App\Models\table_restaurant;
use Image;
use App\Images;
use App\Models\login_images;
use App\Models\table_menu;
use App\Models\tbl_menu;
use Illuminate\Support\Facades\Response;
use App\Models\tbl_retaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class uploaderControl extends Controller
{
    public function upldImgRest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tagline' => 'required',
            'image' => 'required'
        ]);
        $rest_img = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');

            $destinationPath = 'images/restaurant';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $rest_img['image'] = $profileImage;
        }
        table_restaurant::insert([
            'name' => $rest_img['name'],
            'tagline' => $rest_img['tagline'],
            'image' => $rest_img['image']
        ]);
        return redirect(route('uploader.restaurant'));
    }
    public function uploadimage_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);
        $login_imgs = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');

            $destinationPath = 'images/loginimg';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $login_imgs['image'] = $profileImage;
        }
        login_images::insert([
            'name' => $login_imgs['name'],
            'image' => $login_imgs['image']
        ]);
        return redirect(route('login'));
    }
    public function uploadimage_menu(Request $request)
    {
        $yes = 'Yes';
        $no = 'No';

        $request->validate([
            'restaurantname' => 'required',
            'bestseller' => 'required',
            'category'=> 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $menus = $request->all();
        if ($request->file('image')) {
            $image = $request->file('image');

            $destinationPath = 'images/menu';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $menus['image'] = $profileImage;
        }

        if ($menus['bestseller'] === $no) {
            table_menu::insert([
                'restaurantname' => $menus['restaurantname'],
                'bestseller'=> $no,
                'name' => $menus['name'],
                'categories' => $menus['category'],
                'price' => $menus['price'],
                'image' => $menus['image']
            ]);
        } else {
            table_menu::insert([
                'restaurantname' => $menus['restaurantname'],
                'bestseller'=> $yes,
                'name' => $menus['name'],
                'categories' => $menus['category'],
                'price' => $menus['price'],
                'image' => $menus['image']
            ]);
        }
        return redirect(route('uploader.menu'))->with('message', 'You have Register new menu.');
    }
}
