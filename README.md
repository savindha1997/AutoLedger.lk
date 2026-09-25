# VSFMS

VSFMS is a PHP + MySQL based vehicle finance and sales management system.

## Features

- Byke inventory management (`addByke.php`, `update.php`, `view.php`)
- Byke sales with Cash/Lease method (`salebyke.php`)
- Byke expense tracking (`bykeexpencess.php`)
- Investor management (`investors.php`, `viewinvestors.php`)
- Investor deposits, withdrawals, and profit giving
- Credit giving and credit returns
- Other income and expenses
- PDF invoice generation
- Backup export
- Action logging to database table `system_logs`

## Tech Stack

- PHP (procedural)
- MySQL / MariaDB
- XAMPP (Apache + MySQL)
- HTML/CSS + Bootstrap-style UI

## Project Structure (Key Files)

- `dbconfig.php`: database connection and shared logger include
- `system_log.php`: reusable database logging helper
- `auth.php`, `login.php`, `logout.php`: authentication
- `index.php`: dashboard
- `addByke.php`, `salebyke.php`, `bykeexpencess.php`: byke workflows

## Local Setup (XAMPP)

1. Place project in XAMPP htdocs:
   - `/Applications/XAMPP/xamppfiles/htdocs/vsfmsm`
2. Start Apache and MySQL from XAMPP.
3. Create database (default expected name):
   - `vsfms`
4. Import your SQL dump(s) into `vsfms` (including required tables like `bykes`, `bykesale`, `system_logs`, etc.).
5. Update DB config if needed in `dbconfig.php`:
   - host: `localhost`
   - user: `root`
   - password: ``
   - database: `vsfms`
6. Open in browser:
   - `http://localhost/vsfms/login.php`

## Git

Repository initialized with branch `main`.

Common commands:

```bash
git status
git add .
git commit -m "Your message"
git push
```

## Notes

- If schema changes are made (for example, lease-related columns), keep SQL schema and PHP pages in sync.
- Logs are stored in the `system_logs` database table (not filesystem logs).
