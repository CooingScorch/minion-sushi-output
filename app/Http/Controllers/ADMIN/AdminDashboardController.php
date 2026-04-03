<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class AdminDashboardController extends Controller
{
    /**
     * Home page — shows language modal if not yet chosen,
     * and pax modal if pax not yet set in session.
     */

    //Admin Page Dashboard
    public function showAdminDashboard()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
    }

    //Admin Update Password
        public function showChangePassword()
    {
        return view('admin.admin-update-password'); 
    }

    public function updatePassword(Request $request)
    {
        $user = DB::table('users')->where('id', $user = Auth::user()->id)->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('pw_error', 'Current password is incorrect.');
        }

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                            ->letters()
                            ->mixedCase()
                            ->numbers()
                            ->symbols()],
        ]);

        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('AdminDashboard')->with('success', 'Password updated successfully!'); 
    }

    //Admin Page Customer List
    public function showCustomerList() 
    {
        $customers = DB::table('users')->where('role', 'user')->get();
        return view('admin.customer-list', compact('customers'));
    }

    //Admin Page Staff List edit and update
    public function editCustomer($id)
    {
        $member = DB::table('users')->where('id', $id)->first();
        return view('admin.edit-customer', compact('member'));
    }

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([
        'name'     => 'required',
        'gender'   => 'required',
        'phone'    => ['required', 'regex:/^[0-9]{10,11}$/'],
        'birthday' => 'required|date|before:today',
        'email'    => 'required|email|unique:users,email,' . $id,
        ],
        [
        'phone.required' => 'Phone number is required.',
        'phone.regex'    => 'Phone must be 10 or 11 digits only, no dashes.',
        ]);

        DB::table('users')->where('id', $id)->update([
            'name'     => $request->name,
            'gender'   => $request->gender,
            'phone'    => $request->phone,
            'birthday' => $request->birthday,
            'email'    => $request->email,
        ]);
        return redirect()->route('admin.customer-list')->with('success', 'Customer updated successfully!');
    }

    //Admin Page Delete Customer List
    public function deleteCustomer($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.customer-list')->with('success', 'Customer deleted successfully.');
    }

    //Admin Page Staff List
    public function showStaffList() 
    {
        $staff = DB::table('users')->where('role', 'admin')->get();
        return view('admin.staff-list', compact('staff'));
    }

    //Admin Page Staff List edit and update
    public function editStaff($id)
    {
        $member = DB::table('users')->where('id', $id)->first();
        return view('admin.edit-staff', compact('member'));
    }

    public function updateStaff(Request $request, $id)
    {
        $request->validate([
        'name'     => 'required',
        'gender'   => 'required',
        'phone'    => ['required', 'regex:/^[0-9]{10,11}$/'],
        'birthday' => 'required|date|before:today',
        'email'    => 'required|email|unique:users,email,' . $id,
        ],
        [
        'phone.required' => 'Phone number is required.',
        'phone.regex'    => 'Phone must be 10 or 11 digits only, no dashes.',
        ]);

        DB::table('users')->where('id', $id)->update([
            'name'     => $request->name,
            'gender'   => $request->gender,
            'phone'    => $request->phone,
            'birthday' => $request->birthday,
            'email'    => $request->email,
        ]);
        return redirect()->route('admin.staff-list')->with('success', 'Staff updated successfully!');
    }

    //Admin Page Delete Staff List
    public function deleteStaff($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.staff-list')->with('success', 'Staff deleted successfully.');
    }

    //Admin Page Add Drop Menu Page
    public function showAddDropMenu() 
    {
        $page = 'Add/Drop Menu';
        $icon = '🍱';

        $products = DB::table('menu-lists')->get();
        return view('admin.add-drop', compact('page', 'icon', 'products'));
    }

    public function createMenuItem()
    {
        $page = 'Add/Drop Menu';
        $icon = '🍱';

        return view('admin.add-drop(add)', compact('page', 'icon'));
    }

    public function addMenuItem(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'available' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,avif|max:2048'
        ]);

        $image_path = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path("img/menu"),$imageName );
            $image_path = 'img/menu/'.$imageName;
        }

        DB::table('menu-lists')->insert([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'available' => $request->available,
            'description' => $request->description,
            'image' => $image_path,
        ]);

        return redirect()->route('admin.add-drop-menu')->with('success', 'Item added successfully.');
    }

    public function editMenuItem($id)
    {
        $product = DB::table('menu-lists')->where('id', $id)->first();
        return view('admin.add-drop(edit)', compact('product'));
    }

    public function updateMenuItem(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'available' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,webp,avif|max:2048'
        ]);

        $old_Item = DB::table('menu-lists')->where('id', $id)->first();
        $image_path = $old_Item->image;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path("img/menu"),$imageName );

            $image_path = 'img/menu/'.$imageName;
        }

        DB::table('menu-lists')->where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'available' => $request->available,
            'description' => $request->description,
            'image' => $image_path,
        ]);

        return redirect()->route('admin.add-drop-menu')->with('success', 'Item added successfully.');
    }

    public function deleteMenuItem($id)
    {
        DB::table('menu-lists')->where('id', $id)->delete();
        return redirect()->route('admin.add-drop-menu')->with('success', 'Item deleted successfully.');
    }


    //Admin Page Order Log Page
    public function showOrderLog() 
    {
        $page = 'Order Log';
        $icon = '🧾';
        $orderLog = DB::table('order_log')->get();
        return view('admin.orderLog', compact('page', 'icon', 'orderLog'));
    }
    //Admin Page Ordered Items Page
    public function showOrderItems() 
    {
        $page = 'Order Items';
        $icon = '🧾';
        $orderItems = DB::table('order_items')
            ->join('order_log', 'order_items.order_log_id', '=', 'order_log.id')
            ->select('order_items.*', 'order_log.table_number') // We grab the table_id from the receipt
            ->orderBy('order_items.id', 'desc') // Puts newest food at the top
            ->get();
        return view('admin.orderItems', compact('page', 'icon','orderItems'));
    }

}