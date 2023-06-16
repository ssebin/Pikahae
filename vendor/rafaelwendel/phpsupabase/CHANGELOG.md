# Changes in PHPSupabase #

## 0.0.5 - 2022-05-17

### Changed

- Change the Service class constructor to accept the URI base without suffix. It is now possible to use a single service instance to create an auth object or database/querybuilder objects.
- Change the `getUriBase` method.
- Change on Auth, Database and QueryBuilder the methods that called `getUriBase`, setting now the suffix (`auth/v1` or `rest/v1`)

### Added

- Create `suffix` attribute in Auth, Database and QueryBuilder classes to set the respective suffix of URI (`auth/v1` or `rest/v1`)


## 0.0.4 - 2022-12-15

### Fixed

- fix: returns an array instead of an object in Database class

## 0.0.3 - 2022-10-10

### Added

- Create `getService` method in Database and QueryBuilder classes
- Create `response` attribute (with `getResponse` method) in Service class to set the Response of requests

## 0.0.2 - 2022-07-22

### Added

- Create `order` method in QueryBuilder class