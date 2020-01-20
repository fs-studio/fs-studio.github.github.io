<?php

namespace App\Rep\Elements;

class EditOffer
{

    public function doReplace($file, $offers)
    {

        if (!empty($offers[0]) && !empty($offers[1])) {
            $endings = ["ом", "а", "о", "у", "ок"];
            $file = str_ireplace($offers[0], $offers[1], $file);
            $file = str_ireplace('{{OFFER}}', $offers[1], $file);

            foreach ($endings as $key => $value) {
                $file = str_ireplace($offers[1] . $value, $offers[1], $file);
            }

            return $file;

        } else {
            return $file;
        }

    }
}
