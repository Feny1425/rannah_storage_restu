To add new translation go to "lang\ar.json" then add:
    {
        //...other values

        "key": "value" 
    }
    Change key with the key you want, Change value with the Value you want.
    e.g.:
    {
        //...other values

        "Label": "عنوان" 
    }

    you don't have to add to "lang/en.json", because the key will be the default value.

To change labels and pluralLabel add these to {Model}Resource.php (e.g. UserResource):

    public static function getLabel(): string
    {
        return __('Label'); //Change Label with the right key
    }
    public static function getpluralLabel(): string
    {
        return __('Labels'); // Change Labels with the right key
    }

    __('key') means find the value from chosen lang json using the key, if you didn't find it just return the key as a value.