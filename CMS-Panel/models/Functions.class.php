<?php
/**
 * Class Functions upoload picture avatar
 * @author Mohammadreza Tabatabaei <mohamadtus@gmail.com>
 * @date  Aug 02 2020
 */
class Functions
{
    /**
     * @param $file
     * @return mixed
     */
    public static function uploadPic($file)
    {
        $errors = "";
        $filename = $file['name'];
        $filesize = $file['size'] / 1024 / 1024;
        $filetype = explode("/", $file['type']);
        $currentlocation = $file['tmp_name'];
        $extensions = ["jpeg", "jpg", "png", "gif"];
        if ($file['error'] == 0) {
            if ($filetype[0] != "image" || !in_array($filetype[1], $extensions)) {
                $errors = "Image";
            } elseif ($filesize > 4) {
                $errors = "Image";
            } else {
                move_uploaded_file($currentlocation, "../upload/" . $filename);
            }
        }
        return $filename;
    }
}
?>