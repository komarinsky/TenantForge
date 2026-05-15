<h1 align="center">TenantForge</h1>

<p align="center">
  <strong>Production-ready multi-tenant SaaS boilerplate for Laravel.</strong><br>
  Skip months of boilerplate. Start building your business logic from day one.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13.x-FF2D20?style=flat&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Filament-5-F59E0B?style=flat" alt="Filament">
  <img src="https://img.shields.io/badge/license-Commercial-blue" alt="License">
</p>

---

## What is TenantForge?

TenantForge is a battle-tested Laravel starter kit for building multi-tenant SaaS applications. It bundles everything you'd otherwise spend 4–6 weeks setting up — authentication, subscription billing, tenancy isolation, role-based access, admin panels, and AWS deployment — into a single, well-documented codebase.

Stop reinventing the wheel. Ship your idea this weekend.

## What's Inside

**🔐 Authentication & Security**
Email/password auth, social login (Google), email verification, password reset, and two-factor authentication out of the box.

**🏢 Multi-Tenancy**
Powered by [Stancl/Tenancy](https://tenancyforlaravel.com/). Subdomain-based routing, isolated databases per tenant, tenant-aware queues and storage.

**💳 Subscriptions & Billing**
Stripe integration via Laravel Cashier. Configurable pricing plans, trial periods, automatic invoicing, webhook handling, and a full billing portal.

**👥 Teams & Permissions**
Spatie Permission integration with predefined roles (Owner, Admin, Member). Team invitations, role management, and per-tenant access control.

**⚙️ Filament Admin Panels**
Two pre-configured panels: a **Super Admin** panel for platform-wide management (tenants, subscriptions, MRR analytics, user impersonation) and a **Tenant** panel for end-customers to manage their workspace.

**☁️ AWS Deployment Ready**
Includes `buildspec.yml` for CodeBuild, CodePipeline configuration, S3 file storage via Spatie Media Library, and SES email setup.

**🎨 Modern UI**
Built with Tailwind CSS and Livewire. Dark mode support, responsive layouts, and a polished component library you can extend.

**📊 Production Essentials**
Sentry error tracking, feature flags, activity logging, localization-ready, comprehensive PHPUnit test coverage, and detailed documentation.

## Who It's For

- **Indie hackers** launching their first SaaS who want a professional foundation
- **Agencies** building white-label products for clients
- **Senior developers** who'd rather skip the plumbing and focus on what makes their product unique

## Tech Stack

- Laravel 13
- PHP 8.3+
- Filament 5
- Livewire 4
- Tailwind CSS 3
- MySQL 8 / PostgreSQL 15
- Stripe (via Cashier)
- Stancl/Tenancy 3

## Quick Start

```bash
git clone https://github.com/yourname/tenantforge.git my-saas
cd my-saas
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan tenant-forge:install
```

Full setup guide in [docs/getting-started.md](docs/getting-started.md).

## License

TenantForge is commercial software. Each license grants you the right to use the codebase for unlimited personal and commercial projects. Redistribution of the source code is not permitted.

See [LICENSE.md](LICENSE.md) for details.

## Support

- 📚 [Documentation](docs/)
- 💬 [Discord community](https://discord.gg/tenantforge) *(Pro & Lifetime licenses)*
- 📧 support@tenantforge.dev

---

<p align="center">Built with ❤️ for the Laravel community.</p>
