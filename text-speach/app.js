const express = require ("express");
const gTTS = require('gtts');
var player = require('play-sound')(opts = {})

// init express
const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(function (req, res, next) {
    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', '*');
    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);
    // Pass to next layer of middleware
    next();
});
// basic route
app.post('/', (req, res) => {
    const  gtts = new gTTS(req.body.text, 'id');
    gtts.save('notif.mp3', function (err, result){
        if(err) { throw new Error(err); }
        console.log("Text to speech converted!");
    });
    res.send(req.body)
});
app.get('/play', (req, res) => {
    player.play('./notif.mp3', function (err) {
       if (err) throw err;
       console.log("Audio finished");
       res.send("Playing")
     }); 
});


// listen on port
app.listen(3000, () => console.log('Server Running at http://localhost:3000'));