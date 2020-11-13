<?php

namespace App\Observers\Nova;

use App\Models\Language;

class LanguageObserver
{
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Language  $language
     * @return void
     */
    public function saved(Language $language)
    {
        if($language->is_default) {
            Language::where('is_default', 1)
                ->where('id', '!=', $language->id)
                ->update(['is_default' => 0]);
        }
    }
}
