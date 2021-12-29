"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const database_1 = __importDefault(require("../config/database"));
class Model {
    static all() {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM ${this.table}`;
            database_1.default.query(sql, (err, results) => (err ? reject(err) : resolve(results)));
        });
    }
    static create(data) {
        return new Promise((resolve, reject) => {
            const sql = `INSERT INTO ${this.table} SET ?`;
            database_1.default.query(sql, data, (err, results) => {
                console.log(`Last inserted ID: ${results.insertId}`);
                return err ? reject(err) : resolve(results);
            });
        });
    }
    static update(id, data) {
        return new Promise((resolve, reject) => {
            const dataInfo = Object.entries(data);
            for (const [key, value] of dataInfo) {
                const student = [value, id];
                const sql = `UPDATE ${this.table} SET ${key} = ? WHERE id = ?`;
                database_1.default.query(sql, student, (err, results) => {
                    if (err)
                        reject(err);
                    resolve(results);
                });
            }
        });
    }
    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = `DELETE FROM ${this.table} WHERE id = ?`;
            database_1.default.query(sql, id, (err, result) => {
                if (err)
                    reject(err);
                if (result.affectedRows === 0)
                    resolve('data not found');
                if (result.affectedRows === 1)
                    resolve('data deleted');
            });
        });
    }
    static getLength() {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM ${this.table}`;
            database_1.default.query(sql, (err, results) => (err ? reject(err) : resolve(results.length)));
        });
    }
}
exports.default = Model;
