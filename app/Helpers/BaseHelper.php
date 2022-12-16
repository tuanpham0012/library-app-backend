<?php

namespace App\Helpers;

use DateTime;

class BaseHelper
{
    public static function validateDate($date, $format = 'd/m/Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    public static function saveImage($file, $folder = null, $addTime = false, $oldFile = null)
    {
        $fileNameWithExt = $file->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        if ($addTime) {
            $fileNameToStoge = time() . '_' . $fileName . '.' . $extension;
        } else {
            $fileNameToStoge = $fileName . '.' . $extension;
        }
        $folder = $folder ? $folder . '/' : '';
        $path = $file->storeAs('public/' . $folder, $fileNameToStoge);

        if ($oldFile) {
            unlink(public_path('storage/' . $folder . $oldFile));
        }

        return $fileNameToStoge;
    }
}
