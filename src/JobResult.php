<?php
/**
 * Created by PhpStorm.
 * User: beroberts
 * Date: 1/14/17
 * Time: 1:04 PM
 */

namespace WF\Hypernova;

class JobResult
{
    /**
     * @var string
     */
    public $error;

    /**
     * @var string rendered HTML
     */
    public $html;

    /**
     * @var bool
     */
    public $success;

    /**
     * @var \WF\Hypernova\Job
     */
    public $originalJob;

    /**
     * @param $serverResult
     * @param \WF\Hypernova\Job $originalJob
     *
     * @return \WF\Hypernova\JobResult
     */
    public static function fromServerResult($serverResult, \WF\Hypernova\Job $originalJob) {
        if (empty($serverResult['html']) && empty($serverResult['error'])) {
            throw new \InvalidArgumentException('Server result malformed');
        }

        $res = new static();

        $res->error = $serverResult['error'];
        $res->html = $serverResult['html'];
        $res->success = $serverResult['success'];
        $res->originalJob = $originalJob;

        return $res;
    }
}