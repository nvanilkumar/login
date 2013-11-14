<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Encrypt
{
    public static function encryptData($a_sString)
    {
        return  md5($a_sString);		
    }

}