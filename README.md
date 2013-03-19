OpcacheProfilerBundle
=====================

This Bundle provides the status and an overview about Opcache/ZendOptimizer+ inside
the Symfony2-Toolbar.

It is compatible with ZendOptimizer+ on PECL for PHP 5.2.*, 5.3.*, 5.4.* and the
renamed Opcache, which is part of the PHP 5.5 core.


Installation
------------

### Using composer ###

**Note:** Check out this [gist](https://gist.github.com/2488761) if you want to use `composer` with Symfony2 v2.0.x!

Add the `codepoet/opcache-profiler-bundle` package to your `require` section in the `composer.json` file.

``` json
{
    "require": {
        "codepoet/opcache-profiler-bundle": "1.*"
    }
}
```


Usage
-----

Per default the listing of cached files is deactivated cause it uses much memory to keep the filelist
available. If you want to see it anyway, put this into your `config.yml`:

``` yaml
codepoet_opcache_profiler:
    data_collector:
        show_filelist:        true
```


License
-------

This bundle is under the MIT license. See [Resources/meta/LICENSE](https://github.com/benbender/OpcacheProfilerBundle/blob/master/Resources/meta/LICENSE).


Changelog
---------

This Changelog of this bundle can be found here: [Resources/meta/Changelog.md](https://github.com/benbender/OpcacheProfilerBundle/blob/master/Resources/meta/Changelog.md).


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/benbender/OpcacheProfilerBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
