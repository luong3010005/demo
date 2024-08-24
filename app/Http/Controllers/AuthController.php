<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\CelestialBody;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function index()
    {
        // Logic to show all products
        return view('login.reriter');
    }
    public function index1()
    {
        $categories = Category::where('name', 'Vũ trụ')
            ->whereHas('children')
            ->with('children')
            ->whereNull('parent_id')
            ->get();
        $news = News::latest()->take(3)->get();

        $homeVutruItems = CelestialBody::where('type', 'home_vutru')
            ->latest()
            ->take(4)
            ->get();

        $CelestialBody = CelestialBody::latest()
            ->take(1)
            ->get();

        $CelestialBody1 = CelestialBody::latest()
            ->skip(1) // Skip the first record
            ->take(1)
            ->get();
            $CelestialBodyimg = CelestialBody::take(9)->get();



        return view('fonend.home', compact('categories', 'news', 'homeVutruItems', 'CelestialBody', 'CelestialBody1','CelestialBodyimg'));
    }



    public function new()
    {
        $news = News::all();
        return view('fonend.new-del', compact('news'));
    }

    public function show($slug)
    {
        // Fetch the news item by its slug
        $news = News::where('slug', $slug)->firstOrFail();

        // Return view with the news item details
        return view('fonend.news_show', compact('news'));
    }
    public function showCelestialBody($slug)
    {
        // Fetch the celestial body by its slug
        $celestialBody = CelestialBody::where('slug', $slug)->firstOrFail();

        // Return view with the celestial body details
        return view('fonend.celestial_body_show', compact('celestialBody'));
    }

    public function video()
    {
        $videos = Video::all();
        return view('fonend.video', compact('videos'));
    }

    public function show1($slug)
    {
        // Find the celestial body by slug
        $body = CelestialBody::where('slug', $slug)->firstOrFail();

        // Pass the celestial body to the view
        return view('fonend.celestialBody_show', compact('body'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login1(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if user has admin role
            if ($user->hasRole('admin')) {
                return redirect()->intended('admin');
            } else {
                // If user is not admin, log them out and show error
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Tài khoản không có quyền truy cập admin.',
                ]);
            }
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ]);
    }

    // Nếu bạn cần override hàm này để tùy chỉnh redirect sau khi đăng nhập
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        }

        auth()->logout();
        return redirect()->route('login1')->withErrors(['error' => 'Bạn không có quyền truy cập trang quản trị.']);
    }
}
