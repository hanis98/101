<?php
namespace App\Charts;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
class ApplicationProgressChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->displayAxes(false);
        $this->title('Application Progress');
        $this->labels(['In Progress', 'Rejected', 'Success']);
        $this->options([
        	'plugins' => [
				'datalabels' => [
					'backgroundColor' => 'white',
					'borderColor' => 'white',
					'borderRadius' => 25,
					'borderWidth' => 2,
					'color' => 'black',
				]
			]
        ]);
    }
}