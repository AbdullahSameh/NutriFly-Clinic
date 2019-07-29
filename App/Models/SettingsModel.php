<?php

namespace App\Models;

use System\Model;

class SettingsModel extends Model
{
    /**
     * Settings table
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * Settings data
     *
     * @var array
     */
    private $settings = [];


    /**
     * Load And Store All data settings in the database
     *
     * @return void
     */
    public function allSettings()
    {
        foreach ($this->all() as $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
        return $this->settings;
    }

    /**
     * Save settings
     *
     * @return void
     */
    public function save()
    {
        $this->db->delete($this->table);

        $keys = [
            'site_name',
            'site_email',
            'site_mobile', 
            'site_mobile2', 
            'site_description', 
            'maintenance', 
            'maintenance_message',
        ];

        foreach ($keys as $key) {

            $this->data('key', $key)
                ->data('value', ltrim($this->request->post($key)))
                ->insert($this->table);
        }
    }
}
