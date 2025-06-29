# Lead Management

LynQ is a Laravel-based Lead Management System designed to streamline the sales process by enabling efficient management of leads, tasks, contacts, and pipelines. It incorporates role-based access control (RBAC) with specific roles: Super Admin, who has full access and can manage all roles; Admin, who can configure the sales process and manage Sales Managers and Representatives; Sales Managers, who can assign and track leads for Sales Representatives; and Sales Representatives, who can view and manage only their own leads and tasks. LynQ enhances collaboration, optimizes workflows, and empowers sales teams to efficiently convert leads into opportunities, making it ideal for businesses seeking to improve their sales operations.

## Installation

Assuming you downloaded the repository or the zip file.

```bash
  composer install

  cp .env.example .env
  //Configure your database connections.
  php artisan key:generate
  php artisan migrate:fresh --seed
  
  //To run the project.
  php artisan serve
```
    
## Authors

- [@William Eduard M. Chua](https://github.com/veenoise)
- [@John Carls M. Cruzado](https://github.com/C12ux)
- [@Mickaela Danna O. Espiritu](https://github.com/C12ux)
- Krystine Hermionne E. Oseña
- John Lloyd Santos

