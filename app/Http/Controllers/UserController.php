<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('signed.user.user', [
            'title' => 'Gadai Express | Simulasi Gadai | User',
            'user' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = DB::select("select email from users where email = '" . $request->email . "'");
        // dd($data);
        $email = "";
        foreach ($data as $row) {
            $email = $row->email;
        }

        if ($data) {
            if ($email != $request->email) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
            }
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user');
    }

    public function create()
    {
        return view('signed.user.add_user', [
            'title' => 'Gadai Express | Simulasi Gadai | Tambah User',
        ]);
    }

    public function edit(Request $request)
    {
        $user = DB::select("select * from users where id = '" . $request->id . "'");

        return view('signed.user.edit_user', [
            'title' => 'Gadai Express | Simulasi Gadai | Edit User',
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::find($request->id);
        $data = DB::select("select email from users where email = '" . $request->email . "'");
        // dd($data);
        $email = "";
        foreach ($data as $row) {
            $email = $row->email;
        }

        if ($data) {
            if ($email != $request->email) {
                $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            }
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $data = $user->delete();

        return redirect()->route('user');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $users = DB::select("select * from users where name like '%" . $request->search . "%'");

        return view('signed.user.user', [
            'title' => 'Gadai Express | Simulasi Gadai | User',
            'user' => $users,
        ]);
    }
}
