<?php

session_start();

if( isset($_SESSION['userloggedin']) ) {
    if($_SESSION['userloggedin'] != 'true') {
        header("Location:form.php");
    }
} else {
    header("Location:form.php");
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <title>Fuerte Developers</title>
        <style type="text/css">
        text{
            font-family:Helvetica, Arial, sans-serif;
            font-size:11px;
            pointer-events:none;
        }
        #chart{
            position:absolute;
            width:500px;
            height:500px;
            top:0;
            left:0;
        }
        #question{
            position: absolute;
            width:400px;
            height:500px;
            top:0;
            left:520px;
        }
        #question h1{
            font-size: 50px;
            font-weight: bold;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            position: absolute;
            padding: 0;
            margin: 0;
            top:50%;
            -webkit-transform:translate(0,-50%);
                    transform:translate(0,-50%);
        }
        </style>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>

        <style media="screen">
            text {
                font-size: 15px;
            }

            .intro {
    width: 100%;
    position: relative;
    background: url(../img/bg1.jpg) no-repeat top center;
    background-size: cover;
    height: auto !important;
}
.intro .slogan {
    text-align: center;
    padding: 2rem;
}
.intro .slogan h2 {
    color: #FFF;
    text-shadow: none;
    font-size: 60px;
    line-height: 60px;
    font-weight: 700;
    font-family: Montserrat, sans-serif;
    background-color: rgba(0, 0, 0, 0);
    text-decoration: none;
    text-transform: uppercase;
    border-width: 0px;
    border-color: #000;
    border-style: none;
    text-shadow: -1px 0 1px #000;
}
        </style>

    </head>
    <body >
    <section id="intro" class="intro" style="padding: 5% 0 2% 0;">

    <div class="slogan" style="display:block;">
        <h2>MY <span class="text_color">SPIN THE WHEEL</span> </h2>
    </div>

</section>

        <!-- Event Name :
        <h3 id="eventName" style="display: inline;"></h3>

        <br>

        <button type="button" onclick="upvote()">upvote</button>

        <br>

        Message :
        <h4 id="text" style="display: inline;"></h4> -->

             

        <div id="chart" style="padding-left: 300px;padding-top:150px"></div>
        <div id="question" style="left: 820px;top:200px;"><h1></h1></div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Congralutions!</h4>
                    </div>
                    <div class="modal-body">
                        <center><img src="congrats.gif" alt="Congralutions">
                    </div>
                    <div class="modal-footer">
                        <h3>We will contact you by your mail or contact number as soon as possible.</h3></center>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" charset="utf-8">
            var padding = {top:100, right:40, bottom:0, left:0};
            var w = 500 - padding.left - padding.right;
            var h = 500 - padding.top  - padding.bottom;
            var r = Math.min(w, h)/2;
            var rotation = 0;
            var oldrotation = 0;
            // var oldpick = [];
            var color = d3.scale.category10();

            var data = [
                        {"label":"Amazon Subscribe",  "value":1,  "question":"Congralutions!! You have won Amazon Subscriber"},
                        {"label":"Hoststar subscribe",  "value":1   ,  "question":"Congralutions!! You have won Hotstar Subscriber"},
                        {"label":"Alt Balaji subscribe",  "value":1,  "question":"Congralutions!! You have won Alt Balaji Subscriber"},
                        {"label":"Netflix subscribe",  "value":1,  "question":"Congralutions!! You have won Netflix Subscriber"},
                        {"label":"Try Again",  "value":1,  "question":"Try Again"},
            ];

            // this below three variables are making initial structure of container of spinner
            // which is as follows

     // svg // div #chart
            //     svg width = 500 height = 500
