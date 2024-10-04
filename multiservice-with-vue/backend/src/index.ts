import express, { ErrorRequestHandler } from 'express';
import cors from 'cors';

const app = express();
const port = 3001;

// front to back communication fails if we don't setup cors
app.use(cors({
  origin: 'http://localhost:5173',
  methods: ['GET']
}));

app.use((req, res, next) => {
  console.log(`Received ${req.method} request for ${req.url}`);
  next();
});

app.get('/api', (req, res) => {
  console.log('Received request to /api');
  res.json({ message: 'Hello from backend!' })
})

const errorHandler: ErrorRequestHandler = (err, req, res, next) => {
  console.error('Error:', err);
  res.status(500).json({ error: 'Internal Server Error' });
};

app.use(errorHandler);

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
