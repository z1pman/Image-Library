<?php
/**
 * Created by PhpStorm.
 * User: zipman
 * Date: 28.05.18
 * Time: 18:14
 */

namespace App\Controller;


class ValidationController
{
    private $image;
    private $errors;

    public function __construct($image)
    {
        $this->image = $image;
    }

    public function validate()
    {
        $this->validateType();
        $this->validateResolution(1920, 1080);
        $this->validateSize(5242880);

        return $this->errors;
    }

    /**
     * @return bool
     */
    private function validateType(): bool
    {
        $patern = "/^(?:gif|jpe?g|png|bmp)$/i";

        if(!preg_match($patern, $this->image->type)) {
            $this->errors['type'] = "Incorrect file type";
        }
        return true;
    }

    /**
     * @return bool
     */
    private function validateResolution($maxWidth, $maxHeight): bool
    {
         if ($this->image->width > $maxWidth || $this->image->height > $maxHeight) {
            $this->errors->resolution = "Bad image resolution";
        }

        return true;
    }

    /**
     * @return bool
     */
    private function validateSize($maxSize): bool
    {
        if ($this->image->size > $maxSize) {
            $this->errors->size = "Too big file";
        }

        return true;
    }

}