
var tab = $('#tab')

var xhr = function () {

console.log(arguments);
return $.ajax({
url: 'sample.json', // path to the json file
dataType: 'json' // xml, json, script, or html
});
};

var renderer = function (r, c, item) {
switch(c)
{
case 0:
return item.sr;

case 1:
return item.name;

case 2:
return item.location;

default:
return item.language;
}
};

tab.tabulate({

source: xhr,
renderer: renderer,
pagination: $('#paging'),
pagesI18n: function(str) {
switch(str) {
case 'next':
return 'Aage';

case 'prev':
return 'Peeche';
}
}
})
.on('loadfailure', function (){
console.error(arguments);
alert('Failed!');
});

tab.trigger('load');

{
"items": [
{
"Title 1" : 1,
"Title 2": "Amey Sakhadeo",
"Title 3": "Pune",
"Title 4": "Javascript"
},
{
"Title 1" : 2,
"Title 2": "Paul Irish",
"Title 3": "Mountain View",
"Title 4": "CSS"
}
],
"totalPages": 40,
"currPage": 4
}
