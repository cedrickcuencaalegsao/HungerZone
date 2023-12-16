<?php

namespace App\Http\Controllers;

use App\Models\table_delivery;
use App\Models\table_users;
use Carbon\Carbon;
use App\Models\User;
use App\Models\tbl_menu;
use App\Models\table_cart;
use App\Models\table_menu;
use App\Models\login_images;
use Illuminate\Http\Request;
use App\Models\table_restaurant;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class WebController extends Controller
{
    //
    //
    // Admin routes.
    //
    //
    public function view_adminhome()
    {
        // tables to be counted.
        $restaurant = table_restaurant::all();
        $menu = table_menu::all();
        $user = User::all();

        // delivery table
        $dlvry = table_delivery::all()->sortBy('status');

        $count_restaurant = count($restaurant);
        $count_menu = count($menu);
        $count_user = count($user);

        return view('AdminPage.adminpages.adminhome', compact('count_restaurant', 'count_menu', 'count_user', 'dlvry'));
    }
    public function changeStatus(string $id)
    {
        $id = decrypt($id);
        $updated_at = Carbon::now()->toDateString();
        if ($id != null) {
            table_delivery::find($id)->update([
                'status' => 1,
                'updated_at' => $updated_at
            ]);
        } else {
            return redirect(route('view.admin'));
        }
        return redirect(route('view.admin'));
    }
    public function view_users()
    {
        $data = User::all();
        return view('AdminPage.adminpages.users', compact('data'));
    }
    public function uploader_menu()
    {
        $restaurantnames = DB::table('table_restaurant')->get();
        $data = table_menu::all();
        return view('AdminPage.uploaderspages.menu', compact('restaurantnames', 'data'));
    }
    public function uploaderloginimages()
    {
        $data = login_images::all();
        return view('AdminPage.uploaderpages.loginuploader', compact('data'));
    }
    public function uploader_restaurant()
    {
        $data = table_restaurant::all();
        return view('AdminPage.uploaderspages.restaurant', compact('data'));
    }
    public function uploadimage_menu(Request $request)
    {
        $id = table_menu::select('id')->get();
        if (count($id) > 0) {
            $menu_id = table_menu::orderBy('id', 'desc')->first();
            $menu_id = $menu_id->id + 1;
        } else {
            $menu_id = 1;
        }
        $menu_val = table_menu::where('name', $request->name)->get();
        $count = count($menu_val);
        $created_at = Carbon::now()->toDateString();
        $yes = 'Yes';
        $no = 'No';
        $request->validate([
            'restaurantname' => 'required',
            'bestseller' => 'required',
            'category' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        if ($count == 0) {
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
                    'id' => $menu_id,
                    'restaurantname' => $menus['restaurantname'],
                    'bestseller' => $no,
                    'name' => $menus['name'],
                    'categories' => $menus['category'],
                    'price' => $menus['price'],
                    'image' => $menus['image'],
                    'created_at' => $created_at
                ]);
            } else {
                table_menu::insert([
                    'id' => $menu_id,
                    'restaurantname' => $menus['restaurantname'],
                    'bestseller' => $yes,
                    'name' => $menus['name'],
                    'categories' => $menus['category'],
                    'price' => $menus['price'],
                    'image' => $menus['image'],
                    'created_at' => $created_at
                ]);
            }
        } else {
            return redirect(route('uploader.menu'))->with('message', 'Menu already registered.');
        }
        return redirect(route('uploader.menu'))->with('message', 'You have Register new menu.');
    }
    public function delMenu(string $id, string $image)
    {
        $data = table_menu::where('id', $id)->get();
        $count = count($data);
        if ($count != 0) {
            table_menu::where('id', $id)->delete(); //delete rows in the database.
            File::delete(public_path('images/menu/' . $image)); //delete image from its directory
        }
        return $this->uploader_menu()->with('message', 'Menu deleted successfully.');
    }
    public function editMenu(string $id)
    {
        $data = table_menu::where('id', $id)->first();
        $restaurant = table_restaurant::all();
        return view('AdminPage.adminpages.updatemenu', compact('data', 'restaurant'));
    }
    public function updateMenu(Request $request, string $id, string $image)
    {
        $updated_at = Carbon::now()->toDateString();
        $request->validate([
            'menuname' => 'required',
            'category' => 'required',
            'price' => 'required',
            'restaurantname' => 'required'
        ]);
        $data = $request->all();
        if ($request->file('image') == null) {
            table_menu::find($id)->update([
                'bestseller' => $data['bestseller'],
                'restaurantname' => $data['restaurantname'],
                'categories' => $data['category'],
                'name' => $data['menuname'],
                'price' => $data['price'],
                'updated_at' => $updated_at
            ]);
        } else {
            File::delete(public_path('images/menu/' . $image));
            $image = $request->file('image');
            $destinationPath = 'images/menu';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;

            table_menu::find($id)->update([
                'bestseller' => $data['bestseller'],
                'restaurantname' => $data['restaurantname'],
                'categories' => $data['category'],
                'name' => $data['menuname'],
                'price' => $data['price'],
                'image' => $data['image'],
                'updated_at' => $updated_at
            ]);
        }
        return $this->uploader_menu()->with('message', 'Menu Updated successfully.');
    }
    public function uploadimage_login(Request $request)
    {
        $created = Carbon::now()->toDateString();
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
            'image' => $login_imgs['image'],
            'created_at' => $created
        ]);
        return $this->uploaderloginimages();
    }
    public function delLoginImg(string $id, string $image)
    {
        $data = login_images::where('id', $id)->get();
        $count = count($data);
        if ($count != 0) {
            login_images::where('id', $id)->delete();
            File::delete(public_path('images/loginimg/' . $image));
        }
        return $this->updateLoginImg()->with('message', 'Image successfully Deleted.');
    }
    public function editLoginImg(string $id)
    {
        $data = login_images::where('id', $id)->first();
        return view('AdminPage.adminpages.updateLoginImg', compact('data'));
    }
    public function updateLoginImg(Request $request, string $id, string $image)
    {
        $updated_at = Carbon::now()->toDateString();
        $request->validate([
            'restaurantname' => 'required'
        ]);
        $data = $request->all();
        if ($request->file('image') === null) {
            login_images::find($id)->update([
                'name' => $data['restaurantname'],
                'updated_at' => $updated_at
            ]);
        } else {
            File::delete(public_path('images/loginimg/' . $image));
            $image = $request->file('image');
            $destinationPath = 'images/loginimg';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;

            login_images::find($id)->update([
                'name' => $data['restaurantname'],
                'image' => $data['image'],
                'updated_at' => $updated_at
            ]);
        }
        return $this->uploaderloginimages()->with('message', 'Login Images and details successfully updated.');
    }
    public function upldImgRest(Request $request)
    {
        $rest_count = table_restaurant::where('restaurantname', $request->name)->get();
        $count = count($rest_count);
        $created_at = Carbon::now()->toDateString();

        if ($count === 0) {
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
                'restaurantname' => $rest_img['name'],
                'tagline' => $rest_img['tagline'],
                'image' => $rest_img['image'],
                'created_at' => $created_at
            ]);
        } else {
            return redirect(route('uploader.restaurant'))->with('message', 'Restaurant already registered.');
        }
        return redirect(route('uploader.restaurant'))->with('message', 'Restaurant successfully registered.');
    }
    public function delRestaurant(string $id, string $image)
    {
        $data = table_restaurant::where('id', $id)->where('image', $image)->get();
        $count = count($data);
        if ($count != 0) {
            table_restaurant::where('id', $id)->delete();
            File::delete(public_path('images/restaurant/' . $image));
        }
        return $this->uploader_restaurant();
    }
    public function editRestaurant(Request $request, string $id)
    {
        $data = table_restaurant::where('id', $id)->first();
        return view('AdminPage.adminpages.updaterestaurant', compact('data'));
    }
    public function updateRestuarant(Request $request, string $id, string $image)
    {
        $data = $request->all();
        $updated_at = Carbon::now()->toDateString();
        $request->validate([
            'name' => 'required',
            'tagline' => 'required'
        ]);
        if ($request->file('image') === null) {
            table_restaurant::find($id)->update([
                'restuarantname' => $data['name'],
                'tagline' => $data['tagline'],
                'updated_at' => $updated_at
            ]);
        } else {
            File::delete(public_path('images/restaurant/' . $image));
            $image = $request->file('image');
            $destinationPath = 'images/restaurant';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;

            table_restaurant::find($id)->update([
                'restaurantname' => $data['name'],
                'tagline' => $data['tagline'],
                'image' => $data['image'],
                'updated_at' => $updated_at
            ]);
        }
        return $this->uploader_restaurant()->with('message', 'Restaurant Updated successfully.');
    }

    //
    //
    // Client routes.
    //
    //
    public function f_login()
    {
        $login_imgs = login_images::all();
        return view('pages.login', compact('login_imgs'));
    }
    public function f_reg()
    {
        return view('pages.register');
    }
    public function cancel_reg()
    {
        return $this->f_login();
    }
    public function view_cart(string $user_id)
    {
        $user_id = decrypt($user_id);
        $data = table_cart::where('created_by', $user_id)->get();
        return view('homePages.cart', compact('data'));
    }
    public function view_delivery(string $user_id)
    {
        $user_id = decrypt($user_id);
        $data = table_delivery::where('created_by', $user_id)->where('status', 0)->get();
        return view('homePages.delivery', compact('data'));
    }
    public function cancel_delivery(string $id)
    {
        $data = table_delivery::where('id', $id)->get();
        $count = count($data);
        if ($count != 0) {
            table_delivery::where('id', $id)->delete();
        }
        return redirect(route('view.delivery', ['user_id' => encrypt(auth()->user()->id)]));
    }
    public function view_history(string $user_id)
    {
        $id = decrypt($user_id);
        $data = table_delivery::where('created_by', $id)->where('status', 1)->get();
        return view('homePages.h', compact('data'));
    }
    public function delHistory(string $id, string $user_id)
    {
        $order_id = decrypt($id);
        if ($order_id != null) {
            table_delivery::where('id', $order_id)->delete();
        }
        return redirect(route('view.history', $user_id));
    }
    public function view_profile()
    {
        $cart = table_cart::all();
        $menu = table_menu::all();
        $menuCount = count($menu);
        $cartCount = count($cart);
        $data = [$menuCount, $cartCount];
        return view('homePages.profile', compact('data'));
    }
    public function view_jMenu(string $category, string $restaurant, string $bestseller)
    {
        $data = table_menu::where('restaurantname', $restaurant)->get();
        $menu = [];
        $restaurant_menu = [];
        foreach ($data as $key => $value) {
            $menu[] = $value->categories;
            if ($category == 'null') {
                if ($value->bestseller == $bestseller) {
                    $restaurant_menu[] = $value;
                }
            } else {
                if ($value->categories == $category) {
                    $restaurant_menu[] = $value;
                }
            }
        }
        $menu = array_unique($menu);
        return view('menupages.menu', compact('menu', 'restaurant_menu', 'restaurant'));
    }
    public function AddToCart(string $user_id, string $image, string $menu_name, string $restaurant, string $price)
    {
        $user_id = decrypt($user_id);
        $created_at = Carbon::now()->toDateString();
        $data = table_cart::where('menu_name', $menu_name)->where('created_by', $user_id)->get();
        $data_count = count($data);
        if ($data_count == 0) {
            if ($user_id != 0) {
                table_cart::insert([
                    'created_by' => $user_id,
                    'image' => $image,
                    'menu_name' => $menu_name,
                    'restaurant_name' => $restaurant,
                    'price' => $price,
                    'created_at' => $created_at
                ]);
            }
        } else {
            return redirect(route('view.cart', ['user_id' => encrypt(auth()->user()->id)]));
        }
        return redirect(route('view.cart', ['user_id' => encrypt(auth()->user()->id)]));
    }
    public function removeFromCart(string $user_id, string $cart_id)
    {
        $user_id = decrypt($user_id);
        $data = table_cart::where('created_by', $user_id)->get();
        $count = count($data);
        if ($count != 0) {
            table_cart::where('id', $cart_id)->delete();
        }
        return $this->view_cart(encrypt($user_id));
    }
    public function orderNow(string $menu_name, string $restaurant, string $image, string $price)
    {
        $date = Carbon::now()->toDateString();
        $data = table_menu::where('restaurantname', $restaurant)->where('name', $menu_name)->first();
        return view('menupages.order', compact('data', 'date'));
    }
    public function order(Request $request, string $user_id, string $image)
    {
        $created_at = Carbon::now()->toDateString();
        $request->validate([
            'menuid' => 'required',
            'orderdate' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'mName' => 'required',
            'address' => 'required',
            'totalamount' => 'required'
        ]);
        $data = $request->all();
        table_delivery::insert([
            'created_by' => $user_id,
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'image' => $image,
            'menu_name' => $data['mName'],
            'restaurant_name' => $data['rname'],
            'price' => $data['price'],
            'address' => $data['address'],
            'status' => 0,
            'quantity' => $data['quantity'],
            'total_amount' => $data['totalamount'],
            'created_at' => $created_at
        ]);
        return redirect(route('view.delivery', ['user_id' => encrypt(auth()->user()->id)]));
    }
    public function show_home()
    {
        if (auth::check()) {
            $rest_img = table_restaurant::all();
            return view('homePages.home', compact('rest_img'));
        }
    }
    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('home')->with('message', 'Login Successful!');
        }
        return redirect('login')->with('message', 'Login Failed!');
    }
    public function validateRegister(Request $request)
    {
        $created_at = Carbon::now()->toDateString();
        $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'PhoneNumber' => 'required',
            'Email' => 'required|email|unique:users',
            'Password' => 'required|min:6',
            'ConfirmPassword' => 'required'
        ]);
        $data = $request->all();
        if ($data['Password'] === $data['ConfirmPassword']) {
            User::insert([
                'firstname' => $data['FirstName'],
                'lastname' => $data['LastName'],
                'phone' => $data['PhoneNumber'],
                'email' => $data['Email'],
                'password' => Hash::make($data['Password']),
                'image' => 0,
                'created_at' => $created_at
            ]);
            return redirect()->intended('login')->with(
                'message',
                'Please try to Login.'
            );
        } else {
            return redirect('register')->with('message', 'Password did not match.');
        }
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    public function editProfile(string $id)
    {
        $user_id = decrypt($id);
        $data = User::where('id', $user_id)->first();
        return view('homePages.updateprofile', compact('data'));
    }
    public function updateProfile(Request $request, string $id, string $image)
    {

        $updated_at = Carbon::now()->toDateString();
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        $data = $request->all();
        if ($request->file('image') === null) {
            User::find($id)->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'updated_at' => $updated_at
            ]);
        } elseif ($request->file('image')) {
            File::delete(public_path('images/user/' . $image));
            $image = $request->file('image');
            $destinationPath = 'images/user';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = $profileImage;
            User::find($id)->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'image' => $data['image'],
                'updated_at' => $updated_at
            ]);
        } else {
            dd("update profile details only");
        }
        return redirect(route('view.profile', ['id' => $id]));
    }
    public function cancelUpdateProfile()
    {
        return redirect(route('view.profile'));
    }
    public function viewSearchEmail()
    {
        return view('pages.searchemail');
    }
    public function searchEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->email;
        $searchEmail = User::where('email', $email)->get();
        $count = count($searchEmail);
        if ($count == 0) {
            return redirect(route('view.search.email'))->with('message', 'Email not found.');
        } else {
            return redirect(route('view.change.password', ['email' => $email]))->with('message', 'Email found.');
        }
    }
    public function viewChangePassword(string $email)
    {
        $data = User::where('email', $email)->first();
        return view('pages.changepass', compact('data'));
    }
    public function changePassword(Request $request, string $id)
    {
        $id = decrypt($id);
        $request->validate([
            'email' => 'required|email',
            'newpassword' => 'required|min:6',
            'confirmpass' => 'required|min:6'
        ]);
        $newpwd = $request->newpassword;
        $cfrmpwd = $request->confirmpass;
        if ($newpwd === $cfrmpwd) {
            User::find($id)->update([
                'password' => $newpwd
            ]);
            return redirect(route('login'))->with('message', 'Password Change!..');
        } else {
            return redirect(route('view.change.password'))->with('message', 'Confirm password did not match');
        }
    }
}
