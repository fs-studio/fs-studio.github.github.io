<?php

namespace App\Rep\Elements;

class EditTown
{

    public function doReplace($file)
    {
        $file = str_ireplace('Краснодар', '<?=trackerGetCity();?>', $file);

        return $file;
    }

}
