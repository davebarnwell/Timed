<?php

/**
 * Class to Time intervals in seconds and microseconds (as float)
 * great for timing code or anything else you might need
 *
 *
 * User: dave
 * Date: 13/02/2017
 * Time: 10:05
 */
namespace dbarnwell;
class Timer
{
    /**
     * @var float|null
     */
    protected $startMicrotime = null;

    /**
     * @var float|null
     */
    protected $endMicrotime = null;

    function __construct()
    {
    }

    /**
     * Record the start time, and return $this
     *
     * @return $this
     */
    function start() {
        $this->startMicrotime = microtime(true);
        return $this;
    }

    /**
     * Record the end time, and return $this
     *
     * @return $this
     */
    function stop() {
        $this->endMicrotime = microtime(true);
        return $this;
    }

    /**
     * reset timer
     *
     * @return $this
     */
    function reset() {
        $this->startMicrotime = null;
        $this->endMicrotime = null;
        return $this;
    }

    /**
     * If start time and not end time return seconds to now including microseconds
     * else return seconds + microseconds between start and end times
     *
     * @return float
     */
    function elapsedSeconds() {
        if (null === $this->startMicrotime) {
            throw new InvalidArgumentException("Start time was not marked");
        }
        if (null === $this->endMicrotime) {
            // Not stopped so return time from start to now
            return microtime(true) - $this->startMicrotime;
        }
        // Stopped so show total elapsed time between start and stop
        return $this->endMicrotime - $this->startMicrotime;
    }
}