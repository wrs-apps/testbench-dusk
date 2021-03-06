# Change for 6.x

This changelog references the relevant changes (bug and security fixes) done to `orchestra/testbench-dusk`.

## 6.5.0

Released: 2020-12-02

### Changes

* Update minimum support for Testbench v6.5.0+. ([v6.4.0...v6.5.0](https://github.com/orchestral/testbench/compare/v6.4.0...v6.5.0))

## 6.4.0

Released: 2020-11-20

### Changes

* Official support for PHP 8.
* Update app skeleton.

### Fixes

* Fixes `fsockopen` imcompatible usage on PHP 8.

## 6.3.0

Released: 2020-11-07

### Changes

* Draft support for PHP 8, pending compatibility from `php-webdriver/webdriver` and `laravel/dusk`.

## 6.2.1

Released: 2020-10-20

### Fixes

* Fixes missing `$workingPath`.

## 6.2.0 

Released: 2020-10-20

### Added

* Added ability to use custom Laravel path for `testbench-dusk` CLI.

## 6.1.0

Released: 2020-10-05

### Added

* Added experimental support for running artisan commands outside of Laravel. e.g:

```
./vendor/bin/testbench-dusk migrate
```

This would allows you to setup the testing environment before running `phpunit` instead of executing everything from within `TestCase::setUp()`.

* Add following folders to Laravel skeleton:
  - `app/Console`
  - `app/Exceptions`
  - `app/Http/Controllers`
  - `app/Http/Middleware`
  - `app/Models`
  - `app/Providers`
  - `database/seeds`

### Changes

* Change default port from `8000` to `8001`.

## 6.0.0

Released: 2020-09-08

### Changes

* Update support for Laravel Framework v8.
* Increase minimum PHP version to 7.3 and above (tested with 7.3 and 7.4).
* Configuration changes:
    - Changed `auth.providers.users.model` to `Illuminate\Foundation\Auth\User`.
    - Changed `queue.failed.driver` to `database-uuid`.
