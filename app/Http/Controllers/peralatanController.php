<?php
namespace App\Http\Controllers;
use App\Models\Peralatan;
use Illuminate\Http\Request;
class PeralatanController extends Controller
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
        $peralatans = Peralatan::paginate(100);
        return view('peralatan.index', compact('peralatans'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peralatan.create');
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
        Peralatan::create([
            'name' => $request->name,
            'code' => kebab_case($request->code),
            'quantity' =>$request->quantity,
        ]);
        return redirect()->route('peralatan.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        return view('peralatan.show', compact('peralatan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peralatan = Peralatan::findOrFail($id);
        
        return view('peralatan.edit', compact('peralatan'));
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
        Peralatan::where('id', $id)->update([
            'name' => $request->name,
            'code' => kebab_case($request->name),
            'quantity' => $request->quantity,
        ]);
        
        return redirect()->route('peralatan.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peralatan::destroy($id);
        return redirect()->route('peralatan.index');
    }
}