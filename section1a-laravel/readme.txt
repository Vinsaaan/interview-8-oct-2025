Laravel Projects CRUD API (Section 1A)

A small Laravel CRUD API for managing Projects.

==================================
Features
==================================
Full CRUD API for Projects (Create, Read, Update, Delete)
Fields: id, name, description, start_date, end_date
Includes Eloquent Model, Controller, Migration, and Seeder
Validation: project name must be unique and at least 5 characters
/api/status endpoint returns { "message": "API is running" } for health check

==================================
API Endpoints
==================================
GET /api/status → Check server status
GET /api/projects → List all projects
POST /api/projects → Create new project
GET /api/projects/{id} → Get single project
PUT /api/projects/{id} → Update project
DELETE /api/projects/{id} → Delete project

==================================
Example Request
==================================
POST /api/projects

{
  "name": "Supply Chain Tracker",
  "description": "Blockchain-based system for secure logistics",
  "start_date": "2025-10-10",
  "end_date": "2025-12-15"
}

Response → returns created project with id and timestamps.

==================================
File Structure
==================================
section1a-laravel/
│
├── app/
│ ├── Http/Controllers/ProjectController.php
│ └── Models/Project.php
│
├── database/
│ ├── migrations/2025_10_07_create_projects_table.php
│ ├── seeders/DatabaseSeeder.php
│ └── seeders/ProjectSeeder.php
│
├── routes/
│ ├── api.php
│ └── web.php
│
├── bootstrap/app.php
└── .env

==================================
Notes
==================================
-Works with XAMPP MySQL or any compatible DB.

| Method     | Endpoint             | Description                                                          |
| ---------- | -------------------- | -------------------------------------------------------------------- |
| **GET**    | `/api/status`        | Health check endpoint (returns `{ "message": "API is running" }`). |
| **GET**    | `/api/projects`      | Fetch all projects (index).                                          |
| **GET**    | `/api/projects/{id}` | Fetch a specific project by ID (show).                               |
| **POST**   | `/api/projects`      | Create a new project (store).                                        |
| **PUT**    | `/api/projects/{id}` | Update an existing project (update).                                 |
| **DELETE** | `/api/projects/{id}` | Delete a project (destroy).                                          |
