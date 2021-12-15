const express = require('express');

const router = express.Router();

router.get('/', (req, res) => {
  res.send('Hello Sabiq');
});

const StudentController = require('../controllers/StudentController');

router.get('/students', StudentController.index);
router.post('/students', StudentController.store);
router.put('/students/:id', StudentController.update);
router.delete('/students/:id', StudentController.destroy);

module.exports = router;