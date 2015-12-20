var express = require('express');
var webshot = require("webshot");
var path = require("path");
var router = express.Router();
var shoot = require('./shoot');

router.use('/screenshots',express.static(path.join(__dirname,'../screenshots')));

router.get('/',function (req, res, next){
    console.log("get request wurde ebenfalls ausgeführt");
    var targetUrl = req.query.url;
    var targetFileName = targetUrl + '.png';
    var targetPath = path.join(__dirname,'../screenshots',targetFileName);
    webshot(targetUrl,targetPath,function(err){
        console.log('Screenshot saved');
        var targetWebPath = path.join('/shoot/screenshots',targetFileName);
        console.log("\n" + targetWebPath + "\n");
        res.json({"status": "ok","path": targetWebPath, "message":"re-used screenshot"});
    });
    
    
});

module.exports = router;