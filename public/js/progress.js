//global context of our flow
//the progress json is placeholder for actual implementation

//sample json to build the javascript
//runs need to be in cronological order
var progress = {
    "goal": {
        "start_date": "01/01/2019",
        "end_date": "02/12/2019",
        "cur_min": "10",
        "cur_sec": "08",
        "trgt_min": "8",
        "trgt_sec": "30",
        "week_imp": "00:05"
    },
    "runs": [
        {
            "date": "01/02/2019",
            "distance": "3",
            "pace_min": "10",
            "pace_sec": "0"
        },
        {
            "date": "01/12/2019",
            "distance": "3",
            "pace_min": "9",
            "pace_sec": "40"
        },
        {
            "date": "01/18/2019",
            "distance": "2.5",
            "pace_min": "9",
            "pace_sec": "45"
        },
        {
            "date": "01/20/2019",
            "distance": "3.1",
            "pace_min": "8",
            "pace_sec": "35"
        }]
};

//get the canvas object
var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');

window.onload = (function () {
    //draw the initial flow
    drawFlow();
})();


function drawFlow() {
// draw the background with goal dates
    var goal = progress['goal'];
    startdate = new Date(goal.start_date);
    enddate = new Date(goal.end_date);
    numweeks = parseInt(dateFns.differenceInWeeks(enddate, startdate));
    numdays = parseInt(dateFns.differenceInDays(enddate, startdate));
    ctx.strokeStyle = 'grey';
    ctx.font = "10px Arial";
//draw background grid for the duration
//Day markers
    var dIncWidth = canvas.width / numdays;
    w = dIncWidth;
    d = startdate;
    ctx.strokeStyle = 'lightgrey';
    for (var i = 1; i < numdays + 1; i++) {
        sDate = dateFns.format(d, 'MM/DD');
        ctx.beginPath();
        ctx.moveTo(w, canvas.height - canvas.height / 8);
        ctx.lineTo(w, canvas.height);
        ctx.stroke();
        w = w + dIncWidth;
        d = dateFns.addDays(d, 1);
    }

    //week markers
    var wIncWidth = canvas.width / numweeks;
    w = 0;
    d = startdate;
    for (var i = 0; i < numweeks + 1; i++) {
        sDate = dateFns.format(d, 'MM/DD');
        ctx.beginPath();
        ctx.moveTo(w, 0);
        ctx.lineTo(w, canvas.height);
        ctx.stroke();
        ctx.fillText(sDate, w, canvas.height - 3);
        w = w + wIncWidth;
        d = dateFns.addDays(d, 7);
    }

//draw background grid for pace improvement
    var curMin = parseInt(goal.cur_min);
    var curSec = parseInt(goal.cur_sec);
    var tarMin = parseInt(goal.trgt_min);
    var tarSec = parseInt(goal.trgt_sec);
    //convert to sec
    var current = (curMin * 60) + curSec;
    var target = (tarMin * 60) + tarSec;

    //goalDif is in seconds -> this is too small of an increment set
    //TO DO: will need to set the divisor based on the value of the goal Dif
    // //instead of hard code to 15- depending on limits set in challenges
    goalDif = (current - target);
    //set the increments for the vertical using the height
    var vertInc = (canvas.height / goalDif);
    var v = vertInc;
    var m = 0;
    //label the current and target
    ctx.fillStyle = 'blue';
    ctx.fillText(goal.cur_min + ":" + goal.cur_sec, 5, 10);
    ctx.fillText(goal.trgt_min + ":" + goal.trgt_sec, 5, canvas.height - 10);
//draw the grid
    ctx.strokeStyle = 'lightgrey';
    for (var i = 1; i < goalDif + 1; i++) {
        ctx.beginPath();
        ctx.moveTo(0, v);
        ctx.lineTo(canvas.width, v);
        ctx.stroke();
        v = v + vertInc;
    }
//now draw the progress of each run
    var runs = progress['runs'];
    ctx.strokeStyle = 'red';
    var sM, sS, eM, eS, sD, eD, startlineV, startlineW, linetoV;
    var linetoW = 0;
    //formula for the vert measure on grid is ((min * 60) + sec)/15 (set divosor actually)
    sM = curMin;
    sS = curSec;
    startlineV = (current - ((sM * 60) + sS)) * vertInc;
    //formula for the horiz measure is the date within the goal range
    sD = startdate;
    eD = new Date(runs[0].date);
    startlineW = parseInt(dateFns.differenceInDays(eD, sD)) * dIncWidth;
    ctx.beginPath();
    ctx.moveTo(startlineW, startlineV);

    for (var r = 0; r < runs.length; r++) {
        eM = parseInt(runs[r].pace_min);
        eS = parseInt(runs[r].pace_sec);
        eD = new Date(runs[r].date);
        linetoV = (current - ((eM * 60) + eS)) * vertInc;
        linetoW = linetoW + parseInt(dateFns.differenceInDays(eD, sD)) * dIncWidth;
        ctx.lineTo(linetoW, linetoV);
        ctx.stroke();
        sD = eD;
        startlineW = startlineW + linetoW;
        startlineV = linetoV;
    }

};


