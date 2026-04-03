<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;      // hashing
use Illuminate\Support\Facades\Session;   //remember user login status
use Illuminate\Validation\Rules\Password; //only can use strong password rule
use PHPMailer\PHPMailer\PHPMailer;        //forget password send email
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Home page — shows language modal if not yet chosen,
     * and pax modal if pax not yet set in session.
     */

//login page
public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
              ->where('email', $request->email)
              ->first();

        if($user && Hash::check($request->password, $user->password))
            {
                $userModel = \App\Models\User::find($user->id);
                Auth::login($userModel);

                if($user->role === 'admin') 
                {
                    return redirect('/dashboard');
                }
                return redirect('/home');
            }

            return back()->with('error', 'Incorrect username or password');
    }

// Show Register Page
public function showRegister()
    {
        return view('pages.register');
    }

// Register Page
public function register(Request $request)
{
    $request->validate([
        'name'     => 'required',
        'gender'   => 'required',
        'phone'    => ['required', 'regex:/^[0-9]{10,11}$/'],
        'birthday' => 'required|date|before:today',
        'email'    => 'required|email|unique:users',
        'password' => ['required', 'confirmed', Password::min(8)
                        ->letters()       // must have letter
                        ->mixedCase()     // must mixed up and lower case
                        ->numbers()       // must have number
                        ->symbols()],     // must have symbol
    ]);

DB::table('users')->insert([
        'name'       => $request->name,
        'gender'     => $request->gender,
        'phone'      => $request->phone,
        'birthday'   => $request->birthday,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/')->with('success', 'Register Successfully! Please Login.');
}

// Guest Login
public function guest()
{
    Session::forget('user');
    Session::put('guest', true);
    return redirect('/home');
}

    public function home(Request $request)
    {
        // Auto-set table number from QR code URL param e.g. /?table=7
        if ($request->has('table')) {
            $table = intval($request->input('table'));
            if ($table >= 1 && $table <= 99) {
                $request->session()->put('table', $table);
            }
        }
        return response(view('pages.home'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->header('Pragma', 'no-cache');
    }

//Forget Password
public function showForgotForm() 
{
    return view('pages.forgot-password');
}

// Send Mail
public function sendTemporaryPassword(Request $request) {
    $email = $request->email;

    // check user info
    $user = DB::table('users')->where('email', $email)->first();

    if (!$user) {
        return back()->with('error', 'No such user found with this email.');
    }

    // generate temp pass
    $tempPassword = bin2hex(random_bytes(4)); 

    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'regina124624@gmail.com'; 
        $mail->Password   = 'oyzd rhkn eaos sznr'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('regina124624@gmail.com', 'Minion Sushi Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Temporary Password - Minion Sushi';
        $mail->Body    = "Dear User,<br><br>Your temporary password for Minion Sushi is: <b>" . $tempPassword . "</b><br><br>Please log in and change your password immediately.";

        if($mail->send()) {
            // temp pass also need hash
            DB::table('users')->where('email', $email)->update([
                'password' => Hash::make($tempPassword)
            ]);

            return redirect('/')->with('success', 'A temporary password has been sent to your email! Please login and change it.');
        }
    } catch (Exception $e) {
        return back()->with('error', "Mail could not be sent. Error: {$mail->ErrorInfo}");
    }
}

    /** User profile page */
    public function profile()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    /** User edit password in profile page */
    public function showChangePassword()
    {
        return view('pages.update-password');
    }

    public function updatePassword(Request $request)
    {
        $user = DB::table('users')->where('id', $user = Auth::user()->id)->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('pw_error', 'Current password is incorrect.');
        }

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                            ->letters()       // must have letter
                            ->mixedCase()     // must mixed up and lower case
                            ->numbers()       // must have number
                            ->symbols()],     // must have symbol
        ]);

        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/profile')->with('success', 'Password updated successfully!');
    }

    // user update profile info
    public function showEditProfile(Request $request)
    {
        $field = $request->query('field');
        $user  = DB::table('users')->where('id', $user = Auth::user()->id)->first();
        return view('pages.edit-profile', compact('user', 'field'));
    }

    public function updateProfile(Request $request)
    {
        $field = $request->input('field');
        $value = $request->input('value');

        //avoid user try to change password here
        $allowed = ['name', 'email', 'phone'];
        if (!in_array($field, $allowed)) {
            return back()->with('error', 'Invalid field.');
        }

        $rules = [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user = Auth::user()->id,   //avoid same email address
            'phone' => ['required', 'regex:/^[0-9]{10,11}$/'],
        ];

        $request->validate(['value' => $rules[$field]]);

        DB::table('users')->where('id', $user = Auth::user()->id)->update([
            $field => $value,
        ]);

        $updatedUser = DB::table('users')->where('id', $user = Auth::user()->id)->first();
        Session::put('user', $updatedUser);

        return redirect('/profile')->with('success', ucfirst($field) . ' updated successfully!');
    }

    /** Call waiter page */
    public function waiter()
    {
        return view('pages.waiter');
    }

    /** Settings page */
    public function settings()
    {
        return view('pages.settings');
    }

    /** Placeholder pages */
    public function menu()
    {
        return view('pages.products', ['page' => 'menu', 'icon' => '🍱']);
    }

    public function sashimi()
    {
        $products = DB::table('menu-lists')->where('type', 'sashimi')->where('available',1)->get();
        return view('menu.sashimi',compact('products'))->with(['page' => 'sashimi', 'icon' => '🍱']);
    }

    public function sushi()
    {
        $products = DB::table('menu-lists')->where('type', 'sushi')->where('available',1)->get();
        return view('menu.sushi',compact('products'))->with(['page' => 'sushi', 'icon' => '🍱']);
    }

    public function donburi()
    {
        $products = DB::table('menu-lists')->where('type', 'donburi')->where('available',1)->get();
        return view('menu.donburi',compact('products'))->with(['page' => 'donburi', 'icon' => '🍱']);
    }

    public function drinks()
    {
        $products = DB::table('menu-lists')->where('type', 'drink')->where('available',1)->get();
        return view('menu.drinks',compact('products'))->with(['page' => 'drink', 'icon' => '🍱']);
    }

    public function noodles()
    {
        $products = DB::table('menu-lists')->where('type', 'noodles')->where('available',1)->get();
        return view('menu.noodles',compact('products'))->with(['page' => 'noodles', 'icon' => '🍱']);
    }

    public function cart()
    {
        return view('pages.cart', ['page' => 'cart', 'icon' => '🛒']);
    }

    public function feedback()
    {
        return view('pages.feedback');
    }

    public function contact()
    {
         return view('pages.contact');
    }

    public function saveTable(Request $request)
    {
        $table = intval($request->input('table'));
        if ($table >= 1 && $table <= 99) {
            $request->session()->put('table', $table);
            $request->session()->put('table_set', true);
        }
        return response()->json(['ok' => true]);
    }

    public function clearTable(Request $request)
    {
        $request->session()->forget(['table', 'table_set']);
        return response()->json(['ok' => true]);
    }

    public function clearPax(Request $request)
    {
        $request->session()->forget(['pax', 'pax_set']);
        return response()->json(['ok' => true]);
    }

    /** Logout — clear dining session but keep language preference */
    public function logout(Request $request)
    {
        Auth::logout();
        // Clear DB table session record
        \App\Models\TableSession::clearForCurrentSession();
        // Clear Laravel session data
        $request->session()->forget(['pax', 'pax_set', 'table', 'table_set']);
        $request->session()->save();
        return redirect()->route('login')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->header('Pragma', 'no-cache');
    }
}