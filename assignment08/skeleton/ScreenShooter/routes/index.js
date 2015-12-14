var express = require('express');
var router = express.Router();
var shoot = require('./shoot');

// TODO include the shoot module and create a route for it.
router.use('/shoot', shoot);

module.exports = router;