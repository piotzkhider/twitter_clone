<?php

namespace App\Domain\Models\Tweet;

use Carbon\Carbon;

class CreatedDate
{
    /**
     * @var \Carbon\Carbon
     */
    private $date;

    /**
     * CreatedDate constructor.
     *
     * @param \Carbon\Carbon $date
     */
    public function __construct(Carbon $date)
    {
        $this->date = $date;
    }

    /**
     * 1年経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneYear(): bool
    {
        return Carbon::now()->diffInYears($this->date) > 0;
    }

    /**
     * 1日経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneDay(): bool
    {
        return Carbon::now()->diffInHours($this->date) > 24;
    }

    /**
     * 1時間経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneHour(): bool
    {
        return Carbon::now()->diffInMinutes($this->date) > 60;
    }

    /**
     * 1分経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneMinute(): bool
    {
        return Carbon::now()->diffInSeconds($this->date) > 60;
    }

    /**
     * 1秒経過したかどうか
     *
     * @return bool
     */
    private function hasPassedOneSecond(): bool
    {
        return Carbon::now()->diffInSeconds($this->date) > 1;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->hasPassedOneYear()) {
            return $this->date->format('j M Y');
        }

        if ($this->hasPassedOneDay()) {
            return $this->date->format('M j');
        }

        if ($this->hasPassedOneHour()) {
            return sprintf('%sh', Carbon::now()->diffInHours($this->date));
        }

        if ($this->hasPassedOneMinute()) {
            return sprintf('%sm', Carbon::now()->diffInMinutes($this->date));
        }

        if ($this->hasPassedOneSecond()) {
            return sprintf('%ss', Carbon::now()->diffInSeconds($this->date));
        }

        return 'now';
    }
}
