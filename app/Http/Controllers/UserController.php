<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function loginAuth(Request $request)
    {
        // Jika tombol Buat Akun yang ditekan
        if ($request->has('create_account')) {
            // Validasi input untuk pendaftaran
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8', 
            ]);

            // Membuat akun baru
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Langsung login setelah pendaftaran
            Auth::login($user);

            // Redirect ke halaman yang diinginkan setelah sukses membuat akun
            return redirect()->route('report.article');
        }

        // Proses login jika tidak tekan tombol Buat Akun
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('report.article');
        } else {
            return redirect()->back()->with('failed', 'Proses login gagal, silakan coba kembali.');
        }
    }
}
