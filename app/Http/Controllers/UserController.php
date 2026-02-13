<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with('roles')
            ->whereDoesntHave('roles', function($query) {
                $query->where('name', 'admin');
            });

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('email', 'like', '%' . $searchTerm . '%')
                  ->orWhere('id', 'like', '%' . $searchTerm . '%');
            });
        }

        // Role filter
        if ($request->filled('role') && $request->input('role') !== 'All Roles') {
            $roleFilter = $request->input('role');
            $roleMap = [
                'client' => 'client',
                'seller' => 'seller', 
                'moderator' => 'moderator'
            ];
            
            if (isset($roleMap[$roleFilter])) {
                $query->whereHas('roles', function($q) use ($roleFilter, $roleMap) {
                    $q->where('name', $roleMap[$roleFilter]);
                });
            }
        }

        // Status filter
        if ($request->filled('status') && $request->input('status') !== 'Status: All') {
            $statusFilter = $request->input('status');
            $query->where('status', $statusFilter);
        }

        $usersWithoutAdmin = $query->simplePaginate(5);

        $allUsers = User::with('roles')->get();
        $allRoles = Role::all();
        $total_users=$allUsers->count();    
        $sellers = $allUsers->filter(function($user) {
            return $user->hasRole('seller') && $user->status === 'active';
        })->count();
        $banned = $allUsers->filter(function($user) {
            return $user->status === 'banned';
        })->count();

        if ($request->ajax()) {
                return response()->json($usersWithoutAdmin);
            }

        return view('dashboard.users', compact(['usersWithoutAdmin','total_users','sellers','banned','allRoles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update(['status' => $user->status === 'active' ? 'banned' : 'active']);
        // dd($user);
        return redirect()->route('users')->with('success', 'User status updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => ['required', 'string', 'in:client,seller,admin'],
            'status' => ['required', 'string', 'in:active,banned'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'status' => $validated['status'],
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('users')->with('success', 'User created successfully');
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
        $user = User::findOrFail($id);
        $role = $request->input('role');
        
        $user->syncRoles($role);
        
        $page = $request->input('page', 1);
        return redirect()->route('users', ['page' => $page])->with('success', 'User roles updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
