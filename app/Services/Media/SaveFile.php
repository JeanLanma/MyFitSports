<?php

namespace App\Services\Media;

class SaveFile
{
    public static function fromRequest($request, $file = 'file', $path = 'uploads')
    {
        $request->validate([
            $file => 'required|file'
        ]);

        if ($request->hasFile($file)) {
            $file = $request->file($file);
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs($path, $fileName, 'public');
            return $fileName;
        }
        return null;
    }
}