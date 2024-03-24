<?php

namespace App\Exports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Ramsey\Collection\Exception\CollectionException;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExcel implements WithCustomStartCell,WithHeadings, FromArray,WithCharts,WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function startCell(): string
    {
        return 'A23';
    }
    public function styles(Worksheet $sheet)
    {
        // Set wrap text for all columns
        $sheet->getStyle('A2:L2')->getAlignment()->setWrapText(true);
    }
    public function headings(): array
    {
        return [
            'No',
            'Time',
            'Tanki 3',
            'Tanki 4',
            'Tanki 5',
            'Tanki 6',
            'Tanki 7',
            'Tanki 8',
            'Tanki 10',
            'Tanki 17',
            'Tanki 21',
            'Tanki 22',
           
        ];
    }

   
    public function __construct(Collection $dataExcel)
    {
        $this->data = $dataExcel->toArray();
    }

    public function array(): array
    {
        $array = $this->data;
        return $array;
    }
    public function charts()
    {
        $array = $this->data;
        $countArray = count($array);

       
        $label      = [
            new DataSeriesValues('String', 'Worksheet!$C$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$D$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$E$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$F$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$G$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$H$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$I$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$J$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$K$23', null, 1),
            new DataSeriesValues('String', 'Worksheet!$L$23', null, 1)
            
            
        ];
        $categories = [new DataSeriesValues('String', 'Worksheet!$B$24:$B$' . $countArray + 24 .'', null, 4)];
        $values     = [ 
            new DataSeriesValues('Number', 'Worksheet!$C$24:C$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$D$24:D$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$E$24:E$' . $countArray + 23 .'' , null, 4),
            New DataSeriesValues('Number', 'Worksheet!$F$24:F$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$G$24:G$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$H$24:H$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$I$24:I$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$J$24:J$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$K$24:K$' . $countArray + 23 .'' , null, 4),
            new DataSeriesValues('Number', 'Worksheet!$L$24:L$' . $countArray + 23 .'' , null, 4),
        ];

        $series = new DataSeries(
            DataSeries::TYPE_LINECHART, 
            DataSeries::GROUPING_STANDARD,
            range(0, \count($values) - 1), 
            $label, 
            $categories, 
            $values
        );
        $plot   = new PlotArea(null, [$series]);

        $legend = new Legend(Legend::POSITION_BOTTOM, null, false);
        $chart  = new Chart('chart name', new Title('Graphic Chart'), $legend, $plot);
        $chart->setTopLeftPosition('A2')
              ->setBottomRightPosition('W22');

        return $chart;
    }
    
  
}