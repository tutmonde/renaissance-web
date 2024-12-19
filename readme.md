Renaissance Frontend
=================

Frontend for [Renaissance](https://github.com/tutmonde/renaissance) project. Basically, this is website with ability to register users and control them.

Requirements
------------

* Nette >3.2
* PHP >8.1

Installation
------------

Clone this repo, install all depencies through Composer. If you're new to Composer, follow [these instructions](https://doc.nette.org/composer).

Ensure the `temp/` and `log/` directories are writable.

Web Server Setup
----------------

For Apache or nginx users, configure a virtual host pointing to `www/` directory.

**Important Note:** Ensure `app/`, `config/`, `log/`, and `temp/` directories are not web-accessible. Allow `resources` folder to be accesible from web.
