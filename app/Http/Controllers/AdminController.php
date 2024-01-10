<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class   AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = collect();
        $users = \App\Models\User::limit(10)->get();
//        dd($users);
//        $users=$users->map(function ($user){
//           return[
//             'id'=>$user->id,
//               'email'=>$user->email
//
//           ];
//        });
//        $users->transform(function ($user) {
//            return $user->id = $user->id . 1;
//        });
//        $users->put('shdii', 'jkaskd');
//        dd($users);
//       $sum= $users->sum(function ($user) {
//            return $user->id;
//        });
//        dd($sum);
//       $avg= $users->avg(function ($user) {
//            return $user->id;
//        });
//        dd($avg);

//        $max= $users->max(function ($user) {
//            return $user->id;
//        });
//        dd($max);
//        foreach ($users as $item){
//            dd($item);
//        }
//
//        $request = Http::get('https://kontakt.az');
//        dd($request->body());
//    $collection=collect([1,5,4,6,8,4,13,54,84,2,1,3,80]);
//    $chunk=$collection->chunk(4);
//    return $chunk->all();
//        $collection = collect([
//            [1, 2, 3],
//            [4, 5, 6],
//            [7, 8, 9],
//        ]);
//        return $collection->collapse();

        return view("admin.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login()
    {
        if (!Auth::check()) {
            return view('admin.auth.login');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function logout()
    {
//        if (Auth::check()) {
        Auth::logout();
        return redirect()->route('admin.login');
//        } else {
//            return redirect()->route('admin.index');
//        }
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            return redirect()->intended('dashboard');
//        }

        $users = \App\Models\User::query()->where([
            'email' => $request->input('email'),
        ])->first();

        if ($users && Hash::check($request->input('password'), $users->password)) {
            $request->session()->regenerate();
            Auth::loginUsingId($users->id);
            return redirect()->intended('admin/dashboard');
        } else {
            dd('Not found');
        }

//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ])->onlyInput('email');
    }

    public function users(Request $request)
    {
//        if (Auth::check()) {
//            Log::info('users methodu cagirildi',$request->all());
//            Log::channel('blog')->info('users methodu cagirildi',$request->all());
        $usersQuery = \App\Models\User::query();
        if ($request->filled('id')) {
            $usersQuery->where('id', 'like', '%' . $request->get('id') . '%');
        }

        if ($request->filled('email')) {
            $usersQuery->where('email', 'like', '%' . $request->get('email') . '%');
        }

        if ($request->filled('startDate')) {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->get('startDate'));
            $usersQuery->where('created_at', ">=", $startDate);
        }

        if ($request->filled('endDate')) {
            $endDate = Carbon::createFromFormat('Y-m-d', $request->get('endDate'));
            $usersQuery->where('created_at', '<=', $endDate);
        }
//        $name=$request->get('name');// value={{$name} name inputda submit etdikde qalir
        $users = $usersQuery->paginate(10);
        return view('admin/users/index', compact('users',/*'name'*/));
//        } else {
//            return redirect()->route('admin.login');
//        }
    }

    public function products(Request $request)
    {
//        if (Auth::check()) {
        $productsQuery = Category::query()->with(['user']);
        $products = Category::all();
        if ($request->filled('user_name')) {
            $productsQuery->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', "%" . $request->get('user_name') . "%");
            });
        }
        if ($request->filled('user')) {

            $productsQuery->where('user_id', 'like', '%' . $request->get('user') . '%');
        }
        if ($request->filled('product')) {
            $productsQuery->where('name', 'like', '%' . $request->get('product') . '%');
        }
        if ($request->filled('slug')) {
            $productsQuery->where('slug', 'like', '%' . $request->get('slug') . '%');
        }
        if ($request->filled('price')) {
            $productsQuery->where('price', 'like', '%' . $request->get('price') . '%');
        }
        if ($request->filled('status')) {
            $productsQuery->where('status', 'like', '%' . $request->get('status') . '%');
        }
        if ($request->filled('startDate')) {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->get('startDate'));
            $productsQuery->where('created_at', ">=", $startDate);
        }
        if ($request->filled('endDate')) {
            $endDate = Carbon::createFromFormat('Y-m-d', $request->get('endDate'));
            $productsQuery->where('created_at', '<=', $endDate);
        }
        $products = $productsQuery->paginate(10);
//        dd($products);
        return view('admin/products/index', compact('products'));
//        } else {
//            return redirect()->route('admin.login');
//        }

    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.users.profile', compact('user'));
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
//        $image=$request->image->move(public_path('uploads'),"xxx.jpg");
//        $image->store('uploads');
//        dd($image);
//
//        $image = $request->imageFile->move(public_path('uploads'));
//        $image->store('avatars');
//        return view('admin.users.profile', compact('user'));


        $file = $request->file('imageFile');
//        $filePath = $file->store('uploads');
        $user = Auth::user();
        if ($request->file('imageFile')) {
            $user->image = str_replace('public/', "", Storage::put('public/uploads', $request->file('imageFile')));
        }
        $user->save();
        return view('admin.users.profile', compact('user'));

    }

    public function posts(Request $request)
    {
        if (Auth::check()) {
            $productsQuery = Post::query();
            if ($request->filled('user_name')) {
                $productsQuery->whereHas('user', function ($query) use ($request) {
                    $query->where('name', 'like', "%" . $request->get('user_name') . "%");
                });
            }
            if ($request->filled('user')) {

                $productsQuery->where('user_id', 'like', '%' . $request->get('user') . '%');
            }
            if ($request->filled('product')) {
                $productsQuery->where('name', 'like', '%' . $request->get('product') . '%');
            }
            if ($request->filled('startDate')) {
                $startDate = Carbon::createFromFormat('Y-m-d', $request->get('startDate'));
                $productsQuery->where('created_at', ">=", $startDate);
            }
            if ($request->filled('endDate')) {
                $endDate = Carbon::createFromFormat('Y-m-d', $request->get('endDate'));
                $productsQuery->where('created_at', '<=', $endDate);
            }
            $posts = $productsQuery->paginate(10);
            return view('admin.post.index', compact('posts'));
        }
    }
//    public function alo()
//    {
//      dump(515415);
////        $datalist=DB::table('categories')->get()->where('id', 0);
////        //print_r($datalist);
////        //exit();
////        return view('admin.products.categoryadd', ['datalist' => $datalist]);
//    }


}
