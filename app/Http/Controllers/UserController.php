<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function login_page()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return back()->withErrors([
                    'email' => 'Email atau password salah.'
                ])->withInput();
            }

            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Berhasil Login.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Cannot login.');
        }
    }

    public function dashboard()
    {
        return view('pages.auth.dashboard', [
            'unfinished_reports' => Report::with('file', 'category')->where('status', '=', 0)->latest()->paginate(10),
            'ufr_count' => Report::where('status', '=', 2)->count(),
            'fr_count' => Report::where('status', '!=', 2)->count(),
            'user' => Auth::user()
        ]);
    }

    public function konten_page()
    {
        return view('pages.auth.konten', [
            'user' => Auth::user()
        ]);
    }

    public function change_password(Request $request)
    {
        $user = Auth::user();

        $field = $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if (!Hash::check($field['old_password'], $user->password)) {
            return response()->json([
                'message' => 'gagal mengubah password, password lama salah'
            ]);
        }

        $user->password = Hash::make($field['password']);

        $user->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'profile_pic' => [
                    'nullable',
                    'file',
                    function ($attribute, $value, $fail) {
                        $allowed = ['jpg', 'jpeg', 'png'];
                        $ext = strtolower($value->getClientOriginalExtension());

                        if (!in_array($ext, $allowed)) {
                            $fail("File harus berekstensi: jpg, jpeg, atau png.");
                        }
                    }
                ],

                'nama_kelurahan' => ['required', 'string', 'max:255'],
                'kecamatan' => ['required', 'string', 'max:255'],
                'kota' => ['required', 'string', 'max:255'],
                'provinsi' => ['required', 'string', 'max:255'],
                'alamat_kantor' => ['required', 'string'],
                'total_populasi' => ['required', 'numeric', 'min:1'],
                'luas_wilayah' => ['required', 'numeric', 'min:0'],
                'jumlah_rw' => ['required', 'numeric', 'min:1'],
                'jumlah_rt' => ['required', 'numeric', 'min:1'],
                'kode_pos' => ['required', 'string'],
                'no_telp' => ['required', 'string'],
                'email' => ['required', 'email', 'max:255'],
                'website' => ['nullable', 'url', 'max:255'],
            ]);
            // dd($validated);


            $profile = Auth::user();

            if ($request->hasFile('profile_pic')) {
                // Delete old logo if it exists
                if ($profile->profile_pic) {
                    Storage::disk('public')->delete($profile->profile_pic);
                }
                $path = $request->file('profile_pic')->store('logos', 'public');
                $validated['profile_pic'] = $path;
            }

            $profile->update($validated);

            return redirect()->back()->with('success', 'Konten berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Konten gagal diperbarui.' . $th);
        }
    }
}
