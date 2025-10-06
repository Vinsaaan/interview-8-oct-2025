React Task Manager UI (Section 2)

A simple React + Bootstrap task manager.

==================================
Features
==================================
- Loads task list from /public/tasks.json (static JSON file)
- Displays all tasks with title and description
- Add new task (saved to localStorage only, not to JSON)
- Toggle tasks as Active or Completed (switch stays fixed position)
- Delete tasks individually
- "Load defaults" button → clears localStorage and reloads defaults from JSON

==================================
Usage
==================================
- The app first checks localStorage ("section2_tasks_v1")
  If found → load saved data  
  If empty → load defaults from /tasks.json

- Add new tasks → automatically saved to localStorage  
- Toggle status → automatically updates localStorage  
- Delete → removes from localStorage  
- Click "Load defaults (clear local)" → resets data from /tasks.json

==================================
File Structure
==================================
section2-frontend-react/
│
├── public/
│   ├── index.html
│   ├── tasks.json
│   └── vendor/bootstrap (Bootstrap 5.3.8)
│
└── src/
    ├── App.js           ← main logic (load/save/reset)
    ├── index.js         ← React entry file
    └── components/
        ├── TaskForm.jsx ← add new task form
        └── TaskList.jsx ← display, toggle, delete tasks

==================================
Notes
==================================
- Data persists only in browser localStorage, not in JSON.
- Reset button clears localStorage and reloads defaults.
- JSON file path: /public/tasks.json
- Styling uses Bootstrap 5 (included locally).
