<?php

namespace elsayed85\QueueMonitor\Tests\Support;

use elsayed85\QueueMonitor\Traits\IsMonitored;

class MonitoredJobWithProgressCooldown extends BaseJob
{
    use IsMonitored;

    public $progress;

    public function __construct(int $progress)
    {
        $this->progress = $progress;
    }

    public function handle(): void
    {
        $this->queueProgress(0);
        $this->queueProgress($this->progress);
    }

    public function progressCooldown(): int
    {
        return 10;
    }
}
