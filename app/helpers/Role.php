<?php

class Role {
    public static function access($roles)
    {
        if (Auth::check() && Auth::user()->roleID)
        {
            foreach(str_split($roles) as $role)
            {
                if(Auth::user()->roleID == $role)
                    return true;
            }
        }

        return false;
    }
}