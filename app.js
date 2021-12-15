const express = require('express');

const app = express();

app.listen(3000, () => {
  console.log('Server Berjalan di http://localhost:3000/');
});

const router = require('./routes/api');
app.use(express.json());
app.use(router);