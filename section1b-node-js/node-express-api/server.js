// server.js
const express = require('express');
const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());

// In-memory store (resets when server restarts)
const feedbackStore = [];
let nextId = 1;

// Utility: simple email format check
function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// GET /status
app.get('/status', (req, res) => {
  res.json({ message: 'Server is running' });
});

// POST /feedback
app.post('/feedback', (req, res) => {
  const { name, email, message } = req.body || {};

  // Validation
  if (!name || !email || !message) {
    return res.status(400).json({ error: 'All fields are required: name, email, message' });
  }
  if (!isValidEmail(email)) {
    return res.status(400).json({ error: 'Invalid email format' });
  }

  // Malaysia time (GMT+8)
  const createdAtMY = new Date().toLocaleString('en-MY', { timeZone: 'Asia/Kuala_Lumpur' });

  const record = {
    id: nextId++,
    name,
    email,
    message,
    createdAt: createdAtMY
  };

  feedbackStore.push(record);
  return res.status(201).json(record);
});

// GET /feedback (bonus)
app.get('/feedback', (req, res) => {
  res.json(feedbackStore);
});

// add endpoint []
app.get('/', (req, res) => {
  res.json({
    message: 'Welcome to the Feedback API',
    endpoints: ['/status', 'POST /feedback', 'GET /feedback']
  });
});

// Start server
app.listen(PORT, () => {
  console.log(`\nFeedback API running on http://localhost:${PORT}`);
  console.log('Endpoints:');
  console.log('  GET  /status');
  console.log('  POST /feedback');
  console.log('  GET  /feedback');
});
