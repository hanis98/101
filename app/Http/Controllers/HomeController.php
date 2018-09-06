<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Charts\ApplicationProgressChart;
use App\Charts\ApprovalProgressChart;
use App\Charts\AuthorizeProgressChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'active']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progress_chart = $this->getApplicationProgressChart();
        $approval_chart = $this->getApprovalProgressChart();
        $authorize_chart = $this->getAuthorizeProgressChart();

        return view('home', compact('progress_chart', 'authorize_chart', 'approval_chart'));
    }

    private function getApplicationProgressChart()
    {
        $chart = new ApplicationProgressChart();
        $chart->dataset('Application Progress', 'doughnut', [
            Application::whereStatus(Application::IN_PROGRESS)->count(),
            Application::whereStatus(Application::REJECTED)->count(),
            Application::whereStatus(Application::SUCCESS)->count(),
        ])->options([
            'backgroundColor' => [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
            ],
        ]);
        return $chart;
    }

    private function getApprovalProgressChart()
    {
        if(! auth()->user()->can('can approve')) {
            return null;
        }

        $chart = new ApprovalProgressChart();
        $chart->dataset('Approval Progress', 'doughnut', [
            Application::query()
                ->whereStatus(Application::IN_PROGRESS)
                ->whereNull('approved_by')
                ->count(),
            Application::query()
                ->whereStatus(Application::IN_PROGRESS)
                ->whereNotNull('approved_by')
                ->count(),
        ])->options([
            'backgroundColor' => [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
            ],
        ]);

        return $chart;
    }

    private function getAuthorizeProgressChart()
    {
        if(! auth()->user()->can('can authorize')) {
            return null;
        }

        $chart = new AuthorizeProgressChart();
        $chart->dataset('Authorize Progress', 'doughnut', [
            Application::query()
                ->whereNotNull('approved_by')
                ->whereNull('authorized_by')
                ->count(),
            Application::query()
                ->whereNotNull('approved_by')
                ->whereNotNull('authorized_by')
                ->count(),
        ])->options([
            'backgroundColor' => [
                'rgb(255, 99, 132)',
                'rgb(75, 192, 192)',
            ],
        ]);

        return $chart;
    }
}