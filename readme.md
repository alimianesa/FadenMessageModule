# FadenMessageModule

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require faden/fadenmessagemodule
```

## Usage

Add following code into User.php :
````php
public function messages()
    {
        return $this->belongsToMany(
            FadenMessage::class,
            'faden_message_user' ,
            'user_id',
            "message_id");
    }
````

Setup .env Mail section like:
````dotenv
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@address.com
MAIL_PASSWORD=*****
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@address.com
MAIL_FROM_NAME= Name
````
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```



## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email ali.salimiansas2@gmail.com instead of using the issue tracker.

## Credits

- [ali salimian][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/faden/fadenmessagemodule.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/faden/fadenmessagemodule.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/faden/fadenmessagemodule/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/faden/fadenmessagemodule
[link-downloads]: https://packagist.org/packages/faden/fadenmessagemodule
[link-travis]: https://travis-ci.org/faden/fadenmessagemodule
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/alimianesa
[link-contributors]: ../../contributors
