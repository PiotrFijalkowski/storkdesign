<?php
namespace StorkDesign;

class ThemeOptions
{

    public $googleApi = false;
    public $environment = 'production';

    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $key => $value) {
                $this->{$key} = $value;
            }
        }
        $this->googleApi = get_field('google_api', 'option');
    }

    public function isProduction()
    {
        return $this->environment == 'production';
    }
}
