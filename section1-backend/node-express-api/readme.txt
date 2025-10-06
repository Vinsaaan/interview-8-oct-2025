Express Feedback API (Section 1B)

A minimal Node.js + Express REST API for the pre-interview test.

==================================
Features
==================================
- GET /status → returns { "message": "Server is running" }
- POST /feedback → accepts { name, email, message }, validates email, stores in memory (one record per request)
- GET /feedback → returns all saved feedback (resets on server restart)

==================================
Setup
==================================
1. Navigate into the folder:
   cd section1-backend/node-express-api

2. Initialize and install dependencies (only the first time):
   npm init -y
   npm install express

3. Run the server:
   npm start
   or
   node server.js

Server runs at: http://localhost:3000

==================================
Endpoints
==================================
GET /status
- Returns server health check.
- Example Response:
  { "message": "Server is running" }

POST /feedback
- Accepts a JSON body:
  { "name": "Vincent", "email": "vincent@example.com", "message": "my name is Vincent" }
- Returns created feedback record (with id and createdAt).
- Returns error if any field missing or email invalid.

GET /feedback
- Returns all stored feedback entries in an array.

==================================
Testing Methods
==================================
Option A: Thunder Client (VS Code)
1. install and Open Thunder Client extension in VS Code.
2. New Request → Method: GET, URL: http://localhost:3000/status
   Click Send → should return { "message": "Server is running" }.
3. New Request → Method: POST, URL: http://localhost:3000/feedback
   Go to Body → Raw → JSON → paste:
     { "name": "Vincent", "email": "vincent@example.com", "message": "my name is Vincent" }
   Click Send → should return created object.
4. New Request → Method: GET, URL: http://localhost:3000/feedback
   Click Send → should return all feedback in an array.

Option B: PowerShell (Invoke-RestMethod)
# Health check
Invoke-RestMethod -Uri "http://localhost:3000/status" -Method GET

# Submit feedback
Invoke-RestMethod -Uri "http://localhost:3000/feedback" -Method POST `
  -Body '{"name": "Vincent", "email": "vincent@example.com", "message": "my name is Vincent"}' `
  -ContentType "application/json"

# Get all feedback
Invoke-RestMethod -Uri "http://localhost:3000/feedback" -Method GET

==================================
Notes
==================================
- Data is stored in memory only → it will reset every time the server restarts.
- If you see "Cannot GET /", use /status or /feedback instead (root path is optional).