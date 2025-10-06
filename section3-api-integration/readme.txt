API Integration (Section 3)

A small React app that fetches the first 10 post titles from the JSONPlaceholder API.

==================================
Features
==================================
- Fetches data from: https://jsonplaceholder.typicode.com/posts?_limit=10
- Displays a loading spinner for 1 seconds before showing data
- Shows an error message if the fetch fails
- Highlights post titles longer than 30 characters
- Clean functional React component using Hooks (useState, useEffect)

==================================
Usage
==================================
- On page load, a spinner is shown for 1 seconds while fetching posts.
- After 1 seconds, the first 10 post titles are displayed.
- Long titles (>30 characters) are highlighted with a yellow background.
- If fetching fails, an error message box appears instead of the list.

==================================
File Structure
==================================
section3-api-integration/
│
├── public/
│   ├─ index.html
│   └─ vendor/
│       └─ bootstrap-5.3.8-dist/
│            ├─ css/
│            │   └─ bootstrap.min.css
│            └─ js/
│                └─ bootstrap.bundle.min.js
│
└── src/
    ├── index.js              ← React entry file
    ├── App.js                ← Main app layout
    ├── components/
    │   └── Posts.jsx         ← Fetch + display + spinner logic
    └── styles/
        └── posts.css         ← CSS for spinner, error box, highlight

==================================
Notes
==================================
- Spinner stays visible for 2 seconds before showing data.
- If the API fails, an alert box appears.