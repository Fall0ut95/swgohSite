# Setting Up Basic Authorization

## Initialize the Database

1. Edit `/auth/lib/config.sample.php` with your database information
2. Rename `/auth/lib/config.sample.php` to `lib/config.php`
2. Go to `/auth/db-setup.php`
3. Click the "Run Database Setup" button

### Important Notes!

* The function currently assumes that the database doesn't exist and doesn't do any checking for that kind of thing. I know. Soon:tm:
* Once the process is done, it's probably best to delete the `db-setup.php` file to make sure nothing goes wrong.

## Register Some Users

1. Go to `/auth/index.php`
2. Click on "Register"
3. Fill out the form. You know, the usual.

## Pick Some Things That Are After the Login

The `myaccount.php` file should only be available once logged in. To make an entire page inaccessible to logged out users, add this bit of PHP at the top:

```php
session_start();

if ( !$_SESSION[ 'logged_in' ] ) {
	header( 'Location: login.php' );
}
```

This will cause any visits to that page to be redirected if not authenticated.

The same conditional can be used to show specific bits of content within PHP pages. For example:

```php
session_start();

if ( !$_SESSION[ 'logged_in' ] ) {
	echo '<a href="login.php">Log In</a>';
} else {
	echo '<a href="logout.php">Log Out</a>';
}
```

## Future Items That I'll Move Into the Issues Log Sometime

1. Combine login and registration into the same page
2. Make it possible to have a log in popup instead of going to a dedicated page
3. Add user roles ("User," "Officer," "Admin")
	* Admin is for site admins who have basically all permissions
	* Officer would be people who can edit guild-related items
	* Users would be standard users
4. Don't rely on `$_SESSION` for storing user data as much. This will be more important if there's more data associated with a user.