<?php
namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller
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
        $departments = Department::paginate(100);
        return view('department.index', compact('departments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
        ]);
        Department::create([
            'name' => $request->name,
            'code' => kebab_case($request->name),
        ]);
        swal()->success('Department', 'Department successfully created.');
        return redirect()->route('department.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('department.show', compact('department'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        
        return view('department.edit', compact('department'));
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
            'name' => 'required|min:5',
        ]);
        Department::where('id', $id)->update([
            'name' => $request->name,
            'code' => kebab_case($request->name),
        ]);
        swal()->success('Department', 'Department successfully updated.');
        
        return redirect()->route('department.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);
        swal()->success('Department', 'Department successfully deleted.');
        return redirect()->route('department.index');
    }
}