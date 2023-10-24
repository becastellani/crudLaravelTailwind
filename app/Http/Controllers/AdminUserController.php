<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('model_has_permissions', 'users.id', '=', 'model_has_permissions.model_id')
            ->select('users.*', 'model_has_permissions.permission_id as role_id')
            ->get();

        return view('panel.index', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $role = $request->input('role');

        DB::table('model_has_permissions')
            ->where('model_id', $user->id)
            ->update(['permission_id' => $role]);

        return redirect()->route('panel.index');
    }
}

