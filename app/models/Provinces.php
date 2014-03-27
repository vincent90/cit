<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
class Provinces
    extends Eloquent
    implements UserInterface, RemindableInterface
{
    protected $table  = "provinces";
    protected $hidden = ["password"];

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getReminderEmail()
    {
        return $this->email;
    }
}