<?php

namespace Binotel\Models;

use Binotel\Models;

class Stats extends Models
{
    public function incomingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/incoming-calls-for-period'));
    }

    public function outgoingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/outgoing-calls-for-period'));
    }

    public function calltrackingCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/calltracking-calls-for-period'));
    }

    public function allIncomingCallsSince($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/all-incoming-calls-since'));
    }

    public function allOutgoingCallsSince($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/all-outgoing-calls-since'));
    }

    public function onlineCalls($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/online-calls'));
    }

    public function listOfCallsPerDay($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-per-day'));
    }

    public function listOfCallsForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-for-period'));
    }

    public function listOfCallsByInternalNumberForPeriod($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-calls-by-internal-number-for-period'));
    }

    public function listOfLostCallsToday($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/list-of-lost-calls-today'));
    }

    public function historyByNumber($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/history-by-number'));
    }

    public function historyByCustomerId($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/history-by-customer-id'));
    }

    public function recentCallsByInternalNumber($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/recent-calls-by-internal-number'));
    }

    public function callDetails($fields = [])
    {
        $this->setFields($fields);

        return $this->getCallDetails($this->request('stats/call-details'));
    }

    public function callRecord($fields = [])
    {
        $this->setFields($fields);

        $record = $this->request('stats/call-record');

        return $record['url'];
    }

    private function getCallDetails($result)
    {
        return $result['callDetails'];
    }
}