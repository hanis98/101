<?php
namespace App\Http\Controllers;
use App\Models\Department;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'active' , 'role:admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10); // select * from users
        return view('user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $roles = \Spatie\Permission\Models\Role::where('name', '!=', 'user')->get();
        return view('user.create', compact('departments', 'roles'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($data, $rules); 
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'ic' => 'required|min:12',
            'department_id' => 'required',
            'jawatan' => 'required|min:10|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'ic' => $request->ic,
            'department_id' => $request->department_id,
            'jawatan' => $request->jawatan,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');
        // if has roles selected, assign them to user
        if($request->role) {
            $user->assignRole($request->role);
        }
        if($request->can_approve) {
            $user->givePermissionTo('can approve');
        }
        if($request->can_authorize) {
            $user->givePermissionTo('can authorize');
        }
        swal()->success('User', 'User successfully created.');
        return redirect()->route('user.show', $user->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        $user_role = $user->roles->where('name', '!=', 'user')->first();
        $roles = \Spatie\Permission\Models\Role::where('name', '!=', 'user')->get();
        return view('user.edit', compact('user', 'departments', 'roles', 'user_role'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'ic' => 'required|min:12',
            'department_id' => 'required',
            'jawatan' => 'required|min:10|max:255',
        ]);
        User::where('id', $id)->update($request->only('name', 'ic', 'department_id', 'jawatan'));
        $user = User::findOrFail($id);
        if($request->role) {
            $user->syncRoles(['user', $request->role]);
        } else {
            $user->syncRoles(['user']);
        }
        $request->can_approve ? $user->givePermissionTo('can approve') : $user->revokePermissionTo('can approve');
        $request->can_authorize ? $user->givePermissionTo('can authorize') : $user->revokePermissionTo('can authorize');
        
        swal()->success('User', 'User successfully updated.');
        return redirect()->route('user.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        swal()->success('User', 'User successfully deleted.');
        return redirect()->route('user.index');
    }
}