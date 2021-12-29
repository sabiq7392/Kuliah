import mysql from 'mysql';

require('dotenv').config();

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'students_api',
});

db.connect((err) => {
  if (err) {
    console.error(`error connecting: ${err.stack}`);
    return;
  }

  console.log(`connected as id ${db.threadId}`);
});

export default db;
