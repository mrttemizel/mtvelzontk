<?php

namespace App\Charts;

use App\Models\Activity;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HorizontalBar
    {
        return $this->chart->horizontalBarChart()

            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Toplam Etkinlik Sayısı',
                [Activity::all()->where('etkinlik_teması','=',1)->count(),
                    Activity::all()->where('etkinlik_teması','=',2)->count(),
                    Activity::all()->where('etkinlik_teması','=',3)->count(),
                    Activity::all()->where('etkinlik_teması','=',4)->count()
                ])

            ->setXAxis(['Sosyal', 'Kültürel', 'Ekonomik', 'Sağlık']);
    }
}
