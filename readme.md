This Laravel 4 package provides a additional routes for soft deletable resources:

- route for restoring resource `PUT/PATCH`
- route for force deleting resource `DELETE` (default delete used as soft delete)
- route for trashed resources list `GET`

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `revati/laravel-soft-delete`.

    "require": {
        "laravel/framework": "4.1.*",
        "revati/laravel-soft-delete": "dev-master"
    }

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'Revati\SoftDelete\SoftDeleteServiceProvider'

That's it! You're all set to go.

## Generated routes

| Verb      | Path                         | Action       | Route Name              |
| --------- | ---------------------------- | ------------ | ----------------------- |
| Default routes                                                                 ||||
| GET       | /resource                    | index        | resource.index          |
| GET       | /resource/create             | create       | resource.create         |
| POST      | /resource                    | store        | resource.store          |
| GET       | /resource/{resource}         | show         | resource.show           |
| GET       | /resource/{resource}/edit    | edit         | resource.edit           |
| PUT/PATCH | /resource/{resource}         | update       | resource.update         |
| DELETE    | /resource/{resource}         | destroy      | resource.destroy        |
| Additional routes                                                              ||||
| GET       | /resource/trash              | trash        | resource.trash          |
| PUT/PATCH | /resource/{resource}/restore | restore      | resource.restore        |
| GET       | /resource/{resource}/confirm | restore      | resource.confirmDestroy |
| DELETE    | /resource/{resource}/force   | forceDestroy | resource.forceDestroy   |

