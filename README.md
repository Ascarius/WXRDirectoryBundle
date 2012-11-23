WXRDirectoryBundle
==================


Installation
------------


### Composer

``` json
        "wxr/directory-bundle": "dev-master"
```

`$ composer update`


### AppKernel (1)

``` php
        new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

        new WXR\CommonBundle\WXRCommonBundle(),
        new WXR\DirectoryBundle\WXR\DirectoryBundle(),
        new WXR\GeoBundle\WXRGeoBundle(),
```


### SonataEasyExtendsBundle

`$ php app/console sonata:easy-extends:generate WXRDirectoryBundle --dest=src`
`$ php app/console sonata:easy-extends:generate WXRGeoBundle --dest=src`

-   [SonataEasyExtendsBundle documentation](http://sonata-project.org/bundles/easy-extends/master/doc/index.html)


### AppKernel (2)

``` php
        new Application\WXR\DirectoryBundle\ApplicationWXRDirectoryBundle(),
        new Application\WXR\GeoBundle\ApplicationWXRGeoBundle(),
```


### Doctrine

`$ php app/console doctrine:schema:update --force`


Configuration
-------------

WXRDirectoryBundle doesn't require any configuration.


### Default configuration

``` yaml
wxr_directory:
    translation_domain: WXRDirectoryBundle
    contact:
        manager: wxr_directory.contact.manager.default
        admin:
            class: WXR\DirectoryBundle\Admin\Entity\ContactAdmin
            controller: SonataAdminBundle:CRUD
    group:
        manager: wxr_directory.group.manager.default
        admin:
            class: WXR\DirectoryBundle\Admin\Entity\GroupAdmin
            controller: SonataAdminBundle:CRUD
```