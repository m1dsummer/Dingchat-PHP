function readFile(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.onload = e => resolve(e.target.result)
    reader.onerror = err => reject(err)
    reader.readAsBinaryString(file)
  })
}

export default {
  readFile
}