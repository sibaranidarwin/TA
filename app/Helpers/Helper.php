<?php

use Illuminate\Http\UploadedFile;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function upload_file(UploadedFile $uploadedFile, $path = 'uploads', $assignNewName = true, $fileSystem = 'custom')
{
    if ($assignNewName) {
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileName  = sprintf('%s.%s', strtotime(now()), $extension);
    } else {
        $fileName = $uploadedFile->getClientOriginalName();
    }
    try {
        $uploadedFile->storeAs(
            $path,
            $fileName,
            $fileSystem
        );

        return $fileName;
    } catch (\Exception $e) {
        throw new \Exception($e);
    }
}

if (!function_exists('TanggalID')) {

    /**
     * TanggalID
     *
     * @param  mixed $tanggal
     * @return void
     */
    function TanggalID($tanggal)
    {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('l, d F Y');
    }
}
