const students = require('../data/students');

class StudentController {
  index(req, res) {
    const response = {
      message: 'Menampilkan semua student',
      data: students,
    };

    res.json(response);
  }

  store(req, res) {
    const { name } = req.body; 
    
    if (name) {
      students.push(name);

      const response = {
        message: `Menambahkan data student: ${name}`,
        data: students,
      };
  
      return res.json(response);
    } 

    return res.json({ message: 'Gagal menambahkan data pastikan key haruslah name' });
  }

  update(req, res) {
    const { id } = req.params;
    
    students[id] = 'Jenglot';

    const response = {
      message: `Mengedit student ${id}`,
      data: students,
    };

    res.json(response);
  }

  destroy(req, res) {
    const { id } = req.params;

    students.splice(id, 1)

    const response = {
      message: `Menghapus data student: ${id}`,
      data: students,
    };

    res.json(response);
  }
}

const object = new StudentController();

module.exports = object;