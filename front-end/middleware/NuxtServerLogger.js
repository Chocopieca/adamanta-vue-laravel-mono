export default function (req, res, next) {
  if (req.url !== '/_loading/sse') {
    console.log(req.rawHeaders)
    console.log(req.url)
    // console.log(req)
  }
  next()
}
