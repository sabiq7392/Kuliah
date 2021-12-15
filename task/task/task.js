/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
const showDownload = (result) => {
  console.log("Download selesai");
  console.log(`Hasil Download: ${result}`);
}

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */

const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve(showDownload('windows-10.exe'));
    }, 3000);
  });

};

download();


/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
