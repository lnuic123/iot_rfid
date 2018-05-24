@extends('layouts.app')
@section('content')

<svg width="960" height="500"></svg>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script>
var data = [
	{
		"day": "1",
		"attendance": 8.167
	},
	{
		"day": "2",
		"attendance": 1.492
	},
	{
		"day": "3",
		"attendance": 2.782
	},
	{
		"day": "4",
		"attendance": 4.253
	},
	{
		"day": "5",
		"attendance": 12.702
	},
	{
		"day": "6",
		"attendance": 2.288
	},
	{
		"day": "7",
		"attendance": 2.015
	},
	{
		"day": "8",
		"attendance": 6.094
	},
	{
		"day": "9",
		"attendance": 6.966
	},
	{
		"day": "10",
		"attendance": 0.153
	},
	{
		"day": "11",
		"attendance": 0.08167
	},
	{
		"day": "12",
		"attendance": 0.01492
	},
	{
		"day": "13",
		"attendance": 0.02782
	},
	{
		"day": "14",
		"attendance": 0.04253
	},
	{
		"day": "15",
		"attendance": 0.12702
	},
	{
		"day": "16",
		"attendance": 0.02288
	},
	{
		"day": "17",
		"attendance": 0.02015
	},
	{
		"day": "18",
		"attendance": 0.06094
	},
	{
		"day": "19",
		"attendance": 0.06966
	},
	{
		"day": "20",
		"attendance": 0.00153
	}
];
var svg = d3.select("svg"),
    margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom;

var x = d3.scaleBand().rangeRound([0, width]).padding(0.1),
    y = d3.scaleLinear().rangeRound([height, 0]);

var g = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");



  x.domain(data.map(function(d) { return d.day; }));
  y.domain([0, d3.max(data, function(d) { return d.attendance; })]);

  g.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));

  g.append("g")
      .attr("class", "axis axis--y")
      .call(d3.axisLeft(y).ticks(10))
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", "0.71em")
      .attr("text-anchor", "end")
      .text("attendance");

  g.selectAll(".bar")
    .data(data)
    .enter().append("rect")
      .attr("class", "bar")
      .attr("x", function(d) { return x(d.day); })
      .attr("y", function(d) { return y(d.attendance); })
      .attr("width", x.bandwidth())
      .attr("height", function(d) { return height - y(d.attendance); });


</script>

@endsection