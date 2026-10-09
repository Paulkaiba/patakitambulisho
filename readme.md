# Pata Kitambulisho Management System (PKMS) — Web

A web platform that digitises how people apply for national ID services. Applicants register, submit applications and track their status online, while administrators review, approve or reject them from a dashboard. *"Pata Kitambulisho"* is Swahili for *"get an ID"*.

<!-- Add 2-3 screenshots here, e.g. the applicant dashboard and the admin dashboard.
![Applicant dashboard](docs/screenshots/user-dashboard.png)
![Admin dashboard](docs/screenshots/admin-dashboard.png)
-->

## Features

**Applicants**
- Sign up and log in, with two-factor authentication using a one-time code sent by email
- Apply for a **new ID**, a **replacement ID** or a **stolen ID replacement**
- Upload supporting documents and a profile photo
- Submit fee payment details for each application
- Edit applications, update profile and change or reset password

**Administrators**
- Dashboard with applications grouped as pending, selected, approved or rejected, for each application type
- Review a full application, then approve or reject it
- Search applications and generate reports between two dates
- Manage notices, enquiries and subscribers
- Print or generate an application attachment

**Mobile API**
- A JSON API in `API/` (login, register, OTP verification, resend OTP, forgot and reset password) used by the companion [Android app](https://github.com/Paulkaiba/patakitambulisho-app)

## Tech stack

| Layer | Tools |
|---|---|
| Frontend | HTML, CSS, Bootstrap, JavaScript, jQuery, Ajax |
| Backend | PHP |
| Database | MySQL |
| Email / OTP | PHPMailer |

## Project structure

```
API/        JSON endpoints for the mobile app
admin/      Administrator portal
user/       Applicant portal
includes/   Shared header, footer and database connection
db/         SQL schema (camsdb.sql)
assets/     Site styles, scripts and images
```

## Getting started

**Requirements:** PHP 7.4+, MySQL or MariaDB, and a local server such as XAMPP or WAMP.

1. Clone the repository into your server's web root (e.g. `htdocs/patakitambulisho`), including the PHPMailer submodule:
   ```bash
   git clone --recurse-submodules https://github.com/Paulkaiba/patakitambulisho.git
   ```
2. Create a MySQL database named `patakitambulisho` and import `db/camsdb.sql`.
3. Set your own database credentials in these three files:
   - `includes/dbconnection.php`
   - `admin/includes/dbconnection.php`
   - `API/includes/dbconnection.php`
4. Configure your own SMTP details for PHPMailer so one-time codes can be emailed.
5. Open `http://localhost/patakitambulisho` in your browser.

## Status

Working prototype built as a learning project. Planned improvements:
- Use prepared statements for all database queries
- Replace MD5 password hashing with `password_hash()`
- Move configuration into environment variables
- Expand the API so the mobile app can submit and track applications

## Authors

- **Paul Kaiba** — [GitHub](https://github.com/Paulkaiba)
- **Gladys Njoki**

## License

Released under the terms of the [LICENSE](LICENSE) file.
