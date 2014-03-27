<?php
class UserSeeder
    extends DatabaseSeeder
{
    public function run()
    {
        $users = [
            [
                "username" => "vincent",
                "password" => Hash::make("bonjour88"),
                "email"    => "vincentmatte@gm.com"
            ]
        ];
        foreach ($users as $user)
        {
            User::create($user);
        }
    }
}