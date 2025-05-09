[LARAVEL__BADGE]: https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white
[JAVASCRIPT__BADGE]: https://img.shields.io/badge/Javascript-000?style=for-the-badge&logo=javascript
[HTML5__BADGE]: https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white
[CSS3__BADGE]: https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white
[PROJECT__BADGE]: https://img.shields.io/badge/📱Visit_this_project-000?style=for-the-badge&logo=project
[PROJECT__URL]: https://sjccemiterio.byissa.tech

<h1 align="center" style="font-weight: bold;">🌐 SJC Cemitério — Cemetery Manager</h1>

![Preview do site](https://sjccemiterio.byissa.tech/site/images/preview.png)

![Laravel][LARAVEL__BADGE] ![JavaScript][JAVASCRIPT__BADGE] ![HTML5][HTML5__BADGE] ![CSS3][CSS3__BADGE]

<p align="center">
  <a href="#about">About</a> •
  <a href="#features">Features</a> •
  <a href="#started">Getting Started</a> •
  <a href="#routes">App Routes</a>
</p>

<h2 id="about">📌 About</h2>

<p>
SJC Cemitérios is a cemetery management platform developed to support municipalities in the organization and control of public cemeteries, while also offering compatibility with private cemeteries. The system enables complete and efficient management of burial spaces, records, and funeral processes, featuring hierarchical registration (cemeteries, sectors, blocks, plots, ossuaries, and drawers), as well as death records, transfers, and report generation.
</p>

<p>
In addition to user and permission administration, the platform includes advanced features such as action auditing, dynamic filtering, data export, and an interactive map that facilitates grave location. It was built with a focus on usability, organization, and data reliability, promoting agility and transparency in cemetery administration.
</p>

[![project][PROJECT__BADGE]][PROJECT__URL]

<h2 id="features">✨ Features</h2>

<ul>
  <li>Administrative management with customizable user roles and permissions</li>
  <li>User registration with profile photo and group assignment</li>
  <li>Action auditing with detailed logs (type, user, location, record, IP, date)</li>
  <li>Hierarchical structure: Cemeteries → Sectors → Blocks → Plots / Ossuaries → Drawers</li>
  <li>Dynamic filtering and export (CSV, PDF, Excel) across all modules</li>
  <li>Registration of responsible individuals with full contact details</li>
  <li>Death records for plots and drawers, including filtering and transfer actions</li>
  <li>Internal and external transfers between plots and drawers</li>
  <li>Interactive cemetery map with draggable grave markers and search functionality</li>
  <li>Comprehensive reports for all modules and transfer types</li>
  <li>Responsive layout for both desktop and mobile devices</li>
</ul>

<h2 id="started">🚀 Getting Started</h2>

<h3>Prerequisites</h3>

- PHP 8.1+
- Composer
- MySQL 5.7+

<h3>Steps</h3>

```bash
# Clone the repository
git clone https://github.com/issagomesdev/sjc-cemiterio.git

# Access the project folder
cd sjc-cemiterio

# Install dependencies
composer install

# Copy the .env file
cp .env.example .env

# Generate the app key
php artisan key:generate

# Import the database
# Go to the "database/bd" folder and import the "cemiterioBD.sql" file into your database.

# Configure your .env variables

# Link storage
php artisan storage:link

# Run the server
php artisan serve

# Access the system and login with:
# Email: admin@admin.com
# Password: password

```

<h2 id="routes">📍 Application Routes</h2>

Here is a list of the main application routes and their purposes.

| Route                            | Description                                                                 |
|----------------------------------|-----------------------------------------------------------------------------|
| <kbd>/login</kbd>                | User authentication page                                                   |
| <kbd>/profile/password</kbd>     | Edit user profile: photo, name, email, and password                        |
| <kbd>/admin</kbd>                | Admin dashboard home                                                       |
| <kbd>/admin/permissions</kbd>    | Manage system permissions                                                  |
| <kbd>/admin/roles</kbd>          | Manage user roles and access groups                                        |
| <kbd>/admin/users</kbd>          | Manage users, their profiles, and role assignments                         |
| <kbd>/admin/audit-logs</kbd>     | View and track system audit logs                                           |
| <kbd>/admin/cemiterios</kbd>     | List and manage cemeteries                                                 |
| <kbd>/admin/setores</kbd>        | Manage cemetery sectors                                                    |
| <kbd>/admin/quadras</kbd>        | Manage blocks within sectors                                               |
| <kbd>/admin/lotes</kbd>          | Manage individual burial plots                                             |
| <kbd>/admin/ossuarios</kbd>      | Manage ossuaries                                                           |
| <kbd>/admin/gaveta</kbd>         | Manage drawers inside ossuaries                                            |
| <kbd>/admin/responsaveis</kbd>   | Register and manage responsible individuals for plots or graves            |
| <kbd>/admin/obitos-lotes</kbd>   | Register and manage burials in plots                                       |
| <kbd>/admin/obitos-gavetas</kbd> | Register and manage burials in drawers                                     |
| <kbd>/admin/mapa/{id}</kbd>      | Interactive visual map of the cemetery                                     |
| <kbd>/admin/entre-lotes</kbd>    | View and track transfers between burial plots                              |
| <kbd>/admin/entre-gavetas</kbd>  | View and track transfers between ossuary drawers                           |
| <kbd>/admin/para-lotes</kbd>     | View and track transfers from drawers to burial plots                      |
| <kbd>/admin/para-gavetas</kbd>   | View and track transfers from plots to ossuary drawers                     |
| <kbd>/relatorios/{module}</kbd>  | Generate reports for users, cemeteries, sectors, blocks, plots, burials... |
