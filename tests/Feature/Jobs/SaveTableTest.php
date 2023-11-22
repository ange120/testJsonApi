<?php

namespace Jobs;

use App\Jobs\SaveTable;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;

class SaveTableTest extends TestCase
{
    public function it_handles_job_successfully()
    {
        $dataFirst = json_decode('[
            {
                "name": "ad1",
                "clicks": 10,
                "unique_clicks": 5,
                "leads": 3,
                "roi": 15.5
            },
            {
                "name": "ad2",
                "clicks": 15,
                "unique_clicks": 8,
                "leads": 6,
                "roi": 18.2
            }
        ]');

        $dataSecond = json_decode('[
            {
                "dimensions": {
                    "ad_id": "ad1"
                },
                "metrics": {
                    "conversion": 0.12,
                    "impressions": 100
                }
            },
            {
                "dimensions": {
                    "ad_id": "ad2"
                },
                "metrics": {
                    "conversion": 0.09,
                    "impressions": 120
                }
            }
        ]');

        $job = new SaveTable($dataFirst, $dataSecond);
        $job->handle();

        $this->assertFalse(Log::hasLoggedError());
    }
}
