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

## Automatic cPanel Deployment

Pushing to the `main`, `master`, or `savindhamac` branch automatically deploys application files to cPanel through GitHub Actions. The workflow keeps the server's `dbconfig.php` and `.env` files intact so production credentials are never committed or overwritten.

In the GitHub repository, open **Settings > Secrets and variables > Actions** and add these repository secrets:

- `CPANEL_HOST`: your cPanel server hostname, such as `server.example.com`
- `CPANEL_USERNAME`: your cPanel SSH username
- `CPANEL_DEPLOY_PATH`: absolute web-root path, such as `/home/username/public_html`
- `CPANEL_SSH_PRIVATE_KEY`: private SSH key for the cPanel account
- `CPANEL_SSH_KNOWN_HOSTS`: output of `ssh-keyscan -H server.example.com`
- `CPANEL_SSH_PORT`: optional SSH port; defaults to `22`

For your current hosting setup, add the secrets with these exact values:

- `CPANEL_HOST`: `node245.r-sg.register.lk`
- `CPANEL_USERNAME`: `autoledg`
- `CPANEL_DEPLOY_PATH`: `/home/autoledg/public_html/demo.autoledger.lk`
- `CPANEL_SSH_PRIVATE_KEY`: full contents of `~/.ssh/autoledger_cpanel` (including `-----BEGIN ...-----` and `-----END ...-----`)
- `CPANEL_SSH_KNOWN_HOSTS`: the confirmed host-key line from your server

Create an SSH key pair without a passphrase, add its public key in cPanel **SSH Access > Manage SSH Keys**, and authorize it. Store the private key only in the GitHub `CPANEL_SSH_PRIVATE_KEY` secret. Create the production `dbconfig.php` directly in the configured `CPANEL_DEPLOY_PATH` before the first deployment.

Use the **Deploy to cPanel** workflow's **Run workflow** button in GitHub to deploy manually when needed.

## Notes

- If schema changes are made (for example, lease-related columns), keep SQL schema and PHP pages in sync.
- Logs are stored in the `system_logs` database table (not filesystem logs).
