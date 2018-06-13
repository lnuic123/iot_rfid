@extends('layouts.app')
@section('content')
<a href="/admin/{{$room}}/stats" class="btn btn-primary" style="margin-bottom: 20px">Povratak</a>
  <h3>Dolaznost korisnika u sobu {{$room}}</h3>
 <div class="col-md-7 col-md-offset-1">
 </div>
 <div class="col-md-2 col-md-offset-0">
 </div>
<script type="text/javascript">

    var w = 500,                        //width
    h = 500,                            //height
    r = 200,                            //radius
    color = d3.scale.category20c();     //builtin range of colors

    var user = {!! json_encode($user) !!};
    var data = [
      {
        "label": "1",
        "value": user[1]
      },
      {
        "label": "2",
        "value": user[2]
      },
      {
        "label": "3",
        "value": user[3]
      },
      {
        "label": "4",
        "value": user[4]
      },
      {
        "label": "5",
        "value": user[5]
      },
    ];
        
    var vis = d3.select(".col-md-7")
        .append("svg:svg")              //create the SVG element inside the <body>
        .data([data])                   //associate our data with the document
            .attr("width", w)           //set the width and height of our visualization (these will be attributes of the <svg> tag
            .attr("height", h)
        .append("svg:g")                //make a group to hold our pie chart
            .attr("transform", "translate(" + r + "," + r + ")")    //move the center of the pie chart from 0, 0 to radius, radius

    var arc = d3.svg.arc()              //this will create <path> elements for us using arc data
        .outerRadius(r);

    var pie = d3.layout.pie()           //this will create arc data for us given a list of values
        .value(function(d) { return d.value; });    //we must tell it out to access the value of each element in our data array

    var arcs = vis.selectAll("g.slice")     //this selects all <g> elements with class slice (there aren't any yet)
        .data(pie)                          //associate the generated pie data (an array of arcs, each having startAngle, endAngle and value properties) 
        .enter()                            //this will create <g> elements for every "extra" data element that should be associated with a selection. The result is creating a <g> for every object in the data array
            .append("svg:g")                //create a group to hold each slice (we will have a <path> and a <text> element associated with each slice)
                .attr("class", "slice");    //allow us to style things in the slices (like text)

        arcs.append("svg:path")
                .attr("fill", function(d, i) { return color(i); } ) //set the color for each slice to be chosen from the color function defined above
                .attr("d", arc);                                    //this creates the actual SVG path using the associated data (pie) with the arc drawing function

        arcs.append("svg:text")                                     //add a label to each slice
                .attr("transform", function(d) {                    //set the label's origin to the center of the arc
                //we have to make sure to set these before calling arc.centroid
                d.innerRadius = 0;
                d.outerRadius = r;
                return "translate(" + arc.centroid(d) + ")";        //this gives us a pair of coordinates like [50, 50]
            })
            .attr("text-anchor", "middle")                          //center the text on it's origin
            .text(function(d, i) { return data[i].label; });        //get the label from our original data array
        
        var svgContainer = d3.select(".col-md-2").append("svg")
                                    .attr("width", 200)
                                    .attr("height", 200);

 //Draw the Rectangle
 var rectangle = svgContainer.append("rect")
                             .attr("x", 10)
                            .attr("y", 10)
                          .attr("width", 10)
                            .attr("height", 10)
                            .attr("fill","#3182bd" );
svgContainer.append('text')
    .attr('x', 25)
    .attr('y', 20)
    .text("Korisnik 1");
 //Draw the Rectangle
 var rectangle = svgContainer.append("rect")
                             .attr("x", 10)
                            .attr("y", 30)
                          .attr("width", 10)
                            .attr("height", 10)
                            .attr("fill", "#6baed6"  );
svgContainer.append('text')
    .attr('x', 25)
    .attr('y', 40)
    .text("Korisnik 2");

 //Draw the Rectangle
 var rectangle = svgContainer.append("rect")
                             .attr("x", 10)
                            .attr("y", 50)
                          .attr("width", 10)
                            .attr("height", 10)
                            .attr("fill", "#9ecae1"  );
svgContainer.append('text')
    .attr('x', 25)
    .attr('y', 60)
    .text("Korisnik 3");

 //Draw the Rectangle
 var rectangle = svgContainer.append("rect")
                             .attr("x", 10)
                            .attr("y", 70)
                          .attr("width", 10)
                            .attr("height", 10)
                            .attr("fill", "#c6dbef" );
svgContainer.append('text')
    .attr('x', 25)
    .attr('y', 80)
    .text("Korisnik 4");

 //Draw the Rectangle
 var rectangle = svgContainer.append("rect")
                             .attr("x", 10)
                            .attr("y", 90)
                          .attr("width", 10)
                            .attr("height", 10)
                            .attr("fill", "#e6550d" );
svgContainer.append('text')
    .attr('x', 25)
    .attr('y', 100)
    .text("Korisnik 5");


    </script>

@endsection