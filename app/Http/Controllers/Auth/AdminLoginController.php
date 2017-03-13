<?php
namespace App\Http\Controllers\Auth;
use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        // Валидация
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
//        $admin = Admin::find(1);
//        $admin2 = $request->password;
        
        // Попытка залогиниться
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Если успешно, тогда пойти куда нужно
            return redirect()->intended(route('admin.index'));
        }
        // Если нет - вернуться с данными
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}