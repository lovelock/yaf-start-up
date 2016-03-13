# yaf-start-up
An out-of-box Yaf Framework with basic libraries.

## Features

1. An easy to use fetcher for configurations.

    Thanks to `Yaf\Config\Ini`, we never use ini files so conviniently. Here I wrapped a class for better use of it. See class `Helper\Conf` for more information.

2. An efficient logger writen in C as a PHP extension.

    Thanks to Seaslog, an efficient and easy to use PHP extension. As it is so easy to use, I have no need to wrap it at all. However, I need some features which it does not provide. So I hacked it and will maintain a feature rich fork.

3. An interactive console is provided to do repeated jobs.

    Thanks to Symfony projects, I can easily create a custom console application with plenty of features. We can use this application for generating Entity getters and setters, and even more.

4. ORM support.

    No specific database provider is especially supported though we use MySQL(MariaDB) usually. Because I want to test it for PostgreSQL later.

5. Memcached pool support.

    @todo Hash support

6. Redis pool support.

    @todo Hash support

7. Twig support.

    Twig is a feature rich template engine. Yaf is a blading fast framework. What will it be if they work together?
    Finally I find a Yaf-Twig adapter to use. However has not been updated for long and I find it not so easy to use. So I forked it and add more feature to it. You can now use it with Composer.
