<?php
namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;
class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Application::query();
        if(!auth()->user()->hasRole('admin')) {
            $query = $query->where('user_id', auth()->user()->id);
        }
        $applications = $query->latest()->paginate(100);
        
        return view('application.index', compact('applications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peralatans = \App\Models\Peralatan::all();
        return view('application.create', compact('peralatans'));
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
            'user_id' => 'required',
            'purpose' => 'required',
            'usage' => 'required',
            'location' => 'required',
            'total_participants' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
            'peralatan' => 'required'
        ]);
        
        $data = [
            'user_id' => $request->user_id,
            'purpose' => $request->purpose,
            'usage' => $request->usage,
            'location' => $request->location,
            'total_participants' => $request->total_participants,
            'started_at' => \Carbon\Carbon::parse($request->started_at),
            'ended_at' => \Carbon\Carbon::parse($request->ended_at),
        ];
        $application = Application::create($data);
        // event(new \App\Events\Application\Created($application));
        
        foreach ($request->peralatan as $peralatan_id => $quantity) {
            if(!is_null($quantity)) {
                $peralatan = \App\Models\ApplicationEquipment::create([
                    'application_id' => $application->id,
                    'peralatan_id' => $peralatan_id,
                    'quantity' => $quantity,
                ]);
            }
        }
        
        return redirect()->route('application.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::with('peralatan')->findOrFail($id);
        $application_peralatan = \App\Models\ApplicationEquipment::where('application_id', $id)->get();
        $peralatans = \App\Models\Peralatan::all();
        return view('application.show', compact('application', 'peralatans', 'application_peralatan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $application_peralatan = \App\Models\ApplicationEquipment::where('application_id', $id)->get();
        $peralatans = \App\Models\Peralatan::all();
           
        return view('application.edit', compact('application', 'peralatans', 'application_peralatan'));
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
            'user_id' => 'required',
            'purpose' => 'required',
            'usage' => 'required',
            'location' => 'required',
            'total_participants' => 'required',
            'started_at' => 'required',
            'ended_at' => 'required',
        ]);
        Application::where('id', $id)
            ->update(
                $request->only('purpose', 'usage', 'location', 'total_participants', 'started_at', 'ended_at')
            );
        \App\Models\ApplicationEquipment::where('application_id', $id)->delete();
        $application = Application::findOrFail($id);
        foreach ($request->peralatan as $peralatan_id => $quantity) {
            if(!is_null($quantity)) {
                $peralatan = \App\Models\ApplicationEquipment::create([
                    'application_id' => $application->id,
                    'peralatan_id' => $peralatan_id,
                    'quantity' => $quantity,
                ]);
            }
        }
        
        return redirect()->route('application.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(auth()->user()->hasRole('admin'), 403);
        Application::destroy($id);
        return redirect()->route('application.index');
    }
}