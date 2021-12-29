"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const mysql_1 = __importDefault(require("mysql"));
require('dotenv').config();
const db = mysql_1.default.createConnection({
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
exports.default = db;
