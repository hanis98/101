<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'active', 'permission:can approve']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = \App\Models\Application::query()
            ->with('user', 'user.department')
            ->whereNull('approved_by')
            ->whereNull('approved_at')
            ->whereNull('approved_remarks')
            ->whereIsApproved(false)
            ->latest()
            ->paginate(100);
        
        return view('approval.index', compact('applications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = \App\Models\Application::with('peralatan')->findOrFail($id);
        $application_peralatan = \App\Models\ApplicationEquipment::where('application_id', $id)->get();
        $peralatans = \App\Models\Peralatan::all();
        return view('approval.edit', compact('application', 'peralatans', 'application_peralatan'));
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
            'is_approved' => 'required',
            'approved_remarks' => 'required|min:5'
        ]);
        $status = ($request->is_approved) ? 
            \App\Models\Application::IN_PROGRESS : 
            \App\Models\Application::REJECTED;
        $data = [
            'status'      => $status,
            'is_approved' => $request->is_approved,
            'approved_by' => auth()->user()->id,
            'approved_at' => now(),
            'approved_remarks' => $request->approved_remarks,
        ];
        \App\Models\Application::where('id', $id)->update($data);
        \App\Models\ApplicationEquipment::where('application_id', $id)->delete();
        $application = \App\Models\Application::findOrFail($id);
        foreach ($request->peralatan as $peralatan_id => $quantity) {
            if(!is_null($quantity)) {
                $peralatan = \App\Models\ApplicationEquipment::create([
                    'application_id' => $application->id,
                    'peralatan_id' => $peralatan_id,
                    'quantity' => $quantity,
                ]);
            }
        }
        swal()->success('Approval', 'You have successfully update the approval request.');
        // notify kp, if approved
        // if not approved, notify requestor
        event(new \App\Events\Application\Updated($application));
        
        return redirect()->route('approval.edit', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}