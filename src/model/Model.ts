import db from '../config/database';

interface Data { [key: string]: any; }

export default class Model {
  static table: string;

  public static all() {
    return new Promise <Array<Data>>((resolve, reject) => {
      const sql = `SELECT * FROM ${this.table}`;

      db.query(sql, (err, results) => (err ? reject(err) : resolve(results)));
    });
  }

  public static create(data: any) {
    return new Promise <Array<Data>>((resolve, reject) => {
      const sql = `INSERT INTO ${this.table} SET ?`;

      db.query(sql, data, (err, results) => {
        console.log(`Last inserted ID: ${results.insertId}`);
        return err ? reject(err) : resolve(results);
      });
    });
  }

  public static update(id: number, data: any) {
    return new Promise <Array<Data>>((resolve, reject) => {
      const dataInfo = Object.entries(data);

      for (const [key, value] of dataInfo) {
        const student = [value, id];
        const sql = `UPDATE ${this.table} SET ${key} = ? WHERE id = ?`;

        db.query(sql, student, (err, results) => {
          if (err) reject(err);

          resolve(results);
        });
      }
    });
  }

  public static delete(id: number) {
    return new Promise((resolve, reject) => {
      const sql = `DELETE FROM ${this.table} WHERE id = ?`;

      db.query(sql, id, (err, result) => {
        if (err) reject(err);

        if (result.affectedRows === 0) resolve('data not found');

        if (result.affectedRows === 1) resolve('data deleted');
      });
    });
  }

  public static getLength() {
    return new Promise <number>((resolve, reject) => {
      const sql = `SELECT * FROM ${this.table}`;

      db.query(sql, (err, results) => (err ? reject(err) : resolve(results.length)));
    });
  }
}
