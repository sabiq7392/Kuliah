import { Request, Response } from 'express';
import ResponseJson from '../utils/ResponseJson';
import Student from '../model/Student';

export default class StudentController {
  public static async index(req: Request, res: Response) {
    const students = await Student.all();
    return ResponseJson.success(res, {
      status: 200,
      message: 'Show all students',
      data: students,
    });
  }

  public static show(req: Request, res: Response) {
    
  }

  public static async store(req: Request, res: Response) {
    const { name, nim, prodi } = req.body;
    if (name && nim && prodi) {
      const student = await Student.create({ name, nim, prodi });
      return ResponseJson.success(res, {
        status: 201,
        message: `Success to add student: ${name}`,
        data: student,
      });
    }

    return ResponseJson.fail(res, {
      status: 400,
      message: 'Fail to add student, make sure the key must be name, nim, prodi',
    });
  }

  public static async update(req: Request, res: Response) {
    const id = Number(req.params.id);
    const { name, nim, prodi } = req.body;
    const student = await Student.update(id, { name, nim, prodi });
    const studentsLength = await Student.getLength();

    if (id < studentsLength) {
      return ResponseJson.success(res, {
        status: 200,
        message: `Success to edit student: ${id}, name: ${name}`,
        data: student,
      });
    }

    if (id > studentsLength) {
      return ResponseJson.fail(res, {
        status: 404,
        message: 'Student cannot be found',
      });
    }

    return ResponseJson.fail(res, {
      status: 500,
      message: 'Student fail to update',
    });
  }

  public static async destroy(req: Request, res: Response) {
    const id = Number(req.params.id);
    const student = await Student.delete(id);

    if (student === 'data deleted') {
      return ResponseJson.success(res, {
        status: 200,
        message: `Success to delete student: ${id}`,
      });
    }

    if (student === 'data not found') {
      return ResponseJson.fail(res, {
        status: 404,
        message: `Student id: ${id} cannot be found`,
      });
    }

    return ResponseJson.fail(res, {
      status: 500,
      message: 'Student fail to update',
    });
  }
}
