<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

class Calls extends Model
{
    public function extToPhone($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/ext-to-phone');

        return $result['generalCallID'];
    }

    public function phoneToPhone($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/phone-to-phone');

        return $result['generalCallID'];
    }

    public function attendedCallTransfer($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/attended-call-transfer');

        return ($result['status'] === 'success');
    }

    public function hangupCall($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/hangup-call');

        return ($result['status'] === 'success');
    }

    public function callWithAnnouncement($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/call-with-announcement');

        return ($result['status'] === 'success');
    }

    public function callWithInteractiveVoiceResponse($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('calls/call-with-interactive-voice-response');

        return ($result['status'] === 'success');
    }
}