// conainer //         g class chartholder transform translate(230, 300)
     // vis //             g

            var svg = d3.select('#chart')
                .append("svg")
                .data([data])
                .attr("width",  w + padding.left + padding.right)
                .attr("height", h + padding.top + padding.bottom);
            var container = svg.append("g")
                .attr("class", "chartholder")
                .attr("transform", "translate(" + (w/2 + padding.left) + "," + (h/2 + padding.top) + ")");
            var vis = container
                .append("g");

            // function definations
            // pie
            var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
            // arc
            // declare an arc generator function
            var arc = d3.svg.arc().outerRadius(r);

            // arcs will make 5(length of data) 'g' tags having class slice under 'vis' 'g' tag
            var arcs = vis.selectAll("g.slice")
                .data(pie)
                .enter()
                .append("g")
                .attr("class", "slice");

            // this line add the path tag under 'arcs' made above
            // e.g. : <path fill="#1f77b4" d="M1.2246467991473532e-14,-200A200,200 0 0,1 190.2113032590307,-61.803398874989476L0,0Z"></path>
            arcs.append("path")
                .attr("fill", function(d, i){ return color(i); })
                .attr("d", function (d) { return arc(d); });

            // this will fill the text in circle
            // and rotate text accordingly with rotate funciton
            arcs.append("text").attr("transform", function(d){
                    d.innerRadius = 0;
                    d.outerRadius = r;
                    d.angle = (d.startAngle + d.endAngle)/2;
                    return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
                })
                .attr("text-anchor", "end")
                .text( function(d, i) {
                    return data[i].label;
                });


            // --------------------------------------------------------------------------------------------------------------


            //make arrow
            // it appends 'g' tag and gives it transform property and
            // appends 'path' under 'g' which will make actual arrow
            // and gives color with blue
            svg.append("g")
                .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
                .append("path")
                .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
                .style({"fill":"black"});

            //draw spin circle
            // this will create a 'circle' tag and give its 'cx', 'cy', 'r' values ( width, height, radius )
            // and fill it with white and adds 'cursor' 'pointer'
            container.append("circle")
                .attr("cx", 0)
                .attr("cy", 0)
                .attr("r", 60)
                .style({"fill":"white","cursor":"pointer"});

            //spin text
            // this will add the spin text in middle of the circle
            container.append("text")
                .attr("x", 0)
                .attr("y", 15)
                .attr("text-anchor", "middle")
                .text("SPIN")
                .style({"font-weight":"bold", "font-size":"30px"});

            // other functions
            // this function will return the number of how much to rotate the wheel
            function rotTween(to) {
              var i = d3.interpolate(oldrotation % 360, rotation);
              return function(t) {
                return "rotate(" + i(t) + ")";
              };
            }

            // ---------------------------------------------------------------------------------------
            // MAIN FUNCTION that rotates the spinner
            container.on("click", spin);
            function spin(d){

                var ps       = 360/data.length;
                rotation = ps * ps;

                console.log("ps : " + ps);
                console.log("rotation : " + rotation);

                // here we will tell the circle what to choose
                // 'try again' or any reward
                var result = '';
                axios.post("upvote.php")
                .then(res => {

                    result = res.data;
                    if(result == 'alreadyPlayed') {
                        alert("you have already played");
                        window.location = "logout.php";
                    } else {

                        console.log(result);

                        if (result != 'Try Again') {
                            setTimeout(function() {
                                $("#myModal").modal();
                            }, 4000);
                        }

                        // this variable will store the result we got from SERVER
                        // try again or any reward
                        var selectResult = -1;

                        for (var i = 0; i < data.length; i++) {
                            if (data[i].label == result) {
                                selectResult = i;
                            }
                        }

                        rotation += 270 - Math.round( ps * selectResult );

                        // this will rotate the circle to selected result
                        vis.transition()
                            .duration(3000)
                            .attrTween("transform", rotTween)
                            .each("end", function(){

                                console.log("selecResult : " + selectResult);

                                d3.select("#question h1")
                                    .text(data[selectResult].question);
                                oldrotation = rotation;
                            });

                    }
                });
            }

        </script>

    </body>
    <footer style="background-color:black;margin-top:450px;height:100px">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12" style="margin-top:30px;">
        <center>  
          <div class="credits">
            <a style="color:white"> Designed And Developed By TC-1 Batch (Marwadi University)</a>
          </div>
          </center>
        </div>
      </div>
    </div>
  </footer>
</html>

