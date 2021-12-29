"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const ResponseJson_1 = __importDefault(require("../utils/ResponseJson"));
const Student_1 = __importDefault(require("../model/Student"));
class StudentController {
    static index(req, res) {
        return __awaiter(this, void 0, void 0, function* () {
            const students = yield Student_1.default.all();
            return ResponseJson_1.default.success(res, {
                status: 200,
                message: 'Show all students',
                data: students,
            });
        });
    }
    static show(req, res) {
    }
    static store(req, res) {
        return __awaiter(this, void 0, void 0, function* () {
            const { name, nim, prodi } = req.body;
            if (name && nim && prodi) {
                const student = yield Student_1.default.create({ name, nim, prodi });
                return ResponseJson_1.default.success(res, {
                    status: 201,
                    message: `Success to add student: ${name}`,
                    data: student,
                });
            }
            return ResponseJson_1.default.fail(res, {
                status: 400,
                message: 'Fail to add student, make sure the key must be name, nim, prodi',
            });
        });
    }
    static update(req, res) {
        return __awaiter(this, void 0, void 0, function* () {
            const id = Number(req.params.id);
            const { name, nim, prodi } = req.body;
            const student = yield Student_1.default.update(id, { name, nim, prodi });
            const studentsLength = yield Student_1.default.getLength();
            if (id < studentsLength) {
                return ResponseJson_1.default.success(res, {
                    status: 200,
                    message: `Success to edit student: ${id}, name: ${name}`,
                    data: student,
                });
            }
            if (id > studentsLength) {
                return ResponseJson_1.default.fail(res, {
                    status: 404,
                    message: 'Student cannot be found',
                });
            }
            return ResponseJson_1.default.fail(res, {
                status: 500,
                message: 'Student fail to update',
            });
        });
    }
    static destroy(req, res) {
        return __awaiter(this, void 0, void 0, function* () {
            const id = Number(req.params.id);
            const student = yield Student_1.default.delete(id);
            if (student === 'data deleted') {
                return ResponseJson_1.default.success(res, {
                    status: 200,
                    message: `Success to delete student: ${id}`,
                });
            }
            if (student === 'data not found') {
                return ResponseJson_1.default.fail(res, {
                    status: 404,
                    message: `Student id: ${id} cannot be found`,
                });
            }
            return ResponseJson_1.default.fail(res, {
                status: 500,
                message: 'Student fail to update',
            });
        });
    }
}
exports.default = StudentController;
