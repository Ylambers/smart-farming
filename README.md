#Dashboard


## Commands

```
    php bin/console doctrine:schema:update --force
    php bin/console doctrine:generate:entities AppBundle
```

## Installation

To get the project clone it from this repo

``` git clone https://github.com/Ylambers/db-yl.git```

When the pull is done, run the command in the project folder 

```composer install```

After the installation is complete it can throw out an error,
fix this error witch the command 

```php bin/console cache:clear```

Now update the composer with the command

``` composer update ```

The project is now set up and ready to go!

## Add tinymce to a form 
    ```
        $builder->add('introtext', 'textarea', array(
                'attr' => [
                    'class' => 'tinymce',
                ]
        ));
    ```


## add validations to entity
```
    use Symfony\Component\Validator\Mapping\ClassMetadata;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('title', new Length(['min' => 3, 'max' => 255]));

        $metadata->addPropertyConstraint('shortText', new Length(['min' => 5]));

        $metadata->addPropertyConstraint('text', new Length(['min' => 5]));

        $metadata->addPropertyConstraint('link', new Length(['min' => 5]));
    }
```

## Links
   * FosUserBundle
    http://symfony.com/doc/current/bundles/FOSUserBundle/index.html
    
   * Assetic Bundle
    http://symfony.com/doc/current/assetic/asset_management.html

   * TinymceBundle
    https://github.com/stfalcon/TinymceBundle
    
   * CaptchaBundle
    composer require gregwar/captcha-bundle
    https://github.com/Gregwar/CaptchaBundle
