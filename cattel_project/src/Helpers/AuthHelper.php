<?php

namespace App\Helpers;

use Pimcore\Model\DataObject\Customer;
use Symfony\Component\HttpFoundation\Request;

;

class AuthHelper
{
    /**
     * @throws \Exception
     */
    public static function getUsernameAndPasswordFromRequest(Request $request)
    {
        $token = $request->headers->get("authorization");
        $token = base64_decode(trim(str_replace("Basic", "", $token)));
        $token = explode(":", $token);
        if (!isset($token[0]) || !isset($token[1])) {
            throw new \Exception("No token found", 401);
        }

        $username = $_ENV["CATTEL_API_USER"];
        $password = $_ENV["CATTEL_API_PASSWORD"];

        if ($username !== $token[0]) {
            throw new \Exception("Invalid Username", 401);
        }
        if ($password !== $token[1]) {
            throw new \Exception("Invalid Password", 401);
        }
    }
}
