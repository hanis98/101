<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ApprovalProgressChart extends Chart
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
        $this->title('Approval Progress');
        $this->labels(['Pending', 'Done']);
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