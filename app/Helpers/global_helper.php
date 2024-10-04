<?php

if(!function_exists('generateUniqueSlug')) {

    /**
     * Generate unique slug from given model and name.
     *
     * @param string $model
     * @param string $name
     * @return string
     * @throws \InvalidArgumentException
     */
    function generateUniqueSlug($model, $name) {
        $modelClass = "App\\Models\\$model";

        if(!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $modelClass tidak ditemukan.");
        }

        $slug = Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
