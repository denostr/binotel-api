<?php

namespace denostr\Binotel\Models;

use denostr\Binotel\Model;

class Settings extends Model
{
    public function listOfEmployees($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-employees');

        return $result['listOfEmployees'];
    }

    public function listOfRoutes($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-routes');

        return $result['listOfRoutes'];
    }

    public function listOfVoiceFiles($fields = [])
    {
        $this->setFields($fields);

        $result = $this->request('settings/list-of-voice-files');

        return $result['listOfVoiceFiles'];
    }
}
