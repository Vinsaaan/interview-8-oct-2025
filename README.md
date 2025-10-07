Interview 8 Oct 2025

This repository contains all sections of the pre-interview coding test, covering backend, frontend, API integration, and WordPress customization.

Each section is organized in its own folder, with a dedicated README.txt explaining its Features, Usage, File Structure, and Notes.

## 📁 Project Structure

| Section | Folder Name | Description |
|----------|--------------|--------------|
| [**Section 1A — Backend (Laravel)**](https://github.com/Vinsaaan/interview-8-oct-2025/tree/main/section1a-laravel) | `section1a-laravel` | Laravel CRUD API for **Projects** with routes, controller, Eloquent model, migration, factory + seeder. Validation: project name **unique** and **min 5 chars**. |
| [**Section 1B — Backend (Node.js / Express)**](https://github.com/Vinsaaan/interview-8-oct-2025/tree/main/section1b-node-js) | `section1b-node-js` | Express REST API with `/status`, `POST /feedback` (email validation, in-memory store), and bonus `GET /feedback`. |
| [**Section 2 — Frontend (React)**](https://github.com/Vinsaaan/interview-8-oct-2025/tree/main/section2-frontend-react) | `section2-frontend-react` | Task Manager (Bootstrap). Loads tasks from JSON, add/delete, toggle complete, optional localStorage persistence, clean Hooks (useState/useEffect). |
| [**Section 3 — API Integration (React)**](https://github.com/Vinsaaan/interview-8-oct-2025/tree/main/section3-api-integration) | `section3-api-integration` | Fetches first 10 posts from JSONPlaceholder with a spinner, error handling, and highlights titles longer than 30 characters. |
| [**Section 4 — WordPress Plugin (Case Studies)**](https://github.com/Vinsaaan/interview-8-oct-2025/tree/main/section4-wordpress-case-studies-plugin) | `section4-wordpress-case-studies-plugin` | Custom WordPress plugin: registers **Case Study** CPT, shortcode `[featured_case_studies]` for latest 3, and archive-only title filter. |



⚙️ Technologies Used

•Backend: Node.js, Express.js, Laravel

•Frontend: React.js, Bootstrap 5

•API Integration: JSONPlaceholder, public API, LocalStorage, Custom REST API

•CMS: WordPress (Custom Plugin, PHP)

🧭 Notes

•Each section is self-contained and can be run or tested independently.

•All setup instructions, demo usage, and code explanations are included in each section’s README.txt.
