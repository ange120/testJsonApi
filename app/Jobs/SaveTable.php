<?php

namespace App\Jobs;

use App\Models\Info;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class SaveTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dataFirst, $dataSecond;

    /**
     * Create a new job instance.
     */
    public function __construct($dataFirst, $dataSecond)
    {
        $this->dataFirst = collect($dataFirst->getData());
        $this->dataSecond = collect($dataSecond->getData());
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $processedData = $this->dataFirst->map(function ($item) {
            $adId = $item['name'] ?? null;

            $metrics = $this->dataSecond->firstWhere('dimensions.ad_id', $adId)['metrics'] ?? null;
            if (!$metrics) {
                return null;
            }

            $conversion = $metrics['conversion'] ?? 0;
            $impressions = $metrics['impressions'] ?? 0;
            $clicks = $item['clicks'] ?? 0;
            $uniqueClicks = $item['unique_clicks'] ?? 0;
            $leads = $item['leads'] ?? 0;
            $roi = $item['roi'] ?? 0;


            return [
                'ad_id' => $adId,
                'impressions' => $impressions,
                'clicks' => $clicks,
                'unique_clicks' => $uniqueClicks,
                'leads' => $leads,
                'conversion' => round($conversion, 2),
                'roi' => round($roi, 2),
            ];
        })->filter()->sortByDesc('impressions');

        try {
            if ($processedData->isNotEmpty()) {
                Info::upsert($processedData->toArray(), ['ad_id'], ['impressions', 'clicks', 'unique_clicks', 'leads', 'conversion', 'roi',]);
            }
        } catch (\Exception $exception) {
            Log::error('Error insert data in table: ' . $exception->getMessage());
        }


    }
}
